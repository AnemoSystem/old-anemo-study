-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jul-2022 às 00:34
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `school`
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
-- Estrutura da tabela `clothes`
--

CREATE TABLE `clothes` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clothes`
--

INSERT INTO `clothes` (`user_id`, `item_id`, `type`) VALUES
(5, 0, 'S'),
(5, 1, 'S'),
(5, 0, 'T'),
(5, 1, 'T'),
(5, 0, 'H'),
(5, 1, 'H'),
(5, 0, 'L'),
(5, 1, 'L'),
(5, 2, 'T'),
(5, 3, 'T'),
(5, 3, 'H');

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
(11, 'eae@gmail.com', '$2y$10$oWQSbf0Fn74d0aXQu.kRN.HYkTaFtJu5yVsVds7XQoB5mDxf1yra6', 'eae', '444.444.444-44', '44.444.444-4', 15, '(23) 11231-2312', '200.00');

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
  `id` int(11) NOT NULL,
  `school_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grades_attendance`
--

INSERT INTO `grades_attendance` (`subject_teacher_id`, `student_id`, `grade_value`, `id`, `school_month`) VALUES
(6, 2, '8.0', 8, 1),
(5, 2, '2.0', 9, 1),
(5, 2, '2.0', 10, 2),
(7, 5, '-1.0', 13, 1),
(8, 5, '-1.0', 14, 1),
(9, 5, '-1.0', 15, 1),
(10, 5, '-1.0', 16, 1),
(5, 5, '-1.0', 17, 1),
(6, 5, '-1.0', 18, 1);

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
(3, 'aas', '555.555.555-55', '66.666.666-6', 'aaa@aa', '2513', 4, '(56) 66666-6666'),
(5, 'João', '456.455.646-56', '54.464.564-6', 'j@gmail.com', '5831', 4, '(11) 46131-6516');

-- --------------------------------------------------------

--
-- Estrutura da tabela `student_absence`
--

CREATE TABLE `student_absence` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `state` char(1) NOT NULL,
  `subject_teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `student_absence`
--

INSERT INTO `student_absence` (`id`, `student_id`, `day`, `state`, `subject_teacher_id`) VALUES
(1, 2, '2022-07-07', 'A', 5),
(2, 2, '2022-07-04', 'A', 5),
(3, 2, '2022-07-01', 'P', 5),
(4, 5, '2022-07-13', 'P', 5),
(5, 5, '2022-07-15', 'P', 5),
(6, 5, '2022-07-17', 'A', 5);

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
(2, 'Matemática'),
(3, 'Português'),
(4, 'Biologia'),
(7, 'Geografia'),
(8, 'História'),
(11, 'Inglês');

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
(5, 7, 2),
(6, 8, 8),
(7, 9, 3),
(8, 10, 4),
(9, 12, 11),
(10, 11, 7);

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
(7, 'João da Silva', '555.555.555-55', '55.555.555-5', 'joaoprof@gmail.com', '$2y$10$7PyKNpWlmD5k2MjzuMPwpeS5OjdzLli5jIx5qh773GRYNA.kfi4FK', '(55) 55555-5555', '5000.00'),
(8, 'Pedro Santos', '898.989.898-98', '98.989.898-9', 'psantos@gmail.com', '$2y$10$HNVWZyW84E7ZbFgcUsicveG3YyvDbpyAjuzrI2/UQfpsMXx21OjAi', '(89) 89898-9898', '6000.00'),
(9, 'Mariana Carvalho', '884.844.564-56', '54.564.564-6', 'mcarva234@outlook.co', '$2y$10$2P/WrR2qgwUz2vaBGWHp..AHkIZO4/JXTBgoLaTmK7k9mGr567h5O', '(16) 51231-3165', '8000.00'),
(10, 'Ana Beatriz de Sousa', '885.631.168-51', '13.216.516-5', 'anabsouza@gmail.com', '$2y$10$1dqRmLEaEl9qdD392pezfuK/Ypycv8t.vFf35a4NBQGKwO7XzdzEm', '(23) 15413-0303', '5000.00'),
(11, 'Diego Augusto', '586.156.156-48', '46.541.784-1', 'diegusto@hotmail.com', '$2y$10$0kWjxsq9LKKJx13MagDsZO9vvopu9rVqq25BtxF3ciraTdvwHNmf6', '(15) 64154-6165', '3000.00'),
(12, 'Maria Eduarda Pereira', '548.416.484-16', '18.184.616-5', 'meduardape23@outlook', '$2y$10$EyzoiLWxFEUUdKrtJ4GPSufufukIweH6dXY8ER4h93jAWP1nBcM6u', '(16) 51616-5156', '8900.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teacher_classroom`
--

CREATE TABLE `teacher_classroom` (
  `subject_teacher_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `teacher_classroom`
--

INSERT INTO `teacher_classroom` (`subject_teacher_id`, `classroom_id`) VALUES
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(5, 4),
(6, 4);

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
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_nickname`, `user_password`, `student_id`, `is_logged`, `id_skin`, `id_torso`, `id_legs`, `id_hair`, `coins`, `points`) VALUES
('guisamuel', 'desenhando', 2, b'0', 0, 0, 0, 0, 100, 0),
('joao123', 'teste', 2, b'0', 0, 0, 0, 0, 100, 0),
('capivara12', 'pote1', 2, b'0', 0, 0, 0, 0, 100, 0),
('ZegarekD', 'zeg', 2, b'0', 0, 0, 0, 0, 100, 0),
('primo', 'primo', 2, b'0', 0, 0, 0, 0, 100, 0),
('a', 'a', 2, b'0', 0, 0, 0, 0, 100, 0),
('e', 'e', 2, b'0', 1, 0, 0, 0, 100, 0),
('jooj', 'jooj', 5, b'0', 0, 3, 1, 0, 100, 0);

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
-- Índices para tabela `clothes`
--
ALTER TABLE `clothes`
  ADD KEY `user_id` (`user_id`);

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
-- Índices para tabela `student_absence`
--
ALTER TABLE `student_absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_teacher_id` (`subject_teacher_id`);

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
-- Índices para tabela `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  ADD KEY `subject_teacher_id` (`subject_teacher_id`),
  ADD KEY `classroom_id` (`classroom_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `student_absence`
--
ALTER TABLE `student_absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Limitadores para a tabela `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`student_id`);

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
-- Limitadores para a tabela `student_absence`
--
ALTER TABLE `student_absence`
  ADD CONSTRAINT `student_absence_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_absence_ibfk_2` FOREIGN KEY (`subject_teacher_id`) REFERENCES `subject_teacher` (`id`);

--
-- Limitadores para a tabela `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`),
  ADD CONSTRAINT `subject_teacher_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`);

--
-- Limitadores para a tabela `teacher_classroom`
--
ALTER TABLE `teacher_classroom`
  ADD CONSTRAINT `teacher_classroom_ibfk_1` FOREIGN KEY (`subject_teacher_id`) REFERENCES `subject_teacher` (`id`),
  ADD CONSTRAINT `teacher_classroom_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`id`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
