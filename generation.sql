USE CS4750jdg7sh;

DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(200) NOT NULL,
  `status` varchar(50) DEFAULT 'Regular',
  PRIMARY KEY (username)
) ENGINE=InnoDB;

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('asdfasdf', '0115ea25dcd5e69157614c0492dda08e58cf4dcd', 'Regular');


DROP TABLE IF EXISTS tf_question;
CREATE TABLE tf_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  tf_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID),
  CONSTRAINT CHK_tf CHECK (answer='True' OR answer='False')
);

INSERT INTO tf_question (`tf_prompt`, `answer`) VALUES
('The Starters from Gen 2 were Totodile, Cyndaquil, and Treecko.', 'False'),
('Zuko was the prince of the Fire nation', 'True'),
("Thor’s lightning charged Iron Man's armor to 400% in the first Avengers Movie.", 'True'),
("Bucky killed T'Chaka (T'Challa’s Father) in Captain America: Civil War.", 'False'),
('In the book The Return of the King, Frodo is captured by orcs in Mordor.', 'False'),
('In The Lord of the Rings books, Faramir takes Frodo and Sam to Osgiliath before he lets them continue on their quest.', 'False');


DROP TABLE IF EXISTS mc_question;
CREATE TABLE mc_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  mc_prompt  VARCHAR(300),
  answer     VARCHAR(100),
  option1		VARCHAR(100),
	option2		VARCHAR(100),
  option3		VARCHAR(100),
  PRIMARY KEY (QID)
);

INSERT INTO mc_question (`mc_prompt`, `answer`, `option1`, `option2`, `option3`) VALUES
("Azula’s best friends are...", 'Mai and Ty Lee', 'Katara and Toph', 'Ozai and Iroh', 'Momo and Appa'),
("Who is Gimli's father?", "Gloin", "Gatrie", "Glaive", "Gareth");
