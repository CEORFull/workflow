<?php


	 include_once 'conexion.inc.php';

	$cons ="SELECT * FROM tramite WHERE Startuser = '$usuario'";
	$resu = mysqli_query($conn, $cons);
	$tra = mysqli_fetch_array($resu);

?>

<!DOCTYPE html>
<html lang="en">

<body>
	
	<div class="limiter">

		

			<div class="wrap-login100">

				
				<?php 

					echo '<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
					</div>

					<div>
						<h1 style="padding-left: 130px;">
							Su trámite ha sido aprobado!
						</h1>
						<h2 style="padding-left: 40px; padding-bottom: 30px;">
							Para continuar con el pago de click en siguiente.
						</h2>
					</div>';

					if($tra['Comentario'] != '')
					{
						echo '<h3 style="padding-left: 40px; padding-bottom: 30px;">
							El administrador dice: '.$tra['Comentario'].' 
						</h3>';
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

