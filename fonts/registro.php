<!DOCTYPE html>
<?php
	if(isset($_POST["carnet"])){
		$carnet = $_POST["carnet"];
		
		$ok=1;
		//validando
		if(preg_match('/[A-Z][A-Z][0-9]{5}/', $carnet)){
			echo 'carnet valido';
		}
		else{echo 'carnet NOT valido';}
		
		include 'sql-open.php';
		$query = "INSERT INTO `registro`(`carnet`) VALUES ('".$carnet."');";
		$result = $con->query($query); 	
		include "sql-close.php";
	}
?>
<html lang="en">
<head>
	<title>Seminario interno 2019</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="main-div">
	<span class="login100-form-title p-b-34">
		<h1>Seminario interno 2019</h1>
	</span>
	<form class="login100-form validate-form" action = "registro.php" method = "POST">
		<span class="login100-form-title p-b-34">
			Registrar asistencia:
		</span>
		
		<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Escriba un código de empleado">
			<input autofocus id="first name" class="input100" type="text" name="carnet" placeholder="Código de empleado"  onkeyup="javascript:this.value=this.value.toUpperCase();">
			<span class="focus-input100"></span>
		</div>
		
		<div class="container-login100-form-btn">
			<button class="login100-form-btn">
				Registrar
			</button>
		</div>
	</form>
</div>

<div class="main-div">
	<span class="login100-form-title p-b-34">
		Últimos registros:
	</span>
	

		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Carnet</th>
								<th class="column2">Hora de registro</th>
							</tr>
						</thead>
						<tbody>
							<?php
								include 'sql-open.php';

								$sql = 'SELECT id,carnet, fecha FROM registro ORDER BY id DESC LIMIT 10;';

								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo '
											<tr>
											<td class="column1">'.$row["carnet"].'</td>
											<td class="column2">'.$row["fecha"].'</td>
											</tr>		
										';
									}
								}

								include "sql-close.php";
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	

</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>