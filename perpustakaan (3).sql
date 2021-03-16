-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2020 pada 07.07
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(5) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(35) NOT NULL,
  `penerbit` varchar(35) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isi` int(4) NOT NULL,
  `foto` char(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isi`, `foto`, `deskripsi`) VALUES
(2, 1, 'Ayat Sunyi', 'Emi Suy', 'Basa Basi', 2018, 88, '1.jpg', 'Dalam buku ini, hampir semua puisi saya melulu sibuk “ngurusin” perkara (ke)sunyi(an) dengan menggali berbagai makna sunyi yang terkandung. Makna sunyi itu menjadi lebih mewah Iagi bagi perempuan, khususnya di lndonesia.'),
(3, 1, 'Cinta Seperti Angin', 'Neruda, Rumi, Murakami', 'Baca', 2018, 138, '2.jpg', 'Buku unik ini memuat kumpulan kutipan puisi dan kata-kata cinta terpilih dari para penulis terbaik dunia serta para tokoh ternama sepanjang sejarah, dari penyair ternama semacam Pablo Neruda, Emily Dickinson, dan Jalaluddin Rumi, para pengarang serupa Haruki Murakami, Arundhati Roy, dan Orhan Pamuk, hingga para pesohor seperti Albert Einstein, John Lennon, dan Bob Dylan.'),
(4, 1, 'Doa Untuk Anak Cucu', 'W. S. Rendra', 'Bentang Pustaka', 2016, 120, '3.jpg', 'Buku ini menangkup sajak-sajak terbaik Rendra, sehingga pembaca bisa dengan mudah menemukan sajak-sajaknya yang sudah dikenal secara luas. Pembaca juga akan mendapati jejak kreativitas Rendra di dalamnya.'),
(5, 1, 'Firman Dan Sebiji Apel', 'Dalasari Pera', 'Basa Basi', 2019, 98, '4.jpg', 'Memadukan kesederhanaan dan kemewahan dalam puisi bukanlah perkara mudah, meski telah membaca ribuan kali buku tentang cara mudah menulis puisi. Saya meyakini bahwa dalam perpaduan itu telah tumbuh daya pikat puisi yang mampu berbicara tentang apa saja, di mana saja, dan kapan saja. Karena itulah, Firman dan Sebiji Apel menjadi sebuah rumah bagi puisi-puisi saya.'),
(6, 1, 'Keledai Yang Mulia', 'Mario F. Lawi', 'Shira Media', 2018, 116, '5.jpg', 'Keledai yang Mulia adalah kumpulan puisi Mario F. Lawi yang banyak mengisahkan cerita-cerita religius serta cinta kasih dalam artian luas.'),
(7, 1, 'Makrifat Daun Daun Makrifat', 'Kuntowijoyo', 'Basa Basi', 2018, 66, '6.jpg', 'Sebagian sajak-sajak ini sajak diam, harus dibaca diam-diam, tanpa irama. Sebangsa yang membuai, tetapi tidak mengajak untuk bergoyang. Semacam pepatah-petitih. Diam juga bagian dari irama.'),
(8, 1, 'Mencari Raden Saleh', 'Kurnia Effendi', 'Diva Press', 2019, 138, '7.jpg', 'Di Negeri Kincir Angin itu saya tak semata melakukan riset dan napak tilas jejak Raden Saleh melainkan juga mengeruk secara rakus apa pun yang berpotensi menjadi sebuah pengalaman batin bernilai, berharga, bermanfaat. Satu di antara oleh-oleh yang kemudian lahir dan berwujud adalah kumpulan puisi ini.'),
(9, 1, 'Pada Debar Akhir Pekan', 'Rendy Jean Satria', 'Basa Basi', 2018, 104, '8.jpg', 'Sajak-sajaknya mengalir dari peristiwa sehari-hari, dari perjalanan dan pelancongan ke tempat-tempat tertentu. Dari situ muncul situasi-situasi yang kadang paradoksal, namun penyair berhasil menghayatinya secara puitik.'),
(10, 1, 'Perempuan Jika Itulah Namamu', 'Kang Maman', 'Grasindo', 2018, 192, '9.jpg', 'Dalam buku puisi Perempuan Jika Itulah Namamu, Anda akan menemukan gaya berpuisi kang Maman yang lihai memainkan kata membentuk makna yang mendalam.'),
(11, 1, 'Untuk Matamu', 'Kharisma P. Lanang', 'Mediakita', 2019, 264, '10.jpg', 'Untuk Matamu adalah buku puisi karya Karisma P. Lanang. Buku ini berisi puluhan puisi yang ia tulis sebagai rekam jejak kepenulisannya.'),
(12, 2, 'Uncommon Type', 'Tom Hanks', 'Noura', 2019, 500, '11.jpg', 'Untuk pertama kalinya, aktor pemenang dua Piala Oscar ini berbagi kisahnya kepada dunia bukan melalui media film—sebuah kesempatan untuk menyelami pikiran dan pandangannya tentang persahabatan, keluarga, cinta, dan keseharian manusia.'),
(13, 2, 'Kamis Yang Manis', 'John Steinback', 'Basa Basi', 2019, 400, '12.jpg', 'Kamis yang Manis pada dasarnya adalah kisah cinta yang kebijaksanaan dan kemanusiaan penulisnya mengisi keseluruhan bagiannya. Ini adalah karya Steinbeck yang lebih ringan dan lebih optimis; tidak semengusik epik Grapes of Wrath atau novel politik, In Dubious Battle, misalnya, tetapi tidak ada yang kurang dari karya yang mendalam ini.'),
(14, 2, 'Serat Tripama', 'Sujiwo Tejo', 'Bentang Pustaka', 2016, 196, '13.jpg', 'Serat Tripama gubahan Sujiwo Tejo adalah sebuah novel grafis yang menyastrakan komik melalui setiap titik dan garis dalam ketergambarannya. Pada novel grafis, gambarberfungsi menceritakan dirinya sendiri, dan contoh terbaik penceritaan itu ada pada Serat Tripama ini.'),
(15, 2, 'Kepada Siapa Genta Berdentangan', 'Ernest Hemmingway', 'Diva Press', 2017, 600, '14.jpg', 'Buku ini dipersembahkan Hemingway kepada Martha Gellhorn, wanita yang dicintainya dengan renjana membara dan bersama-sama dengannya meliput Perang Saudara Spanyol.'),
(16, 2, 'Masa Kecil', 'Leo Tolstoy', 'Basa Basi', 2017, 200, '15.jpg', 'Melalui novel ini, kita bisa membaca gambaran kecil tentang Rusia pada masa itu dan gambaran besar tentang “Tolstoy”, dan terlepas dari posisi dan perannya dalam sejarah kepenulisan Tolstoy, novel ini merupakan bacaan yang sanggup mengikat kita hingga kata terakhirnya.'),
(17, 2, 'Victory', 'Luna Torashyngu', 'Gramedia Pustaka Utama', 2018, 280, '16.jpg', 'Benarkah tinggal serumah dengan saudara tiri sangat nggak menyenangkan? Kalo pertanyaan itu diajukan pada Raka, dia pasti setuju. Paling nggak itulah yang ia alami ketika harus tinggal dengan Oti, adik tirinya yang tomboi abis.'),
(18, 2, 'Pingkan Melipat Jarak', 'Sapardi Joko Damono', 'Gramedia Pustaka Utama', 2017, 140, '17.jpg', 'Adapun di novel kedua ini, mengambil sudut pandang seorang Pingkan. Bagaimana Pingkan harus bergelut dengan jiwa dan pikirannya sendiri di saat Sarwono yang padahal sebentar detik saja akan menjadi pendampingnya tetapi dinyatakan koma. Sekelabat waktu saja, Sarwono tak lagi berbicara pada Pingkan dengan bahasa sastranya yang khas. Pingkan dihantui rindu akan semua hal tentang Sarwono.'),
(19, 2, 'Tiba Sebelum Berangkat', 'Faisal Oddang', 'Kompas Gramedia Pustaka', 2018, 212, '18.jpg', 'Kisah yang terbentang dari tahun 1950 sampai ketika Anda membacanya saat ini. Pengkhianatan, air mata, penyiksaan, dendam, kematian, amarah dan cerita cinta yang muram dikisahkan oleh seseorang yang sedang berada di ruang penyekapan. Seseorang yang menunggu satu per satu anggota tubuhnya ditanggalkan sebelum dijual.'),
(20, 2, 'Lingkar Tanah Lingkar Air', 'Ahmad Tohari', 'Gramedia Pustaka Utama', 2019, 168, '19.jpg', 'Sejarah membawa Amid masuk menjadi anggota laskar DI/TII yang menentang Pemerintah RI. Amid yang sesungguhnya seorang yang sangat cinta Tanah Air sering bimbang karena pasukannya sering memerangi warga seagama.'),
(21, 2, 'Terima Kasih Atas Kehidupan Ini', 'Edi Ah Iyubenu', 'Diva Press', 2017, 152, '20.jpg', 'Ada banyak kenyataan di sini, banyak hikayat, banyak renungan, banyak perjalanan. Perjalanan kita semua: setiap kehidupan kita.'),
(22, 3, 'Malam Terakhir', 'Leila S. Chudori', 'Kompas Gramedia Pustaka', 2018, 120, '21.jpg', 'Leila bercerita tentang kejujuran, keyakinan, tekad, prinsip dan pengorbanan. Banyak idiom dan metafor baru di samping padangan falsafi yang terasa baru karena pengungkapan yang baru. Sekalipun bermain dalam khayalan lukisan-lukisannya sangat kasat mata.'),
(23, 3, 'Hello Goodbye', 'Ditta Amelia Saraswati', 'Noura', 2018, 168, '22.jpg', 'Semua isi dari buku ini memang hampir tidak pernah saya posting di internet, semuanya mengendap di folder laptop, hanya beberapa orang saja yang sempat saya beri draft pertama buku ini. Draft yang sama sekali belum saya ubah sejak 7 tahun lalu.'),
(24, 3, 'Kamu Sedang Membaca Tulisan Ini', 'Eko Triono', 'Basa Basi', 2017, 220, '23.jpg', 'Eko Triono, penulis muda berbakat dan berprestasi ini, menghadirkan cerita-cerita tak biasa yang hidup di sekitar kita. Cerita dalam bentuk kamus, soal ulangan harian, teka-teki silang, resep masakan, sampai cerita metafiksi.'),
(25, 3, 'Kukila', 'Aan Mansyur', 'Gramedia Pustaka Utama', 2012, 192, '24.jpg', 'Selain “Kukila (Rahasia Pohon Rahasia)”, di dalam buku ini ada dua belas cerita pendek lain, dikisahkan dalam kata-kata Aan Mansyur yang manis, bersahaja, kadang sedikit menggoda.'),
(26, 3, 'Nelayan Itu Berhenti Melaut', 'Safar Banggai', 'Pojok Cerpen', 2019, 80, '25.jpg', 'Buku perdana Safar Banggai, memuat dua belas cerita pendek yang mengambil tema laut.'),
(27, 3, 'Ojung', 'Edi Ah Iyubenu', 'Basa Basi', 2017, 204, '26.jpg', 'Ojung adalah kumpulan cerpen karya Edi Ah Iyubenu. Beberapa cerpennya mengangkat tema Madura yang gelap, berbau mistik, juga kalimat-kalimatnya yang rapat.'),
(28, 3, 'Para Peziarah Yang Aneh', 'Gabriel Garciela Marquez', 'Basa Basi', 2018, 264, '27.jpg', 'Sekali lagi, lewat karyanya yang menegangkan ini, Gabriel García Márquez mengajak kita ke dalam dunia yang indah dan magis, yang akan membuat kita tak berhenti terpesona.'),
(29, 3, 'Persekongkolan Ahli Makrifat', 'Kuntowijoyo', 'Diva Press', 2019, 187, '28.jpg', 'Kabarnya, ia masuk terekat, dia selalu mengamalkan wirid, mungkin dari gurunya… Kadang-kadang dia juga mengasingkan diri untuk menyempurnakan agamanya… Setiap usahanya selalu berhasil. Termasuk politik. Termasuk poitik?'),
(30, 3, 'Sawerigading Datang Dari Laut', 'Faisal Oddang', 'Diva Press', 2019, 192, '29.jpg', 'Dengan kalimat-kalimat pembuka yang menyentak dan kerap sureal, cerita-cerita di buku ini membuhul kepiawaian mendongeng Faisal Oddang dengan kepekaannya untuk menciptakan gambaran-gambaran yang seolah-olah berada di ambang antara dunia nyata dan tak nyata yang berlatar Sulawesi.'),
(31, 3, 'Suami Abadi', 'Fyodor Dostoevsky', 'Basa Basi', 2019, 368, '30.jpg', 'Debar dalam Suami Abadi adalah debar yang mengandung ketaknyamanan yang luar biasa karena adanya ketakutan dan kebencian yang tersirat.'),
(32, 4, 'Becoming', 'Michelle Obama', 'Noura', 2019, 576, '31.jpg', 'Dengan narasi yang anggun, penuh humor, dan keterusterangan, Michelle menuturkan kisah di balik layar kehidupannya selama delapan tahun di Gedung Putih yang membuatnya tak hanya dikenal, tetapi juga semakin mengenal negaranya.'),
(33, 4, 'Perihal Cinta Kita Semua Pemula', 'Ali Maruf', 'Buku Mojok', 2019, 117, '32.jpg', 'Perihal Cinta Kita Semua Pemula adalah segala tumpahan hati Mohammad Ali Ma’ruf. Ditulis dengan segenap perasaan. Dipertegas dengan ilustrasi yang akan membuatmu tersenyum getir dan tanpa sadar air matamu menetes begitu saja.'),
(34, 4, 'Nanti Kita Sambat Tentang Hari Ini', 'Mas Aik', 'Buku Mojok', 2019, 164, '33.jpg', 'Kata siapa ‘sambat’ atau ‘mengeluh’ hanyalah kegiatan nirfaedah? ‘Nanti Kita Sambat tentang Hari Ini’ membuktikan padamu, bahwa manusia punya hak untuk mengeluh.\r\nHADEEEEEH…..\r\n'),
(35, 4, 'Jika Kita Tak Pernah Jatuh Cinta', 'Alvi Syahrin', 'Gagas Media', 2018, 223, '34.jpg', 'Jika Kita Tak Pernah Jatuh Cinta dituliskan untukmu yang pernah merasa terpuruk karena cinta, lalu bangkit lagi disebabkan hal yang sama.'),
(36, 4, 'Seandainya Aku Bisa Menanam Angin', 'Fawaz', 'Buku Mojok', 2019, 196, '35.jpg', 'Sokola Rimba adalah rangkuman kisah, perpaduan tawa bahagia dan tangis sendu. Kisah yang tak pernah sudah tentang hubungan manusia paling jernih: saling percaya, menerima perbedaan, hingga mengiklaskan.'),
(37, 5, 'Muslimah Yang Diperdebatkan', 'Kalis Mardiasih', 'Buku Mojok', 2019, 202, '36.jpg', 'Narasi yang ditulis Kalis dalam buku ini berfokus kepada tubuh, kerudung, kemanusiaan, dan relijiusitas perempuan. Akhir kata, selamat membaca!'),
(38, 5, 'OTW Hijrah', 'Jee Luvina', 'Salam', 2019, 120, '37.jpg', 'Hijrahlah, meskipun kau telah lupa caranya berbuat baik. Hijrahlah, meskipun kau telah lupa cara beribadah. Dan hijrahlah, meskipun telah lama kau tak menyebut nama-Nya.'),
(39, 5, 'Jejak Jejak Islam', 'Ahmad Rofi Usmani', 'Buyan', 2016, 448, '38.jpg', 'Melalui kamus sejarah dan peradaban Islam ini, pembaca dapat mengetahui dan memahami sejarah Islam secara ringkas dan kontribusi masyarakat Muslim di pelbagai penjuru dunia dengan segala kelebihan, kekurangan, dan jasa-jasa mereka. Data-data tersebut direkam ke dalam 700 entri yang dijelaskan secara sistematis dan detail dalam kamus ini.'),
(40, 5, 'Saring Sebelum Sharing', 'Nadirsyah Hosen', 'Bentang Pustaka', 2019, 344, '39.jpg', 'Melalui buku Saring Sebelum Sharing, Gus Nadir mengajak kita untuk memahami teks melalui konteks, meninggalkan kebiasaan belajar instan, dan tidak mudah menghakimi yang lain hanya dari sepenggal ayat maupun hadis.'),
(41, 5, 'Hidup Harus Pintar Ngegas & Ngerem', 'Emha Ainun Najib', 'Noura', 2019, 244, '40.jpg', 'Jangan memasuki suatu sistem yang membuat Anda melampiaskan diri. Tapi, dekat-dekatlah dengan sahabat yang membuat Anda mengendalikan diri. Karena Islam itu mengendalikan, bukan melampiaskan. Hidup itu harus bisa ngegas dan ngerem.'),
(42, 6, 'Republik', 'Cicero', 'Basa Basi', 2018, 120, '41.jpg', 'Republik Cicero amat dikagumi oleh mereka yang hidup pada masa itu. Akan tetapi, tak lama setelah karya ini ditulis, para tiran menguasai Roma, sehingga Horace, Virgil, Seneca, Quintilian, Pliny, dan bahkan Tacitus tidak berani memujinya. Di tengah kekacauan pemerintahan dan republik, jelas sekali Cicero mengupayakan tindakan patriotik.'),
(43, 6, 'Kuasa Media Di Indonesia', 'Ross Tapsell', 'Marjin Kiri', 2018, 168, '42.jpg', 'Berdasarkan riset selama tujuh tahun, buku ini meneliti bagaimana digitalisasi telah membuat industri media massa di Indonesia mengalami pemusatan dan konglomerasi, yang memungkinkan para oligark pemilik media menjadi semakin kaya sekaligus berpengaruh secara politik.'),
(44, 6, 'Kekerasan Dan Identitas', 'Amartya Sen', 'Marjin Kiri', 2017, 220, '43.jpg', 'Kekerasan dan Identitas membongkar stereotip-stereotip soal Timur dan Barat dengan menelusuri isu-isu multikulturalisme, pasca-kolonialisme, fundamentalisme, terorisme, dan globali-sasi.'),
(45, 6, 'Dari Adat Ke Politik', 'Nur Iman Subono', 'Marjin Kiri', 2012, 192, '44.jpg', 'Buku ini berusaha menjawab pertanyaan-pertanyaan mendesak seperti apakah kebangkitan adat ini bersifat rasis dan tak sejalan dengan demokrasi, atau justru sebaliknya? Bagaimana caranya partai yang berbasiskan masyarakat adat bisa merengkuh sektor-sektor lain dalam masyarakat yang kian modern? Apakah keberadaan partai masyarakat adat adalah bagian dari keberagaman atau bertentangan dengannya? Pertanyaan-pertanyaan yang sangat relevan untuk direfleksikan dengan kondisi Indonesia saat ini.'),
(46, 6, 'Bersaksi Untuk Pembaruan Agraria', 'Noer Fauzi Rchman', 'Insist Press', 2019, 80, '45.jpg', 'Semasa lebih dari 17 tahun setelah kejadian yang menentukan itu, penulis secara otodidak menjadi saksi dari peristiwa-peristiwa perampasan hak petani, mempelajari dan menuliskan keadaan agraria penduduk dan politik agraria yang menyebabkannya, melancarkan kampanye mengeraskan suara penduduk korban, dan menyelenggarakan kegiatan pendidikan hingga advokasi untuk perubahan kebijakan. Buku ini merupakan salah satu endapan pengetahuan dari proses yang panjang itu.'),
(47, 7, 'The Human Story', 'James C. Davis', 'Baca', 2018, 610, '46.jpg', 'Sejarah umat manusia sungguh mempesona. Dalam The Human Story, James C. Davis dengan cepat dan jernih menceritakan bagaimana orang-orang zaman dulu mulai menetap dan mendirikan kota-kota, menaklukkan tetangga dan membangun agama, serta belakangan mengobarkan perang dunia dan menjangkau antariksa.'),
(48, 7, 'Aku Diponegoro', 'Landung Simatupang', 'Kompas Gramedia Pustaka', 2015, 128, '47.jpg', 'Sebagai naskah yang pernah dipentaskan di empat kota: Magelang, Yogyakarta, Jakarta, dan Makassar, buku ini dapat dinikmati sebagai narasi yang memikat. Aku Diponegoro! merupakan upaya penulis dan penerbit dalam menyuguhkan penulisan sejarah secara populer.'),
(49, 7, 'Penghancuran Buku Dari Masa Ke Masa', 'Fernando Baez', 'Marjin Kiri', 2018, 410, '48.jpg', 'Bertentangan dengan pendapat umum, Báez menemu­kan bahwa buku-buku dihancurkan bukan oleh ketidaktahuan awam atau kurangnya pendidikan, melainkan justru oleh kaum terdidik dengan motif ideologis masing-masing.'),
(50, 7, 'Informan Sunda Masa Kolonial', 'Jajang A. Rohmana', 'Octopus', 2018, 360, '49.jpg', 'Dalam kajian sejarah poskolonial, menelusuri jejak Kiai Hasan Mustapa akan membuka tabir jejak koleganya, Snouck Hurgronje. Kajian yang dilakukan Jajang A Rohmana dalam buku ini memberikan banyak informasi yang selama ini masih menyimpan tanda tanya besar. Namun, dengan membongkar surat-surat antara keduanya, kita diajak menyelami kepiawaian Kiai Hasan Mustapa dalam memoderasi kolonial melalui Hurgronje. '),
(51, 7, 'Identitas Politik Umat Islam', 'Kuntowijoyo', 'Ircisod', 2018, 307, '50.jpg', 'Dalam politik, umat Islam seperti penumpang perahu yang berlayar di laut lepas, tanpa bintang, tanpa kompas, tidak tahu tujuan, dan tidak tahu cara berlayar. Kadang-kadang umat dibuat bingung karena panutannya berbuat seenaknya, lupa bahwa di belakangnya ada banyak orang.'),
(52, 2, 'Anak-Anak Kuala', 'Fajar Mesaz', 'Basa Basi', 2019, 100, '101.jpg', 'Simbol paling benderang tentang harapan hanya ada pada bocah-bocah muara yang hilir mudik menuju sekolah terapung dengan tangan-tangan guru relawan yang gemetar memeluknya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(255) NOT NULL,
  `id_peminjaman` int(255) NOT NULL,
  `id_buku` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `id_peminjaman`, `id_buku`) VALUES
