<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<base href="{{asset('layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>

	<style>

		.list-unstyled{
			/* height: 350px; */
			background-color: #FF9600;
		    color: white;
		    line-height: 35px;
			margin: 0;
		}
		.list-unstyled li{
			/*margin-left: 10px;*/
			position: relative;
			cursor: pointer;
			padding: 5px;
			text-align: center;
			border-bottom: 1px solid white;
		}

		.list-unstyled li a{
			color: #222222;
			font-size: 14px;
			line-height: 35px;
			padding: 0px 15px;
			/*text-transform: uppercase;*/
			text-decoration: none;
			display: block;
		}

		.list-unstyled li:hover{
			color: #fff;
			background: #007d3f;
		}

		.list-unstyled li:hover .sub-menu{
			display: block;
		}
		
		.list-unstyled{
			padding-left: 0;
			list-style: none;
		}

		.sub-menu{
			background: #FF9600;
			padding: 0;
			margin: 0;
			list-style: none;
			position: absolute;
			left: -200px;
			top: 0px;
			display: none;
		}

		.sub-menu li{
			min-width: 200px;
		}

		.sub-menu li a{
			color: white;
		}
	</style>
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}"><img width="250px" height="75px" src="img/home/logo1.webp"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<form method="get" action="{{asset('search/')}}">
						<input type="text" name="result" placeholder="Tìm kiếm từ khóa">
						<input type="submit" value="Tìm Kiếm" style="cursor: pointer;">
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('/cart')}}">Giỏ hàng</a>
					<a href="{{asset('/cart')}}"><span id="count-cart"><?php echo $total_cart; ?></span></a>		    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">

						<ul class="list-unstyled">
							<li style="background: #007bff;"><a href="{{asset('/admin/home')}}" style="color: white; font-size: 18px;">Quản trị</a></li>
							@foreach($cate_parent_list as $cate_parent)
							<li>{{$cate_parent->name}}
								<ul class="sub-menu">
									@foreach($cate_small_list as $cate_small)
									@if($cate_small->parent_id == $cate_parent->id)
									<li><a href="{{asset('category/'.$cate_small->id)}}">{{$cate_small->name}}</a></li>
									@endif
									@endforeach
								</ul>
							@endforeach
							</li>
						</ul>

					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="{{asset('/')}}"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="{{asset('/')}}"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="{{asset('/')}}"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>
					<!-- Wrap inner -->

					@yield('main')

					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="{{asset('/')}}"><img width="250px" src="img/home/logo1.webp"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">COWELL-GEC SHOP thành lập năm 2019. Chúng tôi kinh doanh chuyên sâu trong 2 lĩnh vực là Mobile & Tablet nhằm cung cấp cho thị trường điện thoại thông minh và máy tính bảng Việt Nam những sản phẩm thực sự chất lượng, có nhiều chức năng tiện ích cao và phù hợp vs công nghệ hiện nay.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0988 550 553</p>
						<p>Email: cowell.gec.2019@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address : Tòa nhà 3D - Số 3 - Duy Tân - Cầu Giấy - Hà Nội</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p></p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p></p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="{{asset('/')}}"><img src="img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>

<script type="text/javascript" src="js/shopping.js"></script>
<script type="text/javascript" src="js/update-cart.js"></script>
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>

</html>