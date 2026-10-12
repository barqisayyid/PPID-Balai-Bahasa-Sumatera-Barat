-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Okt 2026 pada 02.19
-- Versi server: 8.0.42
-- Versi PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perubahan` json DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `aksi`, `model_type`, `model_id`, `keterangan`, `perubahan`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'delete', 'App\\Models\\Informasi', 43, 'Dokumen informasi dihapus: test', NULL, '127.0.0.1', '2026-10-04 03:55:17', '2026-10-04 03:55:17'),
(2, 1, 'delete', 'App\\Models\\Informasi', 44, 'Dokumen informasi dihapus: fsdfasdf', NULL, '127.0.0.1', '2026-10-04 03:55:21', '2026-10-04 03:55:21'),
(3, 1, 'delete', 'App\\Models\\Informasi', 45, 'Dokumen informasi dihapus: fsgdfds', NULL, '127.0.0.1', '2026-10-04 04:00:30', '2026-10-04 04:00:30'),
(4, 1, 'delete', 'App\\Models\\Informasi', 46, 'Dokumen informasi dihapus: rtrtrtrt', NULL, '127.0.0.1', '2026-10-04 04:00:33', '2026-10-04 04:00:33'),
(5, 1, 'toggle_tampil', 'App\\Models\\Informasi', 6, 'Dokumen disembunyikan: Peraturan Menteri Pendidikan Dasar dan Menengah Nomor 2 Tahun 2025 tentang Pedoman Pengawasan Penggunaan Bahasa Indonesia', NULL, '127.0.0.1', '2026-10-04 08:46:25', '2026-10-04 08:46:25'),
(6, 1, 'toggle_tampil', 'App\\Models\\Informasi', 6, 'Dokumen ditampilkan: Peraturan Menteri Pendidikan Dasar dan Menengah Nomor 2 Tahun 2025 tentang Pedoman Pengawasan Penggunaan Bahasa Indonesia', NULL, '127.0.0.1', '2026-10-04 08:46:27', '2026-10-04 08:46:27'),
(7, 1, 'create', 'App\\Models\\Informasi', 47, 'Dokumen informasi baru: ewrer', NULL, '127.0.0.1', '2026-10-04 10:08:06', '2026-10-04 10:08:06'),
(8, 1, 'delete', 'App\\Models\\Informasi', 47, 'Dokumen informasi dihapus: ewrer', NULL, '127.0.0.1', '2026-10-04 10:08:22', '2026-10-04 10:08:22'),
(9, 1, 'create', 'App\\Models\\Informasi', 48, 'Dokumen informasi baru: gegege', NULL, '127.0.0.1', '2026-10-07 01:24:13', '2026-10-07 01:24:13'),
(10, 1, 'delete', 'App\\Models\\Informasi', 48, 'Dokumen informasi dihapus: gegege', NULL, '127.0.0.1', '2026-10-07 04:17:21', '2026-10-07 04:17:21'),
(11, 1, 'create', 'App\\Models\\Informasi', 49, 'Dokumen informasi baru: gegege', NULL, '127.0.0.1', '2026-10-07 04:17:35', '2026-10-07 04:17:35'),
(12, 1, 'update_status', 'App\\Models\\Permohonan', 3, 'Status permohonan #PMH-20261007-V4VCJ3 diubah dari [diterima] ke [selesai]', '{\"sebelum\": \"diterima\", \"sesudah\": \"selesai\"}', '127.0.0.1', '2026-10-07 13:28:06', '2026-10-07 13:28:06'),
(13, 1, 'update_status', 'App\\Models\\Permohonan', 3, 'Status permohonan #PMH-20261007-V4VCJ3 diubah dari [selesai] ke [ditolak]', '{\"sebelum\": \"selesai\", \"sesudah\": \"ditolak\"}', '127.0.0.1', '2026-10-07 13:33:12', '2026-10-07 13:33:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint UNSIGNED NOT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Akan Datang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agendas`
--

