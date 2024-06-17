<?php
    require_once('config.php');
      
    function getAll_db() {
        $sql = "select * from nhanvien";
        $conn = get_connection();
        
        $result = $conn->query($sql);

        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }
        return array('code'=>0, 'message'=>'', 'data'=>$data);
    }

    function get_db($manv) {
        $sql = "select * from nhanvien where MaNV = ?";
        $conn = get_connection();
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $manv);
        
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Execute command failed');
        }
        $result = $stmt->get_result();
        if ( $result->num_rows==0 ) {
            return array('code'=>2, 'message'=>'MaNV does not exists');
        }
        $data = $result->fetch_assoc();
        return array('code'=>0, 'message'=>'Get data successful', 'data'=>$data);
    }

    function add_db($email, $pass, $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh, $chucvu) {
        $conn = get_connection();
        $sql = "insert into taikhoan value(?, ?)";
        $hashed_pw = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',  $email, $hashed_pw);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failed');
        }

        $conn = get_connection();
        $sql = "select MaNV from nhanvien";
        
        $stmt = $conn->prepare($sql);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Execute command failed');
        }
        $result = $stmt->get_result();
        if ( $result->num_rows==0 ) {
            $manv = 'NV001';
        } else {
            $data = array();
            while ($row = $result->fetch_assoc())
            {
                $data[] = $row['MaNV'];
            }
            $t = intval(substr(max($data), 2, 3)) + 1;
            if ($t<10) {
                $manv = 'NV00' . strval($t);
            } else if ($t<100) {
                $manv = 'NV0' . strval($t);
            } else {
                $manv = 'NV' . strval($t);
            }
        }

        $conn = get_connection();
        $sql = "insert into nhanvien value(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssss', $manv, $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh, $email, $chucvu);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failed');
        }
        return array('code'=>0, 'message'=>'Add successful');
    }

    function delete_db($manv) {
        $conn = get_connection();
        $sql = "select Email from nhanvien where MaNV = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $manv);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Execute command failed');
        }
        $result = $stmt->get_result();
        if ( $result->num_rows==0 ) {
            return array('code'=>2, 'message'=>'MaNV does not exists');
        }
        $t = $result->fetch_assoc();
        $email = $t['Email'];

        $conn = get_connection();
        $sql = "delete from nhanvien where MaNV = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $manv);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failed');
        }
        if ( $stmt->affected_rows==0 ) {
            return array('code'=>3, 'message'=>'Delete failed');
        }
        $conn = get_connection();
        $sql = "delete from taikhoan where EmailDangNhap = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failed');
        }
        if ( $stmt->affected_rows==0 ) {
            return array('code'=>4, 'message'=>'Delete failed');
        }
        return array('code'=>0, 'message'=>'Delete successful');
    }

    function update_db($manv, $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh, $email, $chucvu) {
        $sql = 'update nhanvien set HoTen = ?, SDT = ?, GioiTinh = ?, CMND = ?, NgaySinh = ?, Email = ?, ChucVu = ? where MaNV = ?';
        $conn = get_connection();
         
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssss', $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh, $email, $chucvu, $manv);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'message'=>'Excute command failled');
        }
        return array('code'=>0, 'message'=>'Update successful');
    }

    function search_db($pattern) {
        $conn = get_connection();
        $sql = "select * from nhanvien where HoTen like CONCAT('%',?,'%')";
        
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $pattern);

        if (!($stm->execute())) {
            return array('code' => 1, "data" => "");
        }

        $result = $stm->get_result();
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return array('code' => 0, "data" => $data);
    }
?>