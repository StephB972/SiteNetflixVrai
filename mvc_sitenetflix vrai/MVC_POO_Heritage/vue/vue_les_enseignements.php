<h3> Liste des enseignements</h3>

<form method="post">
	Filtrer par : <input type="text" name="mot">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br/> <br/>
<table border="1">
	<tr>
		<td> Id Enseignement </td> 
		<td> Matière  </td>
		<td> NB Heures </td>
		<td> Coefficient</td>
		<td> Id Classe</td>
		<td> Id Professeur</td>
	</tr>
	<?php
		foreach ($lesEnseignements  as $unEnseignement) {
			echo "<tr>"; 
			echo "<td> ".$unEnseignement['idenseignement']."</td>"; 
			echo "<td> ".$unEnseignement['matiere']."</td>"; 
			echo "<td> ".$unEnseignement['nbheures']."</td>"; 
			echo "<td> ".$unEnseignement['coeff']."</td>"; 
			echo "<td> ".$unEnseignement['idclasse']."</td>";
			echo "<td> ".$unEnseignement['idprofesseur']."</td>"; 
			echo "</tr>";
		}
	?>
</table>