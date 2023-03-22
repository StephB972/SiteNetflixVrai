<h2>Liste des clients</h2>

<table border="1">
    <tr>
        <td>Id Client</td>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Email</td>
        <td>Role</td>
        <td>Idcompte</td>
        <td>Adresse</td>
        <td>Téléphone</td>
        <td>Date de naissance</td>
        <td>Opérations</td>
    </tr>
    <?php
        foreach($lesClients as $unClient){
            echo "<tr>
            <td>".$unClient['iduser']."</td>
            <td>".$unClient['nom']."</td>
            <td>".$unClient['prenom']."</td>
            <td>".$unClient['email']."</td>
            <td>".$unClient['role']."</td>
            <td>".$unClient['idcompte']."</td>
            <td>".$unClient['adresse']."</td>
            <td>".$unClient['tel']."</td>
            <td>".$unClient['datenaissance']."</td>";
            //Opération supprimer et modifier
            echo "<td>";

            echo "<a href='index.php?page=1&action=sup&iduser=".$unClient['iduser']."'>";
            echo "<img src='images/sup.jpg' height='30' width='30'/>";
            echo "</a>";
            echo "<a href='index.php?page=1&action=edit&iduser=".$unClient['iduser']."'>";
            echo "<img src='images/edit.jpg' height='30' width='30'/>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
</table>