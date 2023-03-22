<h2>Insertion d'un compte</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Libelle: </td>
            <td>
                <input type="text" name="libelle" value="<?= ($leCompte!=null)?$leCompte['libelle']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Annee: </td>
            <td><input type="date" name="annee" value="<?= ($leCompte!=null)?$leCompte['annee']: '' ?>">
            </td>
        </tr>
        <?php
            if($leCompte!=null){
                echo "<input type='hidden' name='idcompte' value=".$leCompte['idcompte'].">";
            }
        ?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($leCompte!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>