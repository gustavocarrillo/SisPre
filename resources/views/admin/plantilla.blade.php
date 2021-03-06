<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SisPre | @yield('titulo')</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
        <!-- /core JS files -->

        <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>

        <!-- Theme JS files -->

        @yield('js')

        <!-- /theme JS files -->
    </head>

    <body>

    <!-- Main navbar -->
    {{-- @include('admin.partials.main_navbar') --}}
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main sidebar-default">
                <div class="sidebar-content">

                    <!-- User menu -->
                    @include('admin.partials.user_menu')
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    @include('admin.partials.main_navigation')
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                @include('admin.partials.page_header')
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Dashboard content -->
                    <div class="row">

                        @yield('contenido')


                        {{--<div class="col-lg-4">
                            <h1>col-2</h1>
                        </div>--}}
                    </div>
                    <!-- /dashboard content -->


                    <!-- Footer -->
                    @include('admin.partials.footer')
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->



    <!-- Theme JS files -->

    @yield('js_pie')

    <!-- /theme JS files -->
    </body>
</html>
