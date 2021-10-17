-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2021 a las 19:12:35
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delimar1_bd_logistics_transport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_company_services`
--

DROP TABLE IF EXISTS `tbl_company_services`;
CREATE TABLE `tbl_company_services` (
  `Id` int(11) NOT NULL,
  `CompanyName` varchar(80) NOT NULL,
  `CompanyAddress` varchar(100) NOT NULL,
  `CompanyCity` varchar(50) DEFAULT NULL,
  `CompanyState` varchar(10) DEFAULT NULL,
  `CompanyZipCode` varchar(15) DEFAULT NULL,
  `CompanyPhone1` varchar(15) NOT NULL,
  `CompanyPhone2` varchar(15) DEFAULT NULL,
  `CompanyEmail` varchar(40) NOT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_company_services`
--

INSERT INTO `tbl_company_services` (`Id`, `CompanyName`, `CompanyAddress`, `CompanyCity`, `CompanyState`, `CompanyZipCode`, `CompanyPhone1`, `CompanyPhone2`, `CompanyEmail`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(1, 'APAP', '27 de Febrero', NULL, NULL, NULL, '829930020', '8092264646', 'oliver9321@gmail.com', '2021-09-09 00:00:00', 1, NULL, NULL, b'1'),
(2, 'Test', '8400 NW 25 St Suite 110 Doral', NULL, NULL, NULL, '8299301020', '8299301020', 'oliver9321@gmail.com', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(3, 'Los varones', 'Villa Mella', NULL, NULL, NULL, '(809) 226-4646', '', '', '2021-10-09 22:33:52', 1, NULL, NULL, b'1'),
(4, 'El velero', '23451 NW 23 ST Miami, FL 33052', NULL, NULL, NULL, '(333) 333-3333', '', '', '2021-10-10 06:43:59', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE `tbl_customers` (
  `Id` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `LastName` varchar(80) NOT NULL,
  `Phone1` varchar(35) NOT NULL,
  `Phone2` varchar(35) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIDLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_customers`
--

INSERT INTO `tbl_customers` (`Id`, `Name`, `LastName`, `Phone1`, `Phone2`, `Email`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIDLastModification`, `IsActive`) VALUES
(1, 'Oliver Emmanuel', 'Fermin Rodriguez', '8299301020', '', 'oliver9321@gmail.com', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(2, 'Jimmy', 'Fermin', '8299301011', '', 'oliver9321@gmail.com', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(3, 'Jimmy 2', 'Fermin', '8299301011', '', 'oliver9321@gmail.com', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(4, 'Karla', 'Fermin', '3453543', '', '', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(5, 'Albert', 'Tejada', '', '', '', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(6, 'Albert', 'Tejada', '', '', '', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(7, 'Varona', '', '', '', '', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(10, 'Alberto', '', '8299301020', '', 'oliver9321@gmail.com', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(11, 'Fortuna', '', '8299301020', '', '', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(12, 'Flopy', '', '8299301020', '', 'oliver9321@gmail.com', '2021-09-12 00:00:00', 1, NULL, NULL, b'1'),
(13, 'juan', 'perez', '402-654-456', '123', '@juanperez', '2021-09-12 00:00:00', 1, '2021-09-12 00:00:00', 1, b'1'),
(14, 'Francis', 'Rodriguez', '8299301020', '', 'francis@gmail.com', '2021-09-26 00:00:00', 1, NULL, NULL, b'1'),
(15, 'Flopi', '', '55555555', '', '', '2021-09-26 00:00:00', 1, NULL, NULL, b'1'),
(16, 'Bryan', 'Santos', '14049165335', '', 'bryan.santos.moreaux@gmail.com', '2021-09-27 00:00:00', 1, '2021-10-11 16:13:08', 1, b'1'),
(17, 'JUAN', 'LOPEZ', '0200000', '', '', '2021-09-27 00:00:00', 1, NULL, NULL, b'1'),
(18, 'Joanni ', 'Cedeno', '9399326704', '', 'joannicedeno@gmail.com', '2021-09-27 00:00:00', 1, NULL, NULL, b'1'),
(19, 'Ineabelle', 'Alameda', '7874607507', '', '', '2021-09-27 00:00:00', 1, NULL, NULL, b'1'),
(20, 'Flopi', 'Martinez', '(809) 226-4646', '', 'oliver9321@gmail.com', '2021-10-09 22:31:03', 1, NULL, NULL, b'1'),
(22, 'pepe2', 'Alba', '8888888888888888888888888', '', 'pepe2@g.mail.com', '2021-10-10 07:03:15', 1, NULL, NULL, b'1'),
(23, 'pepe2', 'Alba', '8888888888888888888888888', '', 'pepe2@g.mail.com', '2021-10-10 07:03:16', 1, NULL, NULL, b'1'),
(24, 'Bryan', 'test', '(809) 226-4646', '', '', '2021-10-10 13:31:20', 1, NULL, NULL, b'1'),
(25, 'Jose Luis ', 'Alba', '17862969385', '', 'jalba1395@gmail.com', '2021-10-11 16:08:09', 1, '2021-10-11 16:11:32', 1, b'1'),
(26, 'Silverio', 'Toribio', '1-646-281-8826', '', '', '2021-10-11 16:15:35', 1, NULL, NULL, b'1'),
(27, 'LOLA', 'PEREZ', '1-555-235-5555', '', '', '2021-10-12 13:51:49', 1, NULL, NULL, b'1'),
(28, 'Lula', 'Perez', '(305)305-305', '(305)305-304', 'lulaperez@gmail.com', '2021-10-14 02:37:34', 1, NULL, NULL, b'1'),
(29, 'Josue', 'Martinez', '(786)333-3333', '(345)984-7594', 'jmartinez@gmail.com', '2021-10-14 02:55:36', 1, NULL, NULL, b'1'),
(30, 'Emmanuel', 'Carrasco', '(555) 555-5555', '(444) 444-4444', 'emmanuel@gmail.com', '2021-10-16 03:21:38', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer_type`
--

DROP TABLE IF EXISTS `tbl_customer_type`;
CREATE TABLE `tbl_customer_type` (
  `Id` int(11) NOT NULL,
  `NameType` varchar(40) NOT NULL,
  `DateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_customer_type`
--

INSERT INTO `tbl_customer_type` (`Id`, `NameType`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(1, 'Origin', '2021-09-10 00:00:00', 1, NULL, NULL, b'1'),
(2, 'Destination', '2021-09-10 00:00:00', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_drivers`
--

DROP TABLE IF EXISTS `tbl_drivers`;
CREATE TABLE `tbl_drivers` (
  `Id` int(11) NOT NULL,
  `DriverName` varchar(80) NOT NULL,
  `DriverPhone1` varchar(35) NOT NULL,
  `DriverPhone2` varchar(35) DEFAULT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_drivers`
--

INSERT INTO `tbl_drivers` (`Id`, `DriverName`, `DriverPhone1`, `DriverPhone2`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(1, 'Oliver Emmanuel Fermin Rodriguez', '8299301020', '8299301010', '2021-09-06 00:00:00', 1, '2021-09-09 00:00:00', 1, b'1'),
(2, 'test only', '8299301020', '8299301020', '2021-09-24 00:00:00', 1, '2021-09-24 00:00:00', 1, b'1'),
(3, '09', '8299301020', NULL, '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(4, '09', '8299301020', NULL, '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(5, '8299301020', '8299301020', NULL, '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(6, '8299301020', '8299301020', NULL, '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(7, '5', '2', NULL, '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(8, 'Carlitos', '2', '', '2021-09-24 00:00:00', 1, '2021-10-10 05:29:03', 1, b'1'),
(9, '333', '444', NULL, '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(10, 'test 4', '809', '226', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(11, 'test 5', '809', '226', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(12, 'test 6', '6566', '345', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(13, 'test 6', '6566', '345', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(14, 'test 6', '435', '345', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(15, 'TEST 7', '456', '2432', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(16, '4535', '345345', '345', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(17, 'test 8', '3432', '34243', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(18, 'test 10', '324', '2342', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(19, 'test 44', '8299301020', '8299301020', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(20, '42423', '123123', '13', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(21, 'tdfdsf', 'sdfgdf', 'dgdf', '2021-09-24 00:00:00', 1, NULL, NULL, b'1'),
(22, 'Alberton', '(809) 224-6464', NULL, '2021-10-09 22:34:15', 1, NULL, NULL, b'1'),
(23, 'Alberto', '(809) 226-4646', '', '2021-10-09 22:38:27', 1, NULL, NULL, b'1'),
(24, 'Emmahuel', '(829) 930-1020', NULL, '2021-10-09 22:44:07', 1, NULL, NULL, b'1'),
(25, 'Emmanuel 2', '(333) 333-3333', NULL, '2021-10-09 22:45:00', 1, NULL, NULL, b'1'),
(26, 'PEDRO', '18293752525', '', '2021-10-11 17:14:17', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE `tbl_orders` (
  `Id` int(11) NOT NULL,
  `IdCustomerOrigin` int(11) NOT NULL,
  `IdCustomerDestination` int(11) NOT NULL,
  `IdCompanyService` int(11) DEFAULT NULL,
  `IdDriver` int(11) DEFAULT NULL,
  `OrderStatusID` int(11) NOT NULL,
  `IdPayment` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `PickUpDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `OriginAddress` varchar(200) NOT NULL,
  `OriginCity` varchar(80) NOT NULL,
  `OriginState` varchar(80) NOT NULL,
  `OriginZip` varchar(50) DEFAULT NULL,
  `OriginNote` text,
  `DestinationAddress` varchar(200) NOT NULL,
  `DestinationCity` varchar(80) NOT NULL,
  `DestinationState` varchar(80) NOT NULL,
  `DestinationZip` varchar(50) DEFAULT NULL,
  `DestinationNote` text,
  `Total` float NOT NULL DEFAULT '0',
  `Deposit` float DEFAULT '0',
  `ExtraTrukerFee` float DEFAULT '0',
  `TrukerOwesUs` float DEFAULT '0',
  `Earnings` float DEFAULT '0',
  `Cod` float DEFAULT '0',
  `TrukerRate` float DEFAULT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `CancelledNote` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_orders`
--

INSERT INTO `tbl_orders` (`Id`, `IdCustomerOrigin`, `IdCustomerDestination`, `IdCompanyService`, `IdDriver`, `OrderStatusID`, `IdPayment`, `OrderDate`, `PickUpDate`, `DeliveryDate`, `OriginAddress`, `OriginCity`, `OriginState`, `OriginZip`, `OriginNote`, `DestinationAddress`, `DestinationCity`, `DestinationState`, `DestinationZip`, `DestinationNote`, `Total`, `Deposit`, `ExtraTrukerFee`, `TrukerOwesUs`, `Earnings`, `Cod`, `TrukerRate`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`, `CancelledNote`) VALUES
(1, 1, 3, 1, 25, 4, 1, '2021-10-10', '2021-10-19', '2021-10-22', 'Miami Beach Boardwalk, Miami Beach, Florida, EE. UU.', 'Miami Beach', 'FL', '33140', 'Origin note example', 'Pension Road, Municipio de Manalapan, Nueva Jersey, EE. UU.', 'Manalapan Township', 'NJ', '', 'Destination note example', 40000, 200, 0, 0, 0, 0, 0, '2021-10-10 08:10:43', 1, '2021-10-14 03:58:31', 1, b'1', ''),
(2, 4, 3, 4, 22, 1, 2, '2021-10-10', '2021-10-12', '2021-10-22', '1729 Southwest 101st Way, Miramar, Florida, EE. UU.', 'Miramar', 'FL', '33025-6537', '', '14327 SW 30th Ct, Davie, Florida, EE. UU.', 'Davie', 'FL', '33330', '', 750, 200, 0, 0, 210, 550, 540, '2021-10-10 06:21:54', 1, '2021-10-12 03:17:11', 1, b'1', ''),
(3, 1, 3, NULL, NULL, 1, 3, '2021-10-10', '2021-10-12', '2021-10-22', '1115 East Ridgewood Street, Orlando, FL, USA', 'Orlando', 'FL', '32803-5443', '', '112 South Orange Avenue, Orlando, FL, USA', 'Orlando', 'FL', '32801', '', 1000, 300, 0, 0, 0, 0, NULL, '2021-10-10 20:57:59', 1, NULL, NULL, b'1', ''),
(4, 16, 19, 2, 24, 1, 4, '2021-10-11', '2021-10-16', '2021-10-19', '2601 Northwest 207th Street, Miami Gardens, FL, USA', 'Miami Gardens', 'FL', '33056-5263', 'pick up after 10am ', '86 Westbrook Street, Hartford, CT, USA', 'Hartford', 'CT', '06106', 'delivery after 12pm', 795, 195, 0, 0, 195, 600, 600, '2021-10-11 15:50:09', 1, '2021-10-11 15:58:53', 1, b'1', ''),
(5, 25, 26, 4, 22, 1, 5, '2021-10-11', '2021-10-13', '2021-10-16', '11927 Southwest 15th Street, Pembroke Pines, FL, USA', 'Pembroke Pines', 'FL', '33025', 'pick up anytime', '2095 Creston Avenue, Bronx, NY, USA', 'bronx', 'NY', '10453', 'delivery in afternoon', 995, 195, 0, 50, 175, 800, 820, '2021-10-11 16:20:09', 1, '2021-10-11 17:06:10', 1, b'1', ''),
(6, 1, 2, NULL, NULL, 1, 6, '2021-10-11', '2021-10-11', '2021-10-11', 'Miami Beach Boardwalk, Miami Beach, Florida, EE. UU.', 'Miami Beach', 'FL', '33140', '', 'Pensacola Street, Honolulu, Hawái, EE. UU.', 'Honolulu', 'HI', '', '', 200, 50, 0, 0, 0, 0, NULL, '2021-10-11 22:17:00', 1, NULL, NULL, b'1', ''),
(7, 1, 2, 1, 23, 2, 7, '2021-10-14', '2021-10-14', '2021-10-22', 'Miami Beach Boardwalk, Miami Beach, Florida, EE. UU.', 'Miami Beach', 'FL', '33140', 'Note origin', 'Pensacola Beach Boardwalk, Pensacola Beach, Florida, EE. UU.', 'Pensacola Beach', 'FL', '32561', 'destination note', 700, 300, 200, 0, 100, 400, 600, '2021-10-14 00:45:23', 1, '2021-10-14 01:38:30', 1, b'1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE `tbl_order_details` (
  `Id` int(11) NOT NULL,
  `IdOrder` int(11) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Year` int(11) NOT NULL,
  `Vin` varchar(50) DEFAULT NULL,
  `ConditionVehicle` varchar(30) NOT NULL,
  `CarrierType` varchar(30) NOT NULL,
  `DateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`Id`, `IdOrder`, `Brand`, `Model`, `Color`, `Year`, `Vin`, `ConditionVehicle`, `CarrierType`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(7, 3, 'VOLVO', 'Veneno', 'Silver', 2002, '', 'Running', 'Open', '2021-10-10 20:57:59', 1, NULL, NULL, b'1'),
(9, 4, 'HONDA', 'Civic', 'Black', 2020, '', 'Running', 'Open', '2021-10-11 15:58:53', 1, NULL, NULL, b'1'),
(12, 5, 'TOYOTA', 'Land Cruiser', 'White', 2017, '', 'Running', 'Open', '2021-10-11 17:06:10', 1, NULL, NULL, b'1'),
(14, 6, 'TOYOTA', 'Veneno', 'Brown/Beige', 1900, '3435453453', 'Running', 'Open', '2021-10-11 22:17:00', 1, NULL, NULL, b'1'),
(20, 2, 'TOYOTA', 'Land Cruiser', 'White', 2020, '123456789ABCD', 'Running', 'Open', '2021-10-12 03:17:12', 1, NULL, NULL, b'1'),
(29, 7, 'TESLA', 'Model S', 'Gray', 2000, '1234567890000', 'Running', 'Open', '2021-10-14 01:38:31', 1, NULL, NULL, b'1'),
(30, 7, 'HONDA', 'HR-V', 'Green', 2005, '3435453453', 'Non-running', 'Enclosed', '2021-10-14 01:38:32', 1, NULL, NULL, b'1'),
(31, 1, 'TESLA', 'V90 Cross Country', 'Black', 2000, '000000000123', 'Running', 'Open', '2021-10-14 03:58:31', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_order_status`
--

DROP TABLE IF EXISTS `tbl_order_status`;
CREATE TABLE `tbl_order_status` (
  `Id` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_order_status`
--

INSERT INTO `tbl_order_status` (`Id`, `Status`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(1, 'Pending', '2021-09-03 10:36:30', NULL, '2021-09-23 00:00:00', 1, b'1'),
(2, 'Picked up', '2021-09-10 00:00:00', 1, '2021-10-10 05:33:26', 1, b'1'),
(3, 'Delivered', '2021-09-10 00:00:00', 1, '2021-09-10 00:00:00', 1, b'1'),
(4, 'Cancelled', '2021-09-27 00:00:00', 1, '2021-10-11 22:35:25', 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
CREATE TABLE `tbl_payments` (
  `Id` int(11) NOT NULL,
  `CardHolderName` varchar(50) NOT NULL,
  `CreditCard` varchar(300) NOT NULL,
  `ExpDate` varchar(300) NOT NULL,
  `Cvv` varchar(300) NOT NULL,
  `BillingAddress` varchar(200) DEFAULT NULL,
  `BillingCity` varchar(50) DEFAULT NULL,
  `BillingState` varchar(10) DEFAULT NULL,
  `BillingZipCode` varchar(15) DEFAULT NULL,
  `Reference` varchar(100) DEFAULT NULL,
  `Tel1` varchar(35) DEFAULT NULL,
  `Tel2` varchar(35) DEFAULT NULL,
  `PaymentEmail` varchar(60) DEFAULT NULL,
  `PaymentNote` varchar(200) DEFAULT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `PaymentOwnerName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_payments`
--

INSERT INTO `tbl_payments` (`Id`, `CardHolderName`, `CreditCard`, `ExpDate`, `Cvv`, `BillingAddress`, `BillingCity`, `BillingState`, `BillingZipCode`, `Reference`, `Tel1`, `Tel2`, `PaymentEmail`, `PaymentNote`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`, `PaymentOwnerName`) VALUES
(1, 'OLIVE FERMIN', '4444 4444 4444 4444', '12/25', '1234', 'Newark International Airport Street, Newark, Nueva Jersey, EE. UU.', 'Newark', 'NJ', '07114', 'Referencia', '(809) 226-4646', '', '', 'Payment note example', '2021-10-10 08:10:42', 1, '2021-10-14 03:58:31', 1, b'1', ''),
(2, 'juana lopez', '1234 5678 9101 1', '02/22', '1234', '12401 Miramar Parkway, Miramar, Florida, EE. UU.', 'Miramar', 'FL', '33027', '', '(222) 222-2222', '', '', '', '2021-10-10 06:21:54', 1, '2021-10-12 03:17:10', 1, b'1', ''),
(3, 'Jun', '0000 0000 0000 ', '12/24', '234', 'Sheridan Boulevard, Orlando, FL, USA', 'Orlando', 'FL', '32804', '', '8-484-846-4949', '', '', '', '2021-10-10 20:57:59', 1, NULL, NULL, b'1', ''),
(4, 'Bryan Santos', '4444 4444 4444 4444', '05/26', '123', '2601 Northwest 207th Street, Miami Gardens, FL, USA apt 139', 'Miami Gardens', 'FL', '33056', '', '4-049-165-335', '', '', '', '2021-10-11 15:50:09', 1, '2021-10-11 15:58:53', 1, b'1', ''),
(5, 'JOSE LUIS ALBA', '8888 8888 8888 8888', '04/25', '123', '11927 SW 15TH ST', 'HOLLYWOOD', 'Florida', '33025', '', '4-049-165-335', '', 'ezautotransportation@outlook.com', '', '2021-10-11 16:20:09', 1, '2021-10-11 17:06:10', 1, b'1', ''),
(6, 'OLIVE FERMIN', '4444 4444 4444 4444', '10/22', '1234', 'Miami Beach Boardwalk, Miami Beach, Florida, EE. UU.', 'Miami Beach', 'FL', '33140', 'Referencia', '1-111-111-1111', '', '', '', '2021-10-11 22:16:59', 1, NULL, NULL, b'1', ''),
(7, 'OLIVER FERMIN', '4444 4444 4444 4444', '02/22', '1234', 'Miami Beach Boardwalk, Miami Beach, Florida, EE. UU.', 'Miami Beach', 'FL', '33140', 'Referencia', '(888)888-8888', '', '', 'payment note', '2021-10-14 00:45:23', 1, '2021-10-14 01:38:30', 1, b'1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `Id` int(11) NOT NULL,
  `ProfileUserId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Image` text,
  `DateCreation` datetime DEFAULT NULL,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`Id`, `ProfileUserId`, `Name`, `LastName`, `UserName`, `Password`, `Email`, `Image`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(1, 1, 'Oliver', 'Fermin', 'admin', 'pH2YrX50aWNrNDU5NzEzNjk0MFR1cm5vcw==', NULL, NULL, NULL, NULL, NULL, NULL, b'1'),
(2, 1, 'jimmy fermin', 'fermin', 'jimmy fermin ', 'jimmy123', 'jimmyfermin02@gmail.com', '', '2021-09-10 00:00:00', 1, NULL, NULL, b'1'),
(3, 1, 'jimmy fermin', 'fermin', 'jimmy fermin ', 'jimmy12', 'jimmyfermin02@gmail.com', '', '2021-09-10 00:00:00', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user_profiles`
--

DROP TABLE IF EXISTS `tbl_user_profiles`;
CREATE TABLE `tbl_user_profiles` (
  `Id` int(11) NOT NULL,
  `Profile` varchar(50) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_user_profiles`
--

INSERT INTO `tbl_user_profiles` (`Id`, `Profile`, `Description`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(1, 'admin', NULL, '2021-09-06 10:47:35', NULL, NULL, NULL, b'1'),
(2, 'manager', NULL, '2021-09-06 10:47:35', NULL, NULL, NULL, b'1'),
(3, 'Driver', '', '2021-09-10 00:00:00', 1, '2021-10-10 05:38:15', 1, b'1'),
(4, 'Chofer', NULL, '2021-09-10 00:00:00', 1, NULL, NULL, b'1'),
(5, 'Chofer', 'chofer', '2021-09-10 00:00:00', 1, NULL, NULL, b'1'),
(6, 'manager', 'Manager system', '2021-09-28 00:00:00', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vehicles`
--

DROP TABLE IF EXISTS `tbl_vehicles`;
CREATE TABLE `tbl_vehicles` (
  `Id` int(11) NOT NULL,
  `Brand` varchar(40) NOT NULL,
  `Model` varchar(40) NOT NULL,
  `DateCreation` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserIdCreation` int(11) DEFAULT NULL,
  `LastModificationDate` datetime DEFAULT NULL,
  `UserIdLastModification` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`Id`, `Brand`, `Model`, `DateCreation`, `UserIdCreation`, `LastModificationDate`, `UserIdLastModification`, `IsActive`) VALUES
(2, 'ABARTH', 'ABARTH', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(3, 'ABARTH', '500C', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(4, 'ABARTH', '500', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(5, 'ABARTH', '124 Spider', '2021-09-21 21:38:35', NULL, '2021-10-10 05:31:06', 1, b'1'),
(6, 'ALFA ROMEO', 'ALFA ROMEO', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(7, 'ALFA ROMEO', 'Giulietta', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(8, 'ALFA ROMEO', 'MiTo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(9, 'ALFA ROMEO', '4C', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(10, 'ALFA ROMEO', 'Giulia', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(11, 'ALFA ROMEO', 'Stelvio', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(12, 'ALFA ROMEO (FIAT)', 'ALFA ROMEO (FIAT)', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(13, 'ALFA ROMEO (FIAT)', '4C', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(14, 'ASTON MARTIN', 'ASTON MARTIN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(15, 'ASTON MARTIN', 'DB9', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(16, 'ASTON MARTIN', 'Vantage V8', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(17, 'ASTON MARTIN', 'Vanquish', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(18, 'ASTON MARTIN', 'Vantage V12', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(19, 'ASTON MARTIN', 'Rapide', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(20, 'AUDI', 'AUDI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(21, 'AUDI', 'A4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(22, 'AUDI', 'A8', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(23, 'AUDI', 'A3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(24, 'AUDI', 'TT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(25, 'AUDI', 'A5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(26, 'AUDI', 'A4 Allroad Quattro', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(27, 'AUDI', 'A6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(28, 'AUDI', 'A7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(29, 'AUDI', 'Q3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(30, 'AUDI', 'Q5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(31, 'AUDI', 'S5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(32, 'AUDI', 'A1', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(33, 'AUDI', 'A6 Allroad Quattro', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(34, 'AUDI', 'S7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(35, 'AUDI', 'S6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(36, 'AUDI', 'S8', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(37, 'AUDI', 'RS4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(38, 'AUDI', 'RS5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(39, 'AUDI', 'R8', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(40, 'AUDI', 'SQ5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(41, 'AUDI', 'Q7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(42, 'AUDI', 'RS6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(43, 'AUDI', 'RS7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(44, 'AUDI', 'RS Q3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(45, 'AUDI', 'S3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(46, 'AUDI', 'S1', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(47, 'AUDI', 'TTS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(48, 'AUDI', 'S4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(49, 'AUDI', 'RS3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(50, 'AUDI', 'SQ7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(51, 'AUDI', 'Q2', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(52, 'AUDI', 'TTS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(53, 'AUDI', 'SQ7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(54, 'AUDI', 'S4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(55, 'AUDI', 'S6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(56, 'AUDI', 'S7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(57, 'BENTLEY', 'BENTLEY', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(58, 'BENTLEY', 'Continental GT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(59, 'BENTLEY', 'Mulsanne', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(60, 'BENTLEY', 'Flying Spur', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(61, 'BENTLEY', 'Continental GTC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(62, 'BENTLEY', 'Bentayga', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(63, 'BMW', 'BMW', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(64, 'BMW', 'Serie 3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(65, 'BMW', 'Serie 5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(66, 'BMW', 'Serie 4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(67, 'BMW', 'Serie 7', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(68, 'BMW', 'Z4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(69, 'BMW', 'X5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(70, 'BMW', 'Serie 1', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(71, 'BMW', 'X3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(72, 'BMW', 'Serie 6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(73, 'BMW', 'X1', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(74, 'BMW', 'X6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(75, 'BMW', 'I3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(76, 'BMW', 'Serie 2', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(77, 'BMW', 'X4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(78, 'BMW', 'I8', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(79, 'BMW', 'Serie 2 Gran Tourer', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(80, 'BMW', 'Serie 2 Active Tourer', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(81, 'BMW', 'X2', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(82, 'BMW', 'BYD', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(83, 'BMW', 'E6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(84, 'CHEVROLET', 'CHEVROLET', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(85, 'CHEVROLET', 'Cruze', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(86, 'CHEVROLET', 'Aveo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(87, 'CHEVROLET', 'Trax', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(88, 'CHEVROLET', 'Orlando', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(89, 'CHEVROLET', 'Spark', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(90, 'CHEVROLET', 'Camaro', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(91, 'CITROEN', 'CITROEN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(92, 'CITROEN', 'C4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(93, 'CITROEN', 'C3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(94, 'CITROEN', 'C5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(95, 'CITROEN', 'C3 Picasso', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(96, 'CITROEN', 'C4 Picasso', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(97, 'CITROEN', 'Grand C4 Picasso', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(98, 'CITROEN', 'C4 Aircross', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(99, 'CITROEN', 'Nemo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(100, 'CITROEN', 'Berlingo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(101, 'CITROEN', 'C-Elysée', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(102, 'CITROEN', 'C4 Cactus', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(103, 'CITROEN', 'C1', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(104, 'CITROEN', 'C-Zero', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(105, 'CITROEN', 'C-Elysée', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(106, 'CITROEN', 'Spacetourer', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(107, 'CITROEN', 'E-Mehari', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(108, 'CITROEN', 'C3 Aircross', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(109, 'DACIA', 'DACIA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(110, 'DACIA', 'Logan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(111, 'DACIA', 'Lodgy', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(112, 'DACIA', 'Sandero', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(113, 'DACIA', 'Duster', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(114, 'DACIA', 'Dokker', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(115, 'DACIA', 'DFSK', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(116, 'DACIA', 'Serie V', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(117, 'DACIA', 'Serie K', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(118, 'DACIA', 'DS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(119, 'DACIA', 'DS 4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(120, 'DACIA', 'DS 5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(121, 'DACIA', 'DS 3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(122, 'DACIA', 'DS 4 Crossback', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(123, 'DACIA', 'DS 7 Crossback', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(124, 'FERRARI', 'FERRARI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(125, 'FERRARI', '488', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(126, 'FERRARI', 'GTC4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(127, 'FERRARI', 'California', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(128, 'FERRARI', 'F12', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(129, 'FERRARI', 'Portofino', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(130, 'FERRARI', '812', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(131, 'FERRARI', 'FERRARI (FCA)', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(132, 'FERRARI', '458', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(133, 'FERRARI', 'FF', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(134, 'FERRARI', 'F12', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(135, 'FERRARI', 'California', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(136, 'FERRARI', '488', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(137, 'FIAT', 'FIAT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(138, 'FIAT', 'Freemont', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(139, 'FIAT', 'Doblò', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(140, 'FIAT', 'Punto', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(141, 'FIAT', 'Panda', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(142, 'FIAT', '500', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(143, 'FIAT', '500L', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(144, 'FIAT', '500L', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(145, 'FIAT', '500X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(146, 'FIAT', 'Qubo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(147, 'FIAT', 'Fiorino', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(148, 'FIAT', 'Bravo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(149, 'FIAT', 'Doblò', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(150, 'FIAT', 'Doblò', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(151, 'FIAT', '500C', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(152, 'FIAT', 'Tipo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(153, 'FIAT', '124 Spider', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(154, 'FIAT', 'FIAT (FIAT)', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(155, 'FIAT', 'Bravo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(156, 'FIAT', 'Fiorino', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(157, 'FORD', 'FORD', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(158, 'FORD', 'C-Max', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(159, 'FORD', 'Fiesta', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(160, 'FORD', 'Focus', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(161, 'FORD', 'Mondeo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(162, 'FORD', 'Ka', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(163, 'FORD', 'S-MAX', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(164, 'FORD', 'B-MAX', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(165, 'FORD', 'Grand C-Max', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(166, 'FORD', 'Tourneo Custom', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(167, 'FORD', 'Kuga', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(168, 'FORD', 'Galaxy', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(169, 'FORD', 'Grand Tourneo Connect', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(170, 'FORD', 'Tourneo Connect', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(171, 'FORD', 'EcoSport', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(172, 'FORD', 'Tourneo Courier', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(173, 'FORD', 'Mustang', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(174, 'FORD', 'Transit Connect', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(175, 'FORD', 'Edge', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(176, 'FORD', 'Ka+', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(177, 'HONDA', 'HONDA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(178, 'HONDA', 'Accord', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(179, 'HONDA', 'Jazz', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(180, 'HONDA', 'Civic', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(181, 'HONDA', 'CR-V', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(182, 'HONDA', 'HR-V', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(183, 'HYUNDAI', 'HYUNDAI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(184, 'HYUNDAI', 'I20', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(185, 'HYUNDAI', 'Ix35', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(186, 'HYUNDAI', 'Ix20', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(187, 'HYUNDAI', 'I10', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(188, 'HYUNDAI', 'Santa Fe', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(189, 'HYUNDAI', 'Veloster', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(190, 'HYUNDAI', 'I40', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(191, 'HYUNDAI', 'Elantra', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(192, 'HYUNDAI', 'I30', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(193, 'HYUNDAI', 'Grand Santa Fe', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(194, 'HYUNDAI', 'Genesis', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(195, 'HYUNDAI', 'H-1 Travel', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(196, 'HYUNDAI', 'Tucson', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(197, 'HYUNDAI', 'I20 Active', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(198, 'HYUNDAI', 'IONIQ', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(199, 'HYUNDAI', 'Kona', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(200, 'INFINITI', 'INFINITI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(201, 'INFINITI', 'Q70', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(202, 'INFINITI', 'Q50', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(203, 'INFINITI', 'QX70', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(204, 'INFINITI', 'QX50', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(205, 'INFINITI', 'Q60', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(206, 'INFINITI', 'Q30', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(207, 'INFINITI', 'QX30', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(208, 'ISUZU', 'ISUZU', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(209, 'ISUZU', 'D-Max', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(210, 'ISUZU', 'JAGUAR', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(211, 'ISUZU', 'XF', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(212, 'ISUZU', 'Serie XK', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(213, 'ISUZU', 'F-Type', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(214, 'ISUZU', 'XJ', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(215, 'ISUZU', 'XE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(216, 'ISUZU', 'F-Pace', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(217, 'ISUZU', 'E-Pace', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(218, 'JEEP', 'JEEP', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(219, 'JEEP', 'Grand Cherokee', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(220, 'JEEP', 'Wrangler Unlimited', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(221, 'JEEP', 'Cherokee', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(222, 'JEEP', 'Wrangler', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(223, 'JEEP', 'Renegade', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(224, 'JEEP', 'Compass', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(225, 'JEEP', 'Renegade', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(226, 'JEEP', 'JEEP (FIAT)', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(227, 'JEEP', 'Wrangler Unlimited', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(228, 'JEEP', 'Wrangler', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(229, 'JEEP', 'Cherokee', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(230, 'KIA', 'KIA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(231, 'KIA', 'Picanto', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(232, 'KIA', 'Rio', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(233, 'KIA', 'Sportage', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(234, 'KIA', 'Venga', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(235, 'KIA', 'Optima', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(236, 'KIA', 'Cee\'d', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(237, 'KIA', 'Cee\'d Sportswagon', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(238, 'KIA', 'Carens', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(239, 'KIA', 'Pro_cee\'d', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(240, 'KIA', 'Sorento', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(241, 'KIA', 'Soul', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(242, 'KIA', 'Niro', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(243, 'KIA', 'Soul EV', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(244, 'KIA', 'Pro_cee\'d GT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(245, 'KIA', 'Stonic', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(246, 'KIA', 'Optima SW', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(247, 'KIA', 'Optima PHEV', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(248, 'KIA', 'Optima HÃ¯Brido Enchufable', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(249, 'KIA', 'Optima SW GT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(250, 'KIA', 'Optima GT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(251, 'KIA', 'Niro HÃ¯Brido Enchufable', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(252, 'KIA', 'Optima SW HÃ¯Brido Enchufable', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(253, 'KIA', 'Stinger', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(254, 'LADA', 'LADA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(255, 'LADA', '4X4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(256, 'LADA', 'Priora', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(257, 'LAMBORGHINI', 'Urus', '2021-09-21 21:38:35', NULL, '2021-09-23 00:00:00', 1, b'1'),
(258, 'LAMBORGHINI', 'Aventador', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(259, 'LAMBORGHINI', 'Huracán', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(260, 'LANCIA', 'LANCIA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(261, 'LANCIA', 'Ypsilon', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(262, 'LANCIA', 'Voyager', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(263, 'LANCIA', 'Delta', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(264, 'LANCIA', 'LANCIA (FIAT)', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(265, 'LANCIA', 'Thema', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(266, 'LANCIA', 'Delta', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(267, 'LAND ROVER', 'LAND ROVER', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(268, 'LAND ROVER', 'Defender', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(269, 'LAND ROVER', 'Discovery 4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(270, 'LAND ROVER', 'Range Rover', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(271, 'LAND ROVER', 'Range Rover Evoque', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(272, 'LAND ROVER', 'Freelander', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(273, 'LAND ROVER', 'Range Rover Sport', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(274, 'LAND ROVER', 'Discovery Sport', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(275, 'LAND ROVER', 'Discovery', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(276, 'LAND ROVER', 'Range Rover Velar', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(277, 'LEXUS', 'LEXUS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(278, 'LEXUS', 'GS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(279, 'LEXUS', 'RX', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(280, 'LEXUS', 'CT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(281, 'LEXUS', 'IS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(282, 'LEXUS', 'NX', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(283, 'LEXUS', 'RC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(284, 'LEXUS', 'LS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(285, 'LEXUS', 'LC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(286, 'MAHINDRA', 'MAHINDRA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(287, 'XUV500', 'XUV500', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(288, 'MASERATI', 'MASERATI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(289, 'MASERATI', 'GranCabrio', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(290, 'MASERATI', 'Quattroporte', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(291, 'MASERATI', 'Ghibli', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(292, 'MASERATI', 'GranTurismo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(293, 'MASERATI', 'Levante', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(294, 'MAZDA', 'MAZDA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(295, 'MAZDA', 'Mazda2', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(296, 'MAZDA', 'CX-5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(297, 'MAZDA', 'Mazda6', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(298, 'MAZDA', 'MX-5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(299, 'MAZDA', 'Mazda3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(300, 'MAZDA', 'Mazda5', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(301, 'MAZDA', 'CX-9', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(302, 'MAZDA', 'CX-3', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(303, 'MERCEDES', 'MERCEDES', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(304, 'MERCEDES', 'Clase SL', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(305, 'MERCEDES', 'Clase SLK', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(306, 'MERCEDES', 'Clase V', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(307, 'MERCEDES', 'Clase C', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(308, 'MERCEDES', 'Clase M', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(309, 'MERCEDES', 'Clase G', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(310, 'MERCEDES', 'Clase E', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(311, 'MERCEDES', 'Clase CL', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(312, 'MERCEDES', 'Clase S', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(313, 'MERCEDES', 'Clase GLK', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(314, 'MERCEDES', 'SLS AMG', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(315, 'MERCEDES', 'Clase B', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(316, 'MERCEDES', 'Clase A', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(317, 'MERCEDES', 'Clase GL', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(318, 'MERCEDES', 'Clase CLS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(319, 'MERCEDES', 'Clase CLA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(320, 'MERCEDES', 'Clase GLA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(321, 'AMG GT', 'AMG GT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(322, 'AMG GT', 'Vito', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(323, 'AMG GT', 'Clase GLE Coupé', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(324, 'AMG GT', 'Clase GLE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(325, 'AMG GT', 'Clase GLE Coupé', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(326, 'AMG GT', 'Clase GLK', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(327, 'AMG GT', 'Clase GLC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(328, 'AMG GT', 'Citan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(329, 'AMG GT', 'Clase GLS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(330, 'AMG GT', 'Clase SLC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(331, 'AMG GT', 'GLC Coupé', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(332, 'AMG GT', 'Mercedes-AMG GT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(333, 'CLS', 'CLS', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(334, 'MINI', 'MINI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(335, 'MINI', 'MINI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(336, 'COUNTRYMAN', 'COUNTRYMAN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(337, 'PACEMAN', 'PACEMAN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(338, 'CLUBMAN', 'CLUBMAN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(339, 'MITSUBISHI', 'MITSUBISHI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(340, 'MITSUBISHI', 'Montero', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(341, 'MITSUBISHI', 'I-MiEV', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(342, 'MITSUBISHI', 'ASX', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(343, 'MITSUBISHI', 'Outlander', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(344, 'MITSUBISHI', 'Space Star', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(345, 'MITSUBISHI', 'L200', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(346, 'MITSUBISHI', 'Eclipse Cross', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(347, 'MORGAN', 'MORGAN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(348, 'MORGAN', 'Roadster', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(349, 'MORGAN', 'Plus 8', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(350, 'MORGAN', 'Plus 4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(351, 'MORGAN', '4 abr', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(352, 'NISSAN', 'NISSAN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(353, 'NISSAN', 'X-TRAIL', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(354, 'NISSAN', 'QASHQAI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(355, 'NISSAN', 'NOTE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(356, 'NISSAN', 'LEAF', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(357, 'NISSAN', 'Pathfinder', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(358, 'NISSAN', 'EVALIA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(359, 'NISSAN', 'Navara', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(360, 'NISSAN', 'Micra', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(361, 'NISSAN', 'JUKE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(362, 'NISSAN', '370Z', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(363, 'NISSAN', 'NV200', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(364, 'NISSAN', 'GT-R', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(365, 'NISSAN', 'PULSAR', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(366, 'NISSAN', 'Murano', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(367, 'NISSAN', 'NV200 EVALIA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(368, 'NISSAN', 'E-NV200 EVALIA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(369, 'OPEL', 'OPEL', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(370, 'OPEL', 'Mokka X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(371, 'OPEL', 'Vivaro', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(372, 'OPEL', 'Grandland X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(373, 'OPEL', 'OPEL (GM COMPANY)', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(374, 'OPEL', 'Corsa', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(375, 'OPEL', 'Astra', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(376, 'OPEL', 'Meriva', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(377, 'OPEL', 'Zafira Tourer', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(378, 'OPEL', 'Zafira', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(379, 'OPEL', 'Insignia', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(380, 'OPEL', 'Combo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(381, 'OPEL', 'Ampera', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(382, 'OPEL', 'Mokka', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(383, 'OPEL', 'Adam', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(384, 'OPEL', 'Cabrio', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(385, 'OPEL', 'Antara', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(386, 'OPEL', 'Karl', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(387, 'OPEL', 'GTC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(388, 'OPEL', 'GTC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(389, 'OPEL', 'Mokka', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(390, 'OPEL', 'Zafira', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(391, 'OPEL', 'Crossland X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(392, 'OPEL', 'Mokka X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(393, 'OPEL', 'Grandland X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(394, 'OPEL', 'Vivaro', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(395, 'PEUGEOT', 'PEUGEOT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(396, 'PEUGEOT', '308', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(397, 'PEUGEOT', '807', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(398, 'PEUGEOT', 'Bipper', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(399, 'PEUGEOT', '508', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(400, 'PEUGEOT', 'Partner', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(401, 'PEUGEOT', '3008', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(402, 'PEUGEOT', '208', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(403, 'PEUGEOT', '2008', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(404, 'PEUGEOT', 'RCZ', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(405, 'PEUGEOT', '5008', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(406, 'PEUGEOT', '4008', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(407, 'PEUGEOT', '108', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(408, 'PEUGEOT', '207', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(409, 'PEUGEOT', 'Ion', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(410, 'PEUGEOT', 'Traveller', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(411, 'PORSCHE', 'PORSCHE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(412, 'PORSCHE', '911', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(413, 'PORSCHE', 'Boxster', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(414, 'PORSCHE', 'Cayenne', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(415, 'PORSCHE', 'Panamera', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(416, 'PORSCHE', '918', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(417, 'PORSCHE', 'Macan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(418, 'PORSCHE', 'Cayman', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(419, 'PORSCHE', '718', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(420, 'RENAULT', 'RENAULT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(421, 'RENAULT', 'Fluence', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(422, 'RENAULT', 'Grand Scénic', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(423, 'RENAULT', 'Latitude', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(424, 'RENAULT', 'Clio', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(425, 'RENAULT', 'Scénic', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(426, 'RENAULT', 'Laguna', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(427, 'RENAULT', 'Kangoo Combi', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(428, 'RENAULT', 'Mégane', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(429, 'RENAULT', 'Grand Kangoo Combi', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(430, 'RENAULT', 'Captur', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(431, 'RENAULT', 'ZOE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(432, 'RENAULT', 'Koleos', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(433, 'RENAULT', 'Twingo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(434, 'RENAULT', 'Espace', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(435, 'RENAULT', 'Kadjar', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(436, 'RENAULT', 'Talisman', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(437, 'ROLLS-ROYCE', 'ROLLS-ROYCE', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(438, 'ROLLS-ROYCE', 'Phantom', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(439, 'SEAT', 'SEAT', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(440, 'SEAT', 'Ibiza', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(441, 'SEAT', 'Nuevo León', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(442, 'SEAT', 'Alhambra', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(443, 'SEAT', 'Altea', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(444, 'SEAT', 'Mii', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(445, 'SEAT', 'Toledo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(446, 'SEAT', 'Altea XL', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(447, 'SEAT', 'Ateca', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(448, 'SEAT', 'León', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(449, 'SEAT', 'Nuevo Ibiza', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(450, 'SEAT', 'Arona', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(451, 'SKODA', 'SKODA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(452, 'SKODA', 'Octavia', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(453, 'SKODA', 'Fabia', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(454, 'SKODA', 'Roomster', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(455, 'SKODA', 'Yeti', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(456, 'SKODA', 'Superb', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(457, 'SKODA', 'Citigo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(458, 'SKODA', 'Rapid', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(459, 'SKODA', 'Spaceback', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(460, 'SKODA', 'Scout', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(461, 'SKODA', 'Kodiaq', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(462, 'SKODA', 'Karoq', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(463, 'SMART', 'SMART', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(464, 'SMART', 'Fortwo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(465, 'SMART', 'Forfour', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(466, 'SSANGYONG', 'SSANGYONG', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(467, 'SSANGYONG', 'Rexton', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(468, 'SSANGYONG', 'Rodius', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(469, 'SSANGYONG', 'Korando', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(470, 'SSANGYONG', 'Actyon Sports Pick Up', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(471, 'SSANGYONG', 'Tivoli', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(472, 'SSANGYONG', 'XLV', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(473, 'SUBARU', 'SUBARU', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(474, 'SUBARU', 'Forester', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(475, 'SUBARU', 'XV', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(476, 'SUBARU', 'Outback', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(477, 'SUBARU', 'BRZ', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(478, 'SUBARU', 'WRX STI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(479, 'SUBARU', 'Levorg', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(480, 'SUBARU', 'WRX STI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(481, 'SUZUKI', 'SUZUKI', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(482, 'SUZUKI', 'Grand Vitara', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(483, 'SUZUKI', 'Swift', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(484, 'SUZUKI', 'SX4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(485, 'SUZUKI', 'Jimny', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(486, 'SUZUKI', 'SX4 S-Cross', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(487, 'SUZUKI', 'Celerio', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(488, 'SUZUKI', 'Kizashi', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(489, 'SUZUKI', 'Vitara', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(490, 'SUZUKI', 'Baleno', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(491, 'SUZUKI', 'Ignis', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(492, 'TATA', 'TATA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(493, 'TATA', 'Xenon', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(494, 'TATA', 'Aria', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(495, 'TATA', 'Vista', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(496, 'TESLA', 'TESLA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(497, 'TESLA', 'Model X', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(498, 'TESLA', 'Model S', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(499, 'TOYOTA', 'TOYOTA', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(500, 'TOYOTA', 'Avensis', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(501, 'TOYOTA', 'Land Cruiser', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(502, 'TOYOTA', 'Yaris', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(503, 'TOYOTA', 'Verso', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(504, 'TOYOTA', 'Auris', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(505, 'TOYOTA', 'Prius+', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(506, 'TOYOTA', 'GT86', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(507, 'TOYOTA', 'Prius', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(508, 'TOYOTA', 'Rav4', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(509, 'TOYOTA', 'Aygo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(510, 'TOYOTA', 'Hilux', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(511, 'TOYOTA', 'Land Cruiser 200', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(512, 'TOYOTA', 'Proace Verso', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(513, 'TOYOTA', 'C-HR', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(514, 'VOLKSWAGEN', 'VOLKSWAGEN', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(515, 'VOLKSWAGEN', 'Polo', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(516, 'VOLKSWAGEN', 'Jetta', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(517, 'VOLKSWAGEN', 'Phaeton', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(518, 'VOLKSWAGEN', 'Golf', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(519, 'VOLKSWAGEN', 'Touran', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(520, 'VOLKSWAGEN', 'Touareg', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(521, 'VOLKSWAGEN', 'Beetle', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(522, 'VOLKSWAGEN', 'Sharan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(523, 'VOLKSWAGEN', 'Tiguan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(524, 'VOLKSWAGEN', 'Multivan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(525, 'VOLKSWAGEN', 'California', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(526, 'VOLKSWAGEN', 'Caravelle', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(527, 'VOLKSWAGEN', 'Up!', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(528, 'VOLKSWAGEN', 'CC', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(529, 'VOLKSWAGEN', 'Golf Sportsvan', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(530, 'VOLKSWAGEN', 'Amarok', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(531, 'VOLKSWAGEN', 'Caddy', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(532, 'VOLKSWAGEN', 'Transporter', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(533, 'VOLKSWAGEN', 'Scirocco', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(534, 'VOLKSWAGEN', 'Passat', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(535, 'VOLKSWAGEN', 'Eos', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(536, 'VOLKSWAGEN', 'Arteon', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(537, 'VOLKSWAGEN', 'T-Roc', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(538, 'VOLKSWAGEN', 'Tiguan Allspace', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(539, 'VOLVO', 'VOLVO', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(540, 'VOLVO', 'V70', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(541, 'VOLVO', 'S80', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(542, 'VOLVO', 'XC70', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(543, 'VOLVO', 'V60', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(544, 'VOLVO', 'S60', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(545, 'VOLVO', 'XC90', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(546, 'VOLVO', 'XC60', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(547, 'VOLVO', 'V40', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(548, 'VOLVO', 'V40 Cross Country', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(549, 'VOLVO', 'V60 Cross Country', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(550, 'VOLVO', 'S60 Cross Country', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(551, 'VOLVO', 'S90', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(552, 'VOLVO', 'V90', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(553, 'VOLVO', 'V90 Cross Country', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(554, 'VOLVO', 'XC40', '2021-09-21 21:38:35', NULL, NULL, NULL, b'1'),
(560, 'LAMBORGHINI', 'Veneno', '2021-09-23 00:00:00', 1, NULL, NULL, b'1'),
(561, 'Buggati', 'Veiron', '2021-10-09 22:32:56', 1, NULL, NULL, b'1'),
(562, 'TOYOTA', 'CAMRY', '2021-10-11 16:18:11', 1, NULL, NULL, b'1'),
(563, 'TOYOTA', 'COROLLA', '2021-10-11 23:00:45', 1, NULL, NULL, b'1'),
(564, 'TOYOTA', 'RAV4', '2021-10-14 02:58:06', 1, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_customers`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_customers`;
CREATE TABLE `vw_customers` (
`Id` int(11)
,`Name` varchar(80)
,`LastName` varchar(80)
,`Phone1` varchar(35)
,`Phone2` varchar(35)
,`Email` varchar(50)
,`DateCreation` datetime
,`UserIdCreation` int(11)
,`LastModificationDate` datetime
,`UserIDLastModification` int(11)
,`IsActive` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_orders`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_orders`;
CREATE TABLE `vw_orders` (
`Id` int(11)
,`IdCustomerOrigin` int(11)
,`CustomerOrigin` varchar(161)
,`CustomerOriginPhone1` varchar(35)
,`CustomerOriginEmail` varchar(50)
,`IdCustomerDestination` int(11)
,`CustomerDestination` varchar(161)
,`CustomerDestinationPhone1` varchar(35)
,`CustomerDestinationEmail` varchar(50)
,`IdCompanyService` int(11)
,`CompanyServices` varchar(80)
,`CompanyAddress` varchar(100)
,`CompanyPhone1` varchar(15)
,`IdDriver` int(11)
,`DriverName` varchar(80)
,`DriverPhone1` varchar(35)
,`Status` varchar(30)
,`OrderDate` date
,`PickUpDate` date
,`DeliveryDate` date
,`OriginAddress` varchar(200)
,`OriginCity` varchar(80)
,`OriginState` varchar(80)
,`OriginZip` varchar(50)
,`OriginNote` text
,`DestinationAddress` varchar(200)
,`DestinationCity` varchar(80)
,`DestinationState` varchar(80)
,`DestinationZip` varchar(50)
,`DestinationNote` text
,`Total` float
,`Deposit` float
,`ExtraTrukerFee` float
,`TrukerOwesUs` float
,`Debemos` varchar(3)
,`NosDeben` varchar(3)
,`Earnings` float
,`Cod` float
,`TrukerRate` float
,`IdPayment` int(11)
,`CreditCard` varchar(300)
,`ExpDate` varchar(300)
,`Cvv` varchar(300)
,`DateCreation` datetime
,`UserIdCreation` int(11)
,`UserName` varchar(50)
,`IsActive` bit(1)
,`LastModificationDate` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_payments`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_payments`;
CREATE TABLE `vw_payments` (
`OrderID` int(11)
,`PaymentID` int(11)
,`Name` varchar(80)
,`CompanyName` varchar(80)
,`DriverName` varchar(80)
,`OrderDate` date
,`Total` float
,`Deposit` float
,`ExtraTrukerFee` float
,`TrukerOwesUs` float
,`Earnings` float
,`CardHolderName` varchar(50)
,`CreditCard` varchar(300)
,`ExpDate` varchar(300)
,`Cvv` varchar(300)
,`PaymentNote` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_users`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_users`;
CREATE TABLE `vw_users` (
`Id` int(11)
,`ProfileUserId` int(11)
,`Profile` varchar(50)
,`Description` varchar(100)
,`Name` varchar(50)
,`LastName` varchar(50)
,`UserName` varchar(50)
,`Password` text
,`Email` varchar(100)
,`Image` text
,`DateCreation` datetime
,`UserIdCreation` int(11)
,`LastModificationDate` datetime
,`UserIdLastModification` int(11)
,`IsActive` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_customers`
--
DROP TABLE IF EXISTS `vw_customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`delimar1`@`localhost` SQL SECURITY DEFINER VIEW `vw_customers`  AS SELECT `c`.`Id` AS `Id`, `c`.`Name` AS `Name`, `c`.`LastName` AS `LastName`, `c`.`Phone1` AS `Phone1`, `c`.`Phone2` AS `Phone2`, `c`.`Email` AS `Email`, `c`.`DateCreation` AS `DateCreation`, `c`.`UserIdCreation` AS `UserIdCreation`, `c`.`LastModificationDate` AS `LastModificationDate`, `c`.`UserIDLastModification` AS `UserIDLastModification`, `c`.`IsActive` AS `IsActive` FROM `tbl_customers` AS `c` WHERE (`c`.`IsActive` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_orders`
--
DROP TABLE IF EXISTS `vw_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`delimar1`@`localhost` SQL SECURITY DEFINER VIEW `vw_orders`  AS SELECT `tbl_orders`.`Id` AS `Id`, `tbl_orders`.`IdCustomerOrigin` AS `IdCustomerOrigin`, concat(`cuo`.`Name`,' ',`cuo`.`LastName`) AS `CustomerOrigin`, `cuo`.`Phone1` AS `CustomerOriginPhone1`, `cuo`.`Email` AS `CustomerOriginEmail`, `tbl_orders`.`IdCustomerDestination` AS `IdCustomerDestination`, concat(`cud`.`Name`,' ',`cud`.`LastName`) AS `CustomerDestination`, `cud`.`Phone1` AS `CustomerDestinationPhone1`, `cud`.`Email` AS `CustomerDestinationEmail`, `tbl_orders`.`IdCompanyService` AS `IdCompanyService`, `cs`.`CompanyName` AS `CompanyServices`, `cs`.`CompanyAddress` AS `CompanyAddress`, `cs`.`CompanyPhone1` AS `CompanyPhone1`, `tbl_orders`.`IdDriver` AS `IdDriver`, `d`.`DriverName` AS `DriverName`, `d`.`DriverPhone1` AS `DriverPhone1`, `ou`.`Status` AS `Status`, `tbl_orders`.`OrderDate` AS `OrderDate`, `tbl_orders`.`PickUpDate` AS `PickUpDate`, `tbl_orders`.`DeliveryDate` AS `DeliveryDate`, `tbl_orders`.`OriginAddress` AS `OriginAddress`, `tbl_orders`.`OriginCity` AS `OriginCity`, `tbl_orders`.`OriginState` AS `OriginState`, `tbl_orders`.`OriginZip` AS `OriginZip`, `tbl_orders`.`OriginNote` AS `OriginNote`, `tbl_orders`.`DestinationAddress` AS `DestinationAddress`, `tbl_orders`.`DestinationCity` AS `DestinationCity`, `tbl_orders`.`DestinationState` AS `DestinationState`, `tbl_orders`.`DestinationZip` AS `DestinationZip`, `tbl_orders`.`DestinationNote` AS `DestinationNote`, `tbl_orders`.`Total` AS `Total`, `tbl_orders`.`Deposit` AS `Deposit`, `tbl_orders`.`ExtraTrukerFee` AS `ExtraTrukerFee`, `tbl_orders`.`TrukerOwesUs` AS `TrukerOwesUs`, if((`tbl_orders`.`ExtraTrukerFee` > 0),'Yes','No') AS `Debemos`, if((`tbl_orders`.`TrukerOwesUs` > 0),'Yes','No') AS `NosDeben`, `tbl_orders`.`Earnings` AS `Earnings`, `tbl_orders`.`Cod` AS `Cod`, `tbl_orders`.`TrukerRate` AS `TrukerRate`, `tbl_orders`.`IdPayment` AS `IdPayment`, `pay`.`CreditCard` AS `CreditCard`, `pay`.`ExpDate` AS `ExpDate`, `pay`.`Cvv` AS `Cvv`, `tbl_orders`.`DateCreation` AS `DateCreation`, `tbl_orders`.`UserIdCreation` AS `UserIdCreation`, `u`.`UserName` AS `UserName`, `tbl_orders`.`IsActive` AS `IsActive`, `tbl_orders`.`LastModificationDate` AS `LastModificationDate` FROM (((((((`tbl_orders` join `tbl_customers` `cuo` on((`tbl_orders`.`IdCustomerOrigin` = `cuo`.`Id`))) join `tbl_customers` `cud` on((`tbl_orders`.`IdCustomerDestination` = `cud`.`Id`))) left join `tbl_company_services` `cs` on((`tbl_orders`.`IdCompanyService` = `cs`.`Id`))) left join `tbl_drivers` `d` on((`tbl_orders`.`IdDriver` = `d`.`Id`))) left join `tbl_payments` `pay` on((`tbl_orders`.`IdPayment` = `pay`.`Id`))) join `tbl_users` `u` on((`tbl_orders`.`UserIdCreation` = `u`.`Id`))) join `tbl_order_status` `ou` on((`tbl_orders`.`OrderStatusID` = `ou`.`Id`))) WHERE (`tbl_orders`.`IsActive` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_payments`
--
DROP TABLE IF EXISTS `vw_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`delimar1`@`localhost` SQL SECURITY DEFINER VIEW `vw_payments`  AS SELECT `o`.`Id` AS `OrderID`, `p`.`Id` AS `PaymentID`, `c`.`Name` AS `Name`, `cs`.`CompanyName` AS `CompanyName`, `d`.`DriverName` AS `DriverName`, `o`.`OrderDate` AS `OrderDate`, `o`.`Total` AS `Total`, `o`.`Deposit` AS `Deposit`, `o`.`ExtraTrukerFee` AS `ExtraTrukerFee`, `o`.`TrukerOwesUs` AS `TrukerOwesUs`, `o`.`Earnings` AS `Earnings`, `p`.`CardHolderName` AS `CardHolderName`, `p`.`CreditCard` AS `CreditCard`, `p`.`ExpDate` AS `ExpDate`, `p`.`Cvv` AS `Cvv`, `p`.`PaymentNote` AS `PaymentNote` FROM ((((`tbl_orders` `o` join `tbl_payments` `p` on((`o`.`IdPayment` = `p`.`Id`))) join `tbl_company_services` `cs` on((`o`.`IdCompanyService` = `cs`.`Id`))) join `tbl_customers` `c` on((`o`.`IdCustomerOrigin` = `c`.`Id`))) join `tbl_drivers` `d` on((`o`.`IdDriver` = `d`.`Id`))) WHERE (`o`.`IsActive` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_users`
--
DROP TABLE IF EXISTS `vw_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`delimar1`@`localhost` SQL SECURITY DEFINER VIEW `vw_users`  AS SELECT `u`.`Id` AS `Id`, `u`.`ProfileUserId` AS `ProfileUserId`, `up`.`Profile` AS `Profile`, `up`.`Description` AS `Description`, `u`.`Name` AS `Name`, `u`.`LastName` AS `LastName`, `u`.`UserName` AS `UserName`, `u`.`Password` AS `Password`, `u`.`Email` AS `Email`, `u`.`Image` AS `Image`, `u`.`DateCreation` AS `DateCreation`, `u`.`UserIdCreation` AS `UserIdCreation`, `u`.`LastModificationDate` AS `LastModificationDate`, `u`.`UserIdLastModification` AS `UserIdLastModification`, `u`.`IsActive` AS `IsActive` FROM (`tbl_users` `u` join `tbl_user_profiles` `up` on((`u`.`ProfileUserId` = `up`.`Id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_company_services`
--
ALTER TABLE `tbl_company_services`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `CompanyName_2` (`CompanyName`),
  ADD KEY `CompanyName` (`CompanyName`);

--
-- Indices de la tabla `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Name` (`Name`,`Phone1`);

--
-- Indices de la tabla `tbl_customer_type`
--
ALTER TABLE `tbl_customer_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DriverName` (`DriverName`,`DriverPhone1`);

--
-- Indices de la tabla `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_customers_origin_idx` (`IdCustomerOrigin`),
  ADD KEY `fk_customers_destination_idx` (`IdCustomerDestination`),
  ADD KEY `fk_company_service_idx` (`IdCompanyService`),
  ADD KEY `fk_driver_idx` (`IdDriver`),
  ADD KEY `fk_estatus_order_idx` (`OrderStatusID`),
  ADD KEY `fk_payment_idx` (`IdPayment`);

--
-- Indices de la tabla `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdOrder` (`IdOrder`);

--
-- Indices de la tabla `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProfileUserId` (`ProfileUserId`);

--
-- Indices de la tabla `tbl_user_profiles`
--
ALTER TABLE `tbl_user_profiles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Brand` (`Brand`,`Model`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_company_services`
--
ALTER TABLE `tbl_company_services`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tbl_customer_type`
--
ALTER TABLE `tbl_customer_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tbl_order_status`
--
ALTER TABLE `tbl_order_status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_user_profiles`
--
ALTER TABLE `tbl_user_profiles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `fk_company_service` FOREIGN KEY (`IdCompanyService`) REFERENCES `tbl_company_services` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customers_destination` FOREIGN KEY (`IdCustomerDestination`) REFERENCES `tbl_customers` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customers_origin` FOREIGN KEY (`IdCustomerOrigin`) REFERENCES `tbl_customers` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_driver` FOREIGN KEY (`IdDriver`) REFERENCES `tbl_drivers` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estatus_order` FOREIGN KEY (`OrderStatusID`) REFERENCES `tbl_order_status` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`IdPayment`) REFERENCES `tbl_payments` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`IdOrder`) REFERENCES `tbl_orders` (`Id`);

--
-- Filtros para la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`ProfileUserId`) REFERENCES `tbl_users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
