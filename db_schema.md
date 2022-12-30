CREATE TABLE IF NOT EXISTS `UserRegistration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First Name` varchar(256) NOT NULL,
  `Last Name` varchar(256) NOT NULL,
  `Email` varchar(50),
`Password` varchar(50),
`Confirm Password` varchar(50),
  `Role` varchar(255) NOT NULL,
  `Phone` varchar(50),
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `UserRegistrationTrack` (
  `id` int(11) NOT NULL ,
  `Title` varchar(256) NOT NULL,
  `Post` varchar(256) NOT NULL
)

also check database.php file to configure your db
use post-man to test the api's

