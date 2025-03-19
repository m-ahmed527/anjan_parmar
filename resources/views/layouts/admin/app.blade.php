<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Admin | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/web/images/logo-headers.png') }}" type="image/x-icon" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
    {{-- <link rel="stylesheet" href="~/adminlte/dist/css/skins/skin-yellow.min.css"> --}}
    <style>
        .user-panel img {
            width: 50px !important;
            height: 50px !important;

        }

        .gap-20 {
            gap: 20px;
        }

        .imgs-multiple {
            height: 200px;
            overflow: scroll;
        }

        .featured-image {
            max-width: 50%
        }

        .notification-dropdown {
            font-size: 24px;
            right: 20px;
            top: -5px;
        }

        .navbar-badge {
            font-size: 0.8rem;
            font-weight: 300;
            padding: 2px 4px;
            position: absolute;
            right: 5px;
            top: 6px;
        }

        /* .imgs-multiple ,td{
            width: 100%
        } */
    </style>
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.index') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('index') }}" class="nav-link">Visit
                        {{ str_replace('_', ' ', env('APP_NAME')) }}</a>
                </li>
            </ul>
            {{-- @dd(auth()->user()->unreadNotifications) --}}
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link notification-dropdown" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span
                            class="badge badge-warning navbar-badge notification-count">{{ count(auth()->user()->unreadNotifications) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            {{-- {{ count(auth()->user()->unreadNotifications) }}
                            Unread Notifications --}}
                        </span>
                        {{-- @if (count(auth()->user()->unreadNotifications) > 0)
                            <a href="#" class="dropdown-item dropdown-header">Mark As all read</a>
                        @endif --}}

                        <div class="dropdown-divider"></div>
                        {{-- @forelse (auth()->user()->unreadNotifications as $notification)
                            @if ($notification['type'] == 'App\Notifications\SendNewSubscriptionCreated')
                                <a href="{{ route('admin.notificaiton.mark.read', $notification['id']) }}"
                                    class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i>
                                    {{ $notification['data']['newsletter']['email'] }}
                                    <p class="txt">has subscribed</p>

                                    <div class="row d-flex align-items-center" style="justify-content: space-between">
                                        <span class="text-muted">mark as read</span>
                                        <span
                                            class="text-muted text-sm">{{ \Carbon\Carbon::parse($notification['data']['newsletter']['created_at'])->diffForHumans() }}</span>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                            @elseif ($notification['type'] == 'App\Notifications\SendNewOrderCreatedNotification')
                                <a href="{{ route('admin.notificaiton.mark.read', $notification['id']) }}"
                                    class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> {{ $notification['data']['order']['name'] }}
                                    <p class="txt">has Ordered</p>

                                    <div class="row d-flex align-items-center" style="justify-content: space-between">
                                        <span class="text-muted">mark as read</span>
                                        <span
                                            class="text-muted text-sm">{{ \Carbon\Carbon::parse($notification['data']['order']['created_at'])->diffForHumans() }}</span>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                            @else
                                <a href="{{ route('admin.notificaiton.mark.read', $notification['id']) }}"
                                    class="dropdown-item">
                                    <i class="fas fa-users mr-2"></i> {{ $notification['data']['user']['name'] }}
                                    <p class="txt">has registered</p>

                                    <div class="row d-flex align-items-center" style="justify-content: space-between">
                                        <span class="text-muted">mark as read</span>
                                        <span
                                            class="text-muted text-sm">{{ \Carbon\Carbon::parse($notification['data']['user']['created_at'])->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endif
                        @empty
                            <a href="#" class="dropdown-item">
                                <p class="txt">No Unread Notificaions Found</p>


                            </a>
                        @endforelse --}}
                        @forelse (auth()->user()->notifications->take(5) as $notification)
                            <a href="{{ $notification['data']['url'] }}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>
                                {{ $notification['data']['title'] }}
                                <p class="txt"> {{ $notification['data']['message'] }}</p>

                                <div class="row d-flex align-items-center" style="justify-content: end">
                                    <span
                                        class="text-muted text-sm">{{ $notification['created_at']->diffForHumans() }}</span>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        @empty
                        @endforelse
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.notification.index') }}" class="dropdown-item dropdown-footer">See All
                            Notifications</a>
                    </div>
                </li>
                {{-- @dd(auth()->user()->unreadNotifications[0]['data']['url']) --}}
                <li class="nav-item dropdown">
                    <form action="{{ route('web.logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="button" class="btn btn-primary" id="logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/web/images/logo-headers.png') }}"
                    alt="{{ str_replace('_', ' ', env('APP_NAME')) }} Logo" class="brand-image img-circle elevation-3"
                    style="opacity: 1">
                <span class="brand-text font-weight-light">{{ str_replace('_', ' ', env('APP_NAME')) }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        {{-- <img src="{{ auth()->user()->getFirstMediaUrl('avatar') }}" class="img-circle elevation-2"
                            alt="User Image"> --}}
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()?->user()?->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.index') }}" class="nav-link active">
                                <p> Dashboard</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Brand Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.brand.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Brands</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.brand.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Brand</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Category Type Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.type.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Category Types</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.type.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Category Type</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <p>
                                    Attribute Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.attribute.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Attributes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.attribute.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Attributes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <p>
                                    Category Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <p>
                                    Product Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('admin.product.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.product.premium.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Premium</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.vendor-products.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Vendor's Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.product.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <p>
                                    Order Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Orders</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.offers.index') }}" class="nav-link active">
                                <p> Offers Management</p>
                            </a>

                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.vendor.requests') }}" class="nav-link active">
                                <p> Vendor's Requests</p>
                            </a>

                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.contact.index') }}" class="nav-link active">
                                <p> Contacts Management</p>
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.profile.index') }}" class="nav-link active">
                                <p> Profile Management</p>
                            </a>

                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.vendors.index') }}" class="nav-link active">
                                <p> Vendors Management</p>
                            </a>

                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('admin.users.index') }}" class="nav-link active">
                                <p>User Management</p>
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ route('index') }}" class="nav-link active">
                                <p>Back to Website</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    BlogCategory Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.category.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Blog Categories </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.category.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Blog Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Blogs Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Blogs</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.blog.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Blog</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Testimonials Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.testimonial.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Testimonials</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.testimonial.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Testimonial</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Slider Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider.management.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Sliders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider.management.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create New Slider</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    HomePage Categegories-Section Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.home.page.category.section.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.home.page.category.section.edit') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Update</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Shipping Charges Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.shipping.charges.index') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        @yield('content')





        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{ asset('assets/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/admin/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
    @include('includes.logout-script', ['redirectUrl' => route('admin.login')])
    <script>
        $(document).ready(function() {
            $('.notification-dropdown').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.notificaitons.mark.all.read') }}",
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("{{ count(auth()->user()->unreadNotifications) }}");
                        console.log(response);
                        if (response.success) {
                            $('.notification-count').text(response.notificationCount);
                        }

                    },
                    error: function(error) {
                        console.log(error);


                    }
                })
            })
        })
    </script>
</body>

</html>
