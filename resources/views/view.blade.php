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

    var factor = 0.4;
                      
    var myobjects = canvas.getObjects();

    canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas));

    $('#export_to_img').click(function(){
        window.open(canvas.toDataURL('png'));
    });

    canvas.renderAll();
});
</script>

@endforeach


</div>

  </div>
</div>
@stop
