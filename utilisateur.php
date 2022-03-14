<!DOCTYPE HTML>
<html lang=fr>
	<head>
		<meta charset = "utf-8" />
	</head>

<body>
<?php
	// mettre en exécution la connexion avec la base de données
	include ("connection.php");
	
	// récupérer les contenus des variables formulaires
    $nom        = $_POST["nom"];
  	$prénom     = $_POST["prénom"];
    $email      = $_POST["email"];
  	$adresse    = $_POST["addresse"];  
    $email      = $_POST["noTel"];  
    $motDePasse = $_POST["password"];
	$type       = $_POST["type"];

    //pour Hasher le mot de passe et le crypter dans la base de donnée
    $motDePasse = hash('sha3-512' , $motDePasse);

    
	// préparer votre requête pour insérer des données dans la table PERSONNE
	$inserer = "insert into log_in(nom,prénom,adresse,telephone,email,motDePasse) values ('$nom','$prénom','$adresse','$telephone','$email','$motDePasse')";
    // echo $nom ;    
    // echo $prénom ;  
    // echo $adresse ;  
    // echo $telephone ;  
    // echo $email ;  
    // echo $motDePasse ;  
    echo $inserer ;  

	//DELIMITER $$

	// CREATE TRIGGER inserer_date 
	
	// AFTER INSERT ON utilisateur 
	// FOR EACH ROW 
	// 	BEGIN
		
	// 		INSERT INTO membre(nom,membre.prenom) VALUES(log_in.nom,log_in.prenom   );
		
	// 	END $$
	
	// DELIMITER ;


	// exécuter la requête avec la focntion PHP
  	mysqli_query($bdd, $inserer);

	// fermeture de la connexion avec la base de données
  //mysqli_close($bdd);
	  $connect = null;
?>

<p>
	<h2 align='center'> Merci. Vos données sont bien insérées !!! </h2>

</p>

<!-- vérifiez dans la base si vos données sont bien insérées avec phphmyadmin -->
<p>
	<h1 align='center'>
		<a href='acceuil.html'> Retour au menu principal </a>
	</h1>
</p>
   

</body>
</html>