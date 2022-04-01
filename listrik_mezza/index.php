<?php
	include "koneksi.php";
	if(isset($_SESSION['username'])){
		header("location:media_admin.php?module=home");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style_login.css" type="text/css" />
  <title>Login</title>
</head>

<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Login Sistem Informasi Pembayaran Listrik </h2>



      <!-- Login Form -->
      <form action="cek_login.php" method="POST" onsubmit="return validasi(this)">
        <input type="text" id="login" class="fadeIn second" name="input_username" placeholder="username">
        <input type="password" id="password" class="fadeIn third" name="input_password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">BY MEZZALUNA SEPTILIA WARDANI</a>
      </div>

    </div>
  </div>
</body>

</html>