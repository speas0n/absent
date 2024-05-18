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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/all.css">
    <title>ABSENT</title>
</head>

<body>
    <?php
    $str = <<<EOM
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
        $sql = "SELECT * FROM main WHERE uid='{$uid}' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $subject_name = $row['subject_name'];
            $absent = $row['absent'];
            echo '<input type="hidden" class="subjectname" value="' . $subject_name . '">';
            echo '<input type="hidden" class="absent" value="' . $absent . '">';
        }
        ?>
        <div class="bigbox">
            <h1>Subject</h1>
            <canvas id="myChart">Does not support chart</canvas>
        </div>
    </main>
    <script src="js/all.js"></script>
</body>

</html>
