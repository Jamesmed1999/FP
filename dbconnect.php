<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $connect = new mysqli ("localhost", "root", "", "FINAL2");

    $connect->set_charset("utf8mb4");
}catch(Exception $e){

    error_log($e->getMessage());
    exit('Error connecting to database');
}
?>