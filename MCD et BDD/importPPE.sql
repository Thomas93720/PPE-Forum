CREATE DATABASE PPE
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE PPE;
<<<<<<< HEAD

=======
CREATE TABLE Utilisateur
(
idUtilisateur INT(11),
idCompte INT(11),
PRIMARY KEY (idUtilisateur)
);
>>>>>>> c07542607e4f717a122a44e2e58a9c1cfcd114d6
CREATE TABLE Compte
(
idCompte INT(11),
isCompteBanni TINYINT,
dateDebutBan DATE,
dateFinBan DATE,
motDePasse VARCHAR(64),
login VARCHAR(64),
dateCreation DATE,
nomCompte VARCHAR(64),
idMessage INT(11),
<<<<<<< HEAD
connexion TINYINT,
=======
>>>>>>> c07542607e4f717a122a44e2e58a9c1cfcd114d6
PRIMARY KEY(idCompte)
);
CREATE TABLE FilDeDiscussion
(
idFilDeDiscussion INT(11) NOT NULL AUTO_INCREMENT,
FilDeDiscussionClos TINYINT,
titreFilDeDiscussion VARCHAR(64),
<<<<<<< HEAD
idAuteur INT(11),
=======
<<<<<<< HEAD
=======
>>>>>>> b0d9abf9c4baa26d6fd28b7c2bb343bde7389aa5
idUtilisateurNonConnecte INT(11),
dateOuverture DATE,
Theme VARCHAR(64),
>>>>>>> c07542607e4f717a122a44e2e58a9c1cfcd114d6
PRIMARY KEY(idFilDeDiscussion)
);
CREATE TABLE Message
(
idMessage INT(11),
libelle VARCHAR(64),
dateEvoi DATE,
titreMessage VARCHAR(64),
idFilDeDiscussion INT(11),
PRIMARY KEY(idMessage)
);
<<<<<<< HEAD

=======
CREATE TABLE UtilisateurNonConnecte
(
idUtilisateurNonConnecte INT(11),
PRIMARY KEY(idUtilisateurNonConnecte)
);
ALTER TABLE Utilisateur
ADD CONSTRAINT Utilisateur_Compte
FOREIGN KEY(idCompte)
REFERENCES Compte(idCompte);
>>>>>>> c07542607e4f717a122a44e2e58a9c1cfcd114d6
ALTER TABLE Message
ADD CONSTRAINT Message_idFilDeDiscussion
FOREIGN KEY(idFilDeDiscussion)
REFERENCES FilDeDiscussion(idFilDeDiscussion);
<<<<<<< HEAD

ALTER TABLE Compte
ADD CONSTRAINT Compte_idMessage
FOREIGN KEY(idMessage)
REFERENCES Message(idMessage);
=======
ALTER TABLE Compte
ADD CONSTRAINT Compte_idMessage
FOREIGN KEY(idMessage)
REFERENCES Message(idMessage);
ALTER TABLE Utilisateur
ADD CONSTRAINT Utilisateur_idUtilisateur
FOREIGN KEY(idUtilisateur)
REFERENCES UtilisateurNonConnecte(idUtilisateurNonConnecte);
ALTER TABLE FilDeDiscussion
ADD CONSTRAINT FilDeDiscussion_idUtilisateurNonConnecte
FOREIGN KEY(idUtilisateurNonConnecte)
REFERENCES UtilisateurNonConnecte(idUtilisateurNonConnecte);
ALTER TABLE FilDeDiscussion
ADD CONSTRAINT FilDeDiscussion_idAuteur
FOREIGN KEY(idAuteur)
REFERENCES Compte(idCompte);

INSERT INTO FilDeDiscussion(dateOuverture,Theme,titreFilDeDiscussion,FilDeDiscussionClos) VALUES
("2019-11-12","Theme","titre1",false),
("2019-10-07","Jeux","titre2",false),
("2019-09-17","Video & Son","titre3",false),
("2019-09-15","Apple","Apple < ALl",false),
("2019-09-07","Astronomie","titre5",false),
("2019-08-30","Overclocking","titre6",false),
("2019-08-25","Discussions","Pourquoi try hard sur les jeux",true),
("2019-08-21","Film","Retour vers le futur meilleure trilogie",false),
("2019-08-20","Film","interstellar surcoté",false),
("2019-08-19","Jeux","CSGO > R6",false),
("2019-08-19","Jeux","CSGO > R6",false),
("2019-08-19","Jeux","CSGO > R6",false);
<<<<<<< HEAD

INSERT INTO Compte(idCompte,dateCreation,nomCompte,login,motDePasse) VALUES
(1,"2001-09-11","N3oxG4m1ng","MathisRaptor","RaptorGAming"),
(2,"2001-10-01","PaworSheq","power","test"),
(3,"2001-10-02","KonekoHime","Rania","Rock");
(4,"2001-10-25","AfidDeStationDellile","Kebab","Master")
(5,"2001-10-25","DarUltraPSP","XXdArkXX","PSP")
(6,"2001-11-15","Zakaclate","zac","password")
(7,"2001-11-22","Yoann63Swag","baton","mordhau")
(8,"2001-11-23","diablo63800","diablo","leDarkPGM")
(9,"2001-11-25","PGM04","zac","late");
=======
>>>>>>> c07542607e4f717a122a44e2e58a9c1cfcd114d6
>>>>>>> b0d9abf9c4baa26d6fd28b7c2bb343bde7389aa5
