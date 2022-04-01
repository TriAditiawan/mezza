<?php
	include "koneksi.php";
	if(isset($_SESSION['username'])){
		header("location:media_admin.php?module=home");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Pembayaran Listrik Pasca Bayar</title>
		<link rel="stylesheet" href="css/style_login.css" type="text/css"/>
	</head>
	<body>
		<div class="formlogin">
		    <form action="cek_login.php" method="POST" onsubmit="return validasi(this)">
		    	<table border="0">
			        <tr>
			        	<td>User Name</td>
			        	<td>
			        		<input type="text" name="input_username">
			        	</td>
			    	</tr>
			    	<tr>
			       		<td>Password</td>
			        	<td>
			        		<input type="password" name="input_password">
			        	</td>
			        </tr>
			        <tr>
			        	<td></td>
			        	<td>
			        		<input type="submit" value="Login" name="login">
			        	</td>
			        	<td></td>
		        	</tr>
		    	</table>
		    </form>
		</div>
	</body>
	<script type="text/javascript">
		function validasi(form){
			if(form.input_username.value == ""){
				alert("Anda belum mengisikan username");
				form.input_username.focus();
				return false;
			}
			if(form.input_password.value == ""){
				alert("Anda belum mengisikan password.");
				form.input_password.focus();
				return false;
			}
			return true;
		}
	</script>
</html>