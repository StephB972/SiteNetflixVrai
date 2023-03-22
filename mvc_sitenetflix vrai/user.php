<?php
    $lUser=null;
    if(isset($_GET['action']) && isset($_GET['iduser'])){
        $action=$_GET['action'];
        $iduser=$_GET['iduser'];

        switch($action){
            case 'sup':
                $unControleur->deleteUser($iduser);
                break;
            case 'edit':
                $lUser=$unControleur->selectWhereUser($iduser);
                break;
        }
    }

    //Pour pouvoir sélectionner les comptes
    $lesComptes= $unControleur->selectAllComptes();

    require_once("vues/vue_insert_user.php");
    if(isset($_POST['Valider'])){
        $unControleur->insertUser($_POST);
    }
    if(isset($_POST['Modifier'])){
        $unControleur->updateUser($_POST);
        header("Location: index.php?page=8");
    }
    
    $lesUsers=$unControleur->selectAllUsers();
    require_once("vues/vue_les_users.php");
    
?>