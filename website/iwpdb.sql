-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 08:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `BroadCastId` int(100) NOT NULL,
  `Dates` date NOT NULL,
  `Time` varchar(100) NOT NULL,
  `FilmId` int(100) NOT NULL,
  `HouseId` int(100) NOT NULL,
  `day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`BroadCastId`, `Dates`, `Time`, `FilmId`, `HouseId`, `day`) VALUES
(1, '2020-10-02', '12:10', 1, 1, 'Fri'),
(2, '2020-10-02', '13:10', 1, 3, 'Fri'),
(3, '2020-10-02', '12:50', 2, 1, 'Fri'),
(4, '2020-10-02', '13:20', 2, 2, 'Fri'),
(5, '2020-10-02', '15:20', 3, 1, 'Fri'),
(6, '2020-10-02', '16:20', 4, 1, 'Fri'),
(7, '2020-10-02', '11:30', 5, 1, 'Fri'),
(8, '2020-10-02', '10:20', 6, 2, 'Fri'),
(9, '2020-10-02', '14:50', 7, 2, 'Fri'),
(10, '2020-10-02', '17:15', 8, 1, 'Fri'),
(11, '2020-10-02', '20:30', 9, 3, 'Fri'),
(12, '2020-10-02', '18:00', 10, 2, 'Fri');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentId` int(100) NOT NULL,
  `FilmId` int(100) NOT NULL,
  `UserId` varchar(100) NOT NULL,
  `Comment` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `FilmId`, `UserId`, `Comment`) VALUES
(1, 1, 'brahmnoor', 'Bestie'),
(2, 4, 'brahmnoor', 'I like this movie.'),
(4, 1, 'brahmnoor', 'Good movie.'),
(5, 1, 'anupa97', 'was inspired by the cuckoo returning. had fantasies about it in my dream'),
(6, 3, 'anupa97', 'another title could have been \"hookups\" '),
(7, 4, 'anupa97', 'spectacular movie'),
(8, 2, 'anupa97', 'was a mind OPENER!!!!'),
(9, 4, 'Rishi123', 'What crap'),
(10, 4, 'ABC', 'Mind blowing'),
(11, 5, 'ABC', 'Mind Blowing! Must watch.');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `FilmId` int(100) NOT NULL,
  `FilmName` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Language` varchar(100) NOT NULL,
  `Director` varchar(100) NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `Poster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`FilmId`, `FilmName`, `Duration`, `Category`, `Language`, `Director`, `Description`, `Poster`) VALUES
