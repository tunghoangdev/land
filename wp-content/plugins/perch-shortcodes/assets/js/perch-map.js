jQuery(document).ready(function($){
	if ($('#g_map_380').length > 0){

			var map;
			var lat = $('#g_map_380').data('latitude');
			var lng = $('#g_map_380').data('longitude');
			var icon =  '';
			var control = $('#g_map_380').data('control');
			var zoom = $('#g_map_380').data('zoom');
			var mapcolor = $('#g_map_380').data('mapcolor');

			var oz = new google.maps.LatLng(lat,lng);
			var MY_MAPTYPE_ID = 'custom_style';

			function initialize() {
				var featureOpts = [ 
					
					{
						"featureType": "landscape.man_made",
						"stylers": [
							{ "color": "#e3e3e3" }
						]
					},{
						"featureType": "landscape.natural",
						"elementType": "geometry",
						"stylers": [
							{ "color": "#f9f9f9" }
						]
					},{
						"featureType": "water",
						"stylers": [
							{ "color": "#f9f9f9" }
						]
					},{
						"featureType": "road",
						"elementType": "geometry",
						"stylers": [
							{ "color": "#cccccc" }
						]
					},{
						"elementType": "labels"	},{
						"elementType": "geometry.stroke"	},{
					},{
						"featureType": "poi",
						"stylers": [
							{ "color": "#e3e3e3" }
						]
					} ];

					if(mapcolor == 'no'){ featureOpts = []; }

				/**
				 * The CenterControl adds a control to the map that recenters the map on Chicago.
				 * This constructor takes the control DIV as an argument.
				 * @constructor
				 */
				function CenterControl(controlDiv, map) {

				  // Set CSS for the control border
				  var controlUI = document.createElement('div');				  
				  controlUI.style.border = 'none';
				  controlUI.style.borderRadius = '0';
				  controlUI.style.boxShadow = 'none';
				  controlUI.style.cursor = 'pointer';				  
				  controlUI.style.textAlign = 'center';
				  controlUI.title = 'Click to recenter the map';
				  controlDiv.appendChild(controlUI);

				  // Set CSS for the control interior
				  var controlText = document.createElement('div');
				  controlText.className = 'zoomOutwrap';				  
				  controlText.style.color = '#fff';
				  controlText.style.fontSize = '16px';
				  controlText.style.lineHeight = '40px';
				  controlText.style.width = '40px';
				  controlText.style.marginTop = '37px';
				  controlText.style.marginLeft = '37px';
				  controlText.innerHTML = '<span class="map-zoom">+</span>';
				  controlUI.appendChild(controlText);

				  // Set CSS for the control interior
				  var zoomIN = document.createElement('div');
				  zoomIN.className = 'zoomInwrap';
				  zoomIN.style.color = '#fff';
				  zoomIN.style.fontSize = '16px';
				  zoomIN.style.lineHeight = '40px';
				  zoomIN.style.width = '40px';
				  zoomIN.style.marginTop = '1px';
				  zoomIN.style.marginLeft = '37px';
				  zoomIN.innerHTML = '<span class="map-zoom">-</span>';
				  controlUI.appendChild(zoomIN);				 

				  // Setup the click event listeners: simply set the map to
				  // zoom
				  google.maps.event.addDomListener(controlText, 'click', function() {
				  	var oldZoom = map.getZoom();
				    map.setCenter(oz);
				    map.setZoom(oldZoom+1);
				  });

				   google.maps.event.addDomListener(zoomIN, 'click', function() {
				  	var oldZoom = map.getZoom();
				    map.setCenter(oz);
				    map.setZoom(oldZoom-1);
				  });

				}
  				
				var mapOptions = {
					zoom: zoom,
					disableDefaultUI: true,		
					center: oz,
					position: oz,
  					map: map,
					mapTypeControlOptions: {
					mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID],

					},
					mapTypeId: MY_MAPTYPE_ID

				};
		 
				map = new google.maps.Map(document.getElementById('g_map_380'), mapOptions);
				var styledMapOptions = {
					name: 'Neton style',
					
				};
				var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
				map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

				if( control != 'no' ){
					//zoom icon
					var centerControlDiv = document.createElement('div');
	  				var centerControl = new CenterControl(centerControlDiv, map);
	  				centerControlDiv.index = 1;
	  				map.controls[google.maps.ControlPosition.TOP_LEFT].push(centerControlDiv);

  					//custom marker
  					overlay = new CustomMarker(	oz, map,{ marker_id: '123' });
  				}				
			}
			initialize();
		}		
})