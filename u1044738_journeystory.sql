-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 08:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1044738_journeystory1`
--

-- --------------------------------------------------------

--
-- Table structure for table `alasan_verifikasi`
--

CREATE TABLE `alasan_verifikasi` (
  `id` int(11) NOT NULL,
  `capture_id` int(11) NOT NULL,
  `jenis_verifikasi` int(1) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alasan_verifikasi`
--

INSERT INTO `alasan_verifikasi` (`id`, `capture_id`, `jenis_verifikasi`, `alasan`) VALUES
(1, 84, 1, 'ramaiiiiii'),
(2, 99, 1, 'hahahahhaha'),
(3, 70, 1, 'sadsdafddsfdd'),
(4, 87, 2, 'tyjtjjyuktykityt');

-- --------------------------------------------------------

--
-- Table structure for table `capture_data`
--

CREATE TABLE `capture_data` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi_lat` varchar(20) DEFAULT NULL,
  `lokasi_long` varchar(20) DEFAULT NULL,
  `jenis_lokasi` varchar(50) DEFAULT NULL,
  `nama_jalan` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kec` int(5) DEFAULT NULL,
  `kel` int(5) DEFAULT NULL,
  `jenis_data` varchar(50) NOT NULL,
  `klasifikasi_data` varchar(50) NOT NULL,
  `klu` varchar(50) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `nama_data` varchar(50) NOT NULL,
  `uraian_data` varchar(50) NOT NULL,
  `tahun_perolehan` varchar(50) NOT NULL,
  `sumber` varchar(50) DEFAULT NULL,
  `jam_pengamatan` varchar(50) DEFAULT NULL,
  `status_npwp` varchar(15) DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  `jenis_identitas` enum('KTP','KTAS/KITAP','Akta Pendirian','Dokumen Resmi Pendirian atau Perizinan Usaha') DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `omzet` varchar(100) DEFAULT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `tgl_terdaftar_npwp` date DEFAULT NULL,
  `status_wp` varchar(50) DEFAULT NULL,
  `sp2dk_nomor` varchar(50) DEFAULT NULL,
  `user_id` int(15) DEFAULT NULL,
  `UUID` varchar(255) DEFAULT NULL,
  `verifikasi` int(1) DEFAULT NULL,
  `verifikasi_formal` int(1) NOT NULL,
  `tindak_lanjut` int(1) DEFAULT NULL,
  `no_st` varchar(30) NOT NULL,
  `dalam_rangka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capture_data`
--

