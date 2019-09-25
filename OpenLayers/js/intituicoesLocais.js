

function localAtual(cordenadaLong, cordenadaLat) {
	var localAtual = new ol.Feature({
		geometry: new ol.geom.Point(
			ol.proj.fromLonLat([cordenadaLong, cordenadaLat]), // Coordenadas da ilha
		),
		name: 'Local Atual'
	});
		
	localAtual.setStyle(new ol.style.Style({
		image: new ol.style.Icon(({
			color: '#ffcd46',
			anchor: [0.5, 0.5],
			crossOrigin: 'anonymous',
			src: 'images/marker-icon.png',
			size : [50, 82],
			scale : 0.8
		}))
	}));
	
	return localAtual;
}

var Egidio = new ol.Feature({
	geometry: new ol.geom.Point(
		ol.proj.fromLonLat([-50.3421, -27.8422]), // Coordenadas do IF
	),
	name: "IFC - Camboriu"
});

Egidio.setStyle(new ol.style.Style({
	image: new ol.style.Icon(({
		color: '#ffcd46',
		anchor: [0.5, 0.5],
		crossOrigin: 'anonymous',
		src: 'images/iconeEscola.png',
		size : [700, 602],
		scale : 0.1
	}))
}));

var Industrial = new ol.Feature({
	geometry: new ol.geom.Point(
		ol.proj.fromLonLat([-50.324,  -27.8254]), // Coordenadas do IF
	),
	name: "IFC - Camboriu"
});

Industrial.setStyle(new ol.style.Style({
	image: new ol.style.Icon(({
		color: '#ffcd46',
		anchor: [0.5, 0.5],
		crossOrigin: 'anonymous',
		src: 'images/iconeEscola.png',
		size : [700, 602],
		scale : 0.1
	}))
}));

var Joao = new ol.Feature({
	geometry: new ol.geom.Point(
		ol.proj.fromLonLat([-48.63549,  -26.9923]), // Coordenadas do IF
	),
	name: "IFC - Camboriu"
});

Joao.setStyle(new ol.style.Style({
	image: new ol.style.Icon(({
		color: '#ffcd46',
		anchor: [0.5, 0.5],
		crossOrigin: 'anonymous',
		src: 'images/iconeEscola.png',
		size : [700, 602],
		scale : 0.1
	}))
}));

var IFC = new ol.Feature({
	geometry: new ol.geom.Point(
		ol.proj.fromLonLat([-48.658646, -27.015599]), // Coordenadas do IF
	),
	name: "IFC - Camboriu"
});

IFC.setStyle(new ol.style.Style({
	image: new ol.style.Icon(({
		color: '#ffcd46',
		anchor: [0.5, 0.5],
		crossOrigin: 'anonymous',
		src: 'images/iconeEscola.png',
		size : [700, 602],
		scale : 0.1
	}))
}));