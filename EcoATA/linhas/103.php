
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoATA - Linha 103</title>

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/linhas.css">

    <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>

<body>

    <?php require_once __DIR__ . '/../nav.php'; ?>

    <main>

        <div class="titulo">
            <h1>Linha 103</h1>
        </div>

        <div class="layout">

            <!-- COLUNA DO ITINERÁRIO E HORÁRIOS -->
            <div class="conteudo">

                <!-- ITINERÁRIO -->
                <div class="trajeto">

                    <div class="trajeto-header">
                        Sentido: Centro (15 pontos)
                    </div>

                    <div class="trajeto-conteudo">

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Doutor Francisco de Jesus Valloz, 713-845</p>
                                <a href="#">PRÓXIMAS CHEGADAS</a>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Presidente Juscelino Kubitschek de Oliveira</p>
                                <a href="#">PRÓXIMAS CHEGADAS</a>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Vereador Décio Sampaio, 323</p>
                                <a href="#">PRÓXIMAS CHEGADAS</a>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Celestino Blaya Mendes, 160-390</p>
                                <a href="#">PRÓXIMAS CHEGADAS</a>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Honório de Oliveira Camargo Júnior, 355-435</p>
                                <a href="#">PRÓXIMAS CHEGADAS</a>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Shopping Praça Nova</p>
                                <a href="#">PRÓXIMAS CHEGADAS</a>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- HORÁRIOS -->
                <div class="horario">

                    <h3>Horário de Funcionamento</h3>

                    <div class="titulo_tabela">

                        <h4>Segunda a Sexta</h4>

                        <div class="tabela">
                            <table>
                                <tr>
                                    <th>Terminal → Bairro</th>
                                    <th>Bairro → Terminal</th>
                                </tr>
                                <tr>
                                    <td>05:50</td>
                                    <td>06:20</td>
                                </tr>
                                <tr>
                                    <td>06:50</td>
                                    <td>07:20</td>
                                </tr>
                                <tr>
                                    <td>07:50</td>
                                    <td>08:20</td>
                                </tr>
                                <tr>
                                    <td>08:50</td>
                                    <td>09:20</td>
                                </tr>
                                <tr>
                                    <td>09:50</td>
                                    <td>10:20</td>
                                </tr>
                                <tr>
                                    <td>10:50</td>
                                    <td>11:20</td>
                                </tr>
                                <tr>
                                    <td>11:50</td>
                                    <td>12:20</td>
                                </tr>
                                <tr>
                                    <td>12:50</td>
                                    <td>13:20</td>
                                </tr>
                                <tr>
                                    <td>13:50</td>
                                    <td>14:20</td>
                                </tr>
                                <tr>
                                    <td>14:50</td>
                                    <td>15:20</td>
                                </tr>
                                <tr>
                                    <td>15:50</td>
                                    <td>16:20</td>
                                </tr>
                                <tr>
                                    <td>16:50</td>
                                    <td>17:20</td>
                                </tr>
                                <tr>
                                    <td>17:50</td>
                                    <td>18:20</td>
                                </tr>  
                            </table>
                        </div>

                    </div>

                    <div class="titulo_tabela">

                        <h4>Sábado</h4>

                        <div class="tabela">
                            <table>
                                <tr>
                                    <th>Terminal → Bairro</th>
                                    <th>Bairro → Terminal</th>
                                </tr>
                                <tr>
                                    <td>08:00 - 18:00</td>
                                    <td>08:00 - 12:00</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="titulo_tabela">
                        <h4>Domingos e Feriados</h4>
                        <p>Sem funcionamento</p>
                    </div>

                </div>

            </div>

            <!-- COLUNA DO MAPA -->
            <div class="coluna-mapa">

                <div id="mapa"
                    data-geojson="../rotas/rota103.geojson">
                </div>

            </div>

        </div>

    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="../js/mapa.js"></script>

</body>
</html>
