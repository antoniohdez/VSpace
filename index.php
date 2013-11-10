<?php
	require_once("layout.php");
	require_once("driver.php");

    $driver = new dbDriver();
	if(!isset($_SESSION["name"])){
		header('Location: login.php?err=2');
		exit();
	} 
	$id = $_SESSION["user_id"];
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
	    			How are you feeling, <?php echo $_SESSION["name"]; ?>?
	    		</div>
		    	<div id="container-images" class="col-md-12 center-content">
		    		<span class="width-auto">
			    		<span id="happy" class="image">
							<img src="img/images/happy.png" alt="Happy">
			    		</span>
			    		<span id="sad" class="image">
			    			<img src="img/images/sad.png" alt="Sad">
			    		</span>
			    		<span id="excited" class="image">
			    			<img src="img/images/excited.png" alt="Excited">
			    		</span>
			    		<span id="embarrassed" class="image">
			    			<img src="img/images/embarrassed.png" alt="Embarrassed">
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
						    <div class="col-lg-10 col-lg-offset-1">
						        <input type="text" value="<?php echo $id?>" style="display: none;" class="form-control"  id="user_id">
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
			$("#error").show();
			$("#error").html("Select a feeling.");
			$("html, body").animate({ scrollTop: 0 }, 600);
		}
		else if(latitude === "" || longitude === ""){
			$("#error").show();
			$("#error").html("We couldn't find your location.");
			$("html, body").animate({ scrollTop: 0 }, 600);
		}
		else{
			var parametros = {
				"feeling" : feeling,
				"latitude" : marker.getPosition().lat(),
				"longitude" : marker.getPosition().lng(),
				"message" : $("#message").val(),
				"user_id" : $("#user_id").val()
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
	                if(response == "success"){
	                	$(".image-selected").removeClass("image-selected");
	                	$("#message").val("");
	                	$("#error").hide();
	                	$("#success").show();
	                	$("html, body").animate({ scrollTop: 0 }, 600);
	                }
	                else {
	                	$("#success").hide();
	                	$("#error").html(response);
	                	$("#error").show();
	                	$("html, body").animate({ scrollTop: 0 }, 600);
	                }
	            }
	        });
		}
	}
	</script>
</body>
</html>