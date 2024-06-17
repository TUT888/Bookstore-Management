<?php
/*
    $role = "nhanvienquanly";
    require_once('config.php');
    if($role === 'nhanvienquanly'){
        if (isset($_GET['controller'])) {
            $controller = 'nhanvienquanly/'.$_GET['controller'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }else {
                $action = 'index';
            }
        }else {
            $controller = $role.'/home';
            $action = 'index';
        }
    }else{
        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }else {
                $action = 'index';
            }
        }else {
            $controller ='home';
            $action = 'index';
        }    
    }
    
    // định tuyến
    require_once('route.php');
*/
    session_start();
    if (isset($_SESSION['chucvu'])) {
        $role = $_SESSION['chucvu'];
    } else {
        $role = 'home';
    }
    //$role = "nhanvienquanly";
    //$role = "home";

    require_once('config.php');
    if ($role === 'nhanvienquanly'){
        if (isset($_GET['controller'])) {
            $controller = 'nhanvienquanly/'.$_GET['controller'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }else {
                $action = 'index';
            }
        }else {
            $controller = $role.'/home';
            $action = 'index';
        }
    } else if ($role === 'home'){
        //$controller = $role.'/home';
        $controller = 'home/login';
        $action = 'index';
    } else {
        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }else {
                $action = 'index';
            }
        } else {
            $controller ='home';
            $action = 'login';
        }
    }
    
    // định tuyến
    require_once('route.php');
?>