@extends('admin.layouts.main')
    

@section('content')
<div class="container">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Preview</h4>
      </div>
        <div class="modal-body modal-lg">
        <div class="container-fluid">
              <div class="col-sm-10"><canvas style="" id="prev_cnv"></canvas></div>
              <div class="col-sm-2" id="modal_prev_name" style="line-height: 500px;font-weight:bold;"></div>
        </div>
                
          </div>
    </div>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
<h3>View My Order Canvas</h3><br>
<div class="row">
<div class="col-sm-7">

<div class="row">
@foreach($cvn as $iCvn)
<div class="col-sm-4" id='my_name'>
<p>{{$iCvn->name}}</p>
<canvas style="border: 2px solid gray; border-radius: 5px;" id="cnv-{{$iCvn->id}}"></canvas>
<script type="text/javascript">

$(document).ready(function(){

    var canvas = new fabric.StaticCanvas('cnv-{{$iCvn->id}}');
    canvas.setHeight(500);
    canvas.setWidth(600);

    var jsn = '{!!$iCvn->json_data!!}';

    var factor = 0.3;
                      
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

        $('.buy_cnv-{{$iCvn->id}}').click(function(){

            $.post('/admin/create-cart', {'_token' : <?php echo '\''.csrf_token().'\''; ?>, 'id_cnv' : {{$iCvn->id}}}, function(data){

                if(data == 1){

                    alert('Added to cart!');
                }
            });

        });

        $('.view_cnv-{{$iCvn->id}}').click(function(){

            $('#modal_prev_name').text( $(this).parent().children('#my_name p').text() );

            var prev_cnv = new fabric.StaticCanvas('prev_cnv');
                prev_cnv.setHeight(500);
                prev_cnv.setWidth(600);


            prev_cnv.loadFromJSON(jsn, prev_cnv.renderAll.bind(prev_cnv),function(){});
            prev_cnv.renderAll();

        });
});

</script>

<br>
<br>

<form action="{{Url('admin/delete-cart/'.$iCvn->id)}}" method="get" style="display: inline;">
    <button type="submit" class="btn  btn-danger">Delete</button>
</form>

    <button type="submit" class="btn btn-primary view_cnv-{{$iCvn->id}}" data-toggle="modal" data-target="#myModal">view</button>

<br>
<br>
<br>
<br>
</div>

@endforeach

</div>
</div>
@if(isset($cart)) 
    <div class="col-sm-5 text-center">
    <h2>Count banners: {{$cart}}</h2>
    <h2>General price: 180 $</h2>
    <br>
    <button type="submit" class="btn btn-lg btn-primary">order</button>
    </div>
@endif

</div>

{{-- <div>{!! $cvn->render() !!}</div> --}}
  </div>
</div>
@stop
