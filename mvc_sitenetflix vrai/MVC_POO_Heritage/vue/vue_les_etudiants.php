<h3> Liste des étudiants</h3>

<form method="post">
	Filtrer par : <input type="text" name="mot">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br/> <br/>
<table border="1">
	<tr>
		<td> Id Etudiant </td> 
		<td> Nom  </td>
		<td> Prénom </td>
		<td> Email</td>
		<td> Id Classe</td>
		<?php if($_SESSION['role'] == "admin"){
		echo "<td> Opérations </td>"; 
		} ?>
	</tr>
	<?php
		foreach ($lesEtudiants  as $unEtudiant) {
			echo "<tr>"; 
			echo "<td> ".$unEtudiant['iduser']."</td>"; 
			echo "<td> ".$unEtudiant['nom']."</td>"; 
			echo "<td> ".$unEtudiant['prenom']."</td>"; 
			echo "<td> ".$unEtudiant['email']."</td>"; 
			echo "<td> ".$unEtudiant['idclasse']."</td>"; 
			if($_SESSION['role'] == "admin"){
			echo "<td> <a href='index.php?page=2&action=sup&iduser=".$unEtudiant['iduser']."'>
				<img src='images/suppression.png' height='40' width='40'></a> ";

			echo "<a href='index.php?page=2&action=edit&iduser=".$unEtudiant['iduser']."'>
				<img src='images/edition.png' height='40' width='40'></a> </td>";
			}
			echo "</tr>";
		}
	?>
</table>