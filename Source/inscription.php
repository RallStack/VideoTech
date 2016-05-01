<html>
	<head>
		<meta charset="utf-8">
		<title>VideoTech</title>
	</head>
	<body id="ID">
		<?php $Pseudo = $_POST['psd']; $Password = $_POST['mdp']; $Mail = $_POST['email']; ?>
	
        <form action="#" method="post">
		    <input type="pseudo" name="psd" required placeholder="Pseudo..." />
		    <input type="password" name="mdp" required placeholder="Mot de passe..." />
		    <input type="email" name="email" required placeholder="Adresse mail ..." />
		    <input type="submit" value="Inscription" />
        </form>
        
        
        <?php
        	if (isset($Pseudo) && isset($Password) && isset($Mail)) {
				$host = "localhost"; $user="root"; $passwd="root"; $base="VideoTech"; $table="USER";
				$conn = mysqli_connect($host,$user,$passwd, $base);

				if(mysqli_connect_errno()){
					echo "Erreur de connexion a MySQL: " . mysqli_connect_errno();
					exit(0);
				}
	
				$query = "SELECT * FROM $table WHERE USER_Pseudo = '$Pseudo' OR USER_Mail = '$Mail'";
				$result = mysqli_query($conn, $query) or die("Echec pseudo");
	
				$ligne=mysqli_fetch_array($result);
	
				if ($ligne["USER_Pseudo"] == $Pseudo) {
					echo "<p>Pseudo deja existant</p>";
				}
				else if ($ligne["USER_Mail"] == $Mail) {
					echo "<p>Mail deja existant</p>";
				}
				else {
				 	$query = "INSERT INTO $table VALUE (NULL,'$Pseudo', '$Mail', '$Password')";
					$result = mysqli_query($conn, $query) or die("Echec de l'ajout");   
					echo "<p>Inscription réussite : <a href = './connexion.html'>Page de connexion</a></p>";
				}
	
				mysqli_free_result($result);
				mysqli_close($conn);
        	}
		?>
	</body>
</html>
