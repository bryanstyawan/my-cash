-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `il_pm_task`;
CREATE TABLE `il_pm_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pm_card` int(11) NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `border` varchar(20) NOT NULL,
  `created_by_nip` varchar(100) NOT NULL,
  `updated_by_nip` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `status` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `is_done` int(11) NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `il_pm_task` (`id`, `id_pm_card`, `title`, `desc`, `border`, `created_by_nip`, `updated_by_nip`, `date_created`, `date_updated`, `status`, `is_delete`, `is_done`, `nip`) VALUES
(1,	71,	'Engine untuk buat controllers, models, views',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	NULL),
(2,	71,	'Menu & Submenu',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	NULL),
(3,	71,	'Groups',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	NULL),
(4,	71,	'Permission',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	NULL),
(5,	71,	'Engine notifikasi',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	NULL),
(6,	71,	'Engine access controll',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	NULL),
(7,	72,	'Master > Organisasi > Grade (Set Tunjangan)',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(8,	72,	'Master > Organisasi > Jenis Eselon',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(9,	72,	'Master > Organisasi > Jenis jabatan',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(10,	72,	'Master > Organisasi > Pangkat/golongan',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(11,	72,	'Master > Organisasi > Pangkat/golongan jabatan',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(12,	72,	'Master > Organisasi > Komponen',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(13,	72,	'Master > Organisasi > Jabatan',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(14,	72,	'Master > Pegawai',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(15,	72,	'Master > Pendidikan > Akademik',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(16,	72,	'Master > Pendidikan > Jurusan ',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(17,	72,	'Master > Tugas Belajar',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(18,	72,	'Master > Tunjangan Profesi',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(19,	72,	'Review and Integrasi',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(20,	53,	'Setting FAQ di sisi config',	'Config > FAQ',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(21,	53,	'Halaman FAQ dihalaman user',	'lihat menu di navbar',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(22,	73,	'Ubah Hierarki Module Master menjadi Fondasi',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(23,	73,	'Fondasi > Pegawai > Tipe Jabatan Pegawai',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(24,	73,	'Fondasi > Pegawai > Status Pegawai',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(25,	73,	'Fondasi > Pegawai > Data Pegawai > Jabatan Pegawai',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(26,	73,	'Fondasi > Pegawai > Data Pegawai > Draf Pegawai',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(27,	73,	'Fondasi > Organisasi > Peta Jabatan',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(28,	73,	'Ubah metode hapus ke update [sistem draf atau arsip]',	'Rubah status menjadi 4',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(29,	73,	'Pada tunjangan, buat format menjadi Rp. 99.999',	'[Fondasi > Organisasi > Fondasi Organisasi > Grade ]',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(30,	74,	'Ketentuan > Satuan Pengukuran',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(31,	74,	'Ketentuan > Jenis Aspek Target',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(32,	74,	'Kualitas',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(33,	74,	'Cascading',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(34,	74,	'Komponen manual IKU',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(35,	74,	'Validasi inisial di Fondasi Strategi',	'Karena inisial menjadi key, inisial harus dibuat validasi agar unique',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'604'),
(36,	37,	'Layout',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(37,	37,	'Mapping data secara aplikasi',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(38,	37,	'Buat cluster komponen di sasaran strategis',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(39,	39,	'Layout',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'213'),
(40,	39,	'Visualisasi & mapping secara aplikasi',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(41,	39,	'Penambahan Angggaran di Manual IKU',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(42,	39,	'Breakdown Alokasi Anggaran',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	'999'),
(43,	19,	'Experiment Boards For Task (Kanban) digunakan untuk realisasi IKU/IKI. Sementara akan digunakan di I',	'-',	'',	'999',	'',	'0000-00-00',	'0000-00-00',	2,	0,	1,	''),
(44,	26,	'Module Permissions',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-22',	2,	0,	1,	'999'),
(45,	26,	'Notification Engine ',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-29',	2,	0,	1,	'999'),
(46,	26,	'Permission by Hierarkie (eselon) (Hold - tunggu skema strategi selesai)',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-29',	1,	0,	0,	'999'),
(47,	26,	'Config > Sliders',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-31',	2,	0,	1,	'604'),
(48,	76,	'Fondasi > Pegawai > Data Pegawai > Biodata/profile',	'Layot disamakan seperti dihalaman biodata',	'',	'999',	'999',	'2020-08-21',	'2020-08-23',	2,	0,	1,	'604'),
(49,	26,	'Data profile tidak muncul',	'nip ambil dari session yang sudah ada, jangan dibiarkan kosong',	'',	'999',	'999',	'2020-08-21',	'2020-08-23',	2,	0,	1,	'604'),
(50,	76,	'validasi form di module fondasi',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-23',	2,	0,	1,	'604'),
(51,	76,	'Fondasi > Pegawai > Data Pegawai',	'Menghubungkan antara pegawai dengan peta jabatan',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'999'),
(52,	77,	'Rubah skema visualisasi manual iku dari skema anggaran (parent-child iku) menjadi renstra-iku',	'Belumnya berdasarkan anggaran',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'999'),
(53,	77,	'Peta/visualisasi secara global',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'999'),
(54,	77,	'Edit Manual iku di bagian Indikator',	'Di bagian Indikator, semua fieldnya belum bisa diedit (Untuk jenis aspek, dilewatkan saja)',	'',	'999',	'999',	'2020-08-21',	'2020-08-26',	2,	0,	1,	'604'),
(55,	77,	'Field Periode Pelaporan dan konversi index capaian 120 tidak bisa disimpan',	'dilihat dibagian Indikator, kedua field tersebut tidak bisa disimpan/edit. kemungkinan kedua field bukan id/inisialnya yang disimpan.',	'',	'999',	'999',	'2020-08-21',	'2020-08-26',	2,	0,	1,	'604'),
(56,	77,	'Hapus manual iku',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-26',	2,	0,	1,	'604'),
(57,	77,	'Edit manual iku',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-26',	2,	0,	1,	'604'),
(58,	77,	'Rubah layout dengan pemisahan field manual iku menjadi beberapa bagian',	'Buat menjadi pemetaan, penamaan dan indikator',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'999'),
(59,	45,	'Layout',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'213'),
(60,	45,	'Store data',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'213'),
(61,	45,	'Cluster dihalaman awal is berdasarkan eselon II',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'213'),
(62,	45,	'Alokasi Anggaran berdasarkan iku eselon I atasan',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'213'),
(63,	45,	'Grouping anggaran inisiatif strategi berdasarkan iku',	'Hasil dari grouping anggaran inisiatif strategi disimpan kedalam iku (Berdasarkan is yang di Grouping)',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	4,	1,	0,	'213'),
(64,	77,	'Anggaran IKU berdasarkan akumulasi dari IS (turunan dari IKU)',	'grouping dari is',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'999'),
(65,	52,	'Layout',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'604'),
(66,	52,	'Store Data',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'604'),
(67,	52,	'Pemisahan data OKR Berdasarkan session pegawai',	'ambil berdasarkan session nip, jabatan dan tahun',	'',	'999',	'999',	'2020-08-21',	'2020-08-28',	1,	0,	1,	'604'),
(68,	57,	'Layout',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'604'),
(69,	57,	'Store',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	2,	0,	1,	'604'),
(70,	57,	'Pemisahan data IKI berdasarkan session masing2 pegawai',	'ambil berdasarkan session nip, jabatan dan tahun',	'',	'999',	'604',	'2020-08-21',	'2020-08-27',	1,	0,	1,	'604'),
(71,	77,	'Remapping cluster jabatan dari menteri-eselon 1',	'sebelumnya dari menteri-eselon 2',	'',	'999',	'999',	'2020-08-21',	'2020-08-26',	4,	1,	0,	'999'),
(72,	45,	'Inisiatif strategis harus terhubung dengan sasaran kegiatan',	'Karena ada perubahan skema',	'',	'999',	'999',	'2020-08-21',	'2020-08-26',	4,	1,	0,	'213'),
(73,	69,	'Sasaran Program (Harus berdasarkan iku eselon I)',	'Untuk eselon II',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	1,	0,	0,	'213'),
(74,	69,	'Indikator Kinerja Program',	'Untuk eselon 2',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	1,	0,	0,	'213'),
(75,	69,	'Sasaran Kegiatan Program',	'Untuk eselon III',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	1,	0,	0,	'213'),
(76,	69,	'Inisiatif Strategis harus berdasarkan sasaran kegiatan',	'Untuk eselon III',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(77,	66,	'Layout',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(78,	66,	'Store data',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(79,	66,	'cluster jabatan eselon 2',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-21',	1,	0,	0,	'213'),
(80,	67,	'Layout',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(81,	67,	'Store data',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(82,	67,	'cluster jabatan eselon 2',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(83,	68,	'Layout',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(84,	68,	'Store data',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(85,	68,	'cluster jabatan eselon 3',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'213'),
(86,	66,	'Finalisasi',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'999'),
(87,	67,	'Finalisasi',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'999'),
(88,	68,	'Finalisasi',	'-',	'',	'999',	'',	'2020-08-21',	'0000-00-00',	1,	0,	0,	'999'),
(89,	57,	'Masalah ketika ingin hapus data',	'Ketika hapus data, datatable tidak reload. sehingga data yang dihapus masih muncul',	'',	'999',	'604',	'2020-08-21',	'2020-08-27',	1,	0,	1,	'604'),
(90,	52,	'Belum ada validasi',	'-',	'',	'999',	'999',	'2020-08-21',	'2020-08-28',	1,	0,	1,	'604'),
(91,	26,	'Penerapan permissions di semua module',	'-',	'',	'999',	'999',	'2020-08-22',	'2020-08-26',	2,	0,	1,	'999'),
(92,	26,	'Tambah rule verifikasi pada permissions',	'-',	'',	'999',	'999',	'2020-08-22',	'2020-08-28',	2,	0,	1,	'999'),
(93,	76,	'Penerapan permissions (add, edit, delete)',	'-',	'',	'999',	'999',	'2020-08-22',	'2020-08-23',	2,	0,	1,	'999'),
(94,	0,	'Penerapan permissions (add, edit, delete)',	'-',	'',	'999',	'',	'2020-08-23',	'0000-00-00',	1,	0,	0,	'999'),
(95,	78,	'Penerapan permissions (add, edit, delete)',	'-',	'',	'999',	'999',	'2020-08-23',	'2020-08-26',	2,	0,	1,	'999'),
(96,	76,	'Peta Jabatan - Perubahan pada parent dan jenis jabatan',	'Ketika perubahan pada parent dan jenis jabatan, buat ulang kode jabatan yang ada kemudian hapus (jadikan arsip) kode jabatan lama. apabila jabatan tersebut mempunyai bawahan maka bawahan tersebut dibuat terpisah dari jabatan.',	'',	'999',	'',	'2020-08-23',	'0000-00-00',	1,	0,	0,	'999'),
(97,	76,	'Peta Jabatan - Buat history perubahan peta jabatan (json type - banyak data)',	'Ketika perubahan pada parent dan jenis jabatan, buat ulang kode jabatan yang ada kemudian hapus (jadikan arsip) kode jabatan lama. apabila jabatan tersebut mempunyai bawahan maka bawahan tersebut dibuat terpisah dari jabatan.',	'',	'999',	'999',	'2020-08-23',	'2020-08-23',	1,	0,	0,	'999'),
(98,	77,	'Rubah skema penyimpanan data [jenis aspek target skp] menjadi 1 table (json type - banyak data)',	'-',	'',	'999',	'',	'2020-08-23',	'0000-00-00',	1,	0,	0,	'999'),
(99,	77,	'Hapus table sti_manual_iku_aspek_target',	'-',	'',	'999',	'',	'2020-08-23',	'0000-00-00',	1,	0,	0,	'999'),
(100,	26,	'Tambah rule notifikasi pada permissions',	'-',	'',	'999',	'999',	'2020-08-23',	'2020-08-28',	2,	0,	1,	'999'),
(101,	79,	'Redesign Login page',	'-',	'',	'999',	'999',	'2020-08-26',	'2020-08-26',	2,	0,	1,	'999'),
(102,	79,	'User Profile dashboard',	'berada di halaman dashboard',	'',	'999',	'',	'2020-08-26',	'0000-00-00',	1,	0,	0,	'604'),
(103,	79,	'Notifikasi',	'-',	'',	'999',	'',	'2020-08-26',	'0000-00-00',	1,	0,	0,	'999'),
(104,	69,	'Remapping cluster jabatan dari menteri-eselon 1 untuk manual iku',	'sebelumnya dari menteri-eselon 2',	'',	'999',	'999',	'2020-08-26',	'2020-08-26',	1,	0,	0,	'999'),
(105,	77,	'Add-edit jenis aspek target skp',	'-',	'',	'999',	'',	'2020-08-26',	'0000-00-00',	1,	0,	0,	'999'),
(106,	79,	'Config > Setting background login',	'Buat halaman untuk setting background login seperti dihalaman config > slider',	'',	'999',	'',	'2020-08-26',	'0000-00-00',	1,	0,	0,	'604'),
(107,	45,	'Grouping anggaran IS berdasarkan IKU',	'-',	'',	'999',	'',	'2020-08-26',	'0000-00-00',	1,	0,	0,	''),
(108,	76,	'Tidak bisa membuka jabatan/struktur organisasi di  Fondasi > pegawai > Data pegawai',	'Masalah state management sehingga tidak bisa membuka jabatan/struktur organisasi di  Fondasi > pegawai > Data pegawai',	'',	'999',	'999',	'2020-08-26',	'2020-08-26',	2,	0,	1,	'999');

-- 2020-08-30 19:18:04