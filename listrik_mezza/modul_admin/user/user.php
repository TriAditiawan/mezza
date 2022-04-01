<?php
	include "koneksi.php";
?>
<div id="konten">
  <h1>Data User</h1>
  <form method="POST" action="media_admin.php?module=register_user" align="center" onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="20%">id user</td>
        <td>:</td>
        <td>
          <input type="text" name="input_id_user" size="40%">
        </td>
      </tr>

      <tr>
        <td width="20%">username</td>
        <td>:</td>
        <td><input type="text" name="input_username" size="40%"></td>
      </tr>

      <tr>
        <td width="20%">password</td>
        <td>:</td>
        <td><input type="text" name="input_password" size="40%"></td>
      </tr>

      <tr>
        <td width="20%">nama user</td>
        <td>:</td>
        <td><input type="text" name="input_nama_user" size="40%"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tambah_user" value="Tambah">
          <input type="reset" name="reset" value="Reset">
        </td>
      </tr>
    </table>
  </form>

  <br>
  <form method="POST" action="" align="center" onsubmit="return validasi(this)">
    Pencarian :
    <input type="text" name="inputcari" size="40%">
    Kategori :
    <select name="input_kategori" style="width: 20%;">
      <option value="id_user">id_user</option>
      <option value="username">username</option>
      <option value="password">password</option>
      <option value="nama_user">nama user</option>

    </select>
    <input name="btncari" type="submit" value="Cari" />
    <a href="modul_admin/user/laporan_user.php" target="blank">print</a>
  </form>
  <br>

  <table border="1" width="100%" class="tabel">
    <thead>
      <th>id user</th>
      <th>username</th>
      <th>password</th>
      <th>nama user</th>

      <th colspan="2">Aksi</th>
    </thead>
    <tbody>
      <?php
			if(isset($_POST['btncari'])){
				$kategori = $_POST['input_kategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from tbl_user 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from tbl_user")or die (mysqli_error());
			}
			while($mydata=mysqli_fetch_array($sql)){
		?>
      <tr>
        <td><?php echo $mydata['id_user']; ?> </td>
        <td><?php echo $mydata['username']; ?> </td>
        <td><?php echo $mydata['password']; ?> </td>
        <td><?php echo $mydata['nama_user']; ?> </td>
        <td><a class="update"
            href="media_admin.php?module=update_user&amp;kode=<?php echo $mydata['id_user'];?>">Update</a></td>
        <td><a class="hapus"
            href="media_admin.php?module=delete_user&amp;kode=<?php echo $mydata['id_user'];?>">Hapus</a></td>
      </tr>
      <?php
			}
		?>
    </tbody>
  </table>

  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_user.value == "") {
      alert("id user masih kosong!");
      form.input_id_user.focus();
      return false;
    }
    if (form.input_username.value == "") {
      alert("username masih kosong!");
      form.input_username.focus();
      return false;
    }
    if (form.input_password.value == "") {
      alert("password masih kosong!");
      from.input_password.focus();
      return false
    }
    if (form.input_nama_user.value == "") {
      alert("nama user masih kosong!");
      from.input_nama_user.focus();
      return false
    }

    return true;
  }
  </script>