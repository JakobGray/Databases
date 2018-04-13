USE CS4750kx3jj;
GRANT SELECT, INSERT
ON CS4750kx3jj.* TO 'CS4750kx3jj'@'%';

-- create the users and grant priveleges to those users
DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(200) NOT NULL,
  `status`   varchar(50) DEFAULT 'Regular',
  PRIMARY KEY (username)
) ENGINE=InnoDB;

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('asdfasdf', '0115ea25dcd5e69157614c0492dda08e58cf4dcd', 'Regular'),
('user', '45f106ef4d5161e7aa38cf6c666607f25748b6ca', 'Regular');

-- UNCOMMENT THE COMMENT STUFF --> THIS WILL BYPASS THE FORGIGN KEYS
-- SET FOREIGN_KEY_CHECKS=0;

--ALL OF THE THE TYPES OF QUESTIONS
DROP TABLE IF EXISTS tf_question;
CREATE TABLE tf_question (
  QID        INT(11) NOT NULL,
  tf_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID),
  CONSTRAINT CHK_tf CHECK (answer='True' OR answer='False')
) ENGINE=INNODB;
INSERT INTO `CS4750srs5sb`.`tf_question` (`QID`, `tf_prompt`, `answer`) VALUES 
('1', 'The Starters from Gen 2 were Totodile, Cyndaquil, and Treecko.', 'False'),
('2','During his adventures in Hoenn, Ash Ketchum caught a Torkoal for his team.','True'),
('3', "N was the final boss of Pokemon Black and Pokemon White.", "False"),
('4',"In Pokemon Gold and Pokemon Silver, you explore Kanto and Johto regions.", "True"),
('5',"The champion of the Sinnoh region is Cynthia", "True"),
('6','Zuko was the prince of the Fire nation', 'True'),
('7',"Thor’s lightning charged Iron Man's armor to 400% in the first Avengers Movie.", 'True'),
('8',"Bucky killed T'Chaka (T'Challa’s Father) in Captain America: Civil War.", 'False'),
('9','In the book The Return of the King, Frodo is captured by orcs in Mordor.', 'False'),
('10','Scarlet Witch said no more mutants', 'True'),
('11','Magneto killed Xavier and split the X-Men', 'False'),
('12',"Black Widow's full name is Natalia Ravenova", 'False'),
('13',"In the book, The Fellowship of the Ring, Arwen takes Frodo to Rivendell after he is attacked by the Black Riders.", 'False'),
('14',"Merry and Pippin are cousins.", 'True'),
('15',"In the book, The Fellowship of the Ring, Boromir is given a silver belt by the elf Galadriel.", 'True'),
('16',"In the book, The Fellowship of the Ring, Sam is given elvish rope by the elf Galadriel.", 'False'),
('17',"In the book, Frodo sold Bag End before taking the ring to Rivendell.", 'True'),
('18',"In the book, after completing the quest of the ring, Sam became the mayor of the Shire.", 'True'),
('19',"In the book, Boromir blows the horn of Gondor as the Fellowship sets off from Rivendell.", 'True'),
('20','In The Lord of the Rings books, Faramir takes Frodo and Sam to Osgiliath before he lets them continue on their quest.', 'False'),
('21',"Rok, the avatar before, Aang started out as an fire-bender.","True"),
('22',"Sakka was a better water bender than his sister,  Katara. ","False "),
('23',"Princess Yue of the water tribe was very ill as a child, but was saved by Moon Spirit. ","True"),
('24',"Ba Sing Se is a small Earth bending village that has no protection. ","False")
;

