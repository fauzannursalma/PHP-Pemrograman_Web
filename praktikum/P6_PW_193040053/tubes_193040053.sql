-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 12.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_193040053`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `cover` varchar(64) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `pengarang` varchar(64) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `harga` varchar(64) NOT NULL,
  `sinopsis` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `cover`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `harga`, `sinopsis`) VALUES
(1, 'sophie.jpg', 'Dunia Sophie', 'Jostien Gaarden', 'Mizan Pustaka', '2010', 'Rp. 120.000', '                    Sophie, seorang pelajar sekolah menengah berusia empat belas tahu. Suatu hari sepulang sekolah, dia mendapat sebuah surat misterius yang hanya berisikan satu pertanyaan: “Siapa kamu?”\r\n\r\nBelum habis keheranannya, pada hari yang sama dia mendapat surat lain yang bertanya: “Dari manakah datangnya dunia?”\r\n\r\nSeakan tersentak dari rutinitas hidup sehari-hari, surat-surat itu mempuat Sophie mulai mempertanyakan soal-soal mendasar yang tak pernah dipikirkannya selama ini. Dia mulai belajar filsafat.\r\n\r\n*****'),
(2, 'anna.jpg', 'Dunia Anna', 'Jostien Gaarden', 'Mizan', '2014', 'Rp. 45.000', 'Bumi 2082, Nova sangat terkejut saat tiba-tiba di terminal online-nya muncul surat dari nenek buyutnya, Anna. Surat yang ditulis 70 tahun lalu, tepat tanggal 12.12.12. Tepat saat nenek buyutnya berusia 16 tahun seperti Nova saat ini.\r\n\r\nSungguh misterius, bagaimana mungkin 70 tahun lalu nenek buyutnya sudah tahu bahwa kelak cicitnya bernama Nova? Dan dari mana nenek buyutnya tahu tentang keresahan-keresahan Nova? Tentang bumi yang sudah tak seindah dulu lagi, tentang spesies yang punah, tanah-tanah yang tenggelam, kutub yang meleleh. Dan, benarkah cincin rubi merah dari legenda Aladin, menjadi kunci untuk mengembalikan keseimbangan bumi? Cincin yang selama ini melingkar di jari Anna, nenek buyutnya?\r\n\r\nJostein Gaarder, penulis Dunia Sophie, kembali dengan Dunia Anna, sekali lagi mengajak kita berkaca. Dengan kisah yang ringan namun penuh makna, Jostein Gaarder kembali mengajak pembaca merenungkan eksistensi manusia dan semesta.'),
(3, 'bumi.jpg', 'Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 'Rp. 90.000', 'Namaku Raib, usiaku 15 tahun, kelas sepuluh. Aku anak perempuan seperti kalian, adik-adik kalian, tetangga kalian. Aku punya dua kucing, namanya si Putih dan si Hitam. Mama dan papaku menyenangkan. Guru-guru di sekolahku seru. Teman-temanku baik dan kompak.\r\n\r\nAku sama seperti remaja kebanyakan, kecuali satu hal. Sesuatu yang kusimpan sendiri sejak kecil. Sesuatu yang menakjubkan.\r\n\r\nNamaku Raib. Dan aku bisa menghilang.\r\n\r\nBuku pertama dari serial \"BUMI\"'),
(4, 'bulan.jpg', 'Bulan', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 'Rp. 85.000', 'Namanya Seli, usianya 15 tahun, kelas sepuluh, dan dia salah satu teman baikku. Dia sama seperti remaja yang lain. Menyukai hal yang sama, mendengarkan lagu-lagu yang sama, pergi ke gerai fast food, menonton serial drama, film, dan hal-hal yang disukai remaja.\r\n\r\nTetapi ada sebuah rahasia kecil Seli dan aku yang tidak pernah diketahui siapa pun. Sesuatu yang kami simpan sendiri sejak kecil. Aku bisa menghilang dan Seli bisa mengeluarkan petir.\r\n\r\nDengan kekuatan itu, kami bertualang menuju tempat-tempat yang menakjubkan.\r\n\r\nBuku kedua dari serial \"BUMI\"'),
(5, 'matahari.jpg', 'Matahari', 'Tere Liye', 'Gramedia Pustaka Utama', '2016', 'Rp. 85.000', 'Namanya Ali, 15 tahun, kelas X. Jika saja orangtuanya mengizinkan, seharusnya dia sudah duduk di tingkat akhir ilmu fisika program doktor di universitas ternama. Ali tidak menyukai sekolahnya, guru-gurunya, teman-teman sekelasnya. Semua membosankan baginya. Tapi sejak dia mengetahui ada yang aneh pada diriku dan Seli, teman sekelasnya, hidupnya yang membosankan berubah seru. Aku bisa menghilang, dan Seli bisa mengeluarkan petir. Ali sendiri punya rahasia kecil. Dia bisa berubah menjadi beruang raksasa. Kami bertiga kemudian bertualang ke tempat-tempat menakjubkan. Namanya Ali. Dia tahu sejak dulu dunia ini tidak sesederhana yang dilihat orang. Dan di atas segalanya, dia akhirnya tahu persahabatan adalah hal yang paling utama.'),
(6, 'bintang.jpg', 'Bintang', 'Tere Liye', 'Gramedia Pustaka Utama', '2017', 'Rp. 85.000', 'Kami bertiga teman baik. Remaja, murid kelas sebelas. Penampilan kami sama seperti murid SMA lainnya. Tapi kami menyimpan rahasia besar.\r\n\r\nNamaku Raib, aku bisa menghilang. Seli, teman semejaku, bisa mengeluarkan petir dari telapak tangannya. Dan Ali, si biang kerok sekaligus si genius, bisa berubah menjadi beruang raksasa. Kami bertiga kemudian bertualang ke dunia paralel yang tidak diketahui banyak orang, yang disebut Klan Bumi, Klan Bulan, Klan Matahari, dan Klan Bintang. Kami bertemu tokoh-tokoh hebat. Penduduk klan lain.\r\n\r\nIni petualangan keempat kami. Setelah tiga kali berhasil menyelamatkan dunia paralel dari kehancuran besar, kami harus menyaksikan bahwa kamilah yang melepaskan \"musuh besar\" nya.\r\nIni ternyata bukan akhir petualangan, ini justru awal dari semuanya?\r\nBuku keempat dari serial \"BUMI\"'),
(7, 'php.jpg', 'PHP untuk Programmer Pemula', 'Jubilee Enterprise', 'Elex Media Komputindo', '2019', 'Rp. 75.000', 'PHP merupakan bahasa pemrograman yang penting untuk dikuasai apabila Anda ingin membuat website. Perintah dan syntax PHP sangat mudah dipahami dan cara penulisan kode-kode program ini mendekati bahasa manusia. Oleh karena itu, orang awam pasti bisa menggunakan PHP apabila serius mempelajari bahasa pemrograman ini. \r\n\r\nBuku ini membantu Anda mempelajari PHP, mulai dari bagaimana cara menginstal server dan menulis teks sederhana di dalam halaman website. Selanjutnya, pembahasan akan terus meningkat dan berpuncak pada cara-cara pemrograman database dengan MySQL. \r\n\r\nSelain itu, dilengkapi pula dengan fitur-fitur sebagai berikut: \r\n• Video course berdurasi 9 jam berbahasa Indonesia. \r\n• Quiz untuk membantu Anda mengasah pengetahuan PHP. \r\n• Certificate of Completion dari Udemy.com untuk menambah portfolio kerja Anda. \r\nPada akhirnya, buku ini akan membantu Anda memahami PHP sekaligus mempermudah pencarian kerja di industri web programming. Good Luck!'),
(8, 'sejarahdunia.jpg', 'Sejarah Dunia yang Disembunyikan', 'Jonathan Black', 'Alvabet', '2015', 'Rp. 130.000', 'Banyak orang mengatakan bahwa sejarah ditulis oleh para pemenang. Hal ini sama sekali tak mengejutkan alias wajar belaka. Tetapi, bagaimana jika sejarah—atau apa yang kita ketahui sebagai sejarah—ditulis oleh orang yang salah? Bagaimana jika semua yang telah kita ketahui hanyalah bagian dari cerita yang salah tersebut?\r\n\r\nDalam buku kontroversial yang sangat tersohor ini, Jonathan Black mengupas secara tajam penelusurannya yang brilian tentang misteri sejarah dunia. Dari mitologi Yunani dan Mesir kuno sampai cerita rakyat Yahudi, dari kultus Kristiani sampai Freemason, dari Karel Agung sampai Don Quixote, dari George Washington sampai Hitler, dan dari pewahyuan Muhammad hingga legenda Seribu Satu Malam, Jonathan menunjukkan bahwa pengetahuan sejarah yang terlanjur mapan perlu dipikirkan kembali secara revolusioner. Dengan pengetahuan alternatif ihwal sejarah dunia selama lebih dari 3.000 tahun, dia mengungkap banyak rahasia besar yang selama ini disembunyikan.\r\n\r\nBuku ini akan membuat Anda mempertanyakan kembali segala sesuatu yang telah diajarkan kepada Anda. Dan, berbagai pengetahuan baru yang diungkapkan sang penulis benar-benar akan membuka dan mencerahkan wawasan Anda.'),
(9, '40kisah.jpg', '40 Kisah Akhir Hidup Kezaliman Makhluk-makhluk Allah', 'Kaserun As Rahman', 'Lentera Hati', '2015', 'Rp. 70.000', 'Islam tidak hanya melarang penyebaran perbuatan yang keji, tapi juga segala hal yang mengantarkan kepadanya. Orang-orang yang berbuat zalim itu tidak merasa bahwa dirinya adalah orang zalim, hingga dia semakin jauh tersesat, bahkan semakin jauh dari hidayah Allah swt. Kezaliman yang dilakukan akan membuahkan kezaliman selanjutnya.\r\n\r\n40 Kisah Akhir Hidup Kezaliman Makhluk-makhluk Allah ini disadur dari beberapa kitab, antara lain: 100 Kishah min Nahayah azh-Zhalimin karya Hani al-Hajj, al-Jaza\' min Jinsi al-\'Amal karya Sayyid Husein Affani, al-Qashash wa \'Ibar karya Syaikh \'Abdullah Yusuf Ajlan, at-Tahdzir min Su\' al-Khatimah karya as-Suhaibani, as-Silsilah ash-Shahihah karya Syaikh Muhammad Nashiruddin al-Albani.'),
(10, 'panglima.jpg', 'Para Panglima Islam Penakluk Dunia', 'Muhammad Ali', 'Umul Qura & Aqwam', '2016', 'Rp. 130.000', 'Siapapun yang menelusuri kisah perjalanan hidup para pahlawan Islam penakluk dunia pasti akan tertegun membacanya. Sebab, panji mereka tidak pernah runuth—jarang sekali yang runtuh—melainkan dalam dua situasi, yaitu situasi pertikaian, serta situasi kala mereka terperdaya oleh kekuatan diri dan kemampuan-kemampuan manusia.\r\n\r\nDi luar itu, kisah perjalanan hidup mereka adalah buku penuh berisi catatan penaklukan-penaklukan; sejarah umat beriman yang dengan jihad dan iman berhasil menorehkan peradaban terbesar dan paling maju. Ketika penaklukan-penaklukan memperdaya para pemenang untuk berlaku dzalim dan semena-mena kepada pihak yang dikalahkan, maka penaklukan yang dilakukan para pahlawan Islam adalah cahaya, pembebasan, dan sinar yang menerangi para penduduk negeri-negeri yang mereka takhlukkan.\r\n\r\nAnda pasti tercengan dengan perubahan para penduduk negeri-negeri tersebut dari sebelumnya memerangi dan membeci para prajurit Islam, menjadi prajurit-prajurit yang bergabung di bawah panji Islam hanya dalam waktu relatif singkat. Mereka semua memerangi siapa pun yang kafir terhadap Allah, memusuhi siapa pun ang menyakiti Rasul-Nya dan para wali-Nya. Sungguh, berkuasanya (kemenangan) orang-orang beriman di muka bumi memiliki beberapa syarat dan aturan yang harus terpenuhi.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
