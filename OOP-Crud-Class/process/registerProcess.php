<?php
include('database.php');
$db = new Database();
session_start();

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($db->mysqli, $_POST['fname']);
    $num = mysqli_real_escape_string($db->mysqli, $_POST['num']);
    $email = mysqli_real_escape_string($db->mysqli, $_POST['email']);
    $pass = mysqli_real_escape_string($db->mysqli, $_POST['pass']);
    $cpass = mysqli_real_escape_string($db->mysqli, $_POST['cpass']);
    $hpass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $role = "user";
    $timestamp = date("Y-m-d H:i:s");

    $insertValues = ['name' => $fname, 'mobile' => $num, 'email' => $email, 'password' => $hpass, 'role' => $role, 'created_at' => $timestamp, 'updated_at' => $timestamp];
    if ($db->insert('register', $insertValues)) {
        $_SESSION['success'] = "Successfully Register !";
        header("location: http://localhost/PHP_OOP/");
    } else {
        $_SESSION['error'] = "Not Successfully Register !";
        header("location: http://localhost/PHP_OOP/");
    }
} else {
    header("location: http://localhost/PHP_OOP/register.php");
}
