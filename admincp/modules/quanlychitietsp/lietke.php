<?php
    $run = mysqli_query($conn, "CALL list_chi_tiet_sp();");
?>
<div class="main__content-title">
    <p>Danh sách chi tiết sản phẩm</p>
</div>
<div class="main__feature">
    <table class="main__feature-table">
        <tr>
            <th>ID</th>
            <th>Mã số sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng hàng</th>
            <th>Tên nhóm</th>
            <th>Hình</th>
            <th>Mô tả sản phẩm</th>
            <th colspan="2">Quản lý</th>
        </tr>
        <?php
            $id = 1;
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $row['MSHH'] ?></td>
            <td><?php echo $row['TenHH'] ?></td>
            <td><?php echo number_format($row['Gia']) ?></td>
            <td><?php echo $row['SoLuongHang'] ?></td>
            <td><?php echo $row['TenNhom'] ?></td>
            <td><img src="modules/quanlychitietsp/uploads/<?php echo $row['Hinh'] ?>" alt="hình"></td>
            <td><?php echo $row['MoTaHH'] ?></td>
            <td><a href="index.php?quanly=quanlychitietsp&ac=sua&id=<?php echo $row['MSHH'] ?>">Sửa</a></td>
            <td><a href="modules/quanlychitietsp/xuly.php?id=<?php echo $row['MSHH'] ?>">Xóa</a></td>
        </tr>
        <?php
                $id++;
            }
        ?>
    </table>
</div>