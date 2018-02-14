<?php 

if(isset($_POST['ajoutTache'])){


	$url = 'todo.json'; // path to your JSON file
	$data = file_get_contents($url); // put the contents of the file into a variable
	$listeTache = json_decode($data, true); // decode the JSON feed
	$nouvelleTache = array ("tache" => $_POST['ajoutTache'], "fait" => false);
	array_push($listeTache, $nouvelleTache);
	$listeTache = json_encode($listeTache, JSON_FORCE_OBJECT);
	file_put_contents('todo.json', $listeTache);
	header('Location: contenu.php');


}
	

 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>formulaire</title>
</head>
<body>
	<h1>ajoutez une tâche</h1>
	<form action="formulaire.php" method="POST">
		<label for="ajoutTache"></label>
		<input type="text" name="ajoutTache">
		<button type="submit">Ajouter</button>
	</form>
</body>
</html>