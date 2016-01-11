<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if(isset($_POST['head'])) include 'process_head.php';
else if(isset($_POST['get'])) include 'process_get.php';
else include 'head_form.php';

?>
