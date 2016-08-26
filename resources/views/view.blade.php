@extends('admin.layouts.main')
    

@section('content')
    <div class="container">

@foreach($cvn as $iCvn)
<div class="container-fluid bg-1 text-center">
<h3>View '{{$iCvn->name}}' Canvas</h3><br>
<p>by {{$iCvn->user_name}}</p>
<div class="row">

<div class="col-bg-1">
<canvas style="border: 2px solid gray; border-radius: 5px;" id="cnv-{{$iCvn->id}}"></canvas>
<canvas style="display: none;" id="cnv"></canvas>

<br>
<br>
<form action="{{Url('admin/add/'.$iCvn->id)}}" method="get" style="display: inline;">
    <button type="submit" class="btn btn-success">Add to my canvases</button>
</form>

    <button type="submit" class="btn  btn-primary" id="export_to_img">Export to image</button>

</div>

<script type="text/javascript">
$(document).ready(function(){

    var canvas = new fabric.StaticCanvas('cnv-{{$iCvn->id}}');

            canvas.setHeight(

                @if(!empty($iCvn->size_h)) {{$iCvn->size_h}}
                @else 
                400
                @endif

            );
            canvas.setWidth(

                @if(!empty($iCvn->size_w)) {{$iCvn->size_w}}
                @else 
                600
                @endif

            );

    var jsn = '{!!$iCvn->json_data!!}';

    var factor = 2;
                      
            var canvas2 = new fabric.StaticCanvas('cnv');
            canvas2.setHeight(400);
            canvas2.setWidth(600);

            canvas2.loadFromJSON(jsn, canvas2.renderAll.bind(canvas2), function(o, object){

                if (canvas2.backgroundImage) {

                    var bi = canvas2.backgroundImage;
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

            });

            canvas2.renderAll();

            canvas2.setHeight(canvas2.getHeight() * factor);
            canvas2.setWidth(canvas2.getWidth() * factor);

    canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas));

    $('#export_to_img').click(function(){

        window.open(canvas2.toDataURL('png'));

    });

    canvas.renderAll();
});
</script>

@endforeach


</div>

  </div>
</div>
@stop
