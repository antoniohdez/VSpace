<?php
	require_once("layout.php");

	if(!isset($_SESSION["name"])){
		//header('Location: login.php?err=2');
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>
        Feelings : Nooply
    </title>
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--/.navbar -->
	<?php print_header() ?>
	<!-- Contenido -->
    <div class="container">
    	<div class="row col-md-8 col-md-offset-2 contenedor">
	    	<div class="row">
	    		<div id="success" class="alert alert-success" style="display:none">
	    			<strong>Great!</strong> You have successfully registered a feeling.
	    		</div>
	    		<div id="error" class="alert alert-danger" style="display:none">
	    			<strong>Oh snap!</strong> Something went wrong.
	    		</div>

	    		<div class="center-content title">
	    			I'm feeling...
	    		</div>
		    	<div id="container-images" class="col-md-12 center-content">
		    		<span class="width-auto">
			    		<span id="happy" class="image">
							<img src="img/images/happy.png" alt="Happy">
			    		</span>
			    		<span id="sad" class="image">
			    			<img src="img/images/sad.png" alt="Sad">
			    		</span>
			    		<span id="annoyed" class="image">
			    			<img src="img/images/annoyed.png" alt="Annoyed">
			    		</span>
			    		<span id="bored" class="image">
			    			<img src="img/images/bored.png" alt="Bored">
			    		</span>
			    		<span id="tired" class="image">
			    			<img src="img/images/tired.png" alt="Tired">
			    		</span>
			    		
		    		</span>
		    	</div>
		    	
	    	</div>
	    	<!--/row imagenes-->
	    	<div class="row">
		    	<div id="container-images" class="col-md-12 center-content">
			    	<div class="form-group">
						    <div class="col-lg-10 col-lg-offset-1">
						        <input type="text" class="form-control" id="message" placeholder="Message">
						    </div>
						</div>
			    	</div>
			    </div>
	    	<div class="row">
	    		<div class="col-md-12">

	    			<div id="map" style="height: 400px; margin-top: 20px;" />

	    		</div>		
		    </div>
		    <div class="row">
		    	<div class="col-md-4 col-md-offset-4">
		    		<button id="button" type="button" class="btn btn-primary myButton" onclick="sendForm()">Done!</button>
		    	</div>
		    </div>
	    </div>
	</div>
	<!--/Contenido-->
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVgCfLPVEZGCXt7lMuuU-Q0jDrwfz6FtY&sensor=false">
    </script>
    <script type="text/javascript" src="js/map.js">
    </script>
    <script type="text/javascript">
    $("#error").hide();
	$("#success").hide();
	//Obtiene la imagen seleccionada
	$(document).ready(function(){
		
		$(".image").click(function(){
		$(".image-selected").removeClass("image-selected");
		$(this).addClass("image-selected");
		feeling = $(this).attr("id");
		});
	});

    function sendForm(){
		if(feeling === ""){
			alert("Select an \"I'm feeling\" option.");
		}
		else if(latitude === "" || longitude === ""){
			alert("We couldn't find your location.");
		}
		else{
			var parametros = {
				"feeling" : feeling,
				"latitude" : marker.getPosition().lat(),
				"longitude" : marker.getPosition().lng(),
				"message" : $("#message").val()
			}
			$.ajax({
	            data: parametros,
	            url: 'addPoint.php',
	            type: 'post',
	            beforeSend: function () {
	                $("#button").html("Saving point...");
	            },
	            success:  function (response) {
	                $("#button").html("Done!");
	                if(response == "error"){

	                	$("#success").hide();
	                	$("#error").show();
	                }
	                else if(response == "success"){
	                	$(".image-selected").removeClass("image-selected");
	                	$("#message").val("");
	                	$("#error").hide();
	                	$("#success").show();
	                }
	            }
	        });
		}
	}
	</script>
</body>
</html>
