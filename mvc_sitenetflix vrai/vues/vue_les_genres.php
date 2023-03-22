<h2>Liste des genres</h2>

<table border="1">
    <tr>
        <td>Id Genre</td>
        <td>Libelle</td>
        <?php
        if($_SESSION['role']!='utilisateur'){
            //Si role=utilisateur alors ça ne sera pas visible
            echo '<td>Opérations</td>';
        }
        ?>
        
    </tr>
    <?php
        foreach($lesGenres as $unGenre){
            echo "<tr>
            <td>".$unGenre['idgenre']."</td>
            <td>".$unGenre['libelle']."</td>";
            //Opération supprimer et modifier

            if($_SESSION['role']!='utilisateur'){
                //Si role=utilisateur alors ça ne sera pas visible
                echo "<td>";
                echo "<a href='index.php?page=3&action=sup&idgenre=".$unGenre['idgenre']."'>";
                echo "<img src='images/sup.jpg' height='30' width='30'";
                echo "</a>";
                echo "<a href='index.php?page=3&action=edit&idgenre=".$unGenre['idgenre']."'>";
                echo "<img src='images/edit.jpg' height='30' width='30'";
                echo "</a>";
                echo "</td>";
            }
        
            
            echo "</tr>";
        }
    ?>
</table>