<?php
include('database.php');
$db = new Database();
session_start();


$email = mysqli_real_escape_string($db->mysqli, $_POST['email']);
$pass = mysqli_real_escape_string($db->mysqli, $_POST['pass']);
