<h1>Daftar SPP</h1>

<?php

	include '../Controllers/Controller_pegawai.php';
	$dataAll = new Controller_pegawai();
	$getData = $dataAll->getSpp();

?>

	<a href="spp_form.php?action=add">Tambah</a>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>Tahun</th>
			<th>Nominal</th>
			<th>Aksi</th>
		</tr>

		<?php 
			$no = 1;
			while ($data = mysqli_fetch_array($getData)) {
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data['tahun'] ?></td>
			<td><?= $data['nominal'] ?></td>
			<td>
				<a href="spp_form.php?action=edit&id=<?= $data['id_spp'] ?>">Edit</a> | 
				<a href="../Config/Routes.php?action=deleteSpp&id=<?= $data['id_spp'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>

	</table>	

