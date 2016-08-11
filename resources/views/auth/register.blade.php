@extends('admin.layouts.main')

@section('content')

<div class="col-sm-2">
  <form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <label for="name">Name</label>
    	<input type="text" class="form-control" class="form-control" name="name" value="{{ old('name') }}"><br>

    <label for="email">Email</label>
    	<input type="email" class="form-control" name="email" value="{{ old('email') }}"><br>

    <label for="password">Password</label>
    	<input type="password" class="form-control" name="password"><br>

    <label for="password_confirmation">Confirm password</label>
     	<input type="password" class="form-control" name="password_confirmation"><br>
	<button type="submit" class="btn btn-primary">Register</button>
	</form>
</div>
@endsection