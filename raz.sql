drop table if exists visiter ;
drop table if exists ressembler ;
drop table if exists bien ;
drop table if exists demande ;
drop table if exists client ;
drop table if exists typebien ;

create table typebien(
idtype char(2),
nomtype varchar(30),
constraint pk_idtype primary key (idtype) );

create table client(
idclient int auto_increment ,
nomclient varchar(30),
adrclient varchar(50),
telclient varchar(10),
emailclient varchar(20),
constraint pk_idclient primary key (idclient) );

create table demande(
iddemande int auto_increment ,
datedemande datetime,
disponibilite varchar(50),
idclient int,
constraint pk_iddemande primary key (iddemande),
constraint fk_client_demande foreign key (idclient) references client(idclient) );

create table bien(
idbien char(5),
titrebien varchar(30),
detailbien varchar(100),
adrbien varchar(50),
prixbien decimal(8,2),
idtype char(2),

constraint pk_idbien primary key (idbien),
constraint fk_bien_typebien foreign key (idtype) references typebien(idtype) );

create table ressembler( 
idbien1 char(5),
idbien2 char(5),
ordre int,
constraint pk_ressembler primary key (idbien1,idbien2),
constraint fk_bien1 foreign key(idbien1) references bien(idbien),
constraint fk_bien2 foreign key(idbien2) references bien(idbien) );

create table visiter(
idbien char(5),
iddemande int,
priorite int,
constraint pk_bien_demande primary key (idbien,iddemande),
constraint fk_bien foreign key (idbien) references bien(idbien),
constraint fk_demande foreign key (iddemande) references demande(iddemande) );

delete from visiter;
delete from ressembler;
delete from bien;
delete from demande;
delete from client;
delete from typebien;

insert into typebien(idtype,nomtype) values('F1','Une pièce');
insert into typebien(idtype,nomtype) values('F2','Deux pièces');
insert into typebien(idtype,nomtype) values('F3','Trois pièces');
insert into typebien(idtype,nomtype) values('F4','Quatre pièces');
insert into typebien(idtype,nomtype) values('F5','Cinq pièces');
insert into typebien(idtype,nomtype) values('F6','Six pièces');
insert into typebien(idtype,nomtype) values('F7','Sept pièces');
insert into typebien(idtype,nomtype) values('FG','Plus de 7 pièces');


insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0001','Villa Rieumes','Centre de Rieumes, jolie maison de plain-pied dans un charmant quartier ','Place du village, 31900 Rieumes',270000,'F7');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0002','Villa Garidech','Dans quartier résidentiel, jolie villa F5 de plain-pied,  cuisine équipée ','Place du centre, 31800 Garidech',320000,'F5');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0003','Villa Plaisance','Belle maison de caractère F5 150 m2 sur terrain 500 m2 calme. Très beau séjour en L 43 m2 cheminée','Rue droite, 31700 Plaisance',250000,'F5');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0004','Villa Beaumont','Ferme habitable en l''état composée de 3 chambres, dont une au RDC, salon, cuisine, combles ','Rue gauche, 82500 Beaumont',175000,'F4');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0005','Villa Auterive','Dans cadre champêtre, villa neuve F4 sur 700 m² de terrain clos, disponible  ','Avenue du centre, 31500 Auterive',215000,'F4');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0006','Villa St Rustice','Maison ancienne F4 sur 3000M² clos dont 1500M² constructible, dépendances','Avenue extérieure, 31430 St Rustice',245000,'F4');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0007','Villa L''Union','Charmante maison de plain pied avec garage, abri de voiture, proche commerces','Rue des granges, 31110 L''Union',195000,'F4');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0008','Villa Léguevin','Située dans un environnement très calme, vous serez séduits par les volumes et la luminosité','Rue fauve, 31220 Léguevin',250000,'F5');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0009','Villa Bessières','Agréable maison de plain pied (2003) 117m2,4 CH dont une suite parentale. Cuisine U.S,grand séjour','Rue courbe, 31670 Bessières',275000,'F5');

insert into bien(idbien,titrebien,detailbien,adrbien,prixbien,idtype)
values('b0010','Villa St Lys','Proche ttes commodités au calme, agréable villa F4 de 95 m2, cellier, garage indépendant','Chemin grand, 31550 St Lys',245000,'F4');


insert into client(idClient,nomclient,adrclient,telclient,emailclient) values
(1,'Michel Tuffery','Université Toulouse 2','0562747575','tuffery@cict.fr');

insert into demande(idDemande,datedemande,disponibilite,idclient) values
(1,'2012-09-12','Lundi matin et Jeudi après-midi',1);

insert into visiter(idbien,iddemande,priorite) values
('b0001',1,1);
insert into visiter(idbien,iddemande,priorite) values
('b0002',1,2);
insert into visiter(idbien,iddemande,priorite) values
('b0007',1,3);

insert into demande(idDemande,datedemande,disponibilite,idclient) values
(2,'2012-10-20','Mardi matin et Vendredi après-midi',1);

insert into visiter(idbien,iddemande,priorite) values
('b0003',2,1);
insert into visiter(idbien,iddemande,priorite) values
('b0004',2,2);



insert into client(idClient,nomclient,adrclient,telclient,emailclient) values
(2,'Monsieur Intranet','Rue du DotNet','0561508765','intranet@cict.fr');

insert into demande(idDemande,datedemande,disponibilite,idclient) values
(3,'2012-10-21','Lundi après-midi  et Jeudi après-midi',2);

insert into visiter(idbien,iddemande,priorite) values
('b0009',3,1);
insert into visiter(idbien,iddemande,priorite) values
('b0010',3,2);
insert into visiter(idbien,iddemande,priorite) values
('b0008',3,3);
insert into visiter(idbien,iddemande,priorite) values
('b0002',3,4);


insert into ressembler(idbien1,idbien2,ordre) values
('b0002','b0003',1);
insert into ressembler(idbien1,idbien2,ordre) values
('b0002','b0008',2);
insert into ressembler(idbien1,idbien2,ordre) values
('b0002','b0009',3);
insert into ressembler(idbien1,idbien2,ordre) values
('b0004','b0007',1);
insert into ressembler(idbien1,idbien2,ordre) values
('b0004','b0006',2);
insert into ressembler(idbien1,idbien2,ordre) values
('b0006','b0004',1);
insert into ressembler(idbien1,idbien2,ordre) values
('b0006','b0005',2);
insert into ressembler(idbien1,idbien2,ordre) values
('b0009','b0002',1);
insert into ressembler(idbien1,idbien2,ordre) values
('b0009','b0003',2);

alter table bien
add(photoBien varchar(20)) ;
  
UPDATE bien SET photoBien = CONCAT(idbien, ".jpg");
 
insert into client(idClient,nomclient,adrclient,telclient,emailclient) values
(3,'Iungmann Victor','Université Toulouse 2','0689761012','v.iungmann@gmail.com');
insert into demande(idDemande,datedemande,disponibilite,idclient) values
(4,'2012-10-22','Lundi après-midi',3);
insert into demande(idDemande,datedemande,disponibilite,idclient) values
(5,'2012-10-23','Jeudi après-midi',3);
insert into visiter(idbien,iddemande,priorite) values
('b0007',4,3);
insert into visiter(idbien,iddemande,priorite) values
('b0009',5,3);