-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 02:20 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bau`
--

-- --------------------------------------------------------

--
-- Table structure for table `kode_hal`
--

CREATE TABLE IF NOT EXISTS `kode_hal` (
  `kode` varchar(2) NOT NULL,
  `hal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_hal`
--

INSERT INTO `kode_hal` (`kode`, `hal`) VALUES
('AD', 'Akreditasi'),
('AK', 'Akademik'),
('BW', 'Beasiswa'),
('DL', 'Dinas Luar / Perjalanan Dinas'),
('EP', 'Evaluasi Pendidikan'),
('HK', 'Hukum'),
('HM', 'Hubungan Masyarakat'),
('IL', 'Penyetaraan Ijazah Luar Negeri'),
('KL', 'Kelembagaan'),
('KM', 'Kemahasiswaan'),
('KP', 'Kepegawaian'),
('KS', 'Kerja Sama'),
('KU', 'Keuangan'),
('LT', 'Penelitian'),
('MI', 'Media Informasi'),
('PB', 'Publikasi Ilmiah'),
('PG', 'Pengembangan'),
('PI', 'Perizinan'),
('PL', 'Praktik Lahan'),
('PM', 'Pengabdian kepada Masyarakat'),
('PR', 'Perencanaa'),
('PS', 'Perpustakaan'),
('PT', 'Pendidikan dan Pelatihan'),
('PW', 'Pengawasan'),
('RT', 'Kerumah Tanggaan'),
('SI', 'Sistem Informasi'),
('SP', 'Sarana Pendidikan / Sarana Prasarana'),
('TU', 'Ketatausahaan');

-- --------------------------------------------------------

--
-- Table structure for table `kode_jabatan`
--

CREATE TABLE IF NOT EXISTS `kode_jabatan` (
  `kode` varchar(8) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_jabatan`
--

INSERT INTO `kode_jabatan` (`kode`, `jabatan`) VALUES
('PLK', 'Direktur'),
('PLK..06', 'Ka. Bag. Umum dan Keuangan'),
('PLK.01', 'Wakil Direktur I'),
('PLK.02', 'Wakil Direktur II'),
('PLK.03', 'Wakil Direktur III'),
('PLK.04', 'Ka.LPMI'),
('PLK.05', 'Ka. Bag. Akademik dan Kemahasiswaan'),
('PLK.07', 'Ka. Jurusan Kesehatan'),
('PLK.08', 'Ka. Jurusan Bisnis'),
('PLK.09', 'Ka. Pusat Penelitian & Pengabdian Masyarakat'),
('PLK.10', 'Ka. UPT Laboratorium'),
('PLK.11', 'Ka. UPT Perpustakaan'),
('PLK.12', 'Ka. Unit Satuan Pengawasan Internal'),
('PLK.13', 'Pengadaan Barang dan Jasa'),
('PLK.14', 'Senat Politeknik Kudus');

-- --------------------------------------------------------

--
-- Table structure for table `rekapitulasi`
--

CREATE TABLE IF NOT EXISTS `rekapitulasi` (
`id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `tujuan_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `jabatan_tujuan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `jabatan` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`id`, `nomor_surat`, `lampiran`, `tujuan_surat`, `tgl_surat`, `tahun`, `perihal`, `jabatan_tujuan`, `alamat`, `isi`, `jabatan`, `nama`) VALUES
(1, '0001/PLK/AD/IV/2021', '1 lembar', 'CYNTIA RATNA SARI, S.Gz., M.Gizi.', '2021-04-08', '2021', 'rapat', 'Dosen Prodi D3 Kebidanan Politeknik Kudus', 'Kudus', '<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Diberitahukan dengan hormat, bahwa berdassarkan Kalender Akademik TA. 2020/2021 mahasiswa tingkat II program studi D3 Kebidanan Politeknik Kudus akan menyelenggarakan uji coba PBT.</span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Sehubungan hal tersebut mohon kesediaan saudara untuk membuat soal dengan ketentuan sebagai berikut :</span></span></p>\r\n\r\n<p style="margin-left:40px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1. Mata ujian</span></span></p>\r\n\r\n<p style="margin-left:120px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">-remaja</span></span></p>\r\n\r\n<p style="margin-left:40px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2. Bentuk soal </span></span></p>\r\n\r\n<p style="margin-left:80px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">-MCQ 20 Item dengan option 5(A,BC,D,E) dalam bentuk bignett.</span></span></p>\r\n\r\n<p style="margin-left:80px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">- disertakan kunci jawaban di lembar terpisah</span></span></p>\r\n\r\n<p style="margin-left:40px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3. soal diserahkan ke Ka. Prodi D3 Kebidanan IBU Etni Astuti, S.Si.T.,M.Keb. melalui alamat email <a href="mailto:etniast51@gmail.com" style="color:#0563c1; text-decoration:underline">etniast51@gmail.com</a> paling lambat tanggal 19 Februari 2021.</span></span></p>\r\n\r\n<p style="margin-left:40px"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4. Ketentuan pembuatan soal dan&nbsp; kisi-kisi soal uji tahap PBT terlampir.</span></span></p>\r\n\r\n<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Demikian atas perhatiannya diucapkan terima kasih.</span></span></p>\r\n', 'Ka. Bag. Umum dan Keuangan', 'ZUMIAFIA ROSSYANA NINGRUM, S.Si.'),
(2, '0002/PLK/AD/IV/2021', '', 'KHOLISHATUL HIKMAH, S.Si.T., M.Kes', '2021-04-22', '2021', 'Rapat membahas akreditasi', '', '', '', '', ''),
(3, '0003/PLK.08/KL/IV/2021', '', 'TEGAR INDAH SUSANTI, S.Hum.', '2021-04-15', '2021', 'Evaluasi Kelmbagaan', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
`id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telp` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nama`, `nidn`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jabatan`, `pendidikan`, `alamat`, `nomor_telp`, `img`) VALUES
(12, 'ZUMIAFIA ROSSYANA NINGRUM, S.Si.', '0', '19901202  201511', 'Kudus', '1990-12-02', 'KA. BAG. UMUM &amp; KEPEGAWAIAN', 'S1 MATEMATIKA', 'DERSALAM RT 02 RW 05 NO. 939 BAE KUDUS', '085740984334', '606e41c25e2cc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE IF NOT EXISTS `tb_suratmasuk` (
`no` int(255) NOT NULL,
  `nomor_urut` varchar(255) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `pengolah` varchar(255) NOT NULL,
  `tgl_diteruskan` date NOT NULL,
  `ttd` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`no`, `nomor_urut`, `alamat_pengirim`, `tgl_surat`, `nomor_surat`, `lampiran`, `pengolah`, `tgl_diteruskan`, `ttd`) VALUES
(10, '0001', 'Dirjen Penguatan Inovasi', '2021-04-03', 'B/25/F/PT.01000', '-', 'Ulfa', '2021-04-22', 'Ulfa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$hlifFUwp1VFeFg/FLt8yZuW38Lv9ddlsEFE7aQh1LXqDUqjTF5J3e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kode_hal`
--
ALTER TABLE `kode_hal`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kode_jabatan`
--
ALTER TABLE `kode_jabatan`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
MODIFY `no` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
