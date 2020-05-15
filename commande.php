<?php
	session_start();
	require('connect_db.php');
	include 'navbar.html';
	if(empty($_SESSION['id'])){
		header('Location:index.html');
	}



?>

<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script  src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="  crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:Condensed" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type='text/css'>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>

</head>
<body>

<!-- Pop up modal -->

<!-- Modal -->
<div style="margin:auto; max-width :100px;">
	<a href="#myModal"  class="btn btn-primary" data-toggle="modal" style="align:center;">Commander un plat! </a>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"style="margin-top : 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Merci de nous avoir choisi !</h4>
		<form method="POST" action="#" enctype="multipart/form-data" id='login-form' class="form">
	       <div class="input-group">
	          
			  <label>Nombre de personne : </label>
			  <input type="number" style="padding :17Px; width:500px" id="nbCount" placeholder="Veuillez choisir le nombre de personne." max="10" min="0" name="nbCount" value="1" required>
	          <span class="highlight"></span>
			  <span class="bar"></span>
			  <h4 id="price"> </h4>
	        </div>
      </div>
      <div >
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         
      </div>
    </div>
  </div>
</div>

<div id="container">
	<div class="whole">
	<div class="type">
		<p>Simple</p>
		</div>
	<div class="plan">

		<div class="header">
			<span>€</span>25<sup>99</sup>
			<p class="month">pour une personne</p>
		</div>
		<div class="content">
			<ul>
				<li>Un plat</li>
				<li>Une entrée</li>
				<li>Un dessert</li>
				<li>Du vin ou de la bière</li>
			</ul>

		</div>

		<div class="price" style = "  background : #eac80d;">
      <a href="#" class="bottom"><p class="cart">J'achète !</p></a>
		</div>
	</div>
</div>
	<div class="whole">
		<div class="type standard" >
		<p>Couple</p>
		</div>
	<div class="plan">

		<div class="header">
			<span>€</span>49<sup>99</sup>
			<p class="month">pour 2 personnes.</p>
		</div>
		<div class="content">
			<ul>
				<li>2 plats</li>
				<li>2 entrées</li>
				<li>2 desserts</li>
				<li>Du vin et de la bière</li>
			</ul>
		</div>
		<div class="price" style= "background: #18937b">
      <a href="#" class="bottom"><p class="cart">J'achète !</p></a>
		</div>
	</div>
</div>

	<div class="whole ">
		<div class="type ultimate">
		<p>La famille</p>
		</div>
	<div class="plan">

		<div class="header">
			<span>€</span>70<sup>99</sup>
			<p class="month">pour trois personnes</p>
		</div>
		<div class="content">
			<ul>
				<li>3 plats</li>
				<li>3 entrées</li>
				<li>3 desserts</li>
				<li>Du vin et de la bière + un cadeau.</li>
			</ul>
		</div>
		<div class="price" style= "background : indigo">
      <a href="#" class="bottom"><p class="cart">J'achète !</p></a>
		</div>
	</div>
</div>


</body>
</html>

<script>

	(function(){
		var nbCount  = parseInt((document.getElementById('nbCount').value));
		if(typeof(nbCount)=="number") {
			if(nbCount >=1 && nbCount <=10)  {
				var price = nbCount * 24 -nbCount;
				document.getElementById("price").innerHTML="Le prix de vos plats vous coute : " + price;			
			}else{
				document.getElementById("price").innerHTML=("10 personnes maximum  ! " );
			}
		} else {
			document.getElementById("price").innerHTML="Veuillez entrer un nombre !";
		}
		
		setTimeout(arguments.callee, 500);
	})();

</script>


<style media="screen">
  body{
	font-family:'Open Sans';
    font-style:condensed;
     background: #000; /* Old browsers */
      /*background: radial-gradient(ellipse at center,  #5b2072 0%,#5d1566 50%,#251a41 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5b2072', endColorstr='#251a41',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
}

a{
	font-size: 18px;
	font-family:'Open Sans';
    color: white;
    text-decoration: none;

}

input:focus,textarea:focus,select:focus{
  border:1px solid #fafafa;
  -webkit-box-shadow:0 0 6px #007eff;
  -moz-box-shadow:0 0 5px #007eff;
  box-shadow:0 0 5px #007eff;
  outline: none;
}

sup{

	font-size: 40px;
}

ul{
	list-style: none;
	font-size: 15px;
	font-family:'Open Sans';
	color: #9095aa;
	padding: 0px;
	margin: 0px;


}


li{
border-bottom: 1px solid #494a5a;
padding: 0px;
margin: 0px;
text-align: center;
height: 52px;
line-height: 52px;
}


#container{
	width: 100%;
  text-align:center;
  margin-top : 60px;
}

.whole{
	display: inline-block;
  margin : 0px 17px;

}



.type{
	width: 300px;
	border-radius: 5px 5px 0px 0px;
	background-color: #eac80d;
	height: 62px;
	border-bottom: 3px solid #bfa30c;

}

.type p{
	font-family:'Open Sans';
    font-weight: 800;
	font-size: 29px;
	text-transform: uppercase;
	color: white;
	text-align: center;
	padding-top: 10px;



}

.plan{
	width: 300px;
	background-color: #2b2937;

	border-radius: 0px 0px 5px 5px;
    font-family:'Open Sans';
    font-style:condensed;
    font-size: 90px;
    color: white;
    text-align: center;


}
.standard{
	background-color: #1abc9c;
	border-bottom: 3px solid #18937b;
}

.ultimate{
	background-color: #5d6a9a;
	border-bottom: 3px solid #474f6f;
}





.header{
	border-bottom: 1px solid #494a5a;
	padding-bottom: 39px;


}

.header span{
	font-size: 32px;


}

.month{
	font-size: 14px;
	color: #575757;
	padding: 0px;
	margin: -10px;
}

.price{
	height:80px;
}

.cart{

  color:white;
  position: relative;
  top: 16px;


}

.bottom{


}

.content{
}

.login_c{
  width:500px;
  background-color:#2b2937;
  height:300px;
  margin: 0 auto;
  margin-top:40px;
  border-radius:5px;

}

.login_c input{
  width: 350px;
height: 40px;
  border: 1px solid #494a5a;
  margin-bottom:20px;
  border-radius:5px;
  padding-left: 10px;

}


.login{
  background-color: #BC4B1A;
	border-bottom: 3px solid #7C3618;
  width:100%;

}

.top{
  margin-top:35px;
}

.nodisplay{
  opacity: 0.1;
}

.selected{
  background-color:#1F1B36;
  margin:0px;
  padding:0px;
}

</style>

<?php
if(empty($_SESSION['id'])){
	header :"Location :erreur.php";
}
include 'footer.html';
 ?>
