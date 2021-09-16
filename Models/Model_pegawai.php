<?php 

/**
 * 
 */
class Model_pegawai
{
	
	function __construct()
	{
		include '../Config/Database.php';
		$this->db = new Database();
		$this->conn = $this->db->connect();
	}

	// ====================================================================================================
	// petugas

	public function getPetugas()
	{
		return mysqli_query($this->conn, "SELECT * FROM petugas");
	}

	public function insertPetugas($username,$password,$nama_petugas,$level)
	{
		return mysqli_query($this->conn, "INSERT INTO petugas (username,password,nama_petugas,level) VALUE ('$username','$password','$nama_petugas','$level')");
	}

	public function getWherePetugas($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM petugas WHERE id_petugas = '$id'");
	}

	public function updatePetugas($id,$username,$password,$nama_petugas,$level)
	{
		return mysqli_query($this->conn, "UPDATE petugas SET username = '$username', password = '$password', nama_petugas = '$nama_petugas', level = '$level' WHERE id_petugas = '$id'");
	}

	public function deletePetugas($id)
	{
		return mysqli_query($this->conn, "DELETE FROM petugas WHERE id_petugas = '$id'");
	}

	// ====================================================================================================
	// kelas

	public function getKelas()
	{
		return mysqli_query($this->conn, "SELECT * FROM kelas");
	}

	public function insertKelas($nama_kelas,$kompetensi)
	{
		return mysqli_query($this->conn, "INSERT INTO kelas (nama_kelas,kompetensi_keahlian) VALUE ('$nama_kelas','$kompetensi')");
	}

	public function getWhereKelas($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM kelas WHERE id_kelas = '$id'");
	}

	public function updateKelas($id,$nama_kelas,$kompetensi)
	{
		return mysqli_query($this->conn, "UPDATE kelas SET nama_kelas = '$nama_kelas', kompetensi_keahlian = '$kompetensi' WHERE id_kelas = '$id'");
	}

	public function deleteKelas($id)
	{
		return mysqli_query($this->conn, "DELETE FROM kelas WHERE id_kelas = '$id'");
	}

	// ====================================================================================================
	// spp

	public function getSpp()
	{
		return mysqli_query($this->conn, "SELECT * FROM spp");
	}

	public function insertSpp($tahun,$nominal)
	{
		return mysqli_query($this->conn, "INSERT INTO spp (tahun,nominal) VALUE ('$tahun','$nominal')");
	}

	public function getWhereSpp($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM spp WHERE id_spp = '$id'");
	}

	public function updateSpp($id,$tahun,$nominal)
	{
		return mysqli_query($this->conn, "UPDATE spp SET tahun = '$tahun', nominal = '$nominal' WHERE id_spp = '$id'");
	}

	public function deleteSpp($id)
	{
		return mysqli_query($this->conn, "DELETE FROM spp WHERE id_spp = '$id'");
	}

	// ====================================================================================================
	// siswa

	public function getSiswa()
	{
		return mysqli_query($this->conn, "SELECT * FROM siswa LEFT JOIN kelas ON kelas.id_kelas = siswa.id_kelas LEFT JOIN spp ON spp.id_spp = siswa.id_spp");
	}

	public function insertSiswa($nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp)
	{
		return mysqli_query($this->conn, "INSERT INTO siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUE ('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
	}

	public function getWhereSiswa($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM siswa WHERE id_siswa = '$id'");
	}

	public function updateSiswa($id,$nisn,$nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp)
	{
		return mysqli_query($this->conn, "UPDATE siswa SET nisn = '$nisn', nis = '$nis', nama = '$nama', id_kelas = '$id_kelas', alamat = '$alamat', no_telp = '$no_telp', id_spp = '$id_spp' WHERE id_siswa = '$id'");
	}

	public function deleteSiswa($id)
	{
		return mysqli_query($this->conn, "DELETE FROM siswa WHERE id_siswa = '$id'");
	}

	// ====================================================================================================
	// pembayaran

	public function getPembayaran()
	{
		return mysqli_query($this->conn, "SELECT * FROM pembayaran 
			LEFT JOIN petugas ON petugas.id_petugas = pembayaran.id_petugas 
			LEFT JOIN siswa ON siswa.nisn = pembayaran.nisn 
			LEFT JOIN spp ON spp.id_spp = pembayaran.id_spp
			ORDER BY pembayaran.id_pembayaran DESC
		");
	}

	public function insertPembayaran($id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar)
	{
		$tgl = date("d",strtotime($tgl_bayar));
		$bln = date("m",strtotime($tgl_bayar));
		$thn = date("Y",strtotime($tgl_bayar));
		return mysqli_query($this->conn, "INSERT INTO pembayaran (id_petugas,nisn,tgl_bayar,bulan_dibayar,tahun_dibayar,id_spp,jumlah_bayar) VALUE ('$id_petugas','$nisn','$tgl','$bln','$thn','$id_spp','$jumlah_bayar')");
	}

	public function getWherePembayaran($id)
	{
		return mysqli_query($this->conn, "SELECT * FROM pembayaran WHERE id_pembayaran = '$id'");
	}

	public function updatePembayaran($id,$id_petugas,$nisn,$tgl_bayar,$id_spp,$jumlah_bayar)
	{
		$tgl = date("d",strtotime($tgl_bayar));
		$bln = date("m",strtotime($tgl_bayar));
		$thn = date("Y",strtotime($tgl_bayar));
		return mysqli_query($this->conn, "UPDATE pembayaran SET id_petugas = '$id_petugas', nisn = '$nisn', tgl_bayar = '$tgl', bulan_dibayar = '$bln', tahun_dibayar = '$thn', id_spp = '$id_spp', jumlah_bayar = '$jumlah_bayar' WHERE id_pembayaran = '$id'");
	}

	public function deletePembayaran($id)
	{
		return mysqli_query($this->conn, "DELETE FROM pembayaran WHERE id_pembayaran = '$id'");
	}

}