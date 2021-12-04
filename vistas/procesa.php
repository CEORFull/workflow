<?php 

	include "conexion.inc.php";

	$comentario = $_GET['comentario'];
	$us = $_GET['usuarioac'];
	$current = $_GET['current'];
	$frente = $_GET['frente'];

	echo '$comentario';

	if(isset($_GET['Volver']))
	{
		header('location: homeAdmin.php?codflujo=F1&codproceso=P4&usuario='.$current);
		
	}
	if(isset($_GET['Aceptar']))
	{
		//actualiza el estado
		mysqli_query($conn, "UPDATE tramite SET Estado = '2' WHERE Startuser = '$us'");

		//cambia el proceso de acuerdo a la condicion
		$procesoCondicional = mysqli_query($conn, "SELECT * FROM flujocondicional WHERE CodFlujo = 'F1' AND CodProceso = 'P4'");
		$condicion = mysqli_fetch_array($procesoCondicional);

		$si = $condicion["Si"];

		$des = mysqli_query($conn, "SELECT * FROM flujo WHERE CodFlujo = 'F1' AND CodProceso = '$si'");
		$desc = mysqli_fetch_array($des);
		$descr = $desc['DesProceso'];

		mysqli_query($conn, "UPDATE tramite SET CodProceso = '$si' WHERE Startuser = '$us'");

		mysqli_query($conn, "UPDATE tramite SET Comentario = '$comentario' WHERE Startuser = '$us'");

		mysqli_query($conn, "UPDATE tramite SET DesProceso = '$descr' WHERE Startuser = '$us'");

		header('location: homeAdmin.php?codflujo=F1&codproceso=P4&usuario='.$current);
		
	}


	if(isset($_GET['Rechazar']))
	{
		//actualiza el estado
		mysqli_query($conn, "UPDATE tramite SET Estado = '2' WHERE Startuser = '$us'");

		//cambia el proceso de acuerdo a la condicion
		$procesoCondicional = mysqli_query($conn, "SELECT * FROM flujocondicional WHERE CodFlujo = 'F1' AND CodProceso = 'P4'");
		$condicion = mysqli_fetch_array($procesoCondicional);

		$no = $condicion["No"];

		$des = mysqli_query($conn, "SELECT * FROM flujo WHERE CodFlujo = 'F1' AND CodProceso = '$no'");
		$desc = mysqli_fetch_array($des);
		$descr = $desc['DesProceso'];

		mysqli_query($conn, "UPDATE tramite SET CodProceso = '$no' WHERE Startuser = '$us'");

		mysqli_query($conn, "UPDATE tramite SET Comentario = '$comentario' WHERE Startuser = '$us'");

		mysqli_query($conn, "UPDATE tramite SET DesProceso = '$descr' WHERE Startuser = '$us'");
		
		header('location: homeAdmin.php?codflujo=F1&codproceso=P4&usuario='.$current);
	}

?>