<?php
	
	function Consulta1()
	{
		require 'conexion.php';

		$str = "create or replace view REGIONES_SINDESCUENTO as
	select r.nombre, count(r.nombre) as cantidad
	from turist_tour tt,tour t ,ciudad c, region r
	where (tt.id_tour = t.id and t.id_ciudad = c.id and c.id_region = r.id and EXTRACT(MONTH from tt.fecha)=11
		   and EXTRACT(YEAR from tt.fecha)=2018 and tt.descuento=0)
	group by r.nombre
	order by cantidad desc";
		pg_query($conn, $str);


		$str  = "select r.nombre
from REGIONES_SINDESCUENTO r
where (r.cantidad = (select MAX(r2.cantidad)
					 from REGIONES_SINDESCUENTO r2
					)
)";
		$result = pg_query($conn, $str);
		echo '<thead class="table-head shadow">';
		echo "<tr>";
		echo "<td>Nombre</td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody >";
		while ($row = pg_fetch_row($result)) 
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
		  	echo "</tr>";
		}
		echo "</tbody>";
	}

	function Consulta2()
	{
		require 'conexion.php';

		$str = "create or replace view VALORES_TOURS as
	select t.id, t.nombre, sum(tt.precio) as total
	from tour t, turist_tour tt
	where (t.id = tt.id_tour)
	group by t.id, t.nombre";
		pg_query($conn, $str);

		$str = "create or replace view TOURS_DESCUENTO as
	select t.id, t.nombre, sum(tt.descuento) as total
	from tour t, turist_tour tt
	where (t.id = tt.id_tour)
	group by t.id, t.nombre";
		pg_query($conn, $str);

		$str  = "select a.nombre, a.total-b.total as Ganancias
from VALORES_TOURS a, TOURS_DESCUENTO b
where (a.id = b.id)";

		$result = pg_query($conn, $str);
		echo '<thead class="table-head shadow">';
		echo "<tr>";
		echo "<td>Total</td>";
		echo "<td>Ganancias</td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody >";
		while ($row = pg_fetch_row($result)) 
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
		  	echo "</tr>";
		}
		echo "</tbody>";
	}
	function Consulta3()
	{
		require 'conexion.php';

		$str = "create or replace view TOTAL_COORDINADORES as
	select t.id, t.nombre, count(t.id) as total
	from tour t,dirige d, categoria c,guia g,especialidades_guias esp, asocia a, lugar l
	where (t.id = d.id_tour and d.id_categoria = c.id
		   and d.id_tour = t.id and t.id = a.id_tour and a.id_lugar = l.id
		   and c.descripcion = 'coordinador' and d.rut_guia = g.rut
		   and g.rut = esp.rut_guia and l.nivel = 'medio'
		   and g.rut IN
		   		(	select g2.rut
		   			from guia g2, especialidades_guias esp2
		  			where (g2.rut = esp.rut_guia )
		  			group by g2.rut
		  			having count(g2.rut)>3
		   		)
	)
	group by t.id,t.nombre
	order by total asc";
		pg_query($conn, $str);


		$str  = "select a.nombre
from TOTAL_COORDINADORES a
where (a.total =  (	select max(b.total)
					from TOTAL_COORDINADORES b 
				)
	   )";
		$result = pg_query($conn, $str);
		echo '<thead class="table-head shadow">';
		echo "<tr>";
		echo "<td>Nombre</td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody >";
		while ($row = pg_fetch_row($result)) 
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
		  	echo "</tr>";
		}
		echo "</tbody>";
	}

	function Consulta4()
	{
		require 'conexion.php';

		$str = "create or replace view TOTAL_TURISTAS as
	select t.id, t.nombre, count(t.id) as total
	from lugar l, asocia a, tour t, turist_tour tt, turista tu,
		enfermedades_turist e, enfermedad enf
	where(l.nivel='experto' and l.id = a.id_lugar and a.id_tour = t.id
		and t.id = tt.id_tour and tt.rut_turista = tu.rut and tu.rut = e.rut_turista
		and e.id_enfermedad = enf.id and enf.descripcion!='cardiaca' 
		and  enf.descripcion!='respiratoria' and EXTRACT(MONTH FROM tt.fecha)=10 and EXTRACT(YEAR FROM tt.fecha)=2018)
	group by t.id, t.nombre
	order by total desc";
		pg_query($conn, $str);


		$str  = "select a.nombre
from TOTAL_TURISTAS a
where (a.total =  (	select MAX(b.total)
					from TOTAL_TURISTAS b 
				)
	   )";

		$result = pg_query($conn, $str);
		echo '<thead class="table-head shadow">';
		echo "<tr>";
		echo "<td>Nombre</td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody >";
		while ($row = pg_fetch_row($result)) 
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
		  	echo "</tr>";
		}
		echo "</tbody>";
	}
	function Consulta5()
	{
		require 'conexion.php';

		$str = "create or replace view TOTAL_ARRIENDOS as
	select count(u.patente) as total
	from uso_vehiculo u
	where u.patente IN (
			select c.patente
			from contacto c
			where ( EXTRACT(MONTH from c.fecha_devolucion) between 1 and 2 )
		)";
		pg_query($conn, $str);


		$str = "create or replace view TOTAL_VEHICULOS as
	select count(u.patente) as total
	from uso_vehiculo u";
		pg_query($conn, $str);


		$str  = "select cast(a.total as float)/b.total as promedio  
from TOTAL_ARRIENDOS a,TOTAL_VEHICULOS b";
		$result = pg_query($conn, $str);

		echo '<thead class="table-head shadow">';
		echo "<tr>";
		echo "<td>Promedio</td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody >";
		while ($row = pg_fetch_row($result)) 
		{
			echo "<tr>";
			echo "<td>$row[0]</td>";
		  	echo "</tr>";
		}
		echo "</tbody>";
	}

	if(isset($_POST['Consulta'])) 
	{
	  	$funcion = $_POST['Consulta'];

	  	if($funcion=="1")
	  	{
	  		Consulta1();
	  	}
	  	elseif($funcion=='2')
	  	{
	  		Consulta2();
	  	}
	  	elseif($funcion=='3')
	  	{
	  		Consulta3();
	  	}
	  	elseif($funcion=='4')
	  	{
	  		Consulta4();
	  	}
	  	elseif($funcion=='5')
	  	{
	  		Consulta5();
	  	}
	}   

?>