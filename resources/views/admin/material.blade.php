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
<h3>Material</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_material">Update/Delete</a></li>
                <li><a data-toggle="tab" href="#add_material">Add</a></li>
              </ul>

              <div class="tab-content">
                <div id="update_material" class="tab-pane fade in active">
                    <br>
                    <p>Update and Delete Materials.</p>
                    <br>


                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-3">
                                <label>title</label>
                            </div>
                            <div class="col-sm-2">
                                <label>price</label>
                            </div>
                        </div><br>

                    @foreach($mat as $iMat)

                    <form class="form" action="/admin/up_material" method="post" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row" style="">
                            <div class="col-sm-2 col-sm-offset-3">
                                <input name="title" type="text" class="form-control text-center" value="{{$iMat->title}}" />
                            </div>

                            <div class="col-sm-2">
                                <input name="price" type="text" class="text-center form-control" value="{{$iMat->price}}" />
                            </div>

                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary btn-md">update</button>
                            </div>
                                <input type="hidden" name="id" value="{{$iMat->id}}">
                            </form>
                            <div class="col-sm-1">

                            <form class="form-pr_size" action="/admin/del_material" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $iMat->id }}">
                                <button type="submit" class="btn btn-danger btn-md">delete</button>
                            </form>

                            </div>
                        </div><br><br>

                    @endforeach

                </div>

                <div id="add_material" class="tab-pane fade">
                <div class="col-md-5 col-md-offset-3">

                    <form class="form" action="/admin/add_material" method="post" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                            <br>
                            <p>Add Material.</p>
                            <br>
                            <label>title</label><br>
                            <input name="title" type="text" class="text-center form-control" />
                            <br>
                            <label>price</label><br>
                            <input name="price" type="text" class="text-center form-control" />
                            <br>

                        </div>           
                            <button type="submit" class="btn btn-primary btn-sm">add new material</button>
                    </form>

                </div>

                </div>
                </div>

            </div>
        </div>

</div>

  </div>
</div>
@stop
