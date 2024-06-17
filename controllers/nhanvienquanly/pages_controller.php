<?php
    $action();
    
    function error() {
        ob_start();
        $message = "URL Not Found";
        require_once('views/nhanvienquanly/pages/error.php');
        $content = ob_get_clean();

        require_once('views/layout/template.php');
    }
?>