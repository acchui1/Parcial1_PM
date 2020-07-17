<?php

	$realname=$_POST['realname'];
	$ci=$_POST['usuario'];
	$fnac=$_POST['fnacimiento'];
	$dept=$_POST['departamento'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];

	require("connect_db.php");

	$checkeci=mysqli_query($mysqli,"SELECT * FROM identificador WHERE ci='$ci'");
	$check_ci=mysqli_num_rows($checkeci);
		if($pass==$rpass){
			if($check_ci>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el ci designado para un usuario, verifique sus datos");</script> ';
			}else{

			    mysqli_query($mysqli,"INSERT INTO identificador VALUES('$ci','$realname','$fnac','$dept')");
				mysqli_query($mysqli,"INSERT INTO usuario VALUES('','$ci','$pass','','2','SteelBlue')");
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>