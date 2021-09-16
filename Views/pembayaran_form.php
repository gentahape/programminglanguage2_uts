<h1>Form Petugas</h1>

<?php include('../Config/Csrf.php'); ?>

<?php if ($_GET['action'] == 'add') { ?>

<form action="../Config/Routes.php?action=insertPetugas" method="POST">
<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
	
	<table border="1">
		<tr>
			<td>Nama Petugas</td>
			<td>:</td>
			<td><input type="text" name="nama_petugas" placeholder="Masukan Nama Petugas" required=""></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" placeholder="Masukan Username" required=""></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" placeholder="Masukan Password" required=""></td>
		</tr>
		<tr>
			<td>Level</td>
			<td>:</td>
			<td>
				<select name="level" required="">
					<option value="Administrator">Administrator</option>
					<option value="Petugas">Petugas</option>
				</select>
			</td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<a href="petugas_view.php">Kembali</a>
				<input type="submit" name="proses" value="Simpan">
			</td>
		</tr>
	</table>

</form>

<?php 	
	}elseif ($_GET['action'] == 'edit') { 
		include '../Controllers/PetugasController.php';
		$dataAll = new PetugasController();
		$getData = $dataAll->getWhere($_GET['id']);
		while ($data = mysqli_fetch_array($getData)) {
?>

<form action="../Config/Routes.php?action=updatePetugas" method="POST">
<input type="hidden" name="csrf_token" value="<?= createCSRF();?>"/>
<input type="hidden" name="id_petugas" value="<?= $_GET['id'] ?>"/>

	<table border="1">
		<tr>
			<td>Nama Petugas</td>
			<td>:</td>
			<td><input type="text" name="nama_petugas" placeholder="Masukan Nama Petugas" required="" value="<?= $data['nama_petugas'] ?>"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" placeholder="Masukan Username" required="" value="<?= $data['username'] ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" placeholder="Masukan Password" required="" value="<?= $data['password'] ?>"></td>
		</tr>
		<tr>
			<td>Level</td>
			<td>:</td>
			<td>
				<select name="level" required="">
					<option value="Administrator" <?= ($data['level'] == 'Administrator' ? 'selected' : '') ?>>Administrator</option>
					<option value="Petugas" <?= ($data['level'] == 'Petugas' ? 'selected' : '') ?>>Petugas</option>
				</select>
			</td>
		</tr>
		<tr align="center">
			<td colspan="3">
				<a href="petugas_view.php">Kembali</a>
				<input type="submit" name="proses" value="Simpan">
			</td>
		</tr>
	</table>

</form>

<?php } } ?>