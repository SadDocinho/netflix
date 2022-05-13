<?php
session_start();
include('connection.php');

if(empty($_POST['user']) || empty($_POST['password'])) {
    header('Location: index.php');
    exit();
}

$user = mysqli_real_escape_string($connection, $_POST['user']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$query = "select User_ID, user from user where user = '{$user}' and password = md5('{$password}')";

$result = mysqli_query($connection, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['user'] = $user;
    header('Location: panel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}