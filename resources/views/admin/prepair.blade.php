@extends('admin.layouts.main')
    

@section('content')
<div class="container">

<div class="container-fluid bg-12 text-center">
<h3>Prepair</h3><br>
<div class="row">
<br>
<div class="col-md-2">
    <div id="pr_comp">
        <p>Hanger</p>
        <img id="img_prepair_hanger" class="img-thumbnail" src="{{asset('assets/images/clear_m_c.png')}}">
    </div>
    <br><br>
    <p>Material</p>
    <img id="img_prepair_material" class="img-thumbnail" src="{{asset('assets/images/indoor.jpg')}}">
</div>
<div class="col-md-7">
    <p>Banner</p>

    <img id="img_prepair_size" class="img-thumbnail" src="{{asset('assets/images/size.jpg')}}" width="{{$firstprsize->size_w}}" height="{{$firstprsize->size_h}}" style="border: 1px solid #DEDEDE;">

</div>
<form action="{{url('admin/seldesign')}}" method="get">
<div class="col-md-3">
    <p>Selected features</p>
    <div class="form-group">
        <label>Banner Size:</label>
        <select class="form-control" name="prepair_size" id="prepair_size">
        @foreach($prsize as $iSize)
            <option value="{{$iSize->id}}">{{$iSize->size_w}} x {{$iSize->size_h}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Hanger:</label>
        <select class="form-control" name="prepair_hanger" id="prepair_hanger">
            @foreach($han as $iHan)
                <option value="{{$iHan->id}}">{{$iHan->title}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Material:</label>
        <select class="form-control" name="prepair_material" id="prepair_material">
            @foreach($mat as $iMat)
                <option value="{{$iMat->id}}">{{$iMat->title}}</option>
            @endforeach
        </select>
    </div><br>
    <button type="submit" class="btn btn-primary">Browse our design</button>
    </form>

<script type="text/javascript">
    $(function() {
        // =====================================
        // change prepair size
        // =====================================
        $('#prepair_size').change(function(){

            var sp = $('#prepair_size option:selected').text().split('x');

            var img_width = parseInt(sp[0]);
            var img_height = parseInt(sp[1]);
            $('#img_prepair_size').width(img_width).height(img_height);

        });

        // =====================================
        // change component 
        // =====================================
        $('#prepair_hanger').change(function(){

            var arr_hanger = [];
            arr_hanger[0] = '';

            @foreach($han as $iHan)

            arr_hanger[{{$iHan->id}}] = {!!"'".asset('assets/images/'.$iHan->image)."';"!!}
            
            @endforeach


            if($('#prepair_hanger option:selected').val() == 0){

                $('#pr_comp').hide();
            }else{

                $('#pr_comp').show();
                $('#img_prepair_hanger').attr('src', arr_hanger[$('#prepair_hanger option:selected').val()]);
            }

        });

        // =====================================
        // change material
        // =====================================
        $('#prepair_material').change(function(){

            var arr_material = [];

            @foreach($mat as $iMat)

            arr_material[{{$iMat->id}}] = {!!"'".asset('assets/images/'.$iMat->image)."';"!!}
            
            @endforeach

                $('#img_prepair_material').attr('src', arr_material[$('#prepair_material option:selected').val()]);

        });
        
    });
</script>

</div>
</div>

  </div>
</div>
@stop
