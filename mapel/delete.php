
<?php

session_start();

if(!(isset($_SESSION['t_user'])))
{
    header("location: ../login/form-login.php");
}

include '../connect.php';

$kode_mapel = $_GET['kode_mapel'];

$query = "DELETE FROM t_mapel WHERE kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect,$query);

$num = mysqli_affected_rows($connect);

if($num > 0){
    header("location:read.php");
}
else{
    header("location:read.php");
}

echo "<p><a href='read.php'> Lihat Data</a> </p>";

?>
