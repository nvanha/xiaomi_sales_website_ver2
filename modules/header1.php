<?php
	if (isset($_GET['ac']) && $_GET['ac'] == 'logout') {
		unset($_SESSION['dangnhap']);
        header('location:index.php');
        $_SESSION[substr($name, 0, 5) == 'cart_'] = array();
        foreach ($_SESSION as $name => $value) {
            if ($value > 0) {
                if (substr($name, 0, 5) == 'cart_') {
                    unset($_SESSION[$name]);
                }
            }
        }
	}
?>
<header class="header">
    <div class="container header__inner">
        <nav class="header__menu">
            <ul>
                <li><a href="https://www.mi.com/vn/" target="_blank">Mi VietNam</a></li>
                <li><a href="https://www.facebook.com/XiaomiVietnam/" target="_blank">Tìm tôi trên Facebook</a></li>
            </ul>
        </nav>
        <nav class="header__login">
            <ul>
                <li><a href=""><?php echo $_SESSION['dangnhap'] ?>'s account</a></li>
                <li><a href="index.php?ac=logout">Đăng xuất</a></li>
                <li><a href="index.php?xem=giohang#cart"><i class="fas fa-cart-plus"></i>Giỏ hàng</a></li> 
            </ul>
        </nav>
    </div>
</header>