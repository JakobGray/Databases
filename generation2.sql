-- USE CS4750kx3jj;
-- GRANT SELECT, INSERT
-- ON CS4750kx3jj.* TO 'CS4750kx3jj'@'%';

SET FOREIGN_KEY_CHECKS=0;

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


-- PARENT_QUESTION
DROP TABLE IF EXISTS question;
CREATE TABLE question (
  QID           INT(11) NOT NULL AUTO_INCREMENT,
  prompt        TEXT,
  answer        VARCHAR(100),
  type          VARCHAR(50),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

-- ALL OF THE THE TYPES OF QUESTIONS
DROP TABLE IF EXISTS tf_question;
CREATE TABLE tf_question (
  QID        INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
  tf_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID),
  CONSTRAINT CHK_tf CHECK (answer='True' OR answer='False')
) ENGINE=INNODB;

DROP TABLE IF EXISTS mc_question;
CREATE TABLE mc_question (
  QID        INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
  mc_prompt  VARCHAR(300),
  answer     VARCHAR(100),
  option1    VARCHAR(100),
  option2    VARCHAR(100),
  option3    VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

DROP TABLE IF EXISTS c_question;
CREATE TABLE c_question (
  QID        INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
  c_prompt   VARCHAR(300),
  answer     VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

DROP TABLE IF EXISTS script_question;
CREATE TABLE script_question (
  QID           INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
  script_text   TEXT,
  answer        VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;


-- Add values to the question tables
INSERT INTO `tf_question` (`QID`, `tf_prompt`, `answer`) VALUES
-- Pokemon
('1', 'The Starters from Gen 2 were Totodile, Cyndaquil, and Treecko.', 'False'),
('2','During his adventures in Hoenn, Ash Ketchum caught a Torkoal for his team.','True'),
('3', "N was the final boss of Pokemon Black and Pokemon White.", "False"),
('4',"In Pokemon Gold and Pokemon Silver, you explore Kanto and Johto regions.", "True"),
('5',"The champion of the Sinnoh region is Cynthia", "True"),
-- Marvel
('7',"Thor’s lightning charged Iron Man's armor to 400% in the first Avengers Movie.", 'True'),
('8',"Bucky killed T'Chaka (T'Challa’s Father) in Captain America: Civil War.", 'False'),
('10','Scarlet Witch said no more mutants', 'True'),
('11','Magneto killed Xavier and split the X-Men', 'False'),
('12',"Black Widow's full name is Natalia Ravenova", 'False'),
-- Lord of the Rings
('13',"In the book, The Fellowship of the Ring, Arwen takes Frodo to Rivendell after he is attacked by the Black Riders.", 'False'),
('14',"Merry and Pippin are cousins.", 'True'),
('15',"In the book, The Fellowship of the Ring, Boromir is given a silver belt by the elf Galadriel.", 'True'),
('16',"In the book, The Fellowship of the Ring, Sam is given elvish rope by the elf Galadriel.", 'False'),
('17',"In the book, Frodo sold Bag End before taking the ring to Rivendell.", 'True'),
('18',"In the book, after completing the quest of the ring, Sam became the mayor of the Shire.", 'True'),
('19',"In the book, Boromir blows the horn of Gondor as the Fellowship sets off from Rivendell.", 'True'),
('20','In The Lord of the Rings books, Faramir takes Frodo and Sam to Osgiliath before he lets them continue on their quest.', 'False'),
('9','In the book The Return of the King, Frodo is captured by orcs in Mordor.', 'False'),
-- Avatar
('6','Zuko was the prince of the Fire nation', 'True'),
('21',"Roku, the avatar before, Aang started out as an fire-bender.","True"),
('22',"Sokka was a better water bender than his sister,  Katara. ","False "),
('23',"Princess Yue of the water tribe was very ill as a child, but was saved by Moon Spirit. ","True"),
('24',"Ba Sing Se is a small Earth bending village that has no protection. ","False");


INSERT INTO mc_question (QID, mc_prompt, answer, option1, option2, option3) VALUES
-- Avatar
('25',"Azula’s best friends are...", 'Mai and Ty Lee', 'Katara and Toph', 'Ozai and Iroh', 'Momo and Appa'),
('32',"Who helped Aang learn Earth bender? ","Toph ","Ozai", "Katara", "Sokka"),
('33',"How long was Aang frozen in an iceberg? ","100 years ","100 months","10 days","1000 years"),
('34',"____ killed the Moon Spirit. ","Zhao ","Iroh "," Suko ","Yue"),
('35',"Which nation started the 100 years war?","Fire nation ","Water nation","Air nation","Earth Nation "),
-- Marvel
('26',"After Flash Thompson finished bullying Peter Parker, he became ...", "Agent Venom", "Hobgoblin", "Spider Man", "Crime Master"),
('27',"Spider Man's parents are ...", "Richard and Mary", "Frank and Alice", "Bruce and Katherine", "William and Liz"),
('28',"Which member of the Guardians of the Galaxy is related to Thanos?", "Gamora", "Groot", "Drax the Destroyer", "Mantis"),
('29',"Who served as Ant Man", "Henry Pym", "Wade Wilson", "Matt Murdock", "Wilson Fisk"),
('30',"The Fantastic Four have the headquarters in what buildng?", "Baxter Building", "Stark Tower", "Fantastic Headquarters", "Xavier Institute"),
-- Pokemon
('37',"Which of these were the evil team of the Unova region?", "Team Plasma", "Team Magma", "Team Galactic", "Team Skull"),
('38',"Which of these characters traveled with Ash Ketchum in Pokemon X & Y?", "Serena & Clemont", "Brock & Misty", "May & Max", "Cilan & Iris"),
('39',"In Pokemon Sun and Moon, Lillie's nickname for Cosmog is:", "Nebby", "Smoggy", "Cosmo", "Nova"),
('40',"In Pokemon Gold and Pokemon Silver, who can you battle on top of Mt. Silver?", "Red", "Blue", "Giovanni", "Silver"),
('41',"Which of these is NOT an evolution of Eevee?", "Cloudeon", "Sylveon", "Glaceon", "Leafeon"),
-- Lords of the Rings
('31',"What did Sam Gamgee name his first child?", 'Elinor', 'Frodo', 'Rosy', 'Bilbo'),
('36'," In the book, The Return of the King, who does Theoden talk with right before he dies?", 'Merry', 'Eowyn', 'Aragorn', 'Eomer'),
('42',"What is the name of Gandalf’s horse?", 'Shadowfax', 'Snowmane', 'Asfaloth', 'Brego'),
('43',"In the book, The Fellowship of the Ring, who does Aragorn meet when he is guiding the hobbits from Bree to Rivendell?", 'Glorfindel', 'Arwen', 'Elladan', 'Elrond'),
('44',"In the book, The Fellowship of the Ring, who was the first person at the council of Elrond who volunteered to take the ring to Mordor?", 'Bilbo', 'Frodo', 'Aragorn', 'Boromir'),
('45',"What is the name ‘Elinor’ based on?", 'A flower', 'An elf', 'A tree', 'A place'),
('46',"At the beginning of The Fellowship of the Ring book, what age was Bilbo celebrating at his birthday?", '111', '103', '92', '113'),
('47',"Who is Gimli's father?", "Gloin", "Gatrie", "Glaive", "Gareth");


INSERT INTO c_question (QID, c_prompt, answer) VALUES
-- Marvel
('48',"The ____ hosts the space gem in the first Avengers Movie", "Tesseract"),
('49',"Jessica Jones is married to ___", "Luke Cage"),
('50',"Comic book writer ____ created Hawkeye", "Stan Lee"),
('51',"Captain America fought against ____ in Civil War", "Iron Man"),
('52',"Edwin Jarvis is the butler to _____", "Tony Stark"),
-- Lord of the Rings
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
-- Avatar
('65',"The ______ warriors were a group of women who fought with metal fans.","Kyoshi"),
('66',"Aang and his friends had to go through _____  Pass to get to Ba Sing Se. ","Serpent"),
('67',"_____,was born blind, but use to secretly compete in earth bending tournaments. ","Toph"),
('68',"Hama, a prisoner of war, taught Katara about _______ _______.","blood bending"),
('69', "Aang had a crush and eventually got with _______.","Katara"),
-- Pokemon
('70',"Hi! I like _____! They're comphy and easy to wear!", "shorts"),
('71',"I see now that circumstances of one's birth are irrelevant.  It is what you do with the ____ __ ____ that determines who you are.", "gift of life"),
('72',"The legendary Pokemon on the cover of Pokemon Emerald is ________", "Rayquaza"),
('73',"Originally from Pokemon X & Y, ________ made an apperance as a newcomer in Super Smash Bros. for Wii U and 3DS.", "Greninja"),
('74',"The Kalos region is modeled after the real world country of _______", "France");


INSERT INTO script_question (QID, script_text, answer) VALUES
-- Avatar
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

-- PARENT CHILD RELATIONSHIP -----
-- ALTER TABLE `tf_question` ADD CONSTRAINT `tf_child` FOREIGN KEY (`QID`) REFERENCES `question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
-- ALTER TABLE `c_question` ADD CONSTRAINT `c_child` FOREIGN KEY (`QID`) REFERENCES `question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
-- ALTER TABLE `mc_question` ADD CONSTRAINT `mc_child` FOREIGN KEY (`QID`) REFERENCES `question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;
-- ALTER TABLE `script_question` ADD CONSTRAINT `script_child` FOREIGN KEY (`QID`) REFERENCES `question`(`QID`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Game to group questions
DROP TABLE IF EXISTS game;
CREATE TABLE game (
  GID        INT(11) NOT NULL AUTO_INCREMENT,
  name        VARCHAR(100),
  topic       VARCHAR(300),
  type        VARCHAR(100),
  creator     VARCHAR(100) NOT NULL,
  date_added  timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (GID)
) ENGINE=INNODB;

-- HAVE to connect the questions with the game
DROP TABLE IF EXISTS have;
CREATE TABLE have (
  GID        INT(11) NOT NULL,
  QID        INT(11) NOT NULL,
  -- FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (QID) REFERENCES tf_question (QID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, QID)
) ENGINE=INNODB;

-- Save player results from a game
DROP TABLE IF EXISTS score;
CREATE TABLE score (
  username    varchar(100) NOT NULL,
  GID      INT(11) NOT NULL,
  score       INT(11),
  duration    INT(11),
  -- FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (username, GID)
) ENGINE=INNODB;


INSERT INTO game (`GID`, `name`, `topic`, `type`, `creator`) VALUES
(1, "Marvel easy", "Marvel", "tf", "user"),
(2, "Marvel medium", "Marvel", "mc", "user"),
(3, "Marvel hard", "Marvel", "c", "user"),
(4, "Pokemon easy", "Pokemon", "tf", "user"),
(5, "Pokemon medium", "Pokemon", "mc", "user"),
(6, "Pokemon hard", "Pokemon", "c", "user"),
(7, "Book Truths", "Lord of the Rings", "tf", "user"),
(8, "Lord of the Rings medium", "Lord of the Rings", "mc", "user"),
(9, "Lord of the Rings hard", "Lord of the Rings", "c", "user"),
(10, "Avatar easy", "Avatar", "tf", "user"),
(11, "Avatar medium", "Avatar", "mc", "user"),
(12, "Avatar hard", "Avatar", "c", "user"),
(13, "Avatar Very Hard", "Avatar", "sc", "user");


INSERT INTO have (`GID`, `QID`) VALUES
-- Marvel TF questions
(1,7),
(1,8),
(1,10),
(1,11),
(1,12),
-- Marvel MC QUESTIONS
(2,26),
(2,27),
(2,28),
(2,29),
(2,30),
-- Marvel C QUESTIONS
(3,48),
(3,49),
(3,50),
(3,51),
(3,52),
-- Pokemon TF
(4,1),
(4,2),
(4,3),
(4,4),
(4,5),
-- Pokemon MC
(5,37),
(5,38),
(5,39),
(5,40),
(5,41),
-- Pokemon C
(6,70),
(6,71),
(6,72),
(6,73),
(6,74),
-- LOTR TF
(7,13),
(7,15),
(7,16),
(7,17),
(7,18),
(7,19),
(7,20),
(7,9),
-- LOTR MC
(8,31),
(8,36),
(8,42),
(8,43),
(8,44),
(8,45),
(8,46),
(8,47),
-- LOTR C
(9,53),
(9,54),
(9,55),
(9,56),
(9,57),
(9,58),
(9,59),
(9,60),
(9,61),
(9,62),
(9,63),
(9,64),
-- Avatar TF
(10,6),
(10,21),
(10,22),
(10,23),
(10,24),
-- Avatar MC
(11,25),
(11,32),
(11,33),
(11,34),
(11,35),
-- Avatar C
(12, 65),
(12, 66),
(12, 67),
(12, 68),
(12, 69),
-- Avatar Script
(13,75),
(13,76);

DROP TABLE IF EXISTS plays;
CREATE TABLE plays (
  GID INT(11) NOT NULL,
  username  VARCHAR(100) NOT NULL,
  -- FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, username)
) ENGINE=INNODB;

DROP TABLE IF EXISTS rank;
CREATE TABLE rank (
  GID INT(11) NOT NULL,
  LID INT(11) NOT NULL,
  username  VARCHAR(100) NOT NULL,
  -- FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (LID) REFERENCES leaderboard (LID) ON DELETE CASCADE ON UPDATE CASCADE,
  -- FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, LID, username));

DELIMITER //
CREATE TRIGGER log_patron_delete AFTER DELETE on patrons
FOR EACH ROW
BEGIN
DELETE FROM patron_info
    WHERE patron_info.pid = old.id;
END; //
DELIMITER ;


-- DELIMITER //
-- CREATE TRIGGER question_before_insert
--   BEFORE INSERT ON tf_question
-- BEGIN
--   FOR EACH ROW
--     INSERT INTO `question` (type)
--     VALUES ('TF');
-- END; //
-- DELIMITER ;

SET FOREIGN_KEY_CHECKS=1;
