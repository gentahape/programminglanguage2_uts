<h1>Daftar Kelas</h1>

<?php

	include '../Controllers/Controller_pegawai.php';
	$dataAll = new Controller_pegawai();
	$getData = $dataAll->getKelas();

?>

	<a href="kelas_form.php?action=add">Tambah</a>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>Nama Kelas</th>
			<th>Kompetensi Keahlian</th>
			<th>Aksi</th>
		</tr>

		<?php 
			$no = 1;
			while ($data = mysqli_fetch_array($getData)) {
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data['nama_kelas'] ?></td>
			<td><?= $data['kompetensi_keahlian'] ?></td>
			<td>
				<a href="kelas_form.php?action=edit&id=<?= $data['id_kelas'] ?>">Edit</a> | 
				<a href="../Config/Routes.php?action=deleteKelas&id=<?= $data['id_kelas'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>

	</table>	

