<section class="main__content">
    <?php
        if (isset($_GET['quanly'])) {
            $temp = $_GET['quanly'];
        } else {
            $temp = '';
        }
        if ($temp == 'quanlyloaisp') {
            include 'modules/quanlyloaisp/main.php';
        } else if ($temp == 'quanlychitietsp') {
            include 'modules/quanlychitietsp/main.php';
        } else if ($temp == 'quanlykhachhang') {
            include 'modules/quanlykhachhang/main.php';
        } else if ($temp == 'quanlynhanvien') {
            include 'modules/quanlynhanvien/main.php';
        } else if ($temp == 'quanlydondathang') {
			include 'modules/quanlydondathang/main.php';
		} else if ($temp == 'quanlychitietdondh') {
			include 'modules/quanlychitietdondh/main.php';
		} else if ($temp == 'thongke') {
			include 'modules/thongke/main.php';
		}
    ?>
</section>