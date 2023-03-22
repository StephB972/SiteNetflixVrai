<h2>Insertion d'un User</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Nom: </td>
            <td>
                <input type="text" name="nom" value="<?= ($lUser!=null)?$lUser['datedebut']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Prenom: </td>
            <td><input type="text" name="prenom" value="<?= ($lUser!=null)?$lUser['datefin']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="email" value="<?= ($lUser!=null)?$lUser['prix']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Mot de passe: </td>
            <td><input type="password" name="mdp" value="<?= ($lUser!=null)?$lUser['commentaire']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Telephone: </td>
            <td><input type="text" name="tel" value="<?= ($lUser!=null)?$lUser['commentaire']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Date de naissance: </td>
            <td><input type="date" name="datenaissance" value="<?= ($lUser!=null)?$lUser['commentaire']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>
            	<select name="role">
            		<option value="admin">
            			Admin
            		</option>
            		<option value="utilisateur">
            			Utilisateur
            		</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td>Compte :</td>
            <td>
                <select name="idcompte">
                    <?php
                        foreach($lesComptes as $unCompte){
                            echo"<option value='".$unCompte['idcompte']."'>";
                            echo $unCompte['libelle']." -- ".$unCompte['annee'];
                            echo "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <?php
            if($lUser!=null){
                echo "<input type='hidden' name='iduser' value=".$lUser['iduser'].">";
            }
        ?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($lUser!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>