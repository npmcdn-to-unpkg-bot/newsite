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
<h3>Size and Price</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-8">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_pr_size">Update</a></li>
                <li><a data-toggle="tab" href="#add_pr_size">Add</a></li>
              </ul>

              <div class="tab-content">
                <div id="update_pr_size" class="tab-pane fade in active">
                    <br>
                    <p>Update size adn price.</p>
                    <br>


                        <div class="row">
                            <div class="col-sm-2">
                                <label>title</label>
                            </div>
                            <div class="col-sm-2">
                                <label>size(title)</label>
                            </div>
                            <div class="col-sm-2">
                                <label>price</label>
                            </div>
                            <div class="col-sm-2">
                                <label>width</label>
                            </div>
                            <div class="col-sm-2">
                                <label>height</label>
                            </div>
                            <div class="col-sm-2">
  
                            </div>
                        </div><br>

                    @foreach($prsize as $iPrSize)

                        <div class="row" style="">
                            <div class="col-sm-2">
                                <input name="add_pr_size_title" type="text" class="form-control" value="{{$iPrSize->title}}" />
                            </div>
                            <div class="col-sm-2">
                                <input name="add_pr_size_size" type="text" class="form-control" value="{{$iPrSize->size}}" />
                            </div>
                            <div class="col-sm-2">
                                <input name="add_pr_size_price" type="text" class="form-control" value="{{$iPrSize->price}}" />
                            </div>
                            <div class="col-sm-2">
                                <input name="add_pr_size_width" type="text" class="form-control" value="{{$iPrSize->size_w}}" />
                            </div>
                            <div class="col-sm-2">
                                <input name="add_pr_size_height" type="text" class="form-control" value="{{$iPrSize->size_h}}" />
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-md">update</button>
                            </div>
                            <input type="hidden" name="id_pr_size" value="{{$iPrSize->id}}">
                        </div><br><br>

                    @endforeach

                </div>

                <div id="add_pr_size" class="tab-pane fade">

                    <form>
                        <div class="form-group">
                            <br>
                            <p>Add size adn price.</p>
                            <br>
                            <label>title</label><br>
                            <input name="add_pr_size_title" type="text" class="form-control" />
                            <br>
                            <label>price</label><br>
                            <input name="add_pr_size_price" type="text" class="form-control" />
                            <br>
                            <label>size(title)</label><br>
                            <input name="add_pr_size_size" type="text" class="form-control" />
                            <br>
                            <label>width</label><br>
                            <input name="add_pr_size_width" type="text" class="form-control" />
                            <br>
                            <label>height</label><br>
                            <input name="add_pr_size_height" type="text" class="form-control" />
                            <br>
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
