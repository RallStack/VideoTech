<html>
	<head>
		<meta charset="utf-8">
		<title>VideoTech</title>
	</head>
	<body id="ID">
	
		<?php $Pseudo = $_POST['psd']; $Password = $_POST['mdp']; ?>
	
        <form action="connexion.php" method="post">
		    <input type="pseudo" name="psd" required placeholder="Pseudo..." />
		    <input type="password" name="mdp" required placeholder="Mot de passe..." />
		    <input type="submit" value="Connexion" />
        </form>
        
        <?php
        
		    if (isset($Pseudo) && isset($Password)) {
				$host = "localhost"; $user="root"; $passwd="root"; $base="VideoTech"; $table="USER";
				$conn = mysqli_connect($host,$user,$passwd, $base);

				if(mysqli_connect_errno()){
					echo "Erreur de connexion a MySQL: " . mysqli_connect_errno();
					exit(0);
				}
	
				$query = "SELECT * FROM $table WHERE USER_Pseudo = '$Pseudo' AND USER_Password = '$Password'";
				$result = mysqli_query($conn, $query) or die("Echec pseudo");
	
				$ligne=mysqli_fetch_array($result);
	
				if ($ligne["USER_Pseudo"] == $Pseudo && $ligne["USER_Password"]) {
					header("location: ./index.php");	
				}
				else {
					echo "<p>Pseudo ou Mot de passe invalide</p>";
				}
	
				mysqli_free_result($result);
				mysqli_close($conn);
		    }
		?>
        
        <a href="./inscription.php">Toujours pas de compte ? ...</a>
	</body>
</html>
