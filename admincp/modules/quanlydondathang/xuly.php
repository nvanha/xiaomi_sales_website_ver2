<?php
	include '../config.php';
	$id = $_GET['id'];
	$ad = $_GET['ad'];
	if (isset($_GET['ac'])) {
		$temp=$_GET['ac'];
	} else {
		$temp='';
	} if ($temp == 'xuly') {
		mysqli_query($conn, "CALL xu_ly_don_dat_hang('$ad', '$id');");
		header('location:../../index.php?quanly=quanlydondathang');
	} else if ($temp == 'xoa') {
		mysqli_query($conn, "CALL xoa_don_dat_hang('$id');");
		header('location:../../index.php?quanly=quanlydondathang');
	}
?>