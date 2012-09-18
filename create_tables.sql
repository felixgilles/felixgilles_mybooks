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
  `book_title` text NOT NULL,
  `book_img` text NOT NULL,
  `book_publication` text NOT NULL,
  `book_description` text NOT NULL,
  `book_publisher` text NOT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `book_page` int(11) NOT NULL,
  `book_link` varchar(1000) NOT NULL,
  `book_comments` text NOT NULL,
  `book_acquisition` text NOT NULL,
  `book_read` tinyint(1) NOT NULL,
  `book_rating` tinyint(2) NOT NULL,
  `book_created_at` datetime DEFAULT NULL,
  `book_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`book_id`)
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
