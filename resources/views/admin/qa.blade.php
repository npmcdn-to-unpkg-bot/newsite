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
<h3>Questions and Answer</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_qa">Update/Delete</a></li>
                <li><a data-toggle="tab" href="#add_qa">Add</a></li>
              </ul>

              <div class="tab-content">
                <div id="update_qa" class="tab-pane fade in active">
                    <br>
                    <p>Update adn Delete Q and A.</p>
                    <br>

                    @if(!$qa->isEmpty())
                        <div class="row">
                            <div class="col-sm-4">
                                <label>question</label>
                            </div>
                            <div class="col-sm-6">
                                <label>answer</label>
                            </div>
                        </div><br>
                    @endif

                    @foreach($qa as $iQA)

                        <div class="row" style="">
                        <form class="form" action="/admin/up_qa" method="post">

                            <div class="col-sm-4">
                                <input style="margin-top:7px;" class="form-control" value="{{$iQA->question}}" name="q"></input>
                            </div>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="1" name="a">{{$iQA->answer}}</textarea>
                            </div>

                           <div class="col-sm-1">
                   
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{ $iQA->id }}">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top:7px;">update</button>
                            
                            </div>
                            </form>

                            <div class="col-sm-1">

                            <form class="form" action="/admin/del_qa" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{ $iQA->id }}">
                                <button style="margin-top:-7px;" type="submit" class="btn btn-danger btn-md">delete</button>
                            </form>

                            </div>
 
                        </div><br><br>

                    @endforeach

                </div>

                <div id="add_qa" class="tab-pane fade in ">

                    <br>
                    <p>Add Q and A.</p>
                    <br>

                        <div class="row">
                            <div class="col-sm-4 ">
                                <label>question</label>
                            </div>
                            <div class="col-sm-6">
                                <label>answer</label>
                            </div>
                        </div><br>

                        <div class="row" style="">
                        <form class="form" action="/admin/add_qa" method="post">
                            <div class="col-sm-4">
                                <input style="margin-top:7px;" class="form-control" value="" name="q"></input>
                            </div>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="1" name="a"></textarea>
                            </div>

                           <div class="col-sm-1">

                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top:7px;">add</button>

                            </div>
                        </form>

                </div>

                </div>

            </div>
        </div>

</div>

  </div>
</div>
@stop
