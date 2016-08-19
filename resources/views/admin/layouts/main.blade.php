<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/mystyle.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/fabric.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jscolor.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
</head>
<body>

  @if(session('errorsadmin'))
    <div class="alert alert-danger" style="margin-top: 50px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Danger!</strong> {{session('errorsadmin')}}
    </div>
  @endif
  @if(session('successadmin'))
    <div class="alert alert-success" style="margin-top: 50px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session('successadmin')}}
    </div>
  @endif

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{Url('/gallery')}}">UP GROUP Printing | Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ Url('/') }}">home</a></li>
            @if(!isset(Auth::user()->is_admin))
              <li><a href="{{ Url('/admin/cart') }}">cart @if(isset($cart))<span id="count_cart_span_admin" style="background-color: white; padding: 3px; color: black;">  {{$cart}} </span>@endif</a></li>
            @endif
            @if(isset(Auth::user()->name))
              <li><a href="{{ Url('auth/logout') }}">{{ Auth::user()->name}} > logOut</a></li>
            @else
              <li><a href="{{ Url('auth/login') }}">logIn</a></li>
            @endif
            
          </ul>
        </div>
      </div>
    </nav>
		<BR><BR><BR><BR>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="{{Url('admin/create')}}">Create MyCanvas</a></li>
            <li><a href="{{Url('admin/mycnv')}}">Gallery MyCanvas</a></li>
            <li><a href="{{Url('gallery')}}">Gallery AllCanvas</a></li>
            <br>

            @if(isset(Auth::user()->is_admin) && Auth::user()->is_admin)
            <li><a href="{{Url('admin/sizeprice')}}">Size and Price</a></li>
            <li><a href="{{Url('admin/categories')}}">Categories</a></li>
            <li><a href="{{Url('admin/orders')}}">Order Banner</a></li>
            <li><a href="{{Url('admin/settings')}}">Settings</a></li>
            @endif

          </ul>
        </div>

  @yield('content')
      </div>
    </div>
  </body>


</html>