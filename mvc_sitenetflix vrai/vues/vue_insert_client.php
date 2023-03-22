<h2>Insertion d'un client</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Nom: </td>
             <td>
                <input type="text" name="nom" value="<?= ($leClient!=null)?$leClient['nom']: '' ?>">
            </td>
        </tr>
         <tr>
            <td>Prenom: </td>
             <td>
                <input type="text" name="prenom" value="<?= ($leClient!=null)?$leClient['prenom']: '' ?>">
            </td>
        </tr>
         <tr>
            <td>Email: </td>
             <td>
                <input type="text" name="email" value="<?= ($leClient!=null)?$leClient['email']: '' ?>">
            </td>
        </tr>
         <tr>
            <td>Mot de passe: </td>
             <td>
                <input type="password" name="mdp" value="<?= ($leClient!=null)?$leClient['mdp']: '' ?>">
            </td>
        </tr>
         <tr>
            <td>Role: </td>
             <td>
                <select name="role">
                    <option value="admin">admin</option>
                    <option value="utilisateur">utilisateur</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>IdCompte: </td>
             <td>
                <select name="idcompte">
                   <?php
                    foreach ($lesComptes as $unCompte) {
                        echo "<option value='".$unCompte['idcompte']."'>".$unCompte['libelle']."</option>";
                    }
                      ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Adresse: </td>
            <td>
                <input type="text" name="adresse" value="<?= ($leClient!=null)?$leClient['adresse']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Telephone: </td>
            <td><input type="text" name="tel" value="<?= ($leClient!=null)?$leClient['tel']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Date de naissance: </td>
            <td><input type="date" name="datenaissance" value="<?= ($leClient!=null)?$leClient['datenaissance']: '' ?>">
            </td>
        </tr>
        <?php
            if($leClient!=null){
                echo "<input type='hidden' name='iduser' value=".$leClient['iduser'].">";
            }
        ?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($leClient!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>