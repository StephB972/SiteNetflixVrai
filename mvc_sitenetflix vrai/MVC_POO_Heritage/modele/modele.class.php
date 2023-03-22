<?php
	class Modele 
	{
		private $unPDO ; //instance de la classe PDO 

		public function   __construct($serveur, $bdd, $user, $mdp){
			$this->unPDO = null; 
			try{
				$this->unPDO = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user,$mdp);
			}
			catch (PDOException $exp){
				echo "Erreur de connexion à la base de données"; 
				echo $exp->getMessage(); 
			}
		}
		/************************************* Les Classes **********************/
		public function selectAllClasses ()
		{
			if ($this->unPDO != null){
				$requete = "select * from classe; "; 
				$select = $this->unPDO->prepare($requete);
				$select->execute (); 
				$lesClasses = $select->fetchAll(); 
				return $lesClasses; 
			}else {
				return null;
			}
		}

		public function selectSearchClasses ($mot)
		{
			if ($this->unPDO != null){
				$requete = "select * from classe where nom like :mot 
				 or salle like :mot or diplome like :mot ; "; 
				$donnees = array(":mot" => "%".$mot."%");
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees); 
				$lesClasses = $select->fetchAll(); 
				return $lesClasses; 
			}else {
				return null;
			}
		}

		public function insertClasse ($tab){
			if ($this->unPDO != null){
				$requete = "insert into classe values(null, :nom, :salle, :diplome);"; 
				$donnees=array( ":nom"=>$tab["nom"], 
							    ":salle"=>$tab["salle"],
								":diplome"=>$tab["diplome"]); 
				$insert = $this->unPDO->prepare($requete);
				$insert->execute ($donnees);
			}
		}
		public function deleteClasse ($idclasse){
			if ($this->unPDO != null){
				$requete = "delete from classe where idclasse = :idclasse;"; 
				$donnees=array( ":idclasse"=>$idclasse); 
				$delete = $this->unPDO->prepare($requete);
				$delete->execute ($donnees);
			}
		}
		public function selectWhereClasse ($idclasse){
			if ($this->unPDO != null){
				$requete = "select * from classe where idclasse = :idclasse;"; 
				$donnees=array( ":idclasse"=>$idclasse); 
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees);
				$uneClasse = $select->fetch(); //un seul résultat
				return $uneClasse; 
			}
		}
		public function updateClasse ($tab){
			if ($this->unPDO != null){
				$requete = "update classe set nom = :nom, salle= :salle, diplome = :diplome where idclasse = :idclasse ;"; 
				$donnees=array( ":nom"=>$tab["nom"], 
							    ":salle"=>$tab["salle"],
								":diplome"=>$tab["diplome"], 
								":idclasse"=>$tab["idclasse"]); 
				$update = $this->unPDO->prepare($requete);
				$update->execute ($donnees);
			}
		}
		/************************************* Les Etudiants **********************/
		public function selectAllEtudiants ()
		{
			if ($this->unPDO != null){
				$requete = "select * from vueEtudiants; "; 
				$select = $this->unPDO->prepare($requete);
				$select->execute (); 
				$lesEtudiants = $select->fetchAll(); 
				return $lesEtudiants; 
			}else {
				return null;
			}
		}
		public function selectSearchEtudiants($mot)
		{
			if ($this->unPDO != null){
				$requete = "select * from vueEtudiants where nom like :mot 
				 or prenom like :mot or email like :mot ; "; 
				$donnees = array(":mot" => "%".$mot."%");
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees); 
				$lesEtudiants = $select->fetchAll(); 
				return $lesEtudiants; 
			}else {
				return null;
			}
		}
		public function insertEtudiant ($tab){
			if ($this->unPDO != null){
				
				//appel de la procédure insertEtudiant 
				$requete = "call insertEtudiant(:nom, :prenom, :email, :mdp, :role,:idclasse);"; 
				

				$donnees=array( ":nom"=>$tab["nom"], 
							    ":prenom"=>$tab["prenom"],
								":email"=>$tab["email"],
								":mdp"=>$tab["mdp"],
								":role"=>"user", 
								":idclasse"=>$tab["idclasse"]); 
				$insert = $this->unPDO->prepare($requete);
				$insert->execute ($donnees);
			}
		}
		public function deleteEtudiant($iduser){
			if ($this->unPDO != null){
				$requete = "call deleteEtudiant(:iduser);"; 
				$donnees=array( ":iduser"=>$iduser); 
				$delete = $this->unPDO->prepare($requete);
				$delete->execute ($donnees);
			}
		}
		public function selectWhereEtudiant ($iduser){
			if ($this->unPDO != null){
				$requete = "select * from vueEtudiants where iduser = :iduser;"; 
				$donnees=array( ":iduser"=>$iduser); 
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees);
				$unEtudiant = $select->fetch(); //un seul résultat
				return $unEtudiant; 
			}
		}
		public function updateEtudiant ($tab){
			if ($this->unPDO != null){
				
				//appel de la procédure updateEtudiant 
				$requete = "call updateEtudiant(:nom, :prenom, :email, :mdp, :role,:idclasse, :iduser);"; 
				

				$donnees=array( ":nom"=>$tab["nom"], 
							    ":prenom"=>$tab["prenom"],
								":email"=>$tab["email"],
								":mdp"=>$tab["mdp"],
								":role"=>"user", 
								":idclasse"=>$tab["idclasse"], 
								":iduser"=>$tab["iduser"]
							); 
				$update = $this->unPDO->prepare($requete);
				$update->execute ($donnees);
			}
		}
		/************************************* Les Professeurs **********************/
		public function selectAllProfesseurs()
		{
			if ($this->unPDO != null){
				$requete = "select * from vueProfesseurs; "; 
				$select = $this->unPDO->prepare($requete);
				$select->execute (); 
				$lesProfesseurs = $select->fetchAll(); 
				return $lesProfesseurs; 
			}else {
				return null;
			}
		}
		public function selectSearchProfesseurs($mot)
		{
			if ($this->unPDO != null){
				$requete = "select * from vueProfesseurs where nom like :mot 
				 or prenom like :mot or diplome like :mot ; "; 
				$donnees = array(":mot" => "%".$mot."%");
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees); 
				$lesProfesseurs = $select->fetchAll(); 
				return $lesProfesseurs; 
			}else {
				return null;
			}
		}
		public function insertProfesseur($tab){
			if ($this->unPDO != null){
				//appel de la procédure insertProfesseur
				$requete = " call insertProfesseur(:nom, :prenom, :email, :mdp, :role, :diplome);"; 
				$donnees=array( ":nom"=>$tab["nom"], 
							    ":prenom"=>$tab["prenom"],
								":email"=>$tab["email"],
								":mdp"=>$tab["mdp"],
								":role"=>"user", 
								":diplome"=>$tab["diplome"]);
				$insert = $this->unPDO->prepare($requete);
				$insert->execute ($donnees);
			}
		}
		public function deleteProfesseur($iduser){
			if ($this->unPDO != null){
				$requete = "call deleteProfesseur(:iduser);"; 
				$donnees=array( ":iduser"=>$iduser); 
				$delete = $this->unPDO->prepare($requete);
				$delete->execute ($donnees);
			}
		}
		public function selectWhereProfesseur ($iduser){
			if ($this->unPDO != null){
				$requete = "select * from vueProfesseurs where iduser = :iduser;"; 
				$donnees=array( ":iduser"=>$iduser); 
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees);
				$unProfesseur = $select->fetch(); //un seul résultat
				return $unProfesseur; 
			}
		}
		public function updateProfesseur ($tab){
			if ($this->unPDO != null){
				
				//appel de la procédure updateProfesseur 
				$requete = "call updateProfesseur(:nom, :prenom, :email, :mdp, :role,:diplome, :iduser);"; 
				

				$donnees=array( ":nom"=>$tab["nom"], 
							    ":prenom"=>$tab["prenom"],
								":email"=>$tab["email"],
								":mdp"=>$tab["mdp"],
								":role"=>"user", 
								":diplome"=>$tab["diplome"], 
								":iduser"=>$tab["iduser"]
							); 
				$update = $this->unPDO->prepare($requete);
				$update->execute ($donnees);
			}
		}
		/************************************* Les Enseignements **********************/
		public function selectAllEnseignements()
		{
			if ($this->unPDO != null){
				$requete = "select * from enseignement; "; 
				$select = $this->unPDO->prepare($requete);
				$select->execute (); 
				$lesEnseignements = $select->fetchAll(); 
				return $lesEnseignements; 
			}else {
				return null;
			}
		}
		public function selectSearchEnseignements($mot)
		{
			if ($this->unPDO != null){
				$requete = "select * from enseignement where matiere like :mot ; "; 
				$donnees = array(":mot" => "%".$mot."%");
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees); 
				$lesEnseignements = $select->fetchAll(); 
				return $lesEnseignements; 
			}else {
				return null;
			}
		}
		public function insertEnseignement ($tab){
			if ($this->unPDO != null){
				$requete = "insert into enseignement values(null, :matiere, :nbheures, :coeff, :idclasse, :idprofesseur);"; 
				$donnees=array( ":matiere"=>$tab["matiere"], 
							    ":nbheures"=>$tab["nbheures"],
								":coeff"=>$tab["coeff"], 
								":idclasse"=>$tab["idclasse"],
								":idprofesseur"=>$tab["idprofesseur"]); 
				$insert = $this->unPDO->prepare($requete);
				$insert->execute ($donnees);
			}
		}
		/******************** Table User ********************/
		public function verifConnexion ($email, $mdp){
			if ($this->unPDO != null){
				$requete = "select * from user where email = :email 
				and mdp = :mdp ; ";
				$donnees=array(":email"=>$email, ":mdp"=>$mdp);
				$select = $this->unPDO->prepare($requete);
				$select->execute ($donnees);
				$unUser = $select->fetch(); 
				return $unUser; 
			}
			else {
				return null; 
			}
		}
	}
?>
















