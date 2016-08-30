@extends('admin.layouts.main')
    

@section('content')

<div class="container">


<div class="container-fluid bg-3 text-center">
<h3>View All Canvas</h3><br>
<div class="row">
@foreach($orders as $iOrder)
<div class="col-sm-6">
<p><a href="{{url('view/'.$iOrder->id_cnv)}}">{{$iOrder->name}}</a> | {{$iOrder->user_name}} | {{$iOrder->price}}$ | {{$iOrder->title}}({{$iOrder->size}}) | {{$iOrder->mat_title}}(+{{$iOrder->mat_price}}$)
 | {{$iOrder->han_title}}(+{{$iOrder->han_price}}$)
@if($iOrder->status == true)
&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span>
@else
&nbsp;&nbsp;<span class="glyphicon glyphicon-hourglass"></span>
@endif

</p>
<canvas style="border: 1px solid #DCDCDC; border-radius: 1px;" id="cnv-{{$iOrder->id}}"></canvas>
<script type="text/javascript">

    var canvas = new fabric.StaticCanvas('cnv-{{$iOrder->id}}');

    canvas.setHeight(

    @if(!empty($iOrder->size_h)) {{$iOrder->size_h}}
    @else 
    400
    @endif

    );
    canvas.setWidth(

    @if(!empty($iOrder->size_w)) {{$iOrder->size_w}}
    @else 
    600
    @endif

    );

    var jsn = '{!!$iOrder->json_data!!}';

    var factor = 0.5;
                      
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
    <a href="{{url('/admin/wait/'.$iOrder->id)}}" class="btn btn-info">
        <span class="glyphicon glyphicon-hourglass"></span> Wait
    </a>
    <a href="{{url('/admin/done/'.$iOrder->id)}}" class="btn btn-info">
        <span class="glyphicon glyphicon-ok"></span> Done
    </a>
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
