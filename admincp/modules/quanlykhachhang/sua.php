<?php
    $sql = "SELECT * FROM khachhang WHERE MSKH = '$_GET[id]'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
?>
<p class="main__content-title">Quản lý khách hàng <span>/</span> Sửa thông tin khách hàng</p>
<div class="main__form">
    <form action="modules/quanlykhachhang/xuly.php?id=<?php echo $row['MSKH'] ?>" method="POST" enctype="multipart/form-data">
        <table class="main__form-table">
            <tr>
                <th>Họ tên khách hàng</th>
                <td><input type="text" name="name" value="<?php echo $row['HoTenKH'] ?>" class="main__form-input"></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><input type="text" name="diachi" value="<?php echo $row['DiaChi'] ?>" class="main__form-input"></td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><input type="text" name="phone" value="<?php echo $row['SoDienThoai'] ?>" class="main__form-input"></td>
            </tr>
            <tr>
                <th>Tài khoản</th>
                <td><input type="text" name="taikhoan" value="<?php echo $row['TaiKhoan'] ?>" class="main__form-input"></td>
            </tr>
            <tr>
                <th>Mật khẩu</th>
                <td><input type="text" name="matkhau" value="<?php echo $row['MatKhau'] ?>" class="main__form-input"></td>
            </tr>
        </table>
        <input type="submit" name="sua" id="sua" value="Sửa" class="main__form-submit" />
    </form>
</div>