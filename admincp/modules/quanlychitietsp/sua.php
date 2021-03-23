<?php
    $sql = "SELECT * FROM hanghoa WHERE MSHH = '$_GET[id]'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
?>
<p class="main__content-title">Quản lý chi tiết sản phẩm <span>/</span> Sửa chi tiết sản phẩm</p>
<div class="main__form">
    <form action="modules/quanlychitietsp/xuly.php?id=<?php echo $row['MSHH'] ?>" method="POST" enctype="multipart/form-data">
        <table class="main__form-table">
            <tr>
                <th>Tên sản phẩm</th>
                <td colspan="2"><input type="text" name="tenhh" class="main__form-input" value="<?php echo $row['TenHH'] ?>"></td>
            </tr>
            <tr>
                <th>Giá</th>
                <td colspan="2"><input type="text" name="gia" class="main__form-input" value="<?php echo $row['Gia'] ?>"></td>
            </tr>
            <tr>
                <th>Số lượng hàng</th>
                <td colspan="2"><input type="text" name="soluong" class="main__form-input" value="<?php echo $row['SoLuongHang'] ?>"></td>
            </tr>
            <?php 
                $sql_loaisp = "SELECT * FROM nhomhanghoa";
                $run_loaisp = mysqli_query($conn, $sql_loaisp);
            ?>
            <tr>
                <th>Tên nhóm</th>
                <td colspan="2"><select name="manhom" class="main__form-select">
                    <?php
                        while ($row_loaisp = mysqli_fetch_array($run_loaisp)) {
                            if ($row['MaNhom'] == $row_loaisp['MaNhom']) {
                    ?>
                    <option selected="selected" value="<?php echo $row_loaisp['MaNhom'] ?>" class="main__form-option">
                        <?php echo $row_loaisp['TenNhom'] ?>
                    </option>
                    <?php 
                            } else {
                    ?>
                    <option value="<?php echo $row_loaisp['MaNhom'] ?>" class="main__form-option">
                        <?php echo $row_loaisp['TenNhom'] ?>
                    </option>
                    <?php
                            }
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <th>Hình</th>
                <td><input type="file" name="hinh" class="main__form-file"></td>
                <td><img src="modules/quanlychitietsp/uploads/<?php echo $row['Hinh'] ?>" alt="hình"></td>
            </tr>
            <tr>
                <th>Mô tả sản phẩm</th>
                <td colspan="2"><textarea name="motahh" cols="40" rows="15" class="main__form-area"><?php echo $row['MoTaHH'] ?></textarea></td>
            </tr>
        </table>
        <input type="submit" name="sua" id="sua" value="Sửa" class="main__form-submit" />
    </form>
</div>