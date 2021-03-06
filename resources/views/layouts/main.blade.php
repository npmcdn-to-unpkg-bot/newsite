<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


	<link href="{{asset('assets/fonts/font-face/Blogger_Sans.css')}}" rel="stylesheet" />

	<link href="{{asset('assets/css/spectrum.css')}}" rel="stylesheet" />
	
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />


	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

	<script type="text/javascript" src="{{ URL::asset('js/fabric.js') }}"></script>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
	<body>
	
	@if(session('errors'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Danger!</strong> {{session('errors')}}
		</div>
	@endif

	@if(session('sended'))
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Success!</strong> {{session('sended')}}
		</div>
	@endif

    <header>
		<div class="container-fluid">
			<div class="col-xs-12 col-sm-3">
				<a href="/">
				@foreach($logo as $iLogo)
					<img class="img-responsive" src="{{asset('assets/images/'.$iLogo->logo)}}" alt="UPGROUP" />
				@endforeach
				</a>
			</div>
			<div class="col-xs-12 col-sm-5 pull-right">
			@if(isset($cart))<div class="count-cart">{{$cart}}</div>@endif
				<ul class="header-items">
					<li>
						<a href="callto://{{$number}}">
							<span>Need help?<br />1.773.669.5155</span>
							<img src="{{asset('assets/images/icons/headphone.png')}}" alt="Need help?" />
						</a>
					</li>
					<li>
						<a href="{{url('/auth/login')}}">
							<span>Sign in<br />My account</span>
							<img src="{{asset('assets/images/icons/account.png')}}" alt="My account" />
						</a>
					</li>
					<li>
						<a href="{{url('admin/cart')}}">
							<span>Cart</span>
							<img src="{{asset('assets/images/icons/cart.png')}}" alt="cart" />
						</a>
					</li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-3 col-sm-offset-1">
				<div class="dropdown header-nav">
					<button id="dropdown-toggle-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Products
						<i class="fa fa-angle-down" aria-hidden="true"></i>
					</button>
					<ul class="dropdown-menu" id="dropdown-menu-1">
						@foreach($menu as $iMenu)
							<li><a href="#{{$iMenu->anchor}}">{{$iMenu->item}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		
		<!-- ---------- header-carousel ---------- -->
		<div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
		
			<div class="carousel-inner header-carousel" role="listbox">
			
			
			@foreach($slider as $iSlider)

				<div class="item">
					<img src="{{asset('assets/images/'.$iSlider->images)}}" />
					<div class="col-xs-12 col-sm-6">
						<h1>High-quality, custom fabic banner.</h1>
						<h2>With a 100% Satisfaction Guarantee</h2>
					</div>
				</div>
			@endforeach
			
			@if(!$slider->isEmpty())
			<script type="text/javascript">
	
				$('.header-carousel :first-child').attr('class', 'item active');
	
			</script>
			@endif

			</div>
		</div>
	</header>

	@yield('content')

	<footer>
		<h1>Contact information</h1>
		<div class="container-fluid">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="col-xs-12 col-sm-8 center-block">
							<h1 class="m-0 text-center">Write to us</h1>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="col-xs-12 col-sm-8 center-block">
							<h1 class="m-0">Local pickup</h1>
						</div>
					</div>
				</div>
				<div class="row footer-content">
					<div class="col-xs-12 col-sm-6 b-l">
						<div class="col-xs-12 col-sm-8 center-block">
							<form class="form-feedback" action="/feedback" method="post" enctype="multipart/form-data" >

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								
								<div class="col-xs-12 col-sm-6">
									<input class="form-control" type="text" name="name" placeholder="Your Name" />
								</div>
								<div class="col-xs-12 col-sm-6">
									<input class="form-control" type="email" name="email" placeholder="Your Email" />
								</div>
								<div class="col-xs-12">
									<input class="form-control" type="text" name="phone" placeholder="Your Phone" />
								</div>
								<div class="col-xs-12">
									<textarea class="form-control" name="q" placeholder="Your Question"></textarea>
								</div>
								
								<div class="col-xs-12 col-sm-6">
									<label class="btn btn-warning btn-block"><input class="hidden" type="file" name="file" /><i class="fa fa-plus"></i> Attach file</label>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input class="btn btn-pink btn-block" type="submit" value="SEND" />
								</div>
							</form>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="col-xs-12 col-sm-8 center-block">
							<h4 style="color:#939393">2150 N. WEST St. River Grove, IL 60171</h4>
							<a href="#">View on the map</a>
							<div>
							@foreach($soc as $iSoc)
								<a href="{{$iSoc->href}}" target="_blank"><img src="{{asset('assets/images/'.$iSoc->image)}}" /></a>
							@endforeach
							</div>
							<h1 class="text-warning"><a href="callto://{{$number}}">{{$number}}</a></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</body>
</html>


