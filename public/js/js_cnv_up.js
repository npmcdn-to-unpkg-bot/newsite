
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

    canvas.loadFromJSON(jsnLoad, canvas.renderAll.bind(canvas), function(o, object) {
        fabric.log(o, object);
    });

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

//click btn add line
$('.btn_line_add').click(function(){

var linecolor = $('#color_js_line').val();

// create a rectangle object
var line = new fabric.Line([50, 100, 200, 200], {
    left: 170,
    top: 150,
    stroke: '#'+linecolor
});

//canvas add line
canvas.add(line);

});

//click btn add polygon
$('.btn_polygon_add').click(function(){

var polygoncolor = $('#color_js_polygon').val();

// create a rectangle object
var polygon = new fabric.Polygon([
                                {x: 200, y: 0},
                                {x: 250, y: 50},
                                {x: 250, y: 100},
                                {x: 150, y: 100},
                                {x: 150, y: 50} ],
                                {
                                left: 250,
                                top: 150,
                                angle: 0,
                                fill: '#'+polygoncolor
                                }
);

//canvas add line
canvas.add(polygon);

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

//load json to fabricjs canvas
$('.btn_canvas_load').click(function(){

var jsn = $('#json-input').val();

    canvas.loadFromJSON(jsn, canvas.renderAll.bind(canvas), function(o, object) {
        fabric.log(o, object);
    });
});

//export fabricjs canvas
$('.btn_canvas_export').click(function(){

    alert(canvas.toDataURL('png'));
});

//=========================image load===============
document.getElementById('imgLoader').onchange = function handleImage(e) {

    var imagewidth = parseInt($('#image_width').val());
    var imageheight = parseInt($('#image_height').val());

    var reader = new FileReader();
    reader.onload = function (event) { console.log('fdsf');
        var imgObj = new Image();
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            // start fabricJS stuff
            
            var image = new fabric.Image(imgObj);
            image.set({
                left: 250,
                top: 250,
                angle: 20,
                padding: 10,
                cornersize: 10,
                width: imagewidth,
                height: imageheight
            });
            //image.scale(getRandomNum(0.1, 0.25)).setCoords();
            canvas.add(image);
            
            // end fabricJS stuff
        }
        
    }
    reader.readAsDataURL(e.target.files[0]);
}
//==============================end==================

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
    var Rectobject = canvas.getActiveObject();

    if(Rectobject.get('type') == 'rect'){
        Rectobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_line').change(function(){

    incolor = $(this).val();
    var Lineobject = canvas.getActiveObject();

    if(Lineobject.get('type') == 'line'){
        Lineobject.setStroke('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_polygon').change(function(){

    incolor = $(this).val();
    var Polygonobject = canvas.getActiveObject();

    if(Polygonobject.get('type') == 'polygon'){
        Polygonobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_circle').change(function(){

    incolor = $(this).val();
    var Circleobject = canvas.getActiveObject();

    if(Circleobject.get('type') == 'circle'){
        Circleobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

$('.jscolor_triangle').change(function(){

    incolor = $(this).val();
    var Triangleobject = canvas.getActiveObject();

    if(Triangleobject.get('type') == 'triangle'){
        Triangleobject.setColor('#'+incolor);
        canvas.renderAll();   
    }

});

// end function
})();