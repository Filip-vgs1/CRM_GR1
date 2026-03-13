-- Copy paste this into a new query window and run to create the database and tables for the CRM system.

CREATE SCHEMA IF NOT EXISTS CRM_GR1 DEFAULT CHARACTER SET utf8;
USE CRM_GR1;

CREATE TABLE IF NOT EXISTS firma (
  idfirma INT NOT NULL AUTO_INCREMENT,
  firmaStatus ENUM('Aktiv','Inaktiv') NOT NULL,
  firmaOrganisasjonsnummer VARCHAR(9),
  firmaNavn VARCHAR(128),
  firmaAdresse VARCHAR(128),
  firmaTlf VARCHAR(15),
  firmaKundeSiden DATE,
  firmaPostnr VARCHAR(4),
  PRIMARY KEY (idfirma)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS kontaktperson (
  idkontaktperson INT NOT NULL AUTO_INCREMENT,
  firma_idfirma INT NOT NULL,
  kontaktpersonStatus ENUM('Aktiv','Inaktiv') NOT NULL,
  kontaktpersonEtternavn VARCHAR(128),
  kontaktpersonFornavn VARCHAR(64),
  kontaktpersonTlf VARCHAR(15),
  kontaktpersonEpost VARCHAR(128),
  kontaktpersonDatoLagtTil DATE,
  PRIMARY KEY (idkontaktperson),
  INDEX fk_kontaktperson_firma_idx (firma_idfirma),
  CONSTRAINT fk_kontaktperson_firma
    FOREIGN KEY (firma_idfirma)
    REFERENCES firma(idfirma)
) ENGINE=InnoDB;