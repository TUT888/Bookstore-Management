<?php
    function get_connection() {
        //$host = '127.0.0.1';
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'quanlynhasach';
        
        $conn = new mysqli ($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die('Cannot connect:' . $conn->connect_error);
        }

        return $conn;
    }
?>