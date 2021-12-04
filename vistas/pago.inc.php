<?php


	 include_once 'conexion.inc.php';

	//$cons ="SELECT * FROM tramite WHERE Startuser = '$usuario'";
	//$resu = mysqli_query($conn, $cons);
	//$tra = mysqli_fetch_array($resu);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" type="text/css" href="pago.css">
</head>
<body>
	
	<div class="limiter">

			<div class="wrap-login100">


				<?php 


				?>
				    
				        <div class='credit-info'>
				          <div class='credit-info-content'>
				            <table class='half-input-table'>
				              <tr><td>Seleccione su tarjeta </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
				                <div class='dropdown-select'>
				                <ul>
				                  <li>Master Card</li>
				                  <li>American Express</li>
				                  </ul></div>
				                </div>
				               </td></tr>
				            </table>
				            <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
				            Número de la tarjeta
				            <input class='input-field'></input>
				            Nombre de la tarjeta
				            <input class='input-field'></input>
				            <table class='half-input-table'>
				              <tr>
				                <td> Fecha de expiración
				                  <input class='input-field'></input>
				                </td>
				                <td>CVC
				                  <input class='input-field'></input>
				                </td>
				              </tr>
				            </table>
				            <br>
				            <br>
				            <br>
				            <br>
				            

				          </div>

				        </div>
				      </div>
				
				
				
			</div>


	
	

	
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="pago.js"></script>
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

