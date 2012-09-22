CREATE TABLE IF NOT EXISTS `mybooks_author` (
  `author_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) NOT NULL,
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `author_name` (`author_name`)
);

CREATE TABLE IF NOT EXISTS `mybooks_author_book` (
  `book_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  KEY `author_id` (`author_id`),
  KEY `book_id` (`book_id`)
);

CREATE TABLE IF NOT EXISTS `mybooks_book` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_title` varchar(255) NOT NULL,
  `book_img` varchar(255) DEFAULT NULL,
  `book_publication` date DEFAULT NULL,
  `book_publisher` varchar(255) DEFAULT NULL,
  `book_isbn` varchar(50) DEFAULT NULL,
  `book_page` int(11) DEFAULT NULL,
  `book_link` varchar(255) DEFAULT NULL,
  `book_acquisition` date DEFAULT NULL,
  `book_read` tinyint(1) NOT NULL,
  `book_rating` tinyint(2) DEFAULT NULL,
  `book_created_at` datetime DEFAULT NULL,
  `book_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `book_title` (`book_title`)
);

CREATE TABLE IF NOT EXISTS `mybooks_tag` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_label` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag_label` (`tag_label`)
);

CREATE TABLE IF NOT EXISTS `mybooks_tag_book` (
  `book_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  KEY `tag_id` (`tag_id`),
  KEY `book_id` (`book_id`)
);
