<?php

session_start();

if(!(isset($_SESSION['t_user'])))
{
    header("location: ../login/form-login.php");
}

include '../connect.php';

$kode_guru = $_GET['kode_guru'];
$query = "SELECT * FROM t_guru WHERE kode_guru = $kode_guru";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
    /* body */
    body{
      margin: 0;
      padding: 0;
      background-color: #ff3366;
    }

    /* header */
    header {
      background-color: #000;
      padding: 8px 0;
      overflow: hidden;
      padding-left: 35px;
      padding-right: 35px;
    }

    nav a {
      font-family: monospace;
      font-size: 30px;
      text-decoration: none;
      color: white;
    }

    nav a:hover{
      color: #ff0099;
    }

    li {
      display: inline-block;
      padding: 10px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #000;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        text-decoration: none;
    }

    li.dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100px;
        box-shadow: 0px 4px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 10px 16px;
        text-decoration: none;
        display: block;
        text-align: center;
        font-size: 20px;
        font-family: Footlight MT Light;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* judul */
    h2{
      margin-left: 80px;
      font-family: Footlight MT Light;
      font-size: 50px;
      color: white;
    }

    /* form */
    .form{
      margin-left: 400px;
    }

    /* input text */
    input[type=text] {
    width: 300px;
    padding: 8px;
    margin: 5px;
    margin-left: 130px;
    font-size: 15px;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    }

    input[type=text]:focus {
        border: 3px solid #555;
    }

    /* button */
    .button{
    background-color: white;
    color: black;
    border: 2px solid #555555;
    width: 300px;
    height: 30px;
    margin-left: 130px;
    }
    .button:hover {
    background-color: #555555;
    color: white;
    }
    </style>
</head>

    <body>
      <!-- header -->
         <header>
             <div class="wrapper">
               <div id="pilihan">
               <nav>
                 <ul>
                   <li class="dropdown">
                       <a href="javascript:void(0)" class="dropbtn"> About </a>
                       <div class="dropdown-content">
                         <a href="../guru/read.php"> Data Guru </a>
                         <a href="../mapel/read.php"> Matapelajaran </a>
                       </div>
                   </li>
                   <li class="dropdown">
                       <a href="../login/logout.php" class="dropbtn"> Logout </a>
                   </li>
                 </ul>
               </nav>
             </div>
            </div>
         </header>

         <div class="form" >
          <form action="update.php" method="post" class="form-container">
          <h2 class="form-header"> Update Data Guru </h2>
          <table>
            <tr>
              <td> <input type="text" name="nama_guru" placeholder="Nama Guru" id="nama" value="<?php echo $row['nama_guru']; ?> "> </td>
            </tr>

            <tr>
              <td> <input type="text" name="jumlah_jam" placeholder="Jumlah Jam" id="jumlah_jam" value="<?php echo $row['jumlah_jam']; ?>"> </td>
            </tr>

            <tr>
              <td> <input type="text" name="alamat" placeholder="Alamat" id="alamat" value="<?php echo $row['alamat']; ?>"> </td>
            </tr>

            <tr>
              <td> <input type="text" name="telp" placeholder="Telepon" id="telp" value="<?php echo $row['telp']; ?>"> </td>
            </tr>

            <tr>
              <td> <input type="text" name="email" placeholder="E-mail" id="email" value="<?php echo $row['email']; ?>"> </td>
            </tr>

            <tr>
              <td> <td>
              <td> <input type="hidden" name="kode_guru" value="<?php echo $row['kode_guru']; ?>"> </td>
            </tr>

            <td> <input type="submit" name="btnSimpan" value="Simpan" class="button"> </td>

          </table>
          </form>
    </body>
    </html>
