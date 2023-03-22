<?php
class Modele{
    private $pdo;
    public function __construct($serveur, $bdd, $user, $mdp){
        $this->pdo=null;
        try{
            $this->pdo=new PDO("mysql: host=".$serveur.";dbname=".$bdd,$user,$mdp);
        }
        catch(PDOException $exp){
                //Levee d'exception
                echo "Erreur de connexion au serveur";
                echo $exp->getMessage();
            }
    }
    public    function selectUser($email, $mdp){
        $requete="select * from user where email='".$email."' and mdp='".$mdp."';";
        if($this->pdo !=null){
            $select=$this->pdo->prepare($requete);
            $select->execute();
            //extraction de toutes les Users
            return $select->fetch();
        }
        else{
            return null;
        }
    }
    /*** Fonctions Client ***/
            //Insérer un Client
        public function insertClient($tab){
            $requete="call insertClient(:nom, :prenom, :email, :mdp, :role, :idcompte, :adresse, :tel, :datenaissance)";
            $donnees=array(
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":mdp"=>$tab['mdp'],
                ":role"=>$tab['role'],
                ":idcompte"=>$tab['idcompte'],
                ":adresse"=>$tab['adresse'],
                ":tel"=>$tab['tel'],
                ":datenaissance"=>$tab['datenaissance']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Clients
        public function selectAllClients(){
            $requete="select * from vueClients;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Clients
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un Client
        public function deleteClient($iduser){
            $requete="call deleteClient(:iduser);";
            $donnees=array(
                ":iduser"=>$iduser
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereClient($iduser){
            $requete="select * from vueClients where iduser=".$iduser.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du Client
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateClient($tab){
            $requete="call updateClient(:nom, :prenom, :email, :mdp, :role, :idcompte, :adresse, :tel, :datenaissance, :iduser);";
            $donnees=array(
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":mdp"=>$tab['mdp'],
                ":role"=>$tab['role'],
                ":idcompte"=>$tab['idcompte'],
                ":iduser"=>$tab['iduser'],
                ":adresse"=>$tab['adresse'],
                ":tel"=>$tab['tel'],
                ":datenaissance"=>$tab['datenaissance']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }


        /*** Fonctions Compte ***/
            //Insérer un Compte
        public function insertCompte($tab){
            $requete="insert into compte values (null, :libelle, :annee);";
            $donnees=array(
                ":libelle"=>$tab['libelle'],
                ":annee"=>$tab['annee']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Comptes
        public function selectAllComptes(){
            $requete="select * from compte;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Comptes
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un Compte
        public function deleteCompte($idcompte){
            $requete="delete from compte where idcompte =:idcompte;";
            $donnees=array(
                ":idcompte"=>$idcompte
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereCompte($idcompte){
            $requete="select * from compte where idcompte=".$idcompte.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du Compte
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateCompte($tab){
            $requete="update compte set libelle=:libelle, annee=:annee where idcompte=:idcompte;";
            $donnees=array(
                ":idcompte"=>$tab['idcompte'],
                ":libelle"=>$tab['libelle'],
                ":annee"=>$tab['annee']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }



        /*** Fonctions Genre ***/
            //Insérer un Genre
        public function insertGenre($tab){
            $requete="insert into genre values (null, :libelle);";
            $donnees=array(
                ":libelle"=>$tab['libelle']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Genre
        public function selectAllGenres(){
            $requete="select * from genre;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Genres
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un Genres
        public function deleteGenre($idgenre){
            $requete="delete from genre where idgenre =:idgenre;";
            $donnees=array(
                ":idgenre"=>$idgenre
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereGenre($idgenre){
            $requete="select * from genre where idgenre=".$idgenre.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du Genre
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateGenre($tab){
            $requete="update genre set libelle=:libelle where idgenre=:idgenre;";
            $donnees=array(
                ":idgenre"=>$tab['idgenre'],
                ":libelle"=>$tab['libelle']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }


        /*** Fonctions Auteur ***/
            //Insérer un Auteur
        public function insertAuteur($tab){
           $requete = "call insertAuteur(:nom, :prenom, :email, :mdp, :role,:idcompte, :pays, :langueOfficielle);"; 
            $donnees=array(
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":mdp"=>$tab['mdp'],
                ":role"=>"utilisateur",
                ":idcompte"=>$tab['idcompte'],
                ":pays"=>$tab['pays'],
                ":langueOfficielle"=>$tab['langueOfficielle'],
            );

            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Auteur
        public function selectAllAuteurs(){
            $requete="select * from vueAuteurs;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Auteur
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un Auteur
        public function deleteAuteur($idauteur){
            $requete="call deleteAuteur (:idauteur);";
            $donnees=array(
                ":idauteur"=>$idauteur
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereAuteur($idauteur){
            $requete="select * from vueAuteurs where iduser=".$idauteur.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du Auteur
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateAuteur($tab){
            $requete="call updateAuteur(:nom, :prenom, :email, :mdp, :role, :idcompte, :pays, :langueOfficielle, :iduser)";
            $donnees=array(
                ":iduser"=>$tab['iduser'],
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":mdp"=>$tab['mdp'],
                ":role"=>$tab['role'],
                ":idcompte"=>$tab['idcompte'],
                ":pays"=>$tab['pays'],
                ":langueOfficielle"=>$tab['langueOfficielle']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }




        /*** Fonctions Livre ***/
            //Insérer un Livre
        public function insertLivre($tab){
            $requete="insert into livre values (null, :titre, :annee, :nbpages, :langue, :url, :idgenre, :idauteur);";
            $donnees=array(
                
                ":titre"=>$tab['titre'],
                ":annee"=>$tab['annee'],
                ":nbpages"=>$tab['nbpages'],
                ":langue"=>$tab['langue'],
                ":url"=>$tab['url'],
                ":idgenre"=>$tab['idgenre'],
                ":idauteur"=>$tab['idauteur']

            );
            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Livres
        public function selectAllLivres(){
            $requete="select * from livre;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Livre
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un Livre
        public function deleteLivre($idlivre){
            $requete="delete from livre where idlivre =:idlivre;";
            $donnees=array(
                ":idlivre"=>$idlivre
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereLivre($idlivre){
            $requete="select * from livre where idlivre=".$idlivre.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du Livre
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateLivre($tab){
            $requete="update livre set titre=:titre, annee=:annee, nbpages=:nbpages, langue=:langue, url=:url, idgenre=:idgenre, idauteur=:idauteur where idlivre=:idlivre;";
            $donnees=array(
                ":idlivre"=>$tab['idlivre'],
                ":titre"=>$tab['titre'],
                ":annee"=>$tab['annee'],
                ":nbpages"=>$tab['nbpages'],
                ":langue"=>$tab['langue'],
                ":url"=>$tab['url'],
                ":idgenre"=>$tab['idgenre'],
                ":idauteur"=>$tab['idauteur']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }



        /*** Fonctions Location ***/
            //Insérer un Location
        public function insertLocation($tab){
            $requete="insert into location values (null, :datedebut, :datefin, :prix, :commentaire, :iduser, :idlivre);";
            $donnees=array(
                
                ":datedebut"=>$tab['datedebut'],
                ":datefin"=>$tab['datefin'],
                ":prix"=>$tab['prix'],
                ":commentaire"=>$tab['commentaire'],
                ":iduser"=>$tab['iduser'],
                ":idlivre"=>$tab['idlivre']

            );

            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Locations
        public function selectAllLocations(){
            $requete="select * from location;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Locations
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un Location
        public function deleteLocation($idlocation){
            $requete="delete from location where idlocation =:idlocation;";
            $donnees=array(
                ":idlocation"=>$idlocation
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereLocation($idlocation){
            $requete="select * from location where idlocation=".$idlocation.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du Location
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateLocation($tab){
            $requete="update location set datedebut=:datedebut, datefin=:datefin, prix=:prix, commentaire=:commentaire, iduser=:iduser, idlivre=:idlivre where idlocation=:idlocation;";
            $donnees=array(
                ":idlocation"=>$tab['idlocation'],
                ":datedebut"=>$tab['datedebut'],
                ":datefin"=>$tab['datefin'],
                ":prix"=>$tab['prix'],
                ":commentaire"=>$tab['commentaire'],
                ":iduser"=>$tab['iduser'],
                ":idlivre"=>$tab['idlivre']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }





        /*** Fonctions User ***/
            //Insérer un User
        public function insertUser($tab){
            $requete="insert into user values (null, :nom, :prenom, :email, :mdp, :tel, :datenaissance, :role, :idcompte);";
            $donnees=array(
                
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":mdp"=>$tab['mdp'],
                ":tel"=>$tab['tel'],
                ":datenaissance"=>$tab['datenaissance'],
                ":role"=>$tab['role'],
                ":idcompte"=>$tab['idcompte']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $insert=$this->pdo->prepare($requete);
                $insert->execute($donnees);

            }
        }
            //Visualiser les Users
        public function selectAllUsers(){
            $requete="select * from user;";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction de tous les Users
                return $select->fetchAll();
            }
            else{
                return null;
            }
        }
            //Supprimer un User
        public function deleteUser($iduser){
            $requete="delete from user where iduser =:iduser;";
            $donnees=array(
                ":iduser"=>$iduser
            );
            if($this->pdo !=null){
                $delete=$this->pdo->prepare($requete);
                $delete->execute($donnees);
            }
        }
        public function selectWhereUser($iduser){
            $requete="select * from user where iduser=".$iduser.";";
            if($this->pdo !=null){
                $select=$this->pdo->prepare($requete);
                $select->execute();
                //Extraction du User
                return $select->fetch();
            }
            else{
                return null;
            }
        }
        public function updateUser($tab){
            $requete="update user set nom=:nom, prenom=:prenom, email=:email, mdp=:mdp, tel=:tel, datenaissance=:datenaissance, role=:role, idcompte=:idcompte where iduser=:iduser;";
            $donnees=array(
                ":iduser"=>$tab['iduser'],
                ":nom"=>$tab['nom'],
                ":prenom"=>$tab['prenom'],
                ":email"=>$tab['email'],
                ":mdp"=>$tab['mdp'],
                ":tel"=>$tab['tel'],
                ":datenaissance"=>$tab['datenaissance'],
                ":role"=>$tab['role'],
                ":idcompte"=>$tab['idcompte']
            );

            if($this->pdo!=null){
                //On prépare la requête
                $update=$this->pdo->prepare($requete);
                $update->execute($donnees);

            }
        }
}
?>