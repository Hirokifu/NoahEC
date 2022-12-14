<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ReplyController;
use App\Http\Controllers\Backend\MeetingController;
use App\Http\Controllers\Backend\CompanyController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ScraperController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\ComparisonController;



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function() {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    // admin All Route
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Route::get('/admin/menu', [AdminProfileController::class, 'AdminMenu'])->name('admin.menu');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

});  // end Middleware admin




// User All route
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

Route::get('/news', [IndexController::class, 'News'])->name('news');
Route::get('/inquiry', [IndexController::class, 'Inquiry'])->name('inquiry');
Route::get('/inquiry/add', [IndexController::class, 'InquiryAdd'])->name('inquiry.add');
Route::post('/inquiry/store', [IndexController::class, 'InquiryStore'])->name('inquiry.store');
Route::post('/inquiry/reply', [ReplyController::class, 'InquiryReply'])->name('inquiry.reply');
Route::get('/inquiry/delete/{id}', [IndexController::class, 'InquiryDelete'])->name('inquiry.delete');

Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// Scraper Route
Route::get('/meaturls', [ScraperController::class, 'MeatUrls'])->name('meaturls'); //Admin??????
Route::get('/m_mart_view', [ScraperController::class, 'MmartView'])->name('m_mart_view');
Route::get('/m_mart_detail/{id}', [ScraperController::class, 'MmartDetail'])->name('m_mart_detail');
Route::get('/m_mart_view_old', [ScraperController::class, 'MmartViewold']);

// Route::get('/carurls', [ScraperController::class, 'CarUrls'])->name('carurls'); //Admin??????
// Route::get('/indian_car', [ScraperController::class, 'IndianCar'])->name('indian.car');

// Route::get('/myurls', [ScraperController::class, 'MyUrls'])->name('myurls'); //Admin??????
// Route::get('/myjobs', [ScraperController::class, 'MyJobs'])->name('myjobs');







// Comparison Route
Route::get('/production-comparison', [ComparisonController::class, 'ProductComp'])->name('production.comparison');

// Admin Brand All routes
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});

// Admin Category All routes
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    // Admin SubCategory All routes
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    // Admin Sub->SubCategory All routes
    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});

// Admin Products All routes
Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});

// Admin Company routes
Route::prefix('company')->group(function(){
    Route::get('/view', [CompanyController::class, 'CompanyView'])->name('company.view');
    Route::get('/add', [CompanyController::class, 'CompanyAdd'])->name('company.add');
    Route::post('/store', [CompanyController::class, 'CompanyStore'])->name('company.store');
    Route::get('/edit/{id}', [CompanyController::class, 'CompanyEdit'])->name('company.edit');
    Route::post('/update', [CompanyController::class, 'CompanyUpdate'])->name('company.update');
    Route::get('/delete/{id}', [CompanyController::class, 'CompanyDelete'])->name('company.delete');
});









// Admin Slider All Routes
Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
});

//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/cn', [LanguageController::class, 'Cn'])->name('cn.language');
Route::get('/language/jp', [LanguageController::class, 'Jp'])->name('jp.language');

// Frontend Product Details Page url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

// Frontend Product Tags Page
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);

// Frontend SubCategory wise Data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

// User Must Login
Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
    // Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
    Route::post('/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
    // Order Traking Route
    Route::post('/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');
});

// My Cart Page All Routes
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

// Admin Coupons All Routes
Route::prefix('coupons')->group(function(){
    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
});


// Admin Shipping All Routes
Route::prefix('shipping')->group(function(){
    // Ship Division
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    // Ship District
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    // Ship State
    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
});

// Frontend Coupon Option
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Checkout Routes
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

// Admin Order All Routes
Route::prefix('orders')->group(function(){
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    // Update Status
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
});

// Admin Reports Routes
Route::prefix('reports')->group(function(){
    Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');
    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
});

// Admin Get All User Routes
Route::prefix('alluser')->group(function(){
    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    Route::get('/delete/{id}', [AdminProfileController::class, 'UserDelete'])->name('user.delete');
});


