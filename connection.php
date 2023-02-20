<?php
    $conn = new mysqli('localhost','root','','grip');
    if($conn->connect_error){
        die('Connection Failed : .$conn->connect_error');
    }
?>