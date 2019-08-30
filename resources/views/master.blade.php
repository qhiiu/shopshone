<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9x shop </title>
    <base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">

    <style>
        .ribbon { z-index: 1;}

        .cart {
            border: 1px solid #e1e1e1;
            height: 50px;
            width: 200px;
            font-size: x-large;
            line-height: 47px;
            padding: 0 10px;
            cursor: pointer;
        }

        /* ----------------- */
        .beta-lists>* {
            padding: 13px;
            border-bottom: 1px dotted #e1e1e1;
            margin-top: 0;
        }
        .collapse , .navbar-collapse{
            font-size: 25px;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: white;
        }
        .navbar-inverse .navbar-nav>li>a:hover {
            color: lightgreen;
        }
        .navbar-nav>li {
            float: left;
            padding: 5px 20px;
        }
        .navbar-brand {
            padding: 20px;
            margin-left: -15px;
            font-size: 23px;
        }
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
            background-color: #215fa6;
            color: white;
        }
        .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
            text-decoration: none;
            color: red;
            background-color: powderblue;
        }
        .aside-menu {
            list-style: none;
            background: white;
            border: 1px solid #29bef1;
        }
        .aside-menu li a{
            padding: 10px 2px;
        }
        .list-group {
            border: 1px solid sandybrown;
        }
        .fixNav.col-sm-12 {
            width: 16.6666666666%;
            position: fixed;
            top: 130px;
            left: 75px;
            z-index: 1;
            border-bottom-width: 0px;
            border-top-width: 0px;  
        }
        .color-div {
            background: #A9F6FD!important;
        }
        .cart-item .media {
            margin-top: 0;
            line-height: 80%;
            padding-right: 0px;
        }
        .cart-item-delete {
            position: absolute;
            top: 20px;
            right: 0;
            background: white;
            font-size: 10px;
            width: 15px;
            height: 15px;
            text-align: center;
            line-height: 15px;
        }
        a i {
            color: #f00;
            font-size: 15px;
            padding-left: 0px;
            padding-right: 0;
        }
        .color-orange {
            color: orange;
        }
    </style>
</head>
<body style="font-family: -webkit-pictograph;">

    @include('header')

	<div class="rev-slider">
        @yield('content')
    </div> <!-- .container -->

	@include('footer')
    <!-- include js files -->


    <script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
    <script src="source/assets/dest/js/wow.min.js"></script>

	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
	<script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
</body>
</html>


