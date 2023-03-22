drop database if exists ppenetflix; 
CREATE database ppenetflix; 
use ppenetflix; 

#------------------------------------------------------------
# Table: COMPTE
#------------------------------------------------------------

CREATE TABLE Compte(
        idcompte Int  Auto_increment  NOT NULL ,
        libelle  Varchar (50) NOT NULL ,
        annee    Date NOT NULL
    ,CONSTRAINT COMPTE_PK PRIMARY KEY (idcompte)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE User(
        iduser        Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        prenom        Varchar (50) NOT NULL ,
        email         Varchar (50) NOT NULL ,
        mdp           Varchar (50) NOT NULL ,
        role enum('admin', 'utilisateur'), 
        idcompte      Int NOT NULL
    ,CONSTRAINT USER_PK PRIMARY KEY (iduser)

    ,CONSTRAINT USER_COMPTE_FK FOREIGN KEY (idcompte) REFERENCES Compte(idcompte)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Genre
#------------------------------------------------------------

CREATE TABLE Genre(
        idgenre Int  Auto_increment  NOT NULL ,
        libelle Varchar (50) NOT NULL
    ,CONSTRAINT Genre_PK PRIMARY KEY (idgenre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Auteur
#------------------------------------------------------------

CREATE TABLE Auteur(
        iduser      Int    NOT NULL ,
        pays          Varchar (50) NOT NULL,
        langueOfficielle varchar(50)
    ,CONSTRAINT Auteur_PK PRIMARY KEY (iduser), 
    FOREIGN KEY (iduser) REFERENCES User(iduser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: livre
#------------------------------------------------------------

CREATE TABLE Livre(
        idlivre  Int  Auto_increment  NOT NULL ,
        titre    Varchar (50) NOT NULL ,
        annee    Varchar (50) NOT NULL ,
        nbpages  Int NOT NULL ,
        langue   Varchar (50) NOT NULL ,
        url      Varchar (50) NOT NULL ,
        idgenre  Int NOT NULL ,
        idauteur Int NOT NULL
    ,CONSTRAINT livre_PK PRIMARY KEY (idlivre)

    ,CONSTRAINT livre_Genre_FK FOREIGN KEY (idgenre) REFERENCES Genre(idgenre)
    ,CONSTRAINT livre_Auteur0_FK FOREIGN KEY (idauteur) REFERENCES Auteur(iduser)
)ENGINE=InnoDB;
select * from livre, auteur where livre.idauteur=auteur.iduser;

#------------------------------------------------------------
# Table: LOCATION
#------------------------------------------------------------

CREATE TABLE Location(
        idlocation  Int  Auto_increment  NOT NULL ,
        datedebut   Date NOT NULL ,
        datefin     Date NOT NULL ,
        prix        Float NOT NULL ,
        commentaire Text NOT NULL ,
        iduser      Int NOT NULL ,
        idlivre     Int NOT NULL ,
    primary key(idlocation),
    foreign key(iduser) references User(iduser), 
    foreign key(idlivre) references Livre(idlivre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CLIENT
#------------------------------------------------------------

create table client(
    iduser int(3) not null ,
    adresse varchar(50),
    tel Varchar(20),
    datenaissance Date NOT NULL ,
    primary key (iduser) , 
    FOREIGN KEY (iduser) REFERENCES User(iduser)
);




delimiter $
create procedure insertAuteur (IN p_nom varchar(50), IN p_prenom varchar(50), 
        IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), IN p_idcompte int, 
         IN p_pays varchar(50), IN p_langue varchar(50)) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_prenom, p_email, p_mdp, p_role, p_idcompte ); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and prenom=p_prenom and email =p_email and mdp=p_mdp; 
        insert into auteur values (p_iduser, p_pays, p_langue );
End $
delimiter  ; 


delimiter $
create procedure insertClient (IN p_nom varchar(50), IN p_prenom varchar(50), 
        IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), IN p_idcompte int, 
         IN p_adresse varchar(50), IN p_tel varchar(20), IN p_datenaissance date)
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_prenom, p_email, p_mdp, p_role, p_idcompte); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and prenom=p_prenom and email =p_email and mdp=p_mdp and role=p_role; 
        insert into client values (p_iduser, p_adresse, p_tel, p_datenaissance );
End $
delimiter  ; 



delimiter $
create procedure deleteAuteur (IN p_iduser int(3) ) 
Begin 
        delete from auteur where iduser = p_iduser ;     
        delete from user where iduser = p_iduser ;   
End $
delimiter  ; 

delimiter $
create procedure deleteClient (IN p_iduser int(3) ) 
Begin 
        delete from client where iduser = p_iduser ;     
        delete from user where iduser = p_iduser ;   
End $
delimiter  ; 



delimiter $
create procedure updateAuteur (IN p_nom varchar(50), IN p_prenom varchar(50), 
        IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), IN p_idcompte int, 
         IN p_pays varchar(50), IN p_langue varchar(50),  IN p_iduser int(3)) 
Begin  
        update user set nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role =p_role , idcompte = p_idcompte
        where iduser = p_iduser ; 

        update auteur set pays = p_pays , langueOfficielle = p_langue where iduser = p_iduser ;
End $
delimiter  ; 



delimiter $
create procedure updateClient(IN p_nom varchar(50), IN p_prenom varchar(50), 
        IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), IN p_idcompte int, 
         IN p_adresse varchar(50), IN p_tel varchar(20), IN p_datenaissance date, IN p_iduser int(3)) 
Begin 
        
        update user set nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role =p_role , idcompte = p_idcompte
        where iduser = p_iduser ; 

        update client set adresse = p_adresse, tel = p_tel, datenaissance = p_datenaissance where iduser = p_iduser ;
End $
delimiter  ; 


drop view if exists vueAuteurs;
create view vueAuteurs as (
        select u.*, a.pays, a.langueOfficielle
        from user u, auteur a
        where u.iduser = a.iduser
);


drop view if exists vueClients;
create view vueClients as (
        select u.*, c.adresse, c.tel, c.datenaissance
        from user u, client c
        where u.iduser = c.iduser
);


insert into compte values (null, "Premium", "2022-10-23");
call insertAuteur ("Kreckelbergh", "Florian", "f@gmail.com", "123",  "admin", 1, "Fr", "Anglais"); 
call insertClient("Bennour", "Yanis", "y@gmail.com", "123",  "admin", 1, "rue de paris", "068745987", "2002-12-12");
