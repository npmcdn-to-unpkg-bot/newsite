@extends('layouts.main')
	
@section('content')
	
	<!-- ---------- price-container ---------- -->
	<div id="banners"></div>
	<div class="container-fluid">
		<div class="container">
			<div class="col-xs-12 col-md-6">
				<h1 class="m-t-100 text-xs-center">Banner starting at</h1>
				<div class="price-container text-xs-center">
					<div class="h1 price-old">$7 sq.ft</div>
					<div class="h1 price">$<span>3</span> sq.ft<div class="new-price-banner">New price!</div></div>
				</div>
				<p style="font-size:22px">Условный текст. Приемущества бла o strengths durable, fade-resistant vinyl to display with metal grommets, vertical stands or adhesive hangers.</p>
			</div>
			<div class="col-xs-12 col-md-6">
				<img class="img-responsive" src="{{asset('assets/images/printer.png')}}" alt="BIG PRINTER" />
			</div>
		</div>
	</div>
	
	<div class="hr-color"></div>
	
	<div class="container-fluid text-center section-2">
		<h1 class="text-warning">Do not wasted your time.<br />Entrust us the job</h1>
		<a href="{{url('admin/prepair')}}" class="btn btn-warning btn-warning-gradient btn-lg text-uppercase">Get started</a>
		<h1>Durable, waterproof vinyl</h1>
	</div>
	
	<div class="container-fluid section-3">
		<div class="col-xs-12 col-sm-5 col-sm-offset-1 item">
			<img src="{{asset('assets/images/icons/chair.png')}}" alt="CHAIR" />
			<div>
				<h2>Indoor</h2>
				<p>13-oz. vityl is perfect for indoor events.</p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-5 item">
			<img src="{{asset('assets/images/icons/bild.png')}}" alt="BILD" />
			<div>
				<h2>Outdoor</h2>
				<p>15-oz. vityl is tough enough to withstand the elements.</p>
			</div>
		</div>
		<div class="col-xs-12">
			<h3 class="text-center">Choose from two strengths of durable,<br />fade-resistant vinyl to display with metal grommets,<br />vertical stands or adhesive hangers.</h3>
		</div>
	</div>
	
	<!-- ---------- section-sizes ---------- -->
	<div class="container-fluid section-sizes">
		<div class="container">
			<h1 class="text-center">Sizes for every need</h1>
			
			<div class="col-xs-12 col-md-2">
				<p class="sizes-desc">Display your banner horizontally or vertically. With so many sizes to choose from, you’ll find the perfect one for your message and space.</p>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="row">
					<div class="sizes-container">
						<img class="visible-lg-table-cell" src="{{asset('assets/images/man.png')}}" alt="man" />
						<img class="hidden-md hidden-lg" src="{{asset('assets/images/6ft.png')}}" alt="man" />
						<div class="sizes-content">
							<table class="sizes-table">
								<tbody>
									<tr>
										<td class="banners banner-2 banner-3 banner-4 banner-5 banner-6 banner-7 banner-8 banner-9 select"><div class="banners banner-1 banner-2 banner-3 banner-4 banner-5 banner-6 banner-7 banner-8 banner-9 select"></div></td>
										<td class="banners banner-4 banner-5 banner-6 banner-7 banner-8 banner-9 select"></td>
										<td class="banners banner-6 banner-7 banner-8 banner-9 select"></td>
										<td class="banners banner-8 banner-9"></td>
										<td class="banners banner-9"></td>
									</tr>
									<tr>
										<td class="banners banner-3 banner-5 banner-7"></td>
										<td class="banners banner-5 banner-7"></td>
										<td class="banners banner-7"></td>
									</tr>
								</tbody>
							</table>
							<div class="sizes-range-container">
								<h3 class="text-center"><strong><span id="sizes-baner-size">2.5'x8'</span> Banner</strong> - Starting at $<span id="sizes-price">52.00</span></h3>
								<div id="sizes-range"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ---------- section-popular-templates ---------- -->
	<div class="container-fluid section-popular-templates">
	
		<div class="container">
			<h1 class="text-center">Popular templates</h1>
			
			<ul class="template-filter">
	
			@foreach($cat as $iCat)
				<li>
					<a href="#" data-filter=".{{$iCat->title}}" class="active">
						<img class="img-responsive" src="{{asset('assets/images/'.$iCat->image)}}" alt="" />
					</a>
				</li>
			@endforeach
	
			</ul>
			<div class="templates-container">
			
	@foreach($cvn as $iCvn)
				
				<div class="col-xs-6 col-sm-3 template-item {{$iCvn->cat_name}}">
	
					<canvas style="border: 1px solid gray;" id="cnv-{{$iCvn->id}}"></canvas>
					<script type="text/javascript">
					    var canvas = new fabric.StaticCanvas('cnv-{{$iCvn->id}}');
		            canvas.setHeight(

		                @if(!empty($iCvn->size_h)) {{$iCvn->size_h}}
		                @else 
		                400
		                @endif

		            );
		            canvas.setWidth(

		                @if(!empty($iCvn->size_w)) {{$iCvn->size_w}}
		                @else 
		                600
		                @endif

		            );
	
					    var jsn = '{!!$iCvn->json_data!!}';
						
					    var factor = $('#cnv-{{$iCvn->id}}').parent().width() / canvas.getWidth();
						
						if($(window).width() <= 1400){
							factor = 0.4;
						}
	
						if($(window).width() <= 1120){
							factor = 0.3;
						}
	
						if($(window).width() <= 860){
							factor = 0.2;
						}
	                      
					    var myobjects = canvas.getObjects();
	
					    canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas), function(o, object){
	
					        if (canvas.backgroundImage) {
	
					            var bi = canvas.backgroundImage;
					            bi.width = bi.width * factor; bi.height = bi.height * factor;
					        }
					        
	
					        var scaleX = object.scaleX;
					        var scaleY = object.scaleY;
					        var leftObj = object.left;
					        var topObj = object.top;
	
					        var tempScaleX = scaleX * factor;
					        var tempScaleY = scaleY * factor;
					        var tempLeft = Math.round(leftObj * factor);
					        var tempTop = Math.round(topObj * factor);
	
					        object.scaleX = tempScaleX;
					        object.scaleY = tempScaleY;
					        object.left = tempLeft;
					        object.top = tempTop;
	
					        object.setCoords();
	
	
					    });
	
					        canvas.setHeight(canvas.getHeight() * factor);
					        canvas.setWidth(canvas.getWidth() * factor);
					        canvas.renderAll();
					        canvas.calcOffset();
	
					</script>
	
				</div>
			@endforeach
			<script>
				var max_h = 0;
				
				$('.template-item').each(function(){
					var $t_h = $(this).height();
					
					if($t_h > max_h) max_h = $t_h;
				});
				
				$('.template-item').height(max_h);
			</script>
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
@foreach($qa as $iQA)
				<div class="panel panel-default ">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#questions-accordion" href="#q-{{$iQA->id}}">{{$iQA->question}}</a>
						</h4>
					</div>
					<div id="q-{{$iQA->id}}" class="panel-collapse collapse">
						<div class="panel-body">{{$iQA->answer}}</div>
					</div>
				</div>
@endforeach

<script>
	$(document).ready(function(){

		$('.panel-default').first().attr('class', 'panel panel-default open');
		$('.panel-collapse').first().attr('class', 'panel-collapse collapse in');
		
	});
</script>
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
					stagger: 4
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
			
			table_resize();
			
			$(window).resize(function(){
				table_resize();
			});
			
			function table_resize(){
				var $table = $('.sizes-table'),
					t_w = $table.innerWidth(),
					t_h = $table.innerWidth() / 2.957186544342508;
				$table.height(t_h);
				$('.section-sizes .sizes-container > img').height(t_h * 1.629969418960245);
				$('.section-sizes .sizes-table > tbody > tr > td > div').css('background-size', t_w + 'px ' + t_h + 'px')
			}
		});

	</script>

@stop


























