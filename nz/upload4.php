<?php
session_start();
include 'dbconnect.php';


$name = $_FILES["file"]['name'];

$size = $_FILES['file']['size'];

$type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];


$max_size = 100000000;
$artist = $_POST['artistName'];
$song = $_POST['songName'];
$category = $_POST ['music_category'];


$getusername = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$username = mysqli_fetch_array($getusername, MYSQLI_ASSOC);
$userid = $username['id'];

$ext = substr($name, strpos($name, '.') + 1);
if(isset($name)){

if(!empty($name)){
if($size<=$max_size){
if(($ext == 'mp3' || $ext == 'mp4' || $ext == 'ogg' || $ext == 'm4a' || $ext == 'flac' || $ext == 'wav')&& $type=='audio/mpeg' || $type == 'audio/mp4'){
$location = 'uploads/';
$audioPath = $location.basename($name);

if(move_uploaded_file($tmp_name, $audioPath)){
$query = "INSERT INTO `uploads` (artist, title, name, size, type, location, category, userid) VALUES ('$artist','$song', '$audioPath', '$size', '$type', '$location','$category', '$userid')";
$result = mysqli_query($conn, $query);
echo "<script type = 'text/javascript'>alert('Your song has been uploaded successfully');
		window.location.href='index.php';
		</script>";

}else{
echo "Error in uploading file";
}
}else{
echo "file should be audio format";
}
}else{
echo "file size is more than maximum";
}
}else{
echo "Please select a file";
}
}
?>