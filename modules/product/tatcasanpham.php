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
    $query_all = mysqli_query($conn, "CALL tat_ca_sp('$trang_1', 6);");
?>
<a name="line"></a>
<p class="main-product__title">Tất cả sản phẩm</p>
<ul class="main-product__list">
    <?php
        while ($row_all = mysqli_fetch_array($query_all)) {
    ?>
    <li>
        <a href="index.php?xem=chitietsanpham&idloaisp=<?php echo $row_all['MaNhom'] ?>&id=<?php echo $row_all['MSHH'] ?>#main-detail">
            <img src="admincp/modules/quanlychitietsp/uploads/<?php echo $row_all['Hinh'] ?>" alt="image" />
            <p class="name">Tên sản phẩm: <?php echo $row_all['TenHH'] ?></p>
            <p class="price">Giá: <?php echo number_format($row_all['Gia']) ?>đ</p>
        </a>
    </li>
    <?php
        }
        mysqli_close($conn);
    ?>
</ul>
<?php
    include 'admincp/modules/config.php';
    $sql_trang = mysqli_query($conn, "SELECT * FROM hanghoa");
    $count = mysqli_num_rows($sql_trang);
    $a = ceil($count / 6);
?>
<div class="page">
    <p>
        Trang
        <?php
			for ($i = 1; $i <= $a; $i++) {
				echo '<a href="?trang='.$i.'#line">'.$i.'</a>';
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