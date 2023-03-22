<?php
    $leClient=null;
    $lesComptes=$unControleur->selectAllComptes();
    if(isset($_GET['action']) && isset($_GET['iduser'])){
        $action=$_GET['action'];
        $iduser=$_GET['iduser'];

        switch($action){
            case 'sup':
                $unControleur->deleteClient($iduser);
                break;
            case 'edit':
                $leClient=$unControleur->selectWhereClient($iduser);
                break;
        }
    }
    require_once("vues/vue_insert_client.php");
    if(isset($_POST['Valider'])){
        $unControleur->insertClient($_POST);
    }
    if(isset($_POST['Modifier'])){
        $unControleur->updateClient($_POST);
        header("Location: index.php?page=1");
    }
    
    $lesClients=$unControleur->selectAllClients();
    require_once("vues/vue_les_clients.php");
    
?>