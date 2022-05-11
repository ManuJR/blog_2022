<!DOCTYPE html>
<html>
<head>
	<title> Blog MVC en PHP </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

</head>
<body>


	<?php
		require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/navigator.php");
	?>

	<div class="container-fluid page">
  		<h1 class="text-center"> Regístrate en el Blog </h1>
  		<div class="row justify-content-center">
  			<div class="col-6">
  				<form action="<?= FOLDER ?>/signup" method="post">
  					<div class="form-group">
    					<label for="email_user">Correo</label>
					    <input type="email" class="form-control" id="email_user" name="email" >
					    <small id="correoHelp" class="form-text text-muted">Debe introducir un correo con el formato nombre@algo.com</small>
  					</div>
  					<div class="form-group">
    					<label for="password_user">Contraseña</label>
					    <input type="password" class="form-control" id="password_user" name="password">
					    <small id="correoHelp" class="form-text text-muted">La contraseña debe ser al menos de 6 caracteres</small>
  					</div>
  					<div class="form-group">
  						<input type="submit" name="signup" value="Registrar" class="btn btn-primary">
  					</div>
  				</form>
				<?php if( isset($error) ){ ?>
					<div class="alert alert-danger">
						<?= $error ?>
					</div>
				<?php } ?>
  			</div>
  		</div>
  	</div>

  		<!-- FOOTER -->
  	<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/modules/footer.php");

	?>


</body>
</html>