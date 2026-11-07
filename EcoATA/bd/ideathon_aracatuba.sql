-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2026 às 22:30
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ideathon_aracatuba`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_scans`
--

CREATE TABLE `historico_scans` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_qrcode` int(11) NOT NULL,
  `lido_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `historico_scans` (`id`, `id_usuario`, `id_qrcode`, `lido_em`) VALUES
(1, 1, 1, '2026-11-05 12:19:16');

--
-- Estrutura para tabela `qr_codes`
--

CREATE TABLE `qr_codes` (
  `id` int(11) NOT NULL,
  `hash_codigo` varchar(255) NOT NULL,
  `id_linha` int(11) DEFAULT NULL,
  `pontos_concedidos` int(11) DEFAULT 50,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `qr_codes` (`id`, `hash_codigo`, `id_linha`, `pontos_concedidos`, `ativo`) VALUES
(1, 'QR-LINHA-01-FATEC', 1, 50, 1);

--
-- Estrutura para tabela `recompensas`
--

CREATE TABLE `recompensas` (
  `id` int(11) NOT NULL,
  `parceiro` varchar(100) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `custo_pontos` int(11) NOT NULL,
  `estoque` int(11) DEFAULT -1,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `recompensas` (`id`, `parceiro`, `titulo`, `custo_pontos`, `estoque`, `ativo`) VALUES
(1, 'Farmácia XYZ', '10% de Desconto', 500, -1, 1),
(2, 'Supermercado ABC', 'R$ 15 em compras', 1200, -1, 1),
(3, 'Lanchonete Ponto', 'Coxinha + Refri', 800, -1, 1),
(4, 'Cinema Municipal', 'Ingresso Meia Entrada', 1500, -1, 1);


--
-- Estrutura para tabela `resgates`
--

CREATE TABLE `resgates` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_recompensa` int(11) NOT NULL,
  `codigo_cupom` varchar(50) NOT NULL,
  `resgatado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `resgates` (`id`, `id_usuario`, `id_recompensa`, `codigo_cupom`, `resgatado_em`) VALUES
(1, 1, 3, 'ARA-2EAB19', '2026-11-04 13:57:46');

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `saldo_pontos` int(11) DEFAULT 0,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `saldo_pontos`, `criado_em`) VALUES
(1, 'Cidadão Teste', 'teste@aracatuba.sp.gov.br', '$2y$10$keP/jeZYaUtPuUk6w0jUgetjrClsUcYS7iDobdnk0FIxOAvPMZ9IG', 750, '2026-11-04 13:42:59'),
(2, 'Administrador', 'admin', '$2y$10$vPHtOwuN7YoH63p81lgY3etxB/q89eypwp.RqU2I1xZli5eNo1hWS', 5000, '2026-11-05 12:49:58');

ALTER TABLE `historico_scans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_qrcode` (`id_qrcode`);

ALTER TABLE `qr_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash_codigo` (`hash_codigo`);

ALTER TABLE `recompensas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `resgates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_recompensa` (`id_recompensa`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `historico_scans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `qr_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `recompensas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `resgates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `historico_scans`
  ADD CONSTRAINT `historico_scans_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `historico_scans_ibfk_2` FOREIGN KEY (`id_qrcode`) REFERENCES `qr_codes` (`id`);


ALTER TABLE `resgates`
  ADD CONSTRAINT `resgates_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `resgates_ibfk_2` FOREIGN KEY (`id_recompensa`) REFERENCES `recompensas` (`id`);
COMMIT;

