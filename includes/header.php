<?php

    session_start();

    if(!empty(@$_SESSION['name'] && @$_SESSION['managerId'])){
        header("Location: dashboard");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>HOME | PAGE</title>
</head>
<body>
    <header>
        <div class="container container-nav">
            <div class="header">
                <a href="./index.php">
                    <h1>Product management</h1>
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="./">Home</a></li>
                    <li><a href="register">Register</a></li>
                    <li><a href="login">Login</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>