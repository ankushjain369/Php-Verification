<?php

session_start();

if(!isset($_SESSION['user'])){
    echo "You are logged out";
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'links/links.php'; ?>
    <?php include 'links/bootstraplinks.php'; ?>
	<?php include 'css/homestyle.php'; ?>
	<title>HomePage</title>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)"><img src="logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li></li>
        <li class="nav-item usergreetings">
          <a class="nav-link" href="javascript:void(0)">Hello, <?php echo $_SESSION['user']; ?> !! Welcome Back</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container-fluid mt-5 service-style" id="aboutid">
    <div class="row">
        <div class="col-md-12 col-12 mx-auto">
            <h1 class="text-center main-heading">Our Services</h1>
            <p class="text-center sub-heading">grow your business with us</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="our-services settings">
                            <div class="icon">
                                <img src="homeimages/images/settings2.png" alt="settingImage" class="settingImg">
                            </div>
                            <h4>Settings</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia cupiditate consequatur reiciendis vel quam </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="our-services speedup">
                            <div class="icon">
                                <img src="homeimages/images/speed2.png" alt="settingImage" class="settingImg">
                            </div>
                            <h4>SpeedUp</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia cupiditate consequatur reiciendis vel quam </p>
                        </div>

                    </div>
                </div><div class="col-md-4">
                    <div class="box">
                        <div class="our-services privacy">
                            <div class="icon">
                                <img src="homeimages/images/privacy2.png" alt="settingImage" class="settingImg">
                            </div>
                            <h4>Privacy</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia cupiditate consequatur reiciendis vel quam </p>
                        </div>

                    </div>
                </div><div class="col-md-4">
                    <div class="box">
                        <div class="our-services backups">
                            <div class="icon">
                                <img src="homeimages/images/backup2.png" alt="settingImage" class="settingImg">
                            </div>
                            <h4>BackUps</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia cupiditate consequatur reiciendis vel quam </p>
                        </div>

                    </div>
                </div><div class="col-md-4">
                    <div class="box">
                        <div class="our-services ssl">
                            <div class="icon">
                                <img src="homeimages/images/ssl2.png" alt="settingImage" class="settingImg">
                            </div>
                            <h4>SSL Secured</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia cupiditate consequatur reiciendis vel quam </p>
                        </div>

                    </div>
                </div><div class="col-md-4">
                    <div class="box">
                        <div class="our-services database">
                            <div class="icon">
                                <img src="homeimages/images/database2.png" alt="settingImage" class="settingImg">
                            </div>
                            <h4>DataBase</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse mollitia cupiditate consequatur reiciendis vel quam </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>