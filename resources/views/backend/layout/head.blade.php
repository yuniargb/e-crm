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

     <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

     <!-- Responsive.css-->
     <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">

     <!--color css-->
     <link rel="stylesheet" type="text/css" href="/assets/css/color/color-1.min.css" id="color"/>

     <!-- DataTables -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/r-2.2.2/sc-2.0.0/datatables.min.css"/>
     <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/r-2.2.2/sc-2.0.0/datatables.min.js"></script>
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
