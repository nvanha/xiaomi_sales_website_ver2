<div class="main__content-item">
    <?php
        if (isset($_GET['ac'])) {
            $temp = $_GET['ac'];
        } else {
            $temp = '';
        } if ($temp == 'them') {
            include 'modules/quanlyloaisp/them.php';
        } else if ($temp == 'sua') {
            include 'modules/quanlyloaisp/sua.php';
        }
    ?>
</div>
<div class="main__content-item">
    <?php
        include 'modules/quanlyloaisp/lietke.php';
    ?>
</div>