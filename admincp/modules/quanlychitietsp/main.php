<div class="main__content-item">
    <?php
        if (isset($_GET['ac'])) {
            $temp = $_GET['ac'];
        } else {
            $temp = '';
        } if ($temp == 'them') {
            include 'modules/quanlychitietsp/them.php';
        } else if ($temp == 'sua') {
            include 'modules/quanlychitietsp/sua.php';
        }
    ?>
</div>
<div class="main__content-item">
    <?php
        include 'modules/quanlychitietsp/lietke.php';
    ?>
</div>