-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2023 pada 21.20
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_book` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nomor_booking` varchar(255) DEFAULT NULL,
  `meja` varchar(255) DEFAULT NULL,
  `id_restoran` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_book`, `email`, `tanggal`, `nomor_booking`, `meja`, `id_restoran`, `status`) VALUES
(20, 's@mail.com', '2023-09-02', 'BK-481407', '5', 1, 'Sudah Datang');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_produk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_produk` (
`kode_produk` varchar(25)
,`id_produk` int(11)
,`nama_produk` varchar(255)
,`nama_kategori` varchar(200)
,`harga` int(11)
,`foto_produk` text
,`id_restoran` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_booking`
--

CREATE TABLE `detail_booking` (
  `id_dtl_booking` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_resto` int(11) DEFAULT NULL,
  `no_meja` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT '1',
  `nomor_booking` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_booking`
--

INSERT INTO `detail_booking` (`id_dtl_booking`, `email`, `id_produk`, `id_resto`, `no_meja`, `qty`, `nomor_booking`) VALUES
(38, 's@mail.com', 4, 1, '5', 2, 'BK-481407');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Desert');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_user`
--

CREATE TABLE `keranjang_user` (
  `id_keranjang` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_resto` int(11) DEFAULT NULL,
  `no_meja` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang_user`
--

INSERT INTO `keranjang_user` (`id_keranjang`, `email`, `id_produk`, `id_resto`, `no_meja`, `qty`) VALUES
(1, 'contoh@email.com', 123, 456, 'A1', 1),
(3, 'contoh@email.com', 5, 1, '5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  `id_restoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `harga`, `foto_produk`, `id_restoran`) VALUES
(4, 'MN-QWK-01', 'Karedok', 1, 25000, '/app_restoran/assets/foto_produk/karedoks.jpg', 1),
(5, 'MN-QWK-02', 'Sun Kiss Jus', 2, 35000, '/app_restoran/assets/foto_produk/sunkis.jpg', 1),
(6, 'MN-QWK-03', 'Cerry Jus', 2, 25000, '/app_restoran/assets/foto_produk/cery.jpg', 1),
(7, 'MN-QWK-04', 'Steak', 1, 25000, '/app_restoran/assets/foto_produk/download.jpeg', 1),
(9, 'MN-QWK-GG', 'Karedok', 1, 20000, '/app_restoran/assets/foto_produk/download2.jpeg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `restoran`
--

CREATE TABLE `restoran` (
  `id_restoran` int(11) NOT NULL,
  `nama_restoran` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `restoran`
--

INSERT INTO `restoran` (`id_restoran`, `nama_restoran`, `deskripsi`, `foto`) VALUES
(1, 'Sadrasa Kitchen and Bar', 'Jl. Diponegoro No 27 Pullman Bandung Grand Central, Bandung 40115 Indonesia', '/app_restoran/assets/foto_resto/breakfast-corner_(1)1.jpg'),
(2, 'Purnawarman Restaurant', 'Jl. HOS Tjokroaminoto no. 41-43 Hilton Hotel Bandung, Bandung 40172 Indonesia', '/app_restoran/assets/foto_resto/purnawarman-restaurant.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(19, 1, 3),
(24, 1, 9),
(30, 1, 2),
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 2, 11),
(35, 2, 12),
(36, 2, 13),
(37, 1, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Menu', 'kelolamenu', 'fa fa-server', 0, 'y'),
(2, 'User', 'user', 'fa fa-user-o', 0, 'y'),
(3, 'Hak Akses', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'n'),
(10, 'Restoran', 'restoran', 'fa fa-angle-double-right', 0, 'y'),
(11, 'Kategori', 'kategori', 'fa fa-angle-double-right', 0, 'y'),
(12, 'Produk', 'produk', 'fa fa-angle-double-right', 0, 'y'),
(13, 'Validasi Reservasi', 'Booking', 'fa fa-angle-double-right', 0, 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `id_restoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`, `id_restoran`) VALUES
(1, 'Lutfi', 'lutfi@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y', 1),
(2, 'Doni', 'doni@mail.com', '$2y$04$CQLR0sqS2f/xZEek.dj/cOv6xFlU1L1JcbI6WviL.mi2pCy6LJr5u', '', 2, 'y', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_mobile`
--

CREATE TABLE `tbl_user_mobile` (
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_mobile`
--

INSERT INTO `tbl_user_mobile` (`email`, `nama`, `password`) VALUES
('contodhdD@email.com', 'Contoh Nama', 'b37cefcba371afb6061d1a686c9a080eb6d21c96'),
('contoh@email.com', 'Contoh Nama', 'b37cefcba371afb6061d1a686c9a080eb6d21c96'),
('contohD@email.com', 'Contoh Nama', 'b37cefcba371afb6061d1a686c9a080eb6d21c96'),
('contohdD@email.com', 'Contoh Nama', 'b37cefcba371afb6061d1a686c9a080eb6d21c96'),
('s@mail.com', 'Sandi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('sd@mail.com', 'DImas', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_keranjang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_keranjang` (
`id_keranjang` bigint(20)
,`email` varchar(255)
,`id_produk` int(11)
,`nama_produk` varchar(255)
,`kode_produk` varchar(25)
,`harga` int(11)
,`id_resto` int(11)
,`no_meja` varchar(255)
,`sub_qty` decimal(32,0)
,`nama_kategori` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_reservasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_reservasi` (
`id_book` int(11)
,`email` varchar(255)
,`tanggal` date
,`nomor_booking` varchar(255)
,`meja` varchar(255)
,`nama_restoran` varchar(200)
,`nama` varchar(255)
,`status` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `data_produk`
--
DROP TABLE IF EXISTS `data_produk`;

CREATE  VIEW `data_produk`  AS  select `produk`.`kode_produk` AS `kode_produk`,`produk`.`id_produk` AS `id_produk`,`produk`.`nama_produk` AS `nama_produk`,`kategori`.`nama_kategori` AS `nama_kategori`,`produk`.`harga` AS `harga`,`produk`.`foto_produk` AS `foto_produk`,`produk`.`id_restoran` AS `id_restoran` from (`produk` join `kategori` on((`produk`.`id_kategori` = `kategori`.`id_kategori`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_keranjang`
--
DROP TABLE IF EXISTS `view_keranjang`;

CREATE  VIEW `view_keranjang`  AS  select `keranjang_user`.`id_keranjang` AS `id_keranjang`,`keranjang_user`.`email` AS `email`,`keranjang_user`.`id_produk` AS `id_produk`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`kode_produk` AS `kode_produk`,`produk`.`harga` AS `harga`,`keranjang_user`.`id_resto` AS `id_resto`,`keranjang_user`.`no_meja` AS `no_meja`,sum(`keranjang_user`.`qty`) AS `sub_qty`,`kategori`.`nama_kategori` AS `nama_kategori` from ((`keranjang_user` join `produk` on((`keranjang_user`.`id_produk` = `produk`.`id_produk`))) join `kategori` on((`produk`.`id_kategori` = `kategori`.`id_kategori`))) group by `keranjang_user`.`id_produk` ;

-- --------------------------------------------------------
--
-- Struktur untuk view `view_reservasi`
--
DROP TABLE IF EXISTS `view_reservasi`;

CREATE  VIEW `view_reservasi`  AS  select `booking`.`id_book` AS `id_book`,`booking`.`email` AS `email`,`booking`.`tanggal` AS `tanggal`,`booking`.`nomor_booking` AS `nomor_booking`,`booking`.`meja` AS `meja`,`restoran`.`nama_restoran` AS `nama_restoran`,`tbl_user_mobile`.`nama` AS `nama`,`booking`.`status` AS `status` from ((`booking` join `restoran` on((`booking`.`id_restoran` = `restoran`.`id_restoran`))) join `tbl_user_mobile` on((`booking`.`email` = `tbl_user_mobile`.`email`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_book`);

--
-- Indeks untuk tabel `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD PRIMARY KEY (`id_dtl_booking`) USING BTREE;

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang_user`
--
ALTER TABLE `keranjang_user`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indeks untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indeks untuk tabel `tbl_user_mobile`
--
ALTER TABLE `tbl_user_mobile`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `id_dtl_booking` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keranjang_user`
--
ALTER TABLE `keranjang_user`
  MODIFY `id_keranjang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
