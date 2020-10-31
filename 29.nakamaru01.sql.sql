-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_item_table`
--

CREATE TABLE `gs_item_table` (
  `id` int(11) NOT NULL,
  `title` varchar(16) CHARACTER SET utf8 NOT NULL,
  `age` int(16) NOT NULL,
  `place` varchar(36) CHARACTER SET utf8 NOT NULL,
  `image` varchar(182) COLLATE utf32_unicode_ci NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `secretmesto` varchar(360) COLLATE utf32_unicode_ci DEFAULT NULL,
  `secretmes` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `inputdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- テーブルのデータのダンプ `gs_item_table`
--

INSERT INTO `gs_item_table` (`id`, `title`, `age`, `place`, `image`, `comment`, `secretmesto`, `secretmes`, `inputdate`) VALUES
(6, 'めるちゃんのデート', 7, 'おうち', 'file/IMG_9493.JPG', '楽しそうな様子を上手に表現しています', 'choix-2', 'これってとってもいいよね！', '2020-10-29 09:22:04'),
(7, 'おもちゃのお城', 7, 'おうち', 'file/IMG_1636.jpg', 'おもちゃをたくさん組み合わせて上手に世界を表現しています', 'choix-2', 'この世界観はいい！', '2020-10-29 09:23:08'),
(8, 'おもちゃのお城', 7, 'おうち', 'file/IMG_1636.jpg', 'おもちゃをたくさん組み合わせて上手に世界を表現しています', 'choix-2', 'この世界観はいい！', '2020-10-29 09:23:19'),
(9, 'この世界のはじまり', 3, '公園', 'file/IMG_0464.jpg', 'お砂場でお山をつくって楽しみました', 'choix-2', '', '2020-10-29 09:24:42'),
(11, 'しっぱいしても大丈夫', 4, 'おうち', 'file/IMG_9493.JPG', '', 'choix-2', '', '2020-10-29 09:36:09');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_item_table`
--
ALTER TABLE `gs_item_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_item_table`
--
ALTER TABLE `gs_item_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
