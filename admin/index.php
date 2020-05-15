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
        header('Location:erreur.php?admin='.$_SESSION['admin'] . "ok");
