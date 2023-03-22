<h2>Liste des Locations</h2>

<table border="1">
    <tr>
        <td>Id Location</td>
        <td>Date Debut</td>
        <td>Date Fin</td>
        <td>Prix</td>
        <td>Commentaire </td>
        <td>Id User</td>
        <td>Id Livre</td>
        <td>Opérations</td>
    </tr>
    <?php
        foreach($lesLocations as $uneLocation){
            echo "<tr>
            <td>".$uneLocation['idlocation']."</td>
            <td>".$uneLocation['datedebut']."</td>
            <td>".$uneLocation['datefin']."</td>
            <td>".$uneLocation['prix']."</td>
            <td>".$uneLocation['commentaire']."</td>
            <td>".$uneLocation['iduser']."</td>
            <td>".$uneLocation['idlivre']."</td>";
            //Opération supprimer et modifier
            echo "<td>";
            echo "<a href='index.php?page=7&action=sup&idlocation=".$uneLocation['idlocation']."'>";
            echo "<img src='images/sup.jpg' height='30' width='30'";
            echo "</a>";
            echo "<a href='index.php?page=7&action=edit&idlocation=".$uneLocation['idlocation']."'>";
            echo "<img src='images/edit.jpg' height='30' width='30'";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
</table>