<?php
    session_start();
    require_once("headind.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#a0a0a0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/70754e60d0.js" crossorigin="anonymous"></script>
    <title>ABSENT</title>
</head>
<body>
    <header>
        <h2>Welcome back</h2>
    </header>
    <main>
        <form  method="post">
            <div class="input-container">
                <i class="fa-regular fa-id-card"></i>
                <input type="text" placeholder="User ID" name="username" class="id"  id="uid" required>
                <hr>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="password" name="pass" class="id" id="password" required>
                <hr>
            </div>

            <div class="sub">
                <label for="submit" class="submit">login</label>
                <input type="submit" name="submit"  id="submit" style="display: none;">
            </div>
        </form>
        <?php

        if (isset($_POST['submit'])) { 
            $user_name = $_POST['username'];
            $passwd = $_POST['pass'];


            $sql = "SELECT * FROM login WHERE user_name=:user_name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {

                if (password_verify($passwd, $result['password'])) {

                    $_SESSION['uid'] = $result['uid'];
                    echo '<script>window.location.href = "next.php";</script>';
                    exit();
                } else {

                    echo '<p class="invalid" >Invalid password</p>';
                }
            } else {

                echo '<p class="invalid" >Invalid ID or password</p>';
            }
        }        
        ?>
        <p class="new" ><a href="create.php">Create account</a></p>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>