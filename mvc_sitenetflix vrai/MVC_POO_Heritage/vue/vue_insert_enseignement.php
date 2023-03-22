<h3> Ajout d'un enseignement </h3>
<form method="post">
	<table>
		<tr>
			<td> Matière </td>
			<td><input type="text" name="matiere"></td>
		</tr>
		<tr>
			<td> Nb Heures </td>
			<td><input type="text" name="nbheures"></td>
		</tr>
		<tr>
			<td> Coefficient </td>
			<td><input type="text" name="coeff"></td>
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
			<td> Id Professeur </td>
			 
			<td>
				<select name="idprofesseur">
				<option value="0"> Choisir un prof </option>
					<?php 
					foreach($lesProfesseurs as $unProfesseur)
					{
echo "<option value ='".$unProfesseur['idprofesseur']."'>".$unProfesseur['nom']."</option>";	
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td><input type="submit" name="Valider" value="Valider"></td>
		</tr>
	</table>
</form>