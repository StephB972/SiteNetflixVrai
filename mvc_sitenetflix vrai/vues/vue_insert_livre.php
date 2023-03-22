<h2>Insertion d'un livre</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Titre: </td>
            <td>
                <input type="text" name="titre" value="<?= ($leLivre!=null)?$leLivre['titre']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Annee: </td>
            <td><input type="text" name="annee" value="<?= ($leLivre!=null)?$leLivre['annee']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Nombre de Pages: </td>
            <td><input type="text" name="nbpages" value="<?= ($leLivre!=null)?$leLivre['nbpages']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Langue: </td>
             <td>
                <select name="langue">
                    <option value="Francais">Francais</option>
                    <option value="Arabe">Arabe</option>
                    <option value="Italien">Italien</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Allemand">Allemand</option>
                    <option value="Portugais">Portugais</option>
                    <option value="Espagnol">Espagnol</option>
                    <option value="Russe">Russe</option>
                    <option value="Chinois">Chinois</option>
                    <option value="Japonais">Japonais</option>
                </select>
            </td>
        </tr>
            <td>Url: </td>
            <td><input type="text" name="url" value="<?= ($leLivre!=null)?$leLivre['url']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Genre :</td>
            <td>
                <select name="idgenre">
                    <?php
                        foreach($lesGenres as $unGenre){
                            echo"<option value='".$unGenre['idgenre']."'>";
                            echo $unGenre['idgenre']." -- ".$unGenre['libelle'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Auteur :</td>
            <td>
                <select name="idauteur">
                    <?php
                        foreach($lesAuteurs as $unAuteur){
                            echo"<option value='".$unAuteur['iduser']."'>";
                            echo $unAuteur['nom']." ".$unAuteur['prenom'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <?php
            if($leLivre!=null){
                echo "<input type='hidden' name='idlivre' value=".$leLivre['idlivre'].">";
            }
        ?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($leLivre!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>