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
		        data: {function : 'TablaTurista'},
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

		  		$.ajax(
			    {
			        type:'POST',
			        url: 'Query_Select.php',
			        data: {
			          	function: 'NombreEnfermedad', 
			          	id : id
			        },
			        success: function(respuesta) 
			           {
						$("#Nombre_Tour").val(respuesta);
					}
			    });
		  	});

		  	$("#ID_Tour").change(function()
		  	{
		  		var id = $(this).children("option:selected").val();

		  		$.ajax(
			    {
			        type:'POST',
			        url: 'Query_Select.php',
			        data: {
			          	function: 'NombreEnfermedad', 
			          	id : id
			        },
			        success: function(respuesta) 
			           {
						$("#Nombre_Tour").val(respuesta);
					}
			    });

		  	});

		  	$("#myTable").on('click','tr',function()
		  	{
		  		var data = $(this).children("td").map(function()
		  		{
		  			return $(this).text();
		  		}).get();

		  		$("#Rut").val(data[0]);
		  		$("#Nombre_Persona").val(data[1]);
		  		$("#Fecha").val(data[2]);
		  		$("#Tel_Contacto").val(data[3]);
		  		$("#Contacto").val(data[4]);
		  		$("#ID_Tour").val( data[5]) ;
		  		$("#Nombre_Tour").val(data[6]);
		  	});

		  	$("#add").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#Rut").val();
		  		data[1] = $("#Nombre_Persona").val();
		  		data[2] = $("#Fecha").val();
		  		data[3] = $("#Tel_Contacto").val();
		  		data[4] = $("#Contacto").val();
		  		data[5] = $("#ID_Tour").val( ) ;

		  		$.ajax({
		  			type:'POST',
		            url: 'Insert.php',
		            data: {
		            	function : 'TablaTurista',
		            	rut : data[0],
		            	nombre :data[1],
		            	fecha :data[2],
		            	contacto :data[3],
		            	tel : data[4],
		            	id_enf :data[5]
		            },
		            success: function(respuesta) 
		            {
		            	
						$.alert(
						{
							title: 'Correcto!',
							content: 'Consulta finalizada correctamente'
						})
						updateTable();
						

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
		  		data[0] = $("#Rut").val();
		  		data[1] = $("#Nombre_Persona").val();
		  		data[2] = $("#Fecha").val();
		  		data[3] = $("#Tel_Contacto").val();
		  		data[4] = $("#Contacto").val();
		  		data[5] = $("#ID_Tour").val( ) ;

		  		$.ajax({
		  			type:'POST',
		            url: 'Modify.php',
		            data: {
		            	function : 'TablaTurista',
		            	rut : data[0],
		            	nombre :data[1],
		            	fecha :data[2],
		            	contacto :data[3],
		            	tel : data[4],
		            	id_enf :data[5]
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
		  		data[0] = $("#Rut").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Delete.php',
		            data: {
		            	function : 'TablaTurista',
		            	rut : data[0],

		            },
		            success: function(respuesta) 
		            {
		            	
						$.alert(
						{
							title: 'Correcto!',
							content: 'Consulta finalizada correctamente'
						})
						updateTable();
						

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
					<p>Datos Personales:</p>
				   	<label for="Rut">Rut</label>
				    <input type="text" class="form-control" id="Rut" placeholder="12345678-9">

				    <label for="Nombre_Persona">Nombre</label>
				    <input type="text" class="form-control" id="Nombre_Persona" placeholder="Nombre">

				    <label for="Fecha">Fecha nacimiento</label>
				    <input type="text" class="form-control" id="Fecha" placeholder="AAAA-MM-DD">
				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Persona de contacto:</p>
					<label for="Tel_Contacto">Nombre de contacto</label>
				    <input type="text" class="form-control" id="Tel_Contacto" placeholder="Nombre del contacto">

					<label for="Contacto">Telefono</label>
				    <input type="text" class="form-control" id="Contacto" placeholder="Tefono del contacto">

				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Enfermedad:</p>
				   	<label for="ID_Tour">ID Enfermedad</label>
				    <select id="ID_Tour" class="form-control">
				    	<?php
				    		include_once 'Query_Select.php';
				    		ID_Enfermedad();
				    	?>
				    </select> 

				    <label for="Nombre_Tour">Descripcion Enfermedad</label>
				    <input type="text" class="form-control" id="Nombre_Tour" placeholder="No posee enfermedad" disabled>
				</div>
				
			</div>
			<button type="button" id="add" class="btn btn-primary form-control">Añadir</button>
			<button type="button" id="modify" class="btn btn-warning form-control">Modificar</button>
			<button type="button" id="delete" class="btn btn-danger form-control">Eliminar</button>

		</div>
		
	</form>

	<table class="table table-striped container-fluid">
		<thead class="table-head shadow">
			<tr>
				<td>Rut turista</td>
				<td>Nombre turista</td>
				<td>Fecha de nacimiento</td>
				<td>Persona de contacto</td>
				<td>Telefono de contacto</td>
				
				<td>ID Enfermedad</td>
				<td>Descripcion Enfermedad</td>
			</tr>
		</thead>
		<tbody id="myTable">
			<?php 
					
			?>
		</tbody>
	</table>
</body>
</html>