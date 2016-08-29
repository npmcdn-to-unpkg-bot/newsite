        <div class="col-sm-5">
			      <canvas id="c" style="border: 1px solid #CBCBCA;"></canvas>

                    <br>
                <form action="{{url('admin/add_q')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <input type="hidden" name="jsn_sess" id="jsn_sess" value="">

                    <input type="hidden" name="id_cnv" value="{{$idcnv}}">
                    
                    @if(isset($firstprsize))
                        <input type="hidden" id="pr_size_cnv" name="pr_size" value="{{$firstprsize->id}}">
                    @else 
                    @if(isset($nowprsize))
                        <input type="hidden" id="pr_size_cnv" name="pr_size" value="{{$nowprsize}}">
                    @endif
                    @endif
                    <button type="button" class="btn btn-primary" id="btn_bring_front">Bring to front</button>
                    <button type="button" class="btn btn-primary" id="btn_shadow">Shadowify</button>
                    <button type="button" class="btn btn-primary" id="btn_gradient">Gradient</button>
                    <button type="button" class="btn btn-warning" id="btn_clip">Clip</button>
                    <button type="button" class="btn btn-danger" id="btn_remove">Remove</button>

                

                    <label class="checkbox-inline" style="margin-left: 30px;" id="ch_public">
                    <input type="checkbox"
                    @if(isset($cvn)) @foreach($cvn as $iCvn) {{($iCvn->public == 1) ? 'checked' : null}} @endforeach @endif
                    value="1">Public</label>
                    <br><br>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_back_canvas">Background color canvas</label>
                        <input id="color_js_back_canvas" type="text" value="#ffffff" class="form-control jscolor jscolor_back_canvas" />
                    </div>
                    <br>

                    {{-- slider --}}
                    <p>
                      <label>Banner - Starting: $</label>
                      <input type="text" id="price_ban" readonly style="border:0; color:#f6931f; font-weight:bold;" value="
                      @if(isset($firstprsize)) {{$firstprsize->price}} 
                      @else @foreach($cvn as $iCvn) {{$iCvn->price}} @endforeach
                      @endif">

                      <label>Banner - Size</label>
                      <input type="text" id="size_ban" readonly style="border:0; color:#f6931f; font-weight:bold;" value="
                      @if(isset($firstprsize)) {{$firstprsize->size}}{{$firstprsize->title}}
                      @else @foreach($cvn as $iCvn) {{$iCvn->size}} {{$iCvn->title}} @endforeach
                      @endif">
                    </p>
                    <div id="slider" style="width: 600px;"></div>

                    <br><br>

                    @if(isset($mat))
                    <div class="form-group">
                      <label for="sel1">Select Material:</label>
                      <select class="form-control" style="width: 600px;" name="id_mat" id="sel_mat">

                      @foreach($mat as $iMat)

                      @if(isset($nowmat) && $nowmat == $iMat->id)
                        <option selected value="{{$iMat->id}}">{{$iMat->title}} <span style="font-weight: bold;"> {{"(+$iMat->price$)"}}</span></option>
                      @else
                        <option value="{{$iMat->id}}">{{$iMat->title}} <span style="font-weight: bold;"> {{"(+$iMat->price$)"}}</span></option>
                      @endif
                      @endforeach

                      </select>
                    </div>
                    @endif

                    @if(isset($han))
                    <div class="form-group">
                      <label for="sel1">Select Hanger:</label>
                      <select class="form-control" style="width: 600px;" name="id_han" id="sel_han">

                      @foreach($han as $iHan)

                      @if(isset($nowhan) && $nowhan == $iHan->id)
                        <option selected value="{{$iHan->id}}">{{$iHan->title}} <span style="font-weight: bold;"> {{"(+$iHan->price$)"}}</span></option>
                      @else
                        <option value="{{$iHan->id}}">{{$iHan->title}} <span style="font-weight: bold;"> {{"(+$iHan->price$)"}}</span></option>
                      @endif
                      @endforeach

                      </select>
                    </div>
                    @endif

                    @if(isset($cat))
                    <div class="form-group">
                      <label for="sel1">Select Category:</label>
                      <select class="form-control" style="width: 600px;" name="id_cat" id="sel_cat">

                      @foreach($cat as $iCat)

                      @if(isset($nowcat) && $nowcat == $iCat->id)
                        <option selected value="{{$iCat->id}}">{{$iCat->title}}</option>
                      @else
                        <option value="{{$iCat->id}}">{{$iCat->title}}</option>
                      @endif
                      @endforeach

                      </select>
                    </div>
                    @endif

                    <br>
                    <p>Save this canvas to data JSON</p>
                    <label for="save_json">Input save name</label>
                    @if(isset($cvn))

                    @foreach($cvn as $iCvn)
                        <input id="save_json" style="width: 600px;" type="text" value="{{$iCvn->name}}" class="form-control" /><br>
                    @endforeach
                        
                    @else
                        <input id="save_json" style="width: 600px;" type="text" value="Canvas_{{rand()}}" class="form-control" /><br>
                    @endif
                    <button type="submit" class="btn btn-primary btn-sm btn_canvas_save">I have reviewed and approve my design.</button><br><br>


        </div>
        </form>

        <div class="col-sm-4">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#text">Text</a></li>
                <li><a data-toggle="tab" href="#rect">Rectangle</a></li>
                <li><a data-toggle="tab" href="#triangle">Triangle</a></li>
                <li><a data-toggle="tab" href="#circle">Circle</a></li>
                <li><a data-toggle="tab" href="#line">Line</a></li>
                <li><a data-toggle="tab" href="#image">Image</a></li>
                <li><a data-toggle="tab" href="#export">Export</a></li>
                <li><a data-toggle="tab" href="#jsonload">Load</a></li>
              </ul>

              <div class="tab-content">
                <div id="text" class="tab-pane fade in active">
                    <br>
                    <p>Add and properties text.</p>
                    
                      <form role="form">
                        <div class="form-group">
                          <label for="family_text">Select font family:</label>
                          <select class="form-control" id="family_text">
                            <option>Arial</option>
                            <option>Verdana</option>
                            <option>Tahoma</option>
                          </select>
                        </div>
                      </form>

                      <form role="form">
                        <div class="form-group">
                          <label for="align_text">Select text position:</label>
                          <select class="form-control" id="align_text">
                            <option>left</option>
                            <option>center</option>
                            <option>right</option>
                            <option>justify</option>
                          </select>
                        </div>
                      </form>

                      <form role="form">
                        <div class="form-group">
                          <label for="style_text">Select text style:</label>
                          <select class="form-control" id="style_text">
                            <option>normal</option>
                            <option>italic</option>
                          </select>
                        </div>
                      </form>

                      <form role="form">
                        <div class="form-group">
                          <label for="weight_text">Select text weight:</label>
                          <select class="form-control" id="weight_text">
                            <option>normal</option>
                            <option>bold</option>
                          </select>
                        </div>
                      </form>

                      <form role="form">
                        <div class="form-group">
                          <label for="decoration_text">Select text decoration:</label>
                          <select class="form-control" id="decoration_text">
                            <option>normal</option>
                            <option>underline</option>
                            <option>line-through</option>
                            <option>overline</option>
                          </select>
                        </div>
                      </form>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_text">Color text</label>
                        <input id="color_js_text" type="text" value="#57b1ba" class="form-control jscolor jscolor_text" />
                    </div>
                        <br>

                    <div class="input-group colorpicker-component">
                        <label for="color_js_back_text">Background color text</label>
                        <input id="color_js_back_text" type="text" value="#57b1ba" class="form-control jscolor jscolor_back_text" />
                    </div>
                        <br>

                        <label for="opacity_text">Opacity: </label>
                          <div class="input-group spinner text_opacity">
                            <input type="text" id="opacity_text" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>

                        <br>
                        <label for="lheight_text">Line height: </label>
                          <div class="input-group spinner text_lheight">
                            <input type="text" id="lheight_text" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>


                    <br>
                    <button type="button" class="btn btn-primary btn-md btn_text_add">Add text</button>
                </div>

                <div id="rect" class="tab-pane fade">
                    <br>
                    <p>Add and properties rectangle.</p>
                    <label for="text-input">Add rectangle </label>
                    <input id="rect_width" type="text" class="form-control" value="30" style="display: inline; width: 20%;" /> X
                    <input id="rect_height" type="text" class="form-control" value="30" style="display: inline; width: 20%;" />
                    <br><br>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_text">Color rectangle</label>
                        <input id="color_js_rect" type="text" value="#57b1ba" class="form-control jscolor jscolor_rect" />
                    </div><br>



                        <label for="opacity_rect">Opacity: </label>
                          <div class="input-group spinner rect_opacity">
                            <input type="text" id="opacity_rect" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>
                        <br>  
                    <button type="button" class="btn btn-primary btn-sm btn_rect_add">Add rectangle</button>
                </div>

                <div id="circle" class="tab-pane fade">
                    <br>
                    <p>Add and properties circle.</p>
                    <label for="circle_radius">Add circle radius</label>
                    <input id="circle_radius" type="text" class="form-control" value="30" style="display: inline; width: 20%;" /> 
                    <br><br>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_circle">Color circle</label>
                        <input id="color_js_circle" type="text" value="#57b1ba" class="form-control jscolor jscolor_circle" />
                    </div><br>

                        <label for="opacity_circle">Opacity: </label>
                          <div class="input-group spinner circle_opacity">
                            <input type="text" id="opacity_circle" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>
                        <br> 

                    <button type="button" class="btn btn-primary btn-sm btn_circle_add">Add circle</button>
                </div>

                <div id="triangle" class="tab-pane fade">
                    <br>
                    <p>Add and properties triangle.</p>
                    <label for="triangle_width">Add triangle</label>
                  <input id="triangle_width" type="text" class="form-control" value="30" style="display: inline; width: 20%;" /> X
                    <input id="triangle_height" type="text" class="form-control" value="30" style="display: inline; width: 20%;" />
                    <br><br>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_triangle">Color triangle</label>
                        <input id="color_js_triangle" type="text" value="#57b1ba" class="form-control jscolor jscolor_triangle" />
                    </div><br>

                        <label for="opacity_triangle">Opacity: </label>
                          <div class="input-group spinner triangle_opacity">
                            <input type="text" id="opacity_triangle" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>
                        <br> 

                    <button type="button" class="btn btn-primary btn-sm btn_triangle_add">Add triangle</button>
                </div>

                <div id="line" class="tab-pane fade">
                    <br>
                    <p>Add and properties line.</p>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_line">Color line</label>
                        <input id="color_js_line" type="text" value="#57b1ba" class="form-control jscolor jscolor_line" />
                    </div><br>

                        <label for="opacity_line">Opacity: </label>
                          <div class="input-group spinner line_opacity">
                            <input type="text" id="opacity_line" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>
                        <br> 

                    <button type="button" class="btn btn-primary btn-sm btn_line_add">Add line</button>
                </div>

                <div id="image" class="tab-pane fade">
                    <br>
                    <p>Add and properties image.</p>
                    <label for="image_width">Add image</label>
                    <input id="image_width" type="text" class="form-control" value="30" style="display: inline; width: 20%;" /> X
                    <input id="image_height" type="text" class="form-control" value="30" style="display: inline; width: 20%;" />
                    <br><br>

                        <label for="opacity_image">Opacity: </label>
                          <div class="input-group spinner image_opacity">
                            <input type="text" id="opacity_image" class="form-control" value="100">
                            <div class="input-group-btn-vertical">
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up">></i></button>
                              <button class="btn btn-default" type="button"><i class="fa fa-caret-down"><</i></button>
                            </div>
                          </div>
                        <br> 

                    <input type="file" id="imgLoader">
                </div>

                <div id="jsonload" class="tab-pane fade">
                    <br>
                    <p>Load to this canvas data JSON</p>
                    <label for="json-input">Input data JSON.</label>
                    <textarea class="form-control" rows="4" id="json-input"></textarea><br>
                    <button type="button" class="btn btn-primary btn-sm btn_canvas_load">Load canvas</button>
                </div>

                <div id="export" class="tab-pane fade">
                    <br>
                    <p>Export this canvas to image?</p>
                    <button type="button" class="btn btn-primary btn-sm btn_canvas_export">Export</button>
                </div>

            </div>
        </div>

    </div>
</div>
