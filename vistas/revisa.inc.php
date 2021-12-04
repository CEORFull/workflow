<!DOCTYPE html>
<html lang="en">

<body>
	
	<div class="limiter">

		

			<div class="wrap-login100">

				
				<?php 

				include_once 'conexion.inc.php';

				$us ="SELECT * FROM usuario WHERE User = '$usuario'";
				$res = mysqli_query($conn, $us);
				$rol = mysqli_fetch_array($res);

				if($rol['Rol'] == 'po')
				{
					echo '<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
					</div>

					<div>
						<h1 style="padding: 10px;">
							Su trámite está siendo revisado
						</h1>
						<h2 style="padding-left: 90px; padding-bottom: 30px;">
							Por favor, ingrese más tarde
						</h2>
					</div>';
				}
				else
				{
					$tra ="SELECT * FROM tramite WHERE Estado = '0' OR Estado = '2'";
					$r = mysqli_query($conn, $tra);

					echo '<table class="table table-bordered table-striped" width="100%">
						<thead>
							<tr>
								<th> Nro Trámite </th>
								<th> Flujo </th>
								<th> Proceso </th>
								<th> Creador </th>
								<th> Editando </th>
								<th> Estado </th>

							</tr>
						</thead>
						<tbody>';
							foreach ($r as $key => $value) 
							{
								echo '<tr>
									<td>'.$value["IdTramite"].'</td>
									<td>'.$value["CodFlujo"].'</td>
									<td>'.$value["DesProceso"].'</td>
									<td>'.$value["Startuser"].'</td>
									<td>'.$usuario.'</td>
									<td>'.$value["Estado"].'</td>
									<td>
										<div class="btn-group">
											<a href="ver.php?id='.$value["Startuser"].'&idcurrent='.$usuario.'" class="btn btn-success">
												<i class="fas fa-eye text-white"> Revisar</i>
											</a>
										</div>
									</td>
								</tr>';
							}
						echo '</tbody>
					</table>';
				}

					
				 ?>
				
			</div>

	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>

