-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 10:32 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `login_id` varchar(200) NOT NULL,
  `login_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `login_id`, `login_pass`) VALUES
(1, 'admin', '123', '$2y$10$uPgzQF45C1BEpuGgCwWVTONZE4b6gf9a95T3SPLVf5Zz563YuhswC');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_class`, `class_name`) VALUES
(1, 'Satu'),
(2, 'Dua'),
(3, 'Tiga'),
(4, 'Empat'),
(5, 'Lima'),
(6, 'Enam'),
(7, 'Tujuh'),
(8, 'Delapan');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(100) NOT NULL,
  `dosen_name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `dosen_name`, `password`, `email`, `matkul_id`, `status`) VALUES
(2, '011', 'Supratno.ST', '123', 'supratno@gmail.com', 2, 1),
(3, '012', 'Suhartono, ST', '$2y$10$fUOsX8T5TkEXAAI/SpakT.b0bvzdzMtZK3ajLGQdlVhl2u4XR5bT2', 'suhartono@gmail.com', 3, 1),
(6, '014', 'firman.MT', '$2y$10$gKvf4uKa/CrGg8bOddqJJeS5sAJDVWiKuV38BiIXLAzgd6kzAXZ86', 'firman@gmail.com', 6, 1),
(7, '015', 'Zaenal.ST', '$2y$10$oSepmcW.6TrTCaqMfnwh8.8hoDpV0wQ9kaISAZo703qLIEaskpCmC', 'zaenal@gmail.com', 7, 1),
(8, '016', 'Salman.ST', '$2y$10$GEopclYgf8IOgy6DrejQ4eAo9oNzVbFt5sdlWSgxl.HxklZ2jqF1W', 'salman@gmail.com', 8, 1),
(9, '017', 'Ir.Sarno', '$2y$10$KrvedNmMRGrPPIsYbMrDDO5C6kTyH6IUnk/utm2Hb78EYOhbmsLoi', 'sarno@gmail.com', 9, 1),
(10, '018', 'Erwin.ST', '$2y$10$YdF0t4D2YHRuaQOtxKwteOSqvHaBiZ2hT4hWWSYJwWdDUwdZ8UOLq', 'erwin@gmail.com', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE `essay` (
  `id_essay` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `soal_essay` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `id_hasil` int(11) NOT NULL,
  `msw_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `nilai` varchar(111) NOT NULL,
  `j_benar` varchar(100) NOT NULL,
  `j_salah` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`id_hasil`, `msw_id`, `class_id`, `ujian_id`, `nilai`, `j_benar`, `j_salah`, `date`) VALUES
