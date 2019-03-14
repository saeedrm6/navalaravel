<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('panel/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('panel/css/styles.css')}}" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('panel/js/html5shiv.js')}}"></script>
    <script src="{{asset('panel/js/respond.min.js')}}"></script>
    <![endif]-->

    @yield('metaheader')
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Nava-</span>Admin</a>

        </div>
    </div><!-- /.container-fluid -->
</nav>
@include('dashboard.sidebar')

@yield('content')

<script src="{{asset('panel/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('panel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('panel/js/chart.min.js')}}"></script>
<script src="{{asset('panel/js/chart-data.js')}}"></script>
<script src="{{asset('panel/js/easypiechart.js')}}"></script>
<script src="{{asset('panel/js/easypiechart-data.js')}}"></script>
<script src="{{asset('panel/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('panel/js/custom.js')}}"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>