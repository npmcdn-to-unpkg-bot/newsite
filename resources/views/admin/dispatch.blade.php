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
<h3>Users Dispatches</h3><br>
<div class="row">


{{-- content --}}
        <div class="col-md-12">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#update_pr_size">Add</a></li>

              </ul>

              <div class="tab-content">
                <div id="update_pr_size" class="tab-pane fade in active">
                    <br>
                    <p>Dispatch.</p>
                    <br>
                    <form action="{{url('admin/dispatch')}}" method="post">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <textarea name="editor"></textarea>
                    <script>

                    CKEDITOR.replace( 'editor',{
                        language: 'en',
                    });

                    </script>
                    <br>
                    <button type="submit" class="btn btn-primary btn-md">submit dispatch</button>
                    </form>
                </div>

                </div>

            </div>
        </div>

</div>

  </div>
</div>
@stop
