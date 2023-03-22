<h2>Insertion d'un genre</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Libelle: </td>
            <td>
                <input type="text" name="libelle" value="<?= ($leGenre!=null)?$leGenre['libelle']: '' ?>">
            </td>
        </tr>
        <?php
            if($leGenre!=null){
                echo "<input type='hidden' name='idgenre' value=".$leGenre['idgenre'].">";
            }
        ?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($leGenre!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>