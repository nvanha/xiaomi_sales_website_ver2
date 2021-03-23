<p class="main__content-title">Thống kê <span>/</span> Tổng chi tiêu của khách hàng</p>
<div class="main__form">
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="main__form-table center">
            <tr>
                <th>Họ tên khách hàng</th>
                <td><input type="text" name="name" placeholder="Nhập họ tên khách hàng ..." class="main__form-input"></td>
            </tr>
            <?php
                if (isset($_POST['tim'])) {
                    $sql = "SELECT tong_chi_tieu('$_POST[name]');";
                    $result = $conn->query($sql);
                    if ($result) {
            ?>
            <tr>
                <td colspan="2"><?php echo number_format($result->fetch_array()[0]); ?>đ</td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
        <input type="submit" name="tim" id="tim" value="Tìm kiếm" class="main__form-submit" />
    </form>
</div>