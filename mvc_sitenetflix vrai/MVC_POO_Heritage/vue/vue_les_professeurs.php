<h3> Liste des Professeurs</h3>

<form method="post">
	Filtrer par : <input type="text" name="mot">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br/> <br/>
<table border="1">
	<tr>
		<td> Id Professeur </td> 
		<td> Nom  </td>
		<td> Prénom </td>
		<td> Diplôme</td>
		<?php if($_SESSION['role'] == "admin"){
		echo "<td> Opérations </td>"; 
		} ?>
	</tr>
	<?php
		foreach ($lesProfesseurs  as $unProfesseur) {
			echo "<tr>"; 
			echo "<td> ".$unProfesseur['iduser']."</td>"; 
			echo "<td> ".$unProfesseur['nom']."</td>"; 
			echo "<td> ".$unProfesseur['prenom']."</td>"; 
			echo "<td> ".$unProfesseur['diplome']."</td>"; 
			if($_SESSION['role'] == "admin"){
			echo "<td> <a href='index.php?page=3&action=sup&iduser=".$unProfesseur['iduser']."'>
				<img src='images/suppression.png' height='40' width='40'></a> ";

			echo "<a href='index.php?page=3&action=edit&iduser=".$unProfesseur['iduser']."'>
				<img src='images/edition.png' height='40' width='40'></a> </td>";
			}
			echo "</tr>";
		}
	?>
</table>