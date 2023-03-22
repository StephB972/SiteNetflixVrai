<?php
	session_start();
	require_once("controleur/config_bdd.php"); 
	require_once("controleur/controleur.class.php");
	//instanciation de la classe Controleur 
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Scolarite CFA</title>
	<meta charset="utf-8">
</head>
<body>
<center>
	<h1>La scolarité du CFA</h1>
	<?php
	if( ! isset($_SESSION['email'])){
		require_once("vue/vue_connexion.php");
	}

	if (isset($_POST['seConnecter'])){
		$email = $_POST['email']; 
		$mdp = $_POST['mdp']; 
		$unUser = $unControleur->verifConnexion($email,$mdp); 
		if ($unUser == null){
			echo "<br> Verifiez vos identifiants !"; 
		}else {
			$_SESSION['email'] = $unUser['email']; 
			$_SESSION['nom'] = $unUser['nom'];
			$_SESSION['prenom'] = $unUser['prenom'];
			$_SESSION['role'] = $unUser['role'];
			header("Location: index.php");
		}
	}
	if (isset($_SESSION['email'])) {
	echo '
	<a href="index.php?page=0"> 
			<img src="images/home.jpeg" height="150" width="150">
	</a>
	<a href="index.php?page=1"> 
			<img src="images/classe.png" height="150" width="150">
	</a>
	<a href="index.php?page=2"> 
			<img src="images/etudiant.png" height="150" width="150">
	</a>
	<a href="index.php?page=3"> 
			<img src="images/professeur.png" height="150" width="150">
	</a>
	<a href="index.php?page=4"> 
			<img src="images/enseignement.png" height="150" width="150">
	</a>
	<a href="index.php?page=5"> 
			<img src="images/deconnexion.jpeg" height="150" width="150">
	</a>';
	
		$page = (isset($_GET['page'])) ? $_GET['page'] : 0 ;

		switch ($page) {
			case 0 : require_once ("home.php"); break;
			case 1 : require_once ("classes.php"); break;
			case 2 : require_once ("etudiants.php"); break;
			case 3 : require_once ("professeurs.php"); break;
			case 4 : require_once ("enseignements.php"); break;
			case 5 : session_destroy(); unset($_SESSION); 
			header("Location: index.php");
			break;
		}
	}
	?>
</center>
</body>
</html>