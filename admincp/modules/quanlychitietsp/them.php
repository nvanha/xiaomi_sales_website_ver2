<p class="main__content-title">Quản lý chi tiết sản phẩm <span>/</span> Thêm chi tiết sản phẩm</p>
<div class="main__form">
    <form action="modules/quanlychitietsp/xuly.php" method="POST" enctype="multipart/form-data">
        <table class="main__form-table">
            <tr>
                <th>Mã số sản phẩm</th>
                <td><input type="text" name="mshh" class="main__form-input" placeholder="Nhập mã sản phẩm tối đa 5 ký tự ..."></td>
            </tr>
            <tr>
                <th>Tên sản phẩm</th>
                <td><input type="text" name="tenhh" placeholder="Nhập tên sản phẩm ..." class="main__form-input"></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td><input type="text" name="gia" placeholder="Nhập giá sản phẩm ..." class="main__form-input"></td>
            </tr>
            <tr>
                <th>Số lượng hàng</th>
                <td><input type="text" name="soluong" placeholder="Nhập số lượng sản phẩm ..." class="main__form-input"></td>
            </tr>
            <?php
                $sql = "SELECT * FROM nhomhanghoa";
                $run = mysqli_query($conn, $sql);
            ?>
            <tr>
                <th>Tên nhóm</th>
                <td><select name="manhom" class="main__form-select">
                    <option class="main__form-option">-- Chọn nhóm sản phẩm --</option>
                    <?php
                        while ($row = mysqli_fetch_array($run)) {
                    ?>
                    <option value="<?php echo $row['MaNhom'] ?>" class="main__form-option">
                        <?php echo $row['TenNhom'] ?>
                    </option>
                    <?php
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <th>Hình</th>
                <td><input type="file" name="hinh" class="main__form-file"></td>
            </tr>
            <tr>
                <th>Mô tả sản phẩm</th>
                <td><textarea name="motahh" cols="40" rows="15" placeholder="Nhập mô tả sản phẩm ..." class="main__form-area"></textarea></td>
            </tr>
        </table>
        <input type="submit" name="them" id="them" value="Thêm" class="main__form-submit" />
    </form>
</div>