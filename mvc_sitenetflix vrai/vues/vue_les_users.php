<h2>Liste des Users</h2>

<table border="1">
    <tr>
        <td>Id User</td>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Email</td>
        <td>Telephone  </td>
        <td>Date de Naissance</td>
        <td>Role</td>
        <td>Id Compte</td>
        <td>Opérations</td>
    </tr>
    <?php
    var_dump($lesUsers);
        foreach($lesUsers as $unUser){
            echo "<tr>
            <td>".$unUser['iduser']."</td>
            <td>".$unUser['nom']."</td>
            <td>".$unUser['prenom']."</td>
            <td>".$unUser['email']."</td>
            <td>".$unUser['tel']."</td>
            <td>".$unUser['datenaissance']."</td>
            <td>".$unUser['role']."</td>
            <td>".$unUser['idcompte']."</td>";
            //Opération supprimer et modifier
            echo "<td>";
            echo "<a href='index.php?page=8&action=sup&iduser=".$unUser['iduser']."'>";
            echo "<img src='images/sup.jpg' height='30' width='30'";
            echo "</a>";
            echo "<a href='index.php?page=8&action=edit&iduser=".$unUser['iduser']."'>";
            echo "<img src='images/edit.jpg' height='30' width='30'";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
</table>