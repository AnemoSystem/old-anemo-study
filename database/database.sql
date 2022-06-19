-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 19-Jun-2022 às 19:42
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id19017769_school`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classroom`
--

INSERT INTO `classroom` (`id`, `grade_id`, `period_id`) VALUES
(4, 2, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `function_id` int(11) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `salary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `employee`
--

INSERT INTO `employee` (`id`, `email`, `password`, `name`, `cpf`, `rg`, `function_id`, `phone`, `salary`) VALUES
(11, 'eae@gmail.com', '$2y$10$oWQSbf0Fn74d0aXQu.kRN.HYkTaFtJu5yVsVds7XQoB5mDxf1yra6', 'eae', '444.444.444-44', '44.444.444-4', 15, '(23) 11231-2312', 200.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `function`
--

CREATE TABLE `function` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `function`
--

INSERT INTO `function` (`id`, `name`) VALUES
(15, 'Professor'),
(16, 'poxa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, '2 ano'),
(2, '3 ano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grades_attendance`
--

CREATE TABLE `grades_attendance` (
  `subject_teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_value` decimal(3,1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grades_attendance`
--

INSERT INTO `grades_attendance` (`subject_teacher_id`, `student_id`, `grade_value`, `id`) VALUES
(4, 1, 1.0, 5),
(4, 2, 7.0, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `period`
--

CREATE TABLE `period` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `period`
--

INSERT INTO `period` (`id`, `name`, `start_time`, `end_time`) VALUES
(6, 'Noite', '09:41:00', '09:39:00'),
(7, 'aksdkasd', '19:59:00', '15:56:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `student`
--

INSERT INTO `student` (`id`, `name`, `cpf`, `rg`, `email`, `password`, `classroom_id`, `phone`) VALUES
(1, 'aa', '555.555.555-55', '66.666.666-6', 'aaa@aa', '7283', 4, '(55) 55555-5555'),
(2, 'Guilherme', '555.555.555-55', '66.666.666-6', 'aaa@aa', '5456', 4, '(56) 66666-6666'),
(3, 'aas', '555.555.555-55', '66.666.666-6', 'aaa@aa', '2513', 4, '(56) 66666-6666');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(2, 'Matemática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `teacher_id`, `subject_id`) VALUES
(4, 6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `salary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `cpf`, `rg`, `email`, `password`, `phone`, `salary`) VALUES
(5, 'oi22', '111.111.111-12', '11.111.111-2', 'oi@oi22', '1776', '(11) 11111-1112', 115.00),
(6, 'João', '745.645.645-64', '54.564.564-6', 'asdjja@fjaij', '$2y$10$ep7n4TrLUWh7f6Zfbsvfn.4s8tWZ8abQzOujLz9znmLiADaFFAHz2', '(54) 65456-4646', 454.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_nickname` varchar(30) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `student_id` int(11) NOT NULL,
  `is_logged` bit(1) NOT NULL,
  `id_skin` int(11) NOT NULL,
  `id_torso` int(11) NOT NULL,
  `id_legs` int(11) NOT NULL,
  `id_hair` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `clothes_purchased` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`clothes_purchased`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_nickname`, `user_password`, `student_id`, `is_logged`, `id_skin`, `id_torso`, `id_legs`, `id_hair`, `coins`, `points`, `clothes_purchased`) VALUES
('guisamuel', 'desenhando', 2, b'0', 0, 0, 0, 0, 0, 0, NULL),
('joao123', 'teste', 1, b'0', 0, 0, 0, 0, 0, 0, NULL),
('capivara12', 'pote1', 2, b'0', 0, 0, 0, 0, 0, 0, NULL),
('ZegarekD', 'zeg', 1, b'0', 0, 0, 0, 0, 0, 0, NULL),
('primo', 'primo', 1, b'0', 0, 0, 0, 0, 0, 0, NULL),
('a', 'a', 2, b'0', 0, 0, 1, 1, 0, 0, NULL),
('e', 'e', 1, b'1', 1, 1, 0, 0, 0, 0, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodo_id` (`period_id`),
  ADD KEY `ano_id` (`grade_id`);

--
-- Índices para tabela `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcao_id` (`function_id`);

--
-- Índices para tabela `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grades_attendance`
--
ALTER TABLE `grades_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sala_id` (`classroom_id`);

--
-- Índices para tabela `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`teacher_id`),
  ADD KEY `materia_id` (`subject_id`);

--
-- Índices para tabela `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `function`
--
ALTER TABLE `function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `grades_attendance`
--
ALTER TABLE `grades_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`period_id`) REFERENCES `period` (`id`),
  ADD CONSTRAINT `classroom_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`);

--
-- Limitadores para a tabela `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`);

--
-- Limitadores para a tabela `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`);

--
-- Limitadores para a tabela `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `subject_teacher_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
