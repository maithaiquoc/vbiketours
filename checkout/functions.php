<?php
    session_start();
    $functionName = filter_input(INPUT_POST, 'functionName');
    if($functionName == "getStatus"){
        getStatus();
    }

    if($functionName == "insertBooking"){
        insertBooking();
    }

    function getStatus(){
        echo $_SESSION['status'];
    }

    function insertBooking(){
        $title = filter_input(INPUT_POST, 'title');
        echo get_ip_address();
    }

    function get_ip_address() {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        return $ip;
    }
?>