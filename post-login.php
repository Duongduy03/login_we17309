<?php
    require_once('db.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Giá trị mặc định của chuỗi là chuỗi rỗng
    $errors = "";
    if($email == ""){
        $errors = $errors . 'Bắt buộc nhập email';
    }
    if($password == ""){
        $errors = $errors . 'Bắt buộc nhập mật khẩu';

    }
    // Kiểm tra nếu có lỗi thì quay về màn login kèm lỗi đó 
    if($errors != ''){
        header("location: login-form.php?errors=$errors");
    }else{
        // Nếu không có lỗi thì bắt đầu công việc của db
        // 1. Lấy ra bản ghi email === email nhập
        $sql = "select * from nguoi_dung where email = '$email'";
        $statement = $connect->prepare($sql);
        $statement->execute();
        $loginUser = $statement->fetch();
        // 2. Nếu không có logn user -> không tồn tại
        if($loginUser == false){
            $errors = 'Không tồn tại';
            header("location: login-form.php?errors=$errors");
            // 2.2 Nếu có $loginUsser nhưng pass sai
        }
        else if($loginUser && !password_verify($password,$loginUser['password'])){
            $errors = 'Mật khẩu sai!';
            header("location: login-form.php?errors=$errors");
            // 2.3 Đúng thông tin
        }else{
            // Lưu thông tin vào phiên làm việc để các chỗ khsc đều đọc được
            // Nếu kết thúc phiên làm việc hoặc xóa thì mất luôn
            // 2.3.1 khởi động session
            session_start();
            // 2.3.2 Lưu thông tin tài khoản 
            $_SESSION['user'] = $loginUser;
            // Quay về forrm login xem xem có chuea
            header('location: login-form.php');
        }
    }
    
?>  