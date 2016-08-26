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
<h3>Users Subscriptions</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_pr_size">Delete</a></li>
                {{-- <li><a data-toggle="tab" href="#add_pr_size">Add</a></li> --}}
              </ul>

              <div class="tab-content">
                <div id="update_pr_size" class="tab-pane fade in active">
                    <br>
                    <p>View and Delete Users Subscriptions.</p>
                    <br>

                    @if(!$sub->isEmpty())
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-3">
                                <label>name</label>
                            </div>
                            <div class="col-sm-2">
                                <label>email</label>
                            </div>
                        </div><br>
                    @endif

                    @foreach($sub as $iSub)

                        <div class="row" style="">
                            <div class="col-sm-2 col-sm-offset-3" style="margin-top: 7px;">
                                <p>{{$iSub->name}}</p>
                            </div>
                            <div class="col-sm-2" style="margin-top: 7px;">
                                <p>{{$iSub->email}}</p>
                            </div>

                            <div class="col-sm-1">

                            <form class="form" action="/admin/del_sub/{{ $iSub->id }}" method="get">
                                <button type="submit" class="btn btn-danger btn-md">delete</button>
                            </form>

                            </div>
                        </div><br><br>

                    @endforeach

                    @foreach($user as $iUser)

                        <div class="row" style="">
                            <div class="col-sm-2 col-sm-offset-3" style="margin-top: 7px;">
                                <p>{{$iUser->name}}</p>
                            </div>
                            <div class="col-sm-2" style="margin-top: 7px;">
                                <p>{{$iUser->email}}</p>
                            </div>

                            <div class="col-sm-1">

                            <form class="form" action="/admin/del_user/{{ $iUser->id }}" method="get">
                                <button type="submit" class="btn btn-danger btn-md">delete</button>
                            </form>

                            </div>
                        </div><br><br>

                    @endforeach

                </div>

                </div>

            </div>
        </div>

</div>

  </div>
</div>
@stop
