<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoATA - Linha 123</title>

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/linhas.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>

<body>

    <?php require_once "./nav_linhas.php" ?>

    <main>

        <div class="titulo">
            <h1>Linha 123 - Alvorada</h1>
        </div>

        <div class="layout">


            <!-- COLUNA DO ITINERÁRIO E HORÁRIOS -->
            <div class="conteudo">

                <!-- ITINERÁRIO -->
                <div class="trajeto">

                    <div class="trajeto-header">
                        Sentido: Alvorada (17 pontos)
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
                                <p>Rua Humaitá, 1070</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Major Mendonça, 982</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Antônio Poço, 1055</p>
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
                                <p>Avenida Joaquim Pompeu de Toledo, 240-326</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Professor Jorge Corrêa, 2-34</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Gaspar de Lemos, 225-289</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua São Caetano, 397-475</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Florêncio de Abreu, 836-964</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Travessa Guatambú, 2-44</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Ramos de Azevedo, 873-917</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Ramos de Azevedo, 711-797</p>
                            </div>
                        </div>

                        <div class="ponto">
                            <div class="ponto-info">
                                <p>Rua Ramos de Azevedo, 563-615</p>
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

                                    <td>06:20 - 07:20 - 08:20 - 09:20 - 10:20 - 11:20 - 12:20 - 13:20 - 14:20 - 15:20 -
                                        16:20 - 17:20 - 18:20 - 19:20 - 20:20 - 21:20 - 22:20 - 23:20</td>

                                    <td>05:50 - 06:50 - 07:50 - 08:50 - 09:50 - 10:50 - 11:50 - 12:50 - 13:50 - 14:50 -
                                        15:50 - 16:50 - 17:50 - 18:50 - 19:50 - 20:50 - 21:50 - 22:50</td>

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

                                    <td>06:20 - 07:20 - 08:20 - 09:20 - 10:20 - 11:20 - 12:20 - 13:20 - 14:20 - 16:20 -
                                        17:20 - 18:20</td>

                                    <td>05:50 - 06:50 - 07:50 - 08:50 - 09:50 - 10:50 - 11:50 - 12:50 - 13:50 - 14:50 -
                                        16:50 - 17:50</td>

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

                                    <td>07:20 - 08:20 - 09:20 - 10:20 - 13:20 - 14:20 - 15:20 - 16:20</td>
                                        
                                    <td>06:50 - 07:50 - 08:50 - 09:50 - 10:50 - 13:50 - 14:50 - 15:50 - 16:50</td>
                                        
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

            <!-- COLUNA DO MAPA -->
            <div class="coluna-mapa">

                <div id="mapa" data-geojson="../rotas/rota123.geojson">
                </div>

            </div>

        </div>

    </main>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="../js/mapa.js"></script>

    <?php require_once "./footer.php" ?>

    </body>
</html>