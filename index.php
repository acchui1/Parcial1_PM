<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
	<title>Programacion Multimedial</title>
</head>
<body background="images/fondotot.jpg" style="background-attachment: fixed" >
	<center><div class="tit"><h2 style="color: #0000FF; ">Inicio de sesión</h2>
		<center><div class="Ingreso">

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>
		<form action="validar.php" method="post">

		<table border="0">

		<tr><td><label style="font-size: 12pt"><b>Usuario: </b></label></td>
			<td width=80> <input class="form-group has-success" style="border-radius:15px;" type="text" name="usuario"></td></tr>
		<tr><td><label style="font-size: 12pt"><b>Contraseña: </b></label></td>
			<td width=80><input style="border-radius:15px;" type="password" name="pass"></td></tr>
		<tr><td></td>
			<td width=80 align=center><input class="btn btn-primary" type="submit" value="Aceptar"></td>
			</tr></tr></table>
		</form>
<br>
<!-- formulario registro -->

<form method="post" action="" >
  <fieldset>
    <legend  style="font-size: 18pt; color: #0000FF; "><b>Registro</b></legend>
    <div class="form-group">
      <label style="font-size: 12pt"><b>Ingresa tu nombre completo</b></label>
      <input type="text" name="realname" class="form-control" placeholder="Apellidos y nombres" />
    </div>
    <div class="form-group">
      <label style="font-size: 12pt;"><b>Ingresa tu número de carnet</b></label>
      <input type="text" name="usuario" class="form-control"  required placeholder="Sin extension"/>
    </div>
	<div class="form-group">
      <label style="font-size: 12pt"><b>Fecha de nacimiento</b></label>
      <input type="text" name="fnacimiento" class="form-control" required placeholder="dd/mm/aaaa" />
    </div>
	<div class="form-group">
      <label style="font-size: 12pt"><b>Departamento</b></label>
      <input type="text" name="departamento" class="form-control" required placeholder="LP-SC-OR-CB" />
    </div>
    <div class="form-group">
      <label style="font-size: 12pt;"><b>Ingresa tu Contraseña</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label style="font-size: 12pt"><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
    </div>
	
      
    </div>
   
    <input  class="btn btn-danger" type="submit"  name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>