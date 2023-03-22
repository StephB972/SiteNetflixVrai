<?php
    $leLivre=null;
    if(isset($_GET['action']) && isset($_GET['idlivre'])){
        $action=$_GET['action'];
        $idlivre=$_GET['idlivre'];

        switch($action){
            case 'sup':
                $unControleur->deleteLivre($idlivre);
                break;
            case 'edit':
                $leLivre=$unControleur->selectWhereLivre($idlivre);
                break;
        }
    }

    //Pour pouvoir sélectionner les genres et les auteurs
    $lesGenres= $unControleur->selectAllGenres();
    $lesAuteurs= $unControleur->selectAllAuteurs();


    if($_SESSION['role']!='utilisateur'){
        //Si role=utilisateur alors ça ne sera pas visible
        require_once("vues/vue_insert_livre.php");
        if(isset($_POST['Valider'])){
            $unControleur->insertLivre($_POST);
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateLivre($_POST);
            header("Location: index.php?page=6");
        }
    }
    
    
    $lesLivres=$unControleur->selectAllLivres();
    require_once("vues/vue_les_livres.php");
    
?>