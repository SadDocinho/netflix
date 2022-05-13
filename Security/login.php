<?php
include('connetion.php');

if(empty($_POST['user']) || empty($_POST['password'])) {
    header('Location: Login.html');
    exit();
}