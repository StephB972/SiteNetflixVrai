<h2>Insertion d'une location</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Date Debut: </td>
            <td>
                <input type="date" name="datedebut" value="<?= ($laLocation!=null)?$laLocation['datedebut']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Date Fin: </td>
            <td><input type="date" name="datefin" value="<?= ($laLocation!=null)?$laLocation['datefin']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Prix: </td>
            <td><input type="text" name="prix" value="<?= ($laLocation!=null)?$laLocation['prix']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Commentaire: </td>
            <td><input type="text" name="commentaire" value="<?= ($laLocation!=null)?$laLocation['commentaire']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>User :</td>
            <td>
                <select name="iduser">
                    <?php
                        foreach($lesUsers as $unUser){
                            echo"<option value='".$unUser['iduser']."'>";
                            echo $unUser['nom']." -- ".$unUser['prenom'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Livre :</td>
            <td>
                <select name="idlivre">
                    <?php
                        foreach($lesLivres as $unLivre){
                            echo"<option value='".$unLivre['idlivre']."'>";
                            echo $unLivre['titre']." ".$unLivre['annee'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <?php
            if($laLocation!=null){
                echo "<input type='hidden' name='idlocation' value=".$laLocation['idlocation'].">";
            }
        ?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($laLocation!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>