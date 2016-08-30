<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/mystyle.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/fabric.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jscolor.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>

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
          <a class="navbar-brand" href="{{Url('/gallery')}}"><span class="glyphicon glyphicon-asterisk" ></span> UP GROUP Printing Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ Url('/') }}"><span class="glyphicon glyphicon-home"></span>&nbsp;home</a></li>
            @if(isset(Auth::user()->is_admin) && !Auth::user()->is_admin)
              <li><a href="{{ Url('/admin/cart') }}"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;cart @if(isset($cart))<span id="count_cart_span_admin" style="background-color: white; padding: 0 3px; color: black;">  {{$cart}} </span>@endif</a></li>
            @endif
            @if(isset(Auth::user()->name))
              <li><a href="{{ Url('auth/logout') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;{{ Auth::user()->name}} > logOut</a></li>
            @else
              <li><a href="{{ Url('auth/login') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;logIn</a></li>
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
            <li><a href="{{Url('admin/create')}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;Create MyCanvas</a></li>
            <li><a href="{{Url('admin/mycnv')}}"><span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;Gallery MyCanvas</a></li>

            @if(isset(Auth::user()->is_admin) && !Auth::user()->is_admin)
            <li><a href="{{Url('admin/status')}}"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;&nbsp;Status Ordered</a></li>
            @endif
            <li><a href="{{Url('gallery')}}"><span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;&nbsp;Gallery AllCanvas</a></li>
            <br>

            @if(isset(Auth::user()->is_admin) && Auth::user()->is_admin)
            <li><a href="{{Url('admin/sizeprice')}}"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Size and Price</a></li>
            <li><a href="{{Url('admin/material')}}"><span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;&nbsp;Material</a></li>
            <li><a href="{{Url('admin/hanger')}}"><span class="glyphicon glyphicon-pushpin"></span>&nbsp;&nbsp;&nbsp;Hangers</a></li>
            <li><a href="{{Url('admin/components')}}"><span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;&nbsp;Components</a></li>
            <li><a href="{{Url('admin/menu')}}"><span class="glyphicon glyphicon-option-horizontal"></span>&nbsp;&nbsp;&nbsp;Menu Items</a></li>
            <li><a href="{{Url('admin/qa')}}"><span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;&nbsp;Question & Answer</a></li>
            <li><a href="{{Url('admin/subs')}}"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp;Subscriptions</a></li>
            <li><a href="{{Url('admin/categories')}}"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;&nbsp;&nbsp;Categories</a></li>
            <li><a href="{{Url('admin/orders')}}"><span class="glyphicon glyphicon-usd"></span>&nbsp;&nbsp;&nbsp;Order Banner</a></li>
            <li><a href="{{Url('admin/dispatch')}}"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;Dispatch</a></li>
            <li><a href="{{Url('admin/settings')}}"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Settings</a></li>
            @endif

          </ul>
        </div>

      @yield('content')
      </div>
    </div>
  </body>


</html>