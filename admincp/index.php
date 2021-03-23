<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>

    <link 
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" 
        rel="stylesheet" 
    />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['dangnhapadmin'])) {
        header('location:login.php');
    }
?>
<div class="wrapper">
    <?php
        include 'modules/config.php';
        include 'modules/header.php';
        include 'modules/main.php';
        include 'modules/footer.php'
    ?>
</div>
<body>
</html>