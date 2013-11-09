<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>
        Nooply
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
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Nooply</a>
			</div>
			<div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
				</ul>            
                <ul class="nav navbar-nav navbar-right">
  					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Option 1</a></li>
                            <li role="presentation" class="divider"></li>
                            <li><a href="#">Log out</a></li>
                        </ul>
                    </li>
				</ul> 
			</div><!--/.nav-collapse -->
		</div>
	</div><!--/.navbar -->
	<!-- Contenido -->
    <div class="container">
    	<div class="row col-md-6 col-md-offset-3 contenedor">
	    	<div class="row">
	    		<div class="center-content">
					<h3>Create account</h3>
				</div>
	    		<form id="signIn" class="form-horizontal" role="form" action="addAccount.php" method="post">
					<div class="form-group">
					    <label for="name" class="col-md-3 control-label">Name:</label>
					    <div class="col-md-9">
					    	<input type="text" name="name" class="form-control" id="name" required>
					    </div>
					</div>
					<div class="form-group">
					    <label for="email" class="col-md-3 control-label">Email:</label>
					    <div class="col-md-9">
					    	<input type="text" name="email" class="form-control" id="email" required>
					    </div>
					</div>
					<div class="form-group">
					    <label for="password" class="col-md-3 control-label">Password:</label>
					    <div class="col-md-9">
					    	<input type="password" name="password" class="form-control" id="password" required >
					    </div>
					</div>
					<div class="form-group">
					    <label for="password2" class="col-md-3 control-label">Confirm password:</label>
					    <div class="col-md-9">
					    	<input type="password" name="password2" class="form-control" id="password2" required>
					    </div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-3 col-md-9">
					    	<button class="btn btn-primary signIn" type="submit" onclick="validateEmail()">Create account</button>
					    </div>
					</div>
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