(4, 19, 8, 10, '0', '0', '1', '2020-02-03 11:38:38'),
(5, 19, 8, 13, '100', '1', '0', '2020-02-07 06:33:32'),
(6, 1, 8, 13, '100', '1', '0', '2020-02-07 07:10:53'),
(7, 1, 8, 17, '100', '1', '0', '2020-02-07 15:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_msw` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `msw_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `prody_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_msw`, `nim`, `msw_name`, `email`, `password`, `prody_id`, `class_id`, `status`) VALUES
(1, '021', 'Made Welly', 'madewelly17@gmail.com', '$2y$10$lkOWAVcOgX8wXfQt36ASre7oS9WR8J/EMPy67V.RmoFukM0XFnwqm', 1, 8, 1),
(2, '022', 'Berto', 'berto@gmail.com', '$2y$10$UdUmnFUs3cSZTOu79O1EBu5Ibl3pRtOH9pjYKowhEiuKxu5pEwqWe', 2, 1, 1),
(3, '023', 'Febry', 'febry@gmail.com', '$2y$10$vVh4IB1aJKcSJELDCOkX0eycTfpO0JIEIoYG3Qj5EoVZvR8nPHH4G', 3, 6, 1),
(4, '1222', 'op', 'hh@gmail.com', '$2y$10$fMPSWo9YBji.jQs05kcXGOl.qwS0IFVYqxhZ/lBLBqS7v8ZB4P.mq', 3, 6, 0),
(5, '024', 'Layla', 'layla@gmail.com', '$2y$10$DwVFZN9aMzCfYAnkyEnryeIdbXzhvNh8nzn3Kr78MT65rLoZx0Ota', 3, 1, 1),
(6, '025', 'ling', 'ling@gmail.com', '$2y$10$ctyI8Cbee17cedDZIf451ufgUHZO9gyd9hmSE3MiP3Q5rxwWX0vby', 3, 2, 1),
(7, '026', 'Soneo', 'soneo@gmail.com', '$2y$10$hE3unVnqgyGT8mLwS.u9gefiL9GrKZNRTUWbXmby6lIVhYFMX61ve', 3, 3, 1),
(8, '027', 'yin', 'yin@gmail.com', '$2y$10$hR0mtyijS3.YiOU/EWiQ/Ob0yp3NOlTe2v1/L6dWtxGym/5Y.mTdS', 3, 4, 1),
(9, '028', 'Son', 'son@gmail.com', '$2y$10$QQLF7ngthAdMwvQg4VdF7Onb8/pUkRLM/V4vAfWT2AVzdGhOc3Omq', 3, 5, 1),
(10, '029', 'rin', 'rin@gmail.com', '$2y$10$dHzB.W97Abemg0gtfIs13OykHyXKp/mdEj.nrIe6V/QLXzEtxplKi', 3, 7, 1),
(11, '0021', 'hoon', 'hoon@gmail.com', '$2y$10$2tXRcsAaMN1Z4il9/XazQ.btx8zWWBtCxg/9jVQ7QT2FwYfrPZXoO', 3, 8, 1),
(12, '0022', 'pungky', 'pungky@gmail.com', '$2y$10$M00oBhq14YawTUJDuSHCY.09kQfemcK0Q0FpeJYL1ikFkjIzUDbHq', 1, 1, 1),
(13, '0023', 'yudit', 'yudit@gmail.com', '$2y$10$B77.KShyVtieH3AvoJk8seXzejLhm8ljcpOd.8RD56LOcyrPMImYq', 1, 2, 1),
(14, '0024', 'febry', 'febri1@gmail.com', '$2y$10$n8cGNnGsTPUYisv4nCyB0.O4A.6W9btnLwB9ykQwDbwPTmt1MMZn.', 1, 3, 1),
(15, '0025', 'abdul', 'abdul@gmail.com', '$2y$10$zC8TUQTTGeA3kb8MwyVr9eostu60Qs3AsZ8gxlBzkMnaWSpPvLuUW', 1, 4, 1),
(16, '0026', 'christian', 'ian@gmail.com', '$2y$10$4hPyiZPj3QFgC2K8uBBAduA3Xz3rl37UC8GlLuHp5vmFC7MHzkxle', 1, 5, 1),
(17, '0027', 'rifky', 'rifky@gmail.com', '$2y$10$UWEGDcpVhQoxinkrs5HZzeBLIhKLGivUiEcftGvbt5tQjTRJpw/O.', 1, 6, 1),
(18, '0028', 'maulifah', 'maulifah@gmail.com', '$2y$10$uoIp45fvhueIK.QoHrXCQOAjsT.3zdDOZwSYaUrk1B/eTR2hMWpsi', 1, 7, 1),
(19, '111', 'hh', 'hh@gmail.com', '$2y$10$1yiO1Rsarb08qgcsm2dd9.xl5dhhzXbulHBwFBk6jrkzJEMG3NQwe', 1, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `matkul_name` varchar(100) NOT NULL,
  `prody_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `matkul_name`, `prody_id`, `class_id`) VALUES
(2, 'CodeIgniter', 1, 8),
(3, 'Web Program', 1, 8),
(6, 'Database', 1, 8),
(7, 'Model dan Simulasi', 1, 8),
(8, 'Bahasa Tinggkat Tinggi', 1, 8),
(9, 'Pengantar Multimedia', 1, 8),
(10, 'Informasi Telekomunikasi', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `m_ujian`
--

CREATE TABLE `m_ujian` (
  `id_ujian` int(11) NOT NULL,
  `ujian_name` varchar(100) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `prody_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `jumlah_soal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ujian`
--

INSERT INTO `m_ujian` (`id_ujian`, `ujian_name`, `dosen_id`, `matkul_id`, `prody_id`, `class_id`, `jumlah_soal`, `waktu`, `date_start`, `date_exp`) VALUES
(10, 'UAS', 2, 2, 1, 8, '2', '90', '2020-02-03', '2020-02-04'),
(12, 'UTS', 10, 10, 1, 8, '50', '120', '2020-02-03', '2020-02-05'),
(13, 'UTS', 8, 8, 1, 8, '30', '60', '2020-02-07', '2020-02-09'),
(17, 'UAS', 7, 7, 1, 8, '10', '12', '2020-02-07', '2020-02-09'),
(18, 'UAS', 9, 9, 1, 8, '12', '12', '2020-02-07', '2020-02-08'),
(19, 'UAS', 3, 3, 1, 8, '15', '12', '2020-02-07', '2020-02-10'),
(21, 'UAS', 6, 6, 1, 8, '11', '17', '2020-02-07', '2020-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `prody`
--

CREATE TABLE `prody` (
  `id_prody` int(11) NOT NULL,
  `prody_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prody`
--

INSERT INTO `prody` (`id_prody`, `prody_name`) VALUES
(1, 'Teknik Informatika'),
(2, 'Elektro'),
(3, 'Teknik Industri');

-- --------------------------------------------------------

--
-- Table structure for table `soal_m`
--

CREATE TABLE `soal_m` (
  `id_soal` int(11) NOT NULL,
  `ujian_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `soal` varchar(500) NOT NULL,
  `opsi_a` varchar(250) NOT NULL,
  `opsi_b` varchar(250) NOT NULL,
  `opsi_c` varchar(250) NOT NULL,
  `opsi_d` varchar(250) NOT NULL,
  `opsi_e` varchar(250) NOT NULL,
  `jawaban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_m`
--

INSERT INTO `soal_m` (`id_soal`, `ujian_id`, `dosen_id`, `matkul_id`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`) VALUES
(21, 9, 2, 2, '<p>qsqsd</p>', '<p>dq</p>', '<p>dwddq</p>', '<p>qwdqdwq</p>', '<p>wdqdw</p>', '<p>wqdwdq</p>', 'B'),
(22, 10, 2, 2, '<p>wdwwdw</p>', '<p>wdqdw</p>', '<p>dqdq</p>', '<p>dqdw</p>', '<p>dqwd</p>', '<p>dwqqd</p>', 'D'),
(24, 12, 10, 10, '<p>scsac</p>', '<p>asa</p>', '<p>ascac</p>', '<p>asac</p>', '<p>csac</p>', '<p>asca</p>', 'B'),
(25, 13, 8, 8, '<p>dwqgdwhq</p>', '<p>ghg</p>', '<p>kg</p>', '<p>ggg</p>', '<p>sdsd</p>', '<p>bjb</p>', 'B'),
(26, 16, 9, 9, '<p>wadw</p>', '<p>qdq</p>', '<p>qwdwq</p>', '<p>rr3r</p>', '<p>32r</p>', '<p>r32r32</p>', 'C'),
(27, 17, 7, 7, '<p>dwqd</p>', '<p>dwqdw</p>', '<p>32r32</p>', '<p>4t</p>', '<p>343</p>', '<p>433</p>', 'A'),
(28, 18, 9, 9, '<p>wqw</p>', '<p>wqw</p>', '<p>3r2r</p>', '<p>r32r</p>', '<p>qd</p>', '<p>r3r</p>', 'A'),
(29, 19, 3, 3, '<p>1e21</p>', '<p>ee</p>', '<p>wqddq</p>', '<p>wqdwd</p>', '<p>wqwd</p>', '<p>wdqwd</p>', 'A'),
(30, 20, 6, 6, '<p><strong>wdwdqwdqdw</strong></p>', '<p>dwqd</p>', '<p>wdqdw</p>', '<p>efe</p>', '<p>wefwf</p>', '<p>fewf</p>', 'A'),
(31, 21, 6, 6, '<p>ddwqwd</p>', '<p>wqd</p>', '<p>wqd</p>', '<p>wqwd</p>', '<p>wdqd</p>', '<p>ff</p>', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `essay`
--
ALTER TABLE `essay`
  ADD PRIMARY KEY (`id_essay`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_msw`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `m_ujian`
--
ALTER TABLE `m_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indexes for table `prody`
--
ALTER TABLE `prody`
  ADD PRIMARY KEY (`id_prody`);

--
-- Indexes for table `soal_m`
--
ALTER TABLE `soal_m`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `essay`
--
ALTER TABLE `essay`
  MODIFY `id_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_msw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_ujian`
--
ALTER TABLE `m_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prody`
--
ALTER TABLE `prody`
  MODIFY `id_prody` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soal_m`
--
ALTER TABLE `soal_m`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
