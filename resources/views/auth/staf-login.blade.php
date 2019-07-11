<!DOCTYPE html>
<html lang="en">

<head>
    <title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="/assets/text/css">

    <!--ico Fonts-->
    <link rel="stylesheet" type="text/css" href="/assets/icon/icofont/css/icofont.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/color/color-1.min.css" id="color" />

</head>

<body>
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12">
                    <div class="login-card card-block">
                        <form method="post" action="{{ route('staf.login.submit') }}" class="md-float-material">
                            @csrf
                            <div class="text-center">
                                <h1>Mika Tour Travel</h1>
                            </div>
                            <hr>
                            <h3 class="text-center">
                                Staf login page
                            </h3>
                            <div class="md-input-wrapper">
                                <input type="text" name="username" class="md-form-control" />
                                <label>Username</label>
                            </div>
                            <div class="md-input-wrapper">
                                <input type="password" name="password" class="md-form-control" />
                                <label>Password</label>
                            </div>
                            <div class="row justify-content-end" style="margin-bottom: 20px;">
                                <div class="col-sm-12 col-xs-12 forgot-phone text-right">
                                    <a href="forgot-password.html" class="text-right f-w-600"> Forget Password?</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-10 offset-xs-1">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- end of login-card -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Required Jqurey -->
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/plugins/tether/dist/js/tether.min.js"></script>
    <!-- Required Fremwork -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves effects.js -->
    <script src="/assets/plugins/Waves/waves.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="/assets/pages/elements.js"></script>
</body>

</html>