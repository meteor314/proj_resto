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

    if(!empty($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
        echo ("ok");
    else 
        header('Location:connexion.php?admin='.$_SESSION['admin'] . "ok");

    // commande en cours
    $request =  $db->prepare("SELECT *  FROM Commande WHERE isConfirm  =  ? ");
    $request->execute(array(0));
    $progress = $request->rowCount() ;

   

    echo ("Bonjour Administraeur! <br> Actuellement il y a " . $progress .   " en cours de traitement" );
    while($commande =  $request->fetch()) {
        ?>
        <p> Nom :  <?=$commande['nom']?><br> 
        email :  <?=$commande['email']?><br>
        Le nombre de plat  : <?=$commande['nbCount']?>
        <button onclick="sendEmail();"> Valider cette commande </button>
        <script>
            function sendEmail() {
                location.href='../e-mail.php?email=<?=$commande["email"]?>';

            }

        </script>
        <?php
    }
    ?>

    

