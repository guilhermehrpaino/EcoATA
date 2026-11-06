const elementoMapa = document.getElementById('mapa');

const arquivoGeoJSON = elementoMapa.dataset.geojson;

const mapa = L.map('mapa').setView([-21.2075, -50.4400], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
    attribution: '&copy; OpenStreetMap'
    }
).addTo(mapa);



let linhas = {};
let paradasLayer = L.layerGroup().addTo(mapa);
let rotasLayer = L.layerGroup().addTo(mapa);
let chavesSemIdentificar = new WeakMap();
let indiceLinhaSemIdentificacao = 1;

function obterNome(properties) {
    return String(
        properties.linha ||
        properties.nome ||
        'Linha sem Identificação'
    );
}

function obterChaveLinha(feature) {
    const properties = feature.properties;
    const identificador = properties.linha ||
    properties.nome ||
    properties.stroke ||
    properties.route_short_name ||
    properties.route_id;
    
    if (identificador) {
        return String(identificador);
    }

    if (!chaveSemIdentificacao.has(feature)) {
        chaveSemIdentificacao.set(feature, `Linha sem Identificação ${indiceLinhaSemIdentificacao}`);
        indiceLinhaSemIdentificacao++;
    }

    return chaveSemIdentificacao.get(feature);
}

let indiceCor = 0;

fetch(arquivoGeoJSON)
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro ao carregar o arquivo GeoJSON');
        }
        return response.json();

    })
    .then(geoJsonData => {
        L.geoJSON(geoJsonData, {
            style: function (feature) {
                const properties = feature.properties || {};
                const nomeLinha = obterChaveLinha(feature);

                if (!linhas[nomeLinha]) {
                    linhas[nomeLinha] = properties.stroke ||
                    cores[indiceCor % coresLength];
                    indiceCor++;
                }

                return {
                    color: linhas[nomeLinha],
                    weight: 5,
                    opacity: 0.85
                };
            },

        pointToLayer: function (feature, latlng) {
            const properties = feature.properties || {};
            const tamanhos = {
                small: 4,
                medium: 6,
                large: 8
            };
            const icones = {
                bus: '../rotas/icon/bus.svg'
            };
            const simbolo = properties['marker-symbol'];

            if (icones[simbolo]) {
                const tamanho = tamanhos[properties['marker-size']] || 6;
                const dimensao = 28;
                const cor = properties['marker-color'] || '#ff8401';

                return L.marker(latlng, {
                    icon: L.divIcon({
                       className: 'marcador-ponto',
                            html: `
                                <div class="icone-ponto" style="border-color: ${cor}">
                                    <span
                                        class="icone-onibus"
                                        style="background-color: ${cor}; -webkit-mask-image: url('${icones[simbolo]}'); mask-image: url('${icones[simbolo]}')"
                                    ></span>
                                </div>
                            `,
                            iconSize: [dimensao, dimensao],
                            iconAnchor: [dimensao / 2, dimensao / 2],
                            popupAnchor: [0, -dimensao / 2] 
                    })
                });
             }

             return L.circleMarker(latlng, {
                radius: tamanhos[properties['marker-size']] || 6,
                fillColor: properties['marker-color'] || '#ffffff',
                color: properties['marker-color'] || '#333333',
                weight: 2,
                opacity: 1,
                fillOpacity: 1
             });
        },

        onEachFeature: function (feature, layer) {
            const properties = feature.properties || {};
            const tipo = feature.geometry.type;

            layer.bindPopup(`<strong>${obterNome(properties)}</strong>`);

            if (tipo === 'LineString' || tipo === 'MultiLineString') {
                    rotasLayer.addLayer(layer);
                } else if (tipo === 'Point' || tipo === 'MultiPoint') {
                    paradasLayer.addLayer(layer);
                }
        }
    });
}).catch(error => {
    console.error('Erro ao carregar o arquivo GeoJSON:', error);
});