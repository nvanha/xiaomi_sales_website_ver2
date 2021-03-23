<?php
    if (!isset($_SESSION['dangnhap'])) {
        header('location:login.php');
    }
    include 'admincp/modules/config.php';
?>
<div class="cart" id="cart">
    <?php
        if (isset($_GET['add']) && !empty($_GET['add'])) {
            $id = $_GET['add'];
            @$_SESSION['cart_'.$id] += 1;
            header('location:index.php?xem=giohang');
        } if (isset($_GET['them'])) {
            $_SESSION['cart_'.$_GET['them']] += 1;
            header('location:index.php?xem=giohang');
        } if (isset($_GET['tru'])) {
            $_SESSION['cart_'.$_GET['tru']] -= 1;
            header('location:index.php?xem=giohang');
        } if (isset($_GET['xoa'])) {
            $_SESSION['cart_'.$_GET['xoa']] = 0;
            header('location:index.php?xem=giohang#cart');
        }
        $thanh_tien = 0;
        ?>
    <div class="cart-information">
        <div class="cart-information__item">
            <img src="image/logo.svg" alt="image" class="logo" />
            <p>Giỏ hàng</p>
        </div>
        <h1><?php echo $_SESSION['dangnhap'] ?></h1>
    </div>
    <div class="cart-title">
        <ul>
            <li>Sản phẩm</li>
            <li>Đơn giá</li>
            <li>Số lượng</li>
            <li>Số tiền</li>
            <li>Thao tác</li>
        </ul>
    </div>
    <div class="cart-product">
        <ul>
            <?php
                $count = 0;
                $amount_product = 0;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("Y-m-d G:i:s");
                foreach ($_SESSION as $name => $value) {
                    if ($value > 0) {
                        if (substr($name, 0, 5) == 'cart_') {
                            $id = substr($name, 5, strlen($name) - 5);
                            $sql = "SELECT * FROM hanghoa WHERE MSHH = '".$id."'";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                                $tong_tien = $row['Gia'] * $value;
            ?>
            <li id="<?php echo $id ?>">
                <div class="name">
                    <img src="admincp/modules/quanlychitietsp/uploads/<?php echo $row['Hinh'] ?>" alt="image" />
                    <p><?php echo $row['TenHH'] ?></p>
                </div>
                <div class="price">
                    <p><span><?php echo number_format($row['Gia'] + 780000) ?>đ</span><?php echo number_format($row['Gia']) ?>đ</p>
                </div>
                <div class="amount">
                    <p>
                        <?php
                            if ($value < $row['SoLuongHang']) {
                                echo '<a href="index.php?xem=giohang&them='.$id.'#'.$id.'">+</a>';
                            } else {
                                echo '<a href="index.php?xem=giohang" class="none">+</a>';
                            }
                        ?>
                        <?php echo $value ?>
                        <?php
                            if ($value > 1) {
                                echo '<a href="index.php?xem=giohang&tru='.$id.'#'.$id.'">-</a>';
                            } else if ($value == 1) {
                                echo '<a href="index.php?xem=giohang&tru='.$id.'#cart">-</a>';
                            }
                        ?>
                    </p>
                    <p>Số lượng hàng còn lại trong kho <?php echo $row['SoLuongHang'] ?></p>
                </div>
                <div class="money">
                    <p><?php echo number_format($tong_tien).'đ' ?></p>
                </div>
                <div class="delete">
                    <a href="index.php?xem=giohang&xoa=<?php echo $id ?>">Xóa</a>
                </div>
            </li>
            <?php
                                $thanh_tien += $tong_tien;
                                $arrTenHH[$count] = $row['TenHH'];
                                $arrValue[$count] = $value;
                                $arrTongTien[$count] = $tong_tien;
                                $count++;
                                $amount_product += $value;
                            }
                        }
                    }
                }
            ?>
        </ul>
    </div>
    <div class="cart-pay">
        <?php
            if ($thanh_tien == 0) {
                echo '<p>Giỏ hàng trống</p>';
            } else {
                echo 
                '<p>Tổng tiền hàng ('.$amount_product.' sản phẩm):</p>
                <p>'.number_format($thanh_tien).'đ</p>
                <a href="index.php?xem=giohang&dathang=true">Mua hàng</a>';
            }
        ?>
    </div>
    <?php
        if (isset($_GET['dathang']) && $_GET['dathang'] == 'true') {
            for ($i = 0; $i < $count; $i++) {		
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $MSDH = substr(str_shuffle($permitted_chars), 0, 5);
                mysqli_query($conn, "CALL thanh_toan('$MSDH', '$arrTenHH[$i]', '$arrValue[$i]', '$arrTongTien[$i]', '$_SESSION[dangnhap]', '$date', 'false');");
            }
            $_SESSION[substr($name, 0, 5) == 'cart_'] = array();
            foreach ($_SESSION as $name => $value) {
                if ($value > 0) {
                    if (substr($name, 0, 5) == 'cart_') {
                        unset($_SESSION[$name]);
                    }
                }
            }
            echo '<script>alert("Bạn đã đặt hàng thành công! Xin vui lòng reset lại trang!")</script>';
        }
    ?>
</div>
<?php mysqli_close($conn); ?>