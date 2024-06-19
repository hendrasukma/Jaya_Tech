-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 04.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaya_tech`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(50) NOT NULL,
  `nama_brg` varchar(300) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(2, 'Acer Swift X SFX14', 'Processor : AMD Ryzen™ 5 5600U processor\r\nDisplay : 14″ IPS Full HD (1920 x 1080), 100% sRGB, high-brightness (300nits), Acer ComfyView™ LED-backlit TFT LCD, 16:9.\r\nMemory : 16GB LPDDR4X Dual Channel Memory\r\nStorage : 512 GB PCIe Gen3, NVMe\r\nGraphics : Nvidia Geforce RTX 3050 (4GB GDDR6)\r\nOther : Fingerprint, Backlight Keyboard, AI-Enhanced Noise Suppression, Multiple Cooling Modes\r\nOS : Windows 11 Home + Office Home&Student 2019', 'laptop', 12000000, 5, 'swiftx.jpg'),
(3, 'Logitech G102 Lightsync Gaming Mouse - Black', 'DIMENSI\r\nTinggi: 116,6 mm\r\nLebar: 62,15 mm\r\nTebal: 38,2 mm\r\nBerat: 85 g (hanya mouse)\r\nPanjang kabel: 2,1 m\r\n\r\nSPESIFIKASI TEKNIS\r\nPencahayaan RGB LIGHTSYNC\r\n6 tombol yang dapat diprogram\r\nResolusi: 200 – 8.000 dpi\r\n\r\nTINGKAT RESPONS\r\nFormat data USB: 16 bit/axis\r\nReport rate USB: 1000Hz (1 md)\r\nMikroprosesor: 32-bit ARM', 'aksesoris ', 245000, 2, 'g102.jpg'),
(7, 'Cooler Master MH650 Gaming Headset', 'Konektivitas USB dengan DAC\r\nVirtual 7.1 Surround Sound\r\n50mm Neodymium Drivers\r\nOmnidirectional Boom Mic\r\nKain Mesh & Plush Foam Cushioning\r\nSuspension Headband yang Fleksibel\r\nRGB Illumination\r\nTombol Volume Wheel\r\nVirtual 7.1 On/Off, Mute, RGB\r\nDongle USB Type-C\r\nKompabilitas Multi-platform\r\nMasterPlus+ Software', 'aksesoris ', 550000, 10, 'MH650.jpg'),
(8, 'RAM Netac Memory Shadow RGB 16GB DDR5', '16GB DDR5 PC4800 (8GB X 2 ) 4800Mhz', 'komponen pc', 999000, 7, 'ram.jpg'),
(9, 'Sony Playstation 5 Digital Version', 'CPU : 8x 8x Zen 2 Cores at 3.5 GHz\r\nGPU : 10.28 TFLOPs, 36 CUs at 2.23 GHz\r\nGPU Architecture : Custom RDNA 2\r\nMemory/Interface : 16 GB GDDR6/256-bit\r\nMemory Bandwidth : 448 Gbps\r\nInternal Storage Custom : 825 GB SSD\r\nIO Throughput : 5.56 Gbps (Raw), Typical 8-9 Gbps\r\nExpendable Storage : NVMe SSD Slot', 'konsol game', 7200000, 5, 'ps5dg.jpg'),
(10, 'Sony Playstation 5 Disk Version', 'Specifications :\r\n\r\nCPU : 8x 8x Zen 2 Cores at 3.5 GHz\r\nGPU : 10.28 TFLOPs, 36 CUs at 2.23 GHz\r\nGPU Architecture : Custom RDNA 2\r\nMemory/Interface : 16 GB GDDR6/256-bit\r\nMemory Bandwidth : 448 Gbps\r\nInternal Storage Custom : 825 GB SSD\r\nIO Throughput : 5.56 Gbps (Raw), Typical 8-9 Gbps\r\nExpendable Storage : NVMe SSD Slot\r\nOptical Drive : 4K UHD Blu-ray Drive', 'konsol game', 8207240, 5, 'ps5dsk.jpg'),
(11, 'APPLE MACBOOK AIR 2022 M2', 'Chip M2\r\nmacOS Monterey\r\nCPU 8-core\r\nGPU hingga 10-core\r\nNeural Engine 16-core\r\nMemori terintegrasi hingga 24 GB\r\nKekuatan baterai hingga 18 jam\r\nDesain tanpa kipas untuk pengoperasian yang senyap\r\nLayar Liquid Retina 13,6 inci dengan kecerahan 500 nit dan warna luas P3\r\nKamera FaceTime HD 1080p\r\nDeretan tiga mikrofon\r\nSistem suara empat speaker dengan Audio Spasial\r\nPort pengisian daya MagSafe, dua port Thunderbolt, dan jek headphone\r\nMagic Keyboard dengan lampu latar dan Touch ID\r\nKoneksi nirkabel Wi-Fi 6\r\nPenyimpanan SSD super cepat\r\nTersedia dalam warna Midnight, Starlight, Abu-abu, dan Perak', 'laptop', 23299000, 2, 'Apple MacBook Air M2.jpg'),
(12, 'Logitech G213 Prodigy Keyboard Gaming', 'Tinggi: 33 mm\r\nLebar: 452 mm\r\nTebal: 218 mm\r\nBerat: 1000 g\r\nJenis Koneksi: USB 2.0\r\nProtokol USB: USB 2.0\r\nKecepatan USB: Kecepatan Penuh\r\nLampu Indikator (LED): Ya\r\nLampu latar: RGB (5 Zona)\r\nPanjang Kabel (Daya/Pengisian Ulang): 1,8 m', 'aksesoris', 649000, 5, 'Logitech_G213.jpg'),
(13, 'ADVAN Laptop Workplus', 'CPU	AMD Ryzen 5 6600H\r\nDisplay	14” 16:10 FHD 1920*1200 IPS\r\nGPU	AMD Integrated graphics\r\nRAM	16GB Onboard\r\nBaterai	Polymer 5050mAh 58Wh\r\nMedia Penyimpanan	512 GB PCIE 3.0 SSD upgradable\r\nPort	2x USB Type C 3.2 Gen1 (PD/DP/Charger/Data)\r\n1x Micro SD\r\n\r\n2x USB 3.2 Gen1\r\n\r\n1x HDMI 2.0\r\n\r\n1x Jack Earphone 3.5mm\r\n\r\nOS	Windows 11\r\nDimensi	313.8 x 222 x 17.87mm', 'laptop', 6788000, 1, 'ADVAN Laptop Workplus.jpg'),
(14, 'Nintendo Switch - OLED', 'Chipset: Custom Nvidia Tegra X1\r\nStorage: 64 GB (expandable)\r\nDisplay: 7-inch OLED\r\nMax Resolution: 720p handheld/1080p docked\r\nMax Framerate: 60 fps\r\nPorts: USB-C, 3.5 mm audio, microSD, HDMI (docked), LAN (docked)\r\nSize: 9.5 x 4.0 x 0.6 inches\r\nWeight: 14.9 ounces (handheld)\r\nBattery Life: 4.5 – 9 hours', 'konsol game', 4419300, 8, 'Nintendo Switch - OLED.jpg'),
(15, 'SSD MSI SPATIUM M480 PRO PCIe 4.0 NVMe M.2 1TB', 'Interface PCIe Gen4x4 and sesuai dengan standar NVMe 1.4.\r\nKecepatan Sequential Read hingga 7400MB/s dan Write hingga 7000MB/s.\r\nHingga 3000 TBW.\r\nBuilt-in data security dan kemampuan error-correction.\r\nKapabilitas 1TB hingga 4TB pada form factor M.2 2280.\r\nCocok untuk desktop dan notebook.', 'komponen pc', 1590000, 2, 'SSD MSI SPATIUM M480 PRO.jpg'),
(16, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4', 'CPU Model: AMD Ryzen 7 5800X\r\nBase Clock: 3.8Ghz\r\nBoost Clock: 4.7Ghz\r\nTDP: 105W\r\nSocket: AM4', 'komponen pc', 4250000, 2, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4.jpg'),
(25, 'LG UltraGear 24GQ50F-B', '24\'\' UltraGear FHD 1ms 165Hz Monitor with AMD FreeSync™ Premium\r\n- 24\" Full HD (1920 x 1080) Display\r\n- 165Hz with 1ms MBR\r\n\r\nPICTURE QUALITY\r\nScreen Size: 23.8\"\r\nCurved: No\r\nDisplay Type: VA\r\nColor Gamut (Typ.):NTSC 72% (CIE1931)\r\nColor Depth (Number of Colors): 16.7M\r\nPixel Pitch (mm): 0.2739x0.2739mm\r\nResponse Time (GTG): 5ms (GtG at Faster), 1ms MBR\r\nRefresh Rate: 165Hz\r\nAspect Ratio: 16:9Display Resolution: FHD\r\nResolution: 1920x1080\r\nBrightness: 250cd (typ) / 200cd (Min)\r\nContrast Ratio: 1800:1 (Min.), 3000:1 (Typ.)\r\nViewing Angle: 178º(R/L), 178º(U/D)\r\n\r\nINPUT/OUTPUT\r\nHDMI: Yes\r\nDisplayPort: Yes\r\nHeadphone Out: Yes\r\n\r\nSTAND\r\nDisplay Position Adjustments: Tilt\r\nWall mount size (mm): 75 x 75 mm', 'komponen pc', 1600000, 9, 'lgultragear1.jpg'),
(26, 'Casing PC Gaming Digital Alliance N30S V2 M ATX Tempered Glass - Hitam', 'Casing Gaming Digital Alliance N30S V2 Tempered Glass Mid-Tower\r\nModel : N30S V2\r\nCase Type : Middle Tower\r\nColor : Black / White\r\nDimension (LxWxH) : 385 x 275 x 365 mm\r\nNet Weight : 8.6kg\r\nGross Weight : 9.6kg\r\nFront Side : Tempered glass\r\nRight Side : Tempered glass\r\nLeft Side : Plate\r\nColor : Black\r\nMaterial : Steel Plate + ABS + Tempered Glass\r\nPCI Slot : 5+2\r\nDrive Bays : 3.5”x2 or 2.5”x1, 3.5”x1\r\nMotherboards : M-ATX, ITX\r\nI/O Ports : USB 2.0, USB 3.0, Audio, Microphone\r\nMax VGA CARD : 370mm\r\nMax CPU COOLER : 160mm\r\n\r\nFan Support\r\nTop : 3 x 12 cm\r\nRear : 1 x 12 cm or 1 x 14 cm\r\nBottom : 3 x 12 cm\r\nClapboard : 2 x 12 cm\r\n\r\nCable Management Support: Yes\r\n\r\nMain Featured :\r\n\r\n• Front Tempered Glass\r\n• Support 370mm GPU & CPU Cooler height 190mm\r\n• PSU Cover\r\n• Support up to 9 Fans\r\n• Top magnetic filter dust', 'komponen pc', 450000, 9, 'casingDA1.jpg'),
(27, 'HyperX Cloud Earbuds 2', 'Optimized for gaming and audio on the go\r\n4 included ear tip sizes – Find your ideal fit\r\nHard shell case for easy portability and storage\r\nLow-profile 90° plug to reduce snags\r\nBuilt-in mic and mobile multifunction button\r\nCable length : 1.2m; 3.5mm headset cable', 'aksesoris', 600000, 10, 'earphone7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_pembayaran` varchar(255) DEFAULT 'Sedang diproses',
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `jasa_pengiriman` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `total_bayar` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `user_id`, `status_pembayaran`, `bukti_pembayaran`, `no_telp`, `jasa_pengiriman`, `metode_pembayaran`, `no_rekening`, `total_bayar`) VALUES
(45, 'Hendra Sukma Jaya', 'Bekasi Utara, Jawa Barat, Indonesia', '2024-06-15 19:05:49', '2024-06-16 19:05:49', 3, 'Sudah Diproses dan Barang Sudah dikirim', 'Screenshot_2024-06-15_190620.png', '081318126556', 'GOJEK', 'GOPAY', '081318126556', 11207300.00),
(49, 'Udin ', 'Bogor, Jawa Barat', '2024-06-16 08:39:04', '2024-06-17 08:39:04', 4, 'Sudah Diproses dan Barang Sudah dikirim', 'Screenshot_2024-06-16_084126.png', '0888888888', 'JNE', 'BNI', '0888888888', 12649000.00),
(51, 'Fauzan', 'Bekasi Utara, Jawa Barat, Indonesia', '2024-06-19 09:04:01', '2024-06-20 09:04:01', 9, 'Sudah Diproses dan Barang Sudah dikirim', 'invoice_fauzan1.pdf', '081318126556', 'GOJEK', 'GOPAY', '081318126556', 7499000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(1, 1, 2, 'Acer Swift X SFX14', 1, 12000000),
(2, 1, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(3, 1, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(4, 3, 2, 'Acer Swift X SFX14', 1, 12000000),
(5, 3, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(6, 4, 2, 'Acer Swift X SFX14', 1, 12000000),
(7, 4, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(8, 5, 2, 'Acer Swift X SFX14', 2, 12000000),
(9, 5, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 2, 245000),
(10, 8, 15, 'SSD MSI SPATIUM M480 PRO PCIe 4.0 NVMe M.2 1TB', 1, 1590000),
(11, 8, 16, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4', 1, 4250000),
(12, 9, 2, 'Acer Swift X SFX14', 1, 12000000),
(13, 10, 2, 'Acer Swift X SFX14', 1, 12000000),
(14, 10, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(15, 11, 2, 'Acer Swift X SFX14', 1, 12000000),
(16, 12, 9, 'Sony Playstation 5 Digital Version', 1, 7200000),
(17, 12, 14, 'Nintendo Switch - OLED', 1, 4419300),
(18, 13, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(19, 13, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(20, 14, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(21, 15, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(22, 15, 16, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4', 1, 4250000),
(23, 16, 11, 'APPLE MACBOOK AIR 2022 M2', 1, 23299000),
(24, 16, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(25, 17, 14, 'Nintendo Switch - OLED', 1, 4419300),
(26, 17, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(27, 18, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(28, 18, 10, 'Sony Playstation 5 Disk Version', 1, 8207240),
(29, 19, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(30, 19, 15, 'SSD MSI SPATIUM M480 PRO PCIe 4.0 NVMe M.2 1TB', 1, 1590000),
(31, 20, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(32, 20, 12, 'Logitech G213 Prodigy Keyboard Gaming', 1, 649000),
(33, 20, 13, 'ADVAN Laptop Workplus', 1, 6788000),
(34, 21, 2, 'Acer Swift X SFX14', 1, 12000000),
(35, 21, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(36, 22, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 2, 999000),
(37, 22, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(38, 22, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(39, 23, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(40, 24, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(41, 24, 14, 'Nintendo Switch - OLED', 1, 4419300),
(42, 25, 10, 'Sony Playstation 5 Disk Version', 1, 8207240),
(43, 25, 14, 'Nintendo Switch - OLED', 1, 4419300),
(44, 26, 16, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4', 1, 4250000),
(45, 26, 15, 'SSD MSI SPATIUM M480 PRO PCIe 4.0 NVMe M.2 1TB', 1, 1590000),
(46, 27, 11, 'APPLE MACBOOK AIR 2022 M2', 1, 23299000),
(47, 27, 13, 'ADVAN Laptop Workplus', 1, 6788000),
(48, 27, 2, 'Acer Swift X SFX14', 1, 12000000),
(49, 28, 14, 'Nintendo Switch - OLED', 1, 4419300),
(50, 28, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(51, 29, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(52, 29, 15, 'SSD MSI SPATIUM M480 PRO PCIe 4.0 NVMe M.2 1TB', 1, 1590000),
(53, 29, 16, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4', 1, 4250000),
(54, 29, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(55, 29, 3, 'Logitech G102 Lightsync Gaming Mouse - Black', 1, 245000),
(56, 30, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(57, 31, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(58, 31, 12, 'Logitech G213 Prodigy Keyboard Gaming', 1, 649000),
(59, 32, 13, 'ADVAN Laptop Workplus', 1, 6788000),
(60, 32, 15, 'SSD MSI SPATIUM M480 PRO PCIe 4.0 NVMe M.2 1TB', 1, 1590000),
(61, 33, 14, 'Nintendo Switch - OLED', 1, 4419300),
(62, 33, 10, 'Sony Playstation 5 Disk Version', 1, 8207240),
(63, 33, 9, 'Sony Playstation 5 Digital Version', 1, 7200000),
(64, 34, 14, 'Nintendo Switch - OLED', 1, 4419300),
(65, 35, 14, 'Nintendo Switch - OLED', 1, 4419300),
(66, 35, 12, 'Logitech G213 Prodigy Keyboard Gaming', 1, 649000),
(67, 35, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(68, 36, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 2, 999000),
(69, 38, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(70, 38, 14, 'Nintendo Switch - OLED', 1, 4419300),
(71, 40, 14, 'Nintendo Switch - OLED', 1, 4419300),
(72, 40, 10, 'Sony Playstation 5 Disk Version', 1, 8207240),
(73, 42, 9, 'Sony Playstation 5 Digital Version', 1, 7200000),
(74, 43, 9, 'Sony Playstation 5 Digital Version', 1, 7200000),
(75, 44, 14, 'Nintendo Switch - OLED', 1, 4419300),
(76, 45, 13, 'ADVAN Laptop Workplus', 1, 6788000),
(77, 45, 14, 'Nintendo Switch - OLED', 1, 4419300),
(78, 46, 10, 'Sony Playstation 5 Disk Version', 1, 8207240),
(79, 46, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000),
(80, 47, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(81, 48, 8, 'RAM Netac Memory Shadow RGB 16GB DDR5', 1, 999000),
(82, 49, 2, 'Acer Swift X SFX14', 1, 12000000),
(83, 49, 12, 'Logitech G213 Prodigy Keyboard Gaming', 1, 649000),
(84, 50, 9, 'Sony Playstation 5 Digital Version', 1, 7200000),
(85, 50, 11, 'APPLE MACBOOK AIR 2022 M2', 1, 23299000),
(86, 51, 25, 'LG UltraGear 24GQ50F-B', 1, 1600000),
(87, 51, 26, 'Casing PC Gaming Digital Alliance N30S V2 M ATX Te', 1, 450000),
(88, 51, 16, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz 105W AM4', 1, 4250000),
(89, 51, 12, 'Logitech G213 Prodigy Keyboard Gaming', 1, 649000),
(90, 51, 7, 'Cooler Master MH650 Gaming Headset', 1, 550000);

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `pertanyaan_keamanan` varchar(255) NOT NULL,
  `jawaban_keamanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`, `pertanyaan_keamanan`, `jawaban_keamanan`) VALUES
(1, 'admin', 'admin', '123', 1, '', ''),
(2, 'user', 'user', '12345', 2, '', ''),
(3, 'Hendra Sukma Jaya', 'Hendra', '123', 2, '', ''),
(4, 'Udin III', 'udin', 'din', 2, '', ''),
(5, 'Amir', 'amir', '321', 2, 'Siapa nama hewan peliharaan pertama Anda?', 'qwerty'),
(9, 'Fauzan', 'fauzan', '321', 2, '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
