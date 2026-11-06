<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EcoATA</title>
        
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="stylesheet" href="../css/linhas.css">

        <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    </head>

    <body>
        <?php require_once "../nav.php"; ?>
        <main>
            <div class="titulo">
                <br><h1>Linha 103</h1></br>
            </div>

            <div class="layout">  

                <div class="conteudo">
                    <div class="rota">
                        <h3>Rotas</h3>
                        <p>Centro -> Bairro</p>
                            <p>Terminal; Rua Olavo Bilac, Rua Quinze de novembro; Rua Joaquim Nabuco; Rua Rui Barbosa; Rua Carlos Gomes; Rua Cussy de Almeida Junior; Rua Mal. Hermes da Fonseca; Rua Anhanguera; Av.Carlos Pereira da Silva;Rua Aguapei;Rua Honório Camargo Junior; Rua Celestino Blaya Mendes; Rua Vereador Décio Sampaio; Rua Cesar Bombarda; Rua Doutor Raul Almeida; Av. Presidente Juscelino Kubitscheck de Oliveira;; Rua Antonio Barzague Primo.</p>
                        <p>Bairro -> Centro</p>
                            <p>Rua Antonio Barzague Primo; Av. Presidente Juscelino Kubitscheck de Oliveira; Rua Doutor Raul Almeida; Rua Cesar Bombarda; Rua Vereador Décio Sampaio; Rua Celestino Blaya Mendes; Rua Honório Camargo Junior; Rua Aguapei; Av.Carlos Pereira da Silva; Rua Anhanguera; Rua Mal. Hermes da Fonseca; Rua Cussy de Almeida Junior; Rua Carlos Gomes; Rua Rui Barbosa; Rua Joaquim Nabuco; Rua Quinze de novembro; Rua Olavo Bilac; Terminal.</p>
                    </div>

                    <div class="horario">

                        <h3>Horário de Funcionamento</h3>

                        <div class="titulo_tabela">
                            <h4>Segunda a Sexta</h4>

                            <div class="tabela">
                                <table>
                                    <tr>
                                        <th>Terminal -> Bairro</th>
                                        <th>Bairro -> Terminal</th>
                                    </tr>
                                    <tr>
                                        <td>08:00 - 18:00</td>
                                        <td>08:00 - 12:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="titulo_tabela">
                            <h4>Sábado</h4>
                            <div class="tabela">
                                <table>
                                    <tr>
                                        <th>Terminal -> Bairro</th>
                                        <th>Bairro -> Terminal</th>
                                    </tr>
                                    <tr>
                                        <td>08:00 - 18:00</td>
                                        <td>08:00 - 12:00</td>
                                        <td>Fechado</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="titulo_tabela">
                            <h4>Domingos e Feriados</h4>
                        </div>
                    </div>
                </div>

                <div id="mapa"
                    data-geojson="../rotas/rota103.geojson">
                </div>
            </div>

            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            <script src="../js/mapa.js"></script>
        </main>
    </body>
</html>