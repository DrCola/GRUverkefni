

//Basic implementation
  $(document).ready(function() {        
    $("img").languidLoad();
  });       

  //Advanced implementation
  
   var options = {
            threshold: 300, //how far from the viewport edge to begin loading?
            throttle: 100, //how much to "throttle" event triggers for performance?
            mode: "suffix", //src attribute formatting to use: "suffix" or "format"
            formats: { //define the formatting based on size breakpoints (NB - this could be used for different aspect ratios, depending on the format and your backend setup) -
                small: { pixelWidth:  450, format: "?width=490" },
                medium: { pixelWidth:  650, format: "?width=700" },
                large: { pixelWidth:  950, format: "?width=1000" },
                foo: { pixelWidth:  1150, format: "?width=1300" },                
                bar: { pixelWidth:  1350, format: "?width=1600" }
            },
            srcSetFormat: { 
                formatString: "{0}?width=49 49w 1x, {0}?width=49&hd=true 49w 2x, {0}?width=10hd=true 2x", //apply a format string to the srcset attribute for more control, ie altering width and height 
                fileFormat: ".jpg",
                urlRegex:  /\{0\}/g,
                extRegex:  /\{1\}/g 
            },
            alwaysActive:  true // set to false to disable responsive loading
        };

  $(document).ready(function() {     
    $("img:not(.js-not-lazy)").languidLoad(options);
  }); 


  function setVisibility(id) {
if(document.getElementById('bt1').value=='Hide Layer'){
document.getElementById('bt1').value = 'Show Layer';
document.getElementById(id).style.display = 'none';
}else{
document.getElementById('bt1').value = 'Hide Layer';
document.getElementById(id).style.display = 'inline';
}
}
$(function() {
    $( "#dialog" ).dialog();
  });
 /*
 
  $('#mainContent').append('<div id="questionDiv"></div>');
  $('#questionDiv').append('<h1>Spurning <h1>');
 onload=function(){
var allTags=document.getElementsByTagName('*'), i=0, e;
while(e=allTags[i++]){
if(e.id){alert(e.id)}
}
}*/


$(".tiptext").click(function() {
  
    $(this).children(".description").show();
    
});



$(".tiptext").dblclick(function() {

  $( ".description" ).fadeOut( "slow", function() {
    $(this).children(".description").hide();
  });
    
});

$(".tiptext2").mouseover(function() {
  
    $(this).children(".description2").show();
    
});



$(".tiptext2").mouseout(function() {

    $(this).children(".description2").hide();
});



$(document).ready(function(){
  var maxLength = 60;
  $(".show-read-more").each(function(){
    var myStr = $(this).text();
    if($.trim(myStr).length > maxLength){
      var newStr = myStr.substring(0, maxLength);
      var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
      $(this).empty().html(newStr);
      $(this).append(' <a href="javascript:void(0);" class="read-more">Lesa meira...</a>');
      $(this).append('<span class="more-text">' + removedStr + '</span>');
    }
  });
  $(".read-more").click(function(){
    $(this).siblings(".more-text").contents().unwrap();
    $(this).remove();
  });
});




$(function () {
    var dropZoneId = "drop-zone";
    var buttonId = "clickHere";
    var mouseOverClass = "mouse-over";

    var dropZone = $("#" + dropZoneId);
    var ooleft = dropZone.offset().left;
    var ooright = dropZone.outerWidth() + ooleft;
    var ootop = dropZone.offset().top;
    var oobottom = dropZone.outerHeight() + ootop;
    var inputFile = dropZone.find("input");
    document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropZone.addClass(mouseOverClass);
        var x = e.pageX;
        var y = e.pageY;

        if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
            inputFile.offset({ top: y - 15, left: x - 100 });
        } else {
            inputFile.offset({ top: -400, left: -400 });
        }

    }, true);

    if (buttonId != "") {
        var clickZone = $("#" + buttonId);

        var oleft = clickZone.offset().left;
        var oright = clickZone.outerWidth() + oleft;
        var otop = clickZone.offset().top;
        var obottom = clickZone.outerHeight() + otop;

        $("#" + buttonId).mousemove(function (e) {
            var x = e.pageX;
            var y = e.pageY;
            if (!(x < oleft || x > oright || y < otop || y > obottom)) {
                inputFile.offset({ top: y - 15, left: x - 160 });
            } else {
                inputFile.offset({ top: -400, left: -400 });
            }
        });
    }

    document.getElementById(dropZoneId).addEventListener("drop", function (e) {
        $("#" + dropZoneId).removeClass(mouseOverClass);
    }, true);

})

var imageLoader = document.getElementById('filePhoto');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        
        $('.uploader img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
}


function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'].join('');
                document.getElementById('previewImg').insertBefore(span, null);
            };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}

document.getElementById('files').addEventListener('change', handleFileSelect, false);


$('.info').hide()
$('.link').click(function(){

    $('.info').slideToggle()

})