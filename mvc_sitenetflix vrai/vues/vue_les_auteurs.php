<h2>Liste des auteurs</h2>

<table border="1">
    <tr>
        <td>Id Auteur</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Email</td>
        <td>Role</td>
        <td>Idcompte</td>
        <td>Pays</td>
        <td>Langue Officielle</td>
        <?php
            if($_SESSION['role']!='utilisateur'){
                //Si role=utilisateur alors ça ne sera pas visible
                echo '<td>Opérations</td>';
            }
        ?>
        
    </tr>
    <?php
        foreach($lesAuteurs as $unAuteur){
            echo "<tr>
            <td>".$unAuteur['iduser']."</td>
            <td>".$unAuteur['nom']."</td>
            <td>".$unAuteur['prenom']."</td>
            <td>".$unAuteur['email']."</td>
            <td>".$unAuteur['role']."</td>
            <td>".$unAuteur['idcompte']."</td>
            <td>".$unAuteur['pays']."</td>
            <td>".$unAuteur['langueOfficielle']."</td>";
            //Opération supprimer et modifier
            if($_SESSION['role']!='utilisateur'){
                //Si role=utilisateur alors ça ne sera pas visible
                echo "<td>";
                echo "<a href='index.php?page=4&action=sup&iduser=".$unAuteur['iduser']."'>";
                echo "<img src='images/sup.jpg' height='30' width='30'";
                echo "</a>";
                echo "<a href='index.php?page=4&action=edit&iduser=".$unAuteur['iduser']."'>";
                echo "<img src='images/edit.jpg' height='30' width='30'";
                echo "</a>";
                echo "</td>";
            }
            
            echo "</tr>";
        }
    ?>
</table>