<?php
    include 'admincp/modules/config.php';
    if (isset($_GET['trang'])) {
        $get_trang = $_GET['trang'];
    } else {
        $get_trang = '';
    }
    if ($get_trang == '' || $get_trang == 1) {
        $trang_1 = 0;
    } else {
        $trang_1 = ($get_trang * 6) - 6;
    }
	$query_chitiet = mysqli_query($conn, "CALL chi_tiet_loai_sp('$_GET[id]', '$trang_1', 6);");
    mysqli_close($conn);
?>
<?php
    include 'admincp/modules/config.php';
    $sql_loaisp = "SELECT * FROM nhomhanghoa WHERE MaNhom = '$_GET[id]'";
	$query_loaisp = mysqli_query($conn, $sql_loaisp);
    $row_loaisp = mysqli_fetch_array($query_loaisp);
    $query_temp = mysqli_query($conn, "CALL chi_tiet_loai_sp('$_GET[id]', '$trang_1', 6);");
	if ($row_temp = mysqli_fetch_array($query_temp) == 0) {
		header('location:index.php?xem=danhsachtrong#line');
    }
    mysqli_close($conn);
?>
<a name="line"></a>
<p class="main-product__title"><?php echo $row_loaisp['TenNhom'] ?></p>
<ul class="main-product__list">
    <?php
        include 'admincp/modules/config.php';
        while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    ?>
    <li>
        <a href="index.php?xem=chitietsanpham&idloaisp=<?php echo $row_chitiet['MaNhom'] ?>&id=<?php echo $row_chitiet['MSHH'] ?>#main-detail">
            <img src="admincp/modules/quanlychitietsp/uploads/<?php echo $row_chitiet['Hinh'] ?>" alt="image" />
            <p class="name">Tên sản phẩm: <?php echo $row_chitiet['TenHH'] ?></p>
            <p class="price">Giá: <?php echo number_format($row_chitiet['Gia']) ?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
<?php
    $sql_trang = mysqli_query($conn, "SELECT * FROM hanghoa WHERE MaNhom = '$_GET[id]'");
    $count = mysqli_num_rows($sql_trang);
    $a = ceil($count / 6);
    $id = $row_loaisp['MaNhom'];
?>
<div class="page">
    <p>
        Trang
        <?php
			for ($i = 1; $i <= $a; $i++) {
				echo '<a href="?xem=chitietloaisanpham&id='.$id.'&trang='.$i.'#line">'.$i.'</a>';
			}
		?>
    </p>
    <?php
        if ($get_trang >= 1) {
            echo '<p>Trang hiện tại: <span>'.$get_trang.'</span></p>';
        } else {
            echo '<p>Trang hiện tại: <span>1</span></p>';
        }
    ?>
</div>
<?php mysqli_close($conn); ?>