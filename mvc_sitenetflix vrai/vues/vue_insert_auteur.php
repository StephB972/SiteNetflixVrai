<h2>Insertion d'un auteur</h2>
<form method="post" action="">
    <table>
        <tr>
            <td>Nom: </td>
            <td>
                <input type="text" name="nom" value="<?= ($lAuteur!=null)?$lAuteur['nom']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Prénom: </td>
            <td><input type="text" name="prenom" value="<?= ($lAuteur!=null)?$lAuteur['prenom']: '' ?>">
            </td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="text" name="email" value="<?= ($lAuteur!=null)?$lAuteur['email']: '' ?>">
            </td>
        </tr>
          <tr>
            <td>MDP: </td>
            <td><input type="password" name="mdp" value="<?= ($lAuteur!=null)?$lAuteur['mdp']: '' ?>">
            </td>
        </tr>
          <tr>
            <td>Role: </td>
             <td>
                <select name="role">
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
            <td>Pays: </td>
             <td>
                <select name="pays">
                    <option value="France">France</option>
                    <option value="Algerie">Algerie</option>
                    <option value="Italie">Italie</option>
                    <option value="Etats-Unis">Etats-Unis</option>
                    <option value="Allemagne">Allemagne</option>
                    <option value="Bresil">Bresil</option>
                    <option value="Espagne">Espagne</option>
                    <option value="Russie">Russie</option>
                    <option value="Chine">Chine</option>
                    <option value="Japon">Japon</option>
                </select>
            </td>
        </tr>
         <tr>
            <td>Langue: </td>
             <td>
                <select name="langueOfficielle">
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

       <?= ($lAuteur!=null)?'<input type="hidden" name="iduser" value="'.$lAuteur['iduser'].'">':''?>
        <tr>
            <td><input type="reset" name="Annuler"></td>
            <td><input type="submit" <?php 
                if($lAuteur!=null){
                    echo 'name ="Modifier" value="Modifier"';
                }
                else{
                    echo 'name="Valider" value="Valider"';
                }?>>
            </td>
        </tr>
    </table>