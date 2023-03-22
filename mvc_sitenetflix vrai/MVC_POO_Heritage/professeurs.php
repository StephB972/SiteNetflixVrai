<h2> Gestion des professeurs </h2>

<?php
	if ($_SESSION['role'] == "admin"){
		$leProfesseur = null; 
		if (isset($_GET['iduser']) && isset($_GET['action']))
		{
			$iduser = $_GET['iduser']; 
			$action = $_GET['action']; 

			switch($action)
			{
				case "sup" : $unControleur->deleteProfesseur($iduser); break;
				case "edit": $leProfesseur = $unControleur->selectWhereProfesseur($iduser); break;
			}
		}


		require_once ("vue/vue_insert_professeur.php"); 
		if(isset($_POST['Valider']))
		{
			$unControleur->insertProfesseur($_POST);
		}
		if(isset($_POST['Modifier']))
		{
			$unControleur->updateProfesseur($_POST);
			header("Location: index.php?page=3");
		}
	}

	if (isset($_POST['Filtrer'])){
		$mot = $_POST['mot']; 
		$lesProfesseurs = $unControleur->selectSearchProfesseurs($mot); 
	}
	else{
		$lesProfesseurs = $unControleur->selectAllProfesseurs(); 
	} 
	require_once ("vue/vue_les_professeurs.php");
?>