<?php
	require_once ("modele/modele.class.php"); 
	class Controleur{
		private $unModele ; //instance de la classe Modele 

		public function  __construct ($serveur, $bdd, $user, $mdp){
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}

		/********************** Les Classes *************************/
		public function selectAllClasses (){
			$lesClasses = $this->unModele->selectAllClasses(); 
			return $lesClasses; 
		}

		public function selectSearchClasses ($mot)
		{
			$lesClasses = $this->unModele->selectSearchClasses($mot); 
			return $lesClasses; 
		}
		public function insertClasse($tab)
		{
			$this->unModele->insertClasse($tab); 
		}
		public function deleteClasse($idclasse)
		{
			$this->unModele->deleteClasse($idclasse); 
		}
		public function selectWhereClasse($idclasse)
		{
			return $this->unModele->selectWhereClasse($idclasse); 
		}
		public function updateClasse($tab)
		{
			$this->unModele->updateClasse($tab); 
		}
		/********************** Les Etudiants *************************/
		public function selectAllEtudiants (){
			$lesEtudiants = $this->unModele->selectAllEtudiants(); 
			return $lesEtudiants; 
		}
		public function selectSearchEtudiants ($mot)
		{
			$lesEtudiants = $this->unModele->selectSearchEtudiants($mot); 
			return $lesEtudiants; 
		}
		public function insertEtudiant($tab)
		{
			$this->unModele->insertEtudiant($tab); 
		}
		public function deleteEtudiant($iduser)
		{
			$this->unModele->deleteEtudiant($iduser); 
		}
		public function selectWhereEtudiant($iduser)
		{
			return $this->unModele->selectWhereEtudiant($iduser); 
		}
		public function updateEtudiant($tab)
		{
			$this->unModele->updateEtudiant($tab); 
		}
		/********************** Les Professeurs *************************/
		public function selectAllProfesseurs (){
			$lesProfesseurs = $this->unModele->selectAllProfesseurs(); 
			return $lesProfesseurs; 
		}
		public function selectSearchProfesseurs ($mot)
		{
			$lesProfesseurs = $this->unModele->selectSearchProfesseurs($mot); 
			return $lesProfesseurs; 
		}
		public function insertProfesseur($tab)
		{
			$this->unModele->insertProfesseur($tab); 
		}
		public function deleteProfesseur($iduser)
		{
			$this->unModele->deleteProfesseur($iduser); 
		}
		public function selectWhereProfesseur($iduser)
		{
			return $this->unModele->selectWhereProfesseur($iduser); 
		}
		public function updateProfesseur($tab)
		{
			$this->unModele->updateProfesseur($tab); 
		}
		/********************** Les Enseignements *************************/
		public function selectAllEnseignements(){
			$lesEnseignements = $this->unModele->selectAllEnseignements(); 
			return $lesEnseignements; 
		}
		public function selectSearchEnseignements ($mot)
		{
			$lesEnseignements = $this->unModele->selectSearchEnseignements($mot); 
			return $lesEnseignements; 
		}
		public function insertEnseignement($tab)
		{
			$this->unModele->insertEnseignement($tab); 
		}
		/*********** Table user **********/
		public function verifConnexion ($email, $mdp)
		{
			return $this->unModele->verifConnexion ($email, $mdp);
		}
	}
?>










