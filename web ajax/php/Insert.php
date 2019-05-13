<?php

	function AddTablaTurista()
	{
		require 'conexion.php';

		$rut = $_POST['rut'];
		$nombre = $_POST['nombre'];
		$fecha = $_POST['fecha'];
		$contacto = $_POST['contacto'];
		$tel = $_POST['tel'];
		$id_enf = $_POST['id_enf'];

		$str = 'SELECT count(rut) FROM Turista WHERE rut = $1 group by (rut)';
		pg_prepare($conn, "rut", $str);
		$result = pg_execute($conn, "rut", array($rut));
		$row = pg_fetch_row($result);
		if($row[0]==0)
		{
			$str = 'INSERT into Turista values($1,$2,$3,$4,$5)';
			pg_prepare($conn, "insertTurista", $str);
			pg_execute($conn, "insertTurista", array($rut,$nombre, $contacto, $tel, $fecha));		
		}
		$str = 'INSERT into enfermedades_turist values($1,$2)';
		pg_prepare($conn, "insertTuristaEnf", $str);
		pg_execute($conn, "insertTuristaEnf", array($id_enf,$rut));
	}

	function AddTablaTour()
	{
		require 'conexion.php';

		$ID_Tour = $_POST['ID_Tour'];
		$Nombre_Tour = $_POST['Nombre_Tour'];
		$Min_Group = $_POST['Min_Group'];
		$Costo_Indv = $_POST['Costo_Indv'];
		$Costo_Grup = $_POST['Costo_Grup'];
		$ID_Lugar = $_POST['ID_Lugar'];
		$ID_Ciudad = $_POST['ID_Ciudad'];

		$str = 'SELECT count(id) FROM Tour WHERE id = $1 group by (id)';
		pg_prepare($conn, "id", $str);
		$result = pg_execute($conn, "id", array($ID_Tour));
		$row = pg_fetch_row($result);
		if($row[0]==0)
		{
			$str = 'INSERT into Tour values($1,$2,$3,$4,$5,$6)';
			pg_prepare($conn, "insertTour", $str);
			pg_execute($conn, "insertTour", array($ID_Tour,$Nombre_Tour, $Costo_Indv, $Costo_Grup, $Min_Group,$ID_Ciudad));		
		}
		$str = 'INSERT into asocia values(0,0,\'2018-01-01\',\'2018-01-01\',$1,$2)';
		pg_prepare($conn, "insertAsocia", $str);
		pg_execute($conn, "insertAsocia", array($ID_Lugar,$ID_Tour));
	}

	function AddTablaVehiculo()
	{
		require 'conexion.php';

		$Patente = $_POST['Patente'];
		$Año = $_POST['Año'];
		$Marca = $_POST['Marca'];
		$Capacidad = $_POST['Capacidad'];
		$ID_Tour = $_POST['ID_Tour'];


		$str = 'SELECT count(patente) FROM Vehiculo WHERE patente = $1 group by (patente)';
		pg_prepare($conn, "rut", $str);
		$result = pg_execute($conn, "rut", array($Patente));
		$row = pg_fetch_row($result);
		if($row[0]==0)
		{
			$str = 'INSERT into Vehiculo values($1,$2,$3,$4)';
			pg_prepare($conn, "Vehiculo", $str);
			pg_execute($conn, "Vehiculo", array($Patente,$Año, $Marca, $Capacidad));		
		}
		if($ID_Tour!="0")
		{
			$str = 'INSERT into uso_vehiculo values($1,$2)';
			pg_prepare($conn, "uso_vehiculo", $str);
			pg_execute($conn, "uso_vehiculo", array($ID_Tour,$Patente));
		}
		
	}

	function AddTablaTuristTour()
	{
		require 'conexion.php';

		$Rut_Turista = $_POST['Rut_Turista'];
		$ID_Tour = $_POST['ID_Tour'];
		$Fecha_Tour = $_POST['Fecha_Tour'];
		$Precio = $_POST['Precio'];
		$Descuento = $_POST['Descuento'];

		$str = 'INSERT into Turist_Tour values($1,$2,$3,$4,$5)';
		pg_prepare($conn, "Vehiculo", $str);
		pg_execute($conn, "Vehiculo", array($Rut_Turista,$ID_Tour, $Fecha_Tour, $Precio, $Descuento));		
		
	}

	function AddTablaGuia()
	{
		require 'conexion.php';

		$Rut = $_POST['Rut'];
		$Nombre = $_POST['Nombre'];
		$Calle = $_POST['Calle'];
		$Numero = $_POST['Numero'];
		$Ciudad = $_POST['Ciudad'];
		$Especialidad = $_POST['Especialidad'];
		$Nivel = $_POST['Nivel'];


		$str = 'SELECT count(rut) FROM Guia WHERE rut = $1 group by (rut)';
		pg_prepare($conn, "rut", $str);
		$result = pg_execute($conn, "rut", array($Rut));
		$row = pg_fetch_row($result);
		if($row[0]==0)
		{
			$str = 'INSERT into Guia values($1,$2,$3,$4,$5)';
			pg_prepare($conn, "guia", $str);
			pg_execute($conn, "guia", array($Rut,$Nombre, $Calle, $Numero, $Ciudad));		
		}

		$str = 'INSERT into especialidades_guias values($1,$2,$3)';
		pg_prepare($conn, "Esp", $str);
		pg_execute($conn, "Esp", array($Rut,$Especialidad,$Nivel));
		
		
	}


	if(isset($_POST['function'])) 
	{
	  	$funcion = $_POST['function'];

	  	if($funcion=='TablaTurista')
	  	{
	  		AddTablaTurista();
	  	}
	  	elseif($funcion=='TablaTour')
	  	{
	  		AddTablaTour();
	  	}
	  	elseif($funcion=='TablaVehiculo')
	  	{
	  		AddTablaVehiculo();
	  	}
	  	elseif($funcion=='TablaTuristTour')
	  	{
	  		AddTablaTuristTour();
	  	}
	  	elseif($funcion=='TablaGuia')
	  	{
	  		AddTablaGuia();
	  	}
	}   
?>