DROP TABLE IF EXISTS mc_question;
CREATE TABLE mc_question (
  QID        INT(11) NOT NULL,
  mc_prompt  VARCHAR(300),
  answer     VARCHAR(100),
  option1    VARCHAR(100),
  option2    VARCHAR(100),
  option3    VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;
INSERT INTO mc_question (`mc_prompt`, `answer`, `option1`, `option2`, `option3`) VALUES
('25',"Azula’s best friends are...", 'Mai and Ty Lee', 'Katara and Toph', 'Ozai and Iroh', 'Momo and Appa'),
('26',"After Flash Thompson finished bullying Peter Parker, he became ...", "Agent Venom", "Hobgoblin", "Spider Man", "Crime Master"),
('27',"Spider Man's parents are ...", "Richard and Mary", "Frank and Alice", "Bruce and Katherine", "William and Liz"),
('28',"Which member of the Guardians of the Galaxy is related to Thanos?", "Gamora", "Groot", "Drax the Destroyer", "Mantis"),
('29',"Who served as Ant Man", "Henry Pym", "Wade Wilson", "Matt Murdock", "Wilson Fisk"),
('30',"The Fantastic Four have the headquarters in what buildng?", "Baxter Building", "Stark Tower", "Fantastic Headquarters", "Xavier Institute"),
('31',"What did Sam Gamgee name his first child?", 'Elinor', 'Frodo', 'Rosy', 'Bilbo'),
('32',"Who helped Ang learn Earth bender? ","Toph ","Ozai", "Katara", "Sokka"),
('33',"How long was Aang frozen in an iceberg? ","100 years ","100 months","10 days","1000 years"),
('34',"____ killed the Moon Spirit. ","Zhao ","Iroh "," Suko ","Yue"),
('35',"Which nation started the 100 years war?","Fire nation ","Water nation","Air nation","Earth Nation "),
('36'," In the book, The Return of the King, who does Theoden talk with right before he dies?", 'Merry', 'Eowyn', 'Aragorn', 'Eomer'),
('37',"Which of these were the evil team of the Unova region?", "Team Plasma", "Team Magma", "Team Galactic", "Team Skull"),
('38',"Which of these characters traveled with Ash Ketchum in Pokemon X & Y?", "Serena & Clemont", "Brock & Misty", "May & Max", "Cilan & Iris"),
('39',"In Pokemon Sun and Moon, Lillie's nickname for Cosmog is:", "Nebby", "Smoggy", "Cosmo", "Nova"),
('40',"In Pokemon Gold and Pokemon Silver, who can you battle on top of Mt. Silver?", "Red", "Blue", "Giovanni", "Silver"),
('41',"Which of these is NOT an evolution of Eevee?", "Cloudeon", "Sylveon", "Glaceon", "Leafeon"),
('42',"What is the name of Gandalf’s horse?", 'Shadowfax', 'Snowmane', 'Asfaloth', 'Brego'),
('43',"In the book, The Fellowship of the Ring, who does Aragorn meet when he is guiding the hobbits from Bree to Rivendell?", 'Glorfindel', 'Arwen', 'Elladan', 'Elrond'),
('44',"In the book, The Fellowship of the Ring, who was the first person at the council of Elrond who volunteered to take the ring to Mordor?", 'Bilbo', 'Frodo', 'Aragorn', 'Boromir'),
('45',"What is the name ‘Elinor’ based on?", 'A flower', 'An elf', 'A tree', 'A place'),
('46',"At the beginning of The Fellowship of the Ring book, what age was Bilbo celebrating at his birthday?", '111', '103', '92', '113'),
('47',"Who is Gimli's father?", "Gloin", "Gatrie", "Glaive", "Gareth");


DROP TABLE IF EXISTS c_question;
CREATE TABLE c_question (
  QID        INT(11) NOT NULL,
  c_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

INSERT INTO c_question (QID, c_prompt, answer) VALUES
('48',"The ____ hosts the space gem in the first Avengers Movie", "Tesseract"),
('49',"Jessica Jones is married to ___", "Luke Cage"),
('50',"Comic book writer ____ created Hawkeye", "Stan Lee"),
('51',"Captain America fought against ____ in Civil War", "Iron Man"),
('52',"Edwin Jarvis is the butler to _____", "Tony Stark"),
('53',"Three rings for _______  _______ under the sky.", "Elven Kings"),
('54',"I wasn’t droppin no _____ sir!", "eaves"),
('55',"Nothing important! I heard a great deal about a ring, and a dark lord, and something about the ______  ______  ______  ______.", "end of the world"),
('56',"It’s talking Merry!  The _____ is talking!", "tree"),
('57',"Good morning?!  But it’s ______ already!", "nighttime"),
('58',"In the land of Mordor, where the _____  lie.", "shadows"),
('59',"That still only counts as _____!", "one"),
('60',"The road goes ever on and on, down from the _____ where it began.", "door"),
('61',"_____?  That’s not bad for a pointy eared elvish princeling.", "42"),
('62',"_____ roots are not reached by the frost.", "Deep"),
('63',"The ______  ______  ______  _____ his heart, as he looked up out of the forsaken land, and hope returned to him.", "beauty of it smote"),
('64',"Anyway, you need someone of intelligence on this mission. ______.  ______.", "Quest Thing"),
('65',"The ______ warriors were a group of women who fought with metal fans.","Kyoshi"),
('66',"Aang and his friends had to go through _____  Pass to get to Ba Sing Se. ","Serpent"),
('67',"_____,was born blind, but use to secretly compete in earth bending tournaments. ","Toph"),
('68',"Hama, a prisoner of war, taught Katara about _______ _______.","blood bending"),
('69', "Aang had a crush and eventually got with _______.","Katara"),
('70',"Hi! I like _____! They're comphy and easy to wear!", "shorts"),
('71',"I see now that circumstances of one's birth are irrelevant.  It is what you do with the ____ __ ____ that determines who you are.", "gift of life"),
('72',"The legendary Pokemon on the cover of Pokemon Emerald is ________", "Rayquaza"),
('73',"Originally from Pokemon X & Y, ________ made an apperance as a newcomer in Super Smash Bros. for Wii U and 3DS.", "Greninja"),
('74',"The Kalos region is modeled after the real world country of _______", "France")
;

DROP TABLE IF EXISTS script_question;
CREATE TABLE script_question (
  QID           INT(11) NOT NULL AUTO_INCREMENT,
  script_text   TEXT,
  answer        VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;


INSERT INTO script_question (QID, script_text, answer) VALUES
('75',
"Iroh: Water is the element of change. [Draws the waterbending insignia.] The people of the Water Tribe are capable of adapting to many things. They have a deep sense of community and love that holds them together through anything.
Zuko: Why are you telling me these things?
Iroh: It is important to draw wisdom from many different places. If you take it from only one place, it becomes rigid and stale. [Divides the four insignias into separate sections.] Understanding others, the other elements, and the other nations will help you become whole. [Draws a circle around the insignias.]
Zuko: All this four elements talk is sounding like Avatar stuff.
Iroh: It is the combination of the four elements in one person that makes the Avatar so powerful. But it can make you more powerful, too. You see the technique I'm about to teach you is one I learned by studying the waterbenders." ,
"Bitter Work"),
('76',
"Katara:  Sokka's right. We need to find King Bumi, so Aang can learn earthbending somewhere safe.
Chong:  Sounds like you're headed to Omashu.
Sokka: smacks his forehead in frustration.
Chong:  There's an old story about a secret pass right through the mountains.
Katara: Is this real or a legend?
Chong:  Oh, it's a real legend. And it's as old as earthbending itself. [Begins strumming his lute and singing.] Two lovers, forbidden from one another, the war divides their people and the mountain divides them apart! Built a path to be together! [Stops playing.] Yeah, I forget the next couple of lines, but then it goes ... [Resumes singing.] Secret tunnel! Secret tunnel! Through the mountains, secret, secret, secret, secret tunnel! Yeah!",
"The Cave of Two Lovers");
--PARENT QUESTION 
DROP TABLE IF EXISTS question;
CREATE TABLE question (
  QID           INT(11) NOT NULL AUTO_INCREMENT,
  script_text   TEXT,
  answer        VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;


INSERT INTO question (`prompt`, `answer`) VALUES
('The Starters from Gen 2 were Totodile, Cyndaquil, and Treecko.', 'False'),
('During his adventures in Hoenn, Ash Ketchum caught a Torkoal for his team.','True'),
(" N was the final boss of Pokemon Black and Pokemon White.", "False"),
("In Pokemon Gold and Pokemon Silver, you explore Kanto and Johto regions.", "True"),
("The champion of the Sinnoh region is Cynthia", "True"),
('Zuko was the prince of the Fire nation', 'True'),
("Thor’s lightning charged Iron Man's armor to 400% in the first Avengers Movie.", 'True'),
("Bucky killed T'Chaka (T'Challa’s Father) in Captain America: Civil War.", 'False'),
('In the book The Return of the King, Frodo is captured by orcs in Mordor.', 'False'),
('Scarlet Witch said no more mutants', 'True'),
('Magneto killed Xavier and split the X-Men', 'False'),
("Black Widow's full name is Natalia Ravenova", 'False'),
("In the book, The Fellowship of the Ring, Arwen takes Frodo to Rivendell after he is attacked by the Black Riders.", 'False'),
("Merry and Pippin are cousins.", 'True'),
("In the book, The Fellowship of the Ring, Boromir is given a silver belt by the elf Galadriel.", 'True'),
("In the book, The Fellowship of the Ring, Sam is given elvish rope by the elf Galadriel.", 'False'),
("In the book, Frodo sold Bag End before taking the ring to Rivendell.", 'True'),
("In the book, after completing the quest of the ring, Sam became the mayor of the Shire.", 'True'),
("In the book, Boromir blows the horn of Gondor as the Fellowship sets off from Rivendell.", 'True'),
('In The Lord of the Rings books, Faramir takes Frodo and Sam to Osgiliath before he lets them continue on their quest.', 'False'),
("Rok, the avatar before, Aang started out as an fire-bender.","True"),
("Sakka was a better water bender than his sister,  Katara. ","False "),
("Princess Yue of the water tribe was very ill as a child, but was saved by Moon Spirit. ","True"),
("Ba Sing Se is a small Earth bending village that has no protection. ","False"),
("Azula’s best friends are...", 'Mai and Ty Lee'),
("After Flash Thompson finished bullying Peter Parker, he became ...", "Agent Venom"),
("Spider Man's parents are ...", "Richard and Mary"),
("Which member of the Guardians of the Galaxy is related to Thanos?", "Gamora"),
("Who served as Ant Man", "Henry Pym"),
("The Fantastic Four have the headquarters in what buildng?", "Baxter Building"),
("What did Sam Gamgee name his first child?", 'Elinor'),
("Who helped Ang learn Earth bender? ","Toph "),
("How long was Aang frozen in an iceberg? ","100 years "),
("____ killed the Moon Spirit. ","Zhao "),
("Which nation started the 100 years war?","Fire nation "),
(" In the book, The Return of the King, who does Theoden talk with right before he dies?", 'Merry'),
("Which of these were the evil team of the Unova region?", "Team Plasma"),
("Which of these characters traveled with Ash Ketchum in Pokemon X & Y?", "Serena & Clemont"),
("In Pokemon Sun and Moon, Lillie's nickname for Cosmog is:", "Nebby"),
("In Pokemon Gold and Pokemon Silver, who can you battle on top of Mt. Silver?", "Red"),
("Which of these is NOT an evolution of Eevee?", "Cloudeon"),
("What is the name of Gandalf’s horse?", 'Shadowfax'),
("In the book, The Fellowship of the Ring, who does Aragorn meet when he is guiding the hobbits from Bree to Rivendell?", 'Glorfindel'),
("In the book, The Fellowship of the Ring, who was the first person at the council of Elrond who volunteered to take the ring to Mordor?", 'Bilbo'),
("What is the name ‘Elinor’ based on?", 'A flower'),
("At the beginning of The Fellowship of the Ring book, what age was Bilbo celebrating at his birthday?", '111'),
("Who is Gimli's father?", "Gloin"),
("The ____ hosts the space gem in the first Avengers Movie", "Tesseract"),
("Jessica Jones is married to ___", "Luke Cage"),
("Comic book writer ____ created Hawkeye", "Stan Lee"),
("Captain America fought against ____ in Civil War", "Iron Man"),
("Edwin Jarvis is the butler to _____", "Tony Stark"),
("Three rings for _______  _______ under the sky.", "Elven Kings"),
("I wasn’t droppin no _____ sir!", "eaves"),
("Nothing important! I heard a great deal about a ring, and a dark lord, and something about the ______  ______  ______  ______.", "end of the world"),
("It’s talking Merry!  The _____ is talking!", "tree"),
("Good morning?!  But it’s ______ already!", "nighttime"),
("In the land of Mordor, where the _____  lie.", "shadows"),
("That still only counts as _____!", "one"),
("The road goes ever on and on, down from the _____ where it began.", "door"),
("_____?  That’s not bad for a pointy eared elvish princeling.", "42"),
("_____ roots are not reached by the frost.", "Deep"),
("The ______  ______  ______  _____ his heart, as he looked up out of the forsaken land, and hope returned to him.", "beauty of it smote"),
("Anyway, you need someone of intelligence on this mission. ______.  ______.", "Quest Thing"),
("The ______ warriors were a group of women who fought with metal fans.","Kyoshi"),
("Aang and his friends had to go through _____  Pass to get to Ba Sing Se. ","Serpent"),
("_____,was born blind, but use to secretly compete in earth bending tournaments. ","Toph"),
("Hama, a prisoner of war, taught Katara about _______ _______.","blood bending"),
("Aang had a crush and eventually got with _______.","Katara"),
("Hi! I like _____! They're comphy and easy to wear!", "shorts"),
("I see now that circumstances of one's birth are irrelevant.  It is what you do with the ____ __ ____ that determines who you are.", "gift of life"),
("The legendary Pokemon on the cover of Pokemon Emerald is ________", "Rayquaza"),
("Originally from Pokemon X & Y, ________ made an apperance as a newcomer in Super Smash Bros. for Wii U and 3DS.", "Greninja"),
("The Kalos region is modeled after the real world country of _______", "France"),
(
"Iroh: Water is the element of change. [Draws the waterbending insignia.] The people of the Water Tribe are capable of adapting to many things. They have a deep sense of community and love that holds them together through anything.
Zuko: Why are you telling me these things?
Iroh: It is important to draw wisdom from many different places. If you take it from only one place, it becomes rigid and stale. [Divides the four insignias into separate sections.] Understanding others, the other elements, and the other nations will help you become whole. [Draws a circle around the insignias.]
Zuko: All this four elements talk is sounding like Avatar stuff.
Iroh: It is the combination of the four elements in one person that makes the Avatar so powerful. But it can make you more powerful, too. You see the technique I'm about to teach you is one I learned by studying the waterbenders." ,
"Bitter Work"),
(
"Katara:  Sokka's right. We need to find King Bumi, so Aang can learn earthbending somewhere safe.
Chong:  Sounds like you're headed to Omashu.
Sokka: smacks his forehead in frustration.
Chong:  There's an old story about a secret pass right through the mountains.
Katara: Is this real or a legend?
Chong:  Oh, it's a real legend. And it's as old as earthbending itself. [Begins strumming his lute and singing.] Two lovers, forbidden from one another, the war divides their people and the mountain divides them apart! Built a path to be together! [Stops playing.] Yeah, I forget the next couple of lines, but then it goes ... [Resumes singing.] Secret tunnel! Secret tunnel! Through the mountains, secret, secret, secret, secret tunnel! Yeah!",
"The Cave of Two Lovers")ENGINE=INNODB;

--PARENT CHILD RELATIONSHIP -----
ALTER TABLE `tf_question` ADD CONSTRAINT `tf_child` FOREIGN KEY (`QID`) REFERENCES `CS4750srs5sb`.`question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `c_question` ADD CONSTRAINT `c_child` FOREIGN KEY (`QID`) REFERENCES `CS4750srs5sb`.`question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `mc_question` ADD CONSTRAINT `mc_child` FOREIGN KEY (`QID`) REFERENCES `CS4750srs5sb`.`question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `script_question` ADD CONSTRAINT `script_child` FOREIGN KEY (`QID`) REFERENCES `CS4750srs5sb`.`question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;


DROP TABLE IF EXISTS leaderboard;
CREATE TABLE leaderboard (
  LID       INT(11) NOT NULL UNIQUE,
  GID       INT(11) NOT NULL REFERENCES game ON DELETE CASCADE,
  username  VARCHAR(100) REFERENCES user ON DELETE CASCADE,
  score     INT(11),
  primary key (LID, GID, username)
) ENGINE=INNODB;


DROP TABLE IF EXISTS game;
CREATE TABLE game (
  GID        INT(11) NOT NULL AUTO_INCREMENT,
  name        VARCHAR(100),
  topic       VARCHAR(300),
  PRIMARY KEY (GID)
) ENGINE=INNODB;

INSERT INTO game (`GID`, `name`, `topic`) VALUES
(1, "Marvel", "Marvel"),
(2, "The Characters of Avatar", "Avatar the Last Airbender"),
(3, "Lord of the Rings", "Lord of the Rings"),
(4, "Pokemon", "Pokemon");

DROP TABLE IF EXISTS have;
CREATE TABLE have (
  GID        INT(11) NOT NULL,
  QID        INT(11) NOT NULL,
  -- FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (QID) REFERENCES tf_question (QID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, QID)
) ENGINE=INNODB;

INSERT INTO have (`GID`, `QID`) VALUES
-- Avatar questions (GID:2; QID:1-5)
(1, 8),
(1, 28),
(1, 30),
(1, 52),
(1, 48),
(2, 27),
(2, 49),
(2, 48),
(2, 26),
(2, 7),
(3, 8),
(3, 10),
(3, 28),
(3, 50),
(3, 11),
(4, 12),
(4, 29),
(4, 30),
(4, 51),
(4, 52),
(5, 26),
(5, 12),
(5, 30),
(5, 48),
(5, 11);

DROP TABLE IF EXISTS plays;
CREATE TABLE plays (
  GID INT(11) NOT NULL,
  username  VARCHAR(100) NOT NULL,
  --FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  --FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, username)
) ENGINE=INNODB;

DROP TABLE IF EXISTS rank;
CREATE TABLE rank (
  GID INT(11) NOT NULL,
  LID INT(11) NOT NULL,
  username  VARCHAR(100) NOT NULL,
  --FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  --FOREIGN KEY (LID) REFERENCES leaderboard (LID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, LID, username)

DROP TABLE IF EXISTS score;
CREATE TABLE score (
  username    varchar(100) NOT NULL,
  quizID      INT(11) NOT NULL,
  score       INT(11),
  duration    INT(11),
  -- FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (quizID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (username, quizID)
) ENGINE=INNODB;
