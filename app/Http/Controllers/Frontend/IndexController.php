<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\BlogPost;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Inquiry;
use App\Models\Reply;
use App\Models\News;
use Auth;

class IndexController extends Controller
{
    public function index(){
		$blogpost = BlogPost::latest()->get();
		$products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
		$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
		$categories = Category::orderBy('category_name_jp','ASC')->get();

		$featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
		$hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

		$special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();

		$special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

		$skip_category_0 = Category::skip(0)->first();
		$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

		$skip_category_1 = Category::skip(1)->first();
		$skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

		$skip_brand_1 = Brand::skip(1)->first();
		$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();

		return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1','blogpost'));

    }


    public function UserLogout(){
		Auth::logout();
		return Redirect()->route('login');
	}


    public function UserProfile(){
		$id = Auth::user()->id;
		$user = User::find($id);
		return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			unlink('upload/user_images/'.$data->profile_photo_path);

			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);

    }

    public function AdminNews(){
		// $admin = Admin::find(Auth::user()->id);
		$admin = Admin::all()->first();
		$news = News::latest()->get();
		return view('backend.news.news',compact('admin','news'));
    }

    public function News(){
		$news = News::latest()->get();
		return view('frontend.contact.news',compact('news'));
    }

    public function Inquiry(){
		$user = User::find(Auth::user()->id);
		$admin = Admin::find(Auth::user()->id);
		$inquiries = Inquiry::latest()->get();
		$replies = Reply::latest()->get();
		return view('frontend.contact.inquiry_view',compact('user','admin','inquiries','replies'));
    }

	public function InquiryAdd(){

		// ログインの確認
        if (Auth::check()) {
			return view('frontend.contact.inquiry_add');
		}else{

			$notification = array(
			'message' => 'You Need to Login First',
			'alert-type' => 'error'
			);

			return redirect()->route('login')->with($notification);
		}
    }

	public function InquiryStore(Request $request) {

		$inputs = $request->validate([
			'body' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg|max:1024',
		]);

		$inquiry = new Inquiry();
		$inquiry->title = $request->title;
		// $inquiry->product_id = $request->product_id;
		$inquiry->body = $inputs['body'];
		$inquiry->user_id = Auth::id();
		$inquiry->created_at = Carbon::now();

		if ($files = $request->file('image')) {
			$destinationPath = 'upload/inquiry';
			$digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath,$digitalItem);
			$inquiry->image = $digitalItem;
		}

		$inquiry->save();

		$notification = array(
			'message' => 'File Uploaded Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
    }


	// ★★★写真付きポストに複数のコメント及び写真がある場合、一括削除する技である
    public function InquiryDelete($id)
    {
		$inquiry = Inquiry::findOrFail($id);
		if($inquiry->replies()) {

			// 複数の回答及び写真を削除する場合、下記のｵﾌﾞｼﾞｪｸﾄの指定方法を活用しよう。
			$inquiry_id = $inquiry->id;
			$reply = Reply::where('inquiry_id',$inquiry_id)->first();

			if(!empty($reply->image)) {

				$old_reply_image = $reply->image;
				unlink('upload/inquiry/'.$old_reply_image);

			}
				Reply::where('inquiry_id',$inquiry_id)->first()->delete();
		}

		if($inquiry->image) {
			$old_inquiry_image = $inquiry->image;
			unlink('upload/inquiry/'.$old_inquiry_image);
		}
		Inquiry::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Inquiry Deleted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
    }


    public function UserChangePassword(){
		$id = Auth::user()->id;
		$user = User::find($id);
		return view('frontend.profile.change_password',compact('user'));
    }


    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}
	}



	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);

		$color_jp = $product->product_color_jp;
		$product_color_jp = explode(',', $color_jp);

		$color_cn = $product->product_color_cn;
		$product_color_cn = explode(',', $color_cn);

		$size_jp = $product->product_size_jp;
		$product_size_jp = explode(',', $size_jp);

		$size_cn = $product->product_size_cn;
		$product_size_cn = explode(',', $size_cn);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

		return view('frontend.product.product_details',compact('product','multiImag','product_color_jp','product_color_cn','product_size_jp','product_size_cn','relatedProduct'));

	}

	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags_jp',$tag)->where('product_tags_cn',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_jp','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}


  // Subcategory wise data
	public function SubCatWiseProduct(Request $request, $subcat_id,$slug){

		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_jp','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();

		///  Load More Product with Ajax
		if ($request->ajax()) {
			$grid_view = view('frontend.product.grid_view_product',compact('products'))->render();

			$list_view = view('frontend.product.list_view_product',compact('products'))->render();
			return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);

		}
		///  End Load More Product with Ajax

		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));

	}

  // Sub-Subcategory wise data
	public function SubSubCatWiseProduct($subsubcat_id,$slug){

		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name_jp','ASC')->get();

		$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

		return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));
	}


  // Sub-Subcategory wise data
	public function SubSubCatProductDetail($subsubcat_id,$slug){

	$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
	$categories = Category::orderBy('category_name_jp','ASC')->get();

	$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

	return view('frontend.product.product_details',compact('products','categories','breadsubsubcat'));
}


    /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_jp;
		$product_color = explode(',', $color);

		$size = $product->product_size_jp;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method

 	// Product Seach
	public function ProductSearch(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name_jp','ASC')->get();
		$products = Product::where('product_name_jp','LIKE',"%$item%")->get();

		return view('frontend.product.search',compact('products','categories'));

	} // end method


	// Advance Search Options
	public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;
		$products = Product::where('product_name_jp','LIKE',"%$item%")->select('product_name_jp','product_thambnail','selling_price','id','product_slug_jp')->limit(5)->get();

		return view('frontend.product.search_product',compact('products'));

	}
}