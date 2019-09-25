function MapLoad(cordenadaLat, cordenadaLong, localizacao, Bairro = null, localNome = null, tamanhoZoom){
	let html;

	if(Bairro != null) {
		html = '<h5 class="text-center">Informações sobre o local</h5>';
		html += '<div><h6  class="col-sm-12">Cidade: <span>' + localizacao + '</span></h6></div>';
		html += '<div><h6  class="col-sm-12">Bairro: <span>' + Bairro + '</span></h6></div>';
		html += '<div><h6  class="col-sm-12">Nome Inst: <span>' + localNome + '</span></h6></div>';
	}else{
		html = '<h5 class="text-center">Informações sobre o local</h5><br>';
		html += '<div class="col-sm-12"><h3  class="col-sm-12 text-center">' + localizacao + '</span></h3></div>';
	}
	
	var baseMapLayer = new ol.layer.Tile({
		source: new ol.source.OSM()
	});

	var map = new ol.Map({
		target : 'map',
		layers: [ baseMapLayer
		],
		view: new ol.View({
			center: ol.proj.fromLonLat([cordenadaLong, cordenadaLat]), // Coordenadas do IF
			zoom: tamanhoZoom //Zoom inicial
		})
	});

	var novoElement = document.createElement("div");
	novoElement.innerHTML = "This is a paragraph.";
	novoElement.setAttribute('id', 'popup1');
	document.getElementById("popup").appendChild(novoElement);
	var element = $('#popup1');

	var popup = new ol.Overlay({
		element: element[0],
		stopEvent: false
	});

	map.addOverlay(popup);
	map.on('click', function(e) {		
		let feature = map.forEachFeatureAtPixel(e.pixel, function(feature, layer) {
			return feature;
		})

		if(feature) {		
			var coordinate = feature.getGeometry().getCoordinates();			
			element.show();
			element.html();	
			element.html(html);		
			popup.setPosition(coordinate);
		}else {
			element.hide()
		}
	})

	var vectorSource = new ol.source.Vector({
		features: [Egidio, Industrial, Joao, IFC, localAtual(cordenadaLong, cordenadaLat)]
	});
	
	var markerVectorLayer = new ol.layer.Vector({
		source: vectorSource,
	});

	map.addLayer(markerVectorLayer);	
}