-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Database server
-- Server: 127.0.0.1 via TCP/IP
-- Server type: MariaDB
-- Server connection: SSL is not being used Documentation
-- Server version: 10.4.32-MariaDB - mariadb.org binary distribution
-- Protocol version: 10
-- User: root@localhost
-- Server charset: UTF-8 Unicode (utf8mb4)
-- Web server
-- Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.0.30
-- Database client version: libmysql - mysqlnd 8.0.30
-- PHP extension: mysqli Documentation curl Documentation mbstring Documentation
-- PHP version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Create database
CREATE DATABASE church_register;

-- Use the database
USE church_register;

-- Create announcements table (replacing church_register)
CREATE TABLE announcements (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(200) NOT NULL,
    date DATE NOT NULL,
    opening_prayer VARCHAR(255) NOT NULL,
    worship VARCHAR(255) NOT NULL,
    sermon VARCHAR(255) NOT NULL,
    intensive_prayer VARCHAR(255) NOT NULL,
    offertory_fundraising VARCHAR(255) NOT NULL,
    conductor TEXT NOT NULL,
    remarks_ministry VARCHAR(255) NOT NULL
);

-- Create attendance table
CREATE TABLE attendance (
    AttendanceID INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    number INT(11) NOT NULL,
    AttendanceDate DATE NOT NULL
);

-- Create members table (updated)
CREATE TABLE members (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    church_id VARCHAR(500) NOT NULL
);

-- Create childre_ministry_members table
CREATE TABLE childre_ministry_members (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    parent_phone_number VARCHAR(200) NOT NULL,
    age INT(11) NOT NULL,
    gender VARCHAR(200) NOT NULL
);

-- Create congregants table
CREATE TABLE congregants (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    phone_number VARCHAR(200) NOT NULL,
    date_registered DATE NOT NULL
);

-- Create images table
CREATE TABLE images (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

-- Create ministry_members table
CREATE TABLE ministry_members (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    phone_number VARCHAR(200) NOT NULL,
    role VARCHAR(200) NOT NULL,
    gender VARCHAR(200) NOT NULL,
    ministry_type VARCHAR(200) NOT NULL
);

-- Create youth_ministry_members table
CREATE TABLE youth_ministry_members (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    phone_number VARCHAR(200) NOT NULL,
    gender VARCHAR(200) NOT NULL,
    group VARCHAR(200) NOT NULL
);

-- Create other_announcements table
CREATE TABLE other_announcements (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    announcement_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
