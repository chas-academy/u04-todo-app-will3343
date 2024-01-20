/*create table for to-do-list tasks*/
CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT '0',
  KEY `id` (`id`)
) AUTO_INCREMENT=4;

DELETE FROM `todos`;

INSERT INTO 'todos'  ('id', 'title', 'status') VALUES
           (1, 'väck upp och ta en morgon promenad', 0),
           (2, 'frukost', 0),
           (3, 'coda', 0),
           (4, 'vila en stund', 1);

/*create db for registration, login*/
CREATE TABLE 'users'(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Age int,
    Password varchar(200)
);

INSERT INTO 'users'  ('id', 'Username', 'Email', 'Age', 'Password') VALUES
           (1, 'admin','admin@admin.se','29', 'admin123');
           