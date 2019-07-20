<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mika Tour Indonesia</title>


    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="/images/logo.jpeg" type="image/x-icon">
    <link rel="icon" href="/images/logo.jpeg" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color" />

</head>

<body>

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="login-card card-block">
                        <form class="md-float-material" method="post" action="/lupastaf">
                            <div class="text-center">
                                <h1>Mika Tour Indonesia</h1>
                            </div>
                            <hr>
                            <h3 class="text-center">
                                Forget Password
                            </h3>
                            @if(Session::get('success'))
                            <div class="alert alert-info">{{ Session::get('success') }}</div>
                            @endif
                            @csrf
                            <div class="md-group">
                                <div class="md-input-wrapper">
                                    <input type="text" class="md-form-control" name="email" />
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="btn-forgot">
                                <button type="submit" class="btn btn-primary btn-md waves-effect waves-light text-center">SEND RESET LINK
                                </button>
                            </div>
                            <!-- end of btn-forgot class-->
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
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>

    <!-- Required Jqurey -->
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/plugins/tether/dist/js/tether.min.js"></script>

    <!-- Required Fremwork -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- waves effects.js -->
    <script src="assets/plugins/Waves/waves.min.js"></script>

    <!-- Custom js -->
    <script type="text/javascript" src="assets/pages/elements.js"></script>

</body>

</html>