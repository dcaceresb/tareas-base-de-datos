<?php

	function DelTablaTurista()
	{
		require 'conexion.php';
		$rut = $_POST['rut'];
		
		$str = 'delete from enfermedades_turist where rut_turista = $1';
		pg_prepare($conn, "enf", $str);
		$result = pg_execute($conn, "enf", array($rut));


		$str = 'delete from turisttour where rut_turista = $1';
		pg_prepare($conn, "tt", $str);
		$result = pg_execute($conn, "tt", array( $rut));

		$str = 'delete from turista where rut = $1';
		pg_prepare($conn, "enf", $str);
		$result = pg_execute($conn, "enf", array($rut));
	}

	function DelTablaVehiculo()
	{
		require 'conexion.php';
		$Patente = $_POST['Patente'];

		$str = 'delete from uso_vehiculo where patente = $1';
		pg_prepare($conn, "delete_uso",$str);
		pg_execute($conn, "delete_uso", array($Patente));

		$str = 'delete from vehiculo where patente = $1';
		pg_prepare($conn, "delete_vehi",$str);
		pg_execute($conn, "delete_vehi", array($Patente));
	}

	function DelTablaTuristTour()
	{
		require 'conexion.php';

		$Rut_Turista = $_POST['Rut_Turista'];
		$ID_Tour = $_POST['ID_Tour'];

		$str = 'delete from Turist_tour where rut_turista = $1 and ID_Tour = $2';
		pg_prepare($conn, "delete_uso",$str);
		pg_execute($conn, "delete_uso", array($Rut_Turista, $ID_Tour) );
	}

	function DelTablaGuia()
	{
		require 'conexion.php';

		$Rut = $_POST['Rut'];

		$str = 'delete from especialidades_guias where(rut_guia = $1)';
		pg_prepare($conn, "Deletera", $str);
		pg_execute($conn, "Deletera", array($Rut));	

		$str = 'delete from guia where (rut = $1)';
		pg_prepare($conn, "DeleteraG", $str);
		pg_execute($conn, "DeleteraG", array($Rut));	

	}
	if(isset($_POST['function'])) 
	{
	  	$funcion = $_POST['function'];

	  	if($funcion=='TablaTurista')
	  	{
	  		DelTablaTurista();
	  	}
	  	elseif($funcion=='TablaTour')
	  	{
	  		DelTablaTour();
	  	}
	  	elseif($funcion=='TablaVehiculo')
	  	{
	  		DelTablaVehiculo();
	  	}
	  	elseif($funcion=='TablaTuristTour')
	  	{
	  		DelTablaTuristTour();
	  	}
	  	elseif($funcion=='TablaGuia')
	  	{
	  		DelTablaGuia();
	  	}
	} 
	
	
?>