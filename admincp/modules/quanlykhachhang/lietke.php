<?php
    $result = mysqli_query($conn, "CALL list_khach_hang();");
?>
<div class="main__content-title">
    <p>Danh sách thông tin khách hàng</p>
</div>
<div class="main__feature">
    <table class="main__feature-table">
        <tr>
            <th>ID</th>
            <th>MSKH</th>
            <th>Họ tên KH</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th colspan="2">Quản lý</th>
        </tr>
        <?php
            $id = 1;
            while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $row['MSKH'] ?></td>
            <td><?php echo $row['HoTenKH'] ?></td>
            <td><?php echo $row['DiaChi'] ?></td>
            <td><?php echo $row['SoDienThoai'] ?></td>
            <td><?php echo $row['TaiKhoan'] ?></td>
            <td><?php echo $row['MatKhau'] ?></td>
            <td><a href="index.php?quanly=quanlykhachhang&ac=sua&id=<?php echo $row['MSKH'] ?>">Sửa</a></td>
            <td><a href="modules/quanlykhachhang/xuly.php?id=<?php echo $row['MSKH'] ?>">Xóa</a></td>
        </tr>
        <?php
                $id++;
            }
        ?>
    </table>
</div>