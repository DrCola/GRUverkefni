$(document).ready(function() {
			

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

		
		});

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
}).double(function() {
    $(this).children(".description").hide();
});
