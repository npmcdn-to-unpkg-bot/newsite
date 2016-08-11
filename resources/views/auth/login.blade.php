@extends('admin.layouts.main')


{{-- Content --}}
@section('content')
<div class="col-sm-2">
<form method="POST" action="/auth/login">
  {!! csrf_field() !!}

 <div class="form-group">
  <label for="usr">Email:</label>
  <input type="text" class="form-control" name="email" id="usr" value="{{ old('email') }}">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name="password" id="pwd" value="{{ old('password') }}"><br>
  <a href="{{Url('auth/register')}}">registration</a><br><br>
  <button type="submit" class="btn btn-primary">Log In</button>
</div>
</form>
</div>
@endsection