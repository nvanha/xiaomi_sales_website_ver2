<?php
    $run = mysqli_query($conn, "CALL list_nhan_vien();");
?>
<div class="main__content-title">
    <p>Danh sách thông tin nhân viên</p>
</div>
<div class="main__feature">
    <table class="main__feature-table">
        <tr>
            <th>ID</th>
            <th>MSNV</th>
            <th>Họ tên NV</th>
            <th>Chức vụ</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th colspan="2">Quản lý</th>
        </tr>
        <?php
            $id = 1;
            while ($row = mysqli_fetch_array($run)) {
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $row['MSNV'] ?></td>
            <td><?php echo $row['HoTenNV'] ?></td>
            <td><?php echo $row['ChucVu'] ?></td>
            <td><?php echo $row['DiaChi'] ?></td>
            <td><?php echo $row['SoDienThoai'] ?></td>
            <td><?php echo $row['TaiKhoan'] ?></td>
            <td><?php echo $row['MatKhau'] ?></td>
            <td><a href="index.php?quanly=quanlynhanvien&ac=sua&id=<?php echo $row['MSNV'] ?>">Sửa</a></td>
            <td><a href="modules/quanlynhanvien/xuly.php?id=<?php echo $row['MSNV'] ?>">Xóa</a></td>
        </tr>
        <?php
                $id++;
            }
        ?>
    </table>
</div>