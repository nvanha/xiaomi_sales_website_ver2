<?php
    include 'admincp/modules/config.php';
	if (isset($_POST['search'])) {
		$search = $_POST['searchtext'];
        $sql_search = "SELECT * FROM hanghoa WHERE TenHH LIKE '%$search%' LIMIT 12";
		$query_search = mysqli_query($conn, $sql_search);
	}
?>
<a name="line"></a>
<p class="main-product__title">Sản phẩm tìm thấy</p>
<?php
    if ($count = mysqli_num_rows($query_search) == 0) {
?>
    <p class="danh_sach_trong_title">Không tìm thấy sản phẩm</p>
<?php
    } else {
?>
<ul class="main-product__list">
    <?php
        while ($row_search = mysqli_fetch_array($query_search)) {
    ?>
    <li>
        <a href="index.php?xem=chitietsanpham&idloaisp=<?php echo $row_search['MaNhom'] ?>&id=<?php echo $row_search['MSHH'] ?>#main-detail">
            <img src="admincp/modules/quanlychitietsp/uploads/<?php echo $row_search['Hinh'] ?>" alt="image" />
            <p class="name">Tên sản phẩm: <?php echo $row_search['TenHH'] ?></p>
            <p class="price">Giá: <?php echo number_format($row_search['Gia']) ?>đ</p>
        </a>
    </li>
    <?php
        }
    }
    ?>
</ul>
<?php mysqli_close($conn); ?>