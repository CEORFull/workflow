<!DOCTYPE html>
<html lang="en">

<body>
	
	<div class="limiter">

		

			<div class="wrap-login100">

				
				<?php 

				include_once 'conexion.inc.php';
				mysqli_query($conn, "UPDATE tramite SET FechaFin = now() WHERE Startuser = '$usuario'");

				$us ="SELECT * FROM usuario WHERE User = '$usuario'";
				$res = mysqli_query($conn, $us);
				$rol = mysqli_fetch_array($res);

					echo '<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/pago_exitoso.jpg" alt="IMG">
					</div>

					<div>
						<h1 style="padding: 10px;">
							Su trámite ha concluido con éxito
						</h1>
						<h2 style="padding-left: 26px; padding-bottom: 30px;">
							Puede iniciar campaña desde el 1/1/2022
						</h2>
					</div>';
				
				

					
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

