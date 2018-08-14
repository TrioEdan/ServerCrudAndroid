<?php
	include_once('koneksi.php');

	$npm = $_GET['npm'];

	$nama = $_GET['nama'];
	$prodi = $_GET['prodi'];
	$kelas = $_GET['kelas'];

	$getdata = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE npm = '$npm'");
	$rows = mysqli_num_rows($getdata);
	$update = "UPDATE tb_mahasiswa SET nama='$nama', prodi='$prodi',kelas='$kelas' WHERE npm='$npm'";
	$exeupdate = mysqli_query($koneksi,$update);

	$response = array();
	if ($rows > 0) {
		# code...
		if ($exeupdate) {
			$response['code']=1;
			$response['message'] = "Update Success";
		} else {
			$response['code']=0;
			$response['message'] = "Update Failed";
		}
	} else {
		$response['code']=0;
		$response['message'] = "Update Failed, data tidak ditemukan";
	}
	echo json_encode($response);

?>