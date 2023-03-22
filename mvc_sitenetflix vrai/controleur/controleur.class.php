<?php
    require_once("modele/modele.class.php");
    class Controleur {
        private $unModele;
        public function __construct($serveur, $bdd, $user, $mdp){
            $this->unModele=new Modele ($serveur, $bdd, $user, $mdp);
        }
        public function selectUser($email, $mdp){
            return $this->unModele->selectUser($email,$mdp);
        }
      //Inserer un Client
        public function insertClient($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertClient($tab);
        }
        //Afficher les Clients
        public function selectAllClients(){
            $lesClients=$this->unModele->selectAllClients();
            //S'il y a des traitements à faire

            //On renvoie les Clients
            return $lesClients;
        }
        //On supprime un Client
        public function deleteClient($idclient){
            $this->unModele->deleteClient($idclient);
        }
        public function selectWhereClient($idclient){
           return $this->unModele->selectWhereClient($idclient);
        }
        public function updateClient($tab){
            $this->unModele->updateClient($tab);
        }



        //Inserer un Compte
        public function insertCompte($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertCompte($tab);
        }
        //Afficher les Comptes
        public function selectAllComptes(){
            $lesComptes=$this->unModele->selectAllComptes();
            //S'il y a des traitements à faire

            //On renvoie les Comptes
            return $lesComptes;
        }
        //On supprime un Compte
        public function deleteCompte($idcompte){
            $this->unModele->deleteCompte($idcompte);
        }
        public function selectWhereCompte($idcompte){
           return $this->unModele->selectWhereCompte($idcompte);
        }
        public function updateCompte($tab){
            $this->unModele->updateCompte($tab);
        }





        //Inserer un Genre
        public function insertGenre($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertGenre($tab);
        }
        //Afficher les Genre
        public function selectAllGenres(){
            $lesGenres=$this->unModele->selectAllGenres();
            //S'il y a des traitements à faire

            //On renvoie les Genres
            return $lesGenres;
        }
        //On supprime un Genres
        public function deleteGenre($idgenre){
            $this->unModele->deleteGenre($idgenre);
        }
        public function selectWhereGenre($idgenre){
           return $this->unModele->selectWhereGenre($idgenre);
        }
        public function updateGenre($tab){
            $this->unModele->updateGenre($tab);
        }



        //Inserer un Auteur
        public function insertAuteur($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertAuteur($tab);
        }
        //Afficher les Auteur
        public function selectAllAuteurs(){
            $lesAuteurs=$this->unModele->selectAllAuteurs();
            //S'il y a des traitements à faire

            //On renvoie les Auteurs
            return $lesAuteurs;
        }
        //On supprime un Auteurs
        public function deleteAuteur($idauteur){
            $this->unModele->deleteAuteur($idauteur);
        }
        public function selectWhereAuteur($idauteur){
           return $this->unModele->selectAllAuteurs($idauteur);
        }
        public function updateAuteur($tab){
            $this->unModele->updateAuteur($tab);
        }





        //Inserer un Livre
        public function insertLivre($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertLivre($tab);
        }
        //Afficher les Livres
        public function selectAllLivres(){
            $lesLivres=$this->unModele->selectAllLivres();
            //S'il y a des traitements à faire

            //On renvoie les Livres
            return $lesLivres;
        }
        //On supprime un Livre
        public function deleteLivre($idlivre){
            $this->unModele->deleteLivre($idlivre);
        }
        public function selectWhereLivre($idlivre){
           return $this->unModele->selectWhereLivre($idlivre);
        }
        public function updateLivre($tab){
            $this->unModele->updateLivre($tab);
        }




        //Inserer un Location
        public function insertLocation($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertLocation($tab);
        }
        //Afficher les Locations
        public function selectAllLocations(){
            $lesLocations=$this->unModele->selectAllLocations();
            //S'il y a des traitements à faire

            //On renvoie les Locations
            return $lesLocations;
        }
        //On supprime un Location
        public function deleteLocation($idlocation){
            $this->unModele->deleteLocation($idlocation);
        }
        public function selectWhereLocation($idlocation){
           return $this->unModele->selectWhereLocation($idlocation);
        }
        public function updateLocation($tab){
            $this->unModele->updateLocation($tab);
        }



        //Inserer un User
        public function insertUser($tab){
            //On contrôle la validité des données

            //Appel au modèle pour l'insertion
            $this->unModele->insertUser($tab);
        }
        //Afficher les Users
        public function selectAllUsers(){
            $lesUsers=$this->unModele->selectAllUsers();
            //S'il y a des traitements à faire

            //On renvoie les Users
            return $lesUsers;
        }
        //On supprime un User
        public function deleteUser($iduser){
            $this->unModele->deleteUser($iduser);
        }
        public function selectWhereUser($iduser){
           return $this->unModele->selectWhereUser($iduser);
        }
        public function updateUser($tab){
            $this->unModele->updateUser($tab);
        }

    }

?>
