<?php
	include '../config.php';
	$id = $_GET['id'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	$mskh = substr(str_shuffle($permitted_chars), 0, 5);
	$name = $_POST['name'];
	$dia_chi = $_POST['diachi'];
    $phone = $_POST['phone'];
    $tai_khoan = $_POST['taikhoan'];
    $mat_khau = $_POST['matkhau'];
	if (isset($_POST['them'])) {
		mysqli_query($conn, "CALL them_khach_hang('$mskh', '$name', '$dia_chi', '$phone', '$tai_khoan', '$mat_khau');");
		header('location:../../index.php?quanly=quanlykhachhang&ac=them');
	} else if (isset($_POST['sua'])) {
		mysqli_query($conn, "CALL sua_khach_hang('$name', '$dia_chi', '$phone', '$tai_khoan', '$mat_khau', '$id');");
		header('location:../../index.php?quanly=quanlykhachhang&ac=sua&id='.$id);
	} else {
		mysqli_query($conn, "CALL xoa_khach_hang('$id');");
		header('location:../../index.php?quanly=quanlykhachhang&ac=them');
	}
?>