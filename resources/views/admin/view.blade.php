@extends('admin.layouts.main')
    

@section('content')
    <div class="container">
        <h2>View created canvases</h2>
        <p>This canvas is static!</p>            
        <table class="table table-hover">
            <thead>
              <tr>
                <th>name canvas</th>
                <th>prewiev canvas</th>
                <th>Options</th>
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
                <td>
                <a href="{{Url('admin/gedit/'.$iCvn->id)}}">Regedit</a>
                <br>
                <a href="{{Url('admin/delete/'.$iCvn->id)}}">Delete</a>
                </td>
                
            </tr>
            @endforeach
            </tbody>
        </table>
        <div>{!! $cvn->render() !!}</div>
    </div>
@stop
