<?php
    $sql = "SELECT * FROM nhomhanghoa WHERE MaNhom = '$_GET[id]'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
?>
<p class="main__content-title">Quản lý loại sản phẩm <span>/</span> Sửa loại sản phẩm</p>
<div class="main__form">
    <form action="modules/quanlyloaisp/xuly.php?id=<?php echo $row['MaNhom'] ?>" method="POST" enctype="multipart/form-data">
        <table class="main__form-table">
            <tr>
                <th>Mã nhóm</th>
                <td><input type="text" name="manhom" class="main__form-input" value="<?php echo $row['MaNhom'] ?>"></td>
            </tr>
            <tr>
                <th>Tên nhóm</th>
                <td><input type="text" name="tennhom" name="manhom" class="main__form-input" value="<?php echo $row['TenNhom'] ?>"></td>
            </tr>
        </table>
        <input type="submit" name="sua" id="sua" value="Sửa" class="main__form-submit" />
    </form>
</div>