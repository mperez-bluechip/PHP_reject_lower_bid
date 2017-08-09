

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `fullname` varchar(50) NOT NULL,
  `client_bid` decimal(8,2) NOT NULL,
  PRIMARY KEY  (`id`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (
  `fullname`,
  `client_bid`
)
VALUES (
'user2','2000');

INSERT INTO `users` (
  `fullname`,
  `client_bid`
)
VALUES (
'user3','2500');
