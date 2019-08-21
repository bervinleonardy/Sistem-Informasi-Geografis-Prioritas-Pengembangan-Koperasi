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
		var map = L.map('mapkop',{ zoomControl: false }).setView([-6.917464,107.619125],13);
				  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors | develop by <a href="https://blaxtech.blogspot.com/">Blaxtech</a> '
					}).addTo(map);		
       // var map = new L.Map('maptbn');
	   		      map.scrollWheelZoom.disable();
			L.control.scale().addTo(map);
            new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);
        var marker;
		function getAllMarker(){
			var urls = 'content' +'/ajaxpeta_ak.php';
			jQuery.ajax({type: 'GET', url: urls, dataType: 'json',
				success: function(v){
					for(i in v){
						if (v[i].lnt != '' && v[i].lng != ''){
						
						//printMarker(v[i].id,v[i].nama,v[i].lnt,v[i].lng,v[i].luas);
						updateMarkerStatus(v[i].id, v[i].nama, v[i].pemilik, v[i].lnt, v[i].lng, v[i].produk, v[i].skl, v[i].sktr, v[i].almt, v[i].eml, v[i].tlp);
						}
					}
				}
			});
		}
		
        function updateMarkerStatus(id,nama,pemilik,lnt,lng,produk,skl,sktr,almt,eml,tlp){
			
			var html = '<div class="bubble"><div class="img" onclick="overlay2('+id+')"> \
			<img src="" alt="" /> \
			</div> \
				<span class="title" title="Nama Usaha">'+nama+'</span>\
				<div class="info-box  kec-list">\
					<div class="boxes">\
						<label title="Pemilik Usaha">Pemilik</label>\
						<div class="desc">'+pemilik+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Produk Utama">Produk Utama</label>\
						<div class="desc">'+produk+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Skala Usaha">Skala Usaha</label>\
						<div class="desc">'+skl+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Sektor Usaha">Sektor Usaha</label>\
						<div class="desc">'+sktr+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Alamat">Alamat</label>\
						<div class="desc">'+almt+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="Email">Email</label>\
						<div class="desc">'+eml+'</div>\
						<div class="clear"></div>\
					</div>\
					<div class="boxes">\
						<label title="No. Telp">No. Telp</label>\
						<div class="desc">'+tlp+'</div>\
						<div class="clear"></div>\
					</div>\
				</div>\
				<div class="clear"></div> \
			</div>';

			//marker = L.marker([e.getLatLng()],{draggable:true,title:'Dragg for get location & address...'}).addTo(map);
			marker = L.marker([lnt, lng]) .addTo(map).bindPopup(html);
			/*marker.on("mouseover",function(e){
				L.popup().setLatLng([lnt, lng]).setContent('<p>Hello world!<br />This is a nice popup.</p>').openOn(map);
			});
			marker.on("mouseout",function(e){
				
			});*/
        }
		getAllMarker();

    });
</script>

<div id="mapgis_ak" style="width:100%; height:768px;"></div>
