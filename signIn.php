<?php
	require_once("layout.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>
        Sign in : Nooply
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
	<?php print_header_login()?>
	<!-- Contenido -->
    <div class="container">
    	<div class="row col-md-6 col-md-offset-3 contenedor">
	    	<div class="row-fluid">
		
	    		<form form action="addAccount.php" enctype="multipart/form-data" id="signIn" class="form-horizontal" role="form"  method="POST">
					<legend>New account</legend>
					    <label for="name">Name:</label>
					    	<input type="text" name="name" class="form-control" id="name" placeholder="Your name" required>
					    <br>
					    <label for="email">Email:</label>
					    	<input type="text" name="email" class="form-control" id="email" placeholder="Your email" required>
					    <br>
					    <label for="password">Password:</label>
					    	<input type="password" name="password" class="form-control" id="password" placeholder="Your password" required >
					    <br>
					    <label for="password2">Confirm password:</label>
					    	<input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm your password" required>
					    <br>
					    <button class="btn btn-primary signIn" type="submit" onclick="validateEmail()">Create account</button>
				</form>

		    	
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

		function validateEmail() {
		  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  if(!regex.test($("#email").val())){
			$("#email").attr("placeholder","Invalid email")
			$("#email").val("");
		  }else{
			//$("#signIn").submit();	
		  }
		}
    </script>
</body>
</html>
