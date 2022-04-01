<?php
  session_start();
  include "koneksi.php";
  include "akses.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Media Admin</title>
  <link rel="stylesheet" href="css/style_content.css" type="text/css">
  <link rel="stylesheet" href="css/style_table.css" type="text/css">
  <style>
  body {}
  </style>
</head>

<body bgcolor="#fff1e6">
  <div class="style">
    <div class="header">
      <img src="bgm.jpg" width="100%" height="100%">
    </div>

    <div class="menu">
      <?php include "menu_admin.php"; ?>
    </div>

    <div id="isi">
      <?php include "content_admin.php"; ?>
    </div>

    <div id="clearer">
    </div>

    <div class="footer" align="center">
      <marquee scrollamount="5" scrolldelay="5">selamat datang di website Pembayaran Listrik Pasca Bayar</marquee>
    </div>

  </div>
</body>

</html>