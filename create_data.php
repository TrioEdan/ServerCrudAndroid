<?php
	include_once('koneksi.php');

	$npm=$_POST['npm'];
	$nama=$_POST['nama'];
	$prodi=$_POST['prodi'];
	$kelas=$_POST['kelas'];

	$insert = "INSERT INTO tb_mahasiswa(npm,nama,prodi,kelas) VALUES ('$npm','$nama','$prodi','$kelas')";
	$exeinsert = mysqli_query($koneksi,$insert);

	$response = array();

	if($exeinsert){
		$response['code']=1;
		$response['message']= "Success! Data ditambahkan";
	} else {
		$response['code']=0;
		$response['message']= "Failed! Data tidak ditambahkan";
	}

	echo json_encode($response);
?>