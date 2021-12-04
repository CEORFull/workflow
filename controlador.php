<?php 

	include "vistas/conexion.inc.php";


	echo " asdsad ";
	$codFlujo = $_GET['codflujo'];
	$codProceso = $_GET['codproceso'];
	$codProcesoSiguiente = $_GET['codprocesosiguiente'];
	$usuario = $_GET['usuario'];

	//llena datos del frente
	if(isset($_GET['candidatos']))
	{
		$presidente = $_GET['presidente'];
		$cip = $_GET['cipresidente'];
		$rup = $_GET['rupresidente'];
		
		$vpresidente = $_GET['vicepresidente'];
		$civp = $_GET['civicepresidente'];
		$ruvp = $_GET['ruvicepresidente'];

		$secretario = $_GET['secretario'];
		$cis = $_GET['cisecretario'];
		$rus = $_GET['rusecretario'];

		$candidatos='["'.$presidente.'","'.$vpresidente.'","'.$secretario.'"]';
		$ci = '["'.$cip.'","'.$civp.'","'.$cis.'"]';
		$ru = '["'.$rup.'","'.$ruvp.'","'.$rus.'"]';

		$idd = mysqli_query($conn, "SELECT * FROM usuario WHERE User = '$usuario'");
		$ide = mysqli_fetch_array($idd);
		$idu = $ide["IdUser"];

		mysqli_query($conn, "UPDATE frente SET Candidatos = '$candidatos' WHERE IdUs = '$idu'");
		mysqli_query($conn, "UPDATE frente SET CI = '$ci' WHERE IdUs = '$idu'");
		mysqli_query($conn, "UPDATE frente SET Ru = '$ru' WHERE IdUs = '$idu'");
	}

	if(isset($_GET['datos']))
	{
		$nombre = $_GET['nombre'];
		$siglas = $_GET['sigla'];

		$idd = mysqli_query($conn, "SELECT * FROM usuario WHERE User = '$usuario'");
		$ide = mysqli_fetch_array($idd);
		$idu = $ide["IdUser"];

		mysqli_query($conn, "UPDATE frente SET Nombre = '$nombre' WHERE IdUs = '$idu'");
		mysqli_query($conn, "UPDATE frente SET Siglas = '$siglas' WHERE IdUs = '$idu'");

	}


	//Empieza el tramite
	if($codProceso == 'P1')
	{
		$des =mysqli_query($conn,"SELECT * FROM flujo WHERE CodProceso = '$P2'");
		$desc = mysqli_fetch_array($des);
		$descri = $desc["DesProceso"];
		mysqli_query($conn, "INSERT INTO tramite (CodFlujo,CodProceso,DesProceso,Startuser,Currentuser,Estado) VALUES ('F1','P2','$descri','$usuario','$usuario','1')");

		$idus = mysqli_query($conn,"SELECT * FROM usuario WHERE User = '$usuario'");
		$iduser = mysqli_fetch_array($idus);
		$id = $iduser["IdUser"];
		mysqli_query($conn, "INSERT INTO frente (IdUs) VALUES ('$id')");
	}


	//Comprueba los procesos

	if(isset($_GET['Anterior']))
	{
		if($codProceso != 'P1' and $codProceso != 'P4' and $codProceso != 'P6')
		{
			$sql ="SELECT * FROM flujo WHERE CodFlujo = '$codFlujo' AND CodProcesoSiguiente = '$codProceso'";
		}
		else
		{
			$sql ="SELECT * FROM flujo WHERE CodFlujo = '$codFlujo' AND CodProceso = '$codProceso'";
		}
		
	}
	if(isset($_GET['Siguiente']))
	{
		if($codProceso == 'P6')
		{
			mysqli_query($conn, "UPDATE tramite SET Estado = '1' WHERE Startuser = '$usuario'");
			mysqli_query($conn, "UPDATE tramite SET CodProceso = 'P2' WHERE Startuser = '$usuario'");

			$des2 =mysqli_query($conn,"SELECT * FROM flujo WHERE CodProceso = 'P2'");
			$desc2 = mysqli_fetch_array($des2);
			$descri2 = $desc2["DesProceso"];
			mysqli_query($conn, "UPDATE tramite SET DesProceso = '$descri2' WHERE Startuser = '$usuario'");

			$sql ="SELECT * FROM flujo WHERE CodFlujo = '$codFlujo' AND CodProceso = 'P2'";
		}
		else
		{
			$processEstado = mysqli_query($conn, "SELECT * FROM tramite WHERE Startuser = '$usuario'");
			$estado = mysqli_fetch_array($processEstado);

			if($estado['Estado'] == '1' or $estado['Estado'] =='2')
			{
				$sql ="SELECT * FROM flujo WHERE CodFlujo = '$codFlujo' AND CodProceso = '$codProcesoSiguiente'";
			
				mysqli_query($conn, "UPDATE tramite SET CodProceso = '$codProcesoSiguiente' WHERE Startuser = '$usuario'");

				$des1 =mysqli_query($conn,"SELECT * FROM flujo WHERE CodProceso = '$codProcesoSiguiente'");
				$desc1 = mysqli_fetch_array($des1);
				$descri1 = $desc1["DesProceso"];
				mysqli_query($conn, "UPDATE tramite SET DesProceso = '$descri1' WHERE Startuser = '$usuario'");
			}
			else
			{
				$sql ="SELECT * FROM flujo WHERE CodFlujo = '$codFlujo' AND CodProceso = '$codProceso'";
			}
		}
		
		
	}
	//Modifica los permisos
	if($codProcesoSiguiente == 'P4')
	{
		mysqli_query($conn, "UPDATE tramite SET Estado = '0' WHERE Startuser = '$usuario'");
	}



	
	//mysqli_query($conn, "INSERT INTO tramite (CodFlujo,CodProceso,Startuser,Currentuser,Estado) VALUES ('F1','P3','Carlos','Carlos','1')");
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	$fila = mysqli_fetch_array($result);
	$codprocesoEnvia = $fila['CodProceso'];
	$archivoEnvia = "vistas/home.php?codflujo=".$codFlujo."&codproceso=".$codprocesoEnvia."&usuario=".$usuario;
	echo "$archivoEnvia";
	header('location: '.$archivoEnvia);

 ?>
