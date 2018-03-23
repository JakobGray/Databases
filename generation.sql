USE CS4750jdg7sh;

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT
ON CS4750jdg7sh.* TO 'CS4750jdg7sha'@'%';

DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(200) NOT NULL,
  `status`   varchar(50) DEFAULT 'Regular',
  PRIMARY KEY (username)
) ENGINE=InnoDB;

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('asdfasdf', '0115ea25dcd5e69157614c0492dda08e58cf4dcd', 'Regular');

DROP TABLE IF EXISTS leaderboard;
CREATE TABLE leaderboard (
	LID	     	INT(11) NOT NULL UNIQUE,
  GID       INT(11) NOT NULL REFERENCES game ON DELETE CASCADE,
  username  VARCHAR(100) REFERENCES user ON DELETE CASCADE,
  score     INT(11),
  primary key (LID, GID, username)
);



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
('Scarlet Witch said no more mutants', 'True'),
('Magneto killed Xavier and split the X-Men', 'False'),
("Black Widow's full name is Natalia Ravenova", 'False'),
("Prompt: In the book, The Fellowship of the Ring, Arwen takes Frodo to Rivendell after he is attacked by the Black Riders.", 'False'),
("Merry and Pippin are cousins.", 'True'),
("In the book, The Fellowship of the Ring, Boromir is given a silver belt by the elf Galadriel.", 'True'),
("In the book, The Fellowship of the Ring, Sam is given elvish rope by the elf Galadriel.", 'False'),
("In the book, Frodo sold Bag End before taking the ring to Rivendell.", 'True'),
("In the book, after completing the quest of the ring, Sam became the mayor of the Shire.", 'True'),
("In the book, Boromir blows the horn of Gondor as the Fellowship sets off from Rivendell.", 'True'),
('In The Lord of the Rings books, Faramir takes Frodo and Sam to Osgiliath before he lets them continue on their quest.', 'False');


DROP TABLE IF EXISTS mc_question;
CREATE TABLE mc_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  mc_prompt  VARCHAR(300),
  answer     VARCHAR(100),
  option1		 VARCHAR(100),
	option2		 VARCHAR(100),
  option3		 VARCHAR(100),
  PRIMARY KEY (QID)
);

INSERT INTO mc_question (`mc_prompt`, `answer`, `option1`, `option2`, `option3`) VALUES
("Azula’s best friends are...", 'Mai and Ty Lee', 'Katara and Toph', 'Ozai and Iroh', 'Momo and Appa'),

("After Flash Thompson finished bullying Peter Parker, he became ...", "Agent Venom", "Hobgoblin", "Spider Man", "Crime Master"),
("Spider Man's parents are ...", "Richard and Mary", "Frank and Alice", "Bruce and Katherine", "William and Liz"),
("Which member of the Guardians of the Galaxy is related to Thanos?", "Gamora", "Groot", "Drax the Destroyer", "Mantis"),
("Who served as Ant Man", "Henry Pym", "Wade Wilson", "Matt Murdock", "Wilson Fisk"),
("The Fantastic Four have the headquarters in what buildng?", "Baxter Building", "Stark Tower", "Fantastic Headquarters", "Xavier Institute"),

("What did Sam Gamgee name his first child?", 'Elinor', 'Frodo', 'Rosy', 'Bilbo'),
("Who helped Ang learn Earth bender? ","Toph ","Ozai", "Katara", "Sokka"),
("How long was Aang frozen in an iceberg? ","100 years ","100 months","10 days","1000 years"),
("____ killed the Moon Spirit. ","Zhao ","Iroh "," Suko ","Yue"),
("Which nation started the 100 years war?","Fire nation ","Water nation","Water nation","Earth Nation ")
("Prompt: In the book, The Return of the King, who does Theoden talk with right before he dies?", 'Merry', 'Eowyn', 'Aragorn', 'Eomer'),
("What is the name of Gandalf’s horse?", 'Shadowfax', 'Snowmane', 'Asfaloth', 'Brego'),
("In the book, The Fellowship of the Ring, who does Aragorn meet when he is guiding the hobbits from Bree to Rivendell?", 'Glorfindel', 'Arwen', 'Elladan', 'Elrond'),
("In the book, The Fellowship of the Ring, who was the first person at the council of Elrond who volunteered to take the ring to Mordor?", 'Bilbo', 'Frodo', 'Aragorn', 'Boromir'),
("What is the name ‘Elinor’ based on?", 'A flower', 'An elf', 'A tree', 'A place'),
("Prompt: At the beginning of The Fellowship of the Ring book, what age was Bilbo celebrating at his birthday?", '111', '103', '92', '113'),

("Who is Gimli's father?", "Gloin", "Gatrie", "Glaive", "Gareth");


DROP TABLE IF EXISTS c_question;
CREATE TABLE c_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  c_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID)
);

INSERT INTO c_question (`c_prompt`, `answer`) VALUES
("The ____ hosts the space gem in the first Avengers Movie", "Tesseract");




DROP TABLE IF EXISTS script_question;
CREATE TABLE script_question (
  QID           INT(11) NOT NULL AUTO_INCREMENT,
  script_text   TEXT,
  answer        VARCHAR(100),
  PRIMARY KEY (QID)
);

INSERT INTO script_question (`script_text`, `answer`) VALUES
(
"Iroh: Water is the element of change. [Draws the waterbending insignia.] The people of the Water Tribe are capable of adapting to many things. They have a deep sense of community and love that holds them together through anything.
Zuko:	Why are you telling me these things?
Iroh:	It is important to draw wisdom from many different places. If you take it from only one place, it becomes rigid and stale. [Divides the four insignias into separate sections.] Understanding others, the other elements, and the other nations will help you become whole. [Draws a circle around the insignias.]
Zuko:	All this four elements talk is sounding like Avatar stuff.
Iroh:	It is the combination of the four elements in one person that makes the Avatar so powerful. But it can make you more powerful, too. You see the technique I'm about to teach you is one I learned by studying the waterbenders." ,
"Bitter Work"),
(
"Katara:	Sokka's right. We need to find King Bumi, so Aang can learn earthbending somewhere safe.
Chong:	Sounds like you're headed to Omashu.
Sokka: smacks his forehead in frustration.
Chong:	There's an old story about a secret pass right through the mountains.
Katara:	Is this real or a legend?
Chong:	Oh, it's a real legend. And it's as old as earthbending itself. [Begins strumming his lute and singing.] Two lovers, forbidden from one another, the war divides their people and the mountain divides them apart! Built a path to be together! [Stops playing.] Yeah, I forget the next couple of lines, but then it goes ... [Resumes singing.] Secret tunnel! Secret tunnel! Through the mountains, secret, secret, secret, secret tunnel! Yeah!",
"The Cave of Two Lovers");
