<?php
    /// mấy hàm tương tác với db database
    require_once('config.php');
    require_once('Sach.php');
    require_once('DoDungHocTap.php');
    function error_response($code,$message){
        $res = array();
        $res['code']=$code;
        $res['message'] = $message;
        return $res;
    }

    function success_response($data,$message){
        $res = array();
        $res['code']= 30;
        $res['message'] = $message;
        $res['data'] = $data;
        return $res;
    }
    function getAll_db() {
        $sql = 'select * from sanpham';
        $conn = get_connection();
        $result = $conn->query($sql);

        $products = array();
        while ($row = $result->fetch_assoc()){
            $products[] = $row;
        }
        return success_response($products,"Lấy sản phẩm thành công.");
    }

    function get_db($id) {
        $sql = 'select * from sanpham where MaSP =?';
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        $product = $stm->get_result();
        $row = $product->fetch_assoc();
        if (empty($row)){
            return error_response(31,"Không tìm thấy sản phẩm có id=".$id);
        }
        $sp = array();
        if($row['Loai'] == 'sach'){
            $sp = get_sach_db($id);
            if ($sp['code'] != 30){
                return error_response(31,$sp['message']);
            }
        }elseif($row['Loai'] == 'dodunghoctap'){
            $sp = get_ddht_db($id);
            if ($sp['code'] != 30){
                return error_response(31,$sp['message']);
            }
        }
        $sanpham = array($row, $row['Loai'] => $sp['data']);
        return success_response($sanpham,"Lấy sản phẩm thành công.");       
    }

    function update_sach_db($id,$tensp,$gianhap,$giaban,$soluong,$tacgia,$nxb,$theloai,$mota,$img) {
        $sql = "UPDATE sanpham SET TenSP= ?, MoTa=?, GiaBan=?, GiaNhap=?, SoLuongCon=?, HinhMinhHoa=? WHERE MaSP =?";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssiiiss',$tensp,$mota,$giaban,$gianhap,$soluong,$img,$id);
        $stm->execute();
        if($stm->affected_rows === 1) {
            $res = update_sach($id,$tacgia,$nxb,$theloai);
            if($res['code'] == 30){
                return success_response($id,"Update thành công");
            }
            return success_response($id,"Update thành công");
        }else{
            $res = update_sach($id,$tacgia,$nxb,$theloai);
            if($res['code'] == 30){
                return success_response($id,"Update thành công");
            }
            return error_response(32,"Update không thành công");
        }

    }

    function update_ddht_db($id,$tensp,$gianhap,$giaban,$soluong,$loaiSP,$NhaSanXuat,$mota,$img) {
        $sql = "UPDATE sanpham SET TenSP= ?, MoTa=?, GiaBan=?, GiaNhap=?, SoLuongCon=?, HinhMinhHoa=? WHERE MaSP =?";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssiiiss',$tensp,$mota,$giaban,$gianhap,$soluong,$img,$id);
        $stm->execute();
        if($stm->affected_rows === 1) {
            $res = update_ddht($id,$loaiSP,$NhaSanXuat);
            if($res['code'] == 30){
                return success_response($id,"Update thành công");
            }
            return success_response($id,"Update thành công");
        }else{
            $res = update_ddht($id,$loaiSP,$NhaSanXuat);
            if($res['code'] == 30){
                return success_response($id,"Update thành công");
            }
            return error_response(32,"Update không thành công");
        }
    }
    function delete_sach_db($id){
        $res = delete_sach($id);
        if($res['code'] == 30){
            $sql = 'delete from sanpham where MaSP = ?';
            $conn = get_connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('s',$id);
            $stm->execute();
            if($stm->affected_rows === 1) {
                return success_response($id,"Xóa thành công");
            }else{
                return error_response(32,"Xoá không thành công");
            }
        }
        return error_response(32,"Xoá không thành công");
    }

    function delete_ddht_db($id){
        $res = delete_ddht($id);
        if($res['code'] == 30){
            $sql = 'delete from sanpham where MaSP = ?';
            $conn = get_connection();
            $stm = $conn->prepare($sql);
            $stm->bind_param('s',$id);
            $stm->execute();
            if($stm->affected_rows === 1) {
                return success_response($id,"Xóa thành công");
            }else{
                return error_response(32,"Xoá không thành công");
            }
        }
        return error_response(32,"Xoá không thành công");
    }

    function get_id_sp() {
        $conn = get_connection();
        //Lấy id mới nhất
        $sql = 'select MaSP from sanpham order by MaSP desc';
        $conn = get_connection();
        $result = $conn->query($sql);
        $last_id = $result->fetch_assoc();

        $num = intval(substr($last_id['MaSP'], 2, 3));
        $num ++;
        if ($num<10) {
            $new_id = "00" . strval($num); 
        } else if ($num<100) {
            $new_id = "0" . strval($num); 
        } else {
            $new_id = strval($num); 
        }
        return "SP" . $new_id;
    }

    function create_sach_db($tensp, $mota, $giaban, $gianhap, $soluong, $img, $loai, $tacgia,$nxb,$theloai){
        $id = get_id_sp();
        $sql = "INSERT INTO sanpham (MaSP,TenSP, MoTa, GiaNhap,GiaBan,SoLuongCon, HinhMinhHoa, Loai) values (?, ?, ? ,?, ?, ?, ?, ?)";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssssss', $id, $tensp, $mota, $gianhap, $giaban, $soluong, $img, $loai);
        $stm->execute();
        if($stm->affected_rows === 1) {
            $res = create_sach($id,$tacgia,$nxb,$theloai);
            if($res['code'] == 30){
                return success_response($id,"Thêm sản phẩm thành công");
            }
            return error_response(32,"Thêm sản phẩm không thành công");
        }else{
            return error_response(32,"Thêm sản phẩm không thành công");
        }
    }

    function create_ddht_db($tensp, $mota, $giaban, $gianhap, $soluong, $img, $loai, $loaisp ,$nsx){
        $id = get_id_sp();
        $sql = "INSERT INTO sanpham (MaSP,TenSP, MoTa, GiaNhap,GiaBan,SoLuongCon, HinhMinhHoa, Loai) values (?, ?, ? ,?, ?, ?, ?, ?)";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssssss', $id, $tensp, $mota, $gianhap, $giaban, $soluong, $img, $loai);
        $stm->execute();
        if($stm->affected_rows === 1) {
            $res = create_ddht($id,$loaisp,$nsx);
            if($res['code'] == 30){
                return success_response($id,"Thêm sản phẩm thành công");
            }
            return error_response(32,"Thêm sản phẩm không thành công");
        }else{
            return error_response(32,"Thêm sản phẩm không thành công");
        }
    }
    function search_db($pattern) {
        $conn = get_connection();
        $sql = "select * from sanpham where TenSP like CONCAT('%',?,'%')";
        
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