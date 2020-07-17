<!DOCTYPE html>

	<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
	}
	$user=$_SESSION['user'];
	?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Programacion Multimedial</title>
   
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  
<body data-offset="40"  >
<div class="container">
<header class="header">
<div class="row">
	<?php
		include("include/cabecera.php");
	?>
</div>
</header>
	<?php
		include("include/menu.php");
	?>
	<?php
	require("connect_db.php");
	$sql="select ci,color from usuario where ci like '$user';";
	$result=mysqli_query($mysqli,$sql);
	$fila=mysqli_fetch_array($result);                      
	$color=$fila[1];
	if(isset($_GET['color'])){
		$color=$_GET['color'];
		$sql="UPDATE usuario set color='$color' where usuario.ci='$user';";
		$result=mysqli_query($mysqli,$sql);
	}
	?>

<style>
body {
background-color: <?php echo $color ?>;
}
</style>
<style>
		#fotoperfil {
			background-repeat: no-repeat;
			width: 150px;
			height: 150px;
		}
</style>
<div class=fotoperfil align="center">
<img src="images/usuario.jpg">
</div>
<br>
<div align="center">
<h2> Solución pregunta Nro 1 del Parcial INF-324</h2>
</div>
<br>
<br>
<h4> Elige un color de tu preferencia para tu sesión </h4>
<div align="center">
<form method="get" action="" >
	<select name="color" >
	<option value="Crimson">Carmesi</option>
	<option value="LimeGreen">Verde Lima</option>
	<option value="Fuchsia">Fucsia</option>
	<option value="SteelBlue" >Azul Acero</option>
	<option value="YellowGreen">Amarillo Verdoso</option>
	</select>
	<input class="btn btn-primary" type="submit" value="Cambiar el Fondo"></td>
</form>
</div>
</body>
</html>