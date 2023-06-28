<?php
//$con = mysqli_connect("localhost","root","","hotelalexis") or die(mysql_error());

define('HOST','localhost'); 
define('USER','root');   //sesuaikan nama user
define('PASS',''); 
//sesuaiakan nama password 
define('DB','hotelalexis');//sesuaiakan naman database
$conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

/*if($conn){
	echo "Koneksi Berhasil";
}
else{
	echo "Koneksi Gagal";
}*/

date_default_timezone_set("Asia/Jakarta");

?>