INSERT INTO `capture_data` (`id`, `tanggal`, `lokasi_lat`, `lokasi_long`, `jenis_lokasi`, `nama_jalan`, `rt`, `rw`, `kec`, `kel`, `jenis_data`, `klasifikasi_data`, `klu`, `kegiatan`, `merk`, `nama_data`, `uraian_data`, `tahun_perolehan`, `sumber`, `jam_pengamatan`, `status_npwp`, `kewarganegaraan`, `jenis_identitas`, `no_identitas`, `omzet`, `npwp`, `nama_usaha`, `no_telp`, `email`, `tgl_terdaftar_npwp`, `status_wp`, `sp2dk_nomor`, `user_id`, `UUID`, `verifikasi`, `verifikasi_formal`, `tindak_lanjut`, `no_st`, `dalam_rangka`) VALUES
(45, '2020-10-21', '-6.386815', '106.8514167', NULL, 'Jl. Pemuda', '01', '08', 1, 5, '', '', 'Dagang', 'Restaurant', 'Ayam Geprek ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '10 - 25 Juta', '1922837192837', 'Budi', NULL, NULL, '2019-06-15', 'Wajib Pajak Badan', '728391726', 398, 'f7f5f30a-13eb-4715-aa60-7ca1c3d27074', 0, 0, 0, '', ''),
(47, '2020-10-21', '0.0', '0.0', NULL, 'jalan pemuda', '8', '3', 2, 10, '', '', 'Dagang', 'resto', 'mie ayam', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', 'yudi', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 289, '26df5b3e-9857-4b00-90d3-be0eb724397a', 0, 0, 1, '', ''),
(52, '2021-01-17', '-6.3825493', '106.886097', NULL, 'jl putri tunggal no 39', '02', '01', 1, 3, '', '', 'Jasa', 'cuci mobil arema', 'tunas harapan', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '0', '0', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '', 293, '573673ff-e508-4e3b-87a5-1c8bcb8728a1', 0, 0, 0, '', ''),
(59, '2021-04-16', '-6.4029113', '106.822037', NULL, 'Jalan baru', '1', '1', 1, 4, '', '', 'Jasa', 'Warung', 'Angkringan Oye', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '6 - 10 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '123', 400, '7960b890-bce6-47a0-afa4-6c08664d6bf8', 0, 0, 1, '', ''),
(62, '2021-04-17', '-6.37034933749876', '106.86506372986454', NULL, 'Jl. Tiga Berlian Raya', '', '', 1, 4, '', '', 'Dagang', 'Dagang sembako', 'Toko Makmur Jaya', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '10 - 25 Juta', '12.345.678.9-412.000', '', NULL, NULL, '2010-01-01', 'Wajib Pajak Perorangan', 'SP2DK-1', 400, '41b9e732-d238-40e3-aae9-6f7aa4ad0d80', 0, 0, 1, '', ''),
(66, '2021-04-19', '-6.3850295', '106.8841274', NULL, 'jl gas alam no 5', '', '', 2, 12, '', '', 'Dagang', 'rumah makan ', 'ayam penyet Bakule Solo', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '', 403, '3c7335c9-e83d-4220-acf2-812442c2f510', 0, 0, 0, '', ''),
(67, '2021-04-19', '-6.3850295', '106.8841274', NULL, 'jl gas alam no 5', '', '', 2, 12, '', '', 'Dagang', 'rumah makan ', 'ayam penyet Bakule Solo', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '', 403, '62d3fd15-0c3f-4f08-82f1-756e4bf11ab2', 0, 0, 0, '', ''),
(68, '2021-04-20', '-6.4304302', '106.8264148', NULL, 'jl raya utama boulevard grand depok city cluster alamanda II Blok E1 No. 7', '', '', 3, 17, '', '', 'Dagang', ' petshop & clinic', 'jangki petshop & clinic', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '21.345.678-9.412.000', '', NULL, NULL, '2021-01-01', 'Wajib Pajak Badan', '90', 368, '0632d284-9763-43c3-8f7a-ffa0d0fe09aa', 0, 0, 1, '', ''),
(69, '2021-04-20', '-6.4300082', '106.8265311', NULL, 'Jl. Raya Utama Boulevard GDC Cluster Alamanda II Blok E1 No.7', '', '', 3, 15, '', '', 'Dagang', 'Perdagangan Petshop', 'Jangki Petshop & Clinic', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '', 407, '6116f118-9ccf-4a9f-b90a-926566777070', 0, 0, 1, '', ''),
(70, '2021-04-21', '-6.369647279492158', '106.86091612306708', NULL, 'Raya Bogor', '', '', 1, 4, '', '', 'Jasa', 'Bengkel dan Cuci Mobil', 'Bengkel BOS (Ban Oli Servis)', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '03.047.076.9-412.001', 'PT. Penta Artha Impressi', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '78', 400, '9f20e395-699f-4bcf-8ae8-fd701c397b33', 2, 0, 1, '', ''),
(71, '2021-04-21', '-6.370519815235337', '106.88318884017632', NULL, 'Radar Auri', '02', '05', 1, 4, '', '', 'Industri', 'Pabrik Genteng Beton', 'Genteng Benzema', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '10 - 25 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 400, '6f81f686-0ba7-4674-a1b3-f3c8ae28434b', 0, 0, 1, '', ''),
(72, '2021-04-21', '-6.359011107407412', '106.85909161698176', NULL, 'Raya Bogor KM.29', '', '', 1, 6, '', '', 'Dagang', 'Dagang sembako, rokok dll', 'Toko Anugrah', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '156565656', 400, 'd55160d9-9fc0-4019-87b3-bafe8fab9304', 0, 0, 1, '', ''),
(73, '2021-04-23', '-6.3832051', '106.8857048', NULL, 'jl putri tinggal no 71', '', '', 1, 3, '', '', 'Dagang', 'jual makanan bakso', 'Bakso Harjamukti', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '6 - 10 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '', 403, '6ddf4972-ff51-401d-8efc-46ec9c13cedb', 0, 0, 0, '', ''),
(74, '2021-05-04', '-6.4022039', '106.8360903', NULL, 'JL Kemakmuran', '4', '1', 4, 22, '', '', 'Jasa', 'Persewaan Gedung Usaha', 'Graha Cana', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 405, 'a20d74ad-e101-4e2f-9d30-8eb6f540efa9', 0, 0, 0, '', ''),
(76, '2021-05-04', '-6.3853656', '106.8393987', NULL, 'JL K.H.M Yusuf I No.20A ', '02', '22', 4, 22, '', '', 'Jasa', 'Jasa Pendidikan ( Kursus)', 'Indonesia College ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '-', '-', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 405, '50859ffb-f837-47e9-9527-85a27f5c558c', 0, 0, 0, '', ''),
(77, '2021-05-04', '-6.3853656', '106.8393987', NULL, 'JL K.H.M Yusuf I No.20A ', '02', '22', 4, 22, '', '', 'Jasa', 'Jasa Pendidikan ( Kursus)', 'Indonesia College ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '-', '-', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 405, '50859ffb-f837-47e9-9527-85a27f5c558c', 0, 0, 0, '', ''),
(78, '2021-05-04', '-6.4034876', '106.8220748', NULL, '', '', '', 5, 28, '', '', 'Jasa', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 359, '36d6b170-19ba-45fd-b228-88051110d910', 0, 0, 0, '', ''),
(79, '2021-05-04', '-6.4034876', '106.8220748', NULL, '', '', '', 5, 28, '', '', 'Jasa', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 359, '36d6b170-19ba-45fd-b228-88051110d910', 0, 0, 0, '', ''),
(80, '2021-05-04', '-6.4034876', '106.8220748', NULL, '', '', '', 5, 28, '', '', 'Jasa', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 359, '36d6b170-19ba-45fd-b228-88051110d910', 0, 0, 0, '', ''),
(81, '2021-05-04', '-6.403056', '106.8220707', NULL, 'jalan pemuda', '00', '00', 5, 25, '', '', 'Jasa', 'Jasa Persewaan mobil', 'CV Abc', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 405, '07455aca-c0dd-4764-a2ff-8d963dda3c74', 0, 0, 0, '', ''),
(82, '2021-05-05', '-6.3811654', '106.9024023', NULL, 'Raffles Hills Blok B1 No. 11', '04', '15', 1, 3, '', '', 'Jasa', 'Pegawai Swasta', 'Julius Peter Panahatan', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '00000000000000000000', 'Julius Peter Panahatan', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '964', 378, '5cd383fe-3889-4caf-96f3-ce9c73735596', 0, 0, 0, '', ''),
(84, '2021-05-05', '-6.3659081', '106.9053527', NULL, 'Jalan Jambore', '02', '06', 1, 3, '', '', 'Dagang', 'Rumah Makan ', 'Sate Haji Sanusi', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '6 - 10 Juta', '082653114809000', 'Iwan Sanusi Libere', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '963', 402, 'ac1cbf18-fbd9-4a9c-9d11-897951f54262', 0, 0, 0, '', ''),
(85, '2021-05-05', '-6.3587267', '106.8501433', NULL, 'Jl. Alamanda gg Mawar I', '07', '07', 1, 6, '', '', 'Jasa', 'Pegawai', 'Pegawai Yasilindo', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '249137613412000', '-', NULL, NULL, '0000-00-00', 'Wajib Pajak Perorangan', '-', 402, '8c0fd3cd-3b41-48fd-ab2b-8c41c49a05ad', 0, 0, 0, '', ''),
(86, '2021-05-07', '-6.3764792', '106.899549', NULL, 'Jalan Pringgondani 3 No.27', '005', '009', 1, 3, '', '', 'Jasa', 'SPBU', 'PT Baruna Anugerah Lestari', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '> 50 Juta', '59.956.630.4-412.000', NULL, NULL, NULL, '2008-12-19', 'Wajib Pajak Badan', '2645', 402, '31887f7b-8f67-44bb-a2d0-42920d369d52', 1, 1, 0, '', ''),
(87, '2021-05-15', '-6.4449749', '106.8763654', NULL, 'Jl. Kiray No.3, Jl. Cimpaeun No.15, RT.02/RW.RW, Cimanggis, Kec. Tapos, Kota Depok, Jawa Barat 16959', '02', '03', 2, 8, '', '', 'Dagang', 'resto', 'The2n', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '58.247.075.3-412.000', NULL, NULL, NULL, '2008-12-03', 'Wajib Pajak Perorangan', '', 293, '7f99f737-726b-4b04-8dcf-30c21385127f', 1, 2, 0, '', ''),
(88, '2021-05-19', '-6.4027408', '106.8821696', NULL, 'Perumahan Permata Arcadia Ruko De Bale Blok R No. 7', '001', '002', 2, 12, '', '', 'Dagang', 'Restaurant', 'Mie Ayam Bangka Alie', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '59.957.038.9-412.000', 'Jono', NULL, NULL, '2008-12-19', 'Wajib Pajak Perorangan', '', 373, '91eb5f38-a995-4c83-8a89-d75632ce6143', 1, 1, 1, '', ''),
(99, '2021-08-14', '37.4219983', '-122.084', NULL, '', '', '', 1, 1, '', '', 'Jasa', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '1 - 5 Juta', '', '', NULL, NULL, '0000-00-00', 'Wajib Pajak Badan', '', 1, '8646df5a-f8b5-4c1c-9598-6f969440019b', 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_perorangan`
--

CREATE TABLE `data_perorangan` (
  `id` int(11) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `badan` varchar(100) DEFAULT NULL,
  `status_pkp` varchar(100) DEFAULT NULL,
  `status_wp` varchar(100) DEFAULT NULL,
  `pelaporan_spt` varchar(200) DEFAULT NULL,
  `tunggakan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_perorangan`
--

INSERT INTO `data_perorangan` (`id`, `npwp`, `nama`, `badan`, `status_pkp`, `status_wp`, `pelaporan_spt`, `tunggakan`) VALUES
(1, '12345677654312', 'Jenab', 'Badan', 'PKP', 'WP', '2017,2018,2019', 'Nihil');

-- --------------------------------------------------------

--
-- Table structure for table `data_wp`
--

CREATE TABLE `data_wp` (
  `id` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `kd_kpp` varchar(5) DEFAULT NULL,
  `kd_cabang` varchar(5) DEFAULT NULL,
  `npwpf` varchar(50) DEFAULT NULL,
  `npwpl` varchar(50) DEFAULT NULL,
  `nama_wp` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `kode_pos` varchar(5) DEFAULT NULL,
  `nomor_telepon` varchar(25) DEFAULT NULL,
  `nomor_fax` varchar(25) DEFAULT NULL,
  `nomor_identitas` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status_wp` int(11) NOT NULL,
  `jenis_wp` int(11) NOT NULL,
  `kode_klu` int(6) DEFAULT NULL,
  `nama_klu` varchar(50) DEFAULT NULL,
  `tanggal_pkp` date NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `bentuk_hukum` varchar(100) NOT NULL,
  `mata_uang` varchar(50) DEFAULT NULL,
  `no_skt` varchar(100) NOT NULL,
  `no_pkp` varchar(100) NOT NULL,
  `no_pkp_cabut` varchar(100) NOT NULL,
  `tanggal_pkp_cabut` date NOT NULL,
  `metode_perhitungan` varchar(100) NOT NULL,
  `nama_pj` varchar(50) NOT NULL,
  `nama_js` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_wp`
--

INSERT INTO `data_wp` (`id`, `tanggal_daftar`, `tanggal_pindah`, `tanggal_lahir`, `npwp`, `kd_kpp`, `kd_cabang`, `npwpf`, `npwpl`, `nama_wp`, `alamat`, `rw`, `kota`, `kode_pos`, `nomor_telepon`, `nomor_fax`, `nomor_identitas`, `email`, `status_wp`, `jenis_wp`, `kode_klu`, `nama_klu`, `tanggal_pkp`, `kelurahan`, `kecamatan`, `provinsi`, `bentuk_hukum`, `mata_uang`, `no_skt`, `no_pkp`, `no_pkp_cabut`, `tanggal_pkp_cabut`, `metode_perhitungan`, `nama_pj`, `nama_js`) VALUES
(202, '2008-12-19', '0000-00-00', '1985-01-06', '599566304', '412', '000', '599566304412000', '59.956.630.4-412.000', 'ATIK MILATINA', '\' \' KP AREMAN BLOK KP RT.001 RW.008, TUGU', '8', 'KOTA DEPOK', '16451', '', '', '3216064601850029', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(203, '2008-12-19', '0000-00-00', '1986-02-08', '599571015', '412', '000', '599571015412000', '59.957.101.5-412.000', 'YAN ROSSY', '\' \' KP KELAPADUA BLOK KP RT.07 RW.11, TUGU', '11', 'KOTA DEPOK', '16451', '6283872795559', '', '3276020802860004', 'yank2w@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'RACHMAD ANDRIYAN NUGROHO', 'ARISTA AULIA MARRUS'),
(204, '2008-12-19', '0000-00-00', '1987-06-26', '599570280', '412', '000', '599570280412000', '59.957.028.0-412.000', 'PACHRURI', '\' \' KP PALSIGUNUNG BLOK KP RT.04 RW.02, TUGU', '2', 'KOTA DEPOK', '16451', '6283878203700', '', '3276022606870014', 'Ibrahimadnan298@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(205, '2008-12-19', '0000-00-00', '1982-03-29', '599570843', '412', '000', '599570843412000', '59.957.084.3-412.000', 'MUHAMAD SAID', '\' \' KP PALSIGUNUNG BLOK KP RT.09 RW.03, TUGU', '3', 'KOTA DEPOK', '16451', '6285719800348', '', '32770110094743376848', 'arinaazkakia@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(206, '2008-12-19', '0000-00-00', '1983-10-13', '599570330', '412', '000', '599570330412000', '59.957.033.0-412.000', 'BUDI KURNIAWAN', '\' \' KP PALSIGUNUNG BLOK KP, DEPOK', '9', 'KOTA DEPOK', '16451', '085780048542', '', '3276021310830009', 'Budik8126@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(207, '2008-12-19', '0000-00-00', '1979-01-19', '599571254', '412', '000', '599571254412000', '59.957.125.4-412.000', 'EVI SUSANA', '\' \' KP PALSIGUNUNG BLOK KP, DEPOK', '9', 'KOTA DEPOK', '16451', '', '', '3276025901790006', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(208, '2008-12-19', '0000-00-00', '1987-09-23', '599572732', '412', '000', '599572732412000', '59.957.273.2-412.000', 'YANDI PRIYATNA', '\' \' KP. AREMAN BLOK KP, DEPOK', '9', 'KOTA DEPOK', '16451', '081298460901', '', '3276022309870002', 'riskywildan21@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(209, '2008-12-19', '0000-00-00', '1984-03-05', '599572641', '412', '000', '599572641412000', '59.957.264.1-412.000', 'A. FAUZI', '\' \' KP. PALSI GUNUNG BLOK KP, DEPOK', '9', 'KOTA DEPOK', '16451', '085715205834', '', '3276020503840007', 'faqyhmohammad@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(210, '2009-05-13', '0000-00-00', '1973-12-31', '783557077', '412', '000', '783557077412000', '78.355.707.7-412.000', 'WAKHIDATUL MUSYAROFAH', '\' \' KP. PALSIGUNUNG, DEPOK', '9', 'KOTA DEPOK', '16451', '085313750645', '', '3276057112730021', 'firays63@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(211, '2009-01-29', '0000-00-00', '1981-12-26', '686668070', '412', '000', '686668070412000', '68.666.807.0-412.000', 'SITI FARIDA', '\' \' KP.AREMAN NO.00, DEPOK', '9', 'KOTA DEPOK', '16451', '', '', '3276026612810006', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(212, '2008-12-03', '0000-00-00', '1978-04-30', '582470753', '412', '000', '582470753412000', '58.247.075.3-412.000', 'ANI DWI MUDIANI', ' \"PALSIGUNUNG NO.0, DEPOK\"', '9', 'KOTA DEPOK', '16451', '', '', '3276027004780004', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(213, '2013-03-08', '0000-00-00', '1988-03-14', '982693285', '412', '000', '982693285412000', '98.269.328.5-412.000', 'DIDIK MARWANTO', '\' \'AREMAN BLOK 00 RT. 001 RW. 006', '6', 'KOTA DEPOK', '16451', '081210243260', '', '3276021403880007', 'ddidikmarwanto@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(214, '2013-03-08', '0000-00-00', '1984-10-02', '982693046', '412', '000', '982693046412000', '98.269.304.6-412.000', 'NURYADI', '\' \'AREMAN BLOK 000 NO.000 RT. 008 RW. 008', '8', 'KOTA DEPOK', '16451', '083808045364', '', '3276020210840006', 'eemon0931@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(215, '2009-05-12', '0000-00-00', '1979-02-27', '781858048', '412', '000', '781858048412000', '78.185.804.8-412.000', 'IRAWAN', '\' \'AREMAN BLOK 000, DEPOK', '8', 'KOTA DEPOK', '16451', '0899999999', '', '3276022702790008', 'irawan@mailnesia.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(216, '2008-08-13', '0000-00-00', '1980-10-12', '473771467', '412', '000', '473771467412000', '47.377.146.7-412.000', 'MYLANI NURMAYANTI', '\' \'AREMAN NO.000,', '8', 'KOTA DEPOK', '16451', '6281311351356', '', '3276025210800009', 'lala.nini80@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(217, '2008-08-13', '0000-00-00', '1978-06-12', '473772960', '412', '000', '473772960412000', '47.377.296.0-412.000', 'RENNY TRESNASARI', '\' \'AREMAN NO.000,', '8', 'KOTA DEPOK', '16451', '', '', '3276025206780014', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(218, '2013-03-08', '0000-00-00', '1977-05-23', '982693533', '412', '000', '982693533412000', '98.269.353.3-412.000', 'RAHMAT HIDAYAT', '\' \'AREMAN RT. 008 RW. 008', '8', 'KOTA DEPOK', '16451', '6281293164741', '', '3276022305770008', 'wironia35@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(219, '2008-12-31', '0000-00-00', '1972-07-15', '678380262', '412', '000', '678380262412000', '67.838.026.2-412.000', 'RUSMI ARSIH', '\' \'B. CENGKEH II BLOK A.5 NO.7, DEPOK', '16', 'KOTA DEPOK', '16451', '', '', '32.77.01.1009/474/33', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(220, '2008-08-11', '0000-00-00', '1973-11-13', '473682235', '412', '000', '473682235412000', '47.368.223.5-412.000', 'ANI SULISTIANI', '\' \'BUKIT CENGKEH II BLOK HIA NO.03,', '15', 'KOTA DEPOK', '16451', '081219237115', '', '3276025311730010', 'anidiklat@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(221, '2008-08-13', '0000-00-00', '1971-08-06', '473775047', '412', '000', '473775047412000', '47.377.504.7-412.000', 'SRI AGUSTININGSIH', '\' \'JL. H. SALIM KELAPADUA NO.000,', '1', 'KOTA DEPOK', '16451', '62885780907202', '', '3276024608710008', 'sriagustiningsih176@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(222, '2009-03-18', '0000-00-00', '1954-05-19', '775827132', '412', '000', '775827132412000', '77.582.713.2-412.000', 'BAMBANG SINGO', '\' \'JL.AKSES UI KELAPADUA NO.39, DEPOK', '9', 'KOTA DEPOK', '16451', '022-6866198', '', '3276021905540004', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(223, '2008-08-13', '0000-00-00', '1983-07-08', '473682375', '412', '000', '473682375412000', '47.368.237.5-412.000', 'BASUKININGSIH', '\' \'KAMPUNG AREMAN NO.000,', '9', 'KOTA DEPOK', '16451', '6281316647472', '', '3201044807830007', 'ningsih.nizam11@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-32478KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(224, '2008-08-11', '0000-00-00', '1980-05-19', '473682417', '412', '000', '473682417412000', '47.368.241.7-412.000', 'BUDI ARMANSYAH', '\' \'KAMPUNG AREMAN NO.000,', '9', 'KOTA DEPOK', '16451', '081270717248', '', '3276021905800011', 'armansyahbudi12@yahoo.co.id', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(225, '2008-08-13', '0000-00-00', '1982-10-01', '473772580', '412', '000', '473772580412000', '47.377.258.0-412.000', 'NISA HOIRUNISA', '\' \'KAMPUNG AREMAN NO.000,', '9', 'KOTA DEPOK', '16451', '', '', '32770110094743335828', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(226, '2008-08-12', '0000-00-00', '1982-01-11', '473770055', '412', '000', '473770055412000', '47.377.005.5-412.000', 'LARI YANTI LESTARI', '\' \'KAMPUNG KELAPA DUA NO.000,', '9', 'KOTA DEPOK', '16451', '', '', '3276025101820006', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(227, '2008-08-13', '0000-00-00', '1985-08-31', '473774610', '412', '000', '473774610412000', '47.377.461.0-412.000', 'RINI NUR AINI', '\' \'KAMPUNG KELAPADUA NO.000,', '9', 'KOTA DEPOK', '16451', '6281282104382', '', '3276027108850007', 'Rinninuraini04@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(228, '2008-08-12', '0000-00-00', '1978-03-04', '473770030', '412', '000', '473770030412000', '47.377.003.0-412.000', 'LAELA SAKINAH', '\' \'KELAPA DUA NO.000,', '9', 'KOTA DEPOK', '16451', '6285778531748', '', '3276024403780011', 'laelasakinah1@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(229, '2008-12-06', '0000-00-00', '1973-06-06', '584059646', '412', '000', '584059646412000', '58.405.964.6-412.000', 'SALWANI', '\' \'KELAPA DUA, DEPOK', '9', 'KOTA DEPOK', '16451', '08888704071', '', '3276020606730001    ', 'salwani6873@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(230, '2009-01-04', '0000-00-00', '1979-09-22', '670504612', '412', '000', '670504612412000', '67.050.461.2-412.000', 'SANTI SIDABUTAR', '\' \'KOMP. AREMAN BARU NO.13, DEPOK', '9', 'KOTA DEPOK', '16451', '', '', '32770110094743380965', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(231, '2009-05-13', '0000-00-00', '1980-09-09', '783559537', '412', '000', '783559537412000', '78.355.953.7-412.000', 'ENY SUMIATI', '\' \'KP. AREMA NO.00, DEPOK', '9', 'KOTA DEPOK', '16451', '', '', '3276024909800016', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(232, '2013-03-08', '0000-00-00', '1978-07-17', '982693178', '412', '000', '982693178412000', '98.269.317.8-412.000', 'SARIANPI', '\' \'KP. AREMAN BLOK 00 RT. 001 RW. 007', '7', 'KOTA DEPOK', '16451', '62895324898950', '', '3276021707780018', 'Jakariamaulana38@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(233, '2008-11-06', '0000-00-00', '1972-07-06', '571628544', '412', '000', '571628544412000', '57.162.854.4-412.000', 'SUKIPNO', '\' \'KP. AREMAN NO.65 RT.02 RW.08, TUGU', '8', 'KOTA DEPOK', '16451', '08111556619', '', '3276020607720004', 'sukipno1972@gmail.com', 1, 1, 96303, 'PEGAWAI BADAN USAHA MILIK NEGARA/BADAN USAHA MILIK', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(234, '2008-12-31', '0000-00-00', '1986-12-18', '686838640', '412', '000', '686838640412000', '68.683.864.0-412.000', 'SUGIK DARMANTO', '\' KP. AREMAN NO.901, DEPOK', '8', 'KOTA DEPOK', '16451', '', '', '3216191812860006', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(235, '2009-01-30', '0000-00-00', '1976-09-30', '687287235', '412', '000', '687287235412000', '68.728.723.5-412.000', 'NIRZAM EFFENDI', '\' KP. KELAPA DUA NO.., DEPOK', '8', 'KOTA DEPOK', '16451', '6287780050058', '', '3171013009760004', 'akuudara@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(236, '2009-10-06', '0000-00-00', '1980-06-14', '799388012', '412', '000', '799388012412000', '79.938.801.2-412.000', 'LILIK TUGIYAH', '\' KP.PALSIGUNUNG NO.00, DEPOK\"', '9', 'KOTA DEPOK', '16451', '', '', '3276025406800006', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(237, '2008-11-06', '0000-00-00', '1963-05-11', '572990091', '412', '000', '572990091412000', '57.299.009.1-412.000', 'EKO SUSILOWATI', '\' \'MAJAPAHIT II/44 BLOK S NO.12 RT.06 RW.17, TUGU', '17', 'KOTA DEPOK', '16451', '', '', '3276025105630006', '', 2, 1, 96303, 'PEGAWAI BADAN USAHA MILIK NEGARA/BADAN USAHA MILIK', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'RACHMAD ANDRIYAN NUGROHO', 'ARISTA AULIA MARRUS'),
(238, '2013-03-08', '0000-00-00', '1977-07-03', '982693053', '412', '000', '982693053412000', '98.269.305.3-412.000', 'SAHRONI', '\' \'PALSIGUNUNG BLOK 000 KAV.000 NO.000 RT. 001 RW. 003', '3', 'KOTA DEPOK', '16451', '6287775595070', '', '3276020307770020', 'farisronioo7@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(239, '2009-02-24', '0000-00-00', '1983-09-11', '697272136', '412', '000', '697272136412000', '69.727.213.6-412.000', 'SUYANTI', '\' \'PALSIGUNUNG BLOK 000 KAV.000 NO.000 RT.009 RW.001, TUGU', '1', 'KOTA DEPOK', '16451', '081210251231', '', '3276025109830011', 'yantiradizky@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(240, '2009-05-13', '0000-00-00', '1966-05-10', '783559735', '412', '000', '783559735412000', '78.355.973.5-412.000', 'S A N Y', '\' \'PALSIGUNUNG NO.50, DEPOK', '9', 'KOTA DEPOK', '16451', '', '', '3276025005660001    ', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(241, '2013-03-08', '0000-00-00', '1986-05-15', '982693525', '412', '000', '982693525412000', '98.269.352.5-412.000', 'RAHMAT ROSADY', '\' \'PALSIGUNUNG RT. 008 RW. 003', '3', 'KOTA DEPOK', '16451', '628982611726', '', '3276021505860017', 'nasyithanoura77@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(242, '2008-12-17', '0000-00-00', '1983-09-15', '248500977', '412', '000', '248500977412000', '24.850.097.7-412.000', 'DEWI SETIA NINGSIH', '- RT. - RW. -', '0', 'KOTA DEPOK', '16451', '085770844388', '', '32770110094743381238', 'dewi.sabila@yahoo.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(243, '2008-11-26', '0000-00-00', '1961-02-03', '578225229', '412', '000', '578225229412000', '57.822.522.9-412.000', 'ETTY HERAWATI', '( ) JL. B. CENGKEH II BLOK E KAV.II NO.7, DEPOK', '16', 'KOTA DEPOK', '16451', '08128000249', '', '3276024302610006', 'herawati.etty03@gmail.com', 1, 1, 96301, 'PEGAWAI NEGERI SIPIL', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(244, '2020-06-21', '0000-00-00', '0000-00-00', '951251438', '412', '000', '951251438412000', '95.125.143.8-412.000', 'RA AZKIA', '. RT 006 RW 009', '9', 'KOTA DEPOK', '16451', '085779001091', '', '', 'kbpipit@gmail.com', 1, 2, 85602, 'JASA PENDIDIKAN TAMAN KANAK-KANAK SWASTA/RAUDATUL ', '0000-00-00', 6, 1, 'JAWA BARAT', 'LEMBAGA & BADAN LAIN', 'USD', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(245, '2020-01-16', '0000-00-00', '0000-00-00', '940438773', '412', '000', '940438773412000', '94.043.877.3-412.000', 'TARULI SEJAHTERA ABADI', ': JL. PROFESOR LAFRAN PANE  KELAPA DUA NO 93 RT 001 RW 011', '11', 'KOTA DEPOK', '16451', '02122823258', '', '', 'taruli.contactcenter@gmail.com', 1, 2, 95110, 'JASA REPARASI KOMPUTER DAN PERALATAN SEJENISNYA', '0000-00-00', 6, 1, 'JAWA BARAT', 'PT', 'USD', '', '', '', '0000-00-00', '', 'RACHMAD ANDRIYAN NUGROHO', 'ARISTA AULIA MARRUS'),
(246, '2002-03-18', '0000-00-00', '1960-10-07', '096952478', '412', '000', '096952478412000', '09.695.247.8-412.000', 'ZUPRIZAL', '1L GOTONG ROYONG KP. AREMAN SETU,', '0', 'KOTA DEPOK', '16451', '', '', '1320318200947424059 ', '', 2, 1, 47711, 'PERDAGANGAN ECERAN PAKAIAN', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(247, '2010-04-22', '0000-00-00', '1990-02-19', '893899393', '412', '000', '893899393412000', '89.389.939.3-412.000', 'NUR PEBRIANTO', 'A R E M A N NO.00, DEPOK', '0', 'KOTA DEPOK', '16451', '02199729606', '', '3276021902900001    ', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(248, '2009-03-17', '0000-00-00', '1963-06-13', '254164601', '412', '000', '254164601412000', '25.416.460.1-412.000', 'AHMAD ISKANDAR', 'ABDUL MUNTHOLIB KP.AREMAN RT. 012 RW. 008', '8', 'KOTA DEPOK', '16451', '000-0000', '', '3276021306630008', 'AHMAD-ISKANDAR@YAHOO.COM', 2, 1, 96301, 'PEGAWAI NEGERI SIPIL', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(249, '2016-02-03', '0000-00-00', '1958-08-17', '751358763', '412', '000', '751358763412000', '75.135.876.3-412.000', 'SYAMSUDIN', 'ABDUL MUTHOLIB KP AREMAN NO 17 RT 002 RW 008', '8', 'KOTA DEPOK', '16451', '081287228601', '', '3276021708580007', '', 2, 1, 56210, 'JASA BOGA UNTUK SUATU EVENT TERTENTU (EVENT CATERI', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-2751KT/WPJ.33/KP.0603/2016', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(250, '2019-07-18', '0000-00-00', '1995-03-08', '921985750', '412', '000', '921985750412000', '92.198.575.0-412.000', 'IIP SAIRLI', 'ABDUL MUTHOLIB KP. AREMAN NO 102 RT 007 RW 008', '8', 'KOTA DEPOK', '16451', '089625955251', '', '3302060803950003', 'sairliiip@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-33739KT/WPJ.33/KP.0603/2019', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(251, '2015-06-10', '0000-00-00', '0000-00-00', '731910865', '412', '000', '731910865412000', '73.191.086.5-412.000', 'INDAH KURNIA NINGSIH', 'ABDUL MUTHOLIB KP. AREMAN NO 140 RT 004 RW 008', '8', 'KOTA DEPOK', '16451', '081617293027', '', '3276024706790009', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-27243KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(252, '2009-03-17', '0000-00-00', '1970-04-17', '254164205', '412', '000', '254164205412000', '25.416.420.5-412.000', 'SOLEHA', 'ABDUL MUTHOLIB KP.AREMAN RT. 012 RW. 008', '8', 'KOTA DEPOK', '16451', '628990914864', '', '3276025704700002', 'SOLEHA1704@gmail.COM', 1, 1, 96301, 'PEGAWAI NEGERI SIPIL', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(253, '2017-11-15', '0000-00-00', '1993-09-19', '832939540', '412', '000', '832939540412000', '83.293.954.0-412.000', 'MUHAMMAD ABDUL AZIZ AL FARUQI', 'ABDUL MUTHOLIB NO 15 RT 04 RW 08', '8', 'KOTA DEPOK', '16451', '081286499985', '', '3276021909930005', 'faruqphoto@gmail.com', 1, 1, 74201, 'JASA FOTOGRAFI', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-24622KT/WPJ.33/KP.0603/2017', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(254, '2016-03-24', '0000-00-00', '1989-02-02', '756190948', '412', '000', '756190948412000', '75.619.094.8-412.000', 'DITO ARI PRABOWO', 'ABDUL MUTHOLIB NO 84 RT 4 RW 8', '8', 'KOTA DEPOK', '16451', '081218265682', '', '3276020202890008', 'ditoaridito@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-8161KT/WPJ.33/KP.0603/2016', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(255, '2020-09-21', '0000-00-00', '1980-02-25', '960072049', '412', '000', '960072049412000', '96.007.204.9-412.000', 'WARDOYO', 'ADAM NO 115 RT 011 RW 003', '3', 'KOTA DEPOK', '16451', '081383890777', '', '3314122502800002', 'yoyodimas2@gmail.com', 1, 1, 46313, 'PERDAGANGAN BESAR SAYURAN', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(256, '2021-01-20', '0000-00-00', '1984-07-26', '412296998', '412', '000', '412296998412000', '41.229.699.8-412.000', 'HELMI HIMAWAN', 'ADAM NO 15 RT 010 RW 003', '3', 'KOTA DEPOK', '16451', '081293867779', '', '3276022607840005', 'sayahelmi@gmail.com', 1, 1, 18120, 'JASA PENUNJANG PENCETAKAN', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', ''),
(257, '2015-11-19', '0000-00-00', '1995-04-16', '744838707', '412', '000', '744838707412000', '74.483.870.7-412.000', 'APRILIA RIZKI', 'AEM BLOK N RT 001 RW 008', '8', 'KOTA DEPOK', '16451', '081380784766', '-', '3276025604950011', 'aprilapril160495@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-48365KT/WPJ.33/KP.0603/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(258, '2020-12-08', '0000-00-00', '1963-01-12', '967729500', '412', '000', '967729500412000', '96.772.950.0-412.000', 'SUDIONO', 'AKAES UI GG. BAKTI NO 18 RT 002 RW 009', '9', 'KOTA DEPOK', '16451', '085694449333', '', '3201011201630005', 'odionosudi@gmail.com', 1, 1, 52291, 'JASA PENGURUSAN TRANSPORTASI (JPT)', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', ''),
(259, '2009-03-23', '0000-00-00', '1975-06-20', '254432552', '412', '000', '254432552412000', '25.443.255.2-412.000', 'TEGUH IMAN SANTOSO', 'AKB SUDONO NO 38 RT. 08 RW. 09', '9', 'KOTA DEPOK', '16451', '021-0', '', '3276022006750011', 'A@Y.COM', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(260, '2015-05-25', '0000-00-00', '1986-11-30', '731141453', '412', '000', '731141453412000', '73.114.145.3-412.000', 'AHMAD FAUZI RIZKI', 'AKBP SOEDONOE NO 38 RT 008 RW 009', '9', 'KOTA DEPOK', '16451', '081311115086', '', '3276023011860007', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-25547KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(261, '2009-08-10', '0000-00-00', '1977-08-17', '789939360', '412', '000', '789939360412000', '78.993.936.0-412.000', 'HAMDI FAHRURRAZI', 'AKSES  UI KP AREMAN, DEPOK', '9', 'KOTA DEPOK', '16451', '', '', '3276021708770005', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(262, '2015-03-24', '0000-00-00', '1984-08-08', '725341994', '412', '000', '725341994412000', '72.534.199.4-412.000', 'RICKY SANJAYA LUBIS', 'AKSES KELAPA DUA GG. HJ. JAMI NO 24 A RT 05 RW 09', '9', 'KOTA DEPOK', '16451', '081286171258', '', '3276020808840020', 'ricky.lubis@outlook.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-15013KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(263, '2009-04-24', '0000-00-00', '1982-05-22', '255962581', '412', '000', '255962581412000', '25.596.258.1-412.000', 'TULUS SUPRIYADI KASIYO', 'AKSES NO.2 RT. 008 RW. 004', '4', 'KOTA DEPOK', '16451', '021-000', '', '4743350449', 'TULUS@YAHOO.COM', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(264, '2014-12-23', '0000-00-00', '1990-03-16', '717457113', '412', '000', '717457113412000', '71.745.711.3-412.000', 'ZEPRI KUSWANDI', 'AKSES UI (KP. AREMAN) RT 008 RW 007', '7', 'KOTA DEPOK', '16451', '085697883991', '', '3276021603900009', 'zeprikuswandi@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-48625KT/WPJ.22/KP.0903/2014', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(265, '2009-02-10', '0000-00-00', '1976-02-22', '251617197', '412', '000', '251617197412000', '25.161.719.7-412.000', 'IPUNG SUTAJI', 'AKSES UI 60B KELAPA DUA RT. 02 RW. 09', '9', 'KOTA DEPOK', '16451', '021-91371922', '', '3276022202760008', 'CAPUNG-TEA@YAHOO.CO.ID', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(266, '2010-10-11', '0000-00-00', '1975-05-27', '353465040', '412', '000', '353465040412000', '35.346.504.0-412.000', 'ASTINI', 'AKSES UI AREMAN NO 79 RT 004 RW 007', '7', 'KOTA DEPOK', '16451', '081310526592', '', '3276106705750002', 'astin.lubna@gmail.com', 1, 1, 96301, 'PEGAWAI NEGERI SIPIL', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-3926KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(267, '2012-07-16', '0000-00-00', '1981-04-17', '458828621', '412', '000', '458828621412000', '45.882.862.1-412.000', 'IIN INAYAH', 'AKSES UI AREMAN NO.12 RT.08 RW.07, TUGU', '7', 'KOTA DEPOK', '16451', '6281281226742', '', '3276025704810015', 'inayah.iin@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(268, '2010-02-09', '0000-00-00', '1990-11-20', '888881133', '412', '000', '888881133412000', '88.888.113.3-412.000', 'TRY ARNANINGRUM', 'AKSES UI AREMAN NO.56, DEPOK', '9', 'KOTA DEPOK', '16451', '085717139932', '', '3276026011900009', 'tryarna@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(269, '2015-03-25', '0000-00-00', '1987-07-28', '725188338', '412', '000', '725188338412000', '72.518.833.8-412.000', 'JULIAN DWI CAHYO', 'AKSES UI BLOK - NO 43 RT 03 RW 05', '5', 'KOTA DEPOK', '16451', '081310320403', '', '3276022807870010', 'joelian_dc@yahoo.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-15646KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(270, '2017-06-08', '0000-00-00', '1996-05-05', '820871168', '412', '000', '820871168412000', '82.087.116.8-412.000', 'SINTYA', 'AKSES UI BLOK AREMAN NO 68 RT 003 RW 005', '5', 'KOTA DEPOK', '16451', '083808087493', '', '3276024505960009', 'sintyatya0596@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-13475KT/WPJ.33/KP.0603/2017', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(271, '2014-06-03', '0000-00-00', '0000-00-00', '703286146', '412', '000', '703286146412000', '70.328.614.6-412.000', 'HARJA SAHA MULYA', 'AKSES UI BLOK F NO 13 RT 010 RW 010', '10', 'KOTA DEPOK', '16451', '087774367382', '', '', '', 2, 2, 52293, 'JASA EKSPEDISI MUATAN KAPAL (EMKL)', '0000-00-00', 6, 1, 'JAWA BARAT', 'PT', 'USD', 'S-22835KT/WPJ.22/KP.0903/2014', '', '', '0000-00-00', '', 'RACHMAD ANDRIYAN NUGROHO', 'ARISTA AULIA MARRUS'),
(272, '2020-08-10', '0000-00-00', '1984-06-10', '955930474', '412', '000', '955930474412000', '95.593.047.4-412.000', 'DARIMAN', 'AKSES UI BLOK G NO 45 RT 002 RW 009', '9', 'KOTA DEPOK', '16451', '081928060680', '', '3302061006840002', 'ddariman7@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(273, '2015-01-22', '0000-00-00', '1984-08-03', '719811887', '412', '000', '719811887412000', '71.981.188.7-412.000', 'AGUS GUNAWAN', 'AKSES UI BLOK GANG BAKTI NO 21 RT 02 RW 09', '9', 'KOTA DEPOK', '16451', '081385303088', '', '3216190308840005', 'Agusmedic51@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-3353KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(274, '2015-01-09', '0000-00-00', '1995-05-11', '718989817', '412', '000', '718989817412000', '71.898.981.7-412.000', 'WIRA TAUFIK ISMAIL', 'AKSES UI GANG BAKTI 3 NO 30 RT 002 RW 006', '6', 'KOTA DEPOK', '16451', '085691423233', '', '3276021105950012', 'wirataufik22@rocketmail.com', 2, 1, 96302, 'ANGGOTA MILITER DAN KEPOLISIAN', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-1320KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(275, '2020-12-22', '0000-00-00', '0000-00-00', '969393222', '412', '000', '969393222412000', '96.939.322.2-412.000', 'FERDA ANISA', 'AKSES UI GANG BAKTI 3,GOR AREMAN RT 001 RW 006', '6', 'KOTA DEPOK', '16451', '089637576266', '', '', 'ferdaanisa021@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', ''),
(276, '2019-02-12', '0000-00-00', '1996-09-25', '904746617', '412', '000', '904746617412000', '90.474.661.7-412.000', 'HAIRANI AMBAR SARI', 'AKSES UI GANG BHAKTI III BLOK - NO 85 RT 001 RW 006', '6', 'KOTA DEPOK', '16451', '081281943466', '', '3276026509960006', 'hairani.ambar@yahoo.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-4375KT/WPJ.33/KP.0603/2019', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(277, '2015-10-01', '0000-00-00', '1994-11-07', '740691068', '412', '000', '740691068412000', '74.069.106.8-412.000', 'TRI ESMIATI', 'AKSES UI GANG BHAKTI KAMPUNG AREMAN (KOSAN KURAY) RT 04 RW 06', '6', 'KOTA DEPOK', '16451', '08989079099', '', '3201044711940002', 'triesmiati@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-44578KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(278, '2009-03-04', '0000-00-00', '1975-03-25', '694714635', '412', '000', '694714635412000', '69.471.463.5-412.000', 'SUYANTO', 'AKSES UI GANG BHAKTI KELAPA DUA NO.00, DEPOK', '9', 'KOTA DEPOK', '16451', '085880341927', '', '3276022503750014', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(279, '2021-02-24', '0000-00-00', '1978-09-04', '415936848', '412', '000', '415936848412000', '41.593.684.8-412.000', 'FITRIAH VIRGINA', 'AKSES UI GANG DARMA NO 41 B RT 002 RW 009', '9', 'KOTA DEPOK', '16451', '085234342999', '', '3276024409780010', 'nyimas.fitriah.virgina@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', '', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', ''),
(280, '2015-11-07', '0000-00-00', '1997-05-24', '743889248', '412', '000', '743889248412000', '74.388.924.8-412.000', 'ALDI WIRAWAN', 'AKSES UI GG BHAKTI 3 NO 111 RT 001 RW 006', '6', 'KOTA DEPOK', '16451', '089649628943', '', '3276022405970015', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-47544KT/WPJ.33/KP.0603/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(281, '2015-11-10', '0000-00-00', '1988-09-20', '744335514', '412', '000', '744335514412000', '74.433.551.4-412.000', 'TRI SURYA VENALISA', 'AKSES UI GG BIMA NO 42 RT 07 RW 09', '9', 'KOTA DEPOK', '16451', '085781498468', '', '3276022009880006', 'tri.suryavin@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-47686KT/WPJ.33/KP.0603/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(282, '2015-02-17', '0000-00-00', '1972-05-21', '722120995', '412', '000', '722120995412000', '72.212.099.5-412.000', 'SATYO HARYONO', 'AKSES UI GG. BAKTI 3 NO 4 RT 1 RW 6', '6', 'KOTA DEPOK', '16451', '081380501515', '', '3276022105720005', 'sty.haryo@gmail.com', 2, 1, 96999, 'JASA PERORANGAN LAINNYA YTDL', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-8133KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(283, '2013-06-28', '0000-00-00', '1995-07-06', '555998020', '412', '000', '555998020412000', '55.599.802.0-412.000', 'BAYU SADEWO', 'AKSES UI GG. BAKTI 31 KP AREMAN NO. 111 RT. 001 RW. 006', '6', 'KOTA DEPOK', '16451', '896-30824551', '', '3276020607950007', 'D@YAHOO.COM', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(284, '2015-11-21', '0000-00-00', '1990-11-09', '745328146', '412', '000', '745328146412000', '74.532.814.6-412.000', 'ROBI AHMAD FILADI', 'AKSES UI GG. BAKTI III NO 109 RT 002 RW 006', '6', 'KOTA DEPOK', '16451', '081281839303', '', '3276020911900006', 'filadi.kap@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-48595KT/WPJ.33/KP.0603/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(285, '2015-03-31', '0000-00-00', '1996-10-28', '726453343', '412', '000', '726453343412000', '72.645.334.3-412.000', 'SILVIA OKTAVIANI', 'AKSES UI GG. BHAKTI 3 NO 153 RT 002 RW 006', '6', 'KOTA DEPOK', '16451', '081297143690', '', '3276026810960007', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-16828KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(286, '2009-09-11', '2017-04-11', '1981-10-05', '799718036', '434', '000', '799718036434000', '79.971.803.6-434.000', 'MUHAMAD SUPRIYATIN', 'AKSES UI GG. BHAKTI III NO 146 RT 001 RW 006', '6', 'KOTA DEPOK', '16451', '085715152017', '', '3276020510810019', 'cipratama.adv@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-9789KT/WPJ.33/KP.0603/2017', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(287, '2014-09-29', '0000-00-00', '1979-03-28', '711147272', '412', '000', '711147272412000', '71.114.727.2-412.000', 'SYAFRIZAL', 'AKSES UI GG. BHAKTI NO 021 RT 002 RW 009', '9', 'KOTA DEPOK', '16451', '081295482339', '', '3276022803790013', 'temmy.manurung@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-36662KT/WPJ.22/KP.0903/2014', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(288, '2014-12-15', '0000-00-00', '1989-09-22', '716916713', '412', '000', '716916713412000', '71.691.671.3-412.000', 'SEPTIA RIYANI', 'AKSES UI GG. BHAKTI NO 35 RT 002 RW 006', '6', 'KOTA DEPOK', '16451', '085711572064', '', '3276026209890014', 'septia.riyani22@gmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-47034KT/WPJ.22/KP.0903/2014', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(289, '2017-02-16', '0000-00-00', '1965-10-10', '812682318', '412', '000', '812682318412000', '81.268.231.8-412.000', 'ANNA ASDIANA', 'AKSES UI GG. BHAKTI NO 96 RT 002 RW 006', '6', 'KOTA DEPOK', '16451', '081282572552', '', '3276025010650026', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-4012KT/WPJ.33/KP.0603/2017', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(290, '2015-09-03', '0000-00-00', '1997-05-20', '738394378', '412', '000', '738394378412000', '73.839.437.8-412.000', 'DAMELIA ARYANTI', 'AKSES UI GG. DARMA KELAPA DUA RT 002 RW 009', '9', 'KOTA DEPOK', '16451', '089671161415', '', '3276026005970015', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-40226KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(291, '2007-05-31', '0000-00-00', '1967-08-28', '473413938', '412', '000', '473413938412000', '47.341.393.8-412.000', 'RASIWAN MARWAN', 'AKSES UI GG. HAJI DAIM NO. 56,', '9', 'KOTA DEPOK', '16451', '081386237444', ' ', '3276022808670003', ' ', 2, 1, 96303, 'PEGAWAI BADAN USAHA MILIK NEGARA/BADAN USAHA MILIK', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'ISTITO SETYAWAN', 'ARISTA AULIA MARRUS'),
(292, '2009-02-09', '0000-00-00', '1985-03-16', '688808476', '412', '000', '688808476412000', '68.880.847.6-412.000', 'NURLAELA', 'AKSES UI GG. MELATI KP. AREMAN RT 004 RW 007', '7', 'KOTA DEPOK', '16451', '081385486334', '', '3276025603850013', 'nurlaela549@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-23835KT/WPJ.33/KP.0603/2017', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(293, '2016-01-25', '0000-00-00', '1994-02-17', '750575003', '412', '000', '750575003412000', '75.057.500.3-412.000', 'ANISA FEBRIANDANI', 'AKSES UI GG. PAMAAN NO 13 RT 002 RW 009', '9', 'KOTA DEPOK', '16451', '087788118474', '', '1308055702940001', 'anisafebriandany@ymail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-1812KT/WPJ.33/KP.0603/2016', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(294, '2009-03-12', '0000-00-00', '1984-06-30', '253906150', '412', '000', '253906150412000', '25.390.615.0-412.000', 'FITRI NURJANAH', 'AKSES UI GG.BHAKTI 3 KP.AREMAN NO 39 RT. 06 RW. 05', '5', 'KOTA DEPOK', '16451', '082167380052', '', '3276027006840002', 'nurjanahfitri32@yahoo.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(295, '2016-05-19', '0000-00-00', '1980-02-05', '761775543', '412', '000', '761775543412000', '76.177.554.3-412.000', 'AHMAD VALIS AKBAR', 'AKSES UI GG.BHAKTI NO 96 RT 002 RW 006', '6', 'KOTA DEPOK', '16451', '087784397667', '', '3276030502800012', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-13557KT/WPJ.33/KP.0603/2016', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(296, '2009-08-27', '0000-00-00', '1991-02-24', '260921010', '412', '000', '260921010412000', '26.092.101.0-412.000', 'NURUL PEBRIYANTI', 'AKSES UI KAMP. AREMAN RT. 001 RW. 006', '6', 'KOTA DEPOK', '16451', '021-97938748', '', '3276026402910007', 'NURUL@YAHOO.COM', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(297, '2015-08-25', '0000-00-00', '1991-10-25', '737682732', '412', '000', '737682732412000', '73.768.273.2-412.000', 'TIARA GITA TRI WULANDARI', 'AKSES UI KAMPUNG BARU KELAPA DUA NO 17 RT 9 RW 10', '10', 'KOTA DEPOK', '16451', '08978183926', '', '3276026510910006', 'tiaragita1991@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-34323KT/WPJ.22/KP.0903/2015', '', '', '0000-00-00', '', 'RACHMAD ANDRIYAN NUGROHO', 'ARISTA AULIA MARRUS'),
(298, '2010-06-11', '0000-00-00', '1990-04-01', '348231812', '412', '000', '348231812412000', '34.823.181.2-412.000', 'WIWIK SARWINDAH', 'AKSES UI KELAPA 2 RT. 008 RW. 009', '9', 'KOTA DEPOK', '16451', '081285390720', '', '3312164104900001', 'wiwiksarwindah@yopmail.com', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(299, '2020-03-02', '0000-00-00', '1980-04-04', '945207124', '412', '000', '945207124412000', '94.520.712.4-412.000', 'PIPIH SOPIAN', 'AKSES UI KELAPA DUA BLOK - NO 18 RT 02 RW 09', '9', 'KOTA DEPOK', '16451', '081806216383', '', '3276020404800018', 'sopianpipih99@gmail.com', 1, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'S-5657KT/WPJ.33/KP.0603/2020', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(300, '2013-05-20', '0000-00-00', '1992-05-01', '552745044', '412', '000', '552745044412000', '55.274.504.4-412.000', 'DUNIYATI', 'AKSES UI KELAPA DUA BLOK BIMA 1 NO. 35 RT. 007 RW. 009', '9', 'KOTA DEPOK', '16451', '0-0', '0-0', '3212284105920001', 'DUNI@YAHOO.COM', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'TAUFIK HIDAYAT', 'ARISTA AULIA MARRUS'),
(301, '2008-12-19', '0000-00-00', '1988-04-01', '599570389', '412', '000', '599570389412000', '59.957.038.9-412.000', 'ELLYA ISWAHYUNI', '\' \' KELAPA DUA BLOK KP RT.07 RW.010, TUGU', '10', 'KOTA DEPOK', '16451', '', '', '3278024104880001    ', '', 2, 1, 96304, 'PEGAWAI SWASTA', '0000-00-00', 6, 1, 'JAWA BARAT', '', '', 'BELUM GENERATE', '', '', '0000-00-00', '', 'RACHMAD ANDRIYAN NUGROHO', 'ARISTA AULIA MARRUS');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `UUID` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `user_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `UUID`, `nama`, `user_id`) VALUES
(1, '0b9af1c2-d2e0-4037-a077-c816e6185d17', 'cf91234f3e06547a5b9a1a076caa70dc.png', NULL),
(2, '0b9af1c2-d2e0-4037-a077-c816e6185d17', 'fe8acebc832e53e310d840cb34af47db.png', NULL),
(3, '0b9af1c2-d2e0-4037-a077-c816e6185d17', '8b22651f964b551d8ecda85ac5e93259.png', NULL),
(4, '0b9af1c2-d2e0-4037-a077-c816e6185d17', '27b6eb51dc60c8a87077cf214f927f34.png', NULL),
(5, '0b9af1c2-d2e0-4037-a077-c816e6185d17', 'f27dd04719eb758b7c9c92570d1a63d5.png', NULL),
(6, '0b9af1c2-d2e0-4037-a077-c816e6185d17', '45891625a5b4a9b816e8694ed8108ef7.png', NULL),
(7, '93aee91d-39b7-4b02-8275-d031c26370e0', '6312d2db995514919eb84e806c3f0652.png', NULL),
(8, '93aee91d-39b7-4b02-8275-d031c26370e0', '12d6c6720f470704c82d3c18373c96b9.png', NULL),
(9, '93aee91d-39b7-4b02-8275-d031c26370e0', '09a04b5aca220b9140f2200935119daf.png', NULL),
(10, '93aee91d-39b7-4b02-8275-d031c26370e0', '76c15df33a88c17867faee024f8086d3.png', NULL),
(11, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', 'c166f65e737c7303508371e39ab568f8.png', NULL),
(12, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', '5ece01dd935ecaaf7dc291075888dbfc.png', NULL),
(13, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', '52c4e3d8187ba7742f10cdf06c3bc9f5.png', NULL),
(14, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', 'f93a58ae0ac97d8b5f687cd1980acd7f.png', NULL),
(15, '3bd6f8eb-aefa-4f6f-b5ac-ae72fa987f57', '30d71042193cc423da0f51f6610a5eff.png', 28),
(16, '3bd6f8eb-aefa-4f6f-b5ac-ae72fa987f57', '71cfd6eda244ee29a936205ebe7f4171.png', 28),
(17, '3bd6f8eb-aefa-4f6f-b5ac-ae72fa987f57', '7c512757882a9f1137eb852c79ce5c71.png', 28),
(18, '3bd6f8eb-aefa-4f6f-b5ac-ae72fa987f57', '200825b8552384b708d2543046529bd4.png', 2),
(20, '93aee91d-39b7-4b02-8275-d031c26370e0', '0a1b8f5c161cb417b6d2384ba5b64700.png', 29),
(21, '93aee91d-39b7-4b02-8275-d031c26370e0', 'ccc4b9d2966661c93c592e3aa9a3d0e0.png', 29),
(24, '4bba50d4-a618-4a4a-b267-61e5636c1b39', '52f573ec85f7d075ff32f8cd7154b726.png', 29),
(25, '4bba50d4-a618-4a4a-b267-61e5636c1b39', '90299078e094a720fa5041152de4a004.png', 29),
(26, 'e4c9a600-5e55-4f84-987a-3c01682da298', 'f4a24a13ea556d1dacb5f10ad258d809.png', 30),
(27, 'e4c9a600-5e55-4f84-987a-3c01682da298', '57e9e17ec1132cfe3722a45eadc29579.png', 30),
(28, '0e784e9c-7562-4a64-9f1e-5fefaf87d56f', 'f6ea52c3ad3334cd6460ae79096d2eb1.png', 29),
(29, '464d5276-be0b-43e7-bdf7-1fda56364300', 'c7cd601e0d216348eabe6ff67be27d50.png', 30),
(30, '464d5276-be0b-43e7-bdf7-1fda56364300', 'b7338dbc7d2a4c639408f19b0bff1cf9.png', 30),
(31, '464d5276-be0b-43e7-bdf7-1fda56364300', '9b18e234e9462fea9b179919514cbc27.png', 30),
(32, '464d5276-be0b-43e7-bdf7-1fda56364300', 'a680f298ded84917ec29a077ed047b97.png', 30),
(33, '4f5a6d1a-4004-4364-b0ce-62f2abf02451', 'be275e0a2ec5a8f21bf074f6368b5a0c.png', 29),
(34, 'a96e9ca6-9ecb-40e7-ae22-ce1ff6868d60', '4fce815a1adb4880e6e02f7d2191c281.png', 35),
(35, 'a96e9ca6-9ecb-40e7-ae22-ce1ff6868d60', 'f62d72d7a980e5c88c64a18221be04eb.png', 35),
(36, 'cd404396-0d3f-4834-b3d1-9248507a8ee7', '813da801fee638686c8b30a27eff83d4.png', 35),
(37, '61a02d7a-812a-4f5a-a599-f6e0ead825db', '64322a273a35811c78fd7d2e7bc9216a.png', 35),
(38, '61a02d7a-812a-4f5a-a599-f6e0ead825db', '0f1e6ed1ce2c47972e4879a6dfe80783.png', 31),
(39, '61a02d7a-812a-4f5a-a599-f6e0ead825db', '96655fb303536098065b58fe2a20628c.png', 31),
(41, '135ca65b-f974-4077-9f81-b0e8aa34f4e5', 'e1e869eecdee7744e28b6c0146fbd0ff.png', 31),
(42, '135ca65b-f974-4077-9f81-b0e8aa34f4e5', '4eb046d039e39ae352f83fd83d1a762f.png', 31),
(43, '66e8f879-68a8-49da-89ca-8ce92f91cea6', '1d4e95b3e679ba250d95504545e42e1a.png', 31),
(44, '66e8f879-68a8-49da-89ca-8ce92f91cea6', '2bc081b668e20e6951db7e2a354beb7b.png', 31),
(45, '66e8f879-68a8-49da-89ca-8ce92f91cea6', 'c5f60ff1e92e4bc83b7c6bdf4b8b3ed4.png', 31),
(46, '66e8f879-68a8-49da-89ca-8ce92f91cea6', '42d86e7e6bf624921b91c5e3e762ce0a.png', 31),
(47, 'bc7bfcdf-4762-4a54-85fe-f8fc70f4d9ce', '942ed65bc651bb48505e0c2ce05691c7.png', 31),
(48, 'bc7bfcdf-4762-4a54-85fe-f8fc70f4d9ce', 'effbe7317a610c2ddafd6b20cf693164.png', 31),
(49, 'bc7bfcdf-4762-4a54-85fe-f8fc70f4d9ce', '7488b0f81dbed725fb60d130811d5867.png', 31),
(50, 'bc7bfcdf-4762-4a54-85fe-f8fc70f4d9ce', '7c900fe85d8e872660deac8f3aa62181.png', 31),
(51, '7a1ff858-b724-4373-aaf6-8e1f3bb97c26', '66bc696152218b1186b0863c5c2a2541.png', 31),
(52, '7a1ff858-b724-4373-aaf6-8e1f3bb97c26', '39e91ece7bc4ef0b3a2841652ae2854c.png', 31),
(53, '1d3bd30a-74b6-46f3-ade2-e7847cb02871', 'e3dcfe9a4f35c4a9b77439f798661158.png', 31),
(54, '1d3bd30a-74b6-46f3-ade2-e7847cb02871', '4ea63ac755fdd3593cce6b87f96a0623.png', 31),
(55, '7a1ff858-b724-4373-aaf6-8e1f3bb97c26', '11b5eb6d284618cf9642b9571a9eaa93.png', 31),
(56, '7a1ff858-b724-4373-aaf6-8e1f3bb97c26', '4525f440183c4eb9a2badfdee0dc46c9.png', 31),
(57, 'dae8233d-dbb6-42ab-946b-af89eeba835d', 'f7e104b8107b2df37488c6dd2b633937.png', 179),
(58, 'dae8233d-dbb6-42ab-946b-af89eeba835d', '4a3f624198e401afba932a42f1baf767.png', 179),
(59, 'f7f5f30a-13eb-4715-aa60-7ca1c3d27074', '65899f27d856349ef749b2801230e58a.png', 398),
(61, '26df5b3e-9857-4b00-90d3-be0eb724397a', '3d20c26718e5e67c7f3a6be81773104c.png', 289),
(62, '7ca95167-6f65-40e7-b918-d353d6f9ccc2', '1bf2511a6a52d66811e64a711d09c838.png', 293),
(63, '8d24ac6c-ce4f-4431-9a45-4f5eeaf911e7', '30df3e0216de9314edd9008caca73d32.png', 293),
(64, '8d24ac6c-ce4f-4431-9a45-4f5eeaf911e7', '31c2ed3a51965fb9d3e6cdc1d95a4f58.png', 293),
(65, 'cc143c6d-ca52-47a0-95e2-8fd77e62e437', 'e78cf3494eb4614e661dfa7dbc13e934.png', 293),
(66, '55326008-7939-47bb-933f-c53eb0279e75', 'a21aaff89874edb0729676f690eb4397.png', 293),
(67, '7960b890-bce6-47a0-afa4-6c08664d6bf8', 'cd681b28707f93c1bd9392fdc28d89a9.png', 400),
(68, '7960b890-bce6-47a0-afa4-6c08664d6bf8', '6a387f744814dd592be20f9fed3f81f4.png', 400),
(69, '827091a9-1fb9-4ed9-9db8-0b2dddf524ac', '4479fa96b5b95f3bc6fee7c92ad26e3e.png', 293),
(71, '0632d284-9763-43c3-8f7a-ffa0d0fe09aa', 'd2ef67e56fc942ffb4226feb624a5cc6.png', 368),
(72, '9f20e395-699f-4bcf-8ae8-fd701c397b33', '679af2b0d509d9102e41ef7aa9fb8555.png', 400),
(74, '6f81f686-0ba7-4674-a1b3-f3c8ae28434b', '3bd770fcaeb109aba5ed3a5befd83dda.png', 400),
(76, 'd55160d9-9fc0-4019-87b3-bafe8fab9304', '469a9a781c2aef0d9f7d4b3038597a1a.png', 400),
(78, '6ddf4972-ff51-401d-8efc-46ec9c13cedb', '31880cf42a053c3e5d14813b5382e602.png', 403),
(79, 'ac1cbf18-fbd9-4a9c-9d11-897951f54262', 'a5cb73ea43bbfa1fa0f9deb761f89657.png', 402),
(80, '91eb5f38-a995-4c83-8a89-d75632ce6143', '18744f338dd96ec49b1cadb1e1f8b862.png', 373),
(81, 'cdb741b8-4b82-4597-a737-927be826f853', '5541cc685ed6870760ed04f8bd5a692a.png', 1),
(82, '477db4a7-a5ef-46bf-861a-c8ded2c06d46', '9aeea8a41946be839c196946b173b0e5.png', 1),
(83, '7ac0481e-b009-435a-9d3d-025dc1798114', '7af046152c4aeec60b4422c1674b3538.png', 1),
(84, '64a9290d-8ded-4b29-8a85-ead44efd8cb8', '81df2b966027ac4302ed54127c26577d.png', 1),
(85, 'f2c4730e-0817-48b8-b013-a4e5109e4068', '852c96ee4f2e420fc89f0b56e65c1108.png', 1),
(86, 'f2c4730e-0817-48b8-b013-a4e5109e4068', 'bc7b1699fbe6fd7bc86e6e1674bdeacb.png', 1),
(87, '3f1191a3-28f8-4083-859e-380df2ccafe7', '8e6f8b1acafc7e8be72abb0d8fd623f7.png', 1),
(88, '7621a4a8-067f-471a-a40f-1a30eba13fb2', '74d1e3098ecce2f78c2944934f692fab.png', 1),
(89, '6d3b7c0b-7c48-44f8-af98-b1b5454f1aaa', '130e56d817f8bd1125a2aa43a4fa3c50.png', 1),
(90, '6d3b7c0b-7c48-44f8-af98-b1b5454f1aaa', '1e0ac02324aa8edd1dd1de0b51117b47.png', 1),
(91, '5b907f9c-a28f-49af-bd21-3aa6fe3a1403', '77579b90703c1e88934d1643a3cb515d.png', 1),
(92, '5b907f9c-a28f-49af-bd21-3aa6fe3a1403', 'b91bd716478be64b879a5992b3fd3b7a.png', 1),
(93, '8646df5a-f8b5-4c1c-9598-6f969440019b', '79b64032efe34de8d1e930631515fe31.png', 1),
(94, '8646df5a-f8b5-4c1c-9598-6f969440019b', 'e778635f3e17561de1e3ceaa0db1c263.png', 1),
(95, '8646df5a-f8b5-4c1c-9598-6f969440019b', '923655170c6d1c36023590dc413482a4.png', 1),
(96, 'adb5889f-35f7-466d-b3a1-44d7724dbb48', '73a86ed182326a97000b965b6fd30d82.png', 1),
(97, 'd304452f-fd14-477f-9f40-7fcb0c8395fc', '0d2a3c13fc8ec4b0bc78f7b53f9c2a17.png', 1),
(98, '35cc61c8-46ef-48b0-ac7f-27d8b14a6741', '3b18e585bf3e535de4516e8e18ecc618.png', 1),
(99, 'e5d3ca9b-cabf-4373-b0fc-55d8cc26d26a', 'b0295ac1cd55918cde80c0f0b95e7a53.png', 1),
(100, 'bb752ee1-8ff0-4540-b7e8-67544afc4c88', '7264098b6ce4a1f939714c2ea9a2d567.png', 1),
(101, '646a1ae1-35ac-4283-b45c-3e7f3faeb983', '547a251e99cb5a3c1956dd1d46ecb41b.png', 1),
(102, '558c8efb-e56b-46a2-9739-5d5f7f180aab', '181a658fbf36261f06e07a5df1023d4d.png', 1),
(103, 'e70fee92-edea-4b3e-a267-76d71c25f819', 'f274d52dc23b09fb1b074f7a64d9370c.png', 1),
(104, '8641b0be-aee2-4101-bf52-8c8c291a7817', '056e8b4a521767589fd4ebff0193909d.png', 1),
(105, '6c31ace4-589e-4f97-b5b1-8feea12df392', 'f18e5b21192edf062185fea1939f3dbf.png', 1),
(106, 'b02dfab5-1d53-4f9b-b5b7-b02b2b15eac6', '83cd888232a8236e45a98ae158ef8783.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Kepala Kantor'),
(3, 'Kepala Seksi Tusi'),
(4, 'Kepala Seksi Non Tusi'),
(5, 'Account Representative'),
(6, 'Pelaksana'),
(7, 'Kepala Subbag'),
(8, 'Juru Sita'),
(9, 'Bendaharawan'),
(10, 'Sekretaris'),
(11, 'Pemeriksa Pajak Penyedia'),
(12, 'Pemeriksa Pajak Pertama'),
(13, 'Pemeriksa Pajak Madya'),
(14, 'Pemeriksa Pajak Muda'),
(15, 'Pemeriksa Pajak Pelaksana'),
(16, 'Penyuluh Pajak Ahli Muda'),
(17, 'Penyuluh Pajak Ahli Pertama');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_wp`
--

CREATE TABLE `jenis_wp` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_wp`
--

INSERT INTO `jenis_wp` (`id`, `nama`) VALUES
(1, 'OP'),
(2, 'Badan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `kota_id`) VALUES
(1, 'Cimanggis', 1),
(2, 'Tapos', 1),
(3, 'Cilodong', 1),
(4, 'Sukmajaya', 1),
(5, 'Cipayung', 1),
(6, 'Curug', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kecamatan_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kecamatan_id`) VALUES
(1, 'Cisalak Pasar ', 1),
(2, 'Curug ', 1),
(3, 'Harjamukti ', 1),
(4, 'Mekarsari ', 1),
(5, 'Pasir Gunung Selatan ', 1),
(6, 'Tugu', 1),
(7, 'Cilangkap', 2),
(8, 'Cimpaeun', 2),
(9, 'Jatijajar', 2),
(10, 'Leuwinanggung', 2),
(11, 'Sukamaju Baru', 2),
(12, 'Sukatani', 2),
(13, 'Tapos', 2),
(14, 'Cilodong', 3),
(15, 'Jatimulya', 3),
(16, 'Kalibaru', 3),
(17, 'Kalimulya', 3),
(18, 'Sukamaju', 3),
(19, 'Abadijaya ', 4),
(20, 'Bakti Jaya', 4),
(21, 'Cisalak', 4),
(22, 'Mekar Jaya', 4),
(23, 'Sukmajaya', 4),
(24, 'Tirtajaya', 4),
(25, 'Bojong Pondok Terong', 5),
(26, 'Cipayung', 5),
(27, 'Cipayung Jaya', 5),
(28, 'Pondok Jaya', 5),
(29, 'Ratujaya', 5),
(30, 'Binong', 6),
(31, 'Desa Kadu', 6);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `UUID` varchar(255) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `user_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `UUID`, `komentar`, `user_id`) VALUES
(1, '93aee91d-39b7-4b02-8275-d031c26370e0', 'Komen yaa', NULL),
(2, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', 'baik aja', NULL),
(3, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', 'baik ya\r\n', NULL),
(4, 'e0e9b077-5b01-43dd-b8bb-bec8aaa46ff1', 'new', 2),
(5, '3bd6f8eb-aefa-4f6f-b5ac-ae72fa987f57', 'Komen Ya', 28),
(6, '3bd6f8eb-aefa-4f6f-b5ac-ae72fa987f57', 'KOmen pegawai', 2),
(7, '1cdfc36e-51f9-411b-b718-c204fc604fcf', 'ayamnya keras', 29),
(8, '1cdfc36e-51f9-411b-b718-c204fc604fcf', 'ayamnya keras', 29),
(9, '01548c07-7b36-4e08-ab98-d6b66f7e5a0a', '', 29),
(10, '4f651e75-d096-43c8-b570-3ee1bde11325', '', 29),
(11, 'c2dea1b9-1620-4619-b38d-49aac479e8bb', 'karyawannya ramah', 30),
(12, 'c2dea1b9-1620-4619-b38d-49aac479e8bb', 'karyawannya ramah', 30),
(13, 'c2dea1b9-1620-4619-b38d-49aac479e8bb', 'karyawannya ramah', 30),
(14, '93aee91d-39b7-4b02-8275-d031c26370e0', 'mahal tapi bersih tempatnya', 30),
(15, '93aee91d-39b7-4b02-8275-d031c26370e0', '', 30),
(16, '93aee91d-39b7-4b02-8275-d031c26370e0', 'mantapp', 29),
(17, '4f5a6d1a-4004-4364-b0ce-62f2abf02451', 'sangat berpotensi', 29),
(18, 'd6786d2a-2e98-466a-aaa6-2144e546aedb', 'haioke', 30),
(19, 'd6786d2a-2e98-466a-aaa6-2144e546aedb', 'haioke', 30),
(20, '4bba50d4-a618-4a4a-b267-61e5636c1b39', 'enak bat njir parss', 29),
(21, 'e206307d-6666-4a24-bdec-9fd2714e709f', 'apasih', 30),
(22, 'af1d137d-7ebf-4126-9ccd-f7b60ddce01a', 'ok', 29),
(23, 'c6803381-80fd-4754-912e-bf31bc5e903a', 'reva', 30),
(24, 'e4c9a600-5e55-4f84-987a-3c01682da298', 'kuenya enak', 30),
(25, '0e784e9c-7562-4a64-9f1e-5fefaf87d56f', 'mantap saya win', 29),
(26, '464d5276-be0b-43e7-bdf7-1fda56364300', 'mantapp sekaliii pokoknya', 30),
(27, '464d5276-be0b-43e7-bdf7-1fda56364300', 'mantapp sekaliii pokoknya', 30),
(28, 'd46f6861-1a97-435d-8553-285b5303e364', '', 30),
(29, '4f5a6d1a-4004-4364-b0ce-62f2abf02451', '', 29),
(30, '6902612f-9210-426b-821f-f2fc0e427485', 'ramai enak rasanya', 30),
(31, 'a96e9ca6-9ecb-40e7-ae22-ce1ff6868d60', '', 35),
(32, 'cd404396-0d3f-4834-b3d1-9248507a8ee7', 'mantap, kualitas juara', 35),
(33, '61a02d7a-812a-4f5a-a599-f6e0ead825db', 'ramai yaaa, ramah kasirnya cantik juga', 35),
(34, '61a02d7a-812a-4f5a-a599-f6e0ead825db', 'rame ya tokonya', 31),
(35, '61a02d7a-812a-4f5a-a599-f6e0ead825db', 'rame ya tokonya', 31),
(36, '61a02d7a-812a-4f5a-a599-f6e0ead825db', 'rame ya tokonya', 31),
(37, '61a02d7a-812a-4f5a-a599-f6e0ead825db', '', 31),
(38, '61a02d7a-812a-4f5a-a599-f6e0ead825db', '', 31),
(39, '135ca65b-f974-4077-9f81-b0e8aa34f4e5', 'ramai', 31),
(40, '66e8f879-68a8-49da-89ca-8ce92f91cea6', 'enak saladnya', 31),
(41, '66e8f879-68a8-49da-89ca-8ce92f91cea6', 'ramai sekali', 31),
(42, 'bc7bfcdf-4762-4a54-85fe-f8fc70f4d9ce', 'enak risolnya, ramai pengunjung', 31),
(43, '769c15d2-ba72-4c5a-9a48-68c373be034b', '', 35),
(44, '769c15d2-ba72-4c5a-9a48-68c373be034b', '', 35),
(45, '769c15d2-ba72-4c5a-9a48-68c373be034b', '', 35),
(46, '769c15d2-ba72-4c5a-9a48-68c373be034b', '', 35),
(47, '3d24b730-c966-42bb-86de-3914268b8cb3', '', 35),
(48, 'd03c20bb-a3fb-42ee-847a-65460acaaa95', '', 35),
(49, '7a1ff858-b724-4373-aaf6-8e1f3bb97c26', 'bagus banget', 31),
(50, '1d3bd30a-74b6-46f3-ade2-e7847cb02871', 'nyaman', 31),
(51, '7a1ff858-b724-4373-aaf6-8e1f3bb97c26', 'bagus banget', 31),
(52, '0f2cd933-0696-44a8-a327-8ea6d87bbf58', '', 171),
(53, '0f2cd933-0696-44a8-a327-8ea6d87bbf58', '', 171),
(54, '0f2cd933-0696-44a8-a327-8ea6d87bbf58', '', 171),
(55, '0f2cd933-0696-44a8-a327-8ea6d87bbf58', '', 171),
(56, 'dae8233d-dbb6-42ab-946b-af89eeba835d', 'enak ayamnya', 179),
(57, 'f7f5f30a-13eb-4715-aa60-7ca1c3d27074', 'makanannya enak.', 398),
(58, 'f7f5f30a-13eb-4715-aa60-7ca1c3d27074', 'makanannya enak.', 398),
(59, '26df5b3e-9857-4b00-90d3-be0eb724397a', 'enak mienya', 289),
(60, '7ca95167-6f65-40e7-b918-d353d6f9ccc2', 'usaha mulai dirintis', 293),
(61, 'd499b24b-a227-4f48-99f0-b35c09e8e13d', 'bagus', 293),
(62, '8d24ac6c-ce4f-4431-9a45-4f5eeaf911e7', 'kuenya enak sekali. harga terjangkau. pelayanan ramah. tapi antriannya panjang', 293),
(63, 'cc143c6d-ca52-47a0-95e2-8fd77e62e437', 'kuenya enak, pelanggan banyak, harga terjangkau, antrian panjang', 293),
(64, '573673ff-e508-4e3b-87a5-1c8bcb8728a1', 'selalu terisi, kapasitas 3 mbl, harga 33rb mobil, 18rb moge, 15rb motor', 293),
(65, '9ba53ad7-79d7-48ac-8d1d-be972d2fc560', 'cuaik mobil, selalu terisi, kapasitas 3 mbl, hatga: 33rb mobil, 18rb moge, 15rn motor', 293),
(66, '9ba53ad7-79d7-48ac-8d1d-be972d2fc560', 'cuaik mobil, selalu terisi, kapasitas 3 mbl, hatga: 33rb mobil, 18rb moge, 15rn motor', 293),
(67, 'be313b59-b86a-480d-bf99-70a08e6735c9', '', 289),
(68, '55326008-7939-47bb-933f-c53eb0279e75', 'gytr', 293),
(69, 'd28f28ee-cca0-4772-83c0-26f2ece12fba', '', 293),
(70, 'd1d9d78d-f76c-4a75-82a3-fbe9839bc0c6', '', 400),
(71, '7960b890-bce6-47a0-afa4-6c08664d6bf8', 'Foto', 400),
(72, '7960b890-bce6-47a0-afa4-6c08664d6bf8', 'Foto', 400),
(73, '7960b890-bce6-47a0-afa4-6c08664d6bf8', 'Foto', 400),
(74, '41b9e732-d238-40e3-aae9-6f7aa4ad0d80', 'lumayan ramai', 400),
(75, '65e0abd3-ba32-4338-93c6-09a94debbae2', '', 400),
(76, '827091a9-1fb9-4ed9-9db8-0b2dddf524ac', 'usaha lumayan, byk koleksi tanaman yg lg trending', 293),
(77, 'e5aa586f-9fe6-4454-ae2f-403c76304326', 'Nasi Uduk Pecel Lele/Ayam, buka setiap hari mulai sore hingga malam', 401),
(78, '3c7335c9-e83d-4220-acf2-812442c2f510', 'harga terjangkau, sudah ada NPWP, lokasi ramai pinggir jalan lalu lintas ', 403),
(79, '62d3fd15-0c3f-4f08-82f1-756e4bf11ab2', 'lokasi ramai, harga terjangkau', 403),
(80, '0632d284-9763-43c3-8f7a-ffa0d0fe09aa', 'sedang bongkar barang & lokasi usaha sbg pusat, cabangnya bamyak', 368),
(81, '6116f118-9ccf-4a9f-b90a-926566777070', 'Pada saat kunjungan, objek pengamatan berbentuk seperti toko. Terlihat juga orang yang sedang bongkar muat makanan hewan ke dalam mobil box besar untuk pengiriman ke Cinere', 407),
(82, '9f20e395-699f-4bcf-8ae8-fd701c397b33', '', 400),
(83, '6f81f686-0ba7-4674-a1b3-f3c8ae28434b', 'pabrik genteng', 400),
(84, 'd55160d9-9fc0-4019-87b3-bafe8fab9304', 'kondisi ramai pembeli datang dan pergi', 400),
(85, '6ddf4972-ff51-401d-8efc-46ec9c13cedb', 'ada 17 meja@4kursi (non proses), tgk isian pembeli 70%, juga ada yg take away, waktu ganti kunjungan +- 30-60 mnt, jam buka 10AM-09PM, lokasi di jalan yg ramai, 081283933999', 403),
(86, 'a20d74ad-e101-4e2f-9d30-8eb6f540efa9', 'Didalam gedung Graha cana terdapat beberapa merk usaha: Juliet Coffe, VZ Salon, dr Novira F Pateh', 405),
(87, 'a20d74ad-e101-4e2f-9d30-8eb6f540efa9', 'Didalam gedung Graha cana terdapat beberapa merk usaha: Juliet Coffe, VZ Salon, dr Novira F Pateh', 405),
(88, '50859ffb-f837-47e9-9527-85a27f5c558c', 'Jasa bimbingan belajar masuk perguruan tinggi (STAN, kedinasan, kedokteran)', 405),
(89, '50859ffb-f837-47e9-9527-85a27f5c558c', 'Jasa bimbingan belajar masuk perguruan tinggi (STAN, kedinasan, kedokteran)', 405),
(90, '36d6b170-19ba-45fd-b228-88051110d910', '', 359),
(91, '36d6b170-19ba-45fd-b228-88051110d910', '', 359),
(92, '36d6b170-19ba-45fd-b228-88051110d910', '', 359),
(93, '07455aca-c0dd-4764-a2ff-8d963dda3c74', '', 405),
(94, '5cd383fe-3889-4caf-96f3-ce9c73735596', 'Rumah Kosong', 378),
(95, 'ac1cbf18-fbd9-4a9c-9d11-897951f54262', 'potensi perlu pengawasan', 402),
(96, 'ac1cbf18-fbd9-4a9c-9d11-897951f54262', 'potensi perlu pengawasan', 402),
(97, '8c0fd3cd-3b41-48fd-ab2b-8c41c49a05ad', 'Visit tempat kerja', 402),
(98, '31887f7b-8f67-44bb-a2d0-42920d369d52', 'letak SPBU ada di Tambun dan Kuningan Jawa Barat,', 402),
(99, '7f99f737-726b-4b04-8dcf-30c21385127f', 'lokasi masuk gang, menu spesial nasgor nanas, penyajian cepat, harga terjangkau, byk yg beli via online, jg jual sayur dr kebun sendiri (www.kebundidu.com) ', 293),
(100, '91eb5f38-a995-4c83-8a89-d75632ce6143', '-', 373),
(101, 'cdb741b8-4b82-4597-a737-927be826f853', '123', 1),
(102, '6d94bc24-7486-44d3-a13f-713094d59919', '', 1),
(103, '477db4a7-a5ef-46bf-861a-c8ded2c06d46', '', 1),
(104, '7ac0481e-b009-435a-9d3d-025dc1798114', 'h3h3h3h3', 1),
(105, '64a9290d-8ded-4b29-8a85-ead44efd8cb8', '', 1),
(106, 'f2c4730e-0817-48b8-b013-a4e5109e4068', '123', 1),
(107, '3f1191a3-28f8-4083-859e-380df2ccafe7', '', 1),
(108, '7621a4a8-067f-471a-a40f-1a30eba13fb2', 'asd', 1),
(109, '6d3b7c0b-7c48-44f8-af98-b1b5454f1aaa', '', 1),
(110, '5b907f9c-a28f-49af-bd21-3aa6fe3a1403', '', 1),
(111, '8646df5a-f8b5-4c1c-9598-6f969440019b', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `provinsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `provinsi_id`) VALUES
(1, 'Depok', 1),
(2, 'Tangerang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `npwpl`
--

CREATE TABLE `npwpl` (
  `id` int(11) NOT NULL,
  `npwpl` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `npwpl`
--

INSERT INTO `npwpl` (`id`, `npwpl`, `nama`) VALUES
(1, '80.233.255.1-412.000', 'PT. KUMBANG BUANA SAKTI'),
(2, '66.904.713.6-412.000', 'PT. MITRA PRIMA ANDITA'),
(3, '31.816.481.1-412.000', 'PT. LAWU CAKRA SARANA'),
(4, '92.147.698.2-412.000', 'PT. FAJAR JAYA CHASY'),
(5, '31.609.582.7-412.000', 'CV. VAN\'S FOOD'),
(6, '82.642.115.8-412.000', 'PT. TRUBUS DIGITAL INDONESIA');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
(1, 'Jawa Barat'),
(2, 'Banten');

-- --------------------------------------------------------

--
-- Table structure for table `reff_sp2dk`
--

CREATE TABLE `reff_sp2dk` (
  `id` int(11) NOT NULL,
  `npwpl_id` int(11) NOT NULL,
  `nomor_lhpt` varchar(255) NOT NULL,
  `tanggal_lhpt` date NOT NULL,
  `nomor_sp2dk` varchar(255) NOT NULL,
  `tanggal_sp2dk` date NOT NULL,
  `tahun_pajak_sp2dk` year(4) NOT NULL,
  `estimasi_potensi_awal_sp2dk` bigint(20) NOT NULL,
  `nomor_lhp2dk` varchar(255) NOT NULL,
  `tanggal_lhp2dk` date NOT NULL,
  `keputusan_lhp2dk` varchar(255) NOT NULL,
  `kesimpulan_lhp2dk` varchar(255) NOT NULL,
  `estimasi_potensi_lhp2dk` int(11) NOT NULL,
  `realisasi_lhp2dk` int(11) NOT NULL,
  `nomor_dspp` varchar(255) NOT NULL,
  `tanggal_dspp` date NOT NULL,
  `nomor_np2` varchar(255) NOT NULL,
  `tanggal_np2` date NOT NULL,
  `nomor_sp2` varchar(255) NOT NULL,
  `tanggal_sp2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reff_sp2dk`
--

INSERT INTO `reff_sp2dk` (`id`, `npwpl_id`, `nomor_lhpt`, `tanggal_lhpt`, `nomor_sp2dk`, `tanggal_sp2dk`, `tahun_pajak_sp2dk`, `estimasi_potensi_awal_sp2dk`, `nomor_lhp2dk`, `tanggal_lhp2dk`, `keputusan_lhp2dk`, `kesimpulan_lhp2dk`, `estimasi_potensi_lhp2dk`, `realisasi_lhp2dk`, `nomor_dspp`, `tanggal_dspp`, `nomor_np2`, `tanggal_np2`, `nomor_sp2`, `tanggal_sp2`) VALUES
(3, 1, 'LHPT-2/WPJ.33/KP.0606/2021', '2021-01-06', 'SP2DK-6/WPJ.33/KP.06/2021', '2021-01-06', 2020, 18772, 'LHP2DK-158/WPJ.33/KP.0606/2021', '2021-04-01', 'Seluruh data diakui Wajib Pajak', 'Dalam Pengawasan', 18766, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(6, 3, 'LHPT-1/WPJ.33/KP.0606/2021', '2021-01-06', 'SP2DK-5/WPJ.33/KP.06/2021', '2021-01-06', 2020, 95306, '', '0000-00-00', '', '', 0, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(17, 4, 'LHPT-4/WPJ.33/KP.0606/2021', '2021-01-06', 'SP2DK-8/WPJ.33/KP.06/2021', '2021-01-06', 2020, 1248, 'LHP2DK-6/WPJ.33/KP.0606/2021', '2021-01-14', 'Seluruh data diakui Wajib Pajak', 'Dalam Pengawasan', 5772, 5772, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(19, 2, 'LHPT-6/WPJ.33/KP.0606/2021', '2021-01-07', 'SP2DK-56/WPJ.33/KP.06/2021', '2021-01-07', 2016, 11000, 'LHP2DK-53/WPJ.33/KP.0606/2021', '2021-01-29', 'Seluruh data diakui Wajib Pajak', 'Dalam Pengawasan', 11000, 11390, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(20, 2, 'LHPT-7/WPJ.33/KP.0606/2021', '2021-01-08', 'SP2DK-120/WPJ.33/KP.06/2021', '2021-01-08', 2016, 4900, 'LHP2DK-52/WPJ.33/KP.0606/2021', '2021-01-29', 'Seluruh data diakui Wajib Pajak', 'Dalam Pengawasan', 4900, 4910, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(21, 5, 'LHPT-8/WPJ.33/KP.0606/2021', '2021-01-12', 'SP2DK-176/WPJ.33/KP.06/2021', '2021-01-12', 2020, 250, '', '0000-00-00', '', '', 0, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(22, 5, 'LHPT-11/WPJ.33/KP.0606/2021', '2021-01-12', 'SP2DK-182/WPJ.33/KP.06/2021', '2021-01-12', 2020, 250, '', '0000-00-00', '', '', 0, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(23, 6, 'LHPT-12/WPJ.33/KP.0606/2021', '2021-01-12', 'SP2DK-185/WPJ.33/KP.06/2021', '2021-01-12', 2020, 300, '', '0000-00-00', '', '', 0, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
(25, 2, 'LHPT-5/WPJ.33/KP.0606/2021', '2021-01-06', 'SP2DK-9/WPJ.33/KP.06/2021', '2021-01-06', 2016, 21000, 'LHP2DK-48/WPJ.33/KP.0606/2021', '2021-01-27', 'Seluruh data diakui Wajib Pajak', 'Dalam Pengawasan', 21000, 21923, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_penugasan`
--

CREATE TABLE `rekam_penugasan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_mulai_tugas` date NOT NULL,
  `tgl_akhir_tugas` date NOT NULL,
  `no_st` varchar(30) DEFAULT NULL,
  `ref_ip` varchar(20) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_penugasan`
--

INSERT INTO `rekam_penugasan` (`id`, `tanggal`, `tgl_mulai_tugas`, `tgl_akhir_tugas`, `no_st`, `ref_ip`, `lokasi`) VALUES
(1, '2021-07-28', '2022-08-02', '2022-08-06', 'ST-275/WP.33/KKP.06/2021', '060080922', 'cisalak pasar'),
(2, '2021-08-05', '2021-08-15', '2021-08-17', 'UND-13/WPJ.33/KP.06/2021', '830290619', 'Tapos'),
(4, '2021-08-06', '2021-08-15', '2021-08-10', 'ST-276/WP.33/KKP.06/2021', '060090052', 'Tugu'),
(5, '2021-08-06', '2021-08-08', '2021-08-10', 'ST-276/WP.33/KKP.06/2021', '060101506', 'Tugu'),
(7, '2021-08-09', '2021-08-24', '2021-08-26', 'ST-278/WP.33/KKP.06/2021', '060101506', 'Pamulang'),
(8, '2021-08-20', '2021-08-21', '2021-08-25', 'ST-281/WP.37/KKP.09/2021', '141179169', 'Kedaung'),
(9, '2021-07-28', '2022-08-02', '2022-08-06', 'ST-275/WP.33/KKP.06/2022', '060082740', 'tugu');

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE `seksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`id`, `nama`, `tipe`) VALUES
(1, 'Seksi Pengawasan dan Konsultasi III', 'SOP'),
(2, 'Seksi Pengawasan dan Konsultasi IV', 'SOP'),
(3, 'Seksi Ekstensifikasi dan Penyuluhan', 'SOP'),
(4, 'Seksi Pengawasan dan Konsultasi I', 'Non SOP'),
(5, 'Seksi Pengawasan dan Konsultasi II', 'Non SOP'),
(6, 'Seksi Penagihan', 'Non SOP'),
(7, 'Seksi Pemeriksaan', 'Non SOP'),
(8, 'Seksi Pelayanan', 'Non SOP'),
(9, 'Seksi Pengolahan Data dan Informasi', 'Non SOP'),
(10, 'Subbagian Umum dan Kepatuhan Internal', 'Non SOP'),
(11, 'Fungsional Pemeriksa', 'NON SOP'),
(12, 'Pemeriksa Pajak', 'NON SOP'),
(13, 'KPP Pratama', 'NON SOP');

-- --------------------------------------------------------

--
-- Table structure for table `status_fungsi`
--

CREATE TABLE `status_fungsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_fungsi`
--

INSERT INTO `status_fungsi` (`id`, `nama`) VALUES
(1, 'Fungsional Pemeriksa Pajak'),
(2, 'Fungsional Penyuluh Pajak'),
(3, 'Pengawasan'),
(4, 'Pelayanan'),
(5, 'Pemeriksaan'),
(6, 'Penagihan'),
(7, 'PKD'),
(8, 'SDM - Kepatuhan Internal'),
(9, 'Kepala Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `status_role`
--

CREATE TABLE `status_role` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_role`
--

INSERT INTO `status_role` (`id`, `nama_status`) VALUES
(1, 'Tusi'),
(2, 'Non Tusi');

-- --------------------------------------------------------

--
-- Table structure for table `status_wp`
--

CREATE TABLE `status_wp` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_wp`
--

INSERT INTO `status_wp` (`id`, `nama`) VALUES
(1, 'Normal'),
(2, 'Non Efektif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `seksi_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `handphone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `password_default` int(1) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `status_role` int(1) NOT NULL,
  `fungsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ip`, `nip`, `nama`, `jabatan_id`, `seksi_id`, `kecamatan_id`, `kelurahan_id`, `handphone`, `email`, `password`, `password_default`, `level`, `status_role`, `fungsi_id`) VALUES
(1, '1', '111111', 'Admin', 1, NULL, 4, 22, '021021021', NULL, '21232f297a57a5a743894a0e4a801fc3', 0, '1', 0, 0),
(284, '060090052', '19690808 199603 1 001', 'SONNY AGUSTINUS', 2, 13, NULL, NULL, '08111208808', '060090052@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '2', 2, 9),
(287, '060084422', '19731129 199403 1 002', 'MUHAMMAD ROIS', 4, 6, 0, 0, '+62 838-9951-12', '060084422@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 6),
(288, '060101506', '19800325 200112 1 001', 'MUHAMAD ALI', 4, 4, NULL, NULL, '+62 822-9775-97', '060101506@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 3),
(289, '060094546', '19690502 199803 1 002', 'MURYANTO', 4, 5, 3, 15, '+62 813-8129-14', '060094546@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 3),
(290, '060088238', '19751111 199511 1 001', 'IRFAN ANDREA IRAWAN', 4, 1, 0, 0, '+62 812-1467-55', '060088238@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 3),
(292, '060104735', '19780923 200212 2 001', 'ANDINI NURAINI', 4, 7, NULL, NULL, '+62 816-1183-17', '060104735@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 5),
(293, '060080922', '19710902 199201 1 001', 'ARY FESTANTO', 3, 3, 1, 1, '08111020907', 'ary.festanto@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '3', 1, 3),
(295, '010196294', '19650316 198603 1 001', 'NARA HENDRA', 6, 9, NULL, NULL, '081388188530', '010196294@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(296, '060097014', '19680703 199903 1 002', 'EDI TARMUJI', 6, 9, NULL, NULL, '081388188530', '060097014@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(297, '131454442', '19620825 198503 1 003', 'SUPARMIN', 6, 9, NULL, NULL, '081388188530', '131454442@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 0),
(298, '830290619', '19900319 201502 2 004', 'RIRIN KHAIRANI', 6, 9, NULL, NULL, '081388188530', '830290619@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(299, '060085815', '19661221 199403 1 002', 'MARJOHAN', 6, 3, NULL, NULL, '081388188530', '060085815@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 3),
(300, '910223127', '19941014 201502 1 001', 'SIDIQ NUR HUDA', 6, 9, NULL, NULL, '081388188530', '910223127@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(301, '958633378', '19980810 201812 2 001', 'SUPRAPTI', 6, 9, NULL, NULL, '081388188530', '958633378@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(302, '060085159', '19690312 199403 2 001', 'NUNUN D.A. HANDAYANI', 6, 8, NULL, NULL, '081388188524', '060085159@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(303, '801280747', '19851004 200901 1 004', 'FRANSISKUS SIMORANGKIR', 6, 8, NULL, NULL, '081388188524', '801280747@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(304, '060084840', '19641125 199403 1 001', 'DARMADJI', 6, 8, NULL, NULL, '081388188524', '060084840@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(305, '060093751', '19780114 199803 1 001', 'YANUAR ARIFIN', 6, 8, NULL, NULL, '081388188524', '060093751@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(306, '070022255', '19630827 198411 1 001', 'SUKARTA', 6, 8, NULL, NULL, '081388188524', '070022255@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(307, '060085383', '19690908 199403 1 002', 'SUGENG PURWANTO', 6, 8, NULL, NULL, '081388188524', '060085383@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(308, '060109951', '19810204 200501 2 001', 'FEDERIKA COENELIA PATTIPEILOHY', 6, 8, NULL, NULL, '081388188524', '060109951@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(309, '131762865', '19650303 198803 1 002', 'A. ROHIM', 6, 8, NULL, NULL, '081388188524', '131762865@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(310, '830203681', '19911021 201411 1 001', 'YOGA PRATAMA WICAKSONO', 6, 8, NULL, NULL, '081388188524', '830203681@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(311, '815100131', '19970216 201612 1 002', 'WIN RAYMOND SINAMBELA', 6, 8, NULL, NULL, '081388188524', '815100131@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(312, '958632222', '19991212 201812 2 001', 'INAYAH QEIZ', 6, 8, NULL, NULL, '081388188524', '958632222@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(313, '958632281', '19991017 201812 2 003', 'ISNANI UMI FATONAH', 6, 8, NULL, NULL, '081388188524', '958632281@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(314, '958632286', '19990728 201812 1 003', 'IVAN HAMDANI', 6, 8, NULL, NULL, '081388188524', '958632286@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(315, '958632766', '19990503 201812 2 004', 'NADIAH ISMAHSARI', 6, 8, NULL, NULL, '081388188524', '958632766@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(316, '830203229', '19920320 201411 2 002', 'ERITA NUZUL NUR ADRIANI', 6, 6, NULL, NULL, '081388188530', '830203229@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 0),
(317, '910222722', '19950811 201502 2 003', 'MIMI AGUSTANIA', 6, 6, NULL, NULL, '081388188530', '910222722@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 6),
(318, '817932363', '19980725 201801 1 005', 'FANNY YULIAN DEWANTARA', 6, 4, NULL, NULL, '081388188526', '817932363@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 3),
(319, '815100076', '19970227 201612 2 002', 'MASHIVA YASONDA SYAVALINA', 6, 5, NULL, NULL, '081388188527', '815100076@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 3),
(320, '958634227', '19990901 201912 2 003', 'KARTIKA AJENG PERMATASARI', 6, 1, NULL, NULL, '081388188528', '958634227@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 3),
(321, '060085801', '19740905 199403 2 001', 'NURHAYATI', 6, 10, NULL, NULL, '081388188530', '060085801@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(322, '810460379', '19880607 200912 2 005', 'VEGA FANIRIANTI', 6, 10, NULL, NULL, '081388188530', '810460379@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(323, '060109849', '19710723 200501 1 001', 'HANDRI PRISETYO BUDI', 6, 10, NULL, NULL, '081388188530', '060109849@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 0),
(324, '813300098', '19940216 201612 2 001', 'AYU PRISKA AMELIA', 6, 10, NULL, NULL, '081388188530', '813300098@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(325, '817931072', '19950401 201801 1 003', 'LAUDI KURNIAWAN', 6, 10, NULL, NULL, '081388188530', '817931072@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(326, '810201733', '19920428 201310 1 004', 'BELADIKA PANDU APRILIAN SYAH', 6, 10, NULL, NULL, '081388188530', '810201733@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 0),
(327, '910222494', '19950708 201502 1 001', 'JAFAR NUR ILZAMI', 6, 10, NULL, NULL, '081388188530', '910222494@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(328, '910222882', '19950710 201502 1 002', 'ARIEF DJUNAEDI', 6, 10, NULL, NULL, '081388188530', '910222882@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(329, '817933338', '19980519 201801 2 003', 'ZHALSHA PUTRI NURAZIZAH', 6, 10, 0, 0, '081388188530', '817933338@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(330, '958634193', '20000516 201912 2 002', 'RAHMAVITA ALIVIA MAHARANI', 6, 3, NULL, NULL, '081388188530', '958634193@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 3),
(331, '060085136', '19681130 199403 1 002', 'TATANG RUSTANJAYA', 6, 7, NULL, NULL, '081388188530', '060085136@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 5),
(332, '817932404', '19980721 201801 1 003', 'KEVIN JULIAN PUTRA', 6, 7, NULL, NULL, '081388188530', '817932404@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 5),
(333, '817932981', '19980729 201801 2 002', 'WANDA MULYANA', 6, 7, NULL, NULL, '081388188530', '817932981@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 5),
(334, '060085812', '19720115 199403 2 002', 'DINA SOPIANI', 6, 3, NULL, NULL, '081388188530', '060085812@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 3),
(335, '830103013', '19900930 201502 1 003', 'HAPIZ SAKTI AZI', 6, 9, NULL, NULL, '081388188530', '830103013@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(336, '830290677', '19900922 201502 2 002', 'PUTRI RIZKI AMALIA', 6, 10, NULL, NULL, '081388188530', '830290677@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 8),
(337, '910222807', '19941114 201502 1 001', 'HARIS RIFQI ROZANI', 6, 9, NULL, NULL, '081388188530', '910222807@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 7),
(341, '060112747', '19870302 200602 2 001', 'SILVIA RAHMA PUTRI', 5, 4, 0, 0, '081388188526', '060112747@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 2, 3),
(343, '956820036', '19860219 200812 2 003', 'MARDIYANA', 5, 4, 0, 0, '081388188526', '956820036@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 2, 3),
(346, '060098591', '19790305 200001 1 001', 'TAFSIR MA`RUP', 5, 5, 0, 0, '081388188527', '060098591@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(347, '060100179', '19790527 200012 2 001', 'LISA WAHYU HAPSARI PURWANDANI', 5, 5, 0, 0, '081388188527', '060100179@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(348, '835010329', '19830125 200901 1 006', 'FAJAR ARY NUGROHO', 5, 5, 0, 0, '081388188527', '835010329@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(350, '930102249', '19871107 201402 1 003', 'ANDI FAUZI', 5, 5, 0, 0, '081388188527', '930102249@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(353, '060082300', '19710403 199301 2 001', 'SUPARTINAH', 5, 1, 4, 24, '081388188528', '060082300@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(354, '060096318', '19760929 199903 2 001', 'TITIK SUNARTI', 5, 1, 4, 19, '081388188528', '060096318@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(355, '060081979', '19721029 199212 2 001', 'YAYAH QODARIYAH', 5, 1, 5, 27, '081388188528', '060081979@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(356, '060084271', '19741024 199402 2 001', 'KAMALIA', 5, 1, 4, 20, '081388188528', '060084271@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(357, '060093643', '19730613 199803 2 001', 'ERNI NURDIANA', 5, 1, 4, 21, '081388188528', '060093643@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(358, '060096547', '19790508 199903 2 001', 'EUIS PURNAMA SARI', 5, 1, 5, 29, '081388188528', '060096547@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(359, '802650038', '19830813 200901 2 010', 'ARNA KUSUMAWATI', 5, 1, 5, 28, '081388188528', '802650038@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(360, '922209788', '19850415 201012 2 002', 'MEGA ISNAINI NAULI', 5, 1, 5, 25, '081388188528', '922209788@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(361, '060093765', '19780622 199803 2 001', 'SRI UTAMI', 5, 1, 5, 26, '081388188528', '060093765@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(364, '060083801', '19730802 199402 1 001', 'MEMET', 5, 2, 2, 9, '081388188529', '060083801@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(365, '060087567', '19751014 199511 2 001', 'DAMAR ANDARUWATI', 5, 2, 3, 16, '081388188529', '060087567@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(366, '060088036', '19750208 199511 2 001', 'WATRYANA', 5, 2, 3, 18, '081388188529', '060088036@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(367, '060088148', '19741225 199511 2 001', 'NATALINDA SIAHAAN', 5, 2, 2, 8, '081388188529', '060088148@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(368, '060082107', '19720316 199212 2 001', 'ENUR NURNANINGSIH', 5, 2, 3, 17, '081388188529', '060082107@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(369, '060083689', '19740407 199402 2 001', 'IDA ROSYIDA', 5, 5, 2, 8, '081388188529', '060083689@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(370, '060085398', '19711125 199403 2 001', 'EMI HERTATI', 5, 2, 2, 13, '081388188529', '060085398@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(372, '060098299', '19780212 200001 2 001', 'ELLYA ROSA', 5, 2, 2, 11, '081388188529', '060098299@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(373, '863030412', '19830610 200901 2 007', 'MARIA JUTENSA TRIADE', 5, 2, 2, 12, '081388188529', '863030412@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(377, '060088224', '19740402 199511 1 001', 'ARIF FIANTO', 5, 3, 1, 1, '+62 812-9446-35', '060088224@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(378, '060103291', '19790515 200212 1 001', 'ABDUL RAHMAT', 5, 3, 1, 3, '+62 895-0427-61', '060103291@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(381, '060103324', '19820715 200212 1 003', 'AGUNG ISMAS RACHMADI', 8, 6, NULL, NULL, '081388188530', '060103324@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 6),
(382, '952770602', '19870401 200812 1 002', 'ARISTA AULIA MARRUS', 8, 6, NULL, NULL, '081388188530', '952770602@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 6),
(384, '060106762', '19841222 200312 1 008', 'SUSENO DWI NARENDRA', 9, 10, NULL, NULL, '081388188530', '060106762@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 8),
(385, '740002912', '19670626 198803 1 002', 'YUNIAR TRININGRAT', 13, 12, NULL, NULL, '081388188530', '740002912@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(386, '060088307', '19731124 199512 2 001', 'DINA NOVIANTI', 13, 12, NULL, NULL, '081388188530', '060088307@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(387, '070024354', '19670426 198803 1 008', 'SUPRIHARTONO', 13, 12, NULL, NULL, '081388188530', '070024354@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(388, '060096133', '19770114 199903 2 002', 'RENNY MARGIYATI', NULL, 12, NULL, NULL, '081388188530', '060096133@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, NULL, 2, 1),
(389, '060083798', '19740218 199402 1 002', 'ANTONIUS FEBRIANT HUTABARAT', 14, 12, NULL, NULL, '081388188530', '060083798@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(390, '060102695', '19810131 200212 2 005', 'YULIANAH TANDUN', 14, 12, NULL, NULL, '081388188530', '060102695@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(391, '060112987', '19841102 200602 1 001', 'SEMBERGO LINARDO', 12, 12, NULL, NULL, '081388188530', '060112987@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(392, '830004874', '19880604 201012 1 001', 'UNTUNG MANULLANG', 12, 12, NULL, NULL, '081388188530', '830004874@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(393, '930102372', '19880804 201402 2 002', 'CHRISTINA DRU PADI', 12, 12, NULL, NULL, '081388188530', '930102372@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(394, '830602852', '19900918 201411 2 001', 'ULFA SARTIKA', 15, 12, NULL, NULL, '081388188530', '830602852@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(395, '813300169', '19951006 201612 2 002', 'DWIRA MESEK OKTAFIANI SINAGA', 15, 12, NULL, NULL, '081388188530', '813300169@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(396, '830602586', '19920525 201411 1 001', 'MEDY PRABOWO', 15, 12, NULL, NULL, '081388188530', '830602586@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(397, '830602881', '19920510 201411 1 003', 'YOBEL BRILLYAND BUDI PRADANA', 15, 12, NULL, NULL, '081388188530', '830602881@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 1),
(400, '808320239', '19890701 201210 1 001', 'RACHMAD ANDRIYAN NUGROHO', 5, 3, 1, 4, '081347870470', 'rachmad.andriyannugroho@pajak.', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(401, '060109689', '19850222 200412 1 002', 'NANDA FERDIYAN', 5, 3, 1, 2, '+6289637031802', 'nanda.ferdiyan@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(402, '060097604', '19690608 199903 1 001', 'TAUFIK HIDAYAT', 5, 3, 1, 6, '+6281287008337', '060097604@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(404, '060087262', '19700324 199503 2 001', 'SAFITRI RAHMANIA', 5, 1, 4, 23, '081287507250', '060087262@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(405, '930602063', '19891211 201402 1 007', 'WINDY SOFYAN', 5, 1, 4, 22, '081222286248', '930602063@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(406, '908200676', '19860421 201012 2 004', 'KARTINI', 5, 1, 4, 22, '0818822145', '908200676', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(407, '060100837', '19780126 200012 1 002', 'OSCAR NEGARA AL ATAS', 5, 2, 3, 14, '081932191447', '060100837@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(408, '871630097', '19831121 200901 2 004', 'NEKLES ANNA SIBUEA', 5, 2, 2, 7, '082225453734', '871630097@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(409, '846431069', '19820121 200901 2 007', 'DEWI SETYORINI', 5, 5, 0, 0, '087785470913', '846431069@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(410, '918117871', '19850420 201012 1 007', 'AGUS BUDIYONO', 5, 5, 0, 0, '081275996745', '918117871@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(411, '060096256', '19780102 199903 2 001', 'FARIDA ROSIDA', 5, 5, 0, 0, '085882267529', '060096256@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(412, '060077725', '19680608 198903 2 009', 'NUR ENDAH RETNANING ERNAWATI', 3, 2, 0, 0, '08158738911', 'nur.ernawati@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '3', 1, 3),
(413, '060114554', '19851010 200701 1 001', 'RAHMAD MUDJIANTO', 5, 5, 0, 0, '08569983040', '060114554@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(414, '060112241', '19870111 200602 1 001', 'ISTITO SETYAWAN', 5, 3, 1, 5, '081212064412', 'istito.setiawan@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(415, '060100837', '19780126 200012 1 002', 'OSCAR NEGARA AL ATAS', 5, 2, 3, 15, '081932191447', '060100837@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(416, '060088148', '19741225 199511 2 001', 'NATALINDA SIAHAAN', 5, 2, 2, 10, '081388188529', '060088148@pajak.go.id', 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(421, '060082106', '19710509 199212 2 001', 'MYRNAWATY TIYASWORO', 16, 12, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 2),
(422, '060105174', '19820725 200312 1 002', 'AKHMAD FAISAL FITRIH', 17, 12, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 2),
(423, '930101965', '19920126 201402 2 005', 'CHICHI HIDAYAT', 17, 12, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 2),
(424, '060078376', '19690610 198912 2 001', 'EVANITA WIDYA SHANTI', 5, 3, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '5', 1, 3),
(425, '060090243', '19700523 199603 1 002', 'JUNUS SULISTYAWAN', 4, 8, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 4),
(426, '060085616', '19720303 199403 2 002', 'ENUNG NURHAYATI', 6, 8, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(427, '131761257', '19650329 198803 1 001', 'SUMONO', 6, 8, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 4),
(428, '813300852', '19950916 201612 2 002', 'INGGIS GALIH WARNI', 6, 6, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '6', 2, 6),
(429, '060082740', '19631118 199303 1 002', 'SANUSI', 4, 9, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '4', 2, 7),
(430, '820340470', '19930405 201502 1 001', 'ARIF RIYADI', 10, 10, NULL, NULL, NULL, NULL, 'dcdfed53bdb73ceb4931d10829e4eae2', 1, '7', 2, 8),
(431, '141179169', '141179169', 'Test Android', 5, 12, 3, 18, '12345678910', 'dummyaccount@hacker.com', '992baf4879618dbfb66e5786ebb3a923', 0, '5', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `kelurahan_id`, `rw`, `ip`) VALUES
(360, 7, 'SELURUHNYA', '871630097'),
(361, 8, 'SELURUHNYA', '956820036'),
(362, 9, 'SELURUHNYA', '060083801'),
(363, 10, 'SELURUHNYA', '060103291'),
(364, 11, 'SELURUHNYA', '060098299'),
(365, 12, '011 - 025', '863030412'),
(366, 13, 'SELURUHNYA', '060088148'),
(367, 19, 'SELURUHNYA', '060081979'),
(368, 20, 'SELURUHNYA', '918117871'),
(369, 21, 'SELURUHNYA', '060093643'),
(370, 22, '001 - 013, 024 - 026, 030', '930602063'),
(371, 22, '000, 014 - 023, 027 - 029, 031', '908200676'),
(372, 23, 'SELURUHNYA', '060087262'),
(373, 24, 'SELURUHNYA', '922209788'),
(374, 25, 'SELURUHNYA', '060109689'),
(375, 26, 'SELURUHNYA', '060088224'),
(376, 27, 'SELURUHNYA', '060088224'),
(377, 28, 'SELURUHNYA', '060109689'),
(378, 29, 'SELURUHNYA', '060088224'),
(379, 1, '003, 004, 005, 006, 007', '060085398'),
(380, 1, '000, 001, 002, 008, 009, 010, 011, 012, 013, 014, 015, 018, 021', '060084271'),
(381, 2, '001, 002, 004, 008, 010', '801280747'),
(382, 2, '000, 003, 005, 006, 007, 009, 011, 012, 013, 014, 016, 017, 018, 022, 024, 026', '060082300'),
(383, 3, '000, 001, 002, 003, 004, 007, 008, 010, 013, 014', '060096256'),
(384, 3, '005, 009, 012, 015, 016', '060097604'),
(385, 4, '003, 007, 008, 013, 017, 018, 019, 020, 021', '060112747'),
(386, 4, '000, 009, 010, 011, 014, 015, 022', '060096547'),
(387, 5, '002, 003, 004, 006, 008, 009, 013, 014', '060096318'),
(388, 5, '000, 001, 005, 007, 010, 011, 012, 015, 016', '060112241'),
(389, 6, '000, 001, 002, 003, 004, 005, 006, 015', '802650038'),
(390, 6, '007, 008, 012, 013, 014, 016', '808320239'),
(391, 6, '009, 010, 011, 017, 018, 019', '060093765'),
(392, 14, 'SELURUHNYA', '060100837'),
(393, 15, 'SELURUHNYA', '060100837'),
(394, 16, 'SELURUHNYA', '060087567'),
(395, 17, 'SELURUHNYA', '060082107'),
(396, 18, '016 - 030', '060083689'),
(397, 18, '001 - 015', '060088036');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alasan_verifikasi`
--
ALTER TABLE `alasan_verifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capture_data`
--
ALTER TABLE `capture_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_perorangan`
--
ALTER TABLE `data_perorangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_wp`
--
ALTER TABLE `data_wp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_wp`
--
ALTER TABLE `jenis_wp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `npwpl`
--
ALTER TABLE `npwpl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reff_sp2dk`
--
ALTER TABLE `reff_sp2dk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_penugasan`
--
ALTER TABLE `rekam_penugasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_fungsi`
--
ALTER TABLE `status_fungsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_role`
--
ALTER TABLE `status_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_wp`
--
ALTER TABLE `status_wp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `seksi_id` (`seksi_id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alasan_verifikasi`
--
ALTER TABLE `alasan_verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `capture_data`
--
ALTER TABLE `capture_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `data_perorangan`
--
ALTER TABLE `data_perorangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_wp`
--
ALTER TABLE `data_wp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `npwpl`
--
ALTER TABLE `npwpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reff_sp2dk`
--
ALTER TABLE `reff_sp2dk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rekam_penugasan`
--
ALTER TABLE `rekam_penugasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status_fungsi`
--
ALTER TABLE `status_fungsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_role`
--
ALTER TABLE `status_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;