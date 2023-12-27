<?php
require './scripts/login.php'
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iuran Kas RT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <img src="media/logo.png" width="360" class="logo">
        <div class="login-content">
            <header>
                <h1>Login</h1>
                <p>Masukkan username dan password</p>
            </header>
            <form action="login.php" method="post">
                <p>
                    <input type="text" name="username" id="username" placeholder="Username" require>
                </p>
                <p>
                    <input type="password" name="password" id="password" required placeholder="Password">
                </p>
                <p>
                    <input type="button" value="Login" class="btn">
                </p>
            </form>
        </div>
    </div>
</body>

</html>