INSERT INTO `agendas` (`id`, `kegiatan`, `tanggal`, `waktu`, `tempat`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Zoom DWP', '2026-10-09', '09.00-11.00', 'Balai Bahasa Provinsi Sumatera Barat', 'Agenda zoom meeting dalam rangka kegiatan DWP Balai Bahasa Provinsi Sumatera Barat', 'Selesai', '2026-10-09 03:35:57', '2026-10-09 03:35:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contents`
--

CREATE TABLE `contents` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contents`
--

INSERT INTO `contents` (`id`, `slug`, `title`, `body`, `is_published`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'cara-menggunakan', 'Cara Menggunakan SILEK', '<p>Isi konten cara menggunakan layanan di sini.</p>', 1, NULL, '2026-10-04 16:27:27', '2026-10-04 16:27:27'),
(2, 'kontak', 'Kontak Kami', '<p>Balai Bahasa Provinsi Sumatera Barat<br>Alamat: ...<br>Telepon: ...<br>Email: ...</p>', 1, NULL, '2026-10-04 16:27:27', '2026-10-04 16:27:27'),
(3, 'informasi', 'Informasi Layanan', '<p>Informasi umum tentang layanan kebahasaan.</p>', 1, NULL, '2026-10-04 16:27:27', '2026-10-04 16:27:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_informasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pj` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tampil` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `kategori`, `nama`, `jenis_informasi`, `tahun`, `pj`, `dokumen`, `tampil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'berkala', 'Laporan Kinerja Tahunan', 'Laporan', '2024', 'Tim Administrasi', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view', 1, '2026-09-30 02:55:27', '2026-09-30 23:34:42', NULL),
(2, 'kebijakan', 'Undang-Undang Nomor 24 Tahun 2009 tentang Bendera, Bahasa, dan Lambang Negara, serta Lagu Kebangsaan', 'Undang-Undang', '2009', NULL, 'https://peraturan.bpk.go.id/Details/38661/uu-no-24-tahun-2009', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(3, 'kebijakan', 'Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 47 Tahun 2024 tentang Perubahan atas Peraturan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 12 Tahun 2022 tentang Organisasi dan Tata Kerja Balai Bahasa dan Balai Bahasa', 'Peraturan Menteri', '2024', NULL, 'https://peraturan.bpk.go.id/Details/303331/permendikbudriset-no-47-tahun-2024#:~:text=CATATAN:,hlm%205%20sd%206%20lampiran', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(4, 'kebijakan', 'Peraturan Menteri Keuangan Nomor 39 Tahun 2024 tentang Standar Biaya Masukan Tahun Anggaran 2025', 'Peraturan Menteri', '2024', NULL, 'https://peraturan.bpk.go.id/Details/292592/pmk-no-39-tahun-2024', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(5, 'kebijakan', 'Peraturan Menteri Keuangan Nomor 92 Tahun 2024 tentang Standar Biaya Keluaran Tahun Anggaran 2025', 'Peraturan Menteri', '2024', NULL, 'https://peraturan.bpk.go.id/Details/309180/pmk-no-92-tahun-2024', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(6, 'kebijakan', 'Peraturan Menteri Pendidikan Dasar dan Menengah Nomor 2 Tahun 2025 tentang Pedoman Pengawasan Penggunaan Bahasa Indonesia', 'Peraturan Menteri', '2025', NULL, 'https://peraturan.bpk.go.id/Details/315669/permendikdasmen-no-2-tahun-2025', 1, '2026-09-30 02:55:27', '2026-10-04 08:46:27', NULL),
(7, 'kebijakan', 'Rencana Strategis Balai Bahasa Provinsi Sumatera Barat 2025 s.d. 2030', 'Rencana Strategis', '2025', NULL, NULL, 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(8, 'kebijakan', 'Petunjuk Teknis Model Registrasi Bahasa', 'Petunjuk Teknis', '2025', NULL, 'https://drive.google.com/file/d/1_gdv8FRNmKskMEGeBqQX-81BebRpi9b1/view', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(9, 'kebijakan', 'Petunjuk Teknis Pembinaan Komunitas Penggerak Literasi Tahun', 'Petunjuk Teknis', '2025', NULL, 'https://drive.google.com/file/d/1JJO583Mczez64RQkz6m8v2lC9t0jHvnM/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(10, 'kebijakan', 'Petunjuk Teknis Peningkatan Kompetensi Membaca Kritis Dan Analitis Tahun 2025', 'Petunjuk Teknis', '2025', NULL, 'https://drive.google.com/file/d/13pPsMCzxGmF-AKjUywkD-ACx6Z2xB7Xh/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(11, 'keuangan', 'Rencana Kerja dan Anggaran (RKA)', NULL, '2025', 'Tim Administrasi', 'https://drive.google.com/file/d/1aFnhjb9imyMFWL6KVj7yhpcLpctyCN7v/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(12, 'keuangan', 'Daftar Isian Pelaksanaan Anggaran', NULL, '2025', 'Tim Administrasi', 'https://drive.google.com/file/d/1aD-US53RFJTRQ16YpSwV9u5S4VqPciEV/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(13, 'keuangan', 'Laporan Keuangan Semester II', NULL, '2024', 'Tim Administrasi', 'https://drive.google.com/file/d/1_9NKDu5abptSwQl1sllDX_ZTQYJaj7Ge/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(14, 'program', 'Kegiatan Pekan 5 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1azx_tx0SsEBtfGrVUrn4zcwfPMiUBIWV/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(15, 'program', 'Kegiatan Pekan 4 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1h0bcU_sSx_P0wJs9dOJF_Eq8_APZ2Vpi/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(16, 'program', 'Kegiatan Pekan 3 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1VL6B1mWj902Rl11KQ0DXOOeYxtXcfHyP/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(17, 'program', 'Kegiatan Pekan 2 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1igPxzdAP_0e_njEcJsziaK4F_5MBr86D/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(18, 'program', 'Kegiatan Pekan 1 Agustus', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1UpYFozWh90SWOb0szVWBV_N_O1WMTTbf/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(19, 'program', 'Kegiatan Pekan 5 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1OqK60JZRbg4iW9AlU6KHv9eDWxn-WFJL/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(20, 'program', 'Kegiatan Pekan 4 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1OdlPiVl1-UZ0I6JTxkJc9vKTZKRa3i-y/view?usp=drive_link', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(21, 'program', 'Kegiatan Pekan 3 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1c5oqEhGllll5clNr8YH0nb2RgMQM50sw/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(22, 'program', 'Kegiatan Pekan 2 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1qzxhiIPjC_Z0uKmdlzZ46I9dUmKib5tj/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(23, 'program', 'Kegiatan Pekan 1 Juli', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/19KSoZc2B2byfxh_NHEBf0YBMR8RGqpq7/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(24, 'program', 'Kegiatan Pekan 5 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1hDPayKe4P8Bfo8bL7KCLpTPmJWkcstEF/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(25, 'program', 'Kegiatan Pekan 4 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1tFroXRSdYA1YC84m_n1qDi1xars6jvaq/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(26, 'program', 'Kegiatan Pekan 3 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1siO5u8bvLmw6MdC9V3PH0WTaPINMAdxO/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(27, 'program', 'Kegiatan Pekan 2 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/177FtvUhxtk6IMexvfb2Qk-aIcXXUvUZB/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(28, 'program', 'Kegiatan Pekan 1 Juni', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1mOtwEN26lquSNlV7HzBf0uJLnH5ysdfx/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(29, 'program', 'Kegiatan Pekan 5 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1nFgX_kJZVHqY3CbowXnmI-f6W8GNSjej/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(30, 'program', 'Kegiatan Pekan 4 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1x6VrnuUG8J6_oP7Vg5U5P_kquqMyy412/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(31, 'program', 'Kegiatan Pekan 3 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1118RZjmQaOiDfgHGMw-7bQ35y17g2Hbw/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(32, 'program', 'Kegiatan Pekan 2 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1Fj4CvbIAMvkiXu5WPugRrpsTiyIDLX0n/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(33, 'program', 'Kegiatan Pekan 1 Mei', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1itBQgWuVpla5JGJkU4_9hWqRjIOmYfOn/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(34, 'program', 'Kegiatan Pekan 4 April', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1itBQgWuVpla5JGJkU4_9hWqRjIOmYfOn/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(35, 'program', 'Kegiatan Pekan 3 April', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1sQkxF99sCLdCG-Yt7dcf09DYt01qIYz-/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(36, 'program', 'Kegiatan Pekan 2 April', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1j9AObTBHXxOJYOd5EnfJTvo7wBx4hhQI/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(37, 'program', 'Kegiatan Pekan 4 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1sSyVhUC8yIkHK5ioFzBrmOxwQJRMD6_Q/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(38, 'program', 'Kegiatan Pekan 3 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1iyPzxwkO-RFLHg3YcoUsTPKrGHAiBIzE/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(39, 'program', 'Kegiatan Pekan 2 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1nUp3hKCdyaD34qeD_x0lKl0ZmRRJalHi/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(40, 'program', 'Kegiatan Pekan 1 Maret', 'Warta Mingguan', '2025', 'PPID', 'https://drive.google.com/file/d/1Jz1po5EiTlQe2XIKS8cj3G-ezv-rBH6R/view?usp=sharing', 1, '2026-09-30 02:55:27', '2026-09-30 02:55:27', NULL),
(41, 'keuangan', 'Testing', NULL, '2026', 'Testing', 'https://fsjfasjfdasdf', 1, '2026-09-30 08:08:33', '2026-09-30 08:09:41', NULL),
(42, 'statistik', 'Test Capaian', NULL, '2026', 'Pak', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view', 1, '2026-09-30 23:35:17', '2026-09-30 23:35:17', NULL),
(43, 'berkala', 'test', 'fsdfasd', '2026', 'fasdffasdfasdfsa', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view', 1, '2026-10-04 03:37:44', '2026-10-04 03:55:17', '2026-10-04 03:55:17'),
(44, 'berkala', 'fsdfasdf', 'fasdfsd', '2026', 'fasdf', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view', 1, '2026-10-04 03:38:10', '2026-10-04 03:55:21', '2026-10-04 03:55:21'),
(45, 'berkala', 'fsgdfds', 'fgdfdsg', '2026', 'adsfgfdafs', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view', 1, '2026-10-04 03:42:15', '2026-10-04 04:00:30', '2026-10-04 04:00:30'),
(46, 'berkala', 'rtrtrtrt', 'rtrtrtr', '2026', 'rtrrtrrt', 'https://drive.google.com/file/d/1uM0_EeBknxJCViW_rUGqAGJGcN4PjLvu/view', 1, '2026-10-04 03:53:18', '2026-10-04 04:00:33', '2026-10-04 04:00:33'),
(47, 'berkala', 'ewrer', 'rwer', '2026', 'erwerw', 'informasi/berkala/QvStYIqE6sEI4fKS6lf1hCZoxTbIylmbid3KnADy.pdf', 1, '2026-10-04 10:08:06', '2026-10-04 10:08:22', '2026-10-04 10:08:22'),
(48, 'berkala', 'gegege', 'gegeg', '2026', 'gegeg', 'informasi/berkala/UQvlEgZyTS2Z0KQCLtFA7roXGajuSSsGP8XBMrs9.pdf', 1, '2026-10-07 01:24:13', '2026-10-07 04:17:21', '2026-10-07 04:17:21'),
(49, 'berkala', 'gegege', 'gegeg', '2026', 'gegeg', 'informasi/berkala/Formulir Permohonan Informasi (1).pdf', 1, '2026-10-07 04:17:35', '2026-10-07 04:17:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberatan`
--

CREATE TABLE `keberatan` (
  `id` bigint UNSIGNED NOT NULL,
  `no_registrasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `respon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diterima',
  `tanggapan` text COLLATE utf8mb4_unicode_ci,
  `ditanggapi_at` timestamp NULL DEFAULT NULL,
  `ditanggapi_oleh` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keberatan`
--

INSERT INTO `keberatan` (`id`, `no_registrasi`, `nama`, `pekerjaan`, `alamat`, `no_hp`, `email`, `alasan`, `rincian`, `tujuan`, `tanggal_permohonan`, `respon`, `dokumen`, `status`, `tanggapan`, `ditanggapi_at`, `ditanggapi_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KBR-20261004-Q8FHSH', 'dfsdfs', 'berat', 'berateataet', '1243323', 'afsdf@gmail.com', 'c', 'fasdf', 'fadsf', '2026-09-30', 'langsung', NULL, 'diterima', NULL, NULL, NULL, '2026-10-04 04:02:00', '2026-10-04 04:02:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_28_091537_create_informasi_table', 1),
(5, '2026_07_28_091940_create_keberatan_table', 1),
(6, '2026_07_28_091948_create_permohonan_table', 1),
(7, '2026_07_28_092016_create_pengaduan_table', 1),
(8, '2026_10_03_220658_create_activity_logs_table', 2),
(9, '2026_10_03_220728_add_soft_deletes_to_layanan_tables', 3),
(10, '2026_10_04_000001_create_prosedur_table', 4),
(11, '2026_10_04_232447_create_contents_table', 5),
(13, '2026_10_09_102322_create_agendas_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint UNSIGNED NOT NULL,
  `no_registrasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `jenis_kejadian` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_pengaduan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `respon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diterima',
  `tanggapan` text COLLATE utf8mb4_unicode_ci,
  `ditanggapi_at` timestamp NULL DEFAULT NULL,
  `ditanggapi_oleh` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `no_registrasi`, `nama`, `pekerjaan`, `alamat`, `no_hp`, `email`, `tgl_kejadian`, `jenis_kejadian`, `subjek_pengaduan`, `uraian_pengaduan`, `harapan`, `respon`, `status`, `tanggapan`, `ditanggapi_at`, `ditanggapi_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PGD-20261002-LXXDU6', 'fasdf', 'fsadfasd', 'fasdfasd', '435656', 'fsgddfsg@fsagd', '2026-10-01', 'pelayanan', 'fsdfads', 'fasdadsfasd', 'fasdfas', 'email', 'diterima', NULL, NULL, NULL, '2026-10-02 06:58:06', '2026-10-02 06:58:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id` bigint UNSIGNED NOT NULL,
  `no_registrasi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rincian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `respon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diterima',
  `tanggapan` text COLLATE utf8mb4_unicode_ci,
  `ditanggapi_at` timestamp NULL DEFAULT NULL,
  `ditanggapi_oleh` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `no_registrasi`, `nama`, `pekerjaan`, `alamat`, `no_hp`, `email`, `rincian`, `tujuan`, `respon`, `dokumen`, `status`, `tanggapan`, `ditanggapi_at`, `ditanggapi_oleh`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PMH-20261003-DFTCBA', 'namaku', 'pekerja', 'padang', '081234567890', 'fasdkfj@gmail.com', 'aku butuh', 'informasi', 'langsung', NULL, 'diterima', NULL, NULL, NULL, '2026-10-03 09:38:37', '2026-10-03 09:38:37', NULL),
(2, 'PMH-20261004-ZZ3PMU', 'wergde', 'asdfgdf', 'dafsgx', '245365436', 'fasdfsd5g@gmail.com', 'fasdfsdf', 'fasdfasd', 'email', NULL, 'diterima', NULL, NULL, NULL, '2026-10-04 03:27:58', '2026-10-04 03:27:58', NULL),
(3, 'PMH-20261007-V4VCJ3', 'Barqi', 'Pranata Komputer', 'Cupak Tangah', '082386365211', 'sayyidbarqi0911@gmail.com', 'saya butuh informasi tentang itu', 'Agar bisa diketahui oleh publik', 'email', NULL, 'ditolak', 'Permintaan anda sudah selesai kami urus', '2026-10-07 13:29:03', 1, '2026-10-07 13:24:59', '2026-10-07 13:33:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosedur`
--

CREATE TABLE `prosedur` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prosedur`
--

INSERT INTO `prosedur` (`id`, `slug`, `nama`, `file`, `created_at`, `updated_at`) VALUES
(1, 'permohonan', 'Tata Cara Permohonan Informasi', 'prosedur/DAreBy7mB4YOTumEeWQe2og80bBKCddgumCtSi1t.pdf', '2026-10-04 04:54:15', '2026-10-04 05:08:29'),
(2, 'keberatan', 'Tata Cara Pengajuan Keberatan', NULL, '2026-10-04 04:54:15', '2026-10-04 04:54:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DrhXhBhFFIhnN1j6NHYOKXyEDAtP23Q62UGtMXDp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbE5wV1hBMlZsY3JjVU5qZVZSdFdTdFdWRUpKUVZFOVBTSXNJblpoYkhWbElqb2lRakJYV2s5U1VrOXNZbXB4YzJaU1NHUkdla2RsTTB0RGIzbDJSblprUVZkd2RETnZOV2h2TkdSa2RHcEpXRUZVU2xWeEwwbGxVazlhYzNFMlVHaDBRUzl5VW5WcFdGWTBTSEJuUVRabWRHMXZNRlpMV2xCM05XWjBjWEZ1ZUVSTE5YcE9aSFIwVDA5alYyaG9TRGhLZVhjeFozUTNTM1ZpVDNocWF6UktTaXN2VmtGblQyOU5jbUpYVTFKMGVDdFhNWEJrVURGWVRDOXBNaloyZGpsUFJUSlJWQ3RLUm5rMVdrWklWSGhsZVhSamIwSnNOVmR3YlcxaVVIRlVXSHA0TmtVeFFsTmxVMlU0VGxWNlR5dG9ORUZtT0RGb1RtSkJhR3R5TkV0Tk9FUlBMeTkzYUhobkt6VjNjM05aVEcxV1VGbHZUR3Q2VXpkNU15OXpjelJWVEVaSFdUSlNXbWt4V0M5aGRXWk5aMnhYTDI5d1lUbDFaRlYxTWt4NVpHc3hNMFZSZGpCdVkwaENNamhaWlVWdGVHTjJPRWxrTUc5RE1td3ZSbHAwVGxGRWJUWlVlVXRtVFhWblNqVk9UREZvTTB4elpHaFBlRnBOUWpWak0zQkdValpXUWtWSGFtUkNkMGRWUFNJc0ltMWhZeUk2SWpneE9HTm1ZV0kyTlRsaU5HVXlOV00xWkRoaFpUSXdPREE0TjJaak5USmxZamxpTXpobFlqSTVNbVJtTVRVd09Ea3dPRFU1TVdFMFpHVXpOR1EzT0dJaUxDSjBZV2NpT2lJaWZRPT0=', 1791770191),
('PlWfDVulloSs3B2XoWyBdesavtzqAwISRqeJ1U80', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJazFMZGxCb2RHaG5ObGh1ZEVkS1UycDFhMDE0Ym1jOVBTSXNJblpoYkhWbElqb2lhRzFLVmpGUFYzbEtVVEZqVTBKUE5GSkxSVWRrZDB3dk0yMU1kVTF2YzJwM1NVWm9kakZXVGtodWQxZDNjVnA1Y1VwSFJrNWFRbTFEYkcxSVowRnpWMHhQVVdaSllWWlVUM3AyU2pOTmJGRnJRVmdyZFhKTU5VSnZMMWd2WWtoNmRUUjZhV3Q0ZFhOcFoxTlVhbGM0ZFdORVNXMTVLekZ4TUVsWWRUTjVUMkZIVVhoNFMxbEJNRlJXTlRsc1JFbENjWE56YTJoU1pHcG1XazlQYzJkMGVWcHRlV2h2TDNOemJ6QlZNbVJoWkVWVVUwMVlSRlJ2VlZVeVVDdGFXWHBUYlhZNFYwVnJTSE5QTkVKUk1GVm5jMFV3V2pCbmNVdG5iR0p3TVhGNFpFdE9NM0o0TmxjdlUwUmlOVlZDZGpCYVRqUnFWVTFzTDIxd2NIWnlUR1EyV1RkMVMxWklLMVJKU1d0MmVURmlRa0Z3WTBaTFlVWXlhbk5HY0hneWRGWXhPQ3MyV2k4clVuRkVRbFJ1WTFsTWVVeFBUbU50T0RWV2VEVk5MMU5RYTBOMEswUlNPUzlNZFhwUFVFYzRaa1Z2YUdGd01FVnBTRWd4UkVSdlRFMUZaVTVKUlZoT01FTjFWMWcwUFNJc0ltMWhZeUk2SWpNMU5EWmhPR0ZsTUdNNVlqY3hZamcyWVRRM00yWmlaREEwT1Rrd01UTmtNelZrWlRjNFlqazJPVFptT0RrM1pEYzBPRGcxT1RrME5tWTVOak01WVRZaUxDSjBZV2NpT2lJaWZRPT0=', 1791521250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operator',
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `theme`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator PPID', 'dendeng@gmail.com', NULL, '$2y$12$C9WsvlgsFB9.e3WCW3h/3uq9nJV7r4cFpUQXMlkrXkI.AWNbCynXm', 'admin', 'light', NULL, '2026-09-30 02:55:27', '2026-10-04 04:01:13'),
(3, 'Barqi operator', 'barqitecno@gmail.com', NULL, '$2y$12$4MvwNYuliJlczrMKGcJ8wOygTXMvZwP0VU.STZfbASB/O..OCSSsK', 'operator', 'light', NULL, '2026-10-03 05:15:42', '2026-10-03 05:15:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `activity_logs_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contents_slug_unique` (`slug`),
  ADD KEY `contents_updated_by_foreign` (`updated_by`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_kategori_tampil_tahun_index` (`kategori`,`tampil`,`tahun`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keberatan`
--
ALTER TABLE `keberatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keberatan_no_registrasi_unique` (`no_registrasi`),
  ADD KEY `keberatan_ditanggapi_oleh_foreign` (`ditanggapi_oleh`),
  ADD KEY `keberatan_status_index` (`status`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengaduan_no_registrasi_unique` (`no_registrasi`),
  ADD KEY `pengaduan_ditanggapi_oleh_foreign` (`ditanggapi_oleh`),
  ADD KEY `pengaduan_status_index` (`status`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permohonan_no_registrasi_unique` (`no_registrasi`),
  ADD KEY `permohonan_ditanggapi_oleh_foreign` (`ditanggapi_oleh`),
  ADD KEY `permohonan_status_index` (`status`);

--
-- Indeks untuk tabel `prosedur`
--
ALTER TABLE `prosedur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prosedur_slug_unique` (`slug`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keberatan`
--
ALTER TABLE `keberatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prosedur`
--
ALTER TABLE `prosedur`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `keberatan`
--
ALTER TABLE `keberatan`
  ADD CONSTRAINT `keberatan_ditanggapi_oleh_foreign` FOREIGN KEY (`ditanggapi_oleh`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ditanggapi_oleh_foreign` FOREIGN KEY (`ditanggapi_oleh`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD CONSTRAINT `permohonan_ditanggapi_oleh_foreign` FOREIGN KEY (`ditanggapi_oleh`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
