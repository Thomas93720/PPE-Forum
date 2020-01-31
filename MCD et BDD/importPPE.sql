CREATE DATABASE PPE
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE PPE;

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
connexion TINYINT,
PRIMARY KEY(idCompte)
);
CREATE TABLE FilDeDiscussion
(
idFilDeDiscussion INT(11),
idFilDeDiscussionClos INT(11),
titreFilDeDiscussion VARCHAR(64),
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

ALTER TABLE Message
ADD CONSTRAINT Message_idFilDeDiscussion
FOREIGN KEY(idFilDeDiscussion)
REFERENCES FilDeDiscussion(idFilDeDiscussion);

ALTER TABLE Compte
ADD CONSTRAINT Compte_idMessage
FOREIGN KEY(idMessage)
REFERENCES Message(idMessage);