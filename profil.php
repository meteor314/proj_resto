<?php
session_start();
require('connect_db.php');
include 'navbar.html';
if(!empty($_GET['id']) AND $_GET['id'] >0) {


    $getid = intval($_GET['id']);
    $req = $db->prepare("SELECT * FROM member WHERE id = ?");
    $req->execute(array($getid));
    $userinfo = $req->fetch();

    if($req->rowCount() == 0)   {
       header("Location:erreur.php");
       exit();

    }




} else {
  header ('Location:erreur.php');
  exit();
}

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>


<!--https://dribbble.com/shots/2210153-Day-057-Twitter-Profile-->

<div class="container">

  <div class="card-profile">
    <div class="card-profile_visual"></div>

    <div class="card-profile_user-infos">
      <span class="infos_name"><?= $userinfo['pseudo'] ?></span>
      <span class="infos_nick">@<?= $userinfo['pseudo'] ?></span>

      <a href="https://twitter.com/meteor3141592" target="_blank"></a>
    </div>

    <div class="card-profile_user-stats">
      <div class="stats-holder">
        <div class="user-stats">
          <strong>Votre id</strong>
          <span><?= $userinfo['id']?></span>
        </div>
        <div class="user-stats">
          <strong>On peut sortir?</strong>
          <span>Non.</span>
        </div>
        <div class="user-stats">
          <strong>Pseudo</strong>
          <span><?=$userinfo['pseudo']?></span>
        </div>
      </div>
    </div>

  </div>

</div>

<?php include 'footer.html'; ?>




<style type="text/css">

@font-face {
  font-family: "ProximaNova-Regular";
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/ProximaNova-Regular.eot");
  src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/ProximaNova-Regular.eot?#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/ProximaNova-Regular.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/ProximaNova-Regular.ttf") format("truetype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/ProximaNova-Regular.svg#rocketdesign-font") format("svg");
  font-weight: normal;
  font-style: normal;
}
:root {
  font-size: 16px;
}

* {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  background: #222;
  font-family: 'ProximaNova-Regular', Helvetica neue, sans-serif;
}

.container {
  max-width: 350px;
  width: 100%;
  height: 600px;
  position: relative;
  margin: auto;
}

.card-profile {
  float: left;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 100%;
  height: 500px;
  border-radius: 10px;
  z-index: 1;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.card-profile:after {
  content: '';
  display: block;
  position: absolute;
  width: 100%;
  height: 100px;
  bottom: 0;
  box-shadow: 0 36px 64px -34px black, 0 16px 14px -14px rgba(0, 0, 0, 0.6), 0 22px 18px -18px rgba(0, 0, 0, 0.4), 0 22px 38px -18px black;
  -webkit-transform: scaleX(0.7) scaleY(1.3) translateY(-15%);
          transform: scaleX(0.7) scaleY(1.3) translateY(-15%);
  z-index: -1;
  opacity: 0.25;
}
.card-profile_visual {
  height: 350px;
  overflow: hidden;
  position: relative;

  background: linear-gradient(to bottom, #3b3c3f, #263d85, #172551);
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.card-profile_visual:before, .card-profile_visual:after {
  display: block;
  content: '';
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: 0;
  background: url(https://s1.qwant.com/thumbr/0x380/0/0/002491cb2801fa4760d285db1aebed591dc787d331363be42194941c4b8ecc/thinkstockphotos-481493125-100638928-large.jpg?u=https%3A%2F%2Fimages.techhive.com%2Fimages%2Farticle%2F2016%2F01%2Fthinkstockphotos-481493125-100638928-large.jpg&q=0&b=1&p=0&a=1) no-repeat center center/cover;
  opacity: 0.5;
  mix-blend-mode: lighten;
}
.card-profile_visual:before {
  -webkit-filter: grayscale(100%);
          filter: grayscale(100%);
}
.card-profile_visual:after {
  z-index: 2;
  mix-blend-mode: lighten;
  background: url(https://s1.qwant.com/thumbr/0x380/0/0/002491cb2801fa4760d285db1aebed591dc787d331363be42194941c4b8ecc/thinkstockphotos-481493125-100638928-large.jpg?u=https%3A%2F%2Fimages.techhive.com%2Fimages%2Farticle%2F2016%2F01%2Fthinkstockphotos-481493125-100638928-large.jpg&q=0&b=1&p=0&a=1);

  opacity: 1;
}
.card-profile_user-infos {
  position: absolute;
  z-index: 3;
  left: 0;
  right: 0;
  margin: auto;
  top: calc(68% - 100px);
  color: #fff;
  text-align: center;
}
.card-profile_user-infos a {
  width: 64px;
  height: 64px;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  background-color: #F96B4C;

  background-image: linear-gradient(#F96B4C, #F23182);
  display: block;
  clear: both;
  border-radius: 100%;
  top: calc(500% + 66px);
  box-shadow: 0 2px 0 #D42D78, 0 3px 10px rgba(243, 49, 128, 0.15), 0 0px 10px rgba(243, 49, 128, 0.15), 0 0px 4px rgba(0, 0, 0, 0.35), 0 5px 20px rgba(243, 49, 128, 0.25), 0 15px 40px rgba(243, 49, 128, 0.75), inset 0 0 15px rgba(255, 255, 255, 0.05);
  overflow: hidden;
}
.card-profile_user-infos a:after {
  content: '';
  font-style: normal;
  position: absolute;
  width: 100%;
  height: 100%;
  display: block;
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/icon-add-f.svg");
  background-repeat: no-repeat;
  background-size: 30%;
  background-position: center center;
  left: 0;
  top: 0;
}
.card-profile_user-infos .infos_name,
.card-profile_user-infos .infos_nick {
  display: block;
  clear: both;
  padding: .5em 0;
  padding-top: 0;
  position: absolute;
  width: 100%;
  text-align: center;
  font-size: 18px;
  top: 8px;
  font-weight: 800;
}
.card-profile_user-infos .infos_nick {
  top: 32px;
  font-size: 14px;
  font-weight: 300;
}
.card-profile_user-stats {
  background: #333;
  float: left;
  width: 100%;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}
.card-profile_user-stats .stats-holder {
  position: absolute;
  width: 100%;
  top: calc( 70% + 4em );
  display: -webkit-box;
  display: flex;
}
.card-profile_user-stats .user-stats {
  -webkit-box-flex: 1;
          flex: 1;
  text-align: center;
}
.card-profile_user-stats .user-stats strong {
  display: block;
  float: left;
  clear: both;
  width: 100%;
  color: #B3B1B2;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: -0.2px;
}
.card-profile_user-stats .user-stats span {
  color: #5E5E5E;
  padding: .18em 0;
  display: inline-block;
}

</style>
