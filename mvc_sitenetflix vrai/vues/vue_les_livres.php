<h2>Liste des livres</h2>

<table border="1">
    <tr>
        <td>Id Livre</td>
        <td>Titre</td>
        <td>Annee</td>
        <td>Nombre de Pages</td>
        <td>Langue </td>
        <td>URL</td>
        <td>Id Genre</td>
        <td>Id Auteur</td>
        <?php
            if($_SESSION['role']!='utilisateur'){
                //Si role =utilisateur alors ça ne sera pas visible
                echo '<td>Opérations</td>';
            }
        ?>
        
    </tr>
    <?php
        foreach($lesLivres as $unLivre){
            echo "<tr>
            <td>".$unLivre['idlivre']."</td>
            <td>".$unLivre['titre']."</td>
            <td>".$unLivre['annee']."</td>
            <td>".$unLivre['nbpages']."</td>
            <td>".$unLivre['langue']."</td>
            <td>".$unLivre['url']."</td>
            <td>".$unLivre['idgenre']."</td>
            <td>".$unLivre['idauteur']."</td>";
            //Opération supprimer et modifier
            if($_SESSION['role']!='utilisateur'){
                //Si role =utilisateur alors ça ne sera pas visible
                echo "<td>";
                echo "<a href='index.php?page=6&action=sup&idlivre=".$unLivre['idlivre']."'>";
                echo "<img src='images/sup.jpg' height='30' width='30'";
                echo "</a>";
                echo "<a href='index.php?page=6&action=edit&idlivre=".$unLivre['idlivre']."'>";
                echo "<img src='images/edit.jpg' height='30' width='30'";
                echo "</a>";
                echo "</td>";
            }
            
            echo "</tr>";
        }
    ?>
</table>