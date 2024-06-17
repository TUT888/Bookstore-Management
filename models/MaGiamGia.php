<?php
    /// mấy hàm tương tác với db database
    require_once('config.php');
      
    function getAll_db() {
        $sql = 'select * from magiamgia';
        
        $conn = get_connection();
        $result = $conn->query($sql);

        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return array('code' => 1, "data" => $data);
    }

    function get_db($id) {
        $sql = 'select * from magiamgia where MaSoMa = ?';
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $id);

        $stm->execute();

        if ($stm->execute() == 1) {
            $result = $stm->get_result();
            $data = $result->fetch_assoc();
            return array('code' => 1, "data" => $data);
        }
        return array('code' => 0, "data" => "");
    }

    function get_max_id_db () {
        $sql = 'select max(MaSoMa) from magiamgia';
        
        $conn = get_connection();
        $result = $conn->query($sql);

        $data = $result->fetch_assoc();
        return array('code' => 1, "id" => $data);
    }

    function add_db ($id, $tenma, $giatri, $ngaylap, $ngayhethan, $mota) {
        $sql = 'insert into magiamgia (MaSoMa, TenMa, GiaTriMa, NgayTaoMa, NgayHetHan, MoTa) values (?, ?, ?, ?, ?, ?)';
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssss', $id, $tenma, $giatri, $ngaylap, $ngayhethan, $mota);

        $stm->execute();
        if ($stm->affected_rows == 1) {
            return array('code' => 1, "data" => "");
        }
        return array('code' => 0, "data" => "");
    }

    function delete_db($id) {
        $sql = 'delete from magiamgia where MaSoMa = ?';
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $id);

        $stm->execute();
        if ($stm->affected_rows == 1) {
            return array('code' => 1, "data" => "");
        }
        return array('code' => 0, "data" => "");
    }

    function update_db($id, $tenma, $giatri, $ngaylap, $ngayhethan, $mota, $check) {
        $sql = 'update magiamgia set TenMa = ?, GiaTriMa = ?, NgayTaoMa = ?, NgayHetHan = ?, MoTa = ? where MaSoMa = ?';
        
        $conn = get_connection();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssss', $tenma, $giatri, $ngaylap, $ngayhethan, $mota, $id);

        $stm->execute();
        if ($stm->affected_rows == 1) {
            $data = array('code' => 2, "data" => get_db($id)["data"]);
            return $data;
        }
        if ($check == "True") {
            $data = array('code' => 1, "data" => get_db($id)["data"]);
            return $data;
        }
        return array('code' => 0, "data" => $id);
    }

    function search_db($pattern) {
        $sql = "select * from magiamgia where TenMa like CONCAT('%',?,'%')";
        
        $conn = get_connection();
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