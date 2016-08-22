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
<h3>Settings</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-10">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#logo">Logo</a></li>
                <li><a data-toggle="tab" href="#slider">Slider</a></li>
                <li><a data-toggle="tab" href="#social">Social</a></li>
              </ul>

              <div class="tab-content">
                <div id="logo" class="tab-pane fade in active text-center">
                    <br>
                    <p>Change img logo. </p>

                     @foreach($logo as $iLogo)

                        <form class="form-slider" action="/admin/up_logo" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="up_logo_id" value="{{$iLogo->id}}">

                        <div class="row">
                        <br>
                            <div class="col-sm-4 col-md-offset-3">
                            <input type="file" id="inpf_logo_up" name="up_logo_image" style="display: none;">

                                <img src="{{asset('assets/images/'.$iLogo->logo)}}" class="img-rounded" id="img_logo_up" width="390" height="120">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top: 47px;">update logo at site</button>
                            </div>


                        </form>


                        </div><br><br>

                        <script type="text/javascript">
  
                        $(document).ready(function() {

                            function readURL(input) {

                                var reader = new FileReader();

                                reader.onload = function(e) {

                                    $("#img_logo_up").attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
   
                            }

                            $("#img_logo_up").click(function(){
                                $('#inpf_logo_up').trigger('click');
                                $('#inpf_logo_up').change(function(){
                                    readURL(this); 
                                });
                                
                            });

                        });

                        </script>


                    @endforeach

                </div>

                <div id="slider" class="tab-pane fade">
                    <br>
                    <p>Change img slider. </p>


                    <br>
                    <br>
                    <div class="row" style="">
                        <div class="col-sm-3">
                                <label>image</label>
                        </div>
                        <div class="col-sm-2">
                                
                        </div>
                    </div><br>

                     @foreach($slider as $iSlider)

                        <form class="form-slider" action="/admin/up_slider" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="up_slider_id" value="{{$iSlider->id}}">

                        <div class="row" style="">

                            <div class="col-sm-3">
                            <input type="file" id="inpf_slider_up_{{$iSlider->id}}" name="up_slider_image" style="display: none;">
                                <img src="{{asset('assets/images/'.$iSlider->images)}}" class="img-rounded" id="img_slider_up_{{$iSlider->id}}" width="70" height="60">
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top: 17px;">update image slider</button>
                            </div>
                        </form>

                            <div class="col-sm-2">
                                <form class="form-slider-delete" action="/admin/del_slider" method="post" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="del_slider_id" value="{{$iSlider->id}}">
                                    <button type="submit" class="btn btn-danger btn-md" style="margin-top: 17px;">delete image slider</button>
                                </form>
                            </div>

                        </div><br><br>

                        <script type="text/javascript">
  
                        $(document).ready(function() {

                            function readURL(input) {

                                var reader = new FileReader();

                                reader.onload = function(e) {

                                    $("#img_slider_up_{{$iSlider->id}}").attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
   
                            }

                            $("#img_slider_up_{{$iSlider->id}}").click(function(){
                                $('#inpf_slider_up_{{$iSlider->id}}').trigger('click');
                                $('#inpf_slider_up_{{$iSlider->id}}').change(function(){
                                    readURL(this); 
                                });
                                
                            });

                        });

                        </script>


                    @endforeach

                <div class="col-sm-5 col-sm-offset-3">
                    
                    <form class="form-slider-add" action="/admin/add_slider" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success">add new image for slider</button>&nbsp;
                        <img src="{{asset('assets/images/noimage.png')}}" class="img-rounded" width="50" height="50" id="img_slider_new">
                        <input type="file" id="inpf_slider_new" name="add_slider_image" style="display: none;">
                    </form>

                        <script type="text/javascript">
      
                            $(document).ready(function() {

                                function readURL(input) {

                                    var reader = new FileReader();

                                    reader.onload = function(e) {

                                        $("#img_slider_new").attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
       
                                }

                                $("#img_slider_new").click(function(){
                                    $('#inpf_slider_new').trigger('click');
                                    $('#inpf_slider_new').change(function(){
                                        readURL(this); 
                                    });
                                    
                                });

                            });

                        </script>

                </div>

                </div>

                <div id="social" class="tab-pane fade">
                    <br>
                    <p>Change social network.</p>
                    <br> 

                    <div class="row" style="">

                        <div class="col-sm-6 col-sm-offset-3">
                                <label>title</label>
                        </div>
 
                    </div><br>

                    @foreach($soc as $iSoc)

                        <form class="form-cat" action="/admin/up_soc" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="up_soc_id" value="{{$iSoc->id}}">

                        <div class="row" style="">

                            <div class="col-sm-3">
                                <img src="{{asset('assets/images/'.$iSoc->image)}}" class="img-rounded" width="70" height="60">
                            </div>
                            <div class="col-sm-5">
                                <input name="up_soc_title" type="text" class="form-control" style="margin-top: 17px;" value="{{$iSoc->href}}" />
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top: 17px;">update</button>
                            </div>
                        </form>

                        </div><br><br>

                    @endforeach

                </div>

            </div>
        </div>


</div>

  </div>
</div>
@stop
