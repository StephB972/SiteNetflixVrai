<?php
    $leGenre=null;
    if(isset($_GET['action']) && isset($_GET['idgenre'])){
        $action=$_GET['action'];
        $idgenre=$_GET['idgenre'];

        switch($action){
            case 'sup':
                $unControleur->deleteGenre($idgenre);
                break;
            case 'edit':
                $leGenre=$unControleur->selectWhereGenre($idgenre);
                break;
        }
    }
    if($_SESSION['role']!='utilisateur'){
        require_once("vues/vue_insert_genre.php");
        if(isset($_POST['Valider'])){
            $unControleur->insertGenre($_POST);
        }
        if(isset($_POST['Modifier'])){
            $unControleur->updateGenre($_POST);
            header("Location: index.php?page=3");
        }
    }
    
    
    $lesGenres=$unControleur->selectAllGenres();
    require_once("vues/vue_les_genres.php");
    
?>