<?php
    require_once('base_controller.php');
    require_once('models/NhanVien.php');

    $name = 'nhanvien';
    $action();

    function index() {
        $nhanvien = getAll_db();
        $data = array('nhanvien' => $nhanvien);
        render('index', $data);
    }

    function view() {
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);
        $nhanvien = get_db($id);
        $data = array('chitietnv' => $nhanvien);
        render('view', $data);
    }

    //Thêm nhân viên
    function create() {
        //$email, $pass, $manv, $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh
        if ( isset($_POST['email']) && isset($_POST['pass']) 
        && isset($_POST['hoten']) && isset($_POST['sdt']) 
        && isset($_POST['gioitinh']) && isset($_POST['ngaysinh'])
        && isset($_POST['cmnd']) && isset($_POST['chucvu'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $gioitinh = $_POST['gioitinh'];
            $cmnd = $_POST['cmnd'];
            $ngaysinh = $_POST['ngaysinh'];
            $chucvu = $_POST['chucvu'];
            $result = add_db($email, $pass, $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh, $chucvu);
            $data = array('result' => $result);
            render('create', $data);
        } else {
            render('create');
        }
    }

    function update() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        if ( isset($_POST['hoten']) && isset($_POST['sdt']) 
        && isset($_POST['gioitinh']) && isset($_POST['cmnd']) 
        && isset($_POST['ngaysinh']) && isset($_POST['email']) && isset($_POST['chucvu'])) {
            $manv = $id;
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $gioitinh = $_POST['gioitinh'];
            $cmnd = $_POST['cmnd'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $chucvu = $_POST['chucvu'];
            $result = update_db($manv, $hoten, $sdt, $gioitinh, $cmnd, $ngaysinh, $email, $chucvu);
            
            $nhanvien = get_db($id);
            $data = array('chitietnv' => $nhanvien, 'result' => $result);
            render('update', $data);
        } else {
            $nhanvien = get_db($id);
            $data = array('chitietnv' => $nhanvien);
            render('update', $data);
        }
    }

    function delete() {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        if ( $id!='' ) {
            $result = delete_db($id);
            $nhanvien = getAll_db();
            $data = array('nhanvien' => $nhanvien, 'result'=>$result);
        } else {
            $nhanvien = getAll_db();
            $data = array('nhanvien' => $nhanvien);
            render('index', $data);
        }
        render('index', $data);
    }

    function search() {
        $pattern = filter_input(INPUT_POST,'search', FILTER_SANITIZE_STRING);
        $nhanvien = search_db($pattern);
        if (empty($nhanvien["data"]))
        {
            $data = array("code" => 0, 'nhanvien' => $nhanvien);
            render('index', $data);
        }
        else {
            $data = array('nhanvien' => $nhanvien);
            render('index', $data);
        }
    }
?>