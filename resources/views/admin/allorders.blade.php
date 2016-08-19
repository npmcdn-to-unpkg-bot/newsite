@extends('admin.layouts.main')
    

@section('content')
<div class="container">

<div class="container">


<div class="container-fluid bg-3 text-center">
<h3>View All Canvas</h3><br>
<div class="row">
@foreach($orders as $iOrder)
<div class="col-sm-4">
<p><a href="{{url('view/'.$iOrder->id_cnv)}}">{{$iOrder->name}}</a> | {{$iOrder->user_name}} | {{$iOrder->price}}$</p>
<canvas style="border: 2px solid gray; border-radius: 5px;" id="cnv-{{$iOrder->id}}"></canvas>
<script type="text/javascript">

    var canvas = new fabric.StaticCanvas('cnv-{{$iOrder->id}}');
    canvas.setHeight(500);
    canvas.setWidth(600);

    var jsn = '{!!$iOrder->json_data!!}';

    var factor = 0.4;
                      
    var myobjects = canvas.getObjects();

    canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas), function(o, object){

        if (canvas.backgroundImage) {

            var bi = canvas.backgroundImage;
            bi.width = bi.width * factor; bi.height = bi.height * factor;
        }
        

        var scaleX = object.scaleX;
        var scaleY = object.scaleY;
        var leftObj = object.left;
        var topObj = object.top;

        var tempScaleX = scaleX * factor;
        var tempScaleY = scaleY * factor;
        var tempLeft = Math.round(leftObj * factor);
        var tempTop = Math.round(topObj * factor);

        object.scaleX = tempScaleX;
        object.scaleY = tempScaleY;
        object.left = tempLeft;
        object.top = tempTop;

        object.setCoords();


    });

        canvas.setHeight(canvas.getHeight() * factor);
        canvas.setWidth(canvas.getWidth() * factor);
        canvas.renderAll();
        canvas.calcOffset();

</script>
<br>
<br>

<br>
<br>
<br>
<br>
</div>
@endforeach


</div>
<div>{!! $orders->render() !!}</div>
  </div>
</div>

  </div>
</div>
@stop
