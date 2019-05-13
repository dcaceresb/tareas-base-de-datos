<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'php/Header.php';
	?>	
	<link rel="stylesheet" type="text/css" href="css/Styles.css">
	<title></title>
</head>

<body>

	<form class="container-fluid shadow" action="php/Inicio.php" method="POST">
		<div class="row">
			<div class="col-3 col-centered gray-back">
				<div class="form-group ">

				   	<label for="exampleInputEmail1">User</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		
	</form>

</body>
</html>