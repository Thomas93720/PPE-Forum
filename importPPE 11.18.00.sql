
CREATE DATABASE PPE
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE PPE;

CREATE TABLE Compte
(
idCompte INT(11) NOT NULL AUTO_INCREMENT,
isCompteBanni TINYINT,
dateDebutBan DATE,
dateFinBan DATE,
motDePasse VARCHAR(64),
login VARCHAR(64),
dateCreation DATE,
nomCompte VARCHAR(64),
idMessage INT(11),
connexion TINYINT,
PRIMARY KEY(idCompte)
);
CREATE TABLE FilDeDiscussion
(
idFilDeDiscussion INT(11),
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
idMessage INT(11),
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


INSERT INTO Compte(idCompte,dateCreation,nomCompte,login,motDePasse) VALUES
(1,"2001-09-11","Neox","Mathis","Raptor"),
(2,"2001-10-01","PowerShaq","power","test"),
(3,"2001-10-02","KonekoHime","Rania","Rock"),
(4,"2001-10-25","AfidDeStationDellile","Kebab","Master"),
(5,"2001-10-25","DarkUltraPSP","XXdArkXX","PSP"),
(6,"2001-11-15","Zakaclate","zac","password"),
(7,"2001-11-22","Yoann63Swag","baton","mordhau"),
(8,"2001-11-23","diablo63800","diablo","leDarkPGM"),
(9,"2001-11-25","PGM04","zac","late");

INSERT INTO FilDeDiscussion(idFilDeDiscussion,dateOuverture,Theme,titreFilDeDiscussion,isFilDeDiscussionClos,idCreateur) VALUES
(1,"2019-11-12","Hardware","Ryzen vs Intel",false,1),
(2,"2019-10-07","Jeux","R6 vs CS:GO",false,2),
(3,"2019-09-17","Audio-Video","Quel ampli pour ma basse?",false,4),
(4,"2019-09-15","Hardware","Apple > ALL",false,3),
(5,"2019-09-07","Astronomie","La Nasa a découvert une nouvelle planète",false,7),
(6,"2019-08-30","Software","Comment utiliser JavaFX",false,6),
(7,"2019-08-25","Discussions","Tryhard sur LoL = Pôle Emploi? ",true,1),
(8,"2019-08-21","Film","Interstellar chef d'oeuvre?",false,2),
(9,"2019-08-20","Film","interstellar surcoté?",false,5),
(10,"2019-08-19","Jeux","AWP > AutoNoob",false,9),
(11,"2019-08-19","Jeux","Ma mère est accro à Candy Crush les kheys",false,8),
(12,"2019-08-19","Discussions","Je galère en PHP",false,6);

INSERT INTO Message(idMessage,libelle,dateEnvoi,titreMessage,idFilDeDiscussion,idAuteur) VALUES
(1,"libelle","2001-09-11","titreMessage",1,2),
(2,"ceci est un message","2001-09-11","titreMessage",1,3),
(3,"msg","2001-09-11","titreMessage",1,1),
(4,"libelle","2001-09-11","titreMessage",2,4),
(5,"libelle","2001-09-11","titreMessage",3,5);