(6, 2, 48),
(7, 2, 2),
(8, 3, 5),
(9, 3, 35),
(10, 3, 36),
(16, 7, 4),
(17, 7, 9),
(18, 8, 3),
(19, 9, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` char(10) NOT NULL,
  `detail_kategori` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `detail_kategori`) VALUES
(1, 'Fiksi', 'Puisi & Prosa'),
(2, 'Fiksi', 'Novel'),
(3, 'Fiksi', 'Kumpulan Cerpen'),
(4, 'Nonfiksi', 'Inspirasi & Motivasi'),
(5, 'Nonfiksi', 'Agama & Spiritual'),
(6, 'Nonfiksi', 'Politik & Ilmu Sosial'),
(7, 'Nonfiksi', 'Sejarah & Militer'),
(8, 'Nonfiksi', 'Psikologi'),
(9, 'Fiksi', 'Komik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'zxcvbnm', 1, 0, 0, NULL, 20191230);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(2, 9, '2019-12-18', '2019-12-25', 1),
(3, 11, '2019-12-19', '2019-12-26', 1),
(7, 14, '2019-12-30', '2020-01-06', 1),
(8, 11, '2019-12-30', '2020-01-06', 1),
(9, 11, '2020-01-01', '2020-01-08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `telepon` varchar(300) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `telepon`, `alamat`, `username`, `password`, `level`) VALUES
(1, 'Nida', '08123456789', 'Jl Remujung Malang', 'nida', 'nida', 'admin'),
(9, 'Viviyona Apriani', '081903884547', 'malang', 'Viviyona Apriani', 'yona', 'user'),
(11, 'Nadya Rizqa', '081903882331', 'Malang', 'nadya', 'nadya', 'user'),
(13, 'Dwii', '08123124', 'Jl. HOS Cokroaminoto, Wuluhan, Jember', 'dwii', 'asdf', 'user'),
(14, 'Rifaldi Dwi', '082231302177', 'Jl. Semeru No. 8', 'rifaldii', 'rifaldii', 'user'),
(16, 'dewi septiana', '081903882329', 'Jl. Bebekan Slorok', 'dewi', 'dewi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk0_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk0_peminjaman` (`id_peminjaman`),
  ADD KEY `fk1_buku` (`id_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk0_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk0_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `fk0_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `fk1_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk0_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
