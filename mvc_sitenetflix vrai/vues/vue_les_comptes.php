<h2>Liste des compte</h2>

<table border="1">
    <tr>
        <td>Id Compte</td>
        <td>Libelle</td>
        <td>Annee</td>
        <td>Opérations</td>
    </tr>
    <?php
        foreach($lesComptes as $unCompte){
            echo "<tr>
            <td>".$unCompte['idcompte']."</td>
            <td>".$unCompte['libelle']."</td>
            <td>".$unCompte['annee']."</td>";
            //Opération supprimer et modifier
            echo "<td>";
            echo "<a href='index.php?page=2&action=sup&idcompte=".$unCompte['idcompte']."'>";
            echo "<img src='images/sup.jpg' height='30' width='30'";
            echo "</a>";
            echo "<a href='index.php?page=2&action=edit&idcompte=".$unCompte['idcompte']."'>";
            echo "<img src='images/edit.jpg' height='30' width='30'";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
</table>