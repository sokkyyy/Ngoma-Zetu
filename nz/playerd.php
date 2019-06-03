<?php
ob_start();
session_start();
require_once 'dbconnect.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ngoma Zetu</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>

</head>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="assets/ngoma.jpeg.png" style = "height: 50px;margin-top: -13px; width:160px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><form action="search2.php" method="GET">
                    <div class="active-purple-3 active-purple-4 mb-4">
                    <input class="form-control" type="search" placeholder="Search" name="search" >
                </form></li> <li><a href="indexup.php" class="active">Upload</a></li> 

            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['username']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <?php
    $musicInfo=$_GET['name'];

    $musicDet = substr($musicInfo,9,-4);

    
    

    ?>
    <h4 id="musicDet"><?php echo $musicDet?></h4>
	<audio controls="" src="<?php echo $_GET['name']; ?>" type = "audio/mpeg , audio/mp3" id ="player" >
    </audio>
        <a href="<?php echo $musicInfo; ?>" target="_blank" download id="buysong">Download</a>
    
    

   
 </body>
 </html>