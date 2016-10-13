-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2014 at 01:30 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE IF NOT EXISTS `tbl_divisi` (
  `kd_divisi` varchar(10) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`kd_divisi`, `divisi`) VALUES
('ADM', 'Anggaran dan Administrasi Keuangan'),
('ASET', 'Akuntansi dan Aset'),
('HUMAS', 'Hukum dan Humas'),
('PBPM', 'Pembangunan dan Pemeliharaan'),
('PUSAR', 'Pengembangan Usaha dan Pemasaran'),
('RENEV', 'Perencanaan dan Evaluasi'),
('SPI', 'Satuan Pengawas Intern'),
('UMP', 'Umum dan Kepegawaian'),
('UNIT', 'Poliklinik'),
('UNIT-I', 'Stadion Utama'),
('UNIT-II', 'Gedora'),
('UNIT-III', 'Istora'),
('UNIT-IV', 'Stadion Tenis'),
('UNIT-V', 'Gedung Serbaguna'),
('UNIT-VI', 'Stadion Renang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE IF NOT EXISTS `tbl_gaji` (
  `NIP` varchar(20) NOT NULL,
  `kd_jabatan` varchar(15) NOT NULL,
  `gol` varchar(4) NOT NULL,
  `kd_keluarga` varchar(4) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gaji_pokok` int(8) NOT NULL,
  `tunj_istri` int(8) NOT NULL,
  `tunj_anak` int(8) NOT NULL,
  `gaji_kotor` int(8) NOT NULL,
  `tunj_jabatan` int(8) NOT NULL,
  `tunjangan_kerja` int(8) NOT NULL,
  `pendapatan_kotor` int(8) NOT NULL,
  `astek` int(8) NOT NULL,
  `pensiun` int(8) NOT NULL,
  `pajak` int(8) NOT NULL,
  `puskes` int(8) NOT NULL,
  `koperasi` int(8) NOT NULL,
  `korpri` int(8) NOT NULL,
  `btn` int(8) NOT NULL,
  `kamboja` int(8) NOT NULL,
  `lain` int(8) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `no_gaji` int(5) NOT NULL AUTO_INCREMENT,
  `total_gaji` int(8) NOT NULL,
  PRIMARY KEY (`no_gaji`),
  KEY `NIP` (`NIP`),
  KEY `kd_jabatan` (`kd_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `tbl_gaji`
--

INSERT INTO `tbl_gaji` (`NIP`, `kd_jabatan`, `gol`, `kd_keluarga`, `jenis_kelamin`, `gaji_pokok`, `tunj_istri`, `tunj_anak`, `gaji_kotor`, `tunj_jabatan`, `tunjangan_kerja`, `pendapatan_kotor`, `astek`, `pensiun`, `pajak`, `puskes`, `koperasi`, `korpri`, `btn`, `kamboja`, `lain`, `tgl_gaji`, `no_gaji`, `total_gaji`) VALUES
('001', 'STAFF', 'IIA', '1/2', 'L', 1624700, 162470, 64988, 1852158, 350000, 1000000, 3202158, 64043, 18522, 54014, 0, 0, 0, 0, 0, 0, '2014-02-26', 83, 3065580),
('0010000', 'DIR-PPU', 'ID', '1/-', 'P', 1491300, 149130, 0, 1640430, 12020000, 950000, 14610430, 292209, 16404, 2065830, 0, 0, 0, 0, 0, 0, '2014-02-25', 102, 12235987);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE IF NOT EXISTS `tbl_golongan` (
  `gol` varchar(4) NOT NULL,
  PRIMARY KEY (`gol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`gol`) VALUES
('IA'),
('IB'),
('IC'),
('ID'),
('IIA'),
('IIB'),
('IIC'),
('IID'),
('IIIA'),
('IIIB'),
('IIIC'),
('IIID'),
('IVA'),
('IVB'),
('IVC'),
('IVD'),
('IVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `kd_jabatan` varchar(15) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kd_jabatan`, `jabatan`) VALUES
('DIR-PPU', 'Direktur Pembangunan dan Pengembangan Usaha'),
('DIRKEU', 'Direktur Keuangan'),
('DIRUM', 'Direktur Umum'),
('DIRUT', 'Direktur Utama'),
('KADIV', 'Kepala Divisi'),
('KANIT', 'Kepala Unit'),
('KASIE-ADM', 'Kepala Seksi Administrasi Kontrak'),
('KASIE-ADM-TEH', 'Kepala Seksi Administrasi Tehnik'),
('KASIE-ADMKEU', 'Kepala Seksi Administrasi Keuangan'),
('KASIE-ADMSDM', 'Kepala Seksi Administrasi SDM'),
('KASIE-ADUM', 'Kepala Seksi Administrasi Umum'),
('KASIE-AKNPJK', 'Kepala Seksi Akuntansi dan Perpajakan'),
('KASIE-ANHUK', 'Kepala Seksi Analisa dan Hukum'),
('KASIE-ASET', 'Kepala Seksi Aset'),
('KASIE-BANG', 'Kepala Seksi Pengembangan dan Penerapan Sistem'),
('KASIE-BANGMAS', 'Kepala Seksi Pengembangan Masyarakat'),
('KASIE-BINPROG', 'Kepala Seksi Bina Program'),
('KASIE-DEWASLU', 'kepala Seksi Dewan Pengawas BLU'),
('KASIE-GDAR', 'Kepala Seksi Gedung dan Arena'),
('KASIE-IKAL', 'Kepala Seksi Mekanikal dan Elektrikal'),
('KASIE-INFR', 'Kepala Seksi Infrastruktur'),
('KASIE-INVENT', 'Kepala Seksi Inventaris'),
('KASIE-JARMED', 'Kepala Seksi Jaringan Multimedia'),
('KASIE-JUAL', 'Kepala Seksi Penjualan'),
('KASIE-KAMTIB', 'Kepala Seksi KamTib'),
('KASIE-KAPRT', 'Kepala Seksi Perlengkapan dan R.T'),
('KASIE-KAS', 'Kepala Seksi Kas'),
('KASIE-KRJS', 'Kepala Seksi Kerjasama'),
('KASIE-LITANG', 'Kepala Seksi Penelitian dan Pengendalian Anggaran'),
('KASIE-LNK', 'Kepala Seksi Lingkungan'),
('KASIE-MEDIS', 'Kepala Seksi Pelayanan Medis'),
('KASIE-MONEV', 'Kepala Seksi Monitoring dan Evaluasi'),
('KASIE-OLAH', 'Kepala Seksi Pelayanan Pelanggan dan Olah'),
('KASIE-OPR', 'Kepala Seksi Operasional'),
('KASIE-PLUMB', 'Kepala Seksi Sipil dan Plumbing'),
('KASIE-PROMIK', 'Kepala Seksi Promosi dan Periklanan'),
('KASIE-PROTDOK', 'Kepala Seksi Protokol dan Dokumentasi'),
('KASIE-RENANG', 'Kepala Seksi Perencanaan Anggaran'),
('KASIE-RENSDM', 'Kepala Seksi Perencanaan dan Pengembangan SDM'),
('KASIE-RENUS', 'Kepala Seksi Perencanaan dan Analisa Usaha'),
('KASIE-SEKR', 'Kepala Seksi Sekretariat'),
('KASIE-SOLLAP', 'Kepala Seksi Konsolidasi dan Pelaporan'),
('KASIE-TEHNIK', 'Kepala Seksi Tehnik'),
('KASIE-TU', 'Kepala Seksi Tata Usaha SPI'),
('KASIE-UTL', 'Kepala Seksi Utilitas'),
('KASIE-VERIF', 'Kepala Seksi Verifikasi'),
('KASPI', 'Kepala SPI'),
('KASUBDIV-ADMKEU', 'Kepala Subdivisi ADM. Keuangan dan Kas'),
('KASUBDIV-AKN', 'Kepala Subdivisi Akuntansi'),
('KASUBDIV-ANG', 'Kepala Subdivisi Anggaran'),
('KASUBDIV-ASET', 'Kepala Subdivisi Aset dan Inventaris'),
('KASUBDIV-BANG', 'Kepala Subdivisi Bangunan'),
('KASUBDIV-HUKJAN', 'Kepala Subdivisi Hukum dan Perjanjian'),
('KASUBDIV-HUMAS', 'Kepala Subdivisi Humas'),
('KASUBDIV-INF', 'Kepala Subdivisi Dukungan Informatika'),
('KASUBDIV-LINGKU', 'Kepala Subdivisi Lingkungan dan Utilitas'),
('KASUBDIV-PSR', 'Kepala Subdivisi Pemasaran'),
('KASUBDIV-PU', 'Kepala Subdivisi Pengembangan Usaha'),
('KASUBDIV-RENPRO', 'Kepala Subdivisi Perencanaan Progiat'),
('KASUBDIV-SDM', 'Kepala Subdivisi SDM'),
('KASUBDIV-UM', 'Kepala Subdivisi Umum'),
('STAFF', 'Staff'),
('WAS-KEUMPEG', 'Pengawas Bd. Keuangan,Umum,Pegawai'),
('WAS-TEKOPR', 'Pengawas Bd. Teknik dan Operasional');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE IF NOT EXISTS `tbl_keluarga` (
  `kd_keluarga` varchar(4) NOT NULL,
  `status_menikah` varchar(7) NOT NULL,
  `jumlah_anak` int(2) NOT NULL,
  PRIMARY KEY (`kd_keluarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`kd_keluarga`, `status_menikah`, `jumlah_anak`) VALUES
('-/-', 'Tidak', 0),
('-/1', 'Tidak', 1),
('-/2', 'Tidak', 2),
('-/3', 'Tidak', 3),
('1/-', 'Menikah', 0),
('1/1', 'Menikah', 1),
('1/2', 'Menikah', 2),
('1/3', 'Menikah', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(13) NOT NULL,
  KEY `username` (`username`),
  KEY `NIP` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `NIP`, `password`, `status`) VALUES
('admin', '004A', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
('dian', '004', '5ef035d11d74713fcb36f2df26aa7c3d', 'pegawai'),
('tujuh', '007', '0ac1a3dd00e77a8920b26c2c8aa839ca', 'pegawai'),
('agus', '006P', 'fdf169558242ee051cca1479770ebac3', 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `NIP` varchar(20) NOT NULL,
  `nama_peg` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kd_pendidikan` varchar(4) NOT NULL,
  `kd_keluarga` varchar(4) NOT NULL,
  `gol` varchar(4) NOT NULL,
  `kd_jabatan` varchar(15) NOT NULL,
  `kd_divisi` varchar(10) NOT NULL,
  PRIMARY KEY (`NIP`),
  KEY `kd_pendidikan` (`kd_pendidikan`),
  KEY `kd_keluarga` (`kd_keluarga`),
  KEY `gol` (`gol`),
  KEY `kd_jabatan` (`kd_jabatan`),
  KEY `kd_divisi` (`kd_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`NIP`, `nama_peg`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `agama`, `telp`, `tgl_masuk`, `kd_pendidikan`, `kd_keluarga`, `gol`, `kd_jabatan`, `kd_divisi`) VALUES
('001', 'Drg. Susan W, M.Kes', 'Jakarta Pusat', '2014-02-23', 'L', 'Islam', '02178690145', '2014-03-02', 'S2', '1/2', 'IC', 'STAFF', 'ADM'),
('0010000', 'andriani', 'depok', '2014-02-25', 'P', 'Protestan', '021786901458', '2014-02-25', 'S3', '1/-', 'ID', 'DIR-PPU', 'ADM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tbl_pendidikan` (
  `kd_pendidikan` varchar(4) NOT NULL,
  `nm_pendidikan` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`kd_pendidikan`, `nm_pendidikan`) VALUES
('D3', 'Diploma Tiga'),
('S1', 'Strata 1'),
('S2', 'Strata 2'),
('S3', 'Strata 3'),
('SD', 'Sekolah Dasar'),
('SMA', 'Sekolah Menengah Atas'),
('SMP', 'Sekolah Menengah Pertama');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD CONSTRAINT `tbl_gaji_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tbl_pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_gaji_ibfk_2` FOREIGN KEY (`kd_jabatan`) REFERENCES `tbl_jabatan` (`kd_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`kd_pendidikan`) REFERENCES `tbl_pendidikan` (`kd_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pegawai_ibfk_2` FOREIGN KEY (`kd_keluarga`) REFERENCES `tbl_keluarga` (`kd_keluarga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pegawai_ibfk_3` FOREIGN KEY (`gol`) REFERENCES `tbl_golongan` (`gol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pegawai_ibfk_4` FOREIGN KEY (`kd_jabatan`) REFERENCES `tbl_jabatan` (`kd_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pegawai_ibfk_5` FOREIGN KEY (`kd_divisi`) REFERENCES `tbl_divisi` (`kd_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
