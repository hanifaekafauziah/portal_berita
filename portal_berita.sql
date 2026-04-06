-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2026 pada 03.27
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
-- Database: `portal_berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_staf` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_staf`, `username`, `password`) VALUES
(1, 'admin2', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategori_id` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `kategori_id`, `views`) VALUES
(1, 'Semangat Lapangan Kampus ', 'Basket mahasiswa adalah kegiatan olahraga bola basket yang dilakukan oleh mahasiswa di lingkungan kampus. Selain sebagai sarana menjaga kebugaran, basket juga menjadi wadah untuk mengembangkan bakat, kerja sama tim, dan jiwa kompetitif.\r\n\r\nDi tingkat kampus, biasanya terdapat Unit Kegiatan Mahasiswa (UKM) atau klub basket yang rutin mengadakan latihan dan mengikuti turnamen antar kampus. Kompetisi ini tidak hanya meningkatkan kemampuan bermain, tetapi juga mempererat hubungan antar mahasiswa dari berbagai universitas.\r\n\r\nSecara singkat, basket mahasiswa bukan hanya soal olahraga, tetapi juga tentang kebersamaan, prestasi, dan pengembangan diri di dunia perkuliahan.\r\n', '1775397558_artikel.jpg.jpg', '2026-04-04 07:15:29', 1, 7),
(2, 'Perjalanan KA Siliwangi Dihentikan Sementara Akibat Banjir di Cibeber', 'Perjalanan Kereta Api (KA) Siliwangi untuk sementara waktu dihentikan akibat banjir yang melanda wilayah Cibeber, Sukabumi. Genangan air yang merendam jalur rel membuat operasional kereta tidak memungkinkan untuk dilanjutkan demi menjaga keselamatan penumpang dan petugas.\r\n\r\nPihak PT Kereta Api Indonesia menyampaikan bahwa penghentian ini dilakukan sebagai langkah antisipasi terhadap potensi bahaya, seperti kerusakan jalur rel dan risiko kecelakaan. Tim teknis juga telah dikerahkan ke lokasi untuk melakukan pengecekan kondisi lintasan serta memastikan keamanan sebelum perjalanan kembali dibuka.\r\n\r\nBanjir di kawasan Cibeber sendiri disebabkan oleh tingginya curah hujan yang mengguyur wilayah tersebut dalam beberapa waktu terakhir. Selain mengganggu transportasi kereta, banjir juga berdampak pada aktivitas masyarakat sekitar, termasuk akses jalan dan permukiman warga.\r\n\r\nPara penumpang KA Siliwangi diimbau untuk memantau informasi terbaru terkait jadwal keberangkatan melalui kanal resmi KAI. Alternatif transportasi sementara juga disarankan bagi masyarakat yang terdampak penghentian layanan ini.', '1775410827_KA-Siliwangi.jpeg', '2026-04-05 17:40:27', 3, 3),
(3, 'Gugurnya 3 Prajurit TNI: Duka dan Pengabdian untuk Negeri', 'Indonesia kembali berduka atas gugurnya tiga prajurit Tentara Nasional Indonesia (TNI) dalam menjalankan tugas negara. Ketiganya meninggal dunia saat menjalankan misi yang penuh risiko demi menjaga keamanan dan kedaulatan bangsa.\r\n\r\nPeristiwa ini menjadi pengingat bahwa tugas seorang prajurit bukan hanya sekadar pekerjaan, melainkan bentuk pengabdian total kepada negara. Para prajurit TNI sering ditempatkan di wilayah rawan konflik, perbatasan, maupun daerah terpencil dengan berbagai tantangan yang tidak ringan.\r\n\r\nKepergian ketiga prajurit tersebut meninggalkan duka mendalam, tidak hanya bagi keluarga yang ditinggalkan, tetapi juga bagi seluruh rakyat Indonesia. Mereka dikenang sebagai sosok yang berani, disiplin, dan memiliki dedikasi tinggi terhadap tugas.\r\n\r\nSebagai bentuk penghormatan, upacara militer biasanya dilakukan untuk melepas kepergian prajurit yang gugur. Negara juga memberikan penghargaan atas jasa dan pengorbanan mereka selama bertugas.', '1775411641_3tni.jpeg', '2026-04-05 17:54:01', 2, 1),
(4, 'Gaya Hidup Modern yang Seimbang dan Berkualitas', 'Lifestyle atau gaya hidup merupakan cara seseorang menjalani kehidupan sehari-hari, mulai dari kebiasaan, pola pikir, hingga aktivitas yang dilakukan. Di era modern saat ini, lifestyle menjadi bagian penting dalam menentukan kualitas hidup seseorang.\r\n\r\nGaya hidup tidak hanya berkaitan dengan penampilan atau tren, tetapi juga mencerminkan bagaimana seseorang menjaga kesehatan fisik, mental, serta hubungan sosialnya. Oleh karena itu, penting untuk memiliki lifestyle yang seimbang agar hidup terasa lebih produktif dan bahagia.\r\n\r\nðŸŒ¿ Jenis Lifestyle Populer\r\n\r\nBeberapa gaya hidup yang banyak diterapkan saat ini antara lain:\r\n\r\nHealthy lifestyle: Fokus pada pola makan sehat dan olahraga rutin\r\nMinimalist lifestyle: Hidup sederhana dengan mengurangi hal yang tidak penting\r\nWork-life balance: Menyeimbangkan antara pekerjaan dan kehidupan pribadi\r\nSelf-care lifestyle: Memberi waktu untuk merawat diri dan menjaga kesehatan mental\r\nðŸ’¡ Pentingnya Lifestyle Sehat\r\n\r\nMemiliki gaya hidup yang baik dapat memberikan banyak manfaat, seperti:\r\n\r\nMeningkatkan kesehatan tubuh\r\nMengurangi stres dan tekanan hidup\r\nMeningkatkan produktivitas\r\nMembantu mencapai tujuan hidup dengan lebih terarah\r\nâš¡ Tips Menerapkan Lifestyle Positif\r\nMulai dengan kebiasaan kecil seperti tidur cukup\r\nRutin berolahraga minimal 3 kali seminggu\r\nMengatur waktu dengan baik\r\nMenghindari kebiasaan buruk seperti begadang dan konsumsi berlebihan', '1775411795_gayahidup.jpeg', '2026-04-05 17:56:35', 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Olahraga', '2026-04-04 16:20:20', '2026-04-04 16:20:20'),
(2, 'Politik', '2026-04-05 01:01:04', '2026-04-05 01:01:04'),
(3, 'Ekonomi', '2026-04-05 01:02:21', '2026-04-05 01:06:13'),
(4, 'Lifestyle', '2026-04-05 13:52:36', '2026-04-05 13:53:31'),
(5, 'Hiburan', '2026-04-06 01:01:53', '2026-04-06 01:01:53'),
(6, 'Selebritis', '2026-04-06 01:02:03', '2026-04-06 01:02:03'),
(7, 'Hukum', '2026-04-06 01:02:19', '2026-04-06 01:02:19'),
(8, 'Otomotif', '2026-04-06 05:27:18', '2026-04-06 05:27:18'),
(9, 'Teknologi', '2026-04-06 05:27:40', '2026-04-06 05:27:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trending`
--

CREATE TABLE `trending` (
  `id` int(11) NOT NULL,
  `artikel_id` int(11) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `trending`
--

INSERT INTO `trending` (`id`, `artikel_id`, `tanggal_update`) VALUES
(1, 1, '2026-04-04 21:10:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `views_harian`
--

CREATE TABLE `views_harian` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `views` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_staf`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id` (`artikel_id`);

--
-- Indeks untuk tabel `views_harian`
--
ALTER TABLE `views_harian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `views_harian`
--
ALTER TABLE `views_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `trending`
--
ALTER TABLE `trending`
  ADD CONSTRAINT `trending_ibfk_1` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
