<html>
<?php 
	include_once 'conexion.inc.php';

	$codFlujo = $_GET['codflujo'];
	$codProceso = $_GET['codproceso'];

	
	$sql ="SELECT * FROM flujo WHERE CodFlujo = '$codFlujo' AND CodProceso = '$codProceso'";
	$result = mysqli_query($conn, $sql);
	$fila = mysqli_fetch_array($result);
	$codProcesoSiguiente = $fila['CodProcesoSiguiente'];
	$archivo = $fila['Pantalla'];
 ?>
<body>
	<h1>Inscripciones CEI</h1>
	<br>

	<form action="../controlador.php" method="GET">
		<?php
		include "$archivo";
		echo '<br>';
		if($codProceso == 'P1' or $codProceso == 'P6' or $codProceso == 'P5' or $codProceso == 'P7')
		{
			$antBtn = "hidden";
			$sigBtn = "submit";
		}
		else if($codProceso == 'P4'or $codProceso == 'P8')
		{
			$antBtn = "hidden";
			$sigBtn = "hidden";
		}
		else
		{
			$antBtn = "submit";
			$sigBtn = "submit";
		}
		?>

		<input type="hidden" value="<?php echo $codFlujo; ?>" name="codflujo">
		<input type="hidden" value="<?php echo $codProceso; ?>" name="codproceso">
		<input type="hidden" value="<?php echo $usuario; ?>" name="usuario">
		<input type="hidden" value="<?php echo $codProcesoSiguiente; ?>" name="codprocesosiguiente">
		<input type="<?php echo $antBtn ?>" value="Anterior" name="Anterior">
		<input type="<?php echo $sigBtn ?>" value="Siguiente" name="Siguiente">
	</form>

</body>
 </html>