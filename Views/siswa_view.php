<h1>Daftar Siswa</h1>

<?php

	include '../Controllers/Controller_pegawai.php';
	$dataAll = new Controller_pegawai();
	$getData = $dataAll->getSiswa();

?>

	<a href="siswa_form.php?action=add">Tambah</a>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NISN</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Alamat</th>
			<th>No Telp</th>
			<th>Jumlah SPP</th>
			<th>Aksi</th>
		</tr>

		<?php 
			$no = 1;
			while ($data = mysqli_fetch_array($getData)) {
		?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $data['nisn'] ?></td>
			<td><?= $data['nis'] ?></td>
			<td><?= $data['nama'] ?></td>
			<td><?= $data['nama_kelas'] ?></td>
			<td><?= $data['alamat'] ?></td>
			<td><?= $data['no_telp'] ?></td>
			<td><?= $data['nominal'] ?></td>
			<td>
				<a href="siswa_form.php?action=edit&id=<?= $data['id_siswa'] ?>">Edit</a> | 
				<a href="../Config/Routes.php?action=deleteSiswa&id=<?= $data['id_siswa'] ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>

	</table>	

