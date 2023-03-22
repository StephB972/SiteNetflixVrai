<?php
    $lAuteur=null;
    $lesComptes=$unControleur->selectAllComptes();
    if(isset($_GET['action']) && isset($_GET['iduser'])){
        $action=$_GET['action'];
        $iduser=$_GET['iduser'];

        switch($action){
            case 'sup':
                $unControleur->deleteAuteur($iduser);
                break;
            case 'edit':
                $lAuteur=$unControleur->selectWhereAuteur($iduser);
                //var_dump($lAuteur);
                break;
        }
    }
    var_dump($lAuteur);
    if($_SESSION['role']!='utilisateur'){
        //Si role=utilisateur alors ça ne s'affichera pas
        require_once("vues/vue_insert_auteur.php");
        if(isset($_POST['Valider'])){
            $unControleur->insertAuteur($_POST);
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateAuteur($_POST);
            header("Location: index.php?page=4");
        }
    }
    
    
    $lesAuteurs=$unControleur->selectAllAuteurs();
    require_once("vues/vue_les_auteurs.php");
    
?>