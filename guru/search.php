<?php

session_start();

if(!(isset($_SESSION['t_user'])))
{
    header("location: ../login/form-login.php");
}

include '../connect.php';

$cari = $_GET['cari'];
$kategori = $_GET['kategori'];
$query = "SELECT * FROM t_guru WHERE $kategori LIKE '%$cari%'";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="validasi.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Document </title>
    <style>
    /* body */
    body{
      margin: 0;
      padding: 0;
      background-color: #ff3366;
    }

    /* judul */
    h2{
      font-family: Footlight MT Light;
      text-align: center;
      font-size: 50px;
      color: white;
    }

    /* table1 */
    .table1 {
        font-family: Tekton Pro;
        font-size: 22px;
        color: white;
        border-collapse: collapse;
        margin-left: 92px;
        width: 1200px;
        text-align: center;
        border-collapse: collapse;
    }
    .table1, th, td {
        border: 1.5px solid white;
        padding: 8px 20px;
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

    /* button1 */
    .button1{
    background-color: white;
    color: black;
    border: 2px solid #555555;
    width: 135px;
    margin-left: 1158px;
    }
    .button1:hover {
        background-color: #555555;
        color: white;
    }


    /* aksi */
    td a{
      color: white;
      text-decoration: none;
    }

    /* button */
    .button {
      display: inline-block;
      border-radius: 5px;
      background-color: #303135;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 20px;
      padding: 10px;
      width: 160px;
      transition: all 0.5s;
      cursor: pointer;
      margin-left: 1131px;
      font-style: italic;
      font-family: serif;
    }
    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }
    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }
      .button:hover span {
        padding-right: 25px;
      }
      .button:hover span:after {
        opacity: 1;
        right: 0;
      }
      .button a{
        text-decoration: none;
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

    <h2>Data Guru</h2>

    <table border='1' class="table1">
      <tr>
        <th> No. </th>
        <th> Kode guru </th>
        <th> Nama guru </th>
        <th> Jumlah jam </th>
        <th> Alamat </th>
        <th> Telepon </th>
        <th> Email </th>
        <th> Aksi </th>
        </tr>


        <?php
          if ($num > 0)
          {
            $no = 1;
            while ($data = mysqli_fetch_assoc($result))
            {
              echo "<tr>";
              echo "<td>" . $no . "</td>";
              echo "<td>" . $data['kode_guru'] . "</td>";
              echo "<td>" . $data['nama_guru'] . "</td>";
              echo "<td>" . $data['jumlah_jam'] . "</td>";
              echo "<td>" . $data['alamat'] . "</td>";
              echo "<td>" . $data['telp'] . "</td>";
              echo "<td>" . $data['email'] . "</td>";
              echo "<td> <a href ='form-update.php?kode_guru=" . $data['kode_guru'] . "'> Edit </a> | ";
              echo "<a href ='delete.php?kode_guru=" . $data['kode_guru'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'> Hapus </a> </td>";
              echo "</tr>";
              $no++;
            }
          }
          else
          {
            echo "<tr> <td colspan='8'>Tidak ada data </td></tr>";
          }
         ?>
      </table>

      <br>
      <a href="../guru/read.php"> <input type="submit" value="Kembali" class="button1" id="back"> </a>
      </form>
    </div>
  </body>
  </html>
