@extends('admin.layouts.main')
    

@section('content')
    <div class="container">


<div class="container-fluid bg-3 text-center">
<h3>View All Canvas</h3><br>
<div class="row">
@foreach($cvn as $iCvn)
<div class="col-sm-4">
<p>{{$iCvn->name}}</p>
<canvas style="border: 2px solid gray; border-radius: 5px;" id="cnv-{{$iCvn->id}}"></canvas>
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

                    </script><br><br>
    <form action="{{Url('admin/add/'.$iCvn->id)}}" method="get">
    <br>
        <button type="submi" class="btn btn-success">add to my canvases</button>
    </form>
<br>
<br>
<br>
<br>
</div>
@endforeach


</div>
<div>{!! $cvn->render() !!}</div>
  </div>
</div>
@stop
