<?php
    $leCompte=null;
    if(isset($_GET['action']) && isset($_GET['idcompte'])){
        $action=$_GET['action'];
        $idcompte=$_GET['idcompte'];

        switch($action){
            case 'sup':
                $unControleur->deleteCompte($idcompte);
                break;
            case 'edit':
                $leCompte=$unControleur->selectWhereCompte($idcompte);
                break;
        }
    }
    require_once("vues/vue_insert_compte.php");
    if(isset($_POST['Valider'])){
        $unControleur->insertCompte($_POST);
    }
    if(isset($_POST['Modifier'])){
        $unControleur->updateCompte($_POST);
        header("Location: index.php?page=2");
    }
    
    $lesComptes=$unControleur->selectAllComptes();
    require_once("vues/vue_les_comptes.php");
    
?>