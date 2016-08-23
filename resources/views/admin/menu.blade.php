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
<h3>Settings Item Menu</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_menu">Update/Delete</a></li>
                <li><a data-toggle="tab" href="#add_menu">Add</a></li>
              </ul>

              <div class="tab-content">
                <div id="update_menu" class="tab-pane fade in active">
                    <br>
                    <p>Update and Delete menus.</p>
                    <br>


                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-3">
                                <label>item</label>
                            </div>
                            <div class="col-sm-2">
                                <label>anchor</label>
                            </div>
                        </div><br>

                    @foreach($menu as $iMenu)

                    <form class="form" action="/admin/up_menu" method="post" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row" style="">
                            <div class="col-sm-2 col-sm-offset-3">
                                <input name="item" type="text" class="form-control text-center" value="{{$iMenu->item}}" />
                            </div>

                            <div class="col-sm-2">
                                <input name="anchor" type="text" class="text-center form-control" value="{{$iMenu->anchor}}" />
                            </div>

                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary btn-md">update</button>
                            </div>
                                <input type="hidden" name="id" value="{{$iMenu->id}}">
                            </form>
                            <div class="col-sm-1">

                            <form class="form-pr_size" action="/admin/del_menu" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $iMenu->id }}">
                                <button type="submit" class="btn btn-danger btn-md">delete</button>
                            </form>

                            </div>
                        </div><br><br>

                    @endforeach

                </div>

                <div id="add_menu" class="tab-pane fade">
                <div class="col-md-5 col-md-offset-3">

                    <form class="form" action="/admin/add_menu" method="post" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">

                            <br>
                            <p>Add menu.</p>
                            <br>
                            <label>item</label><br>
                            <input name="item" type="text" class="text-center form-control" />
                            <br>
                            <label>anchor</label><br>
                            <input name="anchor" type="text" class="text-center form-control" />
                            <br>

                        </div>           
                            <button type="submit" class="btn btn-primary btn-sm">add new item menu</button>
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
