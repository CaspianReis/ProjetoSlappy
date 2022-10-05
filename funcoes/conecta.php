<?php


    // Inicio conexão...

    $mysqli = new mysqli('localhost', 'root', 'usbw', 'bd_slappy');
    if($mysqli -> connect_errno){
        echo $mysqli -> connect->error;
    }

    session_start();

        

?>