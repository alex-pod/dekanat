-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 05, 2017 at 07:16 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `highwood`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`) VALUES
(1, 'Робототехника'),
(2, 'Нано-хирургия'),
(3, 'Инженерия');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`) VALUES
(1, 'prepod1'),
(2, 'prepod2'),
(3, 'prepod3'),
(4, 'prepod4');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `faculty_id`, `lecturer_id`) VALUES
(1, 'Пн', 1, 1),
(2, 'Пн', 2, 2),
(3, 'Пн', 3, 3),
(4, 'Вт', 1, 4),
(5, 'Вт', 2, 3),
(6, 'Вт', 3, 1),
(7, 'Ср', 1, 3),
(8, 'Ср', 2, 4),
(9, 'Ср', 3, 2),
(10, 'Чт', 1, 2),
(11, 'Чт', 2, 1),
(12, 'Чт', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `firstname`, `lastname`, `faculty_id`, `sex`) VALUES
(1, 'asd@asd.asd', 'Василий', 'Пупкин', 1, 'male'),
(2, 'sdfsd@sdf.sdf', 'Елена', 'Пупкина', 2, 'female'),
(4, 'sdfsdf@sdf.sf', 'Новый', 'Юзер', 3, 'female'),
(5, 'apup@kin.n', 'Александр', 'Пупкин', 2, 'male'),
(6, 'sdf@sdfsdf.sdf', 'Пользователь', 'Поль', 1, 'female'),
(7, 'sfs@sdfs.sdf', 'ыавфыва', 'ыфваы', 2, 'female'),
(8, 'j@do.e', 'John', 'Doe', 2, 'female'),
(9, 'wer@sdf.f', 'rwer', 'ewrew', 2, 'male'),
(10, 'gs@df.sdf', 'erger', 'erge', 1, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
