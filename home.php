<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<style>
    body 
    {
        background: url("image/Background.png") no-repeat center center fixed;
        background-size: cover;
        color: #fa9f7a;
        display: flex;
    }
    
    header 
    {
        width: 100%;
        padding: 20px;
        position: absolute;
        top: 0;
        right: 0;
    }

    .header-right 
    {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 20px;
        font-family: "Quicksand", sans-serif;
        font-size: 20px;
        font-weight: bold;  
    }
    
    .header-center
    {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Quicksand", sans-serif;
        gap: 50px;
        font-size: 23px;
        font-weight: bold;  
    }

    .logo 
    {
        color: white;
    }

    .about-link 
    {
        color: white;
        text-decoration: none;
        font-weight: normal;
    }

    .content 
    {
        height: 100%;
        display: flex;
        align-items: center;
        padding-left: 200px;
    }

    .text-block 
    {
        max-width: 600px;
        text-align: left;
    }

    h1 
    {
        font-family: "Quicksand", sans-serif;
        font-weight: 100;
        font-size: 70px;
        line-height: 1.4;
        color: white;
        text-align: center;
    }

    .highlight 
    {
        background-color: #fa9f7a;
        padding: 0 10px;
        border-radius: 3px;
        display: inline-block;
    }

    .underline 
    {
        text-decoration: underline;
        text-decoration-color: white;
        text-decoration-thickness: 7px;
        text-underline-offset: 3px;
    }
    .description
    {
        font-size: 23px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mangrove Conservation</title>
</head>
<body>
    <header>
        <div class="header-center">
            <img src="image/user.png" width="254" height="74">
            <a href="home.php" class="about-link">HOME</a>
            <a href="dashboard.php" class="about-link">DASHBOARD</a>
            <a href="reportBrowser.php" class="about-link">REPORT BROWSER</a>
            <a href=".php" class="about-link">MANGROVE LOCATIONS</a>
            <a href="chat.php" class="about-link">AI CHAT</a>
            <a href="about.php" class="about-link">ABOUT</a>
            <a href="logout.php" class="about-link">LOGOUT</a>
            <img src="image/Logo.png" width="214" height="105">
        </div>
    </header>
    <main class="content">
        <div class="text-block">
            <h1>
                A <span class="highlight">SIMPLE</span><br>
                <span class="highlight">SITE</span> FOR<br>
                MANGROVE<br>
                <span class="highlight underline">PRESERVATION</span>
                <span class="description">Report your findings of mangrove forests, interesting facts, mangrove abuse and others. We are here to support mangrove forests and preserve them together.</span>
            </h1>
        </div>
    </main>
</body>
</html>