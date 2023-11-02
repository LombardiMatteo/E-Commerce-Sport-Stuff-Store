-- Progettazione Web 
DROP DATABASE if exists lombardi_579918; 
CREATE DATABASE lombardi_579918; 
USE lombardi_579918; 
-- MySQL dump 10.13  Distrib 5.7.28, for Win64 (x86_64)
--
-- Host: localhost    Database: lombardi_579918
-- ------------------------------------------------------
-- Server version	5.7.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `userEmail` varchar(100) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPic` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  PRIMARY KEY (`userEmail`,`productId`),
  KEY `fk_userinfo_has_product_product1_idx` (`productId`),
  KEY `fk_userinfo_has_product_userinfo_idx` (`userEmail`),
  CONSTRAINT `fk_userinfo_has_product_product1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userinfo_has_product_userinfo` FOREIGN KEY (`userEmail`) REFERENCES `userinfo` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(100) NOT NULL,
  `details` varchar(2000) NOT NULL,
  `totalPrice` decimal(5,2) NOT NULL,
  `shippingAddress` varchar(255) NOT NULL,
  `orderDate` datetime NOT NULL,
  `deliveryDate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_userinfo1_idx` (`userEmail`),
  CONSTRAINT `fk_order_userinfo1` FOREIGN KEY (`userEmail`) REFERENCES `userinfo` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `details` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'6 Pack Mesh Training Bibs',23.99,'picture/training_bibs.jpeg','The Sondico 6 Pack Mesh Bibs are great for your training sessions with the mesh construction for a lightweight and breathable design, finished off with Sondico branding to the front.'),(2,'Space Markers 50 Box',21.59,'picture/space_markers.jpeg','The Sondico Space Markers 50 Box is perfect for outdoor training sessions for both adults and children. Featuring fifty markers in several colours and a carry handle to make it easy to collect and store.'),(3,'Adult Tr Hypercharge Straw Bottle',24.99,'picture/water_bottle.jpeg','This Nike TR Hypercharge drinking bottle with straw has a capacity of 32 oz and is made of Tritan, Polyproylene, Silicone, Nylon, Thermoplastic Elastomer and Polyoxmethylene. It is BPA free and dishwasher safe and should be washed before first use. The sports bottle has an innovative push button for one-handed opening, a removable soft straw for easy cleaning and an ergonomic handle for a particularly good grip.'),(4,'Nanoflare TX Badminton Racket',44.95,'picture/badminton_racket.jpeg','The Yonex Nanoflare TX badminton racket is designed for beginners and for those who need support while learning basic techniques. Balanced to the grip brings excellent reaction speed, agility and in combination with a very flexible shaft (Hi-Flex) you get plenty of force.'),(5,'T800 Shuttlecocks',7.80,'picture/badminton_shuttlecocks.jpeg','The Carlton T800 Shuttlecocks are perfect for your next match and are constructed with durable synthetic skirt for premium quality.'),(6,' Aluminium Baseball Bat Set',26.39,'picture/baseball_set.jpeg','This Slazenger Aluminium Baseball Bat Set includes a 34\" bat and a baseball.'),(7,'Wilson Evolution Basketball',55.20,'picture/basketball_ball.jpeg','Official Game Ball of Basketball England, used in Under 18 and 16 Boys and Girls. Moisture-wicking composite cover. Evo Microfiber Composite - Best combination of grip and durability. Laid In Composite Channels provide more control over standard smooth channels. Cushion Core Carcass allows a softer feel that is easier to grip. Recommended for 16+ school, college and academy competitions.'),(8,'Everlast - 1910 Classic Training Glove',59.99,'picture/boxing_gloves.jpeg','The Everlast 1910 Classic Training Glove is a modern take on a legendary boxing glove line. Built with premium leather & ventilated palms, the 1910 Training Glove is an elevated classic with a modern fit. Timeless icon of boxing style with laser etched detailing on fist and authentic Everlast logo on cuff. The 1910 will fit right in while hitting mitts at your local spit and sawdust gym and at your favourite boxing for fitness class.'),(9,'UCL League Football 2023-24',32.99,'picture/football_ball.jpeg','The adidas UCL League Football 2023-24 is perfect for matches and training sessions, featuring a white base with star panels that gives a classic look. Machine stitched panels along with printed detail and the classic adidas branding completes the look.'),(10,'Futsal Maestro Soccer Ball',23.99,'picture/futsal_ball.jpeg','Easy to see, high-contrast graphics pair with a premium textured casing and a smaller, heavier design to create the optimal futsal ball.'),(11,'V300 Soft Golf Balls 24 Pack',21.60,'picture/golf_balls.jpeg','The Slazenger V300 Soft Golf Balls have been engineered with a soft, responsive core with a durable Surlyn cover with a 352 dimple pattern for higher ball flight.'),(12,'V300 Golf Set',348.00,'picture/golf_set.jpeg','This premium Slazenger V3000 Golf Set contains one driver, a 3 wood, one hybrid, seven irons (5-SW), a putter, a stand bag, three headcovers and a rain hood.'),(13,'Brooklyn Gym Sack Bag',9.59,'picture/gym_sack.jpeg','The Everlast Brooklyn Gym Sack offers plenty of storage thanks to the large compartment with drawstring fastening and the smaller zipped pocket to the front, complete with the Everlast branding for a great look.'),(14,'Dunlop Team Padel Ball (Pack of 3)',7.20,'picture/padel_balls.jpeg','Tube of 3 balls developed specifically for padel. Exclusive core combined with a premium synthetic felt offers superior performance with exceptional durability. Ideal ball for leagues, training and recreational play.'),(15,'Dunlop - Boost Power Padel Racket',69.60,'picture/padel_racket.jpeg','Dunlop Boost Power 2.0 is made of the world\'s lightest solid material, graphite. This gives you a racket of high quality with good properties - consistent strokes, increased power and an even greater feel. '),(16,'Club Table Tennis Balls 6 Pack',3.00,'picture/pingpong_balls.jpeg','Good quality and hard wearing, these are ideal balls for table tennis training. Size 40mm.'),(17,'Cornilleau Perform 600 ITTF 4 Star Bat',43.20,'picture/pingpong_racket.jpeg','The Perform 600 is recommended for advanced players. It is ideal for regular players who want to improve their game and gives the player control over speed and spin. The AERO and OFC technologies provide the Perform 600 table tennis bat with unrivalled ball control and contact. Featuring a powerful grip, its coverings guarantee you consistent trajectories and spin with every single shot. 1.8mm sponge ensures a very high speed. The 4-star ITTF rubber ensures a very good transmission of spin. 5-ply blade will provide you both sensations and speed play.'),(18,'Omega Rugby Ball',29.99,'picture/rugby_ball.jpeg','Master your game and turn conversions into trys with the Gilbert Omega Rugby Ball, featuring a 4 panel construction with hand stitching and the textured design for an easier catch and hold. This Match Ball has a Truflight bladder for a cleaner kick and straighter flight, complete with Gilbert branding for a great look.'),(19,'Canterbury - Raze Headguard Mens',39.59,'picture/rugby_helmet.jpeg','Protect your head with this headguard for rugby that shields your child from cuts and abrasions. Crafted with foam padding for comfort and impact resistance then also featuring a soft edge stress release chin strap that\'s made to break under an extreme load. All while also being fitted with some specially crafted holes for ventilation, this piece of headgear then conforms to the World Rugby Specification.'),(20,'Brasilia Shoebag',11.40,'picture/shoe_bag.jpeg','The Nike Brasilia Shoebag is perfect for storing your training shoes or football boots, designed with a carry handle to the side with a zip fastening to the top for a secure fastening. This Nike boot bag also features a zipped pocket to the front along with a mesh panel to the side for ventilation, completed with the iconic Nike swoosh to the front.'),(21,'Head Tour Tennis Balls',9.59,'picture/tennis_balls.jpeg','The HEAD Tour Tennis Balls have been designed with Encore technology and SmartOptik for better durability and visibility. These HEAD tennis balls are design for play on a huge range of courts, made made polymers to the core that limits the softening, resulting in the ball staying fresher for longer. 4 balls per tubeEncore technology SmartOptik felt Head branding.'),(22,'Wilson Nemesis Tennis Racket',47.99,'picture/tennis_racket.jpeg','Well blanced the Wilson Nemesis Tennis Racket provides a middle ground between playability and power! This fine tuning and easy control enables you to play more with technique and finesse using a forgiving platform. This effect helps to nurture confidence and progression to help your skills grow.'),(23,'Training Agility Kit',126.00,'picture/training_kit.jpeg','Need faster wingers? Complete kit to create effective, agility-intensive training sessions. One pack contains the following equipment6 adjustable training hurdles (9\") to improve explosive power10 yellow hat-shaped cones (9\") to help develop speed and agility40 dome-shaped cones with stand (2\") to run a variety of training drills and sessions2 agility ladders (4m) to get ahead of your opponent and accelerate through the blocks.'),(24,'All Court Volleyball',35.99,'picture/volleyball_ball.jpeg','Durable exterior is made for all types of courts-Soft, composite leather for a comfortable feel-Ball is designed to keep its shape over time.productproduct');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userinfo` (
  `email` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-27 17:07:11
