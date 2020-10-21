-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2020 pada 13.12
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(7) NOT NULL,
  `level` varchar(10) NOT NULL,
  `allow` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `accounts`
--

INSERT INTO `accounts` (`id_account`, `username`, `password`, `status`, `level`, `allow`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Online', 'superadmin', ''),
(2, 'xindex', '67d550cca1a447f4108eb765a4728edb', 'Online', 'user', ''),
(3, 'jumaidin', '827ccb0eea8a706c4c34a16891f84e7b', 'Offline', 'admin', ''),
(4, 'rizal', '827ccb0eea8a706c4c34a16891f84e7b', 'Offline', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_email`
--

CREATE TABLE `company_email` (
  `id_email` int(11) NOT NULL,
  `set_email` varchar(50) NOT NULL,
  `set_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company_email`
--

INSERT INTO `company_email` (`id_email`, `set_email`, `set_password`) VALUES
(1, 'emFpbnVkaW4wNDIyQGdtYWlsLmNvbQ==', 'S2FuZGlsbzEy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(9) NOT NULL,
  `device_type` varchar(7) NOT NULL,
  `device_user` varchar(50) NOT NULL,
  `device_location` varchar(50) NOT NULL,
  `date_device` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `devices`
--

INSERT INTO `devices` (`device_id`, `device_name`, `device_type`, `device_user`, `device_location`, `date_device`, `status`) VALUES
(39, 'PC20.01', 'Laptop', 'Zainudin', 'Ruang Informatics Computer Tecnology', '20 Oktober 2020', 'On'),
(40, 'PC20.02', 'Laptop', 'Rexi', 'Ruang Marketing', '20 Oktober 2020', 'On');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hardwares`
--

CREATE TABLE `hardwares` (
  `hardware_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `hardware_name` varchar(100) NOT NULL,
  `hardware_brand` varchar(100) NOT NULL,
  `hardware_specification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hardwares`
--

INSERT INTO `hardwares` (`hardware_id`, `device_id`, `hardware_name`, `hardware_brand`, `hardware_specification`) VALUES
(1, 39, 'Prosessor', 'Intel', 'Intel Core i7'),
(2, 39, 'RAM', '-', '8 GB'),
(3, 39, 'SSD', '-', '502 GB'),
(4, 39, 'Sistem Operasi', 'Windows', 'Windows 10'),
(5, 40, 'sdfdgf', 'dfdsgdfg', 'fgfdgdfg'),
(6, 40, 'dfdsfsf', 'sdfdsfds', 'fsdfsf'),
(7, 40, 'sdfgdgjghkhk', 'gfhgfh', 'ghgfhgfhgfh'),
(8, 40, 'dfgfdgdg', 'dfgdfg', 'fdgdfgdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenances`
--

CREATE TABLE `maintenances` (
  `maintenance_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `action_activity` varchar(255) NOT NULL,
  `replacement_parts` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `date_maintenance` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `maintenances`
--

INSERT INTO `maintenances` (`maintenance_id`, `device_id`, `activity`, `action_activity`, `replacement_parts`, `cost`, `date_maintenance`, `image`) VALUES
(22, 39, 'Pemeliharaan Hardware Komputer LAB', 'jdhsfkhdsbjfgasvjdgvfksdfghkdfub,sjdfbsdkfhbdskfjhg dsfhhsdjfbksdjhf dhfgjshfgdjgasdyhgkfa hdkfshgfjsdyfgd', 'kdjcbjdhfbksjdflkdjhgb dhfksdfgdsyfg', 1224535, '21 Oktober 2020', 'Maintenance_1603215212.jpg'),
(23, 40, 'Pemeliharaan Software Aplikasi pada Komputer LAB', 'sadasdsadsad', 'sadsadasd', 1000000, '21 Oktober 2020', 'Maintenance_1603215725.jpg'),
(24, 40, 'Pemeliharaan Software Aplikasi pada Komputer LAB', 'dsfddfgfdghfgjghj', 'asdfgdfgertre', 120000, '21 Oktober 2020', 'Maintenance_1603215749.JPG'),
(25, 40, 'Pemeliharaan Hardware Komputer Karyawan', 'safsdfssdfdsf', 'dsgdhfghfgh', 34543645, '21 Oktober 2020', 'Maintenance_1603215952.jpg'),
(26, 40, 'Pemeliharaan Software Aplikasi pada Komputer Karyawan', 'sadsdasdsad', 'sadasdsadsad', 4354565, '21 Oktober 2020', 'Maintenance_1603215966.jpg'),
(27, 40, 'Pemeliharaan Hardware Komputer Karyawan', 'shdgjsfjasygkadsfgs', '435435345', 4535345, '21 Oktober 2020', 'Maintenance_1603216590.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id_profile` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id_profile`, `id_account`, `full_name`, `email`, `departement`, `position`, `image`) VALUES
(1, 1, 'Anonymouse', '', '', '', 'LP3I.jpg'),
(2, 2, 'Zainudin', 'zainudin0422@gmail.com', 'ICT', 'Staff', ''),
(3, 3, 'Ahmad Jumaidin', 'polaroidphotography22@gmail.com', 'ICT', 'Koordinator IT', ''),
(4, 4, 'Muhammad Rizal', 'z411crop@gmail.com', '', 'Head of Finance & HRD', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `salarys`
--

CREATE TABLE `salarys` (
  `id_salary` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan_jabatan` int(11) NOT NULL,
  `tunjangan_transport` int(11) NOT NULL,
  `tunjangan_fungsional` int(11) NOT NULL,
  `potongan_transport` int(11) NOT NULL,
  `total_gaji_kotor` int(11) NOT NULL,
  `biaya_jabatan` int(11) NOT NULL,
  `income_per_bulan` int(11) NOT NULL,
  `income_per_tahun` int(11) NOT NULL,
  `ptkp` int(11) NOT NULL,
  `pkp` int(11) NOT NULL,
  `pph_21_per_bulan` int(11) NOT NULL,
  `pph_21_per_tahun` int(11) NOT NULL,
  `income_setelah_pajak` int(11) NOT NULL,
  `bpjs_kesehatan` int(11) NOT NULL,
  `bpjs_ketenagakerjaan` int(11) NOT NULL,
  `take_home_pay` int(11) NOT NULL,
  `pembayaran_pinjaman` int(11) NOT NULL,
  `potongan_absen_tanpa_keterangan` int(11) NOT NULL,
  `potongan_absen_keterlambatan` int(11) NOT NULL,
  `potongan_sanksi` int(11) NOT NULL,
  `zis` int(11) NOT NULL,
  `total_potongan` int(11) NOT NULL,
  `net_salary` int(11) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `potongan_uang_makan` int(11) NOT NULL,
  `tunjangan_lembur` int(11) NOT NULL,
  `tunjangan_bensin` int(11) NOT NULL,
  `gaji_diterima` int(11) NOT NULL,
  `izin` int(3) NOT NULL,
  `sakit` int(3) NOT NULL,
  `perdin` int(3) NOT NULL,
  `cuti` int(3) NOT NULL,
  `alpa` int(3) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `salarys`
--

INSERT INTO `salarys` (`id_salary`, `id_profile`, `create_time`, `gaji_pokok`, `tunjangan_jabatan`, `tunjangan_transport`, `tunjangan_fungsional`, `potongan_transport`, `total_gaji_kotor`, `biaya_jabatan`, `income_per_bulan`, `income_per_tahun`, `ptkp`, `pkp`, `pph_21_per_bulan`, `pph_21_per_tahun`, `income_setelah_pajak`, `bpjs_kesehatan`, `bpjs_ketenagakerjaan`, `take_home_pay`, `pembayaran_pinjaman`, `potongan_absen_tanpa_keterangan`, `potongan_absen_keterlambatan`, `potongan_sanksi`, `zis`, `total_potongan`, `net_salary`, `uang_makan`, `potongan_uang_makan`, `tunjangan_lembur`, `tunjangan_bensin`, `gaji_diterima`, `izin`, `sakit`, `perdin`, `cuti`, `alpa`, `update_time`) VALUES
(6, 2, '27 Oktober 2020', 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 7, 7, 7, 7, 7, '2020-10-12 06:24:55'),
(7, 2, '12 September 2020', 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 10000000, 4, 3, 8, 2, 4, '2020-10-12 09:43:09'),
(8, 3, '12 Oktober 2020', 121323, 342424, 3243243, 34324, 43243243, 432343243, 34324, 345345, 5345543, 345435, 45435, 345435345, 2147483647, 345345435, 435435, 5435344, 4543534, 345435, 34534534, 54354354, 45345345, 5345345, 345435435, 34543543, 5345, 5435, 2147483647, 435345435, 45345345, 1, 2, 3, 4, 5, '2020-10-12 08:29:21'),
(9, 4, '26 November 2020', 2000000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 200000, 1, 3, 2, 4, 5, '2020-10-14 00:14:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`);

--
-- Indeks untuk tabel `company_email`
--
ALTER TABLE `company_email`
  ADD PRIMARY KEY (`id_email`);

--
-- Indeks untuk tabel `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indeks untuk tabel `hardwares`
--
ALTER TABLE `hardwares`
  ADD PRIMARY KEY (`hardware_id`);

--
-- Indeks untuk tabel `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `salarys`
--
ALTER TABLE `salarys`
  ADD PRIMARY KEY (`id_salary`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `company_email`
--
ALTER TABLE `company_email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `hardwares`
--
ALTER TABLE `hardwares`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `maintenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `salarys`
--
ALTER TABLE `salarys`
  MODIFY `id_salary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
