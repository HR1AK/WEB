-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 12 2022 г., 22:24
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `records`
--

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(127) NOT NULL DEFAULT 'no_img.jpeg',
  `full_name` varchar(127) NOT NULL,
  `id_competition` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `record_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `img_path`, `full_name`, `id_competition`, `description`, `record_date`) VALUES
(1, 'lewis_hamilton.jpg', 'lewis hamilton', 5, '103 victories. The most wins of all time. In his 299 race starts, he has won 34.45% of the races he entered.', '2021-09-26'),
(2, 'asmir_begovich.jpg', 'Asmir Begovic', 1, 'Stoke City goalkeeper Asmir Begovic entered the record book in 2014 when he scored a long-range shot against Southampton. The distance of his strike - helped by the wind - was 91.9 m.', '2013-11-02'),
(3, 'lionelmessi.png', 'Lionel Messi', 1, 'Barcelona\'s Lionel Messi ended 2012 with 91 goals, surpassing the previous record of 85 goals set by German international and Bayern Munich player Gerd Müller in 1972.', '2012-12-10'),
(4, 'Usain_Bolt.png', 'Usain Bolt', 3, 'Usain Bolt ran 100 metres in 9.58 seconds in the final of the World Athletics Championship to break his own world record.', '2012-08-16'),
(5, 'wilt_chamberlain.jpeg', 'Wilt Chamberlain', 2, 'American Wilt Chamberlain became the highest scoring player in the history of one match in the history of basketball. In the Philadelphia-New York game, he bought 100 points in one game.', '2016-10-04'),
(6, 'Bill_Russell.png', 'Bill_Russell', 2, 'With 11 championship rings, Bill Russell has won the most NBA championships.', '2014-10-13'),
(7, 'lionel_messi2.jpeg', 'Lionel Messi', 1, 'Lionel Messi has won the most ballon d\'or - 7 trophy.', '2021-12-01'),
(8, 'Peter_Gethin.jpeg', 'Peter Gethin ', 5, 'Minimum gap at the finish line\r\n\r\nAt the Italian Grand Prix, Formula 1 saw its most intense last lap, with five cars claiming victory right up to the checkered flag. In the end, Peter Gethin won at BRM - he brought Ronnie Peterson just 0.01 seconds! Getin', '2014-10-15'),
(9, 'Juan_Manuel_Fangio.jpeg', 'Juan Manuel Fangio', 5, 'Oldest champion\r\n\r\nJuan Manuel Fangio won the last title in 1957 - then the great Argentine was already 46 years and 41 days old. Modern pilots, on the other hand, mostly break youth records for age at the start, score, title, pole position, so riders at ', '2014-10-08'),
(10, 'Cesar_Cielo.jpeg', 'Cesar Cielo', 4, 'Cesar Cielo swam 50m freestyle in 20.91 seconds', '2013-02-09'),
(11, 'Rafael_Munoz.jpeg', 'Rafael Munoz', 4, 'Rafael Munoz swam 50m butterfly in 22.43 seconds', '2013-10-22'),
(12, 'Joshua_Cheptegei.png', 'Joshua Cheptegei', 3, 'In August 2000, Joshua Cheptegei became the first man to run the 5,000 meters in under 12 minutes and 37 seconds. The Ugandan beat the time of Kenenis Bekele of Kenya, running the distance in Monaco in 12:35.36.', '2012-08-15'),
(13, 'Shahin.jpeg', 'Saif Said Shahin', 3, 'Among men, Saif Said Shahin was the fastest to overcome the distance of 3000 meters with obstacles. The Qatari runner of Kenyan origin set a time of 7:53.63 in Brussels.', '2014-10-26'),
(14, 'Cristiano_Ronaldo.jpeg', 'Cristiano Ronaldo', 1, 'Cristiano Ronaldo has scored the most goals in his career - 760 goals', '2021-01-14'),
(15, 'Isaac_Hayik.jpeg', 'Isaac Hayik', 1, 'Oldest current player\r\nIsraeli goalkeeper Isaac Hayik became the oldest active player on April 5, 2019, when he played a full competitive match for Maccabi Ironi Or Yehuda at the age of 73 years and 95 days.', '2019-04-05'),
(16, 'Hakan_Shukur.jpeg', 'Hakan Shukur', 1, 'Fastest goal in a World Cup match\r\nTurkish player Hakan Shukur took only 10.89 seconds to take his team ahead against South Korea in the third place match at the 2002 World Cup.', '2014-10-16'),
(17, 'Lewandowski.jpeg', 'Robert Lewandowski', 1, 'Fastest Penta Trick - Robert Lewandowski (9 minutes)', '2012-10-09'),
(18, 'Peter_Shilton.jpeg', 'Peter Shilton', 1, 'Most career appearances - Peter Shilton (1391 appearances)', '2012-10-07'),
(19, 'Carlo_Ancelotti.jpeg', 'Carlo Ancelotti', 1, 'Carlo Ancelotti won the most Champions League titles as a manager - 4 titles', '2022-07-02'),
(20, 'Schumacher.jpeg', 'Michael Schumacher', 5, 'Michael Schumacher holds the record for the most Grand Prix wins in a season - 13 wins', '2012-10-17');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_1` (`id_competition`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`id_competition`) REFERENCES `competitions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
