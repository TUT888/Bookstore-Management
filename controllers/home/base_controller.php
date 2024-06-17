<?php
    function render($view, $data = array()) {
        ob_start();
        extract($data);
        //require_once('views/' .$GLOBALS['name'] . '/' . $view . '.php');
        require_once('views/home/' . $view . '.php');
        $content = ob_get_clean();
        require_once('views/layout/template.php');
    }

    function renderNVQL($view, $data = array()) {
        ob_start();
        extract($data);
        require_once('views/nhanvienquanly/home/' . $view . '.php');
        $content = ob_get_clean();
        require_once('views/layout/template.php');
    }
?>