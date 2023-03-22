<h2> Gestion des étudiants </h2>

<?php
	if ($_SESSION['role'] == "admin"){
		$lEtudiant = null; 
		if (isset($_GET['iduser']) && isset($_GET['action']))
		{
			$iduser = $_GET['iduser']; 
			$action = $_GET['action']; 

			switch($action)
			{
				case "sup" : $unControleur->deleteEtudiant($iduser); break;
				case "edit": $lEtudiant = $unControleur->selectWhereEtudiant($iduser); break;
			}
		}


		$lesClasses = $unControleur->selectAllClasses (); 
		
		require_once ("vue/vue_insert_etudiant.php"); 
		if(isset($_POST['Valider']))
		{
			$unControleur->insertEtudiant ($_POST);
		}
		if(isset($_POST['Modifier']))
		{
			$unControleur->updateEtudiant($_POST);
			header("Location: index.php?page=2");
		}
	}

	if (isset($_POST['Filtrer'])){
		$mot = $_POST['mot']; 
		$lesEtudiants = $unControleur->selectSearchEtudiants($mot); 
	}
	else{
		$lesEtudiants = $unControleur->selectAllEtudiants(); 
	}
	require_once ("vue/vue_les_etudiants.php");
?>