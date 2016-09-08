@extends('layouts.main')
	
@section('content')
	
	<!-- ---------- price-container ---------- -->
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-6">
			<h1 class="m-t-100">Vinyl Lettering STARTING AT</h1>
			<div class="price-container">
				<div class="h1 price-old">$4 sq.ft</div>
				<div class="h1 price">$<span>3</span> sq.ft<div class="new-price-banner">New price!</div></div>
			</div>
			<p style="font-size:22px">Use Vinyl Lettering to display store hours and<br />
			information, or create a custom message for your<br />
			store. Made from durable vinyl material, they’re<br />
			available in a variety of colors and fonts, and apply<br /> 
			easily to any smooth surface.</p>
		</div>
		<div class="col-xs-12 col-sm-6">
			<img class="img-responsive" src="{{asset('assets/images/printer_1.png')}}" alt="LAPTOP" style="margin-top:40px" />
		</div>
	</div>
	
	<div class="hr-color"></div>
	
	<div class="container-fluid text-center section-2">
		<h1 class="text-warning">Do not wasted your time.<br />Entrust us the job</h1>
		<a href="{{url('auth/login')}}" class="btn btn-warning btn-warning-gradient btn-lg text-uppercase">Get started</a>
	</div>
	
	<!-- ---------- examples-container ---------- -->
	<div class="container-fluid section-examples">
		<h2>The windows of your store or business represent free advertising space. While anyone can tape up posters and signs in their window space, customers are guaranteed to recognize the difference between a boring storefront and a sleek, custom-designed window display.</h2>
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<img class="img-responsive" src="{{asset('assets/images/examples/example_13.png')}}" alt="example" />
			</div>
			<div class="col-xs-12 col-sm-4">
				<img class="img-responsive" src="{{asset('assets/images/examples/example_14.png')}}" alt="example" />
			</div>
			<div class="col-xs-12 col-sm-4">
				<img class="img-responsive" src="{{asset('assets/images/examples/example_15.png')}}" alt="example" />
			</div>
		</div>
	</div>
	
	<!-- ---------- constructor-container ---------- -->
	<div class="container-fluid section-constructor">
		<h1 class="text-center">Design Your Own Vinyl Lettering<br /> 
		&amp; Stickers Online!</h1>
		
		<img class="img-responsive" src="{{asset('assets/images/redactor.png')}}" alt="example" style="margin:10px auto 30px" />
	</div>
	
	<div class="hr-color"></div>
	
	<!-- ---------- section-questions ---------- -->
	<div class="container-fluid section-questions">
		<h1 class="text-center">Frequently asked question</h1>
		
		<div class="panel-group" id="questions-accordion">
			<div class="panel panel-default open">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#questions-accordion" href="#q-1">What would you like Give us an idea of the logo you're looking for with our quick and easy form?</a>
					</h4>
				</div>
				<div id="q-1" class="panel-collapse collapse in">
					<div class="panel-body">Unlike all of our other signs which are printed directly onto the material, our vinyl lettering is created from colored vinyl. Our machines and production staff then cut and weed (remove the excess) and apply the transfer tape to your lettering to prepare it for installation. Because we do not print on cut vinyl, the number of colors to choose from is limited. If you are interested in a design with gradients or many colors within the design, vinyl lettering is not a fit. But we can still help you, so please contact us.</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#questions-accordion" href="#q-2">What is your vinyl lettering made from?</a>
					</h4>
				</div>
				<div id="q-2" class="panel-collapse collapse">
					<div class="panel-body">Unlike all of our other signs which are printed directly onto the material, our vinyl lettering is created from colored vinyl. Our machines and production staff then cut and weed (remove the excess) and apply the transfer tape to your lettering to prepare it for installation. Because we do not print on cut vinyl, the number of colors to choose from is limited. If you are interested in a design with gradients or many colors within the design, vinyl lettering is not a fit. But we can still help you, so please contact us.</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="collapsed" data-toggle="collapse" data-parent="#questions-accordion" href="#q-3">Do you offer alternative types of vinyl lettering like reflective or marine vinyl?</a>
					</h4>
				</div>
				<div id="q-3" class="panel-collapse collapse">
					<div class="panel-body">Unlike all of our other signs which are printed directly onto the material, our vinyl lettering is created from colored vinyl. Our machines and production staff then cut and weed (remove the excess) and apply the transfer tape to your lettering to prepare it for installation. Because we do not print on cut vinyl, the number of colors to choose from is limited. If you are interested in a design with gradients or many colors within the design, vinyl lettering is not a fit. But we can still help you, so please contact us.</div>
				</div>
			</div>
		</div>
	</div>
	
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="https://unpkg.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>

    <script>

		$(function(){
			var sizes_inf = {
					size: ["1'x1.5'", "2.5'x3'", "3.5'x3'", "2.5'x5'", "3.5'x5'", "2.5'x8'", "3.5'x8'", "2.5'x10'", "2.5'x12'"],
					price: ["32.00", "36.00", "40.00", "44.00", "48.00", "52.00", "56.00", "60.00", "64.00"]
				},
				$baner_size = $('#sizes-baner-size'),
				$baner_price = $('#sizes-price');
			
			$('#sizes-range').slider({
				range: 'max',
				min: 1,
				max: 9,
				value: 6,
				slide: function(event,ui) {
					$('.banners').removeClass('select');
					$('.banner-' + ui.value).addClass('select');
					$baner_size.text(sizes_inf.size[ui.value - 1]);
					$baner_price.text(sizes_inf.price[ui.value - 1]);
				}
			});
			
			$(window).load(function(){
				var $portfolio_selectors = $('.template-filter > li > a');
				var $portfolio = $('.templates-container');
				
				$portfolio.isotope({
					percentPosition: true,
					itemSelector: '.template-item',
					layoutMode: 'masonry',
					stagger: 4,
					masonry: {
						columnWidth: '.col-xs-3'
					}
				});
				
				$portfolio_selectors.on('click', function(){
					$portfolio_selectors.removeClass('active');
					$(this).addClass('active');
					
					$portfolio.isotope({ filter: $(this).data('filter') });
					
					return false;
				});
			});
			
			$('.panel-collapse').on('show.bs.collapse', function () {
				$(this).parent().addClass('open');
			});
			
			$('.panel-collapse').on('hide.bs.collapse', function () {
				$(this).parent().removeClass('open');
			});
		});

	</script>

@stop