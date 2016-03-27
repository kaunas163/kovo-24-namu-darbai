/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : jaksaitytes_duomenu_baziu_nd

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-03-27 21:33:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `authorId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`authorId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('1', 'Chris Smith');
INSERT INTO `authors` VALUES ('2', 'Steven Levithan');
INSERT INTO `authors` VALUES ('3', ' Jan Goyvaerts');
INSERT INTO `authors` VALUES ('4', 'Ryan Benedetti');
INSERT INTO `authors` VALUES ('5', ' Al Anderson');
INSERT INTO `authors` VALUES ('6', 'Clay Breshears');
INSERT INTO `authors` VALUES ('7', 'Kevlin Henney');

-- ----------------------------
-- Table structure for authors_and_books
-- ----------------------------
DROP TABLE IF EXISTS `authors_and_books`;
CREATE TABLE `authors_and_books` (
  `authorId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  PRIMARY KEY (`authorId`,`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authors_and_books
-- ----------------------------
INSERT INTO `authors_and_books` VALUES ('1', '1');
INSERT INTO `authors_and_books` VALUES ('1', '3');
INSERT INTO `authors_and_books` VALUES ('1', '9');
INSERT INTO `authors_and_books` VALUES ('2', '2');
INSERT INTO `authors_and_books` VALUES ('2', '10');
INSERT INTO `authors_and_books` VALUES ('3', '11');
INSERT INTO `authors_and_books` VALUES ('4', '3');
INSERT INTO `authors_and_books` VALUES ('4', '5');
INSERT INTO `authors_and_books` VALUES ('5', '2');
INSERT INTO `authors_and_books` VALUES ('5', '3');
INSERT INTO `authors_and_books` VALUES ('6', '4');

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `year` year(4) DEFAULT NULL,
  `genre` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `original_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`bookId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'Programming F# 3.0, 2nd Edition', '2012', 'knowledge', 'programavimas f#');
INSERT INTO `books` VALUES ('2', 'Regular Expressions Cookbook, 2nd Edition', '2012', 'knowledge', 'reguliarių išsireiškimų knyga');
INSERT INTO `books` VALUES ('3', 'Head First Networking', '2009', 'knowledge', null);
INSERT INTO `books` VALUES ('4', 'The Art of Concurrency', '2009', 'knowledge', null);
INSERT INTO `books` VALUES ('5', '97 Things Every Programmer Should Know', '2010', 'knowledge', null);
INSERT INTO `books` VALUES ('9', 'title one', '2002', 'detective', null);
INSERT INTO `books` VALUES ('10', 'title two', '2005', 'detective', null);
INSERT INTO `books` VALUES ('11', 'title three', '2010', 'detective', null);
