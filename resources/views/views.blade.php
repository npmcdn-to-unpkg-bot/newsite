@extends('admin.layouts.main')
    

@section('content')
    <div class="container">


<div class="container-fluid bg-3 text-center">

<h3>View All Canvas</h3><br>

<div class="row">

@foreach($cvn as $iCvn)

    <div class="col-sm-6">

    <div class="row">

        <p><a href="{{url('view/'.$iCvn->id)}}">{{$iCvn->name}}</a> | {{$iCvn->user_name}} | {{$iCvn->price}}$ | {{$iCvn->title}}({{$iCvn->size}}) | {{$iCvn->mat_title}}(+{{$iCvn->mat_price}}$) | {{$iCvn->han_title}}(+{{$iCvn->han_price}}$)</p>
        <canvas style="border: 1px solid #DCDCDC; border-radius: 1px;" id="cnv-{{$iCvn->id}}"></canvas>
        
        <script type="text/javascript">

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

        </script>
        <br><br>
        </div>
        <div class="row">
            <form action="{{Url('admin/add/'.$iCvn->id)}}" method="get" style="display: inline;">
                <button type="submit" class="btn btn-success">add to my canvases</button>
            </form>

            <form action="{{Url('view/'.$iCvn->id)}}" method="get" style="display: inline;">
                <button type="submit" class="btn btn-primary">view</button>
            </form>
                @if(isset(Auth::user()->is_admin) && Auth::user()->is_admin)
                    <label class="checkbox-inline" style="margin-left: 30px;" id="ch_main_{{$iCvn->id}}">
                    <input type="checkbox" 
                    {{($iCvn->main == 1) ? 'checked' : null}} 
                    value="1">View on Index</label>
                    <br><br>
                @endif

        </div>
        <br><br><br><br>
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
