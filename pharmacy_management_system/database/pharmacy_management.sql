-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2020 at 01:51 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharmacy_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_dealers`
--

CREATE TABLE `add_dealers` (
  `id` int(11) NOT NULL,
  `dealer_name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `rdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_dealers`
--

INSERT INTO `add_dealers` (`id`, `dealer_name`, `company_name`, `contact`, `mail_id`, `address`, `rdate`) VALUES
(1, 'hhh', 'yyy', 9876543210, 'mickey@gmail.com', 'trichy', '28-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `add_medicine`
--

CREATE TABLE `add_medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `Gst` varchar(20) NOT NULL,
  `ex_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_medicine`
--

INSERT INTO `add_medicine` (`id`, `medicine_name`, `type`, `price`, `quantity`, `Gst`, `ex_date`) VALUES
(1, 'tyfty', 'ftf', '45', '20', '33', '28-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `add_sales`
--

CREATE TABLE `add_sales` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `billno` varchar(20) NOT NULL,
  `productid` varchar(50) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `rdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_sales`
--

INSERT INTO `add_sales` (`id`, `username`, `billno`, `productid`, `medicine_name`, `price`, `quantity`, `amount`, `rdate`) VALUES
(1, 'arun', 'ID1524', '3', 'ppp', '75', '5', '375', '28-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');
