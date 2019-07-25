<!DOCTYPE html>
<?php
	if(isset($_POST["carnet"])){
		$carnet = $_POST["carnet"];
		
		$ok=1;
		//validando
		if(preg_match('/[A-Z][A-Z][0-9]{5}[A-Z]/', $carnet)){
			$ok=1;
		}
		if(preg_match('/[A-Z][A-Z][0-9]{5}/', $carnet)){
			$ok=1;
		}
		else{$ok=0;}
		
		if($ok=1){
			include 'sql-open.php';
			$query = "INSERT INTO `registro`(`carnet`) VALUES ('".$carnet."');";
			$result = $con->query($query); 	
			include "sql-close.php";			
		}		
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

   <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/jquery-barcode.js"></script>
    <script type="text/javascript">
    
      function generateBarcode(){
        var value = document.getElementById("carnet").value;
        var btype = "code128";
        var renderer = "canvas";

        var settings = {
          output:renderer,
          bgColor: "#ffffff",
          color: "#000000",
          barWidth: 2,
          barHeight: 100,
          moduleSize: $("#moduleSize").val(),
          posX: 0,
          posY: 0,
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#canvasTarget").show().barcode(value, btype, settings);
		  
        } 
      }
          

      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
      });
    </script>
</head>
<body>
<div class="main-div">
	<span class="login100-form-title p-b-34">
		<h1>Seminario interno 2019</h1>
	</span>
	
		<span class=" no-print login100-form-title p-b-34">
			Generar código:
		</span>
		
		<div class=" no-print wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Escriba un código de empleado">
			<input autofocus id="carnet" class="input100" type="text" name="carnet" placeholder="Código de empleado"  onkeyup="javascript:this.value=this.value.toUpperCase();">
			<span class="focus-input100"></span>
		</div>
		
		<div class=" no-print container-login100-form-btn">
			<button  type="submit" class="login100-form-btn" onclick="generateBarcode();">
				Generar
			</button>
		</div>
	

	<canvas id="canvasTarget" width="300" height="150"></canvas> 
</div>


</body>
</html>