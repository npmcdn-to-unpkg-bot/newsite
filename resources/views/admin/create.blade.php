<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/fabric.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jscolor.js') }}"></script>
  

 <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">LogOut</a></li>
          </ul>
        </div>
      </div>
    </nav>
		<BR><BR><BR><BR>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="admin/">Create Canvas</a></li>
            <li><a href="admin/galery">Gallery Canvas</a></li>

          </ul>
        </div>
	

        <div class="col-sm-5">
			<canvas id="c" style="border: 1px solid #CBCBCA;"></canvas>
        </div>

        <div class="col-sm-4">
  
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#text">Text</a></li>
                <li><a data-toggle="tab" href="#rect">Rectangle</a></li>
                <li><a data-toggle="tab" href="#triangle">Triangle</a></li>
                <li><a data-toggle="tab" href="#circle">Circle</a></li>
                <li><a data-toggle="tab" href="#line">Line</a></li>
                <li><a data-toggle="tab" href="#poligon">Poligon</a></li>
                <li><a data-toggle="tab" href="#export">Export</a></li>
                <li><a data-toggle="tab" href="#jsonload">Load</a></li>
                <li><a data-toggle="tab" href="#jsonsave">Save</a></li>
              </ul>

              <div class="tab-content">
                <div id="text" class="tab-pane fade in active">
                    <br>
                    <p>Add and properties text.</p>
                    <label for="text-input">Input text</label>
                    <textarea class="form-control" rows="4" id="text-input"></textarea><br>
                    
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

                    <div class="input-group colorpicker-component">
                        <label for="color_js_text">Color text</label>
                        <input id="color_js_text" type="text" value="#57b1ba" class="form-control jscolor jscolor_text" />
                    </div><br>
                    <button type="button" class="btn btn-primary btn-sm btn_text_add">Add text</button>
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
                    <button type="button" class="btn btn-primary btn-sm btn_triangle_add">Add triangle</button>
                </div>

                <div id="line" class="tab-pane fade">
                    <br>
                    <p>Add and properties line.</p>
                    <label for="triangle_width">Add line</label>
                  <input id="triangle_width" type="text" class="form-control" value="30" style="display: inline; width: 20%;" /> X
                    <input id="triangle_height" type="text" class="form-control" value="30" style="display: inline; width: 20%;" />
                    <br><br>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_triangle">Color line</label>
                        <input id="color_js_triangle" type="text" value="#57b1ba" class="form-control jscolor jscolor_triangle" />
                    </div><br>
                    <button type="button" class="btn btn-primary btn-sm btn_triangle_add">Add line</button>
                </div>

                <div id="poligon" class="tab-pane fade">
                    <br>
                    <p>Add and properties poligon.</p>
                    <label for="triangle_width">Add poligon</label>
                  <input id="triangle_width" type="text" class="form-control" value="30" style="display: inline; width: 20%;" /> X
                    <input id="triangle_height" type="text" class="form-control" value="30" style="display: inline; width: 20%;" />
                    <br><br>
                    <div class="input-group colorpicker-component">
                        <label for="color_js_triangle">Color poligon</label>
                        <input id="color_js_triangle" type="text" value="#57b1ba" class="form-control jscolor jscolor_triangle" />
                    </div><br>
                    <button type="button" class="btn btn-primary btn-sm btn_triangle_add">Add poligon</button>
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

                <div id="jsonsave" class="tab-pane fade">
                    <br>
                    <p>Save this canvas to data JSON?</p>
                    <label for="save_json">Input save name</label>
                    <input id="save_json" type="text" value="canvas 1" class="form-control" /><br>
                    <button type="button" class="btn btn-primary btn-sm btn_canvas_save">Save canvas</button>
                </div>


            </div>
        </div>

      </div>
    </div>

<script>


(function() {
// start function



// variables
var intext = null;
var incolor = null;
var textObj = null;

//canvas fabric
var canvas = new fabric.Canvas('c');

canvas.setHeight(500);
canvas.setWidth(600);


//click btn add text
$('.btn_text_add').click(function(){

    intext = $('#text-input').val();
    var family = $('#family_text option:selected').text();
    var textcolor = $('#color_js_text').val();

    family

    textObj = new fabric.IText(intext, { left: 0, top: 0 , fill: '#'+textcolor, fontFamily: family});

    canvas.add(textObj);
});

//click btn add rectangle
$('.btn_rect_add').click(function(){

var rectwidth = parseInt($('#rect_width').val());
var rectheight = parseInt($('#rect_height').val());
var rectcolor = $('#color_js_rect').val();

// create a rectangle object
var rect = new fabric.Rect({
  width: rectwidth,
  height: rectheight,
  left: 100,
  top: 100,
  fill: '#'+rectcolor,
});

//canvas add rectangle
canvas.add(rect);

});

//click btn add triangle
$('.btn_triangle_add').click(function(){

var trianglewidth = parseInt($('#triangle_width').val());
var triangleheight = parseInt($('#triangle_height').val());
var trianglecolor = $('#color_js_triangle').val();

// create a rectangle object
var triangle = new fabric.Triangle({
  width: trianglewidth,
  height: triangleheight,
  left: 100,
  top: 100,
  fill: '#'+trianglecolor,
});

//canvas add rectangle
canvas.add(triangle);

});

//click btn add circle
$('.btn_circle_add').click(function(){

var circleradius = parseInt($('#circle_radius').val());
var circlecolor = $('#color_js_circle').val();

// create a rectangle object
var circle = new fabric.Circle({
  radius: circleradius, fill: '#'+circlecolor, left: 100, top: 100
});

// "add" rectangle onto canvas
canvas.add(circle);
});

//save json fabricjs canvas
$('.btn_canvas_save').click(function(){

    alert(JSON.stringify(canvas));
});


//load json to fabricjs canvas
$('.btn_canvas_load').click(function(){

var jsn = $('#json-input').val();

    canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas), function(o, object) {
        fabric.log(o, object);
    });
});

//export fabricjs canvas
$('.btn_canvas_export').click(function(){

    window.open(canvas.toDataURL('png'));
});

//js color
$('.jscolor_text').change(function(){

    incolor = $(this).val();
    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'text'){
        Textobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_rect').change(function(){

    incolor = $(this).val();
    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'rect'){
        Textobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_circle').change(function(){

    incolor = $(this).val();
    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'circle'){
        Textobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_triangle').change(function(){

    incolor = $(this).val();
    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'triangle'){
        Textobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

// end function
})();


</script>

</body>
</html>