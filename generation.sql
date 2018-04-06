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
('asdfasdf', '0115ea25dcd5e69157614c0492dda08e58cf4dcd', 'Regular'),
('user', '45f106ef4d5161e7aa38cf6c666607f25748b6ca', 'Regular');

DROP TABLE IF EXISTS leaderboard;
CREATE TABLE leaderboard (
	LID	     	INT(11) NOT NULL UNIQUE,
  GID       INT(11) NOT NULL REFERENCES game ON DELETE CASCADE,
  username  VARCHAR(100) REFERENCES user ON DELETE CASCADE,
  score     INT(11),
  primary key (LID, GID, username)
) ENGINE=INNODB;



DROP TABLE IF EXISTS tf_question;
CREATE TABLE tf_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  tf_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID),
  CONSTRAINT CHK_tf CHECK (answer='True' OR answer='False')
) ENGINE=INNODB;

INSERT INTO tf_question (`tf_prompt`, `answer`) VALUES
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
("Ba Sing Se is a small Earth bending village that has no protection. ","False")
;


DROP TABLE IF EXISTS mc_question;
CREATE TABLE mc_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  mc_prompt  VARCHAR(300),
  answer     VARCHAR(100),
  option1		 VARCHAR(100),
	option2		 VARCHAR(100),
  option3		 VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

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
("Which nation started the 100 years war?","Fire nation ","Water nation","Air nation","Earth Nation "),
(" In the book, The Return of the King, who does Theoden talk with right before he dies?", 'Merry', 'Eowyn', 'Aragorn', 'Eomer'),

("Which of these were the evil team of the Unova region?", "Team Plasma", "Team Magma", "Team Galactic", "Team Skull"),
("Which of these characters traveled with Ash Ketchum in Pokemon X & Y?", "Serena & Clemont", "Brock & Misty", "May & Max", "Cilan & Iris"),
("In Pokemon Sun and Moon, Lillie's nickname for Cosmog is:", "Nebby", "Smoggy", "Cosmo", "Nova"),
("In Pokemon Gold and Pokemon Silver, who can you battle on top of Mt. Silver?", "Red", "Blue", "Giovanni", "Silver"),
("Which of these is NOT an evolution of Eevee?", "Cloudeon", "Sylveon", "Glaceon", "Leafeon"),

("What is the name of Gandalf’s horse?", 'Shadowfax', 'Snowmane', 'Asfaloth', 'Brego'),
("In the book, The Fellowship of the Ring, who does Aragorn meet when he is guiding the hobbits from Bree to Rivendell?", 'Glorfindel', 'Arwen', 'Elladan', 'Elrond'),
("In the book, The Fellowship of the Ring, who was the first person at the council of Elrond who volunteered to take the ring to Mordor?", 'Bilbo', 'Frodo', 'Aragorn', 'Boromir'),
("What is the name ‘Elinor’ based on?", 'A flower', 'An elf', 'A tree', 'A place'),
("At the beginning of The Fellowship of the Ring book, what age was Bilbo celebrating at his birthday?", '111', '103', '92', '113'),

("Who is Gimli's father?", "Gloin", "Gatrie", "Glaive", "Gareth");


DROP TABLE IF EXISTS c_question;
CREATE TABLE c_question (
  QID        INT(11) NOT NULL AUTO_INCREMENT,
  c_prompt  VARCHAR(300),
  answer     VARCHAR(5),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

INSERT INTO c_question (`c_prompt`, `answer`) VALUES
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
("The Kalos region is modeled after the real world country of _______", "France");


DROP TABLE IF EXISTS script_question;
CREATE TABLE script_question (
  QID           INT(11) NOT NULL AUTO_INCREMENT,
  script_text   TEXT,
  answer        VARCHAR(100),
  PRIMARY KEY (QID)
) ENGINE=INNODB;

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


DROP TABLE IF EXISTS game;
CREATE TABLE game (
  GID        INT(11) NOT NULL AUTO_INCREMENT,
  topic       VARCHAR(300),
  num_question    INT(11),
  PRIMARY KEY (GID)
) ENGINE=INNODB;

INSERT INTO game (`topic`, `num_question`) VALUES
("Marvel", 4),
("Avatar the Last Airbender", 4),
("Lord of the Rings", 4),
("Pokemon", 4);

DROP TABLE IF EXISTS have;
CREATE TABLE have (
  GID        INT(11) NOT NULL AUTO_INCREMENT,
  QID        INT(11) NOT NULL,
  FOREIGN KEY (GID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (QID) REFERENCES mc_question (QID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (GID, QID)
) ENGINE=INNODB;

DROP TABLE IF EXISTS score;
CREATE TABLE score (
  username    varchar(100) NOT NULL UNIQUE,
  quizID      INT(11) NOT NULL,
  score       INT(11),
  duration    INT(11),
  FOREIGN KEY (username) REFERENCES user (username) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (quizID) REFERENCES game (GID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (username, quizID)
) ENGINE=INNODB;
