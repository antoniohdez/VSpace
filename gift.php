<?php
    require_once("driver.php");
    require_once("layout.php");
    $driver = new dbDriver();
    if(!isset($_GET["id"])){
        header('Location: index.php');
        exit();
    } 
    $id = $_GET["id"];
    if(!isset($_SESSION["name"])){
		header('Location: login.php?err=2&id='.$id);
		exit();
	} 
    $driver = new dbDriver();
    $data = $driver->getTag($id);
    $name = $data["user_name"];
    $feeling = $data["feeling"];
    $user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>
        Gifts : Nooply
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
        <?php print_header(); ?>
        <!-- Contenido -->
    <div class="container">
            <div class="row col-md-8 col-md-offset-2 contenedor">
                    <div class="row">
                            <div class="center-content title">
                                    Give a gift to your friend...
                            </div>
                            <br>
                            <div id="container-info" class="col-md-12 center-content">
                                    <div class="center-content text">
                                    <h4>
                                            Your friend, <b><?php echo $name; ?></b>, is feeling <b><?php echo $feeling; ?></b>, give him/her a gift!
                                    </h4>
                                    </div>
                            </div>
                            <div id="container-images" class="col-md-12 center-content">
                                    <span class="width-auto">
                                            <span id="beer" class="image">
                                                        <img src="img/images/Beer.png" alt="Beer">
                                            </span>
                                            <span id="love" class="image">
                                                    <img src="img/images/Love.png" alt="Love">
                                            </span>
                                            <span id="icecream" class="image">
                                                    <img src="img/images/Icecream.png" alt="Icecream">
                                            </span>
                                            <span id="like" class="image">
                                                    <img src="img/images/Like.png" alt="Like">
                                            </span>
                                            <span id="coffee" class="image">
                                                    <img src="img/images/Coffee.png" alt="Coffee">
                                            </span>
                                            <span id="hug" class="image">
                                                    <img src="img/images/Hug.png" alt="Hug">
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
                                                        <input type="text" class="form-control" value="<?php echo $user_id?>" style="display: none;" id="user_id" placeholder="Message">
                                                    </div>
                                                    <div class="col-lg-10 col-lg-offset-1">
                                                        <input type="text" class="form-control" value="<?php echo $id?>" style="display: none;" id="id" placeholder="Message">
                                                    </div>
                                                </div>
                                    </div>
                            </div>
                    
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                    <button id="button" type="button" class="btn btn-primary myButton" onclick="sendForm()">Send gift!</button>
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
        //Obtiene la imagen seleccionada
        $(document).ready(function(){
                $(".image").click(function(){
                $(".image-selected").removeClass("image-selected");
                $(this).addClass("image-selected");
                gift = $(this).attr("id");
                });
        });

    function sendForm(){
        if(gift === ""){
                alert("Select a gift.");
        }
        else{
                var parametros = {
                        "gift" : gift,
                        "message" : $("#message").val(),
                        "user_id" : $("#user_id").val(),
                        "id" : $("#id").val()

                }
                $.ajax({
            data: parametros,
            url: 'addGift.php',
            type: 'post',
            beforeSend: function () {
                $("#button").html("Sending gift...");
            },
            success:  function (response) {
                $("#button").html("Send gift!");
                alert(response);
            }
        });
        }
    }
        </script>
</body>
</html>