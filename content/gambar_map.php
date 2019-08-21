<style>
.map-scroll:before {
content: 'Use ctrl + scroll to zoom the map';
position: absolute;
top: 50%;
left: 50%;
z-index: 999;
font-size: 34px;
 }
 .map-scroll:after {
position: absolute;
left: 0;
right: 0;
bottom: 0;
top: 0;
content: '';
background: #00000061;
z-index: 999;
}	
</style>
<script type="text/javascript">
    wax.tilejson('http://a.tiles.mapbox.com/v3/shre.map-ime6dajf.jsonp',
    function(tilejson) {
	var map = L.map('map',{ zoomControl: false ,drawControl:true}).setView([-6.913169,107.649303],12);
//				  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//					attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors | develop by <a href="https://blaxtech.blogspot.com/">Blaxtech</a> '
//					}).addTo(map);	
	var osmDataAttr = 'Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | develop by <a href="https://blaxtech.blogspot.com/">Blaxtech</a> ';
		  var mopt = {
			  url: 'https://api.mapbox.com/styles/v1/mapbox/streets-v9/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYmVydmlubGVvbmFyZHkiLCJhIjoiY2pqNDgxYjNjMWcxYTNvbnd1Y3lheWd1ZSJ9.0ULezPS8a9o8cC0e5kIIRQ',
			  options: {attribution:'© <a href="https://www.mapbox.com/map-feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}
			};
		   
		  var osm = L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{attribution:osmDataAttr});
		  var mq=L.tileLayer(mopt.url,mopt.options);
		var googleDataAttr = '<a href="https://www.google.com/maps/">google</a>';
        var google = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}',{attribution:googleDataAttr });
		  google.addTo(map);
		
		  var baseMaps = {
			  "Google Maps": google,
			  "Mapbox Streets": mq,
			  "Open Street Map":osm
		  };	
	     
			L.control.scale().addTo(map);

		function popUp(f,l){
				var out = [];
				if (f.properties){
					for(key in f.properties){
						out.push(key+": "+f.properties[key]);
					}
					l.bindPopup(out.join("<br />"));
				}
			}		
		
			var bandung = new L.geoJson();
			bandung.addTo(map);
			
			function getColor(d) {
				return  d === 'Andir' 		 ? '#80ff80' :
					    d === 'Antapani'  	 ? '#b0a61e' :
					    d === 'Arcamanik'  	 ? '#e1f9bf' :
					    d === 'Astana Anyar' 	 ? '#00ff40' :
					    d === 'Babakan Ciparay'? '#aa0004' :
					    d === 'Bandung Kidul'  ? '#b9b506' :
					    d === 'Bandung Kulon'  ? '#ffff80' :
						d === 'Bandung Wetan'  ? '#ffff00' :
						d === 'Batununggal'    ? '#000080' :
						d === 'Bojongloa Kaler'? '#8000ff' :
						d === 'Bojongloa Kidul'? '#ff8000' :
						d === 'Buah Batu'  	 ? '#589911' :
						d === 'Cibeunying Kaler' ? '#808000' :
						d === 'Cibeunying Kidul' ? '#008080' :
						d === 'Cibiru'   		   ? '#FED976' :
						d === 'Cicendo'   	? '#db6924' :
						d === 'Cidadap'   	? '#ff80c0' :
						d === 'Cinambo'   	? '#dfd61c' :
						d === 'Coblong'   	? '#ff0000' :
						d === 'Gedebage'   	? '#3f007d' :
						d === 'Kiaracondong'  ? '#e9787b' :
						d === 'Lengkong'   	? '#e6a3ed' :
						d === 'Mandaljati'   	? '#ed5412' :
						d === 'Panyileukan'   ? '#7e3a54' :
						d === 'Rancasari'   	? '#2086ac' :
						d === 'Regol'   		? '#0020ff' :
						d === 'Sukajadi'   	? '#80ffff' :
						d === 'Sukasari'   	? '#0080ff' :
						d === 'Sumur Bandung' ? '#80ff00' :
						d === 'Ujung Berung'  ? '#29ded6' :
								  			  '#FFEDA0';
			}
			
			function fills(fill){
				return fill ;
			}
		
			function namkec(nama_kecamatan){
				return nama_kecamatan ;
			}		
		
			function style(features) {
				return {
					fillColor: fills(features.properties.fill),
					weight: 2,
					opacity: 1,
					color: 'white',
					dashArray: '3',
					fillOpacity: 0.5
				};
			}		
		    var kecamatan = new L.geoJson(kecamatan,{style: style}).addTo(map);
			function highlightFeature(e) {
				var layer = e.target;

				layer.setStyle({
					weight: 5,
					color: '#666',
					dashArray: '',
					fillOpacity: 0.7
				});

				if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
					layer.bringToFront();
				}
			}		
			function resetHighlight(e) {
				kecamatan.resetStyle(e.target),
				bandung.resetStyle(e.target);
			}
			function zoomToFeature(e) {
				map.fitBounds(e.target.getBounds());
			}		
			function onEachFeature(feature, layer) {
				layer.on({
					mouseover: highlightFeature,
					mouseout: resetHighlight,
					click: zoomToFeature
				});
			}		
		
			$.ajax({
			dataType: "json",
			url: "maps/GeoJSON/bandung.geojson",
				
			success: function(data) {
				$(data.features).each(function(key, data) {
					bandung.addData(data);
				});
			}
			}).error(function() {});
		
			$.ajax({
			dataType: "json",
			url: "maps/GeoJSON/kecamatan.geojson",				
				
			success: function(data) {
				$(data.features).each(function(key, data) {						
					kecamatan.addData(data);
				});
			}			
			}).error(function() {});
		
			var overlays={
			"Kota":bandung,
			"Kecamatan":kecamatan
			}		
			var lc=L.control.layers(baseMaps,overlays,{position: 'bottomright', collapsed: false });
			lc.addTo(map);	
		
		
		
			var legend = L.control({position: 'bottomleft'});
			legend.onAdd = function (map) {

				var div = L.DomUtil.create('div', 'info legend'),
					labels = ['<strong> Kecamatan</strong>'],
					//categories  = ['Andir'];
					categories  = ['Andir','Antapani','Arcamanik','Astana Anyar','Babakan Ciparay','Bandung Kidul','Bandung Kulon','Bandung Wetan', 'Batununggal', 'Bojongloa Kaler', 'Bojongloa Kidul','Buah Batu','Cibeunying Kaler','Cibeunying Kidul', 'Cibiru', 'Cicendo', 'Cidadap', 'Cinambo', 'Coblong', 'Gedebage', 'Kiaracondong', 'Lengkong', 'Mandaljati', 'Panyileukan', 'Rancasari','Regol','Sukajadi','Sukasari','Sumur Bandung', 'Ujung Berung'];
//					categories  = ['Andir' ,'Antapani','Arcamanik','Astana Anyar','Babakan Ciparay','Bandung Kidul','Bandung Kulon','Bandung Wetan', 'Batununggal', 'Bojongloa Kaler', 'Bojongloa Kidul','Buah Batu','Cibeunying Kaler','Cibeunying Kidul', 'Cibiru', 'Cicendo', 'Cidadap', 'Cinambo', 'Coblong', 'Gedebage', 'Kiaracondong', 'Lengkong', 'Mandaljati', 'Panyileukan', 'Rancasari','Regol','Sukajadi','Sukasari','Sumur Bandung', 'Ujung Berung'];				

				// loop through our density intervals and generate a label with a colored square for each interval
				for (var i = 0; i < categories.length; i++) {

						div.innerHTML += 
						labels.push(
							'<i class="circle" style="background:' + getColor(categories[i]) + '"></i> ' + (categories[i] ? categories[i] : '+'));
					}
					div.innerHTML = labels.join('<br>');
				return div;
			};

			legend.addTo(map);	
		
			var drawnItems = new L.FeatureGroup();
			map.addLayer(drawnItems);

			// Initialise the draw control and pass it the FeatureGroup of editable layers
			var drawControl = new L.Control.Draw({
				edit: {
					featureGroup: drawnItems
				}
			});
			map.addControl(drawControl);
    });
	
</script>	
<!--
     This is new 
    <div class="btn-group">
        <button type="button" id="allbus" class="btn btn-success">All</button>
        <button type="button" id="others" class="btn btn-primary">Others</button>
        <button type="button" id="cafes" class="btn btn-danger">Cafes</button>
    </div>
-->
<div id="map" style="width:100%; height:768px;"></div>
<script>
  //disable default scroll 
  map.scrollWheelZoom.disable();

  $("#map").bind('mousewheel DOMMouseScroll', function (event) {
    event.stopPropagation();
     if (event.ctrlKey == true) {
             event.preventDefault();
         map.scrollWheelZoom.enable();
           $('#map').removeClass('map-scroll');
         setTimeout(function(){
             map.scrollWheelZoom.disable();
         }, 1000);
     } else {
         map.scrollWheelZoom.disable();
         $('#map').addClass('map-scroll');
     }

 });

  $(window).bind('mousewheel DOMMouseScroll', function (event) {
       $('#map').removeClass('map-scroll');
  })	
</script>	