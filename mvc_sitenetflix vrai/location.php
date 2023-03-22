<?php
    $laLocation=null;
    if(isset($_GET['action']) && isset($_GET['idlocation'])){
        $action=$_GET['action'];
        $idlocation=$_GET['idlocation'];

        switch($action){
            case 'sup':
                $unControleur->deleteLocation($idlocation);
                break;
            case 'edit':
                $laLocation=$unControleur->selectWhereLocation($idlocation);
                break;
        }
    }

    //Pour pouvoir sélectionner les genres et les auteurs
    $lesUsers= $unControleur->selectAllUsers();
    $lesLivres= $unControleur->selectAllLivres();

    require_once("vues/vue_insert_location.php");
    if(isset($_POST['Valider'])){
        $unControleur->insertLocation($_POST);
    }
    if(isset($_POST['Modifier'])){
        $unControleur->updateLocation($_POST);
        header("Location: index.php?page=7");
    }
    
    $lesLocations=$unControleur->selectAllLocations();
    require_once("vues/vue_les_locations.php");
    
?>