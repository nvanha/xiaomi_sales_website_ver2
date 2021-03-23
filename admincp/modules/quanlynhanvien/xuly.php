<?php
	include '../config.php';
	$id = $_GET['id'];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	$msnv = substr(str_shuffle($permitted_chars), 0, 5);
	$name = $_POST['name'];
	$chuc_vu = $_POST['chucvu'];
	$dia_chi = $_POST['diachi'];
    $phone = $_POST['phone'];
    $tai_khoan = $_POST['taikhoan'];
    $mat_khau = $_POST['matkhau'];
	if (isset($_POST['them'])) {
		mysqli_query($conn, "CALL them_nhan_vien('$msnv', '$name', '$chuc_vu', '$dia_chi', '$phone', '$tai_khoan', '$mat_khau');");
		header('location:../../index.php?quanly=quanlynhanvien&ac=them');
	} else if (isset($_POST['sua'])) {
		mysqli_query($conn, "CALL sua_nhan_vien('$name', '$chuc_vu', '$dia_chi', '$phone', '$tai_khoan', '$mat_khau', '$id');");
		header('location:../../index.php?quanly=quanlynhanvien&ac=sua&id='.$id);
	} else {
		mysqli_query($conn, "CALL xoa_nhan_vien('$id');");
		header('location:../../index.php?quanly=quanlynhanvien&ac=them');
	}
?>