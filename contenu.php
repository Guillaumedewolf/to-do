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
			$listeTacheAfficher .= '<div class="tache"><input type="checkbox" id="' . $i . '" name="' . $i . '" value="' . $listeTache[$i]["tache"] . '" ><label for="'. $i .'">' . $listeTache[$i]["tache"] . '</label></div>' ;
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
	<div id="formulaireAjout">
	<div><button id="formulaireCacher" >+</button>
	<div id="ajoutTache"><?php include 'formulaire.php' ?></div>
	</div>
	<style>
		body{
			width: 30%;
			margin: auto;
			border: solid 1px black;
			text-align: center;
		}
		#formulaireAjout{
			width: 100%;
		}
		#formulaireCacher {
				border-radius: 5%;
				font-size: 60px;
				background-color: green;
				color: black;
				width: 80%;
				margin-bottom: 20px;
				margin-top: 10px;

		}

		#ajoutTache {
			display: none;
			margin-bottom: 20px;
			margin-top: 10px;
		}

		form > button {
			margin-top: 10px;
		}
	</style>

	<script
			  src="http://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
	<script>
		$("#formulaireCacher").click(function(){
				$("#ajoutTache").css("display", "block")
				$("#formulaireCacher").css("display", "none")

		})

		$("#ajoutTacheForm").click(function(){
				$("#ajoutTache").css("display", "none")
				$("#formulaireCacher").css("display", "block")

		})
		
	</script>
</body>
</html>