<?php
    include '../config.php';
    $id = $_GET['id'];
    $ma_nhom = $_POST['manhom'];
    $ten_nhom = $_POST['tennhom'];
    if (isset($_POST['them'])) {
        mysqli_query($conn, "CALL them_loai_sp('$ma_nhom', '$ten_nhom')");
        header('location:../../index.php?quanly=quanlyloaisp&ac=them');
    } else if (isset($_POST['sua'])) {
        mysqli_query($conn, "CALL sua_loai_sp('$ma_nhom', '$ten_nhom', '$id');");
        header('location:../../index.php?quanly=quanlyloaisp&ac=sua&id='.$ma_nhom);
    } else {
        mysqli_query($conn, "CALL xoa_loai_sp('$id');");
        header('location:../../index.php?quanly=quanlyloaisp&ac=them');
    }
?>