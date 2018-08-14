<?php
	include_once('koneksi.php');

	$npm = $_GET['npm'];

	$getdata = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE npm = '$npm'");
	$rows = mysqli_num_rows($getdata);

	$delete = "DELETE FROM tb_mahasiswa WHERE npm = '$npm'";
	$exedelete = mysqli_query($koneksi,$delete);

	if($rows > 0)
	{
		if ($exedelete) {
			$response['code'] =1;
			$response['message'] = "Delete Success";
		} else {
			$response['code'] =0;
			$response['message'] = "Failed Delete";
		} 
	} else {
		$response['code'] =0;
		$response['message'] = "Failed Delete : Data Not Found!";
	}

	echo json_encode($response);
?>