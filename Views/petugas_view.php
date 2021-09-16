<h1>Daftar Petugas</h1>

<?php

	include '../Controllers/Controller_pegawai.php';
	$dataAll = new Controller_pegawai();
	$getData = $dataAll->getPetugas();

?>

	<a href="petugas_form.php?action=add">Tambah</a>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>

		<?php 
			$no = 1;
			while ($data = mysqli_fetch_array($getData)) {
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data['nama_petugas'] ?></td>
			<td><?= $data['username'] ?></td>
			<td><?= $data['level'] ?></td>
			<td>
				<a href="petugas_form.php?action=edit&id=<?= $data['id_petugas'] ?>">Edit</a> | 
				<a href="../Config/Routes.php?action=deletePetugas&id=<?= $data['id_petugas'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>

	</table>	

