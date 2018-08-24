var $ = jQuery.noConflict();

$(document).ready(function($) {
	"use strict";
	/* ---------------------------------------------------------------------- */
	  /*  Contact Map
	  /* ---------------------------------------------------------------------- */
	    $(document).ready(function() {
	      var myMarkers = {
	        "markers": [
	          {
	            "latitude": "35.754386",    // latitude
	            "longitude":"51.331681",   // longitude
	          }
	          /* 

	          Add as plenty as you want:
	          , {
	            "latitude": "40.712785",
	            "longitude":"-73.962708",
	            "icon": "images/map_pin_1.png"
	          }
	          
	          */
	        ]
	      };
	      $("#google_map").mapmarker({
	        zoom : 15,              // Zoom
	        center: "35.754386, 51.331681",   // Center of map
	        type: "ROADMAP",          // Map Type
	        controls: "HORIZONTAL_BAR",     // Controls style
	        dragging:1,             // Allow dragging?
	        mousewheel:0,           // Allow zooming with mousewheel
	        markers: myMarkers,
	        styling: 0,             // Bool - do you want to style the map?
	        featureType:"all",
	        visibility: "on",
	        elementType:"geometry",
	        hue:"#00AAFF",
	        saturation:-100,
	        lightness:0,
	        gamma:1,
	        navigation_control:0
	        /*
	        To play with the map colors and styles you can try this tool right here http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
	        */
	      });
	      
	    });

});
