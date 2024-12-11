-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2024 pada 06.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_vikor_native`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_user`) VALUES
(4, 0),
(71, 21),
(72, 22),
(73, 23),
(74, 24),
(75, 25),
(76, 26),
(77, 27),
(78, 28),
(79, 29),
(80, 30),
(81, 31),
(82, 32),
(83, 33),
(84, 34),
(85, 35),
(86, 36),
(87, 37),
(88, 38),
(89, 39),
(90, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 71, 0),
(2, 72, 0),
(3, 73, 0.959),
(4, 74, 1),
(5, 75, 0.22),
(6, 76, 0.139),
(7, 77, 0.428),
(8, 78, 0.067),
(9, 79, 0.585),
(10, 80, 0.73),
(11, 81, 0.403),
(12, 82, 0.5),
(13, 83, 0.698),
(14, 84, 0.284),
(15, 85, 0.072),
(16, 86, 0.147),
(17, 87, 0.572),
(18, 88, 0.564),
(19, 89, 0.661),
(20, 90, 0.698);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` float DEFAULT NULL,
  `ada_pilihan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama`, `bobot`, `ada_pilihan`) VALUES
(1, 'C1', 'Profesional', 0.143, 1),
(2, 'C2', 'Pelayanan Masyarakat', 0.286, 2),
(5, 'C3', 'Kedisiplinan', 0.357, 0),
(9, 'C4', 'Kecekatan', 0.214, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(376, 71, 1, 0.75),
(377, 71, 2, 1),
(378, 71, 5, 0.75),
(379, 71, 9, 1),
(380, 72, 1, 0.75),
(381, 72, 2, 1),
(382, 72, 5, 0.75),
(383, 72, 9, 1),
(400, 77, 1, 0.75),
(401, 77, 2, 0.75),
(402, 77, 5, 0.5),
(403, 77, 9, 1),
(404, 78, 1, 0.75),
(405, 78, 2, 0.75),
(406, 78, 5, 1),
(407, 78, 9, 1),
(436, 86, 1, 0.75),
(437, 86, 2, 0.75),
(438, 86, 5, 0.75),
(439, 86, 9, 1),
(448, 89, 1, 0.75),
(449, 89, 2, 1),
(450, 89, 5, 0.25),
(451, 89, 9, 1),
(456, 73, 1, 0.5),
(457, 73, 2, 0.5),
(458, 73, 5, 0.25),
(459, 73, 9, 0.75),
(460, 74, 1, 0.75),
(461, 74, 2, 0.5),
(462, 74, 5, 0.25),
(463, 74, 9, 0.5),
(464, 75, 1, 0.75),
(465, 75, 2, 0.75),
(466, 75, 5, 0.75),
(467, 75, 9, 0.75),
(468, 76, 1, 0.75),
(469, 76, 2, 0.75),
(470, 76, 5, 1),
(471, 76, 9, 0.75),
(472, 79, 1, 1),
(473, 79, 2, 0.5),
(474, 79, 5, 0.75),
(475, 79, 9, 0.75),
(476, 80, 1, 0.5),
(477, 80, 2, 0.5),
(478, 80, 5, 0.5),
(479, 80, 9, 0.75),
(480, 81, 1, 0.75),
(481, 81, 2, 1),
(482, 81, 5, 0.5),
(483, 81, 9, 0.75),
(484, 82, 1, 0.75),
(485, 82, 2, 0.75),
(486, 82, 5, 0.5),
(487, 82, 9, 0.75),
(488, 83, 1, 0.75),
(489, 83, 2, 0.5),
(490, 83, 5, 0.5),
(491, 83, 9, 0.75),
(492, 84, 1, 0.25),
(493, 84, 2, 0.75),
(494, 84, 5, 0.75),
(495, 84, 9, 0.75),
(496, 85, 1, 0.75),
(497, 85, 2, 1),
(498, 85, 5, 0.75),
(499, 85, 9, 0.75),
(500, 87, 1, 0.75),
(501, 87, 2, 0.75),
(502, 87, 5, 0.5),
(503, 87, 9, 0.5),
(504, 88, 1, 0.25),
(505, 88, 2, 0.75),
(506, 88, 5, 0.5),
(507, 88, 9, 0.75),
(508, 90, 1, 0.75),
(509, 90, 2, 0.5),
(510, 90, 5, 0.5),
(511, 90, 9, 0.75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jk` varchar(30) DEFAULT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nis`, `nama`, `email`, `jk`, `role`) VALUES
(1, 'admin', '123', NULL, 'Admin', 'admin@gmail.com', NULL, '1'),
(21, 'fanny', '1234', '1234', 'Dea Fanny Novirizal, S.M', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(22, 'dewa', '1234', '1234', 'Dewanta Malikil Qudus, S.M', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(23, 'dita', '1234', '1234', 'Dita Harifiana, A.Md', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(24, 'rizal', '1234', '1234', 'Adrizal,S.Kom', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(25, 'evni', '1234', '1234', 'Evni Jusfita, S.Kom', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(26, 'nurul', '1234', '1234', 'Nurul Hamdi, S.Kom', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(27, 'robby', '1234', '1234', 'Robby Oktahidayat, S.Kom', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(28, 'amel', '1234', '1234', 'Amalia Tiffany, S.Kom', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(29, 'irvan', '1234', '1234', 'Irvan Okta Mazhona, S.Pd,M.Kom', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(30, 'hanafis', '1234', '1234', 'Hanafis Gunawan, A.Md.Kom', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(31, 'kholis', '1234', '1234', 'Qolbul Kholis, S.Kom', 'victoilyando765@gmail.com', 'laki laki', '2'),
(32, 'mentari', '1234', '1234', 'Mentari Tryana Wahyuni, S.I.Kom', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(33, 'etri', '1234', '1234', 'Etri Saputra, S.Hum', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(34, 'fajri', '1234', '1234', 'Azhari Fajri', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(35, 'dona', '1234', '1234', 'Dona Andora, S.Pd', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(36, 'ihsan', '1234', '1234', 'Muhammad Ihsan, S.I.Kom', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(37, 'ranty', '1234', '1234', 'Ranty Aprilia, S.Sos', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(38, 'doni', '1234', '1234', 'Friramadoni', 'victoirlyando765@gmail.com', 'laki laki', '2'),
(39, 'riza', '1234', '1234', 'Riza Kurnia Rizki, S.Si', 'victoirlyando765@gmail.com', 'perempuan', '2'),
(40, 'setia', '1234', '1234', 'Setia Pratama, S.Pd', 'victoirlyando765@gmail.com', 'perempuan', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
