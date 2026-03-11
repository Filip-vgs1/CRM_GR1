--Copy paste this, first crm_gr1.firma and then crm_gr1.kontaktperson.

INSERT INTO crm_gr1.firma 
(firmaStatus, firmaOrganisasjonsnummer, firmaNavn, firmaAdresse, firmaTlf, firmaKundeSiden, firmaPostnr)
VALUES
('Aktiv', '912345678', 'Nordic Tech AS', 'Storgata 10', '22334455', '2018-03-15', '0155'),
('Aktiv', '923456789', 'Oslo Bygg AS', 'Bygdøy Allé 20', '22445566', '2019-07-01', '0257'),
('Inaktiv', '934567891', 'Fjord Logistics', 'Havneveien 5', '22556677', '2017-01-10', '4005'),
('Aktiv', '945678912', 'Arctic Solutions', 'Polargata 3', '22667788', '2020-05-20', '9008'),
('Aktiv', '956789123', 'Green Energy AS', 'Solveien 12', '22778899', '2021-09-11', '5003'),
('Inaktiv', '967891234', 'Bergen Transport', 'Bryggen 8', '22889900', '2016-11-30', '5006'),
('Aktiv', '978912345', 'Digital Future', 'Teknologiveien 15', '22990011', '2022-01-25', '7030'),
('Aktiv', '989123456', 'Polar Shipping', 'Kai 4', '23001122', '2015-06-18', '8003'),
('Aktiv', '991234567', 'Scandi Foods', 'Matgata 7', '23112233', '2023-02-14', '3040'),
('Inaktiv', '902345678', 'Nordic Design', 'Designveien 2', '23223344', '2014-10-09', '0160');

INSERT INTO crm_gr1.kontaktperson
(firma_idfirma, kontaktpersonStatus, kontaktpersonEtternavn, kontaktpersonFornavn, kontaktpersonTlf, kontaktpersonEpost, kontaktpersonDatoLagtTil)
VALUES
(1, 'Aktiv', 'Hansen', 'Lars', '90011223', 'lars.hansen@nordictech.no', '2022-03-01'),
(2, 'Aktiv', 'Johansen', 'Maria', '90122334', 'maria.johansen@oslobygg.no', '2021-06-15'),
(3, 'Inaktiv', 'Olsen', 'Per', '90233445', 'per.olsen@fjordlog.no', '2019-11-21'),
(4, 'Aktiv', 'Nilsen', 'Anne', '90344556', 'anne.nilsen@arcticsol.no', '2023-01-05'),
(5, 'Aktiv', 'Berg', 'Kari', '90455667', 'kari.berg@greenenergy.no', '2022-08-18'),
(6, 'Inaktiv', 'Solberg', 'Jon', '90566778', 'jon.solberg@bergentrans.no', '2020-04-09'),
(7, 'Aktiv', 'Lunde', 'Erik', '90677889', 'erik.lunde@digitalfuture.no', '2023-05-14'),
(8, 'Aktiv', 'Moen', 'Sofie', '90788990', 'sofie.moen@polarship.no', '2021-12-02'),
(9, 'Aktiv', 'Dahl', 'Mats', '90899001', 'mats.dahl@scandifoods.no', '2024-02-11'),
(10, 'Inaktiv', 'Kristiansen', 'Ida', '90900112', 'ida.kristiansen@nordicdesign.no', '2018-09-27');