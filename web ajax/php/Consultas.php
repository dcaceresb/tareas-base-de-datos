<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		include 'Header.php';
	?>	

	<script type="text/javascript">
		function updateTable(id)
		{

			$.ajax(
		    {
		        type:'POST',
		        url: 'Querys.php',
		        data: 
		        { 
		        	Consulta : id
		    	},
		        success: function(respuesta) 
		        {
					$("#myTable").html(respuesta);
				}
		    });

		  
		}

		$(document).ready(function()
		{
			

		  	$("#Consulta").click(function()
		  	{
		  		var id = $(this).children("option:selected").val();
		  		if(id=="0")
		  		{
		  			$("#Descripcion").val('No ha seleccionado la Consulta');
		  		}
		  		else
		  		{
		  			if(id=="1")
		  			{
		  				$("#Descripcion").val('Descripcion 1');
		  			}
		  			else if(id=="2")
		  			{
		  				$("#Descripcion").val('Descripcion 2');
		  			}
		  			else if(id=="3")
		  			{
		  				$("#Descripcion").val('Descripcion 3');
		  			}
		  			else if(id=="4")
		  			{
		  				$("#Descripcion").val('Descripcion 4');
		  			}
		  			else if(id=="5")
		  			{
		  				$("#Descripcion").val('Descripcion 5');
		  			}
		  			updateTable(id);
		  		}
		  		
		  	});

		  	$("#Consulta").change(function()
		  	{
		  		var id = $(this).children("option:selected").val();
		  		if(id=="0")
		  		{
		  			$("#Descripcion").val('No ha seleccionado la Consulta');
		  		}
		  		else
		  		{
		  			if(id=="1")
		  			{
		  				$("#Descripcion").val('Descripcion 1');
		  			}
		  			else if(id=="2")
		  			{
		  				$("#Descripcion").val('Descripcion 2');
		  			}
		  			else if(id=="3")
		  			{
		  				$("#Descripcion").val('Descripcion 3');
		  			}
		  			else if(id=="4")
		  			{
		  				$("#Descripcion").val('Descripcion 4');
		  			}
		  			else if(id=="5")
		  			{
		  				$("#Descripcion").val('Descripcion 5');
		  			}

		  			updateTable(id);
		  		}

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
			<div class="col-3 align-horizontal-1 ">
				<div class="form-group ">
					<p>Consulta:</p>
				   	<label for="Consulta">Consulta N°</label>
				   	<select class="form-control" id="Consulta">
				   		<option value="0">Ninguna</option>
				   		<option value="1">1</option>
				   		<option value="2">2</option>
				   		<option value="3">3</option>
				   		<option value="4">4</option>
				   		<option value="5">5</option>
				   	</select>

				    <label for="Descripcion">Nombre</label>
				    <input type="text" class="form-control" id="Descripcion" placeholder="No ha seleccionado Consulta" disabled>

				</div>
			</div>

		</div>
		
	</form>

	<table class="table table-bordered table-striped" id="myTable">
		<thead class="table-head shadow">

		</thead>
		<tbody >

		</tbody>
	</table>
</body>
</html>