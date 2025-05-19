<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grove Cite - Login</title>
    <style>
        body 
        {
            font-family: Arial, sans-serif;
            background: url('image/Background.png') no-repeat center center fixed;
            background-size: cover;
            color: #fa9f7a;
            display: flex;
            padding-top: 350px;
            padding-left: 200px;
            animation: fadeIn 2s ease-in-out;
        }

        .container 
        {
            background-color: #fa9f7a;
            padding-left: 10px;
            padding-right: 30px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
            opacity: 0;
            animation: fadeInUp 1.5s ease-out forwards;
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
            font-size: 20px;
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
            animation: fadeInDown 1.2s ease-out;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"]
        {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            opacity: 0;
            animation: fadeInUp 1.5s ease-out forwards;
        }

        input[type="submit"] {
            background-color: #f88966;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #eb8c63;
        }

        .error {
            color:  white   ;
            text-align: center;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
            color: white;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            0% { transform: translateY(-100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-right">
            <a href="about.php" class="about-link">ABOUT</a>
            <img src="image/Logo.png" width="214" height="105">
        </div>
    </header>
    <div class="container">
        <h2>Login for Grove Cite</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <label style="color:#B2DFDB;">
            <input type="submit" name="login" value="Login">
        </form>
        <p class="register-link">Dont have an account? <a href="register.php" style="color:#B2DFDB;">Register now!</a></p>

        <?php
            session_start();
            require 'includes/db.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                if (empty($email) || empty($password)) {
                    echo "<p class='error'>Please enter both email and password.</p>";
                } else {
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                    $stmt->execute([$email]);

                    if ($stmt->rowCount() === 1) {
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);

                        if (password_verify($password, $user['password_hash'])) {
                            $_SESSION['user_id'] = $user['user_id'];
                            $_SESSION['full_name'] = $user['full_name'];
                            $_SESSION['email'] = $user['email'];

                            header("Location: home.php");
                            exit;
                        } else {
                            echo "<p class='error'>Invalid password.</p>";
                        }
                    } else {
                        echo "<p class='error'>No account found with that email.</p>";
                    }
                }
            }
        ?>
    </div>
</body>
</html>
