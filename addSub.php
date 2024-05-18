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
    <link rel="stylesheet" href="css/addSub.css">
    <script src="https://kit.fontawesome.com/70754e60d0.js" crossorigin="anonymous"></script>
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
            <i class="fa-solid fa-book"></i>
            <input type="text" name="Asubject_name" placeholder="Subject Name" class="id">  
            <hr>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-square-xmark"></i>
                <input type="number" inputmode="numeric" name="Aabsent" placeholder="Absent" min="0" step="1" class="absent id">  
                <hr>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-calendar-check"></i>
                <input type="number" inputmode="numeric" name="Atotal_class" placeholder= "Total class" min="0" step="1" class="total_class id">  
                <hr>
            </div>

            <div class="sub">
                <label for="submit" class="submit">Add</label>
                <input type="submit" name="submit"  id="submit" style="display: none;">
            </div>
            </form>

            EOM;
            echo $str;

            if (isset($_POST['submit']) ) { 

                if ($_POST['Asubject_name']!='') {
                $subject_name = $_POST['Asubject_name'];
                $absent = $_POST['Aabsent'];
                $total_class = $_POST['Atotal_class'];
                $sql = "INSERT INTO main (uid, subject_name, absent, total_class) VALUES (:uid, :subject_name, :absent, :total_class)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
                $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
                $stmt->bindParam(':absent', $absent, PDO::PARAM_INT);
                $stmt->bindParam(':total_class', $total_class, PDO::PARAM_INT);
                $stmt->execute();
                }

                echo '<script>window.location.href = "next.php";</script>';
                exit();
            }
        ?>
    </main>

</body>
</html>