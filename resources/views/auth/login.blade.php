@extends('admin.layouts.main')


{{-- Content --}}
@section('content')
<div class="col-sm-2">
<form method="POST" action="/auth/login">
  {!! csrf_field() !!}

 <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd"><br>
  <button type="submit" class="btn btn-primary">Primary</button>
</div>

</form>
</div>
@endsection