(1, 'Toy Story 2', '92 mins', 'IIA', 'English', 'John Lasseter, Lee Unkrich, Josh Cooley', 'Andy heads off to Cowboy Camp, leaving his toys to their own devices. Things shift into high gear when an obsessive toy collector named Al McWhiggen, owner of Al\'s Toy Barn kidnaps Woody. Andy\'s toys mount a daring rescue mission, Buzz Lightyear meets his match and Woody has to decide where he and his heart truly belong.', 'ToyStory.jpg'),
(2, 'Suffragette', '106 mins', 'IIA', 'English', 'Sarah Gavron', 'The foot soldiers of the early feminist movement, women who were forced underground to pursue a dangerous game of cat and mouse with an increasingly brutal State...', 'movie002.jpg'),
(3, 'She Remembers, He Forgets', '110 mins', 'IIA', 'Cantonese', 'Adam Wong', 'Unfulfilled at work and dissatisfied with her marital life, a middle-aged woman attends a high school reunion and finds a floodgate of flashbacks of her salad days open before her mind eyes...', 'P3.png'),
(4, 'Spectre', '148 mins', 'IIB', 'English', 'Sam Mendes', 'A cryptic message from the past sends James Bond on a rogue mission to Mexico City and eventually Rome, where he meets Lucia Sciarra (Monica Bellucci), the beautiful and forbidden widow of an infamous criminal...', 'movie004.jpg'),
(5, 'Batman Begins', '140 mins', 'IIB', 'English', 'Christopher Nolan', 'Driven by tragedy, billionaire Bruce Wayne dedicates his life to uncovering and defeating the corruption that plagues his home, Gotham City.  Unable to work within the system, he instead creates a new identity, a symbol of fear for the criminal underworld - The Batman.', 'Batman.jpg'),
(6, 'The Dark Knight', '152 mins', 'IIB', 'English', 'Christopher Nolan', 'Batman raises the stakes in his war on crime. With the help of Lt. Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the remaining.', 'DarkKnight.jpg'),
(7, 'Sherlock Holmes: A Game of Shadows', '129 mins', 'IIA', 'English', 'Guy Ritchie', 'There is a new criminal mastermind at large (Professor Moriarty) and not only is he Holmesâ€™ intellectual equal, but his capacity for evil and lack of conscience.', 'Sherlock.jpg'),
(8, 'Iron Man', '126 mins', 'IIB', 'English', 'Jon Favreau', 'After being held captive in an Afghan cave, billionaire engineer Tony Stark creates a unique weaponized suit of armor to fight evil.', 'IronMan.jpg'),
(9, 'Star Wars: The Force Awakens', '136 mins', 'IIA', 'English', 'J.J. Abrams', 'Thirty years after defeating the Galactic Empire, Han Solo and his allies face a new threat from the evil Kylo Ren and his army of Stormtroopers.', 'StarWars.jpg'),
(10, 'Inception', '148 mins', 'IIB', 'English', 'Christopher Nolan', 'Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another person\'s idea into a target\'s subconscious.', 'Inception.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `HouseId` int(100) NOT NULL,
  `HouseRow` varchar(100) NOT NULL,
  `HouseCol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`HouseId`, `HouseRow`, `HouseCol`) VALUES
(1, '5', '5'),
(2, '6', '5'),
(3, '4', '7');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserId` varchar(100) NOT NULL,
  `PW` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserId`, `PW`) VALUES
('', ''),
('brahmnoor', 'singh123'),
('bestie', 'coolsie123'),
('Anupa1097', 'Anupa1097'),
('ANUPA1097', 'ANUPA1097'),
('anupa97', 'anupa1097'),
('Rishi123', 'rishabh123'),
('ABC', 'XYZ123'),
('JOHN1', 'ABCDEF1');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketId` int(100) NOT NULL,
  `SeatRow` int(11) NOT NULL,
  `SeatCol` int(11) NOT NULL,
  `BroadCastId` int(100) NOT NULL,
  `Valid` varchar(100) NOT NULL,
  `UserId` varchar(100) NOT NULL,
  `TicketType` varchar(100) NOT NULL,
  `TicketFee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketId`, `SeatRow`, `SeatCol`, `BroadCastId`, `Valid`, `UserId`, `TicketType`, `TicketFee`) VALUES
(6, 5, 4, 1, 'YES', 'ANUPA1097', 'Student/Senior', '50'),
(7, 4, 2, 1, 'YES', 'ANUPA1097', 'Student/Senior', '50'),
(8, 4, 3, 1, 'YES', 'ANUPA1097', 'Student/Senior', '50'),
(9, 6, 1, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(10, 6, 5, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(11, 4, 3, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(12, 4, 4, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(13, 3, 1, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(14, 3, 2, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(15, 3, 3, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(16, 2, 3, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(17, 2, 5, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(18, 1, 1, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(19, 1, 2, 4, 'YES', 'ANUPA1097', 'Adult', '75'),
(20, 3, 3, 1, 'YES', 'brahmnoor', 'Adult', '75'),
(21, 2, 4, 1, 'YES', 'brahmnoor', 'Adult', '75'),
(22, 5, 1, 6, 'YES', 'anupa97', 'Adult', '75'),
(23, 4, 2, 6, 'YES', 'anupa97', 'Student/Senior', '50'),
(24, 1, 4, 1, 'YES', 'anupa97', 'Adult', '75'),
(25, 2, 3, 6, 'YES', 'Rishi123', 'Adult', '75'),
(27, 1, 2, 1, 'YES', 'ABC', 'Adult', '75'),
(28, 5, 1, 7, 'YES', 'ABC', 'Adult', '75'),
(29, 6, 3, 8, 'YES', 'ABC', 'Adult', '75'),
(30, 6, 4, 8, 'YES', 'ABC', 'Adult', '75'),
(31, 6, 5, 8, 'YES', 'ABC', 'Adult', '75'),
(32, 3, 3, 7, 'YES', 'ABC', 'Student/Senior', '50'),
(33, 3, 3, 7, 'YES', 'ABC', 'Student/Senior', '50'),
(34, 3, 2, 7, 'YES', 'ABC', 'Adult', '75'),
(35, 2, 5, 7, 'YES', 'ABC', 'Adult', '75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`BroadCastId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`FilmId`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`HouseId`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `BroadCastId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `FilmId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `HouseId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
