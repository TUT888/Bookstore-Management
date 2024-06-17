<?php
    /// mấy hàm tương tác với db database
    require_once('config.php');

    function getAll_ddht_db() {
        $sql = 'select * from dodunghoctap';
        $conn = get_connection();
        $result = $conn->query($sql);

        $products = array();
        while ($row = $result->fetch_assoc()){
            $products[] = $row;
        }
        return success_response($products,"Lấy đồ dùng học tập thành công.");
    }

    function get_ddht_db($id) {
        $sql = 'select * from dodunghoctap where MaSP =?';
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        
        $product = $stm->get_result();
        $row = $product->fetch_assoc();
        if (empty($row)){
            return error_response(31,"Không tìm thấy đồ dùng học tập có id=".$id);
        }

        return success_response($row,"Lấy đồ dùng học tập id=".$id." thành công");
    }

    function update_ddht($id,$loaisp,$nsx) {
        $sql = "UPDATE dodunghoctap SET LoaiSP= ?, NhaSanXuat=? WHERE MaSP =?";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('sss',$loaisp,$nsx,$id);
        $stm->execute();
        if($stm->affected_rows === 1) {
            return success_response($id,"Update thành công");
        }else{
            return error_response(32,"Update không thành công");
        }
    }
    function delete_ddht($id){
        $sql = 'delete from dodunghoctap where MaSP = ?';
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        if($stm->affected_rows === 1) {
            return success_response($id,"Xóa thành công");
        }else{
            return error_response(32,"Xóa không thành công");
        }
    }

    function create_ddht($masp,$loaisp,$nsx){
        $sql = "INSERT INTO dodunghoctap (MaSP,LoaiSP, NhaSanXUat) values (?, ?, ?)";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('sss',$masp, $loaisp, $nsx);
        $stm->execute();
        if($stm->affected_rows === 1) {
            return success_response($masp,"Thêm sản phẩm thành công");
        }else{
            return error_response(32,"Thêm sản phẩm không thành công");
        }
    }
?>