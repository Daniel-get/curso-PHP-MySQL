<?php 
session_start();
error_reporting(0);
//llamar a la conexion de la BD
include'includes/conectaa.php';
if (isset($_POST['Registro'])) {
	$ruser= $conecta->real_escape_string($_POST['usuario']);
$rpass= $conecta->real_escape_string(md5($_POST['pass']));
//generar una consulta que extraiga los datos de la BD
$consulta= "SELECT * FROM Usuarios WHERE Usuario = '$ruser' and Password = 'rpass'";
if ($resultado = $Cconecta->query($consulta)) {
	while ($row=$resultado->fetch_array()) {
		$userok = $row['Usuario'];
		$passwordok = $row ['Password'];
	}
 $resultado->close();

}
$conecta->close();
if (isset($ruser)  && isset($rpass)) {
	if ($ruser == $userok && $rpass == $passwordok) {
		$_SESSION['login'] = TRUE;
		$_SESSION['Usuario'] = $usuario;
		header("location:principal.php");
	}
	else{
		$mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                     <strong> Lo siento tus datos no son Correctos!! </strong> Verificalos.
                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                     <span aria-hidden='true'>&times;</span>
                     </button>
                     </div>";
	}
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
	<title>Login de Usuario</title>
</head>
<body>
	 <div class="container col-12 p-5 mt-5 ">

      <div class="row">
	<div class="container col-6 border shadow p-2">
					<h4 class="card-title text-center">VFAST | Login</h4>
					<hr>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post">
						<div class="form-grup">
							<div class="input-group">
								<label for="N_user" class="form-label mt-4 ms-5">Escribe tu  Usuario</label>
								<input type="text" class="form-control w-75 mx-auto"  name="usuario" placeholder="Ingresa tu Usuario">
							</div>
							<div class="input-group py-2">
								<label for="Password" class="form-label mt-4 ms-5"> Escribe tu Contraseña</label>
								<input type="password" class="form-control w-75 mx-auto"  name="pass" placeholder="Ingresa tu Contraseña">
							</div>
							<div class="row mx-auto text-center">
                    <div class="col mx-auto">
                        <a href="recuperar.html" target="_blank">Recuperar Contraseña </a>
                    </div>
                    <div class="col">
                        <a href="index2R.php" >Registrarse </a>
                    </div>
                      <input class="container" class="text-center" type="submit" name="Registro" value="Iniciar" class="btn btn-sm btn-block btn-succes">
                    </div>
						</div>
				</article>
			</div>
		</div>
		<?php echo mensaje; ?>
	</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/preloader.js"></script>
<script src="js/main.js"></script>
</body>
</html>