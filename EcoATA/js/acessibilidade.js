(function () {
    "use strict";

    var botao = document.getElementById("botao-acessibilidade");
    var menu = document.getElementById("menu-acessibilidade");

    if (!botao || !menu) {
        return;
    }

    var tamanhos = [0.8, 0.9, 1, 1.15, 1.3, 1.45];
    var valorSalvo = parseInt(localStorage.getItem("ecoataTexto"), 10);
    var indiceEscala = Number.isInteger(valorSalvo) ? valorSalvo : 2;
    indiceEscala = Math.max(0, Math.min(tamanhos.length - 1, indiceEscala));
    var contraste = localStorage.getItem("ecoataContraste") === "1";
    var links = localStorage.getItem("ecoataLinks") === "1";

    function aplicarPreferencias() {
        document.documentElement.style.zoom = tamanhos[indiceEscala];
        localStorage.setItem("ecoataTexto", String(indiceEscala));
        document.documentElement.classList.toggle("alto-contraste", contraste);
        document.documentElement.classList.toggle("destacar-links", links);

        var botaoContraste = menu.querySelector('[data-acao="contraste"]');
        var botaoLinks = menu.querySelector('[data-acao="links"]');
        botaoContraste.setAttribute("aria-pressed", contraste ? "true" : "false");
        botaoLinks.setAttribute("aria-pressed", links ? "true" : "false");
    }

    function fecharMenu() {
        menu.hidden = true;
        botao.setAttribute("aria-expanded", "false");
    }

    function posicionarMenuMobile() {
        if (window.innerWidth > 600 || menu.hidden) {
            menu.style.removeProperty("position");
            menu.style.removeProperty("left");
            menu.style.removeProperty("right");
            menu.style.removeProperty("top");
            return;
        }

        var larguraPainel = Math.min(220, window.innerWidth - 24);
        var esquerda = (window.innerWidth - larguraPainel) / 2;

        menu.style.position = "fixed";
        menu.style.left = esquerda + "px";
        menu.style.right = "auto";
        menu.style.width = larguraPainel + "px";
        menu.style.top = "78px";
    }

    botao.addEventListener("click", function () {
        menu.hidden = !menu.hidden;
        botao.setAttribute("aria-expanded", menu.hidden ? "false" : "true");
        posicionarMenuMobile();
    });

    window.addEventListener("resize", posicionarMenuMobile);

    menu.addEventListener("click", function (evento) {
        var acao = evento.target.closest("[data-acao]");
        if (!acao) {
            return;
        }

        switch (acao.dataset.acao) {
            case "diminuir-texto":
                indiceEscala = Math.max(0, indiceEscala - 1);
                break;
            case "aumentar-texto":
                indiceEscala = Math.min(tamanhos.length - 1, indiceEscala + 1);
                break;
            case "contraste":
                contraste = !contraste;
                localStorage.setItem("ecoataContraste", contraste ? "1" : "0");
                break;
            case "links":
                links = !links;
                localStorage.setItem("ecoataLinks", links ? "1" : "0");
                break;
            case "normal":
                indiceEscala = 2;
                contraste = false;
                links = false;
                localStorage.setItem("ecoataTexto", String(indiceEscala));
                localStorage.setItem("ecoataContraste", "0");
                localStorage.setItem("ecoataLinks", "0");
                break;
        }

        aplicarPreferencias();
    });

    document.addEventListener("keydown", function (evento) {
        if (evento.key === "Escape") {
            fecharMenu();
            botao.focus();
        }
    });

    document.addEventListener("click", function (evento) {
        if (!menu.contains(evento.target) && !botao.contains(evento.target)) {
            fecharMenu();
        }
    });

    aplicarPreferencias();
})();
