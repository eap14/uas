<?php
session_start();
error_reporting(0);
$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = '';
$db = 'berita';
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());