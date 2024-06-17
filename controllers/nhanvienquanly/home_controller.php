<?php
    require_once('base_controller.php');
    
    $name = 'home';
    $action();

    function index() {
        render('index');
    }

    function logout() { 
        $_SESSION['chucvu'] = 'home';
        $_SESSION['hoten'] = '';
        $_SESSION['manv'] = '';
        renderLogin('index');
    }
?>