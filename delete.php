<?php
    require_once('headder.php');

    $subjectName = isset($_GET['subject_name']) ? urldecode($_GET['subject_name']) : '';

    if (isset($_GET['subject_name'])) {

        $sql = "DELETE FROM main WHERE uid = :uId AND subject_name = :subjectname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uId', $uid, PDO::PARAM_STR);
        $stmt->bindParam(':subjectname', $subjectName, PDO::PARAM_STR); 
        $stmt->execute();

        echo '<script>window.location.href = "next.php";</script>';
        exit(); 
    }

?>
