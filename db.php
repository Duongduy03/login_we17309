<?php
    $connect = new PDO(
        'mysql:host=127.0.0.1;dbname=php1_we17309',
        'root',
        ''
    );
    $mat_khau_nguoi_dung_nhap = '123456';
    // mã hóa thành một chuỗi duy nhất không dịch lại được
    // chỉ có thể sử dụng password_verify để đối chiếu
    $mk_da_ma_hoa = password_hash($mat_khau_nguoi_dung_nhap, PASSWORD_BCRYPT);
    echo '<pre>';
    var_dump($mat_khau_nguoi_dung_nhap,$mk_da_ma_hoa);
    var_dump(password_verify('123456',$mk_da_ma_hoa));
    var_dump(password_verify('1234567',$mk_da_ma_hoa));



?>