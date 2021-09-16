<h1>Form Kelas</h1>

<?php include('../Config/Csrf.php'); ?>

<?php if ($_GET['action'] == 'add') { ?>

<form action="../Config/Routes.php?action=insertKelas" method="POST">
<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
	
	<table border="1">
		<tr>
			<td>Nama Kelas</td>
			<td>:</td>
			<td><input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas" required=""></td>
		</tr>
		<tr>
			<td>Kompetensi Keahlian</td>
			<td>:</td>
			<td><input type="text" name="kompetensi_keahlian" placeholder="Masukan Kompetensi Keahlian" required=""></td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<a href="kelas_view.php">Kembali</a>
				<input type="submit" name="proses" value="Simpan">
			</td>
		</tr>
	</table>

</form>

<?php 	
	}elseif ($_GET['action'] == 'edit') { 
		include '../Controllers/Controller_pegawai.php';
		$dataAll = new Controller_pegawai();
		$getData = $dataAll->getWhereKelas($_GET['id']);
		while ($data = mysqli_fetch_array($getData)) {
?>

<form action="../Config/Routes.php?action=updateKelas" method="POST">
<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
<input type="hidden" name="id_kelas" value="<?= $_GET['id'] ?>"/>

	<table border="1">
		<tr>
			<td>Nama Kelas</td>
			<td>:</td>
			<td><input type="text" name="nama_kelas" placeholder="Masukan Nama Kelas" required="" value="<?= $data['nama_kelas'] ?>"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="kompetensi_keahlian" placeholder="Masukan Kompetensi Keahlian" required="" value="<?= $data['kompetensi_keahlian'] ?>"></td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<a href="kelas_view.php">Kembali</a>
				<input type="submit" name="proses" value="Simpan">
			</td>
		</tr>
	</table>

</form>

<?php } } ?>