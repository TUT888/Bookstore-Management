<?php
    $supported_controllers = array(
        'home/login' => array('index'),
        'nhanvienquanly/home' => array('index', 'logout'),
        'nhanvienquanly/sanpham' => array('index', 'create', 'view', 'update', 'delete', 'search'),
        'nhanvienquanly/nhanvien' => array('index', 'create', 'view', 'update', 'delete', 'search'),
        'nhanvienquanly/magiamgia' => array('index', 'create', 'view', 'update', 'delete', 'search')
    );
    if (!array_key_exists($controller, $supported_controllers) ||
        !in_array($action, $supported_controllers[$controller])) {
        $controller = 'nhanvienquanly/pages';
        $action = 'error';
    }
    
    include_once("controllers/" . $controller. "_controller.php"); // PagesController
    $className = $controller . '_controller.php'; 
    require_once('controllers/'.$className);

?>