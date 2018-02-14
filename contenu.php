<?php 
	//lecture json
	$url = 'todo.json'; // path to your JSON file
	$data = file_get_contents($url); // put the contents of the file into a variable
	$listeTache = json_decode($data, true); // decode the JSON feed

	//button enregistrer


	for ($i=0; $i < count($listeTache); $i++) { 
		if (isset($_POST[$i])){
			$listeTache[$i]["fait"] = true;
		}

	}


	// ecrire dans "a faire" et "archive"
	$listeTacheAfficher = '';
	$listeTacheArchive ='';
	for ($i=0; $i < count($listeTache); $i++) { 
		if($listeTache[$i]["fait"] == false){
			$listeTacheAfficher .= '<div class="tache"><input type="checkbox" name="' . $i . '" value="' . $listeTache[$i]["tache"] . '" ><span>' . $listeTache[$i]["tache"] . '</span></div>' ;
	}
		else {
			$listeTacheArchive .= '<div class="tache"><input type="checkbox" checked="" name="' . $i . '" value="' . $listeTache[$i]["tache"] . '"><span><del>' . $listeTache[$i]["tache"] . '</del></span></div>' ;
	}

	}

			$listeTache2 = json_encode($listeTache, JSON_FORCE_OBJECT);
			file_put_contents('todo.json', $listeTache2);


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>to-do</title>
</head>
<body>
	<div id="aFaire">
		<h1>A FAIRE!</h1>
		<form action="contenu.php" method="POST">
			
			<div id="tacheAFaire">
				<!-- creer en php -->
				<?php echo $listeTacheAfficher ?>
			</div>
			<button type ="submit">Enregistrer</button>
		</form>
	</div>
	<div id="archive">
		<h1>Archive</h1>
		<div id="tacheFait">
			<!-- creer en php -->
			<?php echo $listeTacheArchive ?>
		</div>
		
	</div>
	<div><?php include 'formulaire.php' ?></div>
</body>
</html>