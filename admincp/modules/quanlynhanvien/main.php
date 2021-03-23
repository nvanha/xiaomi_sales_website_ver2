<div class="main__content-item">
    <?php
        if (isset($_GET['ac'])) {
            $temp = $_GET['ac'];
        } else {
            $temp = '';
        } if ($temp == 'them') {
            include 'modules/quanlynhanvien/them.php';
        } else if ($temp == 'sua') {
            include 'modules/quanlynhanvien/sua.php';
        }
    ?>
</div>
<div class="main__content-item">
    <?php
        include 'modules/quanlynhanvien/lietke.php';
    ?>
</div>