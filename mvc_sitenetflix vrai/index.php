<?php
    require_once("controleur/controleur.class.php");
    require_once("controleur/config_bdd.php");
    session_start(); // demarrage de la session

    //Instanciation du controleur
    $unControleur = new Controleur($serveur,$bdd,$user,$mdp);
?>
<!DOCTYPE html>
<font> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetBook</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- My css -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
        <h1><marquee behavior="alternate" scrollamount="2" scrolldelay="10">Bienvenue sur le site de NetBook 📚</marquee></h1>

<?php 
          if(! isset($_SESSION['email'])){ // si il n'y a pas de session
            require_once("vues/vue_connexion.php");
          }
          if (isset($_POST['seConnecter']))
          {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $unUser =$unControleur-> selectUser($email, $mdp);
            if ($unUser == null)
            {
              echo "Veuillez vérifier vos identifiants !";
            } else {
              echo "Bienvenue ".$unUser['nom']." ".$unUser['prenom'];
              //creation de la session 
              $_SESSION['email'] = $unUser['email'];
              $_SESSION['nom'] = $unUser['nom'];
              $_SESSION['prenom'] = $unUser['prenom'];
              $_SESSION['role'] = $unUser['role'];
              // on recharge la page vers le home
              header("Location: index.php?page=0");
            }
          }
          if(isset($_SESSION['email'])){
            //Si role = admin alors tout est visible - modifiable, supprimable, ajoutable
            if($_SESSION['role']=='admin'){
                echo'<a href="index.php?page=0">
                    <img src="images/home.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=1">
                    <img src="images/client.jpg" height="65" width="65">
                </a>
                <a href="index.php?page=2">
                    <img src="images/compte.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=3">
                    <img src="images/genre.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=4">
                    <img src="images/auteur.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=6">
                    <img src="images/livre.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=7">
                    <img src="images/location.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=5">
                    <img src="images/deconnexion.jpg" height="60" width="60">
                </a>';
            }
            if($_SESSION['role']=='utilisateur'){
                //Si role=utilisateur alors seul genre, auteur, livre et location est visible
                echo'<a href="index.php?page=3">
                    <img src="images/genre.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=4">
                    <img src="images/auteur.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=6">
                    <img src="images/livre.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=7">
                    <img src="images/location.jpg" height="50" width="50">
                </a>
                <a href="index.php?page=5">
                    <img src="images/deconnexion.jpg" height="50" width="50">
                </a>';
            }
            
            if(isset($_GET['page'])){
                $page=$_GET['page'];
            }
            else{
                $page=0;
            }
                //Si role = admin toute page est accessible
                if($_SESSION['role']=='admin'){
                    switch($page){
                        case 0: require_once("home.php");
                        break;
                        case 1: require_once("client.php");
                            break;
                        case 2: require_once("compte.php");
                            break;
                        case 3: require_once("genre.php");
                            break;
                        case 4: require_once("auteur.php");
                            break;
                        case 5: session_destroy();
                            header("Location: index.php"); // recharger la page 
                            break;
                        case 6: require_once("livre.php");
                            break;
                        case 7: require_once("location.php");
                            break;
                    }
                }
                //Si role = utilisateur que genre auteur, livre et location est accessible
                if($_SESSION['role']=='utilisateur'){
                    switch($page){
                        case 0: require_once("home.php");
                        break;
                        case 3: require_once("genre.php");
                            break;
                        case 4: require_once("auteur.php");
                            break;
                        case 5: session_destroy();
                            header("Location: index.php"); // recharger la page 
                            break;
                        case 6: require_once("livre.php");
                            break;
                        case 7: require_once("location.php");
                            break;
                    }
                }
              }

            
        ?>
        <br>

    </center>
</body>
</font>
</html>