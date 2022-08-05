<?php
    // Khởi động
    session_start();
    // Sử dụng biến $_session để kiểm tra
    var_export($_SESSION);
    $errors = isset($_GET['errors']) ? $_GET['errors'] : '';
?>
<!-- Nếu trên url có biến errors được truyền vào theo method Get -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
        <div style="color: red;">
            <?php
                echo $errors;
            ?>
        </div>
        <?php
            if(isset($_SESSION['user'])){ ?>
                    <h1>chào <?= $_SESSION['user']['email']?>!</h1>
                    <a href="logout.php">Đăng xuất</a>
        <?php    } else{?>


        
        <form action="post-login.php" method="POST">
            <input type="email" name="email" class="form-control">
            <input type="password" name="password" class="form-control">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
        <?php }?>
</body>
</html>
