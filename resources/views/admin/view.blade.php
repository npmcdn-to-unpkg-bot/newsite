<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/fabric.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jscolor.js') }}"></script>
  

 <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">LogOut</a></li>
          </ul>
        </div>
      </div>
    </nav>
		<BR><BR><BR><BR>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="position:fixed;">
          <ul class="nav nav-sidebar">
            <li><a href="{{Url('admin')}}">Create Canvas</a></li>
            <li><a href="{{Url('admin/gallery')}}">Gallery Canvas</a></li>
          </ul>
        </div>



        <div class="container">
          <h2>View created canvases</h2>
          <p>This canvas is static!</p>            
          <table class="table table-hover">
            <thead>
              <tr>
                <th>name canvas</th>
                <th>prewiev canvas</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($cvn as $iCvn)
              <tr>
                <td>{{$iCvn->name}}</td>
                <td>
                    <canvas style="" id="cnv-{{$iCvn->id}}"></canvas>
                    <script type="text/javascript">
                        var canvas = new fabric.StaticCanvas('cnv-{{$iCvn->id}}');
                        canvas.setHeight(500);
                        canvas.setWidth(600);

                        var jsn = '{!!$iCvn->json_data!!}';

                        canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas));

                        var factor = 0.3;



                        var objects = canvas.getObjects();

                        for (var i in objects) {
                            var scaleX = objects[i].scaleX;
                            var scaleY = objects[i].scaleY;
                            var leftObj = objects[i].left;
                            var topObj = objects[i].top;

                            var tempScaleX = scaleX * factor;
                            var tempScaleY = scaleY * factor;
                            var tempLeft = Math.round(leftObj * factor);
                            var tempTop = Math.round(topObj * factor);

                            objects[i].scaleX = tempScaleX;
                            objects[i].scaleY = tempScaleY;
                            objects[i].left = tempLeft;
                            objects[i].top = tempTop;

                            objects[i].setCoords();
                        }

                        canvas.setHeight(canvas.getHeight() * factor);
                        canvas.setWidth(canvas.getWidth() * factor);
                        canvas.renderAll();

                    </script>
                </td>
                <td><a href="{{Url('admin/gedit/'.$iCvn->id)}}">Regedit</a></td>
                <td><a href="{{Url('admin/delete/'.$iCvn->id)}}">Delete</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div>{!! $cvn->render() !!}</div>
        </div>

      </div>
    </div>
</body>
</html>