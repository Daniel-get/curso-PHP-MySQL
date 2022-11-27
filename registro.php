<?php  
include 'includes/conectaa.php';
//consulta para extraer datos Genero
$genero ="SELECT * FROM Genero";
$guardar = $conecta->query($genero);
//validar que exista un boton enviar
if (isset($_POST['Registro'])) {
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apell'];
	$genero = $_POST['genero'];
	$email = $_POST['correo'];
	$user = $_POST['user'];
	$pass = $_POST['contra'];

	$conin ="INSERT INTO  sesion ( `Nombre`, `Apellidos`, `Genero`, `Correo`, `User`, `Contraseña`) VALUES ('$nombres','$apellidos','$genero','$email','$user','$pass')";
    $guarcon = $connect->query($conin);

    if($guarcon){
        ?>
        <h3 class="ok"> Te has inscripto Correctamente</h3>
        <?php
    }else {
        ?>
        <h3 class="bad"> No te has inscripto correctamente</h3>
        <?php
    
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
	<title> Registro de Usuario</title>
</head>
<body>
		<div class="container col-6 border shadow p-2">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h4 class="text-center"> Registro VFAST</h4>
<!--Formulario-->
				<form class="" action="<<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<label for="Nombre" class="form-label mt-4 ms-5">Nombre(s)</label>
                    <input type="text" class="form-control w-75 mx-auto" id="Nombres" name="nombre" placeholder="Ingresa tu nombre" required>
                    <label for="Apeliidos" class="form-label mt-4 ms-5">Apellidos</label>
                    <input type="text" class="form-control w-75 mx-auto" id="Apellidos" name="apell" placeholder="Ingresa tus apellidos" required>
                    <label for="N_user" class="form-label mt-4 ms-5">Genero</label>
					<select class="form-control w-75 mx-auto" name="genero">
						<option value="">Selecciona un genero</option>
						<?php while ($row = $guardar->fetch_assoc()){?>
							<option value="<?php echo $row['Id_Genero']; ?>"><?php echo $row['NomGenero'];?></option>
						<?php }?>
					</select>
					<label for="Mail" class="form-label mt-4 ms-5">Correo Electronico</label>
                    <input type="email" class="form-control w-75 mx-auto" id="mail" name="correo" placeholder="name@example.com" required>
                    <label for="N_user" class="form-label mt-4 ms-5">User</label>
                    <input type="text" class="form-control w-75 mx-auto" id="nickname2" name="user" placeholder="Ingresa tu nombre de usuario" required>
                    <label for="Password" class="form-label mt-4 ms-5">Contraseña</label>
                    <input type="password" class="form-control w-75 mx-auto" id="password" name="contra" placeholder="Ingresa tu contraseña" required>
					<input class="container" class="text-center" type="submit" name="Registro" value="Registro" class="btn btn-sm btn-block btn-success">
				</form>
		</div>
	</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/preloader.js"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist7aos.js"></script>
</body>
</html>