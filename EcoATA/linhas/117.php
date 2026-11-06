
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoATA - Linha 117</title>

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/linhas.css">

    <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>

<body>

    <?php require_once "./nav_linhas.php" ?>

    <main>

        <div class="titulo">
            <h1>Linha 117</h1>
        </div>

        <div class="layout">

            <!-- COLUNA DO ITINERÁRIO E HORÁRIOS -->
            <div class="conteudo">

                <!-- ITINERÁRIO -->
                <div class="trajeto">

                    <div class="trajeto-header">
                        Sentido: Terminal (16 pontos)
                    </div>

                    <div class="trajeto-conteudo">

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Umuarama, 640</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua João Batista Botelho, 1076</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Sebastião Guimarães Corrêa, 335</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Doutor Francisco Vilela, 715</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Baguaçu, 2077</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Joaquim Pompeu De Toledo, 597-659</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Joaquim Pompeu De Toledo, 35-197</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 817-909</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 1333-1425</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Avenida Brasília, 879</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Luiz Pereira Barreto, 637</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Luiz Pereira Barreto, 461-507</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Luiz Pereira Barreto, 319</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Luiz Pereira Barreto, 137</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Quinze De Novembro, 206-292</p>
                            </div>
                        </div>

                         <div class="ponto">
                            <div class="ponto-info">
                                <p>Terminal Urbano Nelson Reis Alves</p>
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
                                    <td>6:50 - 7:50 - 8:50 - 9:50 - 10:50 - 11:50 - 12:50 - 13:50 - 14:50 - 15:50 - 16:50</td>
                                    <td>6:20 - 7:20 - 8:20 - 9:20 - 10:20 - 11:20 - 12:20 - 13:20 - 14:20 - 15:20 - 16:20 - 17:20</td>
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
                                    <td>6:50 - 7:50 - 8:50 - 9:50 - 10:50 - 11:50 - 12:50 - 13:50</td>
                                    <td>6:20 - 7:20 - 8:20 - 9:20 - 10:20 - 11:20 - 12:20 - 13:20</td>
                                </tr>
                            </table>
                        </div>

                        <div class="titulo_tabela">
                            <h4>Domingos e Feriados</h4>
                            <p>Sem funcionamento</p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- COLUNA DO MAPA -->
            <div class="coluna-mapa">

                <div id="mapa"
                    data-geojson="../rotas/rota117.geojson">
                </div>

            </div>

        </div>

    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="../js/mapa.js"></script>

</body>
</html>
