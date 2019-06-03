<?php
session_start();

require 'dbconnect.php';
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ngoma Zetu</title>
    
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>

</head>
<body style="background-color: #a30059ff"
>

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


<div class="container">
	<div class = "jumbotron">
 	<form action = "upload4.php" method= "POST" enctype="multipart/form-data">
	
	

	<div class="form-group">
		<div class = "input-group">
		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
		<input type="text" name="artistName" class = "form-control" style="width: 500px;" placeholder="Artist Name" required=/>  
	</div>
</div>

	<div class = "form-group">
		<div class="input-group">
		<span class="input-group-addon"><span class="glyphicon glyphicon-music"></span></span>	
		<input type="text" name="songName" class = "form-control" style="width: 500px;" placeholder="Enter Title of the song" required/>
	</div>
</div>
	
	<label class="btn btn-default btn-file" style="color:#a30059ff ;background-color: #eeeeee; ">
			 <input type="file" name="file" id="inputFile"required >
			 <label for="file">Choose audio file</label> 
		</label>

		<div class="select-category">
			<span class = "arr"></span>
		  <select name= "music_category"  required="required"  >
			<option > Select category....</option>
			<option> Kikuyu</option>
			<option>Luo</option>
			<option> Kamba</option>
			<option> Luhya</option>
			<option> Kalenjin</option>
		</select>
		</div>
		<br>
		<br>
		<div class="form-group">
		<button type ="submit" name="submit" class = "btn btn-block btn-success" style="background-color:#a30059ff; width: 540px;">UPLOAD </button>
	</div>
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>



