<h2> Gestion des classes </h2>

<?php
	if ($_SESSION['role'] == "admin"){
		$laClasse = null; 
		if (isset($_GET['idclasse']) && isset($_GET['action']))
		{
			$idclasse = $_GET['idclasse']; 
			$action = $_GET['action']; 

			switch($action)
			{
				case "sup" : $unControleur->deleteClasse($idclasse); break;
				case "edit": $laClasse = $unControleur->selectWhereClasse($idclasse); break;
			}
		}

		require_once ("vue/vue_insert_classe.php"); 
		if(isset($_POST['Modifier']))
		{
			$unControleur->updateClasse ($_POST);
			header("Location: index.php?page=1");
		}

		if(isset($_POST['Valider']))
		{
			var_dump($_POST);
			$unControleur->insertClasse ($_POST);
		}
	}
	if (isset($_POST['Filtrer'])){
		$mot = $_POST['mot']; 
		$lesClasses = $unControleur->selectSearchClasses($mot); 
	}
	else{
		$lesClasses = $unControleur->selectAllClasses(); 
	}
	require_once ("vue/vue_les_classes.php");
?>