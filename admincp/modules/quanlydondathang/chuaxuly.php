<?php
	include 'modules/config.php';
	$run = mysqli_query($conn, "CALL list_don_dat_hang_false();");
?>
<p class="main__content-title">Quản lý đơn đặt hàng <span>/</span> Danh sách đơn đặt hàng chưa xử lý</p>
<div class="main__feature">
    <table class="main__feature-table">
        <tr>
            <th>ID</th>
            <th>Số đơn đặt hàng</th>
            <th>MSKH</th>
            <th>MSNV</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th colspan="2">Quản lý</th>
        </tr>
        <?php
            $i = 1;
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['SoDonHH'] ?></td>
            <td><?php echo $row['MSKH'] ?></td>
            <td><?php echo $row['MSNV'] ?></td>
            <td><?php echo $row['NgayDH'] ?></td>
            <td><?php echo $row['TrangThai'] ?></td>
            <td><a href="modules/quanlydondathang/xuly.php?ac=xuly&ad=<?php echo $_SESSION['dangnhapadmin'] ?>&id=<?php echo $row['SoDonHH'] ?>">Xử lý</a></td>
            <td><a href="modules/quanlydondathang/xuly.php?ac=xoa&id=<?php echo $row['SoDonHH'] ?>">Xóa</a></td>
        </tr>
        <?php
                $i++;
            }
        ?>
    </table>
</div>
<?php mysqli_close($conn); ?>