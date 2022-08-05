<?php
    session_start();
    // Hủy thông tin trong session
    unset($_SESSION['user']);
    // điều hương quay trở lại form login
    header('location:login-form.php');
?>