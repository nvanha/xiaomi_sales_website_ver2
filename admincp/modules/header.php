<?php
    if (isset($_GET['ac']) && $_GET['ac'] == 'logoutadmin') {
        unset($_SESSION['dangnhapadmin']);
        header('location:login.php');
    }
?>
<header class="header">
    <div class="container header__inner">
        <div class="header__item">
            <a href="index.php" class="logo"><img src="../image/logo.svg" alt="logo"></a>
            <a href="index.php" class="header__title">Quản lý Admin</a>
        </div>
        <div class="header__item">
            <p class="header__user"><?php echo $_SESSION['dangnhapadmin'] ?></p>
            <a href="index.php?ac=logoutadmin" class="header__logout">Đăng xuất</a>
        </div>
    </div>
</header>