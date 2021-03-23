<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin Panel</title>
    <link rel="stylesheet" href="../style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
<?php
    include 'modules/config.php';
    session_start();
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($conn, "CALL login_admin('$username', '$password');");
        $nums = mysqli_num_rows($query);
        if ($nums > 0) {
            $_SESSION['dangnhapadmin'] = $username;
            header('location:index.php');
        } else {
            header('location:login.php');
        }
    }
?>
<div class="wrapper login">
    <div class="login__inner">
        <form action="" method="POST" class="form">
            <h1 class="form__title">Đăng nhập</h1>
            <label for="" class="form__label">Tài khoản</label>
            <input type="text" name="username" class="form__input" placeholder="Nhập tài khoản ..." />
            <label for="" class="form__label">Mật khẩu</label>
            <input type="password" name="password" class="form__input" placeholder="Nhập mật khẩu ..." />
            <input type="submit" class="form__login" name="login" id="button" value="Đăng nhập" />
        </form>
    </div>
</div>
</body>
</html>