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

                 <!--<li class="nav-item p-x-1">
                     <a class="nav-link" href="#">داشبورد</a>
                 </li>
                 <li class="nav-item p-x-1">
                     <a class="nav-link" href="#">Users</a>
                 </li>
                 <li class="nav-item p-x-1">
                     <a class="nav-link" href="#">Settings</a>
                 </li>-->
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
                         <img src="{{ asset('adminassets/img/avatars/6.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
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
                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>@lang('words.brands')</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.brands.list') }}"><i class="icon-puzzle"></i>@lang('words.list of brands')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.brand.create') }}"><i class="icon-puzzle"></i>@lang('words.create brand')</a>
                        </li>

                    </ul>
                </li>

                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>@lang('words.categories')</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.mainCategories.list') }}"><i class="icon-puzzle"></i>@lang('words.list of categories')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.category.create') }}"><i class="icon-puzzle"></i>@lang('words.create category')</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>@lang('words.products')</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.products.list') }}"><i class="icon-puzzle"></i>@lang('words.list of products')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.product.create') }}"><i class="icon-puzzle"></i>@lang('words.create product')</a>
                        </li>

                    </ul>
                </li>
                 <li class="nav-title">
                   test1
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#"><i class="icon-docs"></i>test2</a>
                 </li>

                 <li class="nav-title">
                    test3
                 </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard.settings') }}""><i class="icon-people"></i>@lang('words.settings')</a>
                     <a class="nav-link" href="#"><i class="icon-docs"></i>  test4</a>
                 </li>


                 <li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> Font Awesome</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="icons-simple-line-icons.html"><i class="icon-star"></i> Simple Line Icons</a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span class="tag tag-info">NEW</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
                 </li>
                 <li class="divider"></li>
                 <li class="nav-title">
                     Extras
                 </li>
                 <li class="nav-item nav-dropdown">
                     <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                     <ul class="nav-dropdown-items">
                         <li class="nav-item">
                             <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                         </li>
                     </ul>
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
 </body>

 </html>
