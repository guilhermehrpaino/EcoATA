<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós | EcoAta</title>

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial;
        color: #222;
        background-color: #f8faf9;
    }

    main {
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    main h1 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #176b40;
    }

    main h2 {
        font-size: 26px;
        margin-bottom: 20px;
        color: #176b40;
    }

    main p {
        text-align: justify;
        line-height: 1.8;
        margin-bottom: 20px;
        text-indent: 0;
    }

    section {
        margin-bottom: 55px;
    }



    .fundadores {
        text-align: center;
    }

    .fundadores-descricao {
        text-align: center;
        margin-bottom: 30px;
        text-indent: 0;
    }

    .fundadores-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
    }

    .fundador-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 30px 20px;
        width: 220px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .fundador-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.10);
    }

    .fundador-card h3 {
        font-size: 17px;
        color: #222;
        margin: 0 0 10px;
    }

    .fundador-card span {
        color: #16834a;
        font-size: 14px;
        font-weight: 500;
    }



    .aviso {
        padding: 20px;
        background-color: #edf5ef;
        border-left: 4px solid #16834a;
        border-radius: 5px;
    }

    .aviso p {
        margin: 0;
        font-size: 14px;
    }

    .fundadores h2 {

        margin-bottom: 50px;

    }



    @media (max-width: 600px) {
        main {
            padding: 30px 15px;
        }

        main h1 {
            font-size: 27px;
        }

        main h2 {
            font-size: 23px;
        }

        .fundadores-container {
            flex-direction: column;
            align-items: center;
        }

        .fundador-card {
            width: 100%;
            max-width: 320px;
        }
    }
    </style>
</head>

<body>

    <?php require_once 'nav.php'; ?>

    <main>


        <section>
            <h1>Sobre Nós</h1>

            <p>
                O EcoAta é uma plataforma desenvolvida com o objetivo de facilitar
                o acesso às informações sobre o transporte público de Araçatuba,
                com foco nas linhas de ônibus operadas pela TUA (Transportes Urbanos
                Araçatuba). A iniciativa busca proporcionar uma experiência mais
                simples, organizada e intuitiva para os usuários, reunindo
                informações sobre linhas, horários e itinerários em um único ambiente.

                Por meio de uma interface acessível e de recursos de visualização
                de trajetos em mapas interativos, o EcoAta pretende auxiliar os
                passageiros no planejamento de seus deslocamentos cotidianos,
                contribuindo para uma mobilidade urbana mais informada e eficiente.
            </p>
        </section>

        <section>
            <h2>Conheça a TUA</h2>

            <p>
                A TUA (Transportes Urbanos Araçatuba Ltda.) é a empresa responsável
                pela operação do transporte coletivo urbano de passageiros em
                Araçatuba, São Paulo.

                Fundada oficialmente em 28 de abril de 1970, a empresa iniciou
                suas operações em 24 de outubro do mesmo ano, contribuindo desde
                então para a mobilidade da população araçatubense.

                Ao longo de sua trajetória, a TUA passou por mudanças
                administrativas e pela expansão de sua estrutura, mantendo
                sua atuação no transporte coletivo municipal. Atualmente, é
                responsável pela operação das linhas de ônibus que conectam
                diferentes bairros e regiões da cidade.

                Seu trabalho é fundamental para o deslocamento diário de
                moradores, trabalhadores e estudantes que utilizam o transporte
                público.
            </p>

            <div class="aviso">
                <p>
                    O EcoAta é um projeto independente e não possui vínculo
                    oficial com a TUA. As informações sobre linhas e itinerários
                    disponibilizadas na plataforma têm finalidade exclusivamente
                    informativa.
                </p>
            </div>
        </section>

        <section class="fundadores">

            <h2>Fundadores</h2>



            <p class="fundadores-descricao">
                Conheça os integrantes responsáveis pelo desenvolvimento do EcoAta.
            </p>

            <div class="fundadores-container">

                <div class="fundador-card">

                    <h3>Caiã Caetano</h3>
                    <span>Desenvolvedor</span>
                </div>

                <div class="fundador-card">
                    <h3>Guilherme Henrique</h3>
                    <span>Desenvolvedor</span>
                </div>

                <div class="fundador-card">
                    <h3>Gustavo Floriano</h3>
                    <span>Desenvolvedor</span>
                </div>

                <div class="fundador-card">
                    <h3>João Francisco</h3>
                    <span>Desenvolvedor</span>
                </div>

                <div class="fundador-card">
                    <h3>Vinicius Soles</h3>
                    <span>Desenvolvedor</span>
                </div>

            </div>
        </section>

    </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>
