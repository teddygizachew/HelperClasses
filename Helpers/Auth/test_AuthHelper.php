<?php

require_once('AuthHelper.php');

session_start();

$email = "test@nku.edu";
$password = "123";
$filename = "users.csv";

AuthHelper::signup($filename, $email, $password);

// AuthHelper::signin($filename, $email, $password);

// AuthHelper::signout();
