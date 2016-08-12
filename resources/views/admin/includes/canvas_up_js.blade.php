
<script type="text/javascript">
 
(function() {
// start function

@foreach($cvn as $iCvn)
var jsnLoad = '{!!$iCvn->json_data!!}';
var idCnv = {{$iCvn->id}};
@endforeach

// variables
var intext = null;
var incolor = null;
var textObj = null;

//canvas fabric
var canvas = new fabric.Canvas('c');

canvas.setHeight(500);
canvas.setWidth(600);

canvas.loadFromJSON(jsnLoad, canvas.renderAll.bind(canvas));
canvas.renderAll();


//===========================start button event


//click btn add text
$('.btn_text_add').click(function(){

    intext = 'This is text!';
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

    var jsn = JSON.stringify(canvas);
    var public = 0;

    if(canvas.getObjects().length == 0){
        alert('empty canvas');
        return false;
    }

    if($('#ch_public input').is(':checked')){
        public = 1;
    }


    $.post('/admin/gedit', {'_token' : <?php echo '\''.csrf_token().'\''; ?>, 'name' : $('#save_json').val(), 'id' : idCnv, 'jsn' : jsn, 'public' : public}, function(data){

        if(data == 1){
            alert('Update successfully!');
        }
    });

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









//shadow canvas obj
var tgll = true;
$('#btn_shadow').click(function(){

    tgll = !tgll;

    if(tgll){

        canvas.getActiveObject().setShadow({color: 'rgba(0,0,0,0.3)',
                                            blur: 10,    
                                            offsetX: 4,
                                            offsetY: 4,
                                            fillShadow: true, 
                                            strokeShadow: true 
                                            });

    }else{
        canvas.getActiveObject().setShadow({});
    }
    canvas.renderAll();

});

//clip canvas obj
$('#btn_clip').click(function(){
    canvas.getActiveObject().set({fill: incolor});
    
    canvas.renderAll();
});

//bring_front canvas obj
$('#btn_bring_front').click(function(){

    canvas.getActiveObject().bringToFront();
    canvas.renderAll();
});

//remove canvas obj
$('#btn_remove').click(function(){

    canvas.getActiveObject().remove();
    canvas.renderAll();
});

//gradient canvas obj
$('#btn_gradient').click(function(){

    incolor = canvas.getActiveObject().get('fill');
    canvas.getActiveObject().setGradient('fill', {
                                                type: 'linear',
                                                x1: 0,
                                                y1: 0,
                                                x2: canvas.getActiveObject().width,
                                                y2: 0,
                                                colorStops: {
                                                    0: ('rgb('+(Math.random()*255)+','+(Math.random()*255)+','+(Math.random()*255)+')'),
                                                    1: ('rgb('+(Math.random()*255)+','+(Math.random()*255)+','+(Math.random()*255)+')')
                                                }
                                            });
    canvas.renderAll();
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
                angle: 0,
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




//=========================change input for canvas========


//js color text
$('.jscolor_text').change(function(){

    incolor = $(this).val();

    var Textobject = canvas.getActiveObject();


    if (Textobject.getSelectedText() != '') {

        Textobject.setSelectionStyles({fill: '#'+incolor});

    }else{

        Textobject.setColor('#'+incolor);
        canvas.renderAll();   
    }
        

});

//js text family
$('#family_text').change(function(){

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.fontFamily = $('#family_text option:selected').text();
        canvas.renderAll();   
    }

});


//============================start new

//js rect opacity
$('.rect_opacity .btn:first-of-type').click(function(){

    if(parseInt($('.rect_opacity input').val(), 10) <= 90){
        $('.rect_opacity input').val( parseInt($('.rect_opacity input').val(), 10) + 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'rect'){

        Textobject.set({opacity : (parseInt($('.rect_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

$('.rect_opacity .btn:last-of-type').click(function(){

    if(parseInt($('.rect_opacity input').val(), 10) >= 10){
        $('.rect_opacity input').val( parseInt($('.rect_opacity input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'rect'){

        Textobject.set({opacity : (parseInt($('.rect_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

//js triangle opacity
$('.triangle_opacity .btn:first-of-type').click(function(){

    if(parseInt($('.triangle_opacity input').val(), 10) <= 90){
        $('.triangle_opacity input').val( parseInt($('.triangle_opacity input').val(), 10) + 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'triangle'){

        Textobject.set({opacity : (parseInt($('.triangle_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

$('.triangle_opacity .btn:last-of-type').click(function(){

    if(parseInt($('.triangle_opacity input').val(), 10) >= 10){
        $('.triangle_opacity input').val( parseInt($('.triangle_opacity input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'triangle'){

        Textobject.set({opacity : (parseInt($('.triangle_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

//js circle opacity
$('.circle_opacity .btn:first-of-type').click(function(){

    if(parseInt($('.circle_opacity input').val(), 10) <= 90){
        $('.circle_opacity input').val( parseInt($('.circle_opacity input').val(), 10) + 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'circle'){

        Textobject.set({opacity : (parseInt($('.circle_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

$('.circle_opacity .btn:last-of-type').click(function(){

    if(parseInt($('.circle_opacity input').val(), 10) >= 10){
        $('.circle_opacity input').val( parseInt($('.circle_opacity input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'circle'){

        Textobject.set({opacity : (parseInt($('.circle_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

//js line opacity
$('.line_opacity .btn:first-of-type').click(function(){

    if(parseInt($('.line_opacity input').val(), 10) <= 90){
        $('.line_opacity input').val( parseInt($('.line_opacity input').val(), 10) + 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'line'){

        Textobject.set({opacity : (parseInt($('.line_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

$('.line_opacity .btn:last-of-type').click(function(){

    if(parseInt($('.line_opacity input').val(), 10) >= 10){
        $('.line_opacity input').val( parseInt($('.line_opacity input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'line'){

        Textobject.set({opacity : (parseInt($('.line_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

//js image opacity
$('.image_opacity .btn:first-of-type').click(function(){

    if(parseInt($('.image_opacity input').val(), 10) <= 90){
        $('.image_opacity input').val( parseInt($('.image_opacity input').val(), 10) + 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'image'){

        Textobject.set({opacity : (parseInt($('.image_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

$('.image_opacity .btn:last-of-type').click(function(){

    if(parseInt($('.image_opacity input').val(), 10) >= 10){
        $('.image_opacity input').val( parseInt($('.image_opacity input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'image'){

        Textobject.set({opacity : (parseInt($('.image_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

//============================end new

//js color background text
$('.jscolor_back_text').change(function(){

    incolor = $(this).val();
    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){
        Textobject.set({ textBackgroundColor : '#'+incolor });
        canvas.renderAll();   
    }

});

//js text opacity
$('.text_opacity .btn:first-of-type').click(function(){

    if(parseInt($('.text_opacity input').val(), 10) <= 90){
        $('.text_opacity input').val( parseInt($('.text_opacity input').val(), 10) + 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.set({opacity : (parseInt($('.text_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

$('.text_opacity .btn:last-of-type').click(function(){

    if(parseInt($('.text_opacity input').val(), 10) >= 10){
        $('.text_opacity input').val( parseInt($('.text_opacity input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.set({opacity : (parseInt($('.text_opacity input').val())/100) });
        canvas.renderAll();   
    }

});

//js text line height
$('.text_lheight .btn:first-of-type').click(function(){


        $('.text_lheight input').val( parseInt($('.text_lheight input').val(), 10) + 10);

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.set({lineHeight : (parseInt($('.text_lheight input').val())/100) });
        canvas.renderAll();   
    }

});

$('.text_lheight .btn:last-of-type').click(function(){

    if(parseInt($('.text_lheight input').val(), 10) > 10){
        $('.text_lheight input').val( parseInt($('.text_lheight input').val(), 10) - 10);
    }

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.set({lineHeight : (parseInt($('.text_lheight input').val())/100) });
        canvas.renderAll();   
    }

});


//js text style
$('#style_text').change(function(){

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.fontWeight = $('#style_text option:selected').text();

        canvas.renderAll();   
    }

});

//js text weight
$('#weight_text').change(function(){

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.fontWeight = $('#weight_text option:selected').text();

        canvas.renderAll();   
    }

});

//js text decoration
$('#decoration_text').change(function(){

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.textDecoration = $('#decoration_text option:selected').text();


        canvas.renderAll();   
    }

});

$('#align_text').change(function(){

    var Textobject = canvas.getActiveObject();

    if(Textobject.get('type') == 'i-text'){

        Textobject.set({textAlign : $('#align_text option:selected').text()});
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
</script>