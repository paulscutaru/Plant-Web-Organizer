-- phpMyAdmin 
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- MySql

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(30) NOT NULL,
 `password` varchar(256) NOT NULL,
 `email` varchar(30) NOT NULL,
 `date` date DEFAULT NULL,
 `type` varchar(100) DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `plants` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_user` int(11) NOT NULL,
 `id_album` int(11) DEFAULT NULL,
 `photo` varchar(256) NOT NULL,
 `name` varchar(100) NOT NULL,
 `region` varchar(100) NOT NULL,
 `color` varchar(30) NOT NULL,
 `uses` varchar(30) NOT NULL,
 `others` varchar(30) NOT NULL,
 `date` date NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_plants` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) 
  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

	
CREATE TABLE `albums` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `id_user` int(11) NOT NULL,
 `photo` varchar(256) NOT NULL,
 `name` varchar(50) NOT NULL,
 PRIMARY KEY (`id`),
 CONSTRAINT `fk_user_albums` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;