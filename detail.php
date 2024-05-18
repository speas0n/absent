<?php
    require_once('headder.php');
    $subjectName = isset($_GET['subject_name']) ? urldecode($_GET['subject_name']) : '';

?>
<!DOCTYPE html>
<html lang="ja">
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
    <link rel="stylesheet" href="css/detail.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/70754e60d0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <title>ABSENT</title>
</head>
<body>
    <?php
        $str=<<<EOM
        <header>
        <h2>{$user_name}</h2>
        <div class="icons">
        <label for="submit" class="updateBtn"><i class="fa-solid fa-backward"></i></label>
        <a href="delete.php?subject_name=$subjectName"><i class="fa-solid fa-trash"></i></a>
        <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
        </header>

        <form method="post" style="display: none;" >
        <input type="hidden" class="newab" name="absent">
        <input type="submit" id="submit" name="submit" value="submit" style="display: none;" >
        </form>
        EOM;
        echo $str;
    ?>
    <main>
        <?php
        $str1=<<<EOM
        <div class="bigbox">
        <canvas id="myChart"></canvas>
        <div class="else">もう、おとした。</div>
        </div>

        EOM;
        echo $str1 ;    
        $str2=<<<EOM
        <div class="semibox">
        <h1>{$subjectName}</h1>
        </div>

        EOM;
        echo $str2 ;

        $sql = "SELECT * FROM main WHERE subject_name='{$subjectName}' AND uid='{$uid}'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $absent ='';
        $total_class='';
        foreach ($result as $row) {
            $absent= $row["absent"];
            $total_class= $row["total_class"];
        }
        $str3=<<<EOM
            <div class="add">
            <div class="container one" id="flick">
                <div class="title">欠席数</div>
                <div class="value"><label for="absentInput" id="absentLabel" >{$absent}</label></div>
                <input type="hidden" value="{$absent}" class="absent" id="absentInput">
            </div>
            </div>
            <div class="container">
                <div class="title">授業数</div>
                <div class="value">{$total_class}</div>
                <input type="hidden" value="{$total_class}" class="total_class">        
            </div>

        EOM;
        echo $str3 ;
        ?>
    </main>
    <script src="js/detail.js"></script>
    <?php
        if (isset($_POST['submit'])) {
            $newAbsent=$_POST['absent'];
            $sql = "UPDATE main SET absent = :newAbsent WHERE uid = :userId AND subject_name = :subjectname";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':newAbsent', $newAbsent, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $uid, PDO::PARAM_STR);
            $stmt->bindParam(':subjectname', $subjectName, PDO::PARAM_STR); 
            $stmt->execute();

            echo '<script>window.location.href = "next.php";</script>';
            exit(); 
        }
    ?>
</body>
</html>
