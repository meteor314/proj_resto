<?php
session_start();
require('connect_db.php');

	function secure($n){
			$n = htmlspecialchars($n);
			$n = stripcslashes($n);
			$n = strip_tags($n);
			$n = trim($n);
			return $n;
	}

if(!empty($_SESSION['id'])) {
	  header('Location: profil.php?id='.$_SESSION['id']);
}

if(isset($_POST['submitBtn']) ) {
	if(!empty($_POST['email']) && !empty($_POST['pwd'])) {
	  	$email = secure($_POST['email']);
	  	$pwd = ($_POST['pwd']);

	  	$request =  $db->prepare("SELECT *  FROM member WHERE email  =  ? ");
	  	$request->execute(array($email));
	  	$userDefinded = $request->rowCount() ;

	  	if($userDefinded  ==  1) {
	  		$info = $request->fetch();
	  		var_dump($info);//($info);
		    if(password_verify($pwd, $info['pwd'])){
		        $userinfo = $request->fetch();
		          // confirm mail
			            $_SESSION['id'] = $info['id'];
			            $_SESSION['email'] = $info['email'];
			            $_SESSION['pseudo'] = $info['pseudo'];
			            header('Location: profil.php?id='.$_SESSION['id']);
			            $error ="ok!";
	       	}
		} else {
					$error = "Identifiants invalides!";
		}
	} else {
		$error = "Tous les champs sont obligatoires.";
	}

}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="css/form.css">
</head>
<body>

	<div class="main">
	  <div class="header">
	     <h4>Connexion</h4>
	     <p>A notre super site.</p>
	  </div>

				<form method="POST" action="#" enctype="multipart/form-data" id='login-form' class="form">
	       <div class="input-group">
	          <input type="email"  placeholder="" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" required>
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