<header class="main-header">

<nav class="navbar navbar-static-top pl-30">

    <div>
        <ul class="nav">
        <li class="btn-group nav-item">
            <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
                <i class="nav-link-icon mdi mdi-menu"></i>
            </a>
        </li>
        <li class="btn-group nav-item">
            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
                <i class="nav-link-icon mdi mdi-crop-free"></i>
            </a>
        </li>
        <li class="btn-group nav-item d-none d-xl-inline-block">
            <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                <i class="ti-check-box"></i>
            </a>
        </li>
        <li class="btn-group nav-item d-none d-xl-inline-block">
            <a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                <i class="ti-calendar"></i>
            </a>
        </li>
        </ul>
    </div>



    @php
        $contacts = App\Models\Contact::latest()->get();
        $inquiries = App\Models\Inquiry::latest()->get();
        $news = App\Models\News::latest()->get();
        $orders = App\Models\Order::latest()->get();
        $reviews = App\Models\Review::latest()->get();
        $blogs = App\Models\BlogPost::latest()->get();
    @endphp



    <div class="navbar-custom-menu r-side">
    <ul class="nav navbar-nav">
        <!-- full Screen -->
        <li class="search-bar">
            <div class="lookup lookup-circle lookup-right">
                <input type="text" name="s">
            </div>
        </li>

        <!-- Notifications -->
        <li class="dropdown notifications-menu">
        <a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
            <i class="ti-bell"></i>
        </a>
        <ul class="dropdown-menu animated bounceIn">

            <li class="header">
            <div class="p-20">
                <div class="flexbox">
                    <div>
                        <h4 class="mb-0 mt-0">Notifications</h4>
                    </div>
                    {{-- <div>
                        <a href="#" class="text-danger">Clear All</a>
                    </div> --}}
                </div>
            </div>
            </li>

            <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu sm-scrol">
                <li>
                <a href="{{ route('all.contact') }}">
                    <i class="fa fa-users text-info"></i>お問い合わせ <span class="badge badge-pill badge-danger"> {{ count($contacts) }} </span>
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-warning text-warning"></i> ご質問＆ご要望 <span class="badge badge-pill badge-danger"> {{ count($inquiries) }} </span>
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-users text-danger"></i> お知らせ <span class="badge badge-pill badge-danger"> {{ count($news) }} </span>
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-shopping-cart text-success"></i>オーダー <span class="badge badge-pill badge-danger"> {{ count($orders) }} </span>
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-user text-danger"></i>顧客評価 <span class="badge badge-pill badge-danger"> {{ count($reviews) }} </span>
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-user text-primary"></i>ブログ投稿 <span class="badge badge-pill badge-danger"> {{ count($blogs) }} </span>
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                </a>
                </li>
            </ul>
            </li>
            <li class="footer">
                <a href="#">View all</a>
            </li>
        </ul>
        </li>

        @php
            $adminData = App\Models\Admin::first();
            // $adminData = App\Models\Admin::find(Auth::user()->id);
            // $adminData = DB::table('admins')->find(Auth::user()->id);
        @endphp

        <!-- User Account-->
        <li class="dropdown user user-menu">
        <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
            <img src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="User Avatar">
        </a>
        <ul class="dropdown-menu animated flipInX">
            <li class="user-body">
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="ti-wallet text-muted mr-2"></i> Change Password</a>
                <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
            </li>
        </ul>
        </li>
        <li>
            <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
            <i class="ti-settings"></i>
            </a>
        </li>

    </ul>
    </div>
</nav>
</header>
