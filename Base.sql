create database takalo;
use takalo;

create table users(
    iduser int AUTO_INCREMENT,
    nom varchar(20),
    prenom varchar(30),
    sexe varchar(20),
    email varchar(50),
    password varchar(20) UNIQUE,
    contact varchar(20),
    admin int,
    dateinscription date,
    primary key (iduser)
);



create table category(
    idcategory int AUTO_INCREMENT,
    nomcategory varchar(20),
    primary key (idcategory)
);

create table object(
    idobject int AUTO_INCREMENT,
    iduser int,
    idcategory int,
    name varchar(20),
    description varchar(200),
    prixestime double,
    disponibilite int,
    primary key (idobject),
    foreign key (idcategory) references category(idcategory),
    foreign key (iduser) references users(iduser)
);

create table historique(
    idhistrique int PRIMARY key AUTO_INCREMENT ,
    idobject int ,
    encientuser int,
    dataechange datetime,
    foreign key (idobject) references object(idobject),
    foreign key (encientuser) references users(iduser)
);

create table image(
    idimage int AUTO_INCREMENT,
    idobject int,
    image varchar(20),
    primary key (idimage),
    foreign key (idobject) references object(idobject) 
);

create table reservation(
    idreservation int AUTO_INCREMENT,
    idproprietaire int,
    iduser int,
    idobject int,
    idtakalo int,
    datedereservation date,
    primary key (idreservation),
    foreign key (idproprietaire) references users(iduser),
    foreign key (iduser) references users(iduser),
    foreign key (idobject) references object(idobject),
    foreign key (idtakalo) references object(idobject)
);

insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('MIANDRISON','Hasinjo','Homme','hasinjo@gmail.com','hasinjo123','0342515475',0,'2023-01-10');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RABEMANANTSOA','Christian','Homme','christian@gmail.com','christian123','0346225659',1,'2022-01-10');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('ANDRIANARIVELO','Hendriniaina','Femme','hendry@gmail.com','hendry123','0344304734',0,'2022-02-11');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RAKOTOMALALA','Fanyah','Femme','fanyah@gmail.com','fanyah123','0345686936',1,'2022-02-11');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RAKOTOMALALA','Mirindra','Femme','mirindra@gmail.com','mirindra123','0332514578',0,'2022-02-12');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RAMIANDRASOA','Stephan','Masculin','stephan@gmail.com','stephan123','0347569325',1,'2022-02-12');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RABENJA','Martin','Feminin','martin@gmail.com','martin123','0347895623',0,'2022-02-13');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RANDRIA','Manoa','Masculin','manoa@gmail.com','manoa123','0345869341',1,'2022-02-13');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('MAHEFANIAINA','Elyse','Masculin','elyse@gmail.com','elyse123','0347458612',0,'2022-02-14');
insert into users(nom,prenom,sexe,email,password,contact,admin,dateinscription) values ('RASAMIZAFY','Mirah','Feminin','mirah@gmail.com','mirah123','0347536214',1,'2022-02-14');

insert into category(nomcategory) values ('Vetements');
insert into category(nomcategory) values ('Sante et beaute');
insert into category(nomcategory) values ('Technologie');
insert into category(nomcategory) values ('Produits artisanaux');
insert into category(nomcategory) values ('Articles de Sports');

insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,1,'Robe','Une robe tres chic et elegante avec un corsage tres court,assemble par une couture sous la poitrine',15000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,1,'Jupe','Une valeur sure,la jupe trapeze convient a toutes morphologies,ajustee a la taille.Ce modele a une ligne structuree,sans godets',10000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,1,'Blouson','Fermeture zipee decalee asymetrique et ses boutons pression sur le col qui ira avec la pluplart de vos tenues',20000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,1,'Manteau','Une piece incontournable de tous les jours se marie avec vos jupes et vos robes',25000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,1,'Pantalon','Pantalon ample a carreaux,coupe large,taille haute',12000,0);

insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,2,'Shampoing','Shampoing pour cheveux fins ou plats contenant des actifs vegetaux energisants,redonner du corps a votre chevelure',25000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,2,'Creme','Une creme huileuse nourrit la peau et la protege contre les diverses agressions exterieurs',30000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,2,'Rouge a levres','Rouge a levre:atout charme de notre trousse a maquillage afin de redessiner les levres et les rendre plus pulpeuses pour un sourire irresistible',16000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,2,'Maquillage','Question de couleur osez pour un maquillage afin de gommer,mettre en avant ou camoufler certains zones du visage',25000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,2,'Gel douche','Un bon gel douche pour nettoyer le corps de toutes impuretes accumulee par la peau ',16000,0);

insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,3,'Ordinateur','Ordinateur portable Asus facile a entretenir,adaptee a toutes sortes d activites',3000000000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,3,'Tablette','Tablette tactile,lightning et connecteur USB type C,ecran multi-touch',160000000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,3,'Ecouteur','Ecouteur bluetooh sans fil offre un son de qualite superieur et un maintien parfait',25000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,3,'SmartWatch','Accesoirise votre poignet d une montre intelligente afin de disposer des connectivites sans fil avec des technologies',200000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,3,'Telephone','Un google pixel equipe d un SoC maison,equipe d un ecran de 6,4 pouces',320000,0);

insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,4,'Papier Antemoro','Realisation faite a la main,un produit Malagasy viendront apporter un note decorative',20000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,4,'Abat-jour','Abat-jour brode et au socle taille dans de l ebene',30000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,4,'Bague artisanal','Bagues en pierres naturelle,oeil de tigre ,dore a or fin',15000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,4,'Collier artisanal','Collier fantaisie,mis en valeur par des perles afin que vous puissiez porter des belles matieres',20000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,4,'Sac artisanal','Un sac cousu a la main pour mettre en valeu peu importe votre tenu',15000,0);

insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,5,'Vetement de sport','Legging taille haute gainant fitness cardio femme noir',17000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,5,'Chaussures de sport','Un basket gel-quantum 360VII Chaussures de fitness noir pour homme',25000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (2,5,'Ballons de foot','Ballon de foot retro slinky toute neuve',25000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (3,5,'Raquette de tennis','Une raquette pour adulte de 70cm apportera un gain de puissance et de confort',32000,0);
insert into object(iduser,idcategory,name,description,prixestime,disponibilite) values (1,5,'Paire de ski','Une paire de ski plus courts et bispatules pour pouvoir rider en switch ',40000,0);

insert into image(idobject,image) values (1,'robe.jpg');
insert into image(idobject,image) values (1,'robe2.jpg');
insert into image(idobject,image) values (2,'jupe.jpg');
insert into image(idobject,image) values (2,'jupe2.jpg');
insert into image(idobject,image) values (3,'blouson.jpg');
insert into image(idobject,image) values (3,'blouson2.jpg');
insert into image(idobject,image) values (4,'manteau.jpg');
insert into image(idobject,image) values (4,'manteau2.jpg');
insert into image(idobject,image) values (5,'pantalon.jpg');
insert into image(idobject,image) values (5,'pantalon2.jpg');
insert into image(idobject,image) values (6,'shampoing.jpg');
insert into image(idobject,image) values (6,'shampoing2.jpg');
insert into image(idobject,image) values (7,'creme.jpg');
insert into image(idobject,image) values (7,'creme2.jpg');
insert into image(idobject,image) values (8,'rougealevre.jpg');
insert into image(idobject,image) values (8,'rougealevre2.jpg');
insert into image(idobject,image) values (9,'maquillage.jpg');
insert into image(idobject,image) values (9,'maquillage2.jpg');
insert into image(idobject,image) values (10,'gel.jpg');
insert into image(idobject,image) values (10,'gel2.jpg');
insert into image(idobject,image) values (11,'ordinateur.jpg');
insert into image(idobject,image) values (11,'ordinateur2.jpg');
insert into image(idobject,image) values (12,'tablette.jpg');
insert into image(idobject,image) values (12,'tablette2.jpg');
insert into image(idobject,image) values (13,'ecouteur.jpg');
insert into image(idobject,image) values (13,'ecouteur2.jpg');
insert into image(idobject,image) values (14,'smartwatch.jpg');
insert into image(idobject,image) values (14,'smartwatch2.jpg');
insert into image(idobject,image) values (15,'phone.jpg');
insert into image(idobject,image) values (15,'phone2.jpg');
insert into image(idobject,image) values (16,'papierantemoro.jpg');
insert into image(idobject,image) values (16,'papierantemoro2.jpg');
insert into image(idobject,image) values (17,'abatjour.jpg');
insert into image(idobject,image) values (17,'abatjour2.jpg');
insert into image(idobject,image) values (18,'bague.jpg');
insert into image(idobject,image) values (18,'bague2.jpg');
insert into image(idobject,image) values (19,'collier.jpg');
insert into image(idobject,image) values (19,'collier2.jpg');
insert into image(idobject,image) values (20,'sac.jpg');
insert into image(idobject,image) values (20,'sac2.jpg');
insert into image(idobject,image) values (21,'legging.jpg');
insert into image(idobject,image) values (21,'legging2.jpg');
insert into image(idobject,image) values (22,'chaussures.jpg');
insert into image(idobject,image) values (22,'chaussures2.jpg');
insert into image(idobject,image) values (23,'balon.jpg');
insert into image(idobject,image) values (23,'ballon2.jpg');
insert into image(idobject,image) values (24,'raquette.jpg');
insert into image(idobject,image) values (24,'raquette2.jpg');
insert into image(idobject,image) values (25,'ski.jpg');
insert into image(idobject,image) values (25,'ski2.jpg');

insert into reservation(idproprietaire,iduser,idobject,idtakalo,datedereservation) values (1,1,6,8,'2023-02-15');
insert into reservation(idproprietaire,iduser,idobject,idtakalo,datedereservation) values (2,2,2,7,'2023-02-18');
insert into reservation(idproprietaire,iduser,idobject,idtakalo,datedereservation) values (3,3,9,1,'2023-02-20');

























































