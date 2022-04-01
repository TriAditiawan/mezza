<?php
	include "koneksi.php";
?>
<div id="konten">
  <h1>Data Penggunaan</h1>
  <form method="POST" action="media_admin.php?module=register_penggunaan" align="center"
    onsubmit="return validasi(this)">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="20%">id_penggunaan</td>
        <td>:</td>
        <td>
          <input type="text" name="input_id_penggunaan" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">nama</td>
        <td>:</td>
        <td>
          <select name="input_id_pelanggan" style="width: 60%;">
            <option value="" selected></option>
            <?php
						$sqlForeign = mysqli_query($connection,"SELECT * FROM tbl_pelanggan")or die(mysqli_error());
						while($dataForeign=mysqli_fetch_array($sqlForeign)){
					?>
            <option value=<?php echo $dataForeign['id_pelanggan']?>> <?php echo $dataForeign['nama']?> </option>
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
        <td width="20%">meter_awal</td>
        <td>:</td>
        <td>
          <input type="text" name="input_meter_awal" size="40%">
        </td>
      </tr>
      <tr>
        <td width="20%">meter_akhir</td>
        <td>:</td>
        <td>
          <input type="text" name="input_meter_akhir" size="40%">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="tambah_penggunaan" value="Tambah">
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
      <option value="id_penggunaan">ID penggunaan</option>
      <option value="nama">nama</option>
      <option value="bulan">bulan</option>
      <option value="tahun">tahun</option>
      <option value="meter_awal">meter awal</option>
      <option value="meter_akhir">meter akhir</option>
    </select>
    <input name="btncari" type="submit" value="Cari" />
    <a href="modul_admin/penggunaan/laporan_penggunaan.php" target="blank">print</a>
  </form>
  <br>

  <table border="1" width="100%" class="tabel">
    <thead>
      <th>ID penggunaan</th>
      <th>Nama</th>
      <th>bulan</th>
      <th>tahun</th>
      <th>meter_awal</th>
      <th>meter_akhir</th>
      <th colspan="2">Aksi</th>
    </thead>
    <tbody>
      <?php
		if(isset($_POST['btncari'])){
				$kategori = $_POST['inputkategori'];
				$datacari = $_POST['inputcari'];
				$sql = mysqli_query($connection,"select * from tbl_penggunaan 
					inner join tbl_pelanggan on tbl_penggunaan.id_pelanggan = tbl_pelanggan.id_pelanggan 
					where $kategori LIKE '%$datacari%' 
					ORDER BY $kategori")or die (mysqli_error());
			}else{
				$sql = mysqli_query($connection,"select * from tbl_penggunaan 
					inner join tbl_pelanggan on tbl_penggunaan.id_pelanggan = tbl_pelanggan.id_pelanggan 
					ORDER BY id_penggunaan")or die (mysqli_error());
			}
			while($data=mysqli_fetch_array($sql)){  
		?>
      <tr>

        <td><?php echo $data['id_penggunaan']; ?> </td>
        <td><?php echo $data['nama']; ?> </td>
        <td><?php echo $data['bulan']; ?> </td>
        <td><?php echo $data['tahun']; ?> </td>
        <td><?php echo $data['meter_awal']; ?> </td>
        <td><?php echo $data['meter_akhir']; ?> </td>
        <td><a class="update"
            href="media_admin.php?module=update_penggunaan&amp;kode=<?php echo $data['id_penggunaan'];?>">Update</a>
        </td>
        <td><a class="hapus"
            href="media_admin.php?module=delete_penggunaan&amp;kode=<?php echo $data['id_penggunaan'];?>">Hapus</a>
        </td>
      </tr>
      <?php
			}
		?>
    </tbody>
  </table>

  <script type="text/javascript">
  function validasi(form) {
    if (form.input_id_penggunaan.value == "") {
      alert("id penggunaan masih kosong!");
      form.input_id_penggunaan.focus();
      return (false);
    }
    if (form.input_id_pelanggan.value == "") {
      alert("id Pelanggan masih kosong!");
      form.input_id_pelanggan.focus();
      return (false);
    }

    if (form.input_bulan.value == "") {
      alert("bulan masih kosong!");
      form.input_bulan.focus();
      return (false);
    }
    if (form.input_tahun.value == "") {
      alert("tahun masih kosong!");
      form.input_tahun.focus();
      return (false);
    }
    if (form.input_jumlah_meter.value == "") {
      alert("jumlah meter masih kosong!");
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