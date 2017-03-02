<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

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

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/login.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content pb-20">

                <!-- Tabbed form -->
                <div class="tabbable panel login-form width-400">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#basic-tab1" data-toggle="tab"><h6>Entrar</h6></a></li>
                    </ul>

                    <div class="tab-content panel-body">
                        <div class="tab-pane fade in active" id="basic-tab1">
                            <form action="{{ route('user-login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300"><i class="glyphicon glyphicon-user"></i></div>
                                    <h5 class="content-group">Entra en tu cuenta<small class="display-block">Tus datos</small></h5>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    <input type="password" class="form-control" placeholder="Contraseña" name="clave" required="required">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group login-options">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="login_password_recover.html">Olvidaste tu clave?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn bg-pink-400 btn-block">Entrar <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                                @include('flash::message')

                            </form>

                            <span class="help-block text-center no-margin">Sistema de Presupuesto <a href="#">Alcaldia Bolivariana de Maturín</a></span>
                        </div>
                    </div>
                </div>
                <!-- /tabbed form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
