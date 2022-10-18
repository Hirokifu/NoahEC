@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
<section class="sidebar" style="height: 411px; overflow: hidden; width: auto;">

    <div class="user-profile">
        <div class="ulogo">
                <a href="/admin/dashboard">
                <!-- logo for regular state and mobile devices -->
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('backend/images/logo-dark.jpg') }}" alt="logo" width="65" height="65">
                    <h3 style="color:rgb(211, 6, 6); font-weight:700">NOAH<span style="color:rgb(6, 117, 6); font-weight:700">TIME</span></h3>
                </div>
            </a>
        </div>
    </div>

<!-- sidebar menu-->
<ul class="sidebar-menu" data-widget="tree">

        {{-- サプライヤーの権限設定仕様：メニュー開放設定 --}}
        @php
        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);

        // 注意：新規追加の場合、Admin User Role関連ソース（3ﾌｧｲﾙ）の変更が必要あり
        $contact = (auth()->guard('admin')->user()->contact == 1);
        $faq = (auth()->guard('admin')->user()->faq == 1);
        $inquiry = (auth()->guard('admin')->user()->inquiry == 1);
        $news = (auth()->guard('admin')->user()->news == 1);
        $meeting = (auth()->guard('admin')->user()->meeting == 1);
        $company = (auth()->guard('admin')->user()->company == 1);

        @endphp

    <li class="{{ ($route == 'dashboard')? 'active':'' }}">
        <a href="{{ url('admin/dashboard') }}">
        <i data-feather="pie-chart"></i>
        <span>ダッシュボード</span>
        </a>
    </li>

    <li class="header nav-small-cap">受注管理</li>

        @if($orders == true)
        <li class="treeview" {{ ($prefix == '/orders')?'active':'' }} >
            <a href="#">
                <i data-feather="file"></i>
                <span>受注処理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>受付</a></li>
                <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>確認</a></li>
                <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>選定済</a></li>
                <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i>出荷手配</a></li>
                <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i>出荷済</a></li>
                <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i>配達済</a></li>
                <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> キャンセル品</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($stock == true)
        <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>在庫管理</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>在庫一覧</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($returnorder == true)
        <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>返品管理</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>返品リクエスト</a></li>

                <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>返品一覧</a></li>

            </ul>
        </li>
        @else
        @endif

        @if($review == true)
        <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>口コミ管理</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>新規口コミ</a></li>

                <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>公開口コミ</a></li>
            </ul>
        </li>
        @else
        @endif


        @if($reports == true)
        <li class="treeview" {{ ($prefix == '/reports')?'active':'' }} >
            <a href="#">
                <i data-feather="file"></i>
                <span>受注レポート</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>レポート</a></li>
            </ul>
        </li>
        @else
        @endif


    <li class="header nav-small-cap">サプライヤ管理</li>

        @if($company == true)
        <li class="treeview {{ ($prefix == '/company')? 'active':'' }}">
            <a href="#">
                <i data-feather="file"></i>
                <span>サプライヤ管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'company.view')? 'active':'' }}"><a href="{{ route('company.view') }}"><i class="ti-more"></i>サプライヤ一覧</a></li>

                <li class="{{ ($route == 'company.add')? 'active':'' }}"><a href="{{ route('company.add') }}"><i class="ti-more"></i>新規登録</a></li>
            </ul>
        </li>
        @else
        @endif


    <li class="header nav-small-cap">商品管理</li>

        @if($product == true)
        <li class="treeview {{ ($prefix == '/product')? 'active':'' }}">
            <a href="#">
                <i data-feather="file"></i>
                <span>商品管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'add-product')? 'active':'' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>新規登録</a></li>

                <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>商品一覧</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($coupons == true)
        <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>クーポン券</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>クーポン一覧</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($brand == true)
        <li class="treeview {{ ($prefix == '/brand')? 'active':'' }}">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>ブランド管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>ブランド一覧</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($category == true)
        <li class="treeview {{ ($prefix == '/category')? 'active':'' }}">
            <a href="#">
                <i data-feather="mail"></i> <span>カテゴリ管理</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>カテゴリー</a></li>

                <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>子カテゴリー</a></li>

                <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>孫カテゴリー</a></li>
            </ul>
        </li>
        @else
        @endif


    <li class="header nav-small-cap">顧客との交流</li>

        @if($blog == true)
        <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>ブログ</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>カテゴリー</a></li>

                <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>ブログ一覧</a></li>

                <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>新規投稿</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($faq == true)
        <li class="treeview {{ ($prefix == '/faq')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>よくあるご質問</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all.faq')? 'active':'' }}"><a href="{{ route('all.faq') }}"><i class="ti-more"></i>新規質問</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($meeting == true)
        <li class="treeview {{ ($prefix == '/meeting')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>オンライン会議</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all.meeting')? 'active':'' }}"><a href="{{ route('all.meeting') }}"><i class="ti-more"></i>予定一覧</a></li>

                <li class="{{ ($route == 'add.meeting')? 'active':'' }}"><a href="{{ route('add.meeting') }}"><i class="ti-more"></i>会議予約</a></li>
            </ul>
        </li>
        @else
        @endif


        @if($contact == true)
        <li class="treeview {{ ($prefix == '/contact')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>お問い合わせ</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all.contact')? 'active':'' }}"><a href="{{ route('all.contact') }}"><i class="ti-more"></i>ゲストの質問</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($inquiry == true)
        <li class="treeview {{ ($prefix == '/inquiry')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>ユーザご要望</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'admin.inquiry')? 'active':'' }}"><a href="{{ route('admin.inquiry') }}"><i class="ti-more"></i>ご要望&ご質問</a></li>
            </ul>
        </li>
        @else
        @endif


        @if($news == true)
        <li class="treeview {{ ($prefix == '/news')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>ニュース</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'news.view')? 'active':'' }}"><a href="{{ route('news.view') }}"><i class="ti-more"></i>ニュース一覧</a></li>
            </ul>
        </li>
        @else
        @endif

    <li class="header nav-small-cap">ユーザ管理</li>

        @if($alluser == true)
        <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>ユーザ</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>ユーザリスト</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($adminuserrole == true)
        <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>権限設定</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>サプライヤ一覧</a></li>
            </ul>
        </li>
        @else
        @endif



    <li class="header nav-small-cap">設定</li>

        @if($slider == true)
        <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>スライダー</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>管理</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($shipping == true)
        <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>お届け先</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>国/地域</a></li>

                <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>州/省/県</a></li>

                <li class="{{ ($route == 'manage-state')? 'active':'' }}"><a href="{{ route('manage-state') }}"><i class="ti-more"></i>市/町/村</a></li>
            </ul>
        </li>
        @else
        @endif

        @if($setting == true)

        <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>サイト管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>サイト設定</a></li>
                <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>SEO設定</a></li>
            </ul>
        </li>
        @else
        @endif

    </ul>
</section>

    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>

        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>

        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>

</aside>