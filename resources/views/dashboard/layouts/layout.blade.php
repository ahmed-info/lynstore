 <!DOCTYPE html>
 <html dir="rtl">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
     <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
     <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
     <title>Admin Panel</title>
     <!-- Icons -->
     <link href="{{ asset('adminassets/css/font-awesome.min.css') }}" rel="stylesheet">
     <link href="{{ asset('adminassets/css/simple-line-icons.css') }}" rel="stylesheet">
     <!-- Main styles for this application -->
     <link href="{{ asset('adminassets/dest/style.css') }}" rel="stylesheet">
     @yield('style')

     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 </head>

 <body class="navbar-fixed sidebar-nav fixed-nav">
     <header class="navbar">
         <div class="container-fluid">


             <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
             <a class="navbar-brand" href="#"></a>
             <ul class="nav navbar-nav hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                 </li>
             </ul>
             <ul class="nav navbar-nav pull-left hidden-md-down">
                 <li class="nav-item">
                     <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-list"></i></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                         <img src="{{ asset('adminassets/img/avatars/logo.png') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                         <span class="hidden-md-down">language</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                         <a class="dropdown-item" href="{{ route('languageConverter','ar') }}"><i class="fa fa-user"></i> العربية</a>
                         <a class="dropdown-item" href="{{ route('languageConverter','en') }}"><i class="fa fa-wrench"></i> English</a>
                         <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                         <div class="divider"></div>
                         <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i>

                                @lang('words.logout')
                            </a>


                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                 </li>

             </ul>
         </div>
     </header>
     <div class="sidebar">
         <nav class="sidebar-nav">
             <ul class="nav">
                 <li class="nav-item">
                     <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> @lang('words.dashboard') <span class="tag tag-info">جدید</span></a>
                 </li>

                 <li class="nav-title">
                test header
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.suppliers.list') }}"><i class="icon-puzzle"></i>@lang('words.suppliers')</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.brands.list') }}"><i class="icon-puzzle"></i>@lang('words.brands')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.mainCategories.list') }}"><i class="icon-puzzle"></i>@lang('words.categories')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.products.list') }}"><i class="icon-puzzle"></i>@lang('words.products')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.productOtherInfos.list') }}"><i class="icon-puzzle"></i>@lang('words.product other info')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.colors.list') }}"><i class="icon-puzzle"></i>@lang('words.productColors')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.productSizes.list') }}"><i class="icon-puzzle"></i>@lang('words.productSizes')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.coupons.list') }}"><i class="icon-puzzle"></i>@lang('words.coupons')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.banners.list') }}"><i class="icon-puzzle"></i>@lang('words.banners')</a>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> @lang('words.Orders')</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.orders.list') }}"><i class="icon-puzzle"></i>@lang('words.pendingOrders')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashborad.orders.AllOrders') }}" target="_top"><i class="icon-star"></i> @lang('words.All Orders')</a>
                        </li>
                    </ul>
                </li>

                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="icon-people"></i>@lang('words.settings')</a>
                 </li>

             </ul>
         </nav>
     </div>
     <!-- Main content -->
     <main class="main">
        @yield('body')

     </main>

     @include('dashboard.layouts.sidebar')

     <footer class="footer">
         <span class="text-left">
             <a href="http://coreui.io">CoreUI</a> &copy; 2016 creativeLabs.
         </span>
         <span class="pull-right">
             Powered by <a href="http://coreui.io">CoreUI</a>
         </span>
     </footer>
     <!-- Bootstrap and necessary plugins -->
     <script src="{{ asset('adminassets/js/libs/jquery.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/tether.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/bootstrap.min.js') }}"></script>
     <script src="{{ asset('adminassets/js/libs/pace.min.js') }}"></script>

     <!-- Plugins and scripts required by all views -->
     <script src="{{ asset('adminassets/js/libs/Chart.min.js') }}"></script>

     <!-- CoreUI main scripts -->

     <script src="{{ asset('adminassets/js/app.js') }}"></script>

     <!-- Plugins and scripts required by this views -->
     <!-- Custom scripts required by this view -->
     <script src="{{ asset('adminassets/js/views/main.js') }}"></script>

     <!-- Grunt watch plugin -->
     <script src="//localhost:35729/livereload.js"></script>
     <script>
         $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
     </script>
     @yield('scripts')
 </body>

 </html>
