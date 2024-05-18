<?php
    require_once('headder.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <script src="https://kit.fontawesome.com/70754e60d0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/addColor.css">
    <title>ABSENT</title>
</head>
<body>
<?php    
        $str=<<<EOM
        <header>
        <h2>{$user_name}</h2>
        <div class="icons">
        <a href="next.php"><i class="fa-solid fa-backward"></i></a>
        <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
        </header>
    
        EOM;
        echo $str;    
    
    ?>
    <main>
    <?php

    $str=<<<EOM
    <form method="post">

    <div class="input-container">
    <input type="color" class="pick" onchange="updateColor()" required value=$color >
    <input type="text" placeholder="color" class="id" id="color" name="color" readonly value=$color >
    <hr>
    </div>

    <div class="sub">
        <label for="submit" class="submit">Change</label>
        <input type="submit" name="submit"  id="submit" style="display: none;">
    </div>
    </form>

    EOM;
    echo $str;

    if (isset($_POST['submit']) ) { 

        if ($_POST['color']!='') {
        $color = $_POST['color'];
        $sql = "UPDATE color SET color='$color' WHERE uid=$uid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        }

        echo '<script>window.location.href = "next.php";</script>';
        exit();
    }
    ?>
    <script src="js/color.js"></script>
    </main>
</body>
</html>