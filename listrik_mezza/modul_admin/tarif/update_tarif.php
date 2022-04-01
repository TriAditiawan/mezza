<?php
	include "koneksi.php";
	$kode= $_GET['kode'];
	$queryEdit = mysqli_query($connection,"SELECT * FROM tbl_tarif where id_tarif='$kode' limit 1")or die(mysqli_error());
	$dataEdit = mysqli_fetch_array($queryEdit);
?>
<div id="konten">
  <h1>DATA tarif</h1>
  <form method="POST" action="media_admin.php?module=update_proses_tarif&amp;kode=<?php echo $dataEdit['id_tarif'];?>"
    align="center" onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="20%">id_tarif</td>
        <td>:</td>
        <td>
          <input type="text" name="input_id_tarif" size="40%" value=<?php echo $dataEdit['id_tarif'];?>>
        </td>
      </tr>
      <tr>
        <td width="20%">Nama</td>
        <td>:</td>
        <td><input type="text" name="input_daya" size="40%" value=<?php echo $dataEdit['daya'];?>></td>
      </tr>
      <tr>
        <td width="20%">Alamat</td>
        <td>:</td>
        <td><input type="text" name="input_tarif_perkwh" size="40%" value=<?php echo $dataEdit['tarif_perkwh'];?>></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <input type="submit" name="tambah_tarif" value="Update tarif">
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
    <select name="inputkategori" style="width: 20%;">
      <option value="id_tarif">id_Tarif</option>
      <option value="daya">daya</option>
      <option value="tarif_perkwh">Tarif Perkwh</option>
    </select>
    <input name="btncari" type="submit" value="Cari" />
    <a href="modul_admin/tarif/laporan_tarif.php" target="blank">print</a>
  </form>
  <br>

  <table border="1" width="100%" class="tabel">
    <thead>
      <th>id_user</th>
      <th>daya</th>
      <th>tarif_perkwh</th>

      <th colspan="2">Aksi</th>
    </thead>
    <tbody>
      <?php
			if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from tbl_tarif 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from tbl_tarif")or die (mysqli_error());
			}
			while($mydata=mysqli_fetch_array($sql)){
		?>
      <tr>
        <td><?php echo $mydata['id_tarif']; ?> </td>
        <td><?php echo $mydata['daya']; ?> </td>
        <td><?php echo $mydata['tarif_perkwh']; ?> </td>
        <td><a class="update"
            href="media_admin.php?module=update_tarif&amp;kode=<?php echo $mydata['id_tarif'];?>">Update</a></td>
        <td><a class="hapus"
            href="media_admin.php?module=delete_tarif&amp;kode=<?php echo $mydata['id_tarif'];?>">Hapus</a></td>
      </tr>
      <?php
			}
		?>
    </tbody>
  </table>

  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_tarif.value == "") {
      alert("id_tarif masih kosong!");
      form.input_id_tarif.focus();
      return false;
    }
    if (form.input_daya.value == "") {
      alert("Daya masih kosong!");
      form.input_daya.focus();
      return false;
    }
    if (form.input_tarif_perkwh.value == "") {
      alert("Tarif Per KWH masih kosong!");
      form.input_tarif_perkwh.focus();
      return false;
    }
    return true;
  }
  </script>