<?php
function print_header($id) {
?>
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
          <li ><a href="index.php">Home</a></li>
        </ul>            
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="logout.php">Log out</a></li>
                  <li><a href="user.php">User info</a></li>
              </ul>
            </li>
          </ul> 
      </div><!--/.nav-collapse -->
    </div>
  </div>

<?php
}
function print_header_login() {
?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="login.php">Nooply</a>
      </div>
      <div class="collapse navbar-collapse">       
        <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav">
              <li><a href="signIn.php">Sign in</a></li>
            </ul>
        </ul> 
      </div><!--/.nav-collapse -->
    </div>
  </div>
<?php
}
?>