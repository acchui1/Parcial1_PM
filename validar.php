
<?php
	session_start();
	require("connect_db.php");
	$username=$_POST['usuario'];
	$pass=$_POST['pass'];

	//Validar al Usuario(Administrador)
	$sql2=mysqli_query($mysqli,"SELECT * FROM usuario WHERE ci='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['passwordadmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['ci'];
			$_SESSION['rol']=$f2['rol'];
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='admin.php'</script>";
		
		}
	}

    //Validar al Usuario(Estudiante)
	$sql=mysqli_query($mysqli,"SELECT * FROM usuario WHERE ci='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['password']){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['ci'];
			$_SESSION['rol']=$f['rol'];
			$sql3 =mysqli_query($mysqli,"SELECT nombre_completo FROM identificador WHERE ci='$username'");
			if($f3=mysqli_fetch_assoc($sql3)){
            $_SESSION['nombre']= $f3['nombre_completo'];
			}
			header("Location: index2.php");
		}else{
			echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
			echo "<script>location.href='index.php'</script>";
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='index.php'</script>";	

	}

?>