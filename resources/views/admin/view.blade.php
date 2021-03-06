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
              <div class="col-sm-2" id="modal_prev_name" style="font-weight:bold;"></div>
        </div>
                
          </div>
    </div>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
<h3>View My Canvas</h3><br>
<div class="row">
@foreach($cvn as $iCvn)
<div class="col-sm-6" id='my_name'>
    <p>{{$iCvn->name}} | {{$iCvn->price}}$ | {{$iCvn->title}}({{$iCvn->size}}) | {{$iCvn->mat_title}}(+{{$iCvn->mat_price}}$) | {{$iCvn->han_title}}(+{{$iCvn->han_price}}$)</p>
<canvas style="border: 1px solid #DCDCDC; border-radius: 1px;" id="cnv-{{$iCvn->id}}"></canvas>
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

    var factor = 0.6;
                      
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

                    $('#count_cart_span_admin').text(parseInt($('#count_cart_span_admin').text())+1);
                    $('#count_cart_span_admin').css({'background':'green', 'color':'white', 'font-weight':'bold'});
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
<form action="{{Url('admin/gedit/'.$iCvn->id)}}" method="get" style="display: inline;">
    <button type="submit" class="btn btn-warning">Gedit</button>
</form>

<form action="{{Url('admin/delete/'.$iCvn->id)}}" method="get" style="display: inline;">
    <button type="submit" class="btn  btn-danger">Delete</button>
</form>

    <button type="submit" class="btn btn-primary view_cnv-{{$iCvn->id}}" data-toggle="modal" data-target="#myModal">view</button>
    
@if(!isset(Auth::user()->is_admin) || !Auth::user()->is_admin)
    <button type="submit" class="btn btn-success buy_cnv-{{$iCvn->id}}">order</button>
@endif

@if(isset(Auth::user()->is_admin) && Auth::user()->is_admin)
    <label class="checkbox-inline" style="margin-left: 30px;" id="ch_main_{{$iCvn->id}}">
    <input type="checkbox" 
    {{($iCvn->main == 1) ? 'checked' : null}} 
                    value="1">View on Index</label>
    <br><br>
@endif

<br>
<br>
<br>
<br>
</div>

@endforeach

@if(isset(Auth::user()->is_admin) && Auth::user()->is_admin)
@foreach($cvn as $iCvn)
    <script type="text/javascript">
                    
    $(function(){

    var ch_main = 0;

        $('#ch_main_{{$iCvn->id}} :checkbox').change(function(){

            if($('#ch_main_{{$iCvn->id}} :checkbox').is(':checked'))
                ch_main = 1;
            else
                ch_main = 0;


            $.post('/admin/up_main', {'main' : ch_main, '_token' : <?php echo '\''.csrf_token().'\''; ?>, 'id': {{$iCvn->id}}}, function(data, textStatus){

            });
        });                     
    });

    </script>
@endforeach
@endif

</div>
<div>{!! $cvn->render() !!}</div>
  </div>
</div>
@stop
