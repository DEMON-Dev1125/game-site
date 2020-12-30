-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 10:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin@123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Action games'),
(2, 'Action-adventure games'),
(3, 'Adventure games'),
(4, 'Role-playing games'),
(5, 'Simulation games'),
(6, 'Strategy games'),
(7, 'Sports games');

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_users`
--

INSERT INTO `register_users` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(6, 'RS Bhatti', 'Rs24ppbhatti@gmail.com', 'rs@123', '34554252515'),
(7, 'test user', 'test@gmail.com', 'test@123', '964-672-2356');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_game`
--

CREATE TABLE `uploaded_game` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `long_desc` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploaded_game`
--

INSERT INTO `uploaded_game` (`id`, `game_name`, `short_desc`, `long_desc`, `file`, `image`, `category`) VALUES
(1, 'Illusion Connect', 'Illusion Connect Launches With A Host Of Events After Hittin', 'Illusion Connect is a real-time action strategy game on mobile. The game allows players to build connections with various partners named “Radiants” and socialize with them in different ways.\r\nThese Radiants are all voiced by top vocal talents like Hitomi ', '', 'illusion_connect_feat.jpg', 'Action-adventure games'),
(2, 'Creative Destruction Advance', 'Creative Destruction is a sandbox survival game that feature', 'Creative Destruction is a sandbox survival game that features the utmost fun of building and firing.\r\n\r\nIn the mood for a heart-stirring showdown? You will parachute into a vast battlefield where 100-player deathmatch is raging. Outplay your way to be the', '', 'creative_destruction_bumblebee_feat.jpg', 'Simulation games'),
(3, 'Life After', 'LifeAfter is a mobile MMO about surviving a zombie apocalyps', 'LifeAfter is a mobile MMO about surviving a zombie apocalypse\r\n\r\nOf all the different kinds of apocalypse on offer, zombie has to be the most appealing. Why? Unlike all the others - such as supervolcano, meteor strike, and nuclear war - it comes with its ', '', 'lifeafter_mobile_feat.jpg', 'Action-adventure games'),
(4, '1941 Frozen Front', 'Take Command of the Battle Between the German and Soviet For', 'Lead the Eastern Front\r\nStand tall, soldier. You are about to take part in one of the bloodiest conflicts the world has ever seen. The forces of Nazi Germany and the Soviet Union are squaring off on the eastern front of World War II. Who is going to win? ', '', 'frozen-front_feat.jpg', 'Action games'),
(5, 'CSR Racing', 'Customize Your Car and Dominate the Underground Racing Scene', 'Put the Pedal to Your Mettle!\r\nNothing sparks life in an adrenaline junkie in the big city better than a high-speed drag race through the streets themselves. In CSR Racing, you’ll have the opportunity to do exactly that from the safety of your smartphone ', '', 'csr-racing_feat.jpg', 'Action games'),
(6, 'Cubis Kingdoms', 'Match the Cubes, Gather the Elements, and Save the Kingdom!', 'An Accursed Land\r\n\r\nOnce upon a time, there was a kingdom that beamed with magic and life. Then one day, greedy demons posing as gargoyles spread a curse upon it, turning the once prosperous nation into an inhospitable wasteland. The people cry out for a ', '', 'cubis.jpg', 'Simulation games'),
(8, 'Mission Impossible Rogue Nation', 'Bring Down the Global Conspiracy in this Exciting Mission Im', 'Welcome to Mission Impossible Mobile\r\n\r\nYour mission, should you choose to accept it, is to hunt down and kill Ethan Hunt. Since the Impossible Mission Force was shut down by the CIA, he has gone rogue and it is our understanding that he may now be involv', 'mov_bbb.mp4', 'mission-impossible-rogue-nation_feat.jpg', 'Action games'),
(9, 'Kill Shot Virus', 'Protect Survivors, Eliminate Undead and Stop the Spread!', 'IT’S A ZOMBIE PLAYGROUND OUT THERE!\r\n* Play through 100+ adrenaline-pumping online FPS sniper and assault missions to prevent the spread of the zombie virus\r\n* Kill the Un dead up close and personal with a huge arsenal of Assault Rifle guns, Shotguns, Sni', 'mov_bbb.mp4', 'kill-shot-virus_feat.jpg', 'Action games');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_game`
--
ALTER TABLE `uploaded_game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploaded_game`
--
ALTER TABLE `uploaded_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
