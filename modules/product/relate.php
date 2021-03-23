<?php
    include 'admincp/modules/config.php';
    $sql_relate = "SELECT * FROM hanghoa WHERE MaNhom = '$_GET[idloaisp]' AND MSHH <> '$_GET[id]' LIMIT 5";
    $query_relate = mysqli_query($conn, $sql_relate);
    // $query_relate = mysqli_query($conn, "CALL relate('$_GET[idloaisp]', '$_GET[id]', 5);");
?>
<div class="relate">
    <div class="container relate__inner">
        <p>Sản phẩm tương tự</p>
        <div class="relate__product">
            <ul>
                <?php
                    while ($row_relate = mysqli_fetch_array($query_relate)) {
                ?>
                <li>
                    <a href="index.php?xem=chitietsanpham&idloaisp=<?php echo $row_relate['MaNhom'] ?>&id=<?php echo $row_relate['MSHH'] ?>#main-detail">
                        <img src="admincp/modules/quanlychitietsp/uploads/<?php echo $row_relate['Hinh'] ?>" alt="image" />
                        <p class="name"><?php echo $row_relate['TenHH'] ?></p>
                        <p class="price"><?php echo number_format($row_relate['Gia']) ?>đ</p>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php mysqli_close($conn); ?>