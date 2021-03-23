<?php
    $run_list = mysqli_query($conn, "CALL list_loai_sp();");
?>
<p class="main__content-title">Danh sách loại sản phẩm</p>
<div class="main__feature">
    <table class="main__feature-table">
        <tr>
            <th>ID</th>
            <th>Mã nhóm</th>
            <th>Tên nhóm</th>
            <th colspan="2">Quản lý</th>
        </tr>
        <?php
            $id = 1;
            while ($row_list = mysqli_fetch_array($run_list)) {
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $row_list['MaNhom'] ?></td>
            <td><?php echo $row_list['TenNhom'] ?></td>
            <td><a href="index.php?quanly=quanlyloaisp&ac=sua&id=<?php echo $row_list['MaNhom'] ?>">Sửa</a></td>
            <td><a href="modules/quanlyloaisp/xuly.php?id=<?php echo $row_list['MaNhom'] ?>">Xóa</a></td>
        </tr>
        <?php
                $id++;
            }
        ?>
    </table>
</div>