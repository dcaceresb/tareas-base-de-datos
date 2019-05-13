<?php 
	

	function ID_Lugar()
	{
		
		require 'conexion.php';

		$result = pg_query($conn, "SELECT id from lugar");
		if (!$result) 
		{
			echo "<script>alert('afgg')</script>";
			exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "<option value=$row[0]>$row[0]</option>";
		}
	}

	function Rut_Turista()
	{
		require 'conexion.php';

		$result = pg_query($conn, "SELECT rut from turista order by(rut) asc");
		if (!$result) 
		{
			echo "<script>alert('afgg')</script>";
			exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "<option value='$row[0]'>$row[0]</option>";
		}
	}
	function Desc_Especialidad()
	{
		require 'conexion.php';

		$result = pg_query($conn, "SELECT id,descripcion from especialidad order by(id) asc");
		if (!$result) 
		{
			echo "<script>alert('afgg')</script>";
			exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "<option value='$row[0]'>$row[1]</option>";
		}
	}
	function GetNombre_Turista()
	{
		require 'conexion.php';
		$id = $_POST['id'];
		$result = pg_prepare($conn, "GetNombre_Turista", 'SELECT nombre FROM Turista WHERE rut = $1');
		$result = pg_execute($conn, "GetNombre_Turista", array($id));
		if (!$result) 
		{

			exit;
		}

		while ($row = pg_fetch_row($result)) {
			echo ($row[0]);
		}
	}

	function GetNombre_Lugar()
	{
		
		require 'conexion.php';
		$id = $_POST['id'];
		$result = pg_prepare($conn, "GetNombre_Lugar", 'SELECT nombre FROM Lugar WHERE id = $1');
		$result = pg_execute($conn, "GetNombre_Lugar", array($id));
		if (!$result) 
		{

			exit;
		}

		while ($row = pg_fetch_row($result)) {
			echo ($row[0]);
		}
	}


	function ID_Tour()
	{
		
		require 'conexion.php';
		$result = pg_query($conn, "SELECT ID FROM Tour order by(id) asc");
		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "<option value=$row[0]>$row[0]</option>";
		}
	}

	function GetNombre_Tour()
	{
		require 'conexion.php';
		$id = $_POST['id'];
		$result = pg_prepare($conn, "GetNombre_Tour", 'SELECT nombre FROM Tour WHERE id = $1');
		$result = pg_execute($conn, "GetNombre_Tour", array($id));
		if (!$result) 
		{

			exit;
		}

		while ($row = pg_fetch_row($result)) {
			echo ($row[0]);
		}
	}

	function ID_Enfermedad()
	{
		
		require 'conexion.php';
		$result = pg_query($conn, "SELECT ID FROM Enfermedad order by (id) asc");
		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "<option value=$row[0]>$row[0]</option>";
		}
	}
	function Nombre_CiudadT()
	{
		
		require 'conexion.php';
		$result = pg_query($conn, "SELECT ID,nombre FROM Ciudad order by (id) asc");
		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result)) {
		  echo "<option value=$row[0]>$row[1]</option>";
		}
	}
	function GetNombre_Enfermedad()
	{
		require 'conexion.php';
		$id = $_POST['id'];
		$result = pg_prepare($conn, "GetNombre_Tour", 'SELECT descripcion FROM Enfermedad WHERE id = $1');
		$result = pg_execute($conn, "GetNombre_Tour", array($id));
		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result)) {
			echo ($row[0]);
		}
	}

	function GetNombre_Ciudad()
	{
		require 'conexion.php';
		$id = $_POST['id'];
		$result = pg_prepare($conn, "GetNombre_Tour", 'SELECT c.nombre FROM ciudad c, lugar l WHERE l.id = $1 and l.id_ciudad = c.id');
		$result = pg_execute($conn, "GetNombre_Tour", array($id));
		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result)) {
			echo ($row[0]);
		}
	}

	function TablaTurista()
	{
		require 'conexion.php';

		$result = pg_query($conn,'SELECT distinct tu.rut, tu.nombre, tu.fecha_nac, tu.nombre_contacto,tu.tel_contacto,e.id,e.descripcion FROM Enfermedad e , Turista tu LEFT join enfermedades_turist enf on tu.rut = enf.rut_turista where enf.id_enfermedad = e.id order by (tu.rut) asc');
		if (!$result) 
		{

			exit;
		}

		while ($row = pg_fetch_row($result))
		{
			$temp = array();
			$str = "";
			$str .= "<tr>";
			$str .= "<td>$row[0]</td>";
		   	$str .= "<td>$row[1]</td>";
		   	$str .= "<td>$row[2]</td>";
		   	$str .= "<td>$row[3]</td>";
		   	$str .= "<td>$row[4]</td>";
		   	$str .= "<td>$row[5]</td>";
		   	$str .= "<td>$row[6]</td>";
		   	$str .= "</tr>";
		    
		    echo $str;

		}

	}

	function TablaTour()
	{
		require 'conexion.php';

		$result = pg_query($conn,'SELECT distinct t.id,t.nombre,t.min_grup, t.costo_ind, t.costo_grup,l.id, l.nombre FROM Tour t , Asocia a, Lugar l where t.id = a.id_tour and a.id_lugar = l.id order by (t.id) asc');

		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result))
		{
			$temp = array();
			$str = "";
			$str .= "<tr>";
			$str .= "<td>$row[0]</td>";
		   	$str .= "<td>$row[1]</td>";
		   	$str .= "<td>$row[2]</td>";
		   	$str .= "<td>$row[3]</td>";
		   	$str .= "<td>$row[4]</td>";
		   	$str .= "<td>$row[5]</td>";
		   	$str .= "<td>$row[6]</td>";
		   	$str .= "</tr>";
		    
		    echo $str;

		}

	}
	
	function TablaVehiculo()
	{
		require 'conexion.php';

		$result = pg_query($conn,'SELECT distinct v.patente, v.año, v.marca, v.capacidad, x.id, x.nombre FROM vehiculo v left join (select u.patente,t.id, t.nombre from uso_vehiculo u, Tour t where u.id_tour = t.id) x on v.patente = x.patente order by (v.patente) asc ');

		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result))
		{
			$temp = array();
			$str = "";
			$str .= "<tr>";
			$str .= "<td>$row[0]</td>";
		   	$str .= "<td>$row[1]</td>";
		   	$str .= "<td>$row[2]</td>";
		   	$str .= "<td>$row[3]</td>";
		   	$str .= "<td>$row[4]</td>";
		   	$str .= "<td>$row[5]</td>";
		   	$str .= "</tr>";
		    
		    echo $str;

		}

	}

	function TablaTuristTour()
	{
		require 'conexion.php';

		$result = pg_query($conn,'SELECT distinct tu.rut, tu.nombre, t.id, t.nombre, tt.fecha, tt.precio, tt.descuento from Turista tu, Tour t, Turist_Tour tt where tu.rut = tt.rut_turista and tt.id_tour = t.id');

		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result))
		{
			$temp = array();
			$str = "";
			$str .= "<tr>";
			$str .= "<td>$row[0]</td>";
		   	$str .= "<td>$row[1]</td>";
		   	$str .= "<td>$row[2]</td>";
		   	$str .= "<td>$row[3]</td>";
		   	$str .= "<td>$row[4]</td>";
		   	$str .= "<td>$row[5]</td>";
		   	$str .= "<td>$row[6]</td>";
		   	$str .= "</tr>";
		    
		    echo $str;

		}

	}

	function TablaGuia()
	{
		require 'conexion.php';

		$result = pg_query($conn,'SELECT distinct g.rut, g.nombre, g.calle, g.numero, g.id_ciudad, c.nombre, e.id, e.descripcion, eg.nivel from Ciudad c, Guia g, especialidades_guias eg , especialidad e where g.rut = eg.rut_guia and eg.id_esp = e.id and g.id_ciudad = c.id');

		if (!$result) 
		{
			exit;
		}

		while ($row = pg_fetch_row($result))
		{
			$temp = array();
			$str = "";
			$str .= "<tr>";
			$str .= "<td>$row[0]</td>";
		   	$str .= "<td>$row[1]</td>";
		   	$str .= "<td>$row[2]</td>";
		   	$str .= "<td>$row[3]</td>";
		   	$str .= "<td>$row[4]</td>";
		   	$str .= "<td>$row[5]</td>";
		   	$str .= "<td>$row[6]</td>";
		   	$str .= "<td>$row[7]</td>";
		   	$str .= "<td>$row[8]</td>";
		   	$str .= "</tr>";
		    
		    echo $str;

		}

	}

	if(isset($_POST['function'])) 
	{
	  	$funcion = $_POST['function'];


	  	if($funcion=='TablaTurista')
	  	{
	  		TablaTurista();
	  	}
	  	elseif($funcion == 'TablaTour')
	  	{
	  		TablaTour();
	  	}
	  	elseif($funcion == 'TablaVehiculo')
	  	{
	  		TablaVehiculo();
	  	}
	  	elseif($funcion == 'TablaTuristTour')
	  	{
	  		TablaTuristTour();
	  	}
	  	elseif($funcion == 'TablaGuia')
	  	{
	  		TablaGuia();
	  	}
	  	elseif ($funcion =='NombreTour') 
	  	{
	  		GetNombre_Tour();
	  	}
	  	elseif ($funcion =='NombreLugar') 
	  	{
	  		GetNombre_Lugar();
	  	}
	  	elseif($funcion =='NombreEnfermedad')
	  	{
	  		GetNombre_Enfermedad();
	  	}
	  	elseif($funcion =='NombreCiudad')
	  	{
	  		GetNombre_Ciudad();
	  	}
	  	elseif ($funcion == 'NombreTurista') 
	  	{
	  		GetNombre_Turista();
	  	}

	}  
?>