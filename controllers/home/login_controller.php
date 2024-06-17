<?php
    require_once('base_controller.php');
    require_once('models/Home.php');
    
    //$name = 'login';
    $action();

    function index() {
        if ( isset($_POST['email']) && isset($_POST['pass']) ) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $result = login($email, $pass);
            if ( $result['code']!=0 ) {
                $data = array('result'=>$result);
                render('index', $data);
            } else {
                $data = array('chucvu'=> $result['chucvu']);
                $chucvu = $data['chucvu'];
                if ( $chucvu=='NVQL' ) {
                    $_SESSION['chucvu'] = 'nhanvienquanly';
                    if (isset($result['hoten'])) {
                        $_SESSION['hoten'] = $result['hoten'];
                    } else {
                        $_SESSION['hoten'] = '';
                    }
                    if (isset($result['manv'])) {
                        $_SESSION['manv'] = $result['manv'];
                    } else {
                        $_SESSION['manv'] = '';
                    }
                    $data = array('chucvu'=>$chucvu);
                    renderNVQL('index', $data);
                } else {
                    $data = array('response'=>'Hệ thống hiện chỉ hỗ trợ chức năng của nhân viên quản lý');
                    render('index', $data);
                }
            }
        }
        render('index');
    }
?>