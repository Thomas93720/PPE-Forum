CREATE DATABASE Monster_Hunter CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE Champ-De-Chasse
(
	idChampdeChasse INT NOT NULL AUTO_INCREMENT,
	nomZone VARCHAR(64),
	superficie FLOAT,
	idCapitale INT NOT NULL,
	PRIMARY KEY (idChampdeChasse)
)
CREATE TABLE Capitale
(
	idCapitale INT NOT NULL AUTO_INCREMENT,
	nomCapitale VARCHAR(64),
	nbHabitants INT,
	idChasseur INT,
	PRIMARY KEY (idCapitale)
)
CREATE TABLE Chasseur
(
	idChasseur INT NOT NULL AUTO_INCREMENT,
	nomChasseur VARCHAR(64),
	prenomChasseur VARCHAR(64),
	armeChasseur VARCHAR(64),
	nbChasse INT
	PRIMARY KEY (idChasseur)
)
CREATE TABLE Champ/GrandMonstre
(
	idChampdeChasse INT,
	idGrandMonstre INT,
	PRIMARY KEY (idChampdeChasse, idGrandMonstre)
)
CREATE TABLE GrandMonstre
(
	idGrandMonstre INT NOT NULL AUTO_INCREMENT,
	nomMonstre VARCHAR(64),
	tailleMax FLOAT,
	idRaceMonstre INT,
	PRIMARY KEY (idGrandMonstre)
)
CREATE TABLE RaceMonstre
(
	idRaceMonstre INT NOT NULL AUTO_INCREMENT,
	TypeRace VARCHAR(64),
	NiveauDanger INT,
	PRIMARY KEY (idRaceMonstre)
)
CREATE TABLE Champ/PetitMonstre
(
	idChampdeChasse INT,
	idPetitMonstre INT,
	PRIMARY KEY (idChampdeChasse, idPetitMonstre)
)
CREATE TABLE PetitMonstre
(
	idPetitMonstre INT NOT NULL AUTO_INCREMENT,
	nomMonstre VARCHAR(64),
	nbMonstreGroupe INT,
	PRIMARY KEY (idPetitMonstre)
)
ALTER TABLE Champ-De-Chasse

ADD CONSTRAINT Champ-De-Chasse_idCapitale 

FOREIGN KEY (idCapitale) 

REFERENCES Capitale (idCapitale)

ALTER TABLE Capitale

ADD CONSTRAINT Capitale_idChasseur

FOREIGN KEY (idChasseur) 

REFERENCES Chasseur (idChasseur)

ALTER TABLE GrandMonstre

ADD CONSTRAINT GrandMonstre_idRaceMonstre

FOREIGN KEY (idRaceMonstre) 

REFERENCES RaceMonstre (idRaceMonstre)


