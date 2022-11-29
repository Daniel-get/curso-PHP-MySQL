<?php  
include 'includes/conectaa.php';
// consulta
$consulta = "SELECT * FROM Usuarios";
$guardar = $conecta->query($consulta);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
	<link rel="stylesheet" type="text/css" href="css/preloader.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://upkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="js/jquery-3.5.1.min.js"></script>
	<title> Tabla con Base de Datos</title>
</head>
<body>
	   <div class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h3 class="text-center"> Tabla Dinamica con la Base de Datos </h3>
				<div class="table-responsive table-hover" id="TablaConsulta">
					<table class="table">
						<thead class="text-muted">
							<th class="text-center"> Nombre </th>
							<th class="text-center"> Apellido Paterno </th>
							<th class="text-center"> Apellido Materno </th>
							<th class="text-center"> Genero </th>
							<th class="text-center"> Opciones </th>
						</thead>
						<tbody>
							<?php while($row = $guardar->fetch_assoc()){?>
							<tr>
								<td><?php echo $row['Nombre'] ?></td>
								<td><?php echo $row['ApellidoP'] ?></td>
								<td><?php echo $row['ApellidoM'] ?></td>
								<td><?php echo $row['Id_Genero'] ?></td>
								<td><a href="#">Editar </a>-<a href="#">Borrar</a></td>
							</tr>
						    <?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
