<main class="main">
    <div class="container main__inner">
        <div class="main-category">
            <?php
                include 'modules/category/nav.php';
            ?>
        </div>
        <div class="main-product">
            <?php
                if (isset($_GET['xem'])) {
                    $temp = $_GET['xem'];
                } else {
                    $temp = '';
                } if ($temp == 'chitietloaisanpham') {
                    include 'modules/product/chitietloaisanpham.php';
                } else if ($temp == 'chitietsanpham') {
                    include 'modules/product/chitietsanpham.php';
				} else if ($temp =='giohang') {
                    include 'modules/product/giohang.php';
				} else if ($temp == 'danhsachtrong') {
                    include 'modules/product/danhsachtrong.php';
                } else if (isset($_POST['search'])) {
                    include 'modules/product/search.php';
                } else {
                    include 'modules/product/tatcasanpham.php';
                }
            ?>
        </div>
    </div>
    <?php
        if ($temp == 'chitietsanpham') {
            include 'modules/product/relate.php';
        }
    ?>
</main>