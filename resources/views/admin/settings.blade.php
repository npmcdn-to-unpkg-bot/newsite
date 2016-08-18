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
        <div class="col-md-8">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#logo">Logo</a></li>
                <li><a data-toggle="tab" href="#slider">Slider</a></li>
                <li><a data-toggle="tab" href="#social">Social</a></li>
              </ul>

              <div class="tab-content">
                <div id="logo" class="tab-pane fade in active">
                    <br>
                    <p>Change img logo.</p>
                    <br>
                    <button type="button" class="btn btn-primary btn-md btn_logo">Add text</button>
                </div>

                <div id="slider" class="tab-pane fade">
                    <br>
                    <p>Change img slider.</p>
                    <br>
                    <button type="button" class="btn btn-primary btn-sm btn_slider">Change</button>
                </div>

                <div id="social" class="tab-pane fade">
                    <br>
                    <p>Change social network.</p>
                    <br> 
                    <button type="button" class="btn btn-primary btn-sm btn_social">Change</button>
                </div>

            </div>
        </div>


</div>

  </div>
</div>
@stop
