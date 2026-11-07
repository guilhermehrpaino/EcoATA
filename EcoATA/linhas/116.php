
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoATA - Linha 116</title>

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/linhas.css">

    <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>

<body>

    <?php require_once "./nav_linhas.php" ?>

    <main>

        <div class="titulo">
            <h1>Linha 116 - Jussara / Lago Azul / Nova York</h1>
        </div>

        <div class="layout">

            <!-- COLUNA DO ITINERÁRIO E HORÁRIOS -->
            <div class="conteudo">

                <!-- ITINERÁRIO -->
                <div class="trajeto">

                    <div class="trajeto-header">
                        Sentido: Lago Azul (18 pontos)
                    </div>

                    <div class="trajeto-conteudo">

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Terminal Urbano Nelson Reis Alves</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Joaquim Nabuco, 43</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Campos Sales, 138</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 466</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 818</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 994-1034</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 2020-2028</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Da Saudade, 1908-1912</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Jean Pierre Brulhart, 86-134</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Jean Pierre Brulhart, 216-286</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua São Francisco, 45</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua São Francisco, 428</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Jarbas Barros Galvão, 753-799</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Jarbas Barros Galvão, 581</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Itamar Martinês Álvares, 20</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Itamar Martinês Álvares, 314-374</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Padre Roberto Pérez, 240</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Afonso Machado Gomes, 655-687</p>
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
                                    <td>6:20 - 7:20 - 8:20 - 9:20 - 10:20 - 11:20 - 12:20 - 13:20 - 14:20 <br> 
                                    15:20 - 16:20 - 17:20 - 18:20 - 19:20 - 20:20 - 21:20 - 22:20 - 23:20</td>
                                    <td>5:50 - 6:20 - 6:50 - 7:50 - 8:50 - 9:50 - 10:50 - 11:50 - 12:50 - 13:50 - 14:50 
                                        <br> 15:50 - 16:50 - 17:50 - 18:50 - 19:50 - 20:50 - 21:50 - 22:50</td>
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
                                    <td>6:20 - 7:20 - 8:20 - 9:20 - 10:20 - 11:20 - 12:20 <br> 13:20 - 14:20 - 16:20 - 17:20 - 18:20</td>
                                    <td>5:50 - 6:50 - 7:50 - 8:50 - 9:50 - 10:50 - 11:50 <br> 12:50 - 13:50 - 14:50 - 16:50 - 17:50</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="titulo_tabela">
                        <h4>Domingos e Feriados</h4>
                        
                        <div class="tabela">
                            <table>
                                <tr>
                                    <th>Terminal → Bairro</th>
                                    <th>Bairro → Terminal</th>
                                </tr>
                                <tr>
                                    <td>7:20 - 8:20 - 9:20 - 10:20 - 13:20 - 14:20 - 15:20 - 16:20</td>
                                    <td>6:50 - 7:50 - 8:50 - 9:50 - 10:50 - 13:50 - 14:50 - 15:50</td>
                                </tr>
                            </table>
                        </div>



                    </div>

                </div>

            </div>

            <!-- COLUNA DO MAPA -->
            <div class="coluna-mapa">

                <div id="mapa"
                    data-geojson="../rotas/rota116.geojson">
                </div>

            </div>

        </div>

    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="../js/mapa.js"></script>

</body>
</html>
