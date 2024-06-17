<?php
    /// mấy hàm tương tác với db database
    require_once('config.php');
      
    function login($email, $pass) {
        $conn = get_connection();
        $sql = "select * from taikhoan where EmailDangNhap = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failed');
        }
        $result = $stmt->get_result();
        if ( $result->num_rows==0 ) {
            return array('code'=>2, 'message'=>'Email does not exists');
        }
        $data = $result->fetch_assoc();
        $hashed_pw = $data['MatKhau'];
        if (!password_verify($pass, $hashed_pw)) {
            return array('code'=>3, 'message'=>'Password is invalid');
        }
        
        $conn = get_connection();
        $sql = "select MaNV, HoTen, ChucVu from nhanvien where email = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failed');
        }
        $result = $stmt->get_result();
        if ( $result->num_rows==0 ) {
            return array('code'=>2, 'message'=>'Không nhận diện được chức vụ nhân viên');
        }
        $dt = $result->fetch_assoc();
        $chucvu = $dt['ChucVu'];
        $hoten = $dt['HoTen'];
        $manv = $dt['MaNV'];
        return array('code'=>0, 'message'=>'Login success', 'chucvu'=>$chucvu, 'hoten'=>$hoten, 'manv'=>$manv);
    }

?>