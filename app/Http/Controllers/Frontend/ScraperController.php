<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\ScraperUrl;
use App\Models\Seefood;
use Carbon\Carbon;
use Goutte\Client;


class ScraperController extends Controller
{
    // private $results = array();
    // public function Scraper(){

    //     // インスタンス生成
    //     $client = new Client();

    //     // 取得とDOM構築
    //     $url = 'https://www.worldometers.info/coronavirus/';
    //     $page = $client->request('GET', $url);

    //     // 要素の取得
    //     $page->filter('#maincounter-wrap')->each(function ($item) {
    //         $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
    //     });

    //     $data = $this->results;

    //     return view('pages/scraper', compact('data'));

    // }


    // Mマートの農林水産品スクラッピング
    public function MeatUrls()
    {
        if(DB::table('scraper_urls')) {
            DB::table('scraper_urls')->truncate();
        }

        $client = new Client();
        foreach(range(1, 2) as $num) {

            // トップ > 畜産市場 > 原料肉 > 国産牛ブロック
            $url = 'https://www.m-mart.co.jp/search/cate_sub.php?cate=1&cate2=1&cate3=2&cate4=&page='. $num .'&price=1';
            $crawler = $client->request('GET', $url);

            $urls = $crawler->filter('#main table .sub_table tr a')->each(function ($node) use (&$url) {
                $href = $node->attr('href');
                //  href="/search/item.php?type=buybuyc&id=iseya0955&num=127"

                return [
                    // substr — 文字列の一部分を返す
                    // strpos — 文字列内の部分文字列が最初に現れる場所を見つける

                    'url' => 'https://www.m-mart.co.jp'.substr($href, 0, strpos($href, 'num=')+8),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

            });
            DB::table('scraper_urls')->insert($urls);
            // dump($urls);
        }
        return redirect()->back();
    }


    public function MmartView(){

        $data = [];
        $client = new Client();

        foreach (ScraperUrl::all() as $index => $scraperUrl) {
            $url = $scraperUrl->url;
            $crawler = $client->request('GET', $url);

            $product= [];

            $crawler->filter('#contents')->each(function ($node) use (&$data, &$product) {
                $title = $node->filter('#item_image .title_area h1')->first()->text();
                $a = $node->filter('.photo img')->first()->attr('src');
                $img = 'https://www.m-mart.co.jp'.substr($a, 2, strpos($a, '/', 1)+80);

                $spec = $node->filter('#item_detail tr td')->each(function ($node) {
                    return $node->text();
                });

                $product['title'] = $title;
                $product['img'] = $img;
                $product['spec'] = $spec;
                $data[] = $product;
            });
        }
        $price = substr($product['spec'][0], 0, strpos($product['spec'][0], 'k', 1)+2);

        // dump($data[1]['spec'][6]);
        return view('frontend.scraper.m_mart_view', compact('data','price'));
    }




    public function MmartViewold(){

        $data = [];
        $client = new Client();

        foreach (ScraperUrl::all() as $index => $scraperUrl) {
            $url = $scraperUrl->url;
            $crawler = $client->request('GET', $url);

            $product= [];

            $crawler->filter('#contents')->each(function ($node) use (&$data, &$product) {
                $title = $node->filter('#item_image .title_area h1')->first()->text();
                $a = $node->filter('.photo img')->first()->attr('src');
                $img = 'https://www.m-mart.co.jp'.substr($a, 2, strpos($a, '/', 1)+80);

                $spec = $node->filter('#item_detail tr td')->each(function ($node) {
                    return $node->text();
                });

                $product['title'] = $title;
                $product['img'] = $img;
                $product['spec'] = $spec;

                $data[] = $product;
            });
        }
        $price = substr($product['spec'][0], 0, strpos($product['spec'][0], 'k', 1)+2);

        // dump($data[1]['spec'][6]);
        return view('frontend.scraper.m_mart_view_old', compact('data','price'));
    }




    public function MmartDetail($id){

        $scraperUrl = ScraperUrl::findOrFail($id);

        $data = [];
        $client = new Client();

        $url = $scraperUrl->url;
        $crawler = $client->request('GET', $url);

        $product= [];

        $crawler->filter('#contents')->each(function ($node) use (&$data, &$product) {
            $title = $node->filter('#item_image .title_area h1')->first()->text();
            $a = $node->filter('.photo img')->first()->attr('src');
            $img = 'https://www.m-mart.co.jp'.substr($a, 2, strpos($a, '/', 1)+80);

            $spec = $node->filter('#item_detail tr td')->each(function ($node) {
                return $node->text();
            });

            $product['title'] = $title;
            $product['img'] = $img;
            $product['spec'] = $spec;

            $data[] = $product;
        });

        $price = substr($product['spec'][0], 0, strpos($product['spec'][0], 'k', 1)+2);
// dump($price);
        return view('frontend.scraper.m_mart_detail', compact('url','data','price'));
    }



    /*  インド人のスマートなスクラッピング事例
    １．each(function() use( , ){ }の使い方
    ２．配列のデータを表示する方法
    ３．配列のデータを文字列に変化して保存する
    */
/*
    public function CarUrls()
    {
        if(DB::table('scraper_urls')) {
            DB::table('scraper_urls')->truncate();
        }

        $client = new Client();
        foreach(range(1, 2) as $num) {

            $url = 'https://jo.opensooq.com/en/cars/cars-for-sale?page='. $num .'/';
            $crawler = $client->request('GET', $url);

            $urls = $crawler->filter('.rectLi .rectLiDetails h2 a')->each(function ($node) use (&$url) {
                $href = $node->attr('href');
                //  href="/en/search/187337535/##4455&&5%67"

                return [
                    // substr — 文字列の一部分を返す
                    // strpos — 文字列内の部分文字列が最初に現れる場所を見つける

                    'url' => 'https://jo.opensooq.com'.substr($href, 0, strpos($href, '/', 12)+1),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

            });
            DB::table('scraper_urls')->insert($urls);
            // dump($urls);
        }
        return 'URLはデータベースに書き込み完了。';
    }


    public function IndianCar(){

        $data = [];
        $client = new Client();

        foreach (ScraperUrl::all() as $index => $scraperUrl) {
            $url = $scraperUrl->url;
            $crawler = $client->request('GET', $url);

            $crawler->filter('.postRight .galleryCont')->each(function ($item) use (&$data) {

                $img = $item->filter('.galleryLeftList ul li a img')->first()->attr('src');

                // $details = $item->filter('.customP ul')->children();
                // $city = $details->eq(0)->text();
                // $model = $details->eq(1)->text();
                // $Year = $details->eq(2)->text();

                $features = $item->filter('.customP ul')->each(function ($node) {
                    return $node->text();
                });
                $infomations = implode(',', $features); //implodeは配列→文字列に変更、explodeは文字列→配列に変更する
                $cut = substr($infomations, 0, strpos($infomations, 'Car Options')-1); //文字列から一部を取る方法


                $innerData['img'] = $img;
                $innerData['infomations'] = $cut;
                $data[] = $innerData;
            });
        }
        // dump($data);
        return view('frontend.scraper.car', compact('data'));
    }



    /*-----------求人情報のスクラッピング事例--------------*/
/*
    //URL取得のため、Admin画面にて「URL取得」ボダンを設ける
    public function MyUrls()
    {
        if(DB::table('scraper_urls')) {
            DB::table('scraper_urls')->truncate();
        }

        $client = new Client();
        foreach(range(1, 2) as $num) {

            $url = 'https://tenshoku.mynavi.jp/list/pg'. $num .'/';
            $crawler = $client->request('GET', $url);

            $urls = $crawler->filter('.cassetteRecruit__copy > a')->each(function ($node) use (&$url) {
                $href = $node->attr('href');
                //href="/jobinfo-259270-1-3-1/msg/?ty=0&searchId=1343711269&pageNum=2&showNo=1"

                return [
                    // substr — 文字列の一部分を返す
                    // strpos — 文字列内の部分文字列が最初に現れる場所を見つける

                    'url' => 'https://tenshoku.mynavi.jp'.substr($href, 0, strpos($href, '/', 1) + 1),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            });
            DB::table('scraper_urls')->insert($urls);
        }
        return 'URLはデータベースに書き込み完了。';
    }
*/

    /*注意点：
    １．URLを取得時に、間違いやすいため、得たURLは正しいかどうかを確認必要
    ２．pagenationページURLは、展開後の対象ページのURLとは単純にIPの延長ではなく、URLの組合せも変わっている
    ３．対象ページを取得すれば、文字列や写真等の特定は簡単になる
    ４．対象物を確認時に、配列と文字列は区別あり、統一する必要あり
    ５．配列のデータを保存時に、implode()を使って文字列へ変更する必要あり
    */

/*
    public function MyJobs()
    {
        $data = [];
        $client = new Client();

        foreach (ScraperUrl::all() as $index => $scraperUrl) {
            $url = $scraperUrl->url;
            $crawler = $client->request('GET', $url);

            $crawler->filter('.cassetteOfferRecapitulate.noBorder')->each(function ($item) use (&$data) {

                $title =  $item->filter('.occName')->text();
                $company = $item->filter('.companyName')->text();
                $features = $item->filter('.cassetteRecruit__attribute.cassetteRecruit__attribute-jobinfo .cassetteRecruit__attributeLabel span')->each(function ($node) {
                    return $node->text();
                });
                $infomations = implode(',', $features); //implodeを使って配列を文字列に変更する
                $openDate = $item->filter('.cassetteOfferRecapitulate__date .dateInfo')->text();

                $innerData['title'] = $title;
                $innerData['company'] = $company;
                $innerData['infomations'] = $infomations;
                $innerData['openDate'] = $openDate;

                $data[] = $innerData;
                // dump($data[0]['company_name']);
            });

        }
        //全ての対象会社の求人情報は$data配列に入っている。
        // dump($data);

        return view('frontend.scraper.mynavi', compact('data'));
    }

*/

}