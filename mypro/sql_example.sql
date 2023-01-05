--  
-- Table structure for table `users`  
--  
CREATE TABLE IF NOT EXISTS `users` (  
`id` int(11) NOT NULL AUTO_INCREMENT,  
`username` varchar(250) NOT NULL,  
`password` varchar(250) NOT NULL,  
PRIMARY KEY (`id`)  
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;  
--  
-- Dumping data for table `users`  
--  
INSERT INTO `users` (`id`, `username`, `password`) VALUES  
(1, 'admin', 'admin');  


CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL AUTO_INCREMENT,  
`title` varchar(250) NOT NULL,  
`body` varchar(250) NOT NULL,  
`quantity` int(10) unsigned  NOT NULL DEFAULT '1',
`price` decimal(7,2) NOT NULL,  
PRIMARY KEY (`id`)  
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


INSERT INTO product VALUES
    (NULL, 'book', 'kids book', 1,  15),
    (NULL, 'book', 'kids book', 1, 15),
    (NULL, 'Book', 'kids book', 1,  15);