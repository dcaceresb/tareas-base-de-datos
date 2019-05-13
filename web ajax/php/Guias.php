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
		        data: { function : 'TablaGuia'},
		        success: function(respuesta) 
		        {
					$("#myTable").html(respuesta);
				}
		    });

		  
		}

		$(document).ready(function()
		{
			updateTable();
			
		  	$("#myTable").on('click','tr',function()
		  	{
		  		var data = $(this).children("td").map(function()
		  		{
		  			return $(this).text();
		  		}).get();

		  		$("#Rut").val(data[0]);
		  		$("#Nombre_Persona").val(data[1]);
		  		$("#Calle").val(data[2]);
		  		$("#Numero").val(data[3]);
		  		$("#Ciudad").val(data[4]);
		  		$("#Especialidad").val(data[6]);
		  		$('#Nivel').val(data[8]);
		  	});

		  	$("#add").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#Rut").val();
		  		data[1] = $("#Nombre_Persona").val();
		  		data[2] = $("#Calle").val();
		  		data[3] = $("#Numero").val();
		  		data[4] = $("#Ciudad").children("option:selected").val();
		  		data[5] = $("#Especialidad").children("option:selected").val();
		  		data[6] = $('#Nivel').val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Insert.php',
		            data: {
		            	function : 'TablaGuia',
		            	Rut : data[0],
		            	Nombre :data[1],
		            	Calle :data[2],
		            	Numero :data[3],
		            	Ciudad : data[4],
		            	Especialidad : data[5],
		            	Nivel : data[6]

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
		  		data[0] = $("#Rut").val();
		  		data[1] = $("#Nombre_Persona").val();
		  		data[2] = $("#Calle").val();
		  		data[3] = $("#Numero").val();
		  		data[4] = $("#Ciudad").children("option:selected").val();
		  		data[5] = $("#Especialidad").children("option:selected").val();
		  		data[6] = $('#Nivel').val();

		  		$.ajax(
		  		{
		  			type:'POST',
		            url: 'Modify.php',
		            data: {
		            	function : 'TablaGuia',
		            	Rut : data[0],
		            	Nombre :data[1],
		            	Calle :data[2],
		            	Numero :data[3],
		            	Ciudad : data[4],
		            	Especialidad : data[5],
		            	Nivel : data[6]
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
		            	function : 'TablaGuia',
		            	Rut : data[0],
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
					<p>Datos Personales:</p>
				   	<label for="Rut">Rut</label>
				    <input type="text" class="form-control" id="Rut" aria-describedby="emailHelp" placeholder="12345678-9">

				    <label for="Nombre_Persona">Nombre</label>
				    <input type="text" class="form-control" id="Nombre_Persona" placeholder="Nombre">

				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Direccion:</p>
					<label for="Calle">Calle</label>
				    <input type="text" class="form-control" id="Calle" placeholder="Nombre del contacto">

					<label for="Numero">Numero</label>
				    <input type="text" class="form-control" id="Numero" placeholder="Tefono del contacto">

				    <label for="Ciudad">Ciudad</label>
				    <select id="Ciudad" class="form-control">
				    	<?php
				    		require_once 'Query_Select.php';

				    		Nombre_CiudadT();
				    	?>
				    </select> 


				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Especialidades:</p>
				   	<label for="Especialidad">Especialidad</label>
				    <select id="Especialidad" class="form-control">
				    	<?php
				    		require_once 'Query_Select.php';

				    		Desc_Especialidad();
				    	?>
				    </select> 

				    <label for="Nivel">Nivel</label>
				    <input type="text" class="form-control" id="Nivel" placeholder="ej: Aprendiz">
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
				<td>Rut Guia</td>
				<td>Nombre Guia</td>
				<td>Calle</td>
				<td>Numero</td>
				<td>ID Ciudad</td>
				<td>Ciudad</td>
				<td>ID Especialidad</td>
				<td>Desc Especialidad</td>
				<td>Nivel</td>
			</tr>
		</thead>
		<tbody id="myTable">
			<?php 
					
			?>
		</tbody>
	</table>
</body>
</html>