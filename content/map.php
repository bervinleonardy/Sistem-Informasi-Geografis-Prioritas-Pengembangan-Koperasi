<script type="text/javascript">
    var a = 0; 
    function menuClick(id){
		var name = id.id;
		$('.menu ul li a.active').removeClass('active');
		$('.menu ul li a#'+name).addClass('active');
		
   		if(a<=name){
			$('.'+a).hide();
		} a++;
		
	};

</script>

<script type="text/javascript">
    wax.tilejson('http://a.tiles.mapbox.com/v3/shre.map-ime6dajf.jsonp',
    function(tilejson) {
		var map = L.map('mapkop',{ zoomControl: false }).setView([-6.913169,107.649303],13);
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
	
		
	   		      map.scrollWheelZoom.disable();
			L.control.scale().addTo(map);
            new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
//			new L.GeoJSON(['maps/geojson_bandung.json']).addTo(map);
        var marker;
		function getAllMarker(){
			var urls = 'content' +'/ajaxpeta.php';
			jQuery.ajax({type: 'GET', url: urls, dataType: 'json',
				success: function(v){
					for(i in v){
						if (v[i].lnt != '' && v[i].lng != ''){
						
						//printMarker(v[i].id,v[i].nama,v[i].lnt,v[i].lng,v[i].luas);
						updateMarkerStatus(v[i].id, v[i].nama, v[i].pengurus, v[i].lnt, v[i].lng, v[i].benkop, v[i].jenkop,v[i].kelkop, v[i].sktr, v[i].almt, v[i].kel,  v[i].gam);
						}
					}
				}
			});
		}
		var datakop = new L.LayerGroup();
        function updateMarkerStatus(id,nama,pengurus,lnt,lng,benkop,jenkop,kelkop,sktr,almt,kel,eml,gam){
			
			var html = '<div class="bubble"><div class="img" onclick="overlay2('+id+')"> \
			<img src="" alt="" /> \
			</div> \
				<span class="title" title="Nama Koperasi">'+nama+'</span>\
				<div class="info-box  kec-list">\
					<div class="boxes">\
						<label title="Pengurus Koperasi">Pengurus</label>\
						<div class="desc">'+pengurus+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Bentuk Koperasi">Bentuk Koperasi</label>\
						<div class="desc">'+benkop+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Jenis Koperasi">Jenis Koperasi</label>\
						<div class="desc">'+jenkop+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Kelompok Koperasi">Kelompok Koperasi</label>\
						<div class="desc">'+kelkop+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Sektor Usaha">Sektor Usaha</label>\
						<div class="desc">'+sktr+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Alamat">Alamat</label>\
						<div class="desc">'+almt+' Kel '+kel+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="portfolio-item">\
						<label title="Gambar">Gambar</label>\
						<h5>&nbsp;</h5>\
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="145px" height="145px" /> \
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="145px" height="145px" /> \
						<h5>&nbsp;</h5>\
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="95px" height="95px" /> \
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="95px" height="95px" /> \
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="95px" height="95px" /> \
						<div class="clear"></div>\
					</div>\
				</div>\
				<div class="clear"></div> \
			</div>';

		 	var myIcon = new L.icon({ 
				iconUrl: 'maps/images/marker-icon1.png',
				iconSize: [27, 39],
				iconAnchor: [13, 38],
				popupAnchor: [0, 0],
				shadowUrl: 'maps/images/marker-shadow.png',
				shadowSize: [41, 41],
				shadowAnchor: [13, 38]
			});
			var datakoperasi = new L.marker([lnt, lng], {icon: myIcon, bounceOnAdd: true}, ).bindPopup(html).addTo(datakop);
        }
		getAllMarker();
		
		function getPrioritasMarker(){
			var urlsp = 'content' +'/ajaxprioritas.php';
			jQuery.ajax({type: 'GET', url: urlsp, dataType: 'json',
				success: function(data){
					for(i in data){
						if (data[i].lnt != '' && data[i].lng != ''){
						
						//printMarker(v[i].id,v[i].nama,v[i].lnt,v[i].lng,v[i].luas);
						updateMarkerStatusPrio(data[i].id, data[i].nama, data[i].pengurus, data[i].lnt, data[i].lng, data[i].benkop, data[i].jenkop,data[i].kelkop, data[i].sktr, data[i].almt, data[i].kel,  data[i].gam);
						}
					}
				}
			});
		}
		var datakopprio = new L.LayerGroup();
        function updateMarkerStatusPrio(id,nama,pengurus,lnt,lng,benkop,jenkop,kelkop,sktr,almt,kel,eml,gam){
			
			var html = '<div class="bubble"><div class="img" onclick="overlay2('+id+')"> \
			<img src="" alt="" /> \
			</div> \
				<span class="title" title="Nama Koperasi">'+nama+'</span>\
				<div class="info-box  kec-list">\
					<div class="boxes">\
						<label title="Pengurus Koperasi">Pengurus</label>\
						<div class="desc">'+pengurus+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Bentuk Koperasi">Bentuk Koperasi</label>\
						<div class="desc">'+benkop+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Jenis Koperasi">Jenis Koperasi</label>\
						<div class="desc">'+jenkop+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Kelompok Koperasi">Kelompok Koperasi</label>\
						<div class="desc">'+kelkop+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Sektor Usaha">Sektor Usaha</label>\
						<div class="desc">'+sktr+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Alamat">Alamat</label>\
						<div class="desc">'+almt+' Kel '+kel+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="portfolio-item">\
						<label title="Gambar">Gambar</label>\
						<h5>&nbsp;</h5>\
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="145px" height="145px" /> \
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="145px" height="145px" /> \
						<h5>&nbsp;</h5>\
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="95px" height="95px" /> \
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="95px" height="95px" /> \
						<img alt="" class="img-thumbnail" src="content/images/koperasi/'+gam+'" width="95px" height="95px" /> \
						<div class="clear"></div>\
					</div>\
				</div>\
				<div class="clear"></div> \
			</div>';

		 	var myIcon = new L.icon({ 
				iconUrl: 'maps/images/marker-icon.png',
				iconSize: [27, 39],
				iconAnchor: [13, 38],
				popupAnchor: [0, 0],
				shadowUrl: 'maps/images/marker-shadow.png',
				shadowSize: [41, 41],
				shadowAnchor: [13, 38]
			});
			var datakoperasiprio = new L.marker([lnt, lng], {icon: myIcon , bounceOnAdd: true}).bindPopup(html).addTo(datakopprio);
        }
		getPrioritasMarker();
		
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
			function onEachFeature(feature, layer) {
				// does this feature have a property named popupContent?
				if (feature.properties && feature.properties.nama_kecamatan) {
					layer.bindPopup(feature.properties.nama_kecamatan);
				}
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
			var kecamatan = new L.LayerGroup();
		    var GEOkecamatan = new L.geoJson(GEOkecamatan,{style: style,onEachFeature:onEachFeature}).addTo(kecamatan);
		
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
					GEOkecamatan.addData(data);
				});
			}			
			}).error(function() {});		


		
			var overlays={
			"Kota":bandung,
			"Kecamatan":kecamatan,
			"Koperasi" : datakop,
			"Prioritas" : datakopprio	
			}		
			var lc=L.control.layers(baseMaps,overlays,{position: 'bottomright'});
			lc.addTo(map);	
		
			var legend = L.control({position: 'bottomright'});

			legend.onAdd = function (map) {

				var div = L.DomUtil.create('div', 'info legend'),
					labels = ['<strong> Kecamatan</strong>'],
					//categories  = ['Andir'];
					categories  = ['Andir','Antapani','Arcamanik','Astana Anyar','Babakan Ciparay','Bandung Kidul','Bandung Kulon','Bandung Wetan', 'Batununggal', 'Bojongloa Kaler', 'Bojongloa Kidul','Buah Batu','Cibeunying Kaler','Cibeunying Kidul', 'Cibiru', 'Cicendo', 'Cidadap', 'Cinambo', 'Coblong', 'Gedebage', 'Kiaracondong', 'Lengkong', 'Mandaljati', 'Panyileukan', 'Rancasari','Regol','Sukajadi','Sukasari','Sumur Bandung', 'Ujung Berung'];			

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
    });
	
</script>	
<div id="mapkop" style="width:100%; height:768px;"></div>
