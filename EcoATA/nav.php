<?php
// Inicia a sessão apenas se ainda não tiver sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="./css/estilo.css">
<nav class="menu">

    <a href="index.php" class="logo">
        <svg width="180" height="40" viewBox="0 0 180 40"
             xmlns="http://www.w3.org/2000/svg">

            <path d="M 20 5 C 12 5, 5 12, 5 20 C 5 30, 20 40, 20 40 C 20 40, 35 30, 35 20 C 35 12, 28 5, 20 5 Z"
                  fill="none" stroke="#00e676" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round"/>

            <path d="M 20 12 C 15 16, 15 23, 20 27 C 25 23, 25 16, 20 12 Z"
                  fill="#00e676"/>

            <text x="45" y="28" font-family="Arial, sans-serif"
                  font-size="24" font-weight="900" letter-spacing="1">
                <tspan fill="#00e676">Eco</tspan><tspan fill="#ffffff">ATA</tspan>
            </text>
        </svg>
    </a>

    <ul>
        <li class="home"><a href="./index.php">Home</a></li>
        <li><a href="./sobre.php">Sobre</a></li>
        
        <?php if (isset($_SESSION['id_usuario'])): ?>
            <!-- Menu para utilizador logado -->
            <li><a href="./recompensa.php">Recompensas</a></li>
            <li class="login"><a href="./logout.php">Sair</a></li>
        <?php else: ?>
            <!-- Menu para visitante -->
            <li class="login"><a href="./login.php">Login</a></li>
        <?php endif; ?>
        <li class="acessibilidade">
            <button type="button" class="botao-acessibilidade" id="botao-acessibilidade"
                    aria-controls="menu-acessibilidade" aria-expanded="false"
                    aria-label="Abrir opções de acessibilidade" title="Acessibilidade">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle class="circulo-externo" cx="12" cy="12" r="10"></circle>
                        <circle class="figura-acessibilidade" cx="12" cy="5.1" r="1.55"></circle>
                        <path class="figura-acessibilidade" d="M12 7.2v6.6M12 9.2 6.7 11.4M12 9.2l5.3 2.2M12 13.8l-3.5 4.8M12 13.8l3.5 4.8"></path>
                    </svg>
            </button>
            <div class="menu-acessibilidade" id="menu-acessibilidade" hidden>
                <p>Preferências visuais</p>
                <button type="button" data-acao="diminuir-texto">A- Diminuir texto</button>
                <button type="button" data-acao="aumentar-texto">A+ Aumentar texto</button>
                <button type="button" data-acao="contraste" aria-pressed="false">Alto contraste</button>
                <button type="button" data-acao="links" aria-pressed="false">Destacar links</button>
                <button type="button" data-acao="normal">Voltar ao normal</button>
            </div>
        </li>
    </ul>
</nav>
<script src="./js/acessibilidade.js" defer></script>
