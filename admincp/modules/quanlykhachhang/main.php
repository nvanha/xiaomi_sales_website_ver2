<div class="main__content-item">
    <?php
        if (isset($_GET['ac'])) {
            $temp = $_GET['ac'];
        } else {
            $temp = '';
        } if ($temp == 'them') {
            include 'modules/quanlykhachhang/them.php';
        } else if ($temp == 'sua') {
            include 'modules/quanlykhachhang/sua.php';
        }
    ?>
</div>
<div class="main__content-item">
    <?php
        include 'modules/quanlykhachhang/lietke.php';
    ?>
</div>