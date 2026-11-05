
const elementoMapa = document.getElementById('mapa');

// Descobre qual GeoJSON deve ser carregado
const arquivoGeoJSON = elementoMapa.dataset.geojson;

// Inicializa o mapa
const mapa = L.map('mapa');

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(mapa);

// Carrega o GeoJSON correspondente
fetch(arquivoGeoJSON)
    .then(response => response.json())
    .then(dados => {

        const elementos = L.geoJSON(dados, {

            style: function(feature) {
                return {
                    color: feature.properties.stroke || '#ff8401',
                    weight: 5,
                    opacity: 0.9
                };
            },

            pointToLayer: function(feature, latlng) {
                return L.circleMarker(latlng, {
                    radius: 7,
                    color: '#ffffff',
                    fillColor: feature.properties['marker-color'] || '#ff8401',
                    fillOpacity: 1,
                    weight: 2
                });
            },

            onEachFeature: function(feature, layer) {
                const nome = feature.properties.nome;

                layer.bindPopup(`<strong>${nome}</strong>`);
            }

        }).addTo(mapa);

        // Ajusta o zoom para a rota
        mapa.fitBounds(elementos.getBounds(), {
            padding: [30, 30]
        });

    })
    .catch(erro => {
        console.error('Erro ao carregar a rota:', erro);
    });
