-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2020 às 17:21
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetomind`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`) VALUES
(1, 'teste', 'teste', 'Projeto realizado em laravel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `cpf`, `email`, `password`, `remember_token`, `admin`) VALUES
(1, 'Misael Duarte', '468.495.328-98', 'misael.winphp@gmail.com', '$2y$10$fK0fxeQenXDCTtc87CekxeXbZppD.ptNjxvj/5LtduBsjalvnnu0q', '1PYXvcrh7WjEWka0U2B7Bm27IYmvhrBb2hrfYLy2z9h1GALWq61v3sZJ3E71', 1),
(2, 'Fernando', '032.288.484-50', 'fernando15@gmail.com', '$2y$10$j/em2/UZPesEmOdAujUhV.IBD9Mg7kY5gWfa8wjylPqnGASogaL8G', NULL, 0),
(3, 'Leandro Lopes', '161.647.821-71', 'leandro_lopes@gmail.com', '$2y$10$GId8.UVgkS6jyLBlfeUsKuQbVr5pDZsmu7wdbOug7D8j.M2E/3Zee', NULL, 0),
(4, 'Daniel Duarte', '374.736.245-12', 'daniel.sp@gmail.com', '$2y$10$fmu3ZLAbof9HvKegBKfoaOUcxDwMqEifUQ1i/TdPHgoBySigfWoSi', NULL, 0),
(5, 'Guilherme Ferraz', '286.351.838-00', 'gui.12@gmail.com', '$2y$10$4xmn5UjRb7XoebtmSMmk2uVxvitqMw/rS8XScOvjYoPiO0Yeckhpm', NULL, 0),
(6, 'Ana Clara', '688.761.884-28', 'ana.clara3@yahoo.com', '$2y$10$rz0XqTN3T2QL3e2tqx7QhO/PoYWuTWjolPzmDmLI/Imfsm0CTFg.2', NULL, 0),
(7, 'Carlos Leal', '008.624.144-31', 'disk.delivery@gmail.co', '$2y$10$h6yc4n95FzZ/bTWl6Xgx9.kZDazgMKiCnVfyxWpzB40yYrqV51aKu', NULL, 0),
(8, 'Mateus Costa', '728.991.642-52', 'tadeu@hotmail.com', '$2y$10$oWmP9pytGWzdSKxC0SC0VOUBm6037kglgaTsKBMbTJIZnGUqzDHTu', NULL, 0),
(9, 'Lais Fernanda', '765.531.886-70', 'lais@gmail.com', '$2y$10$rXebW62akhpAlfxFrzCyuOEMFvPU7q6Kt5BxJffmiGpvl79CzgwuC', NULL, 0),
(10, 'Marcos Ferrari', '415.917.752-21', 'marcos@gmail.com', '$2y$10$ovw8fUrGsJSUz852Tk7Gg.KeuWOU8amLRbVoILK7q0bM3g4wF2O/a', NULL, 0),
(11, 'Sara Dantas', '302.123.638-32', 'rogerio14@gmail.com', '$2y$10$ZR89B6cE5ISczIOKJqbAN.2rzZDxY8EuQ0OiaM787WJJfE1iwUIm2', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date_access` datetime DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date_access`, `page`) VALUES
(1, '1', '2020-08-06 10:20:05', '/'),
(2, '1', '2020-08-06 10:20:05', '/'),
(3, '2', '2020-08-06 14:20:44', '/test');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
