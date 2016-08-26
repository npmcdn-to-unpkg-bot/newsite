@extends('layouts.main')
	
@section('content')
	
	<!-- ---------- price-container ---------- -->
	<div class="container-fluid">
		<div class="container">
			<div class="col-xs-12 col-sm-7">
				<h1 class="m-t-100">Custom Stickers STARTING AT</h1>
				<div class="price-container">
					<div class="h1 price-old">$8 sq.ft</div>
					<div class="h1 price">$<span>6</span> sq.ft<div class="new-price-banner">New price!</div></div>
				</div>
				<p style="font-size:22px">Custom Stickers<br />
				Making the best vinyl stickers on earth.</p>
			</div>
			<div class="col-xs-12 col-sm-5">
				<img class="img-responsive" src="{{asset('assets/images/stecers.png')}}" alt="LAPTOP" style="margin-top:40px" />
			</div>
		</div>
	</div>
	
	<div class="hr-color"></div>
	
	<div class="container-fluid text-center section-2">
		<h1 class="text-warning">Do not wasted your time.<br />Entrust us the job</h1>
		<a href="{{url('auth/login')}}" class="btn btn-warning btn-warning-gradient btn-lg text-uppercase">Get started</a>
	</div>
	
	<!-- ---------- examples-container ---------- -->
	<div class="container-fluid section-examples">
		<div class="container">
			<h2>Vinyl stickers are one of the most powerful marketing tools, because you can reach your customers<br />
			anywhere, anytime. Vinyl stickers are perfect for promoting your business or website, advertising your new product or service, or even livening up your shopping bag, takeout boxes<br />
			or other marketing materials.</h2>
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<img class="img-responsive" src="{{asset('assets/images/examples/example_10.png')}}" alt="example" />
				</div>
				<div class="col-xs-12 col-sm-4">
					<img class="img-responsive" src="{{asset('assets/images/examples/example_11.png')}}" alt="example" />
				</div>
				<div class="col-xs-12 col-sm-4">
					<img class="img-responsive" src="{{asset('assets/images/examples/example_12.png')}}" alt="example" />
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid section-4">
		<div class="container">
			<h1>Not sure<br />what you need?<br />Take advantage of our<br /><strong>Free design sevices</strong></h1>
			<a href="{{url('/order')}}" class="btn btn-warning btn-warning-gradient btn-lg">GET STARTED!</a>
		</div>
	</div>
	
	<div class="container-fluid section-5">
		<div class="container">
			<div class="section-5-header">
				<div class="col-sm-3 hidden-xs">
					<div></div>
				</div>
				<div class="col-xs-12 col-sm-6 text-center">
					<h1 class="m-0">How it work? <span class="text-warning">Easy!</span></h1>
				</div>
				<div class="col-sm-3 hidden-xs">
					<div></div>
				</div>
			</div>
			<div class="section-5-content">
				<div class="col-xs-12 col-sm-3">
					<img src="{{asset('assets/images/icons/guider.png')}}" alt="guider" />
					<h3>What would you like?</h3>
					<p>Give us an idea of the logo<br />you're looking for with our quick<br />and easy form.</p>
				</div>
				<div class="col-xs-12 col-sm-1 arrow">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</div>
				<div class="col-xs-12 col-sm-3">
					<img src="{{asset('assets/images/icons/color_picker.png')}}" alt="color_picker" />
					<h3>Review your options</h3>
					<p>Pick your one favorite logo and<br />let our designers know if you<br />have any changes.</p>
				</div>
				<div class="col-xs-12 col-sm-1 arrow">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</div>
				<div class="col-xs-12 col-sm-3">
					<img src="{{asset('assets/images/icons/pen_tool.png')}}" alt="pen_tool" />
					<h3>Get your final design!</h3>
					<p>You'll receive your final design on<br />your order. Say hello to your<br />new identity.</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="hr-color"></div>
	
	<!-- ---------- section-questions ---------- -->
	<div class="container-fluid section-questions">
		<div class="container">
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
	</div>
	
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
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