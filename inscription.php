<?php
session_start();
require('connect_db.php');
if(!empty($_SESSION['id'])) {
	header("Location:profil.php?id=" . $_SESSION['id'] );
}

function secure($n){
	$n = htmlspecialchars($n);
	$n = stripcslashes($n);
	$n = strip_tags($n);
	$n = trim($n);
	return $n;
}
if(isset($_POST['submitBtn'])) {
	if(!empty($_POST['userName']) AND !empty($_POST['email']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd2']) AND !empty($_POST["birthDay"]) ) {

	 $brithDay = secure($_POST['brithDay']);
	 $email = secure($_POST['email']);
	 $userName = secure($_POST['userName']);
	 $pwd = ($_POST['pwd']);
	 $pwd2 = ($_POST['pwd2']);

   if(preg_match("#^[a-z0-9._-]+@[a-z]{3,}+\.[a-z]{2,5}$#i", $email)) { // verfication e-mail.
	  		if(preg_match("#^[a-z0-9-_.]{2,}$#i", $userName)) {//alpha numeric name
	  			if($pwd2 == $pwd ) {
	  				if(strlen($pwd) >7 ) { //password length gather then 7
							// hash password
	  					$option = [
		  					'cost' => 11,
		  				];
		  				$pwd = password_hash($pwd2, PASSWORD_BCRYPT, $option);
		  				if(strlen($email) < 27 || strlen($userName)  < 15) {
		  					$request = $db->prepare("SELECT * FROM member WHERE email = ?");
		  					$request->execute(array($email));
		  					$answer =  $request->rowCount();

		  					if($answer == 0) { // if the mail doesn't exist in our database
		  						if(isset($_POST['checkbox'])) { //our policies.
		  							  $insert  = $db->prepare("INSERT INTO member (pseudo, email, pwd, date_time_register, vide) VALUES (?,?,?,CURDATE(), ?)");
			  							$insert->execute(array($userName, $email, $pwd,0));
			  							$_SESSION['email'] = $email;
					            header('Location: profil.php?id='.$_SESSION['id']);
		  						} else {
		  							$error = "Avez-vous accepté la condition générales d'utilisation ?";
		  						}
		  					} else {
		  						$error =  "Ce mail est déjà utilisé! ";
		  					}
		  				} else {
		  					$error = " Votre mail ou votre pseudo n'est pas valide";
		  				}

	  				} else {
	  					$error = "Les deux mots de passses doivent être identiques et contenir  plus de 6 caractère! ";
    				}


	  			} else {
	  				$error = "Les deux mots de passses doivent être identiques et contenir  plus de 6 caractère! ";
	  			}

	  		} else {
	  			$error = "Votre pseudo ne doit contenir uniquement des caractères alphanumériques !";
	  		}

  	    } else {
  	 		$error =" Votre mail n'est pas valide ! " ;
  	    }

  	} else {
  		$error = "Veuillez remplir tous les champs ! ";
  	}
}



?>
<html>
<head>
	<link rel="stylesheet" href="css/form.css">
	<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
		 <h4>Connexion</h4>
		 <p>A notre super site.</p>
  </div>

			<form method="POST" action="#" enctype="multipart/form-data" id='login-form' class="form">
        <div class="input-group">
					<input type="text" name="userName" id="userName" placeholder= "" value="<?php if(isset($_POST['userName'])) echo $_POST['userName'];?>" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Name</label>
        </div>

        <div class="input-group">
          <input type="text"  placeholder="" name="email" class= "email" autocomplete="off" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" required>
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

				 <div class="input-group">
						 <input type="password" name="pwd2" id="pwd2" type="text" required>
						 <span class="highlight"></span>
						 <span class="bar"></span>
						 <label>Passowrd (confirmation)</label>
					</div>

					<div class="input-group">
							 <input type="text" name="birthDay" id="birthDay" placeholder="DD/MM/YYYY" required>
							 <span class="highlight"></span>
							 <span class="bar"></span>
							 <label>Date de naissance</label>
					</div>
					<div class="input-group">
 	 				    <input type="checkbox" name="checkbox" id="checkbox">
									<label class="checkbox">J'accepte les conditons générales d'utilisation.</label>

 	 				 </div>

		  	 <button type="submit" class="login-btn btn" name="submitBtn" id='submitBtn'><span> Envoyer </span></button>
		  	 <p> Déjà un compte <a href="connexion.php" style="color: #fff;"> Connectez-vous</a></p>
	     <hr>
	     <div class="footer">
		       Follow <a href="https://twitter.com/meteor3141592">@meteor314</a> on Twitter
		 </div>


      </form>





<br>
	<?php
		    	if(isset($error)) {
		    		?>
		    		  <script>alert("<?= $error?>");</script>

		    		<?php
		    	}
		    ?>
</body>
		<!-- #script js  -->
		<script>
			// validate format date !
			$("#birthDay").on('keydown', function (event) {
				if(event.which != 8) {//backspace !
					var getCurrentChar = event.target.value.length;
					if(getCurrentChar ==2 || getCurrentChar == 5) { //add slash after dd/ and MM/
						var birthDay =  this.value;
						birthDay+="/";
						this.value = birthDay;


					}
				}

			})
	/*	newInput.addEventListener('keydown', function( e ){
		    if(e.which !== 8) {
		        var numChars = e.target.value.length;
		        if(numChars === 2 || numChars === 5){
		            var thisVal = e.target.value;
		            thisVal += '/';
		            e.target.value = thisVal;
		        }
		    }
		});
*/
			</script>
</div>
</html>
