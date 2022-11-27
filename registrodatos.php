<?php  
include 'includes/conectaa.php';
//consulta para extraer datos Genero
$genero ="SELECT * FROM Genero";
$guardar = $conecta->query($genero);
$mensaje ="";
//validar que exista un boton enviar
if (isset($_POST['Registro'])) {
	$nombre = $conecta->real_escape_string($_POST['nombre']);
	$apellido1 = $conecta->real_escape_string($_POST['ApellidoP']);
	$apellido2 = $conecta->real_escape_string($_POST['ApellidoM']);
	$genero = $conecta->real_escape_string($_POST['Genero']);
	$email = $conecta->real_escape_string($_POST['Email']);
	$idt = "1";
	$user = $conecta->real_escape_string($_POST['Usuario']);
	$pass = $conecta->real_escape_string(md5($_POST['Password']));
	//consulta para insertar datos
	$insertar = "INSERT INTO Usuarios (Nombre, ApellidoP , ApellidoM, Id_Genero, Email, Id_Tusuario, Nick, Password) VALUES('$nombre','$apellido1','apellido2','genero','$email','$idt','$user','$pass')";
	$guardando = $conecta->query($insertar);
	if ($guardando > 0) {
		$mensaje.="<h5 class='text-succes text-center'> Tu registro se realizo con exito</h5>";
	}
	else{
		$mensaje.="<h5 class='text-danger text-center'> Tu registro no se realizo con exito</h5>";
	}
}

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
	<title> Informacion de la BD </title>
</head>
<body>
		<div class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h4 class="text-center"> Informacion de la Base de Datos</h4>
				<form class="" action="<<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
					<input type="text" name="ApellidoP" placeholder="Apellido Paterno" class="form-control" required>
					<input type="text" name="ApellidoM" placeholder="Apellido Materno" class="form-control" required>
					<select class="form-control" name="genero">
						<option value="">Selecciona un genero</option>
						<?php while ($row = $guardar->fetch_assoc()){?>
							<option value="<?php echo $row['Id_Genero']; ?>"><?php echo $row['NomGenero'];?></option>
						<?php }?>
					</select>
					<input type="email" name="Email" placeholder="Email" class="form-control" required>
					<input type="text" name="Usuario" placeholder="Usuario" class="form-control" required>
					<input type="password" name="Password" placeholder="Password" class="form-control" required>
					<input type="submit" name="Registra" value="Registra" class="btn btn-conter btn-block btn-success">
				</form>
		</div>
		<?php echo $mensaje; ?>
	</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/preloader.js"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist7aos.js"></script>
</body>
</html>