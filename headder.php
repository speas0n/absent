<?php
ini_set('display_errors', 1);
try {
    $pdo = new PDO('sqlite:table.db');
} catch (PDOException $e) {
    die('DB Error');
}
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: index.php");
    exit();
}
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM login WHERE uid='{$uid}' ";
$stm = $pdo->prepare($sql);
$stm->execute();
$user_name = '';
while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
    $user_name = $row['name'];
}
$sql = "SELECT * FROM color WHERE uid='{$uid}' ";
$stm = $pdo->prepare($sql);
$stm->execute();
$color='';
while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
    $color = $row['color'];
}


$str=<<<EOM
<style>
    :root {
        --theme: {$color};
    }
</style>
<meta name="theme-color" id="theme" content="{$color}">
EOM;
echo $str;

?>

