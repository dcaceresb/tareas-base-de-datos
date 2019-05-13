<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		include 'Header.php';
	?>	

	<script type="text/javascript">
		function updateTable()
		{

			$.ajax(
		    {
		        type:'POST',
		        url: 'Query_Select.php',
		        data: { function : 'TablaVehiculo'},
		        success: function(respuesta) 
		        {
					$("#myTable").html(respuesta);
				}
		    });

		  
		}

		$(document).ready(function()
		{
			updateTable();
		  	$("#ID_Tour").click(function()
		  	{
		  		var id = $(this).children("option:selected").val();
		  		if(id==0)
		  		{
		  			$("#Nombre_Tour").val('Sin Tour');
		  		}
		  		else
		  		{
		  			$.ajax(
				    {
				        type:'POST',
				        url: 'Query_Select.php',
				        data: {
				          	function: 'NombreTour', 
				          	id : id
				        },
				        success: function(respuesta) 
				           {
							$("#Nombre_Tour").val(respuesta);
						}
				    });
		  		}
		  		
		  	});

		  	$("#ID_Tour").change(function()
		  	{
		  		var id = $(this).children("option:selected").val();

		  		if(id==0)
		  		{
		  			$("#Nombre_Tour").val('Sin Tour');
		  		}
		  		else
		  		{
		  			$.ajax(
				    {
				        type:'POST',
				        url: 'Query_Select.php',
				        data: {
				          	function: 'NombreTour', 
				          	id : id
				        },
				        success: function(respuesta) 
				           {
							$("#Nombre_Tour").val(respuesta);
						}
				    });
		  		}

		  	});
		  	
		  	$("#myTable").on('click','tr',function()
		  	{
		  		var data = $(this).children("td").map(function()
		  		{
		  			return $(this).text();
		  		}).get();

		  		$("#Patente").val(data[0]);
		  		$("#Año").val(data[1]);
		  		$("#Marca").val(data[2]);
		  		$("#Capacidad").val(data[3]);
		  		$("#ID_Tour").val(data[4]);
		  		$("#Nombre_Tour").val(data[5]);
		  	});

		  	$("#add").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#Patente").val();
		  		data[1] = $("#Año").val();
		  		data[2] = $("#Marca").val();
		  		data[3] = $("#Capacidad").val();
		  		data[4] = $("#ID_Tour").children("option:selected").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Insert.php',
		            data: {
		            	function : 'TablaVehiculo',
		            	Patente : data[0],
		            	Año :data[1],
		            	Marca :data[2],
		            	Capacidad :data[3],
		            	ID_Tour : data[4] 
		            },
		            success: function(respuesta) 
		            {
		            	
						if(!respuesta)
		            	{
		            		$.alert(
							{
								title: 'Correcto!',
								content: "La consulta fue realizada correctamente"
							});
							updateTable();
		            	}
						else
						{
							$.alert(
							{
								title: 'Error!',
								content: respuesta
							});
						}
						

					},
					error: function(){
					    $.alert(
						{
							title: 'Error!',
							content: 'Algo ha ocurrido'
						})
					}
		  		});
		  		
		  		updateTable();
		  	});

		  	$("#modify").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#Patente").val();
		  		data[1] = $("#Año").val();
		  		data[2] = $("#Marca").val();
		  		data[3] = $("#Capacidad").val();
		  		data[4] = $("#ID_Tour").children("option:selected").val();

		  		$.ajax(
		  		{
		  			type:'POST',
		            url: 'Modify.php',
		            data: {
		            	function : 'TablaVehiculo',
		            	Patente : data[0],
		            	Año :data[1],
		            	Marca :data[2],
		            	Capacidad :data[3],
		            	ID_Tour : data[4] 
		            },
		            success: function(respuesta) 
		            {
		            	if(!respuesta)
		            	{
		            		$.alert(
							{
								title: 'Correcto!',
								content: "La consulta fue realizada correctamente"
							});
							updateTable();
		            	}
						else
						{
							$.alert(
							{
								title: 'Error!',
								content: respuesta
							});
						}
						

					},
					error: function(){
					    $.alert(
						{
							title: 'Error!',
							content: 'Algo ha ocurrido'
						})
					}
		  		});
		  		
		  		
		  	});

		  	$("#delete").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#Patente").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Delete.php',
		            data: {
		            	function : 'TablaVehiculo',
		            	Patente : data[0]

		            },
		            success: function(respuesta) 
		            {
		            	if(!respuesta)
		            	{
		            		$.alert(
							{
								title: 'Correcto!',
								content: "La consulta fue realizada correctamente"
							});
							updateTable();
		            	}
						else
						{
							$.alert(
							{
								title: 'Error!',
								content: respuesta
							});
						}
						

					},
					error: function(){
					    $.alert(
						{
							title: 'Error!',
							content: 'Algo ha ocurrido'
						})
					}
		  		});
		  		
		  		
		  	});
		  		
		  		
		  	});
	</script>

</head>
<body>
	<?php 
		include 'Navbar.php';
	?>

	<form class="container-fluid shadow" action="php/Inicio.php" method="POST">
		<div class="row shadow" style="margin: 30px; background-color: #DCDCDC ">
			<div class="col-3 align-horizontal-2">
				<div class="form-group ">
					<p>Datos del vehiculo:</p>
				   	<label for="Patente">Patente</label>
				    <input type="text" class="form-control" id="Patente" aria-describedby="emailHelp" placeholder="AABB11">

				    <label for="Año">Año</label>
				    <input type="number" class="form-control" id="Año" placeholder="1990">

				    <label for="Marca">Marca</label>
				    <input type="text" class="form-control" id="Marca" placeholder="Toyota">

				    <label for="Capacidad">Capacidad</label>
				    <input type="number" class="form-control" id="Capacidad" placeholder="2" min="2" max="4">
				</div>
			</div>
			<div class="col-3 align-horizontal-2">
				<div class="form-group ">
					<p>Datos del tour:</p>
				   	<label for="ID_Tour">ID Tour</label>
				    <select class="form-control" id="ID_Tour">
				    	<option value="0">Sin Tour</option>
				    	<?php
				    		require 'Query_Select.php';
				    		ID_Tour();
				    	?>
				    </select> 

				    <label for="Nombre_Tour">Nombre del tour</label>
				    <input type="text" class="form-control" id="Nombre_Tour" placeholder="Sin Tour" disabled>
				</div>
				
			</div>
			<button type="button" id="add" class="btn btn-primary form-control">Añadir</button>
			<button type="button" id="modify" class="btn btn-warning form-control">Modificar</button>
			<button type="button" id="delete" class="btn btn-danger form-control">Eliminar</button>
		</div>
		
	</form>

	<table class="table table-bordered table-striped table-centered">
		<thead class="table-head shadow">
			<tr>
				<td>Patente</td>
				<td>Año</td>
				<td>Marca</td>
				<td>Capacidad</td>
				
				<td>ID Tour</td>
				<td>Nombre Tour</td>
			</tr>
		</thead>
		<tbody id="myTable">
			<?php 
					
			?>
		</tbody>
	</table>
</body>
</html>