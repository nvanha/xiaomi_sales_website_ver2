<p class="main__content-title">Quản lý khách hàng <span>/</span> Thêm thông tin khách hàng</p>
<div class="main__form">
    <form action="modules/quanlykhachhang/xuly.php" method="POST" enctype="multipart/form-data">
        <table class="main__form-table">
            <tr>
                <th>Họ tên khách hàng</th>
                <td><input type="text" name="name" placeholder="Nhập họ tên khách hàng ..." class="main__form-input"></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><input type="text" name="diachi" placeholder="Nhập địa chỉ khách hàng ..." class="main__form-input"></td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><input type="text" name="phone" placeholder="Nhập số điện thoại ..." class="main__form-input"></td>
            </tr>
            <tr>
                <th>Tài khoản</th>
                <td><input type="text" name="taikhoan" placeholder="Nhập tài khoản ..." class="main__form-input"></td>
            </tr>
            <tr>
                <th>Mật khẩu</th>
                <td><input type="text" name="matkhau" placeholder="Nhập mật khẩu ..." class="main__form-input"></td>
            </tr>
        </table>
        <input type="submit" name="them" id="them" value="Thêm" class="main__form-submit" />
    </form>
</div>