<?php
    /// mấy hàm tương tác với db database
    require_once('config.php');
    function getAll_sach_db() {
        $sql = 'select * from sach';
        $conn = get_connection();
        $result = $conn->query($sql);

        $products = array();
        while ($row = $result->fetch_assoc()){
            $products[] = $row;
        }
        return success_response($products,"Lấy sách thành công.");
    }

    function get_sach_db($id) {
        $sql = 'select * from sach where MaSP =?';
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        
        $product = $stm->get_result();
        $row = $product->fetch_assoc();
        if (empty($row)){
            return error_response(31,"Không tìm thấy sách có id=".$id);
        }

        return success_response($row,"Lấy sách id=".$id." thành công");
    }

    function update_sach($id,$tacgia,$nxb,$theloai) {
        $sql = "UPDATE sach SET TacGia= ?, NhaXuatBan=?, TheLoai=? WHERE MaSP =?";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$tacgia,$nxb,$theloai,$id);
        $stm->execute();
        if($stm->affected_rows === 1) {
            return success_response($id,"Update sách thành công");
        }else{
            return error_response(32,"Update sách không thành công");
        }
    }

    function delete_sach($id){
        $sql = 'delete from sach where MaSP = ?';
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

    function create_sach($masp,$tacgia,$nxb,$theloai){
        $sql = "INSERT INTO sach (MaSP,TacGia, NhaXuatBan, TheLoai) values (?, ?, ? ,?)";
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$masp, $tacgia, $nxb, $theloai);
        $stm->execute();
        if($stm->affected_rows === 1) {
            return success_response($masp,"Thêm sản phẩm thành công");
        }else{
            return error_response(32,"Thêm sản phẩm không thành công");
        }
    }

?>