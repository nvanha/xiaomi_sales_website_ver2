<?php
	$query=mysqli_query($conn, "CALL nav();");
?>
<p class="main-category__title">Danh mục sản phẩm</p>
<ul class="main-category__list">
    <?php
        while($dong_nhomhh=mysqli_fetch_array($query)){
    ?>
    <li><a href="index.php?xem=chitietloaisanpham&id=<?php echo $dong_nhomhh['MaNhom'] ?>#line"><i class="fa fa-reorder"></i><?php echo $dong_nhomhh['TenNhom'] ?></a></li>
    <?php
        }
        mysqli_close($conn);
    ?>
</ul>