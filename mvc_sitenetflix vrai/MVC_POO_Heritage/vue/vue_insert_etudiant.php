<h3> Ajout d'un etudiant </h3>
<form method="post">
	<table>
		<tr>
			<td> Nom </td>
			<td><input type="text" name="nom" value="<?= ($lEtudiant!=null)?$lEtudiant['nom']:'' ?>" ></td>
		</tr>
		<tr>
			<td> Prénom </td>
			<td><input type="text" name="prenom" value="<?= ($lEtudiant!=null)?$lEtudiant['prenom']:'' ?>"></td>
		</tr>
		<tr>
			<td> Email </td>
			<td><input type="text" name="email" value="<?= ($lEtudiant!=null)?$lEtudiant['email']:'' ?>"></td>
		</tr>
		<tr>
			<td> Mdp </td>
			<td><input type="password" name="mdp" value="<?= ($lEtudiant!=null)?$lEtudiant['mdp']:'' ?>"></td>
		</tr>
		<tr>
			<td> Id Classe </td>
			<td>
				<select name="idclasse">
				<option value="0"> Choisir une Classe </option>
					<?php 
					foreach($lesClasses as $uneClasse)
					{
echo "<option value ='".$uneClasse['idclasse']."'>".$uneClasse['nom']."</option>";	
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td><input type="submit" 
				<?= ($lEtudiant!=null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>
				></td>
		</tr>
		<?= ($lEtudiant!=null)?'<input type="hidden" name="iduser" value="'.$lEtudiant['iduser'].'">':'' ?>
	</table>
	</table>
</form>