<!DOCTYPE html>
<html lang="en">
<head>
	<title>Elecciones CEI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
	<script src="https://kit.fontawesome.com/de9ac8cf2a.js" crossorigin="anonymous"></script>


</head>
<body>
	
	<div class="limiter">

		<div class="container-login100">

			<div class="" style="background: white; border-radius: 12px; padding: 10px;">


					<?php 

						include_once 'conexion.inc.php';
						$usuar = $_GET['id'];
						$current = $_GET['idcurrent'];

						echo '<h1>Información del Frente registrado por: '.$usuar.'</h1>';

						$obtiene = "SELECT * FROM frente x, usuario y WHERE y.User = '$usuar' AND y.IdUser = x.IdUs ";
						$respu = mysqli_query($conn, $obtiene);
						$frente = mysqli_fetch_array($respu);

						$cargos = json_decode($frente["Candidatos"], true);
						$carnets = json_decode($frente["CI"], true);
						$registros = json_decode($frente["Ru"], true);
						
						echo '<table class="table table-bordered table-striped" width="100%">

						<tbody>';
								echo '<br>';
								echo '<tr>
									<th scope="col">Nombre</th>
      								<td>'.$frente["Nombre"].'</td>
									</tr>';

								echo '<tr>
									<th scope="col">Sigla</th>
      								<td>'.$frente["Siglas"].'</td>
									</tr>';

								echo '<tr>
									<th scope="col">Presidente</th>
      								<td>'.$cargos[0].'</td>
      								<th scope="col">CI</th>
      								<td>'.$carnets[0].'</td>
      								<th scope="col">RU</th>
      								<td>'.$registros[0].'</td>
									</tr>';

								echo '<tr>
									<th scope="col">VicePresidente</th>
      								<td>'.$cargos[1].'</td>
      								<th scope="col">CI</th>
      								<td>'.$carnets[1].'</td>
      								<th scope="col">RU</th>
      								<td>'.$registros[1].'</td>
									</tr>';
								echo '<tr>
									<th scope="col">Secretario</th>
      								<td>'.$cargos[2].'</td>
      								<th scope="col">CI</th>
      								<td>'.$carnets[2].'</td>
      								<th scope="col">RU</th>
      								<td>'.$registros[2].'</td>
									</tr>';

							echo '</tbody>
						</table>';


					?>

					<form action="procesa.php" method="GET">
						<div style="padding-left: 50px; padding-right: 50px; padding-top: 20px; padding-bottom: 20px;">
						<div style="background: #493073; border:solid 10px #ccc; border-radius:15px;">
						
						<textarea name="comentario" class="form-control" rows="3" placeholder="Ingrese un comentario sobre el trámite"></textarea>
						</div>	

						</div>

						<div class="btn-toolbar" style="padding-left: 20px; padding-right: 50px; padding-top: 20px; padding-bottom: 20px;">


									<input type="hidden" value="<?php echo $usuar; ?>" name="usuarioac">
									<input type="hidden" value="<?php echo $current; ?>" name="current">
									<input type="hidden" value="<?php echo $frente['IdFrente']; ?>" name="frente">

							    	<a href="" class="btn btn-warning">
							    		<i class="fas fa-arrow-left text-white"></i>
							    		<input class="btn-warning text-white" type="submit" name="Volver" value="Volver">
							    	</a>
							    	&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-success" class="btn btn-success">
							    		<i class="far fa-check-square"></i>
							    		<input class="btn-success text-white" type="submit" name="Aceptar" value="Aceptar">
							    	</a>
							    	&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-danger">
							    		<i class="fas fa-trash-alt"></i>
							    		<input class="btn-danger" type="submit" name="Rechazar" value="Rechazar">
							    	</a>
						</div>

					</form>

						

					
					
					
			</div>
		</div>
	</div>
	

</body>
</html>