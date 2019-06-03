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


// select user's uploads



?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ngoma Zetu</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>

</head>
<body style="background-color: #a30059ff">

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
            <a class="navbar-brand" href="#"><img src="assets/ngoma.jpeg.png" style = "height: 50px;margin-top: -13px; width:160px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><form action="search2.php" method="GET">
                    <div class="active-purple-3 active-purple-4 mb-4">
                    <input type="search" placeholder="Search" name="search" >
                </form></li> <li><a href="indexup.php" class="active" >UPLOAD</a></li> 
                <li><a href="" class="active"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['username']; ?>
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



<div class="container">

    <!-- Jumbotron-->
    <div class="jumbotron">
        <h4>Recent Uploads:</h4>
              
            <table class="table" ><thread ><tr><th>Artist</th><th>Song Name</th><th>Category</th></tr></thread> 
            
                <?php 

                require 'dbconnect.php';
                
                $getMusicUploads = "SELECT uploads.userid, users.id, uploads.name, uploads.artist, uploads.title, uploads.category
                 FROM uploads
                 INNER JOIN users
                 ON  uploads.userid=users.id";

                $musicUploads = $conn->query($getMusicUploads);

                if (mysqli_num_rows($musicUploads) > 0) {
                    while($musicrow = mysqli_fetch_array($musicUploads)) {
                        $rowMusic = $musicrow['name'];
                        $rowArtist = $musicrow['artist'];
                        $rowCategory = $musicrow['category'];
                        $rowSong = $musicrow['title'];

                       echo '<tbody><tr><td> ' .$rowArtist.'</td> <td>'  .$rowSong.'</td><td>'.$rowCategory.'</td> <td><a href="player.php?name= ' .$rowMusic.'"> <img src="assets/play.png" style="height:20px; width:20px;"></a></td></tr></tbody> ';
                         
                }    
                }else{
                    echo "0 Uploads";
                }

                ?>

            </table> 
     </div>   
 </div>

     <div class= "container">

        <div class = "jumbotron" style="background-color: #eeeeee">
            
            <h4>View our Categories:</h4>
            <a href="kikuyu.php" id="category">Kikuyu</a> <a href="luo.php"  id="category">Luo </a> <a href="kambamusic.php" id="category">Kamba</a> <a href="kalenjinmusic.php" id="category">Kalenjin</a> <a href="luhya.php" id="category" >Luhya</a>            
        </div>

       
    </div>

     

    <div class="footer">
        <div id="footerimage">
        <img src="assets/ngoma.jpeg.png" style="height: 100px">
        </div>
        <div id="footertext">
            <h3> Experience Our Kenyan Culture</h3>
        </div>
            
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
