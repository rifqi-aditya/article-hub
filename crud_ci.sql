-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `content`, `image`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Mengenal Jenis-jenis Teks Bahasa Inggris Beserta Struktur & Contohnya', 'Intan Aulia Husnunnisa', 'Reading merupakan salah satu aspek yang dinilai dalam tes kemahiran bahasa Inggris seperti pada TOEFL atau pun IELTS. Nah, kalau berbicara tentang reading pasti tak lepas dari yang namanya kalimat dan teks bahasa Inggris.\r\n\r\nPada umumnya, macam-macam teks yang akan kamu pelajari di artikel ini nggak jauh berbeda dengan jenis teks dalam bahasa Indonesia. Masing-masing teks tersebut memiliki tujuan/fungsi sosial masing-masing. Jadi, yuk kita cari tahu definisi, fungsi, struktur, dan contoh paragraf dari setiap teks-nya!\r\n\r\nPengertian Teks\r\n\r\nTeks adalah sebuah tulisan yang disusun dengan kalimat yang memiliki konteks. Kalau dalam teori sastra, teks adalah segala benda yang dapat “dibaca”, baik benda tersebut berupa karya sastra, tanda jalan, atau gaya pakaian.\r\n\r\nTapi, dalam hal ini, cakupannya hanya akan seputar “tulisan” saja ya, guys. Maka dari itu, setiap teks bahasa Inggris memiliki struktur dan kaidah kebahasaan (language feature) dalam penulisannya.\r\n\r\nJenis-jenis Teks Bahasa Inggris\r\n\r\n1. Descriptive Text \r\n\r\nDescriptive text bertujuan untuk menggambarkan/menjelaskan kepada pembaca mengenai seseorang, tempat, benda, hewan, dan hal lainnya secara detail. Pada teks ini, suatu objek akan dipaparkan secara rinci. Fungsinya supaya pembaca bisa membayangkan bagaimana bentuk, suasana, atau wujud dari suatu objek. Struktur dari descriptive text adalah identification dan description.\r\n\r\n2. Explanation Text\r\n\r\nSederhananya, descriptive text itu berisi mengenai penjelasan yang menjawab pertanyaan “what” atau “apa”. Nah, sementara, explanation text adalah jenis teks untuk menjawab pertanyaan “how”, alias bagaimana. Jadi, teks eksplanasi berfungsi untuk menjelaskan bagaimana suatu hal bisa terjadi, sifatnya logis dan mendetail. \r\n\r\nUmumnya explanation text digunakan banyak orang untuk memaparkan fenomena alam, sosial, dan juga budaya. Supaya pembaca bisa semakin mudah untuk memahami isi teks, biasanya sang penulis akan melengkapi teks dengan gambar yang relevan. Struktur dari explanation text adalah general statement, explanation, dan ada juga yang menambahkannya dengan conclusion.\r\n\r\n3. Recount Text \r\n\r\nKamu hobi mengabadikan pengalaman melalui tulisan? Nah, berarti recount text bisa jadi salah satu teks yang cocok untuk kamu tulis. Jadi, recount adalah teks yang menjelaskan cerita/pengalaman dari kejadian lampau, misal cerita traveling, mengikuti lomba, dan lain-lain.  Struktur teks recount adalah orientation, series of event, kemudian diakhiri dengan reorientation.\r\n\r\n4. Narrative Text (Teks Naratif)\r\n\r\nApakah kamu sering mendengarkan kisah Cinderella dan sepatu kacanya? Yap! Itu merupakan salah satu contoh dari narrative text atau narasi yang bersifat fiktif dan menghibur. Narrative text merupakan sebuah teks yang biasa dijadikan sebagai bahan story telling atau dongeng bahasa Indonesia mau pun bahasa Inggris. Generic structure dari narrative text adalah orientation, complication, resolution, dan yang terakhir reorientation.\r\n\r\n5. Report Text\r\n\r\nKalau membaca kata “report”, biasanya kita akan langsung teringat dengan “laporan”. Yap, teks ini digunakan untuk menuliskan laporan/informasi dari suatu objek, atau bisa juga dari hasil penelitian. Hmm, apa bedanya dengan descriptive text?\r\n\r\nKalau tujuan dari teks deskripsi itu menceritakan sesuatu secara detail dan lebih spesifik. Nah, dalam report text, sebuah objek akan digambarkan secara umum. Contohnya adalah mengenai “My Cat”, lalu kamu menuliskan bagaimana warna kucing itu, siapa namanya, apa jenisnya, bagaimana ciri-cirinya, etc.\r\n\r\nTeks report akan memberikan deskripsi terhadap “Cat” pada umumnya. Misal kakinya ada berapa, bagian tubuhnya ada apa saja, and many more. Dalam teks ini, generic structure yang akan kamu temukan adalah  general classification dan description. \r\n\r\nMeskipun jenis teks bahasa Inggris-nya cukup banyak, kamu nggak perlu galau. Soalnya, English Academy kan sudah memberikan penjelasan masing-masing jenis teks yang populer pada artikel terpisah. Jadi, kamu bisa belajar dengan lebih detail melalui artikel tersebut. Semangat!', '1746670906_5624e6853b857cc03f1c.jpg', '2025-05-08 00:00:00', '2025-05-08 02:21:46', '2025-05-08 02:21:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
