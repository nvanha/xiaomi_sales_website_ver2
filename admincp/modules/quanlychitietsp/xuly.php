<?php
    include '../config.php';
    $id = $_GET['id'];
	$mshh = $_POST['mshh'];
	$ten_hh = $_POST['tenhh'];
	$gia = $_POST['gia'];
	$so_luong = $_POST['soluong'];
	$ma_nhom = $_POST['manhom'];
	$mo_ta_hh = $_POST['motahh'];
	$hinh = $_FILES['hinh']['name'];
	$hinh_tmp = $_FILES['hinh']['tmp_name'];
    move_uploaded_file($hinh_tmp, 'uploads/'.$hinh);
    if (isset($_POST['them'])) {
		mysqli_query($conn, "CALL them_chi_tiet_sp('$mshh', '$ten_hh', '$gia', '$so_luong', '$ma_nhom', '$hinh', '$mo_ta_hh');");
		header('location:../../index.php?quanly=quanlychitietsp&ac=them');
	} else if (isset($_POST['sua'])) {
		if ($hinh != '') {
			mysqli_query($conn, "CALL sua_chi_tiet_sp('$ten_hh', '$gia', '$so_luong', '$ma_nhom', '$hinh', '$mo_ta_hh', '$id');");
		} else {
			mysqli_query($conn, "CALL sua_chi_tiet_sp('$ten_hh', '$gia', '$so_luong', '$ma_nhom', NULL, '$mo_ta_hh', '$id');");
		}
		header('location:../../index.php?quanly=quanlychitietsp&ac=sua&id='.$id);
	} else {
		mysqli_query($conn, "CALL xoa_chi_tiet_sp('$id');");
		header('location:../../index.php?quanly=quanlychitietsp&ac=them');
	}
?>