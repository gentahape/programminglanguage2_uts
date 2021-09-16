<h1>Form Petugas</h1>

<?php include('../Config/Csrf.php'); ?>

<?php if ($_GET['action'] == 'add') { ?>

<form action="../Config/Routes.php?action=insertSpp" method="POST">
<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
	
	<table border="1">
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><input type="text" name="tahun" placeholder="Masukan Tahun" required=""></td>
		</tr>
		<tr>
			<td>Nominal</td>
			<td>:</td>
			<td><input type="text" name="nominal" placeholder="Masukan Nominal" required=""></td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<a href="spp_view.php">Kembali</a>
				<input type="submit" name="proses" value="Simpan">
			</td>
		</tr>
	</table>

</form>

<?php 	
	}elseif ($_GET['action'] == 'edit') { 
		include '../Controllers/Controller_pegawai.php';
		$dataAll = new Controller_pegawai();
		$getData = $dataAll->getWhereSpp($_GET['id']);
		while ($data = mysqli_fetch_array($getData)) {
?>

<form action="../Config/Routes.php?action=updateSpp" method="POST">
<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
<input type="hidden" name="id_spp" value="<?= $_GET['id'] ?>"/>

	<table border="1">
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><input type="text" name="tahun" placeholder="Masukan Tahun" required="" value="<?= $data['tahun'] ?>"></td>
		</tr>
		<tr>
			<td>Nominal</td>
			<td>:</td>
			<td><input type="text" name="nominal" placeholder="Masukan Nominal" required="" value="<?= $data['nominal'] ?>"></td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<a href="spp_view.php">Kembali</a>
				<input type="submit" name="proses" value="Simpan">
			</td>
		</tr>
	</table>

</form>

<?php } } ?>