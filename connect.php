<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "filmy";

        $conn = mysqli_connect($servername, $username, $password, $db);
        mysqli_query($conn, 'SET NAMES utf8');
?>