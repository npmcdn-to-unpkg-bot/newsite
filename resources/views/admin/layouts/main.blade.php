<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/mystyle.css') }}">
	<script type="text/javascript" src="{{ URL::asset('js/fabric.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jscolor.js') }}"></script>
  

 <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{Url('admin/gallery')}}">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="{{ Url('auth/logout') }}">LogOut</a></li>
          </ul>
        </div>
      </div>
    </nav>
		<BR><BR><BR><BR>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="{{Url('admin/create')}}">Create Canvas</a></li>
            <li><a href="{{Url('admin/gallery')}}">Gallery Canvas</a></li>
          </ul>
        </div>

  @yield('content')
      </div>
    </div>
  </body>


</html>