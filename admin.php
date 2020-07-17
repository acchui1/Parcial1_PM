<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif ($_SESSION['rol']==2) {
	header("Location:index2.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Programacion Multimedial</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  </head>
<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
<div class="container">
<header class="header">
<div class="row">
	<?php
	include("include/cabecera.php");
	?>
</div>
</header>

<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li class=""><a href="admin.php">ADMINISTRADOR DEL SITIO</a></li>
		</ul>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['nombre'];?></strong> </a></li>
			  <li><a href="desconectar.php"> Cerrar Cesión </a></li>			 
		</ul>
	  </div>
	</div>
  </div>
</div>

<!-- ==========================         SOLUCION PREGUNTA 2             ======================================================== -->
<div class="row">
	<div class="span12">
		<div class="caption">
		<h2> Pregunta Nro 2 del Parcial INF-324</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Tabla de Estudiantes Aprobados por Departamento (Vista convencional)</h4>
		<div class="row-fluid">
		
			<?php

				require("connect_db.php");
				$sql=("select (case 
					when a.cod_residencia like 'LP' then 'La Paz'
					when a.cod_residencia like 'CB' then 'Cochabamba'
					when a.cod_residencia like 'SC' then 'Santa Cruz'
					when a.cod_residencia like 'BE' then 'Beni'
					when a.cod_residencia like 'OR' then 'Oruro'
					when a.cod_residencia like 'PO' then 'Potosi'
					when a.cod_residencia like 'TJ' then 'Tarija'
					when a.cod_residencia like 'CH' then 'Chuquisaca'
					when a.cod_residencia like 'PN' then 'Pando'
					end) Departamento,count(a.cod_residencia) Aprobados
					from (SELECT ci,cod_residencia
					from identificador) as a, notas as n
					where a.ci like n.ci
					and n.nota >= 51
					group by a.cod_residencia");
	
				$query=mysqli_query($mysqli,$sql);
				echo "<table border='1'; class='table table-hover';>";
					echo "<tr class='warning'>";
						echo "<td>Departamento</td>";
						echo "<td>Numero de aprobados</td>";
					echo "</tr>";
			?>
			  
			<?php 
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tr class='success'>";
				    	echo "<tr>";
						echo "<td>".$arreglo[0]."</td>";
						echo "<td>".$arreglo[1]."</td>";
						echo "</tr>";
						echo "<tr>";	
				}

				echo "</table>";

			?>
		  				
		</div>	
		<br/>
		<h4>Solución Tabla de Estudiantes Aprobados por Departamento (Vista horizontal)</h4>
		<div class="row-fluid">
		
			<?php
			require("connect_db.php");
				$sql=("select (case 
					when a.cod_residencia like 'LP' then 'La Paz'
					when a.cod_residencia like 'CB' then 'Cochabamba'
					when a.cod_residencia like 'SC' then 'Santa Cruz'
					when a.cod_residencia like 'BE' then 'Beni'
					when a.cod_residencia like 'OR' then 'Oruro'
					when a.cod_residencia like 'PO' then 'Potosi'
					when a.cod_residencia like 'TJ' then 'Tarija'
					when a.cod_residencia like 'CH' then 'Chuquisaca'
					when a.cod_residencia like 'PN' then 'Pando'
					end) Departamento,count(a.cod_residencia) Aprobados
					from (SELECT ci,cod_residencia
					from identificador) as a, notas as n
					where a.ci like n.ci
					and n.nota >= 51
					group by a.cod_residencia");
	
				$query=mysqli_query($mysqli,$sql);
				echo "<table border='1'; class='table table-hover';>";
				echo "<tr class='warning'>";
				echo "<th>Departamento</th>";
				while($arreglo=mysqli_fetch_array($query)){
					echo "<td>".$arreglo[0]."</td>"; 
				}
				echo "</tr>";
				$query=mysqli_query($mysqli,$sql);
				echo "<tr>";
				echo "<th>Numero de Aprobados</th>";
				while($arreglo=mysqli_fetch_array($query)){
					echo "<td>".$arreglo[1]."</td>";
				}
				echo "</tr>";
				echo "</table>";
			?>			
		</div>
		</div>
	</div>
	</div>
</div>
 
	</style>
  </body>
</html>