<?php
    session_start();
    require_once("headind.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" id="theme" content="#a0a0a0">
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
        <h2>Hello, there</h2>
    </header>
    <main>
        <form method="post">

            <div class="input-container">
            <input type="color" class="pick" onchange="updateColor()" required>
            <input type="text" placeholder="color" class="id" id="color" name="color" readonly>
            <hr>
            </div>

            <div class="input-container">
            <i class="fa-regular fa-user"></i>
            <input type="text" placeholder="Name" class="id" name="name" id="userid" required>
            <hr>
            </div>

            <div class="input-container">
            <i class="fa-regular fa-id-card"></i>
            <input type="text" placeholder="User ID" name="user_name" class="id"  id="uid"  required>
            <hr>
            </div>

            <div class="input-container">
            <i class="fa-solid fa-lock"></i>
            <input type="password" placeholder="password" name="pass" class="id" id="password" minlength="8" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" required >
            <hr>
            </div>

            <div class="sub">
            <input type="submit" name="submit"  id="submit" style="display: none;">
            <label for="submit" class="submit">Sign up</label>
            <ul class="condition">
                <li class="eightW">８文字以上</li>
                <li class="upper">大文字</li>
                <li class="lower">小文字</li>
            </ul>
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {     
            $name = $_POST['name'];
            $user_name = filter_var($_POST['user_name']);
            $password = $_POST['pass'];
            $color=$_POST['color'];


            
            
            $sql2 = "SELECT user_name FROM login WHERE user_name = :username";
            $all = $pdo->prepare($sql2);
            $all->bindParam(':username', $user_name, PDO::PARAM_STR);
            $all->execute();
            $result = $all->fetch(PDO::FETCH_ASSOC);
            

            if (!$result) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO login (name,user_name, password)VALUES (:name,:username,:password)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':username', $user_name, PDO::PARAM_STR);
                $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
                $stmt->execute();

                $sql = "SELECT * FROM login WHERE user_name='{$user_name}' ";
                $stm = $pdo->prepare($sql);
                $stm->execute();
                $uid = '';
                while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $uid = $row['uid'];
                }

                $sql = "INSERT INTO color (uid, color)VALUES (:uid,:color)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
                $stmt->bindParam(':color', $color, PDO::PARAM_STR);
                $stmt->execute();

                $_SESSION['uid'] = $uid;


                echo '<script>window.location.href = "next.php";</script>';
                exit();

            } else {
                echo '<p class="invalid" >ID is already taken</p>';

            }
        }
    ?>
    <p class="new"><a href="index.php">login</a></p>
    
    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/create.js"></script>
</body>
</html>