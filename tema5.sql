-- Post Table

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(124) NOT NULL,
  `post_body` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO post VALUES('1','First post','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sollicitudin, justo vel fringilla adipiscing, urna odio bibendum ligula, ac vestibulum metus velit nec eros. Ut non velit quam. Mauris molestie at ipsum non molestie. Sed tempus urna vel nisl hendrerit, nec suscipit velit sagittis. Cras imperdiet aliquet tellus, non aliquam erat faucibus eget. Aenean bibendum purus quis metus cursus, lobortis dapibus elit rhoncus. Nulla vehicula id dui at ornare. Aliquam eu dui eros.');
INSERT INTO post VALUES('2','Second Post','Vivamus rutrum euismod auctor. Curabitur blandit dictum vestibulum. Suspendisse et ipsum elementum felis euismod ultrices at vel magna. Proin convallis libero velit, nec commodo eros consectetur nec. Praesent vehicula urna odio, egestas rutrum dui venenatis euismod. Suspendisse ipsum nisl, sollicitudin nec enim quis, sodales ullamcorper nisi. Vestibulum at massa eget ligula ultrices condimentum eget ultrices odio. Proin sit amet risus at urna dictum fermentum. Donec eleifend risus quis elit rutrum molestie. Proin tempus purus vitae nulla posuere molestie. In ultricies purus congue dui sagittis fringilla');
-- Comment Table

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(8) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);