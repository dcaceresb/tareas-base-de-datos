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
		        data: { function : 'TablaTuristTour'},
		        success: function(respuesta) 
		        {
					$("#myTable").html(respuesta);
				}
		    });

		  
		}

		$(document).ready(function()
		{
			updateTable();
			$("#Precio").change(function()
			{
				var maxi = $(this).val();
				$("#Descuento").attr(
				{
					"max" : maxi
				})
			});

			$("#Rut").click(function()
		  	{
		  		var id = $(this).children("option:selected").val();

		  		$.ajax(
				{
				    type:'POST',
				    url: 'Query_Select.php',
				    data: 
				    {
				        function: 'NombreTurista', 
				        id : id
				    },
				    success: function(respuesta) 
				    {
						$("#Nombre_Persona").val(respuesta);
					}
				});
		  		
		  		
		  	});

		  	$("#Rut").change(function()
		  	{
		  		var id = $(this).children("option:selected").val();

		  		$.ajax(
				{
				    type:'POST',
				    url: 'Query_Select.php',
				    data: 
				    {
				        function: 'NombreTurista', 
				        id : id
				    },
				    success: function(respuesta) 
				    {
						$("#Nombre_Persona").val(respuesta);
					}
				});
		  		

		  	});

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

		  		$("#Rut").val(data[0]);
		  		$("#Nombre_Persona").val(data[1]);
		  		$("#ID_Tour").val(data[2]);
		  		$("#Nombre_Tour").val(data[3]);
		  		$("#Fecha_Tour").val(data[4]);
		  		$("#Precio").val(data[5]);
		  		$("#Descuento").val(data[6]);
		  	});

		  	$("#add").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#Rut").children("option:selected").val();
		  		data[1] = $("#ID_Tour").children("option:selected").val();
		  		data[2] = $("#Fecha_Tour").val();
		  		data[3] = $("#Precio").val();
		  		data[4] = $("#Descuento").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Insert.php',
		            data: {
		            	function : 'TablaTuristTour',
		            	Rut_Turista : data[0],
		            	ID_Tour :data[1],
		            	Fecha_Tour :data[2],
		            	Precio :data[3],
		            	Descuento : data[4] 
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
		  		data[0] = $("#Rut").children("option:selected").val();
		  		data[1] = $("#ID_Tour").children("option:selected").val();
		  		data[2] = $("#Fecha_Tour").val();
		  		data[3] = $("#Precio").val();
		  		data[4] = $("#Descuento").val();

		  		$.ajax(
		  		{
		  			type:'POST',
		            url: 'Modify.php',
		            data: {
		            	function : 'TablaTuristTour',
		            	Rut_Turista : data[0],
		            	ID_Tour :data[1],
		            	Fecha_Tour :data[2],
		            	Precio :data[3],
		            	Descuento : data[4] 
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
		  		data[0] = $("#Rut").children("option:selected").val();
		  		data[1] = $("#ID_Tour").children("option:selected").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Delete.php',
		            data: {
		            	function : 'TablaTuristTour',
		            	Rut_Turista : data[0],
		            	ID_Tour :data[1]
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

	<form class="container-fluid shadow">
		<div class="row shadow" style="margin: 30px; background-color: #DCDCDC ">
			<div class="col-3 align-horizontal-3 ">
				<div class="form-group ">
					<p>Turista:</p>
				   	<label for="Rut">Rut</label>
				   	<select class="form-control" id="Rut">
				   		<?php
				    		require_once 'Query_Select.php';

				    		Rut_Turista();
				    	?>
				   	</select>

				    <label for="Nombre_Persona">Nombre</label>
				    <input type="text" class="form-control" id="Nombre_Persona" placeholder="Nombre" disabled>

				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Datos del tour:</p>
				   	<label for="ID_Tour">ID Tour</label>
				    <select class="form-control" id="ID_Tour">
				    	<?php
				    		require_once 'Query_Select.php';
				    		ID_Tour();
				    	?>
				    </select> 

				    <label for="Nombre_Tour">Nombre</label>
				    <input type="text" class="form-control" id="Nombre_Tour" placeholder="Nombre" disabled>

				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Datos:</p>
				   	<label for="Fecha_Tour">Fecha tour</label>
				    <input class="form-control" type="text" id="Fecha_Tour" placeholder="AAAA-MM-DD">

				    <label for="Precio">Precio</label>
				    <input class="form-control" type="number" id="Precio" placeholder="0" min="0">

				    <label for="Descuento">Descuento</label>
				    <input class="form-control" type="number" id="Descuento" placeholder="0" min="0" >

				</div>
				
			</div>
			<button type="button" id="add" class="btn btn-primary form-control">Añadir</button>
			<button type="button" id="modify" class="btn btn-warning form-control">Modificar</button>
			<button type="button" id="delete" class="btn btn-danger form-control">Eliminar</button>
		</div>
		
	</form>

	<table class="table table-bordered table-striped">
		<thead class="table-head shadow">
			<tr>
				<td>Rut turista</td>
				<td>Nombre turista</td>
				<td>ID Tour</td>
				<td>Nombre Tour</td>

				<td>Fecha del tour</td>
				<td>Precio</td>
				<td>Descuento</td>
				
				
			</tr>
		</thead>
		<tbody id="myTable">
			<?php 
					
			?>
		</tbody>
	</table>
</body>
</html>