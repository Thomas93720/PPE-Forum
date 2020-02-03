CREATE DATABASE PPE
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE PPE;
CREATE TABLE Utilisateur
(
idUtilisateur INT(11),
idCompte INT(11),
PRIMARY KEY (idUtilisateur)
);
CREATE TABLE Compte
(
idCompte INT(11),
idCompteBanni INT(11),
dateDebutBan DATE,
dateFinBan DATE,
motDePasse VARCHAR(64),
login VARCHAR(64),
dateCreation DATE,
nomCompte VARCHAR(64),
idMessage INT(11),
PRIMARY KEY(idCompte)
);
CREATE TABLE FilDeDiscussion
(
idFilDeDiscussion INT(11) NOT NULL AUTO_INCREMENT,
FilDeDiscussionClos TINYINT,
titreFilDeDiscussion VARCHAR(64),
idUtilisateurNonConnecte INT(11),
dateOuverture DATE,
Theme VARCHAR(64),
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
CREATE TABLE UtilisateurNonConnecte
(
idUtilisateurNonConnecte INT(11),
PRIMARY KEY(idUtilisateurNonConnecte)
);
ALTER TABLE Utilisateur
ADD CONSTRAINT Utilisateur_Compte
FOREIGN KEY(idCompte)
REFERENCES Compte(idCompte);
ALTER TABLE Message
ADD CONSTRAINT Message_idFilDeDiscussion
FOREIGN KEY(idFilDeDiscussion)
REFERENCES FilDeDiscussion(idFilDeDiscussion);
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
