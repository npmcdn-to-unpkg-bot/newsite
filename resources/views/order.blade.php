@extends('layouts.main')

@section('content')
	<form class="new-order-form" action="/order" method="post" enctype="multipart/form-data">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<h1>Your information</h1>
		
		<div class="container">
			<div class="form-group">
				<div>First name</div>
				<div><input class="form-control" type="text" name="first_name" /></div>
			</div>
			<div class="form-group">
				<div>Last name</div>
				<div><input class="form-control" type="text" name="last_name" /></div>
			</div>
			<div class="form-group">
				<div>Email</div>
				<div>
					<input class="form-control" type="email" name="email" />
					<span class="input-desc">Where we'll send your design</span>
				</div>
			</div>
			<div class="form-group">
				<div>Phone</div>
				<div>
					<input class="form-control" type="text" name="phone" />
					<span class="input-desc">In case we need to call you about your order</span>
				</div>
			</div>
		</div>

		<h1 class="details-title">DETAILS (wording, colors, etc.)</h1>
		
		<div class="container">
			<div class="form-group">
				<div>
					<div class="color-container">
						<input class="color" type="hidden" name="company_name_color" value="#57e092" />
					</div>
				</div>
				<div>
					<input class="form-control" type="text" name="company_name" placeholder="Company Name" />
				</div>
			</div>
			<div class="form-group">
				<div>
					<div class="color-container">
						<input class="color" type="hidden" name="company_massage_color" value="#57e092" />
					</div>
				</div>
				<div>
					<input class="form-control" type="text" name="company_massage" placeholder="Company Massage" />
				</div>
			</div>
			<div class="form-group">
				<div>
					<div class="color-container">
						<input class="color" type="hidden" name="company_phone_color" value="#57e092" />
					</div>
				</div>
				<div>
					<input class="form-control" type="text" name="company_phone" placeholder="Phone|Other" />
				</div>
			</div>
			<div class="form-group">
				<div>
					<div class="color-container">
						<input class="color" type="hidden" name="company_web_color" value="#57e092" />
					</div>
				</div>
				<div>
					<input class="form-control" type="text" name="company_web" placeholder="Web|Other" />
				</div>
			</div>
			<div class="form-group">
				<div>
					<div class="color-container">
						<input class="color" type="hidden" name="activity_color" value="#57e092" />
					</div>
				</div>
				<div>
					<input class="form-control" type="text" name="activity" placeholder="Activity of" />
				</div>
			</div>
			<div class="form-group">
				<div>
					<div class="color-container">
						<input class="color" type="hidden" name="logo_color" value="#57e092" />
					</div>
				</div>
				<div class="logo-container">
					<input class="form-control" type="text" name="logo_text" placeholder="Logo" />
					<label class="btn btn-warning"><input class="hidden" type="file" name="logo_file" />Upload your Logo</label>
				</div>
			</div>
			<div class="form-group m-0">
				<div></div>
				<div style="margin-left:-106px">
					<textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
				</div>
			</div>
		</div>
		
		<h1 style="font-weight:bold">YOU GET A FREE DESIGN EMAIL.<br />AFTER APPROVAL, YOU WILL BE ABLE<br />TO ORDER PRINTS.</h1>
		
		<div class="container text-center">
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
	</script>

@stop


























