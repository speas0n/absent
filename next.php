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
    <link rel="stylesheet" href="css/next.css">
    <title>ABSENT</title>
</head>
<body>
    <?php
        $str=<<<EOM
        <header>
        <h2>{$user_name}</h2>
        <div class="icons">
        <a href="addSub.php"><i class="fa-solid fa-plus"></i></a>
        <a href="color.php"><i class="fa-solid fa-palette"></i></a>
        <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
        </header>
    
        EOM;
        echo $str;    
    ?>

    <main>
    <?php
        $sql = "SELECT * FROM main WHERE uid='{$uid}' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo '<div id="container">';
        echo '<div class="t_head">';
        echo '<div class="hs_data">', "Subject", '</div>';
        echo '<div class="h_data">', "Absent", '</div>';
        echo '<div class="h_data">', "Total", '</div>';
        echo '</div>';


        foreach ($result as $row){
        echo '<div class="t_row">';
        echo '<div class="row_data"><a href="detail.php?subject_name=' . urlencode($row['subject_name']) . '">', $row['subject_name'], '</a></div>';
        echo '<div class="Nrow_data">', $row['absent'], '</div>';
        echo '<div class="Nrow_data">', $row['total_class'], '</div>';
        echo '</div>';
        }
        echo '</div>';
    ?>
    
    <?php
        $sql = "SELECT hitokoto FROM hitokoto";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            die("Error in preparing the SQL query: " . $pdo->errorInfo()[2]);
        }

        $stmt->execute();
        $hitokotos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $i=0;
        $quote = array(); 
        foreach ($hitokotos as $row) {
            $quote[]=$row['hitokoto'];
            $i++;
        }
        $random_num=rand(0,$i-1);
        $random_quote= $quote[$random_num];

    ?>
    </main>
    <footer class="quote">
        <img src="img/cat2sleep.png" alt="猫" onclick="fade()" class="cat_png" >
        <p class="cat_moti"><?= $user_name; ?>さん、<?= $random_quote; ?></p>
    </footer>
    <script src="js/next.js"></script>
</body>
</html>