Route::prefix('blog')->group(function(){

    // ??????????????????????????????????????????????????????
    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');
    Route::post('/cat_store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');
    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');
    Route::post('/cat_update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');
    Route::get('/category/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('blogcategory.delete');

    // ?????????????????????????????????
    Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');
    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');
    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post.store');
    Route::get('/post/edit/{id}', [BlogController::class, 'BlogPostEdit'])->name('post.edit');
    Route::post('/post/update', [BlogController::class, 'BlogPostUpdate'])->name('post.update');
    Route::get('/post/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('post.delete');
});

//  Frontend Blog Show Routes
Route::get('/blog', [HomeBlogController::class, 'AddBlogPost'])->name('home.blog');
Route::get('/post/details/{id}', [HomeBlogController::class, 'DetailsBlogPost'])->name('post.details');
Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'HomeBlogCatPost']);

// Admin Site Setting Routes
Route::prefix('setting')->group(function(){
    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
    Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
    Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
    Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
    // Route::get('/faq/view', [SiteSettingController::class, 'Faq']);
});

// Admin Return Order Routes
Route::prefix('return')->group(function(){
    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');
    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
});

// Frontend Product Review Routes
Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');

// Admin Manage Review Routes
Route::prefix('review')->group(function(){
    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');
    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');
    Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
});

// Admin Manage Stock Routes
Route::prefix('stock')->group(function(){
    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
});

// Admin User Role Routes
Route::prefix('adminuserrole')->group(function(){
    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
});

// Product Search Route
Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');

// Advance Search Route
Route::post('search-product', [IndexController::class, 'SearchProduct']);

// Shop Page Route
Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');
Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');

// Frontend FAQ Routes
Route::get('/faq', [SiteSettingController::class, 'FaqList'])->name('faq');

// Frontend Contact Routes
Route::get('/contact', [ContactController::class, 'ContactForm'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'ContactStore'])->name('contact.store');


// ???????????????News, FAQ, Inquiry, Contact, Quizz, Meeting
// ???????????????web.php, AdminUserController, sidebar.blade.php??????????????????,
// MySQL???admins???????????????
// ?????????????????????????????????Admin User Role??????????????????3files???????????????????????????

// Admin FAQ Routes
Route::prefix('faq')->group(function(){
    Route::get('/view', [SiteSettingController::class, 'FaqView'])->name('all.faq');
    Route::post('/store', [SiteSettingController::class, 'FaqStore'])->name('faq.store');
    Route::get('/edit/{id}', [SiteSettingController::class, 'FaqEdit'])->name('faq.edit');
    Route::post('/update', [SiteSettingController::class, 'FaqUpdate'])->name('faq.update');
    Route::get('/delete/{id}', [SiteSettingController::class, 'FaqDelete'])->name('faq.delete');
});

// Admin Contact Routes
Route::prefix('contact')->group(function(){
    Route::get('/view', [ContactController::class, 'ContactView'])->name('all.contact');
    Route::get('/delete/{id}', [ContactController::class, 'ContactDelete'])->name('contact.delete');
    Route::get('/inactive/{id}', [ContactController::class, 'ContactInactive'])->name('contact.inactive');
    Route::get('/active/{id}', [ContactController::class, 'ContactActive'])->name('contact.active');
});

// admin inquiry & reply routes
Route::prefix('inquiry')->group(function(){
    Route::get('/admin', [ReplyController::class, 'InquiryView'])->name('admin.inquiry');
    Route::post('/admin/reply', [ReplyController::class, 'InquiryReplyAdmin'])->name('admin.inquiry.reply');
    Route::get('/admin/repley/delete/{id}', [ReplyController::class, 'ReplyAdminDelete'])->name('admin.repley.delete');
});

// Admin News All routes
Route::prefix('news')->group(function(){
    Route::get('/view', [IndexController::class, 'AdminNews'])->name('news.view');
    Route::post('/store', [ReplyController::class, 'NewsStore'])->name('news.store');
    Route::get('/edit/{id}', [ReplyController::class, 'NewsEdit'])->name('news.edit');
    Route::post('/update', [ReplyController::class, 'NewsUpdate'])->name('news.update');
});

// Admin Meeting All routes
Route::prefix('meeting')->group(function(){
    Route::get('/all', [MeetingController::class, 'AdminMeetingView'])->name('all.meeting');
    Route::get('/add', [MeetingController::class, 'AdminAddMeeting'])->name('add.meeting');
    Route::post('/store', [MeetingController::class, 'AdminMeetingStore'])->name('store.meeting');
    Route::get('/edit/{id}', [MeetingController::class, 'AdminMeetingEdit'])->name('edit.meeting');
    Route::post('/update', [MeetingController::class, 'AdminMeetingUpdate'])->name('update.meeting');
    Route::get('/delete/{id}', [MeetingController::class, 'AdminMeetingDelete'])->name('delete.meeting');
});
