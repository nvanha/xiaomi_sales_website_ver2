<?php
	include '../config.php';
	$id = $_GET['id'];
	if (isset($_GET['ac'])) {
		$temp = $_GET['ac'];
	} else {
		$temp = '';
	} if ($temp == 'xoa') {
		mysqli_query($conn, "CALL xoa_chi_tiet_don_dh('$id');");
		header('location:../../index.php?quanly=quanlychitietdondh');
	}
?>