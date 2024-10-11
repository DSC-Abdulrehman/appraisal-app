-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 01:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dyna_pay_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `empsalary`
--

CREATE TABLE IF NOT EXISTS `empsalary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `employee_name` text NOT NULL,
  `job_title` text NOT NULL,
  `date_joining` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `basic_pay` int(11) NOT NULL,
  `house_allowance` int(11) NOT NULL,
  `conveyance_allowance` int(11) NOT NULL,
  `communication_allowance` int(11) NOT NULL,
  `phone_others` int(11) NOT NULL,
  `absence_deduction` int(11) NOT NULL,
  `advance_deduction` int(11) NOT NULL,
  `core_deduction` int(11) NOT NULL,
  `phone_others_deduction` int(11) NOT NULL,
  `incom_tax_deduction` int(11) NOT NULL,
  `add_amount` int(11) NOT NULL,
  `deduct_amount` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL,
  `date_salary_month` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `empsalary`
--

INSERT INTO `empsalary` (`id`, `employee_no`, `employee_name`, `job_title`, `date_joining`, `grade`, `basic_pay`, `house_allowance`, `conveyance_allowance`, `communication_allowance`, `phone_others`, `absence_deduction`, `advance_deduction`, `core_deduction`, `phone_others_deduction`, `incom_tax_deduction`, `add_amount`, `deduct_amount`, `net_amount`, `date_salary_month`) VALUES
(1, 'dsc01', 'grace', 'developer', 'feb 2014', 'a1', 20000, 2000, 1000, 1000, 1000, 500, 500, 500, 0, 0, 0, 0, 0, ''),
(2, 'dsc02', 'johnson', 'designer', 'march 2011', 'b1', 70000, 2000, 1000, 1000, 1000, 500, 500, 500, 0, 0, 0, 0, 0, ''),
(3, 'dsc04', 'elazabeth', 'hr', 'july 2015', 'b2', 30000, 200, 66, 88, 888, 888, 0, 0, 0, 77, 0, 0, 0, ''),
(4, 'dsc07', 'mikel', 'admin', 'aug 2012', 'b2', 30000, 200, 66, 88, 888, 888, 0, 0, 0, 77, 0, 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
