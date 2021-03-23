<p class="main__content-title">Quản lý loại sản phẩm <span>/</span> Thêm loại sản phẩm</p>
<div class="main__form">
    <form action="modules/quanlyloaisp/xuly.php" method="POST" enctype="multipart/form-data">
        <table class="main__form-table">
            <tr>
                <th>Mã nhóm</th>
                <td><input type="text" name="manhom" class="main__form-input" placeholder="Nhập mã nhóm sản phẩm tối đa 10 ký tự ..."></td>
            </tr>
            <tr>
                <th>Tên nhóm</th>
                <td><input type="text" name="tennhom" placeholder="Nhập tên nhóm sản phẩm ..." class="main__form-input"></td>
            </tr>
        </table>
        <input type="submit" name="them" id="them" value="Thêm" class="main__form-submit" />
    </form>
</div>