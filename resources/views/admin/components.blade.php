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
<h3>Components</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_Component">Update/Delete</a></li>
                <li><a data-toggle="tab" href="#add_Component">Add</a></li>
              </ul>

              <div class="tab-content">
                <div id="update_Component" class="tab-pane fade in active">
                    <br>
                    <p>Update and Delete Components.</p>
                    <br>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>image</label>
                            </div>
                            <div class="col-sm-2">
                                <label>title</label>
                            </div>
                            <div class="col-sm-2">
                                <label>price</label>
                            </div>
                        </div><br>

                    @foreach($comp as $iComp)

                    <form class="form" action="/admin/up_components" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row" style="">

                            <div class="col-sm-3">
                            <input type="file" id="inpf_component_up_{{$iComp->id}}" name="up_component_image" style="display: none;">
                                <img src="{{asset('assets/images/'.$iComp->image)}}" class="img-rounded" id="img_component_up_{{$iComp->id}}" width="70" height="60">
                            </div>

                            <div class="col-sm-2">
                                <input style="margin-top: 7px;" name="title" type="text" class="form-control text-center" value="{{$iComp->title}}" />
                            </div>

                            <div class="col-sm-2">
                                <input style="margin-top: 7px;" name="price" type="text" class="text-center form-control" value="{{$iComp->price}}" />
                            </div>

                            <div class="col-sm-1">
                                <button style="margin-top: 7px;" type="submit" class="btn btn-primary btn-md">update</button>
                            </div>
                                <input type="hidden" name="id" value="{{$iComp->id}}">
                            </form>
                            <div class="col-sm-1">

                            <form class="form-pr_size" action="/admin/del_components" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $iComp->id }}">
                                <button style="margin-top: 7px;" type="submit" class="btn btn-danger btn-md">delete</button>
                            </form>

                            </div>
                        </div><br><br>

                        <script type="text/javascript">
  
                        $(document).ready(function() {

                            function readURL(input) {

                                var reader = new FileReader();

                                reader.onload = function(e) {

                                    $("#img_component_up_{{$iComp->id}}").attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
   
                            }

                            $("#img_component_up_{{$iComp->id}}").click(function(){
                                $('#inpf_component_up_{{$iComp->id}}').trigger('click');
                                $('#inpf_component_up_{{$iComp->id}}').change(function(){
                                    readURL(this); 
                                });
                                
                            });

                        });

                        </script>

                    @endforeach

                </div>

                <div id="add_Component" class="tab-pane fade">
                <div class="col-md-5 col-md-offset-3">

                    <form class="form" action="/admin/add_components" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                            <br>
                            <p>Add Component.</p>
                            <br>
                            <label>title</label><br>
                            <input name="title" type="text" class="text-center form-control" />
                            <br>
                            <label>price</label><br>
                            <input name="price" type="text" class="text-center form-control" />
                            <br>

                        <img src="{{asset('assets/images/noimage.png')}}" class="img-rounded" id="img_component_new" width="150" height="134"><br>

                        <input type="file" style="display: none;" name="add_component_image" id="inpf_component_new"><br>

                        <script type="text/javascript">
      
                            $(document).ready(function() {

                                function readURL(input) {

                                    var reader = new FileReader();

                                    reader.onload = function(e) {

                                        $("#img_component_new").attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
       
                                }

                                $("#img_component_new").click(function(){
                                    $('#inpf_component_new').trigger('click');
                                    $('#inpf_component_new').change(function(){
                                        readURL(this); 
                                    });
                                    
                                });

                            });

                        </script>

                        </div>           
                            <button type="submit" class="btn btn-primary btn-sm">add new component</button>
                    </form>

                    <br>

                </div>

                </div>
                </div>

            </div>
        </div>

</div>

  </div>
</div>
@stop
