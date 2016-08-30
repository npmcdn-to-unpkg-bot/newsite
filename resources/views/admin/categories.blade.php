@extends('admin.layouts.main')
    

@section('content')
<div class="container">

<div class="container-fluid bg-3 text-center">
<h3>Settings Categories</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_cat">Update/Delete</a></li>
                <li><a data-toggle="tab" href="#add_cat">Add</a></li>
              </ul>

              <div class="tab-content">
                <div id="update_cat" class="tab-pane fade in active">
                    <br>
                    <p>Update categories.</p><br>
                    
                    <div class="row" style="">
                        <div class="col-sm-3">
                                <label>image</label>
                        </div>
                        <div class="col-sm-6">
                                <label>title</label>
                        </div>
                        <div class="col-sm-2">
                                
                        </div>
                    </div><br>

                    @foreach($cat as $iCat)

                        <form class="form-cat" action="/admin/up_cat" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="up_cat_id" value="{{$iCat->id}}">

                        <div class="row" style="">

                            <div class="col-sm-3">
                            <input type="file" id="inpf_cat_up_{{$iCat->id}}" name="up_cat_image" style="display: none;">
                                <img src="{{asset('assets/images/'.$iCat->image)}}" class="img-rounded" id="img_cat_up_{{$iCat->id}}" width="70" height="60">
                            </div>
                            <div class="col-sm-5">
                                <input name="up_cat_title" type="text" class="form-control" style="margin-top: 17px;" value="{{$iCat->title}}" />
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top: 17px;">update categories</button>
                            </div>
                        </form>

                            <div class="col-sm-2">
                                <form class="form-cat-delete" action="/admin/del_cat" method="post" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="del_cat_id" value="{{$iCat->id}}">
                                    <button type="submit" class="btn btn-danger btn-md" style="margin-top: 17px;">delete categories</button>
                                </form>
                            </div>

                        </div><br><br>

                        <script type="text/javascript">
  
                        $(document).ready(function() {

                            function readURL(input) {

                                var reader = new FileReader();

                                reader.onload = function(e) {

                                    $("#img_cat_up_{{$iCat->id}}").attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
   
                            }

                            $("#img_cat_up_{{$iCat->id}}").click(function(){
                                $('#inpf_cat_up_{{$iCat->id}}').trigger('click');
                                $('#inpf_cat_up_{{$iCat->id}}').change(function(){
                                    readURL(this); 
                                });
                                
                            });

                        });

                        </script>


                    @endforeach
                </div>

                <div id="add_cat" class="tab-pane fade">
                <div class="col-md-offset-3 col-md-5">
                    <br>
                    <p>Add categories.</p>
                    <br>
                    <div class="form-group">
                      <form class="form-cat" action="/admin/add_cat" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label for="align_text">title</label><br>

                        <input name="add_cat_title" type="text" class="form-control" />
                        <br>


                        <img src="{{asset('assets/images/noimage.png')}}" class="img-rounded" id="img_cat_new" width="150" height="134"><br>

                        <input type="file" style="display: none;" name="add_cat_image" id="inpf_cat_new"><br>

                        <script type="text/javascript">
      
                            $(document).ready(function() {

                                function readURL(input) {

                                    var reader = new FileReader();

                                    reader.onload = function(e) {

                                        $("#img_cat_new").attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
       
                                }

                                $("#img_cat_new").click(function(){
                                    $('#inpf_cat_new').trigger('click');
                                    $('#inpf_cat_new').change(function(){
                                        readURL(this); 
                                    });
                                    
                                });

                            });

                        </script>


                    </div>           
                    <button type="submit" class="btn btn-primary btn-sm">add new category</button>
                    </form>
                    </div>
                </div>

            </div>
        </div>


</div>

  </div>
</div>
@stop
