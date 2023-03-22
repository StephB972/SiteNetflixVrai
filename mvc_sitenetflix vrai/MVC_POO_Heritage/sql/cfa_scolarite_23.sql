drop database if exists cfa_scolarite_23; 
create database cfa_scolarite_23; 
use cfa_scolarite_23; 

create table classe (
	idclasse int(3) not null auto_increment, 
	nom varchar(50), 
	salle varchar(50), 
	diplome varchar(50), 
	primary key(idclasse)
);

create table user (
	iduser int(3) not null auto_increment, 
	nom varchar(50), 
	prenom varchar(50), 
	email varchar(50), 
	mdp varchar(255), 
	role enum("admin", "user"), 
	primary key(iduser)
);

create table etudiant (
	iduser int(3) not null, 
	idclasse int(3) not null, 
	primary key(iduser),
	foreign key (idclasse) references classe (idclasse), 
	foreign key (iduser) references user (iduser)
);

create table professeur (
	iduser int(3) not null, 
	diplome varchar(50),
	primary key(iduser), 
	foreign key (iduser) references user (iduser)
);

create table enseignement (
	idenseignement int(3) not null auto_increment, 
	matiere varchar(50), 
	nbheures int(3), 
	coeff int(2),
	idclasse int(3) not null, 
	iduser int(3) not null, 
	primary key(idenseignement),
	foreign key (idclasse) references classe (idclasse), 
	foreign key (iduser) references professeur (iduser)
);

# les procédures stockees 
delimiter $
create procedure insertEtudiant (IN p_nom varchar(50), IN p_prenom varchar(50), 
	IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), 
	IN p_idclasse int(3) ) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_prenom, p_email, p_mdp, p_role ); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and prenom=p_prenom and email =p_email and mdp=p_mdp; 
        insert into etudiant values (p_iduser, p_idclasse );
End $
delimiter  ; 

delimiter $
create procedure insertProfesseur (IN p_nom varchar(50), IN p_prenom varchar(50), 
	IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), 
	IN p_diplome varchar(50) ) 
Begin 
        Declare p_iduser int(3); 
        
        insert into user values (null, p_nom, p_prenom, p_email, p_mdp, p_role ); 
        select iduser into p_iduser 
        from user 
        where nom = p_nom and prenom=p_prenom and email =p_email and mdp=p_mdp; 
        insert into professeur values (p_iduser, p_diplome );
End $
delimiter  ; 

delimiter $
create procedure deleteEtudiant (IN p_iduser int(3) ) 
Begin 
        delete from etudiant where iduser = p_iduser ;     
        delete from user where iduser = p_iduser ;   
End $
delimiter  ; 

delimiter $
create procedure deleteProfesseur (IN p_iduser int(3) ) 
Begin 
        delete from professeur where iduser = p_iduser ;     
        delete from user where iduser = p_iduser ;   
End $
delimiter  ; 


# les procédures stockees updateEtudiant 
delimiter $
create procedure updateEtudiant (IN p_nom varchar(50), IN p_prenom varchar(50), 
	IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), 
	IN p_idclasse int(3), IN p_iduser int(3)) 
Begin  
        update user set nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role =p_role 
        where iduser = p_iduser ; 

        update etudiant set idclasse = p_idclasse where iduser = p_iduser ;
End $
delimiter  ; 


# les procédures stockees updateProfesseur 
delimiter $
create procedure updateProfesseur (IN p_nom varchar(50), IN p_prenom varchar(50), 
	IN p_email varchar(50), IN p_mdp varchar(50) , IN p_role varchar(50), 
	IN p_diplome varchar(50), IN p_iduser int(3)) 
Begin 
        
        update user set nom = p_nom, prenom = p_prenom, email = p_email, mdp = p_mdp, role =p_role 
        where iduser = p_iduser ; 

        update professeur set diplome = p_diplome where iduser = p_iduser ;
End $
delimiter  ; 


insert into classe values 
(null, "Promotion 250", "Salle 1", "BTS SIO SLAM"), 
(null, "Promotion 249", "Salle 4", "BTS SIO SISR"); 

call insertEtudiant ("Clara", "Salim", "a@gmail.com", "123","admin", 1); 
call insertEtudiant ("Dan", "Tom", "b@gmail.com", "456", "user", 2); 

call insertProfesseur( "Ben", "Oka", "p@gmail.com", "789", "user", "Bac");
call insertProfesseur( "Noel", "Guillaume", "n@gmail.com", "234","user", "Bac"); 

insert into enseignement values 
(null, "Info", 200, 4, 1, 3), 
(null, "Math", 200, 2, 1, 4), 
(null, "Info", 200, 4, 2, 3); 


drop view if exists vueClasses;
create view vueClasses as (
	select c.*, count(e.iduser) as nbEtudiants
	from classe c, etudiant e
	where c.idclasse = e.idclasse
	group by c.idclasse
);


drop view if exists vueEtudiants;
create view vueEtudiants as (
	select u.*, e.idclasse
	from user u, etudiant e 
	where u.iduser = e.iduser
);


drop view if exists vueProfesseurs;
create view vueProfesseurs as (
	select u.*, p.diplome
	from user u, professeur p 
	where u.iduser = p.iduser
);



















