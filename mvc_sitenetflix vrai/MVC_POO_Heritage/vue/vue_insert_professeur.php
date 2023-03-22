<h3> Ajout d'un Professeur </h3>
<form method="post">
	<table>
		<tr>
			<td> Nom </td>
			<td><input type="text" name="nom" value="<?= ($leProfesseur!=null)?$leProfesseur['nom']:'' ?>"></td>
		</tr>
		<tr>
			<td> Prénom </td>
			<td><input type="text" name="prenom" value="<?= ($leProfesseur!=null)?$leProfesseur['prenom']:'' ?>"></td>
		</tr>
		<tr>
			<td> Email </td>
			<td><input type="text" name="email" value="<?= ($leProfesseur!=null)?$leProfesseur['email']:'' ?>"></td>
		</tr>
		<tr>
			<td> Mdp </td>
			<td><input type="password" name="mdp" value="<?= ($leProfesseur!=null)?$leProfesseur['mdp']:'' ?>"></td>
		</tr>
		<tr>
			<td> Diplôme </td>
			<td><input type="text" name="diplome" value="<?= ($leProfesseur!=null)?$leProfesseur['diplome']:'' ?>"></td>
		</tr>
		
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td><input type="submit" 
				<?= ($leProfesseur!=null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>
				></td>
		</tr>
		<?= ($leProfesseur!=null)?'<input type="hidden" name="iduser" value="'.$leProfesseur['iduser'].'">':'' ?>
	</table>
</form>