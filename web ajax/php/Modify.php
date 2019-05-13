<?php

	function ModTablaTurista()
	{
		require 'conexion.php';
		$rut = $_POST['rut'];
		$nombre = $_POST['nombre'];
		$fecha = $_POST['fecha'];
		$contacto = $_POST['contacto'];
		$tel = $_POST['tel'];
		$id_enf = $_POST['id_enf'];

		$str = 'update Turista set nombre = $1, nombre_contacto = $2, tel_contacto = $3, fecha_nac = $4 where rut = $5';
		pg_prepare($conn, "turista", $str);
		$result = pg_execute($conn, "turista", array($nombre, $contacto, $tel, $fecha, $rut));
		
		$str = 'update enfermedades_turist set id_enfermedad = $1 where rut_turista = $2';
		pg_prepare($conn, "enf", $str);
		$result = pg_execute($conn, "enf", array($id_enf, $rut));
		
	}

	function ModTablaTour()
	{
		require 'conexion.php';

		$ID_Tour = $_POST['ID_Tour'];
		$Nombre_Tour = $_POST['Nombre_Tour'];
		$Min_Group = $_POST['Min_Group'];
		$Costo_Indv = $_POST['Costo_Indv'];
		$Costo_Grup = $_POST['Costo_Grup'];
		$ID_Lugar = $_POST['ID_Lugar'];
		$ID_Ciudad = $_POST['ID_Ciudad'];

		$str = 'update Tour set nombre = $1, costo_ind = $2, costo_grup = $3, min_grup = $4, id_ciudad = $5 where id = $6';
		pg_prepare($conn, "turista", $str);
		$result = pg_execute($conn, "turista", array($Nombre_Tour, $Costo_Indv, $Costo_Grup, $Min_Group,$ID_Ciudad, $ID_Tour));
		
		$str = 'update asocia set id_lugar = $1 where id_tour = $2';
		pg_prepare($conn, "enf", $str);
		$result = pg_execute($conn, "enf", array($ID_Lugar, $ID_Tour));

	}

	function ModTablaVehiculo()
	{
		require 'conexion.php';

		$Patente = $_POST['Patente'];
		$Año = $_POST['Año'];
		$Marca = $_POST['Marca'];
		$Capacidad = $_POST['Capacidad'];
		$ID_Tour = $_POST['ID_Tour'];

		$str = 'update vehiculo set año = $1, marca = $2, capacidad = $3 where patente = $4';
		pg_prepare($conn, "vehiculo", $str);
		$result = pg_execute($conn, "vehiculo", array($Año, $Marca, $Capacidad, $Patente));

		$str = 'select count(patente) from uso_vehiculo where patente = $1';
		pg_prepare($conn, "exist", $str);
		$result = pg_execute($conn, "exist", array($Patente));
		$row = pg_fetch_row($result);
		if($row != "0")
		{
			$str = 'delete from uso_vehiculo where patente = $1';
			pg_prepare($conn, "deletera", $str);
			pg_execute($conn, "deletera", array($Patente));
		}
		if($ID_Tour!="0")
		{
			$str = 'insert into uso_vehiculo values($1,$2)';
			pg_prepare($conn, "uso", $str);
			pg_execute($conn, "uso",array($ID_Tour,$Patente));
		}
		

	}

	function ModTablaTuristTour()
	{
		require 'conexion.php';

		$Rut_Turista = $_POST['Rut_Turista'];
		$ID_Tour = $_POST['ID_Tour'];
		$Fecha_Tour = $_POST['Fecha_Tour'];
		$Precio = $_POST['Precio'];
		$Descuento = $_POST['Descuento'];

		$str = 'update Turist_Tour values set fecha = $3, Precio = $4, Descuento = $5 where (rut_turista = $1 and id_tour = $2)';
		pg_prepare($conn, "Vehiculo", $str);
		pg_execute($conn, "Vehiculo", array($Rut_Turista,$ID_Tour, $Fecha_Tour, $Precio, $Descuento));		
		
	}

	function ModTablaGuia()
	{
		require 'conexion.php';

		$Rut = $_POST['Rut'];
		$Nombre = $_POST['Nombre'];
		$Calle = $_POST['Calle'];
		$Numero = $_POST['Numero'];
		$Ciudad = $_POST['Ciudad'];
		$Especialidad = $_POST['Especialidad'];
		$Nivel = $_POST['Nivel'];

		$str = 'update Guia values set nombre = $2, Calle = $3, Numero = $4, id_ciudad = $5 where (rut = $1)';
		pg_prepare($conn, "Vehiculo", $str);
		pg_execute($conn, "Vehiculo", array($Rut,$Nombre, $Calle, $Numero, $Ciudad));		

		$str = 'delete from especialidades_guias where(rut_guia = $1)';
		pg_prepare($conn, "Deletera", $str);
		pg_execute($conn, "Deletera", array($Rut));	

		$str = 'INSERT into especialidades_guias values($1,$2,$3)';
		pg_prepare($conn, "Esp", $str);
		pg_execute($conn, "Esp", array($Rut,$Especialidad,$Nivel));
		
	}


	if(isset($_POST['function'])) 
	{
	  	$funcion = $_POST['function'];

	  	if($funcion=='TablaTurista')
	  	{
	  		ModTablaTurista();
	  	}
	  	elseif($funcion=='TablaTour')
	  	{
	  		ModTablaTour();
	  	}
	  	elseif($funcion=='TablaVehiculo')
	  	{
	  		ModTablaVehiculo();
	  	}
	  	elseif($funcion=='TablaTuristTour')
	  	{
	  		ModTablaTuristTour();
	  	}
	  	elseif($funcion=='TablaGuia')
	  	{
	  		ModTablaGuia();
	  	}
	} 
	
?>