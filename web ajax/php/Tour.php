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
		        data: { function : 'TablaTour'},
		        success: function(respuesta) 
		        {
					$("#myTable").html(respuesta);
				}
		    });

		  
		}

		$(document).ready(function()
		{
			updateTable();
		  	$("#ID_Lugar").click(function()
		  	{
		  		var id = $(this).children("option:selected").val();

		  		$.ajax(
			    {
			        type:'POST',
			        url: 'Query_Select.php',
			        data: {
			          	function: 'NombreLugar', 
			          	id : id
			        },
			        success: function(respuesta) 
			           {
						$("#Nombre_Lugar").val(respuesta);
					}
			    });

			    $.ajax(
			    {
			        type:'POST',
			        url: 'Query_Select.php',
			        data: {
			          	function: 'NombreCiudad', 
			          	id : id
			        },
			        success: function(respuesta) 
			        {
						$("#Nombre_Ciudad").val(respuesta);
					}
			    });
		  	});

		  	$("#ID_Lugar").change(function()
		  	{
		  		var id = $(this).children("option:selected").val();

		  		$.ajax(
			    {
			        type:'POST',
			        url: 'Query_Select.php',
			        data: {
			          	function: 'NombreLugar', 
			          	id : id
			        },
			        success: function(respuesta) 
			        {
						$("#Nombre_Lugar").val(respuesta);
					}
			    });

			    $.ajax(
			    {
			        type:'POST',
			        url: 'Query_Select.php',
			        data: {
			          	function: 'NombreCiudad', 
			          	id : id
			        },
			        success: function(respuesta) 
			        {
						$("#Nombre_Ciudad").val(respuesta);
					}
			    });

		  	});
		  	
		  	$("#myTable").on('click','tr',function()
		  	{
		  		var data = $(this).children("td").map(function()
		  		{
		  			return $(this).text();
		  		}).get();

		  		$("#ID_Tour").val(data[0]);
		  		$("#Nombre_Tour").val(data[1]);
		  		$("#Min_Group").val(data[2]);
		  		$("#Costo_Indv").val(data[3]);
		  		$("#Costo_Grup").val(data[4]);
		  		$("#ID_Lugar").val( data[5]) ;
		  		$("#Nombre_Lugar").val(data[6]);
		  	});

		  	$("#add").click(function()
		  	{

		  		var data = [];
		  		data[0] = $("#ID_Tour").val();
		  		data[1] = $("#Nombre_Tour").val();
		  		data[2] = $("#Min_Group").val();
		  		data[3] = $("#Costo_Indv").val();
		  		data[4] = $("#Costo_Grup").val();
		  		data[5] = $("#ID_Lugar").val( ) ;
		  		data[6] = $("#Nombre_CiudadT").children("option:selected").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Insert.php',
		            data: {
		            	function : 'TablaTour',
		            	ID_Tour : data[0],
		            	Nombre_Tour :data[1],
		            	Min_Group :data[2],
		            	Costo_Indv :data[3],
		            	Costo_Grup : data[4],
		            	ID_Lugar :data[5],
		            	ID_Ciudad : data[6]
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
		  		data[0] = $("#ID_Tour").val();
		  		data[1] = $("#Nombre_Tour").val();
		  		data[2] = $("#Min_Group").val();
		  		data[3] = $("#Costo_Indv").val();
		  		data[4] = $("#Costo_Grup").val();
		  		data[5] = $("#ID_Lugar").val( ) ;
		  		data[6] = $("#Nombre_CiudadT").children("option:selected").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Modify.php',
		            data: {
		            	function : 'TablaTour',
		            	ID_Tour : data[0],
		            	Nombre_Tour :data[1],
		            	Min_Group :data[2],
		            	Costo_Indv :data[3],
		            	Costo_Grup : data[4],
		            	ID_Lugar :data[5],
		            	ID_Ciudad : data[6]
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
		  		data[0] = $("#ID_Tour").val();

		  		$.ajax({
		  			type:'POST',
		            url: 'Delete.php',
		            data: {
		            	function : 'TablaTour',
		            	id : data[0]

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
					<p>Datos del tour:</p>
				   	<label for="ID_Tour">ID Tour</label>
				    <input type="number" min="1" class="form-control" id="ID_Tour" aria-describedby="emailHelp" placeholder="1">

				    <label for="Nombre_Tour">Nombre del tour</label>
				    <input type="text" class="form-control" id="Nombre_Tour" placeholder="Nombre">

				    <label for="Min_Group">Grupo minimo</label>
				    <input type="number" min="0" class="form-control" id="Min_Group" aria-describedby="emailHelp" placeholder="0">


				    <label for="Nombre_CiudadT">Ciudad del tour</label>
				    <select id="Nombre_CiudadT" class="form-control">
				    	<?php
				    		require_once 'Query_Select.php';

				    		Nombre_CiudadT();
				    	?>
				    </select> 

				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Costos:</p>
					<label for="Costo_Indv">Costo individual</label>
				    <input type="number" min="0" class="form-control" id="Costo_Indv" placeholder="0">

					<label for="Costo_Grup">Costo grupal</label>
				    <input type="number" min="0" class="form-control" id="Costo_Grup" placeholder="0">

				</div>
			</div>
			<div class="col-3 align-horizontal-3  ">
				<div class="form-group ">
					<p>Lugar:</p>
				   	<label for="ID_Lugar">ID Lugar</label>
				    <select id="ID_Lugar" class="form-control">
				    	<?php

				    		require_once 'Query_Select.php';
				    		ID_Lugar();
				    		//echo "<script>alert('afgg')</script>";
				    	?>
				    </select> 

				    <label for="Nombre_Lugar">Nombre Lugar</label>
				    <input type="text" class="form-control" id="Nombre_Lugar" placeholder="Nombre" disabled>

				    <label for="Nombre_Ciudad">Nombre Ciudad</label>
				    <input type="text" class="form-control" id="Nombre_Ciudad" placeholder="Nombre ciudad" disabled>
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
				<td>ID Tour</td>
				<td>Nombre Tour</td>
				<td>Grupo minimo</td>
				<td>Costo individual</td>
				<td>Costo grupal</td>
				<td>ID Lugar</td>
				<td>Nombre Lugar</td>
			</tr>
		</thead>
		<tbody id="myTable">
			<?php 
					
			?>
		</tbody>
	</table>
</body>
</html>