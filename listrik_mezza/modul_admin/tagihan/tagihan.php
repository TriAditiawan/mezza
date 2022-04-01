<?php
	include "koneksi.php";
?>
<div id="konten">
  <h1>Data tagihan</h1>
  <form method="POST" action="media_admin.php?module=register_tagihan" align="center" onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="20%">id_tagihan</td>
        <td>:</td>
        <td>
          <input type="text" name="input_id_tagihan" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">id penggunaan</td>
        <td>:</td>
        <td>
          <select name="input_id_penggunaan" style="width: 60%;">
            <option value="" selected></option>
            <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_penggunaan")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
            <option value=<?php echo $dataForeign['id_penggunaan']?>> <?php echo $dataForeign['id_penggunaan']?>
            </option>
            <?php
						}
					?>
          </select>
        </td>
      </tr>
      <tr>
        <td width="20%">bulan</td>
        <td>:</td>
        <td>
          <input type="text" name="input_bulan" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">tahun</td>
        <td>:</td>
        <td>
          <input type="text" name="input_tahun" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">jumlah_meter</td>
        <td>:</td>
        <td>
          <input type="text" name="input_jumlah_meter" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">status</td>
        <td>:</td>
        <td>
          <input type="text" name="input_status" size="40%">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tambah_tagihan" value="Tambah">
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
      <option value="id_tagihan">ID tagihan</option>
      <option value="id_penggunaan">id penggunaan</option>
      <option value="bulan">bulan</option>
      <option value="tahun">tahun</option>
      <option value="jumlah_meter">jumlah_meter</option>
      <option value="status">status</option>
    </select>
    <input name="btncari" type="submit" value="Cari" />
    <a href="modul_admin/tagihan/laporan_tagihan.php" target="blank">print</a>
  </form>
  <br>

  <table border="1" width="100%" class="tabel">
    <thead>

      <th>ID tagihan</th>
      <th>id_penggunaan</th>
      <th>bulan</th>
      <th>tahun</th>
      <th>jumlah_meter</th>
      <th>status</th>
      <th colspan="2">Aksi</th>
    </thead>
    <tbody>
      <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from tbl_tagihan 
					inner join tbl_penggunaan on tbl_tagihan.id_penggunaan = tbl_penggunaan.id_penggunaan
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from tbl_tagihan 
					inner join tbl_penggunaan on tbl_tagihan.id_penggunaan = tbl_penggunaan.id_penggunaan 
					ORDER BY id_tagihan")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
      <tr>

        <td><?php echo $data['id_tagihan']; ?> </td>
        <td><?php echo $data['id_penggunaan']; ?> </td>
        <td><?php echo $data['bulan']; ?> </td>
        <td><?php echo $data['tahun']; ?> </td>
        <td><?php echo $data['jumlah_meter']; ?> </td>
        <td><?php echo $data['status']; ?> </td>
        <td><a class="update"
            href="media_admin.php?module=update_tagihan&amp;kode=<?php echo $data['id_tagihan'];?>">Update</a>
        </td>
        <td><a class="hapus"
            href="media_admin.php?module=delete_tagihan&amp;kode=<?php echo $data['id_tagihan'];?>">Hapus</a>
        </td>
      </tr>
      <?php
			}
		?>
    </tbody>
  </table>

  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_tagihan.value == "") {
      alert("id tagihan masih kosong!");
      form.input_id_tagihan.focus();
      return (false);
    }
    if (form.input_id_penggunaann.value == "") {
      alert("id penggunaan masih kosong!");
      form.input_id_penggunaann.focus();
      return (false);
    }
    if (form.input_bulan.value == "") {
      alert("Nomor Meter masih kosong!");
      form.input_bulan.focus();
      return (false);
    }
    if (form.input_tahun.value == "") {
      alert("tahun masih kosong!");
      form.input_tahun.focus();
      return (false);
    }
    if (form.input_jumlah_meter.value == "") {
      alert("jumlah meter  masih kosong!");
      form.input_jumlah_meter.focus();
      return (false);
    }
    if (form.input_status.value == "") {
      alert("status masih kosong!");
      form.input_status.focus();
      return (false);
    }
    return (true);;
  }
  </script>