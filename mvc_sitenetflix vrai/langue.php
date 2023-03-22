<?php
    $laLangue=null;
    if(isset($_GET['action']) && isset($_GET['idlangue'])){
        $action=$_GET['action'];
        $idlangue=$_GET['idlangue'];

        switch($action){
            case 'sup':
                $unControleur->deleteLangue($idlangue);
                break;
            case 'edit':
                $laLangue=$unControleur->selectWhereLangue($idlangue);
                break;
        }
    }
    if($_SESSION['role']!='utilisateur'){
        require_once("vues/vue_insert_langue.php");
        if(isset($_POST['Valider'])){
            $unControleur->insertLangue($_POST);
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateLangue($_POST);
            header("Location: index.php?page=5");
        }
    }
    
    
    $lesGenres=$unControleur->selectAllLangues();
    require_once("vues/vue_les_langues.php");
    
?>