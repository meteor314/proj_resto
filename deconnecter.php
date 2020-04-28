<?php
  session_start();
  $_SESSION = array(); // unset all session value
  session_destroy();
  header("Location:connexion.php");
