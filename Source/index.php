<html>
	<head>
		<meta charset="utf-8">
		<title>VideoTech</title>
	</head>
	<body id="ID">
		<?php
		
			$host = "localhost"; $user="root"; $passwd="root"; $base="VideoTech"; $table="GENRE";
			$conn = mysqli_connect($host,$user,$passwd, $base);
			
			if(mysqli_connect_errno()){
				echo "Erreur de connexion a MySQL: " . mysqli_connect_errno();
				exit(0);
			}
			
			$query = "SELECT * FROM $table";
			$result = mysqli_query($conn, $query) or die("Echec de requête3"); 
		?>
	
		<!-- Partie a affichée en cliquant sur un onglet ou autre avec transition smooth, ... -->
	
        <form action="connexion.php" method="post">
		    <input name="titre" required placeholder="Titre du film..." />
		    <input name="duree" required placeholder="Durée (en min)..." />
		    <select name="genre">
		    	<?php
    				while ($ligne=mysqli_fetch_array($result)) {
						echo "<option value='".$ligne['GENRE_Libelle']."'>".$ligne["GENRE_Libelle"]."</option>";
					}
					
					mysqli_free_result($result);
					mysqli_close($conn);
		    	?>
		    </select>
		    
		<!-- --------------------------------------------------------------------------------- -->
		
		
        </form>
	</body>
</html>
