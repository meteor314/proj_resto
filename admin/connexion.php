<?php
	session_start();
	/* =============== Data base connexion =============*/
	try {
		$db =new PDO("mysql:host=localhost;dbname=proj_resto",'root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	function secure($n){
			$n = htmlspecialchars($n);
			$n = stripcslashes($n);
			$n = strip_tags($n);
			$n = trim($n);
			return $n;
	}

if(isset($_POST['submitBtn']) ) {
	if(!empty($_POST['email']) && !empty($_POST['pwd'])) {
	  	$email = secure($_POST['email']);
	  	$pwd = ($_POST['pwd']);

	  	$request =  $db->prepare("SELECT *  FROM administrateur WHERE email  =  ? ");
		  $request->execute(array($email));
	      $userDefinded = $request->rowCount() ;
	
	  	if($email  ==  "admin") {
			echo($email);
	  		$info = $request->fetch();
	  		//var_dump($info);//($info);
		    if($pwd == "admin") {
		        $userinfo = $request->fetch();
		          // confirm mail
			            $_SESSION['admin'] = $info['admin'];
			            $_SESSION['email'] = $info['email'];
			            $_SESSION['pseudo'] = $info['pseudo'];
			            header('Location:index.php?admin='.$_SESSION['admin'] . "ok");
						$error ="ok!";
						$_SESSION['isAdmin']=1;
	       	}
		} else {
					$error = "Identifiants invalides!";
					$_SESSION['isAdmin']=0;
		}
	} else {
		$error = "Tous les champs sont obligatoires.";
	}

}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="../css/form.css">
</head>
<body>

	<div class="main">
	  <div class="header">
	     <h4>Connexion - Administrateur.</h4>
	     <p>Réserver au membre ! </p>
	  </div>

				<form method="POST" action="#" enctype="multipart/form-data" id='login-form' class="form">
	       <div class="input-group">
	          <input type="text"  placeholder="" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" required>
	          <span class="highlight"></span>
	          <span class="bar"></span>
	          <label>Email</label>
	        </div>

					<div class="input-group">
					    <input type="password" name="pwd" id="pwd" type="text" required>
					    <span class="highlight"></span>
					    <span class="bar"></span>
					    <label>Passowrd</label>
					 </div>

					 <button type="submit" class="login-btn" name="submitBtn" id='submitBtn'><span> Envoyer </span></button>
				<p> Pas encore de compte <a href="inscription.php" style="color :#fff"> inscrivez-vous</a></p>
				</form>
		

			<?php
		    	if(isset($error)) {
		    		?>
		    		  <script>alert("<?= $error?>");</script>

		    		<?php
		    	}
		    ?>


		<div class="footer">
	 	      Follow <a href="https://twitter.com/meteor3141592">@meteor314</a> on Twitter
	 	</div>
</div>