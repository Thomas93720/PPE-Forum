CREATE DATABASE PPE;
USE PPE;
CREATE TABLE Compte
(
idCompte INT(11) NOT NULL AUTO_INCREMENT,
isCompteBanni TINYINT,
isCompteAdmin TINYINT,
dateDebutBan DATE,
dateFinBan DATE,
raisonBan VARCHAR(64),
motDePasse VARCHAR(64),
login VARCHAR(64),
dateCreation DATE,
nomCompte VARCHAR(64),
idMessage INT(11),
connexion TINYINT,
email VARCHAR(64),
PRIMARY KEY(idCompte)
);
CREATE TABLE FilDeDiscussion
(
idFilDeDiscussion INT(11) NOT NULL AUTO_INCREMENT,
isFilDeDiscussionClos TINYINT,
titreFilDeDiscussion VARCHAR(64),
dateOuverture DATE,
Theme VARCHAR(64),
idCreateur INT(11),
idMessage INT(11),
PRIMARY KEY(idFilDeDiscussion)
);
CREATE TABLE Message
(
idMessage INT(11) NOT NULL AUTO_INCREMENT,
libelle VARCHAR(64),
dateEnvoi DATE,
idAuteur INT(11),
titreMessage VARCHAR(64),
idFilDeDiscussion INT(11),
PRIMARY KEY(idMessage)
);

ALTER TABLE FilDeDiscussion
ADD CONSTRAINT FilDeDiscussion_idCreateur
FOREIGN KEY (idCreateur)
REFERENCES Compte(idCompte);

ALTER TABLE FilDeDiscussion
ADD CONSTRAINT FilDeDiscussion_idMessage
FOREIGN KEY (idMessage)
REFERENCES Message(idMessage);

ALTER TABLE Compte
ADD CONSTRAINT Compte_idMessage
FOREIGN KEY(idMessage)
REFERENCES Message(idMessage);


INSERT INTO Compte(dateCreation,nomCompte,login,motDePasse,isCompteAdmin,isCompteBanni) VALUES
("2001-09-11","Neox","Mathis","Raptor",1,0),
("2001-10-01","PowerShaq","power","test",0,0),
("2001-10-02","KonekoHime","Rania","Rock",0,0),
("2001-10-25","AfidDeStationDellile","Kebab","Master",0,0),
("2001-10-25","DarkUltraPSP","XXdArkXX","PSP",0,0),
("2001-11-15","Zakaclate","zac","password",0,0),
("2001-11-22","Yoann63Swag","baton","mordhau",0,0),
("2001-11-23","diablo63800","diablo","leDarkPGM",1,0),
("2001-11-25","PGM04","zac","late",0,0),
("2001-11-22","CompteBAn","ban","ban",0,1);

INSERT INTO FilDeDiscussion(dateOuverture,Theme,titreFilDeDiscussion,isFilDeDiscussionClos,idCreateur) VALUES
("2019-11-12","Hardware","Ryzen vs Intel",false,1),
("2019-10-07","Jeux","R6 vs CS:GO",false,2),
("2019-09-17","Audio-Video","Quel ampli pour ma basse?",false,4),
("2019-09-15","Hardware","Apple > ALL",false,3),
("2019-09-07","Astronomie","La Nasa a découvert une nouvelle planète",false,7),
("2019-08-30","Software","Comment utiliser JavaFX",false,6),
("2019-08-25","Discussions","Tryhard sur LoL = Pôle Emploi? ",true,1),
("2019-08-21","Film","Interstellar chef d'oeuvre?",false,2),
("2019-08-20","Film","interstellar surcoté?",false,5),
("2019-08-19","Jeux","AWP > AutoNoob",false,9),
("2019-08-19","Jeux","Ma mère est accro à Candy Crush les kheys",false,8),
("2019-08-19","Discussions","Je galère en PHP",false,6);

INSERT INTO Message(libelle,dateEnvoi,titreMessage,idFilDeDiscussion,idAuteur) VALUES
("libelle","2001-09-11","titreMessage",1,2),
("ceci est un message","2001-09-11","titreMessage",1,3),
("msg","2001-09-11","titreMessage",1,1),
("libelle","2001-09-11","titreMessage",2,4),
("libelle","2001-09-11","titreMessage",3,5);