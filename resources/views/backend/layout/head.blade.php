<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mira Travel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="/assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="/assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Weather css -->
    <link href="/assets/css/svg-weather.css" rel="stylesheet">

    <!-- Echart js -->
    <script src="/assets/plugins/charts/echarts/js/echarts-all.js"></script>

    <!-- Select 2 css -->
    <link rel="stylesheet" href="/assets/plugins/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/plugins/select2/css/s2-docs.css">

    <!-- Multi Select css -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="/assets/plugins/multiselect/css/multi-select.css" />

    <!-- Tags css -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" />

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="/assets/css/color/color-1.min.css" id="color" />

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/backstyle.css">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <div class="loader-bg">
            <div class="loader-bar">
            </div>
        </div>
        <!-- Navbar-->
        @include('backend.layout.menu')
        <!-- Navbar-->

        <!-- Side-Nav-->
        @include('backend.layout.sidebar')
        <!-- Side-Nav-->
        <!-- Chat-->
        @include('backend.layout.chat')
        <!-- Chat-->
        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <!-- Row Starts -->
                @yield('content')

            </div>
            <!-- Container-fluid ends -->
        </div>
    </div>
    @include('backend.layout.footer')
</body>

</html>