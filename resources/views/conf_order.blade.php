@extends('layouts.main')

@section('content')
	<form class="new-order-form" action="/conf_order_send" method="post" enctype="multipart/form-data">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<h1>Your information</h1>
		
		<div class="container form">
			<div class="form-group">
				<div>First name</div>
				<div><input class="form-control" type="text" name="first_name" /></div>
			</div>
			<div class="form-group">
				<div>Last name</div>
				<div><input class="form-control" type="text" name="last_name" /></div>
			</div>
			<div class="form-group">
				<div>Company</div>
				<div>
					<input class="form-control" type="text" name="company" />
				</div>
			</div>
			<div class="form-group">
				<div>Adress Line 1</div>
				<div>
					<input class="form-control" type="text" name="adress_line_1" />
				</div>
			</div>
			<div class="form-group">
				<div>Adress Line 2</div>
				<div>
					<input class="form-control" type="text" name="adress_line_2" />
				</div>
			</div>
			<div class="form-group">
				<div>City</div>
				<div>
					<input class="form-control" type="text" name="city" />
				</div>
			</div>
			<div class="form-group">
				<div>Country</div>
				<div>
					<select class="form-control">
					    <option>United States</option>
					    <option>2</option>
					    <option>3</option>
					    <option>4</option>
				    </select>
				</div>
			</div>
			<div class="form-group">
				<div>State/Province/Region</div>
				<div>
					<select class="form-control">
					    <option>State</option>
				    </select>
				</div>
			</div>
			<div class="form-group">
				<div>Zip</div>
				<div class="logo-container">
					<input class="form-control" type="text" name="title_zip" placeholder="Zip" />
					<label class="btn btn-warning"><input class="hidden" type="file" name="zip_file" />Upload your Zip</label>
				</div>
			</div>
		</div>
		
		<div class="container text-center">
			<input type="hidden" name="user" value="{{$user}}">
			<input class="btn btn-warning btn-warning-gradient btn-lg" type="submit" value="SUBMIT" />
		</div>
	</form>
	

	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/spectrum.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script>
		$('.color').spectrum({
			preferredFormat: "hex",
			showInput: true,
			showAlpha: true,
			showInitial: true,
			showButtons: false
		});
		if($(document).width() < 500) {
			$('.form-1 .form-group > div:first-child').each(function(){
				var label = $(this).text();
				
				$(this).hide().siblings('div').find('.form-control').attr('placeholder', label);
			});
		}
	</script>

@stop


























