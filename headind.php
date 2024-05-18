<?php
ini_set('display_errors', 1);
try {
    $pdo = new PDO('sqlite:table.db');
} catch (PDOException $e) {
    die('DB Error');
}
$str=<<<EOM
<style>
    :root {
        --theme: #a0a0a0;
    }
</style>
EOM;
echo $str;
?>
