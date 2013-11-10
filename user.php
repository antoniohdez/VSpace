<?php
	require_once("layout.php");
	require_once("driver.php");
	$driver = new dbDriver();
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
	<?php
		print_header_login();
		$row = $driver->getUser(1);
	?>
	<!-- Contenido -->
    <div class="container">
    	<div class="row col-md-6 col-md-offset-3 contenedor">
	    	<div class="row-fluid">
	    		<form class="form-horizontal" role="form" action="SeleccionMaterias.php" method="get">
				  	<div class="form-group">
				    	<label for="name" class="col-md-3 control-label">Name:</label>
				    	<div class="col-md-9">
				      		<p class="form-control-static"><?php printf($row["name"]); ?></p>
				    	</div>
				  	</div>
				  	<div class="form-group">
					    <label for="email" class="col-md-3 control-label">Email:</label>
				    	<div class="col-md-9">
				      		<p class="form-control-static"><?php printf($row['email']); ?></p>
				    	</div>
					</div>
					<?php
					$data = $driver->getTags(1);
					print '
						<table class="table table-hover">
                        	<thead>
                          		<tr>
                            		<th>#</th>
                                    <th>Feeling</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Message</th>
                                </tr>
                        	</thead>
                            <tbody>';
					while ($row = mysqli_fetch_array($data)) {
						
                                print '<tr class="success">
                                	<td>'.$row["id"].'</td>
                                	<td>'.$row["feeling"].'</td>
                                	<td>'.$row["latitude"].'</td>
                                	<td>'.$row["longitude"].'</td>
                                    <td>'.$row["message"].'</td>
                                    
                              	</tr>';

					}
					print '
                            </tbody>
                        </table>';
					?>
					<!--
					<div class="form-group">
					    <label for="phone" class="col-md-3 control-label">Teléfono:</label>
					    <div class="col-md-9">
					    	<input type="text" name="phone" class="form-control" id="phone" value="'.$row["Telefono"].'" placeholder="(33) 4455-66-77">
					    </div>
					</div>
				-->
					
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

    </script>
</body>
</html>
