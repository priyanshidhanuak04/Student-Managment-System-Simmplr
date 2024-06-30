<?php

    $mysqli = require "../../sign-up/database.php";

    $regdno = $_POST["regdno"];
    $course = $_POST["course"];
    $obtained = isset($_POST['obtained']) ? intval($_POST['obtained']) : 0;
    $total = isset($_POST['total']) ? intval($_POST['total']) : 0;

    if ($total != 0) {
        $percent = ($obtained/$total)*100; 
    } else {
        $percent = 0;
    }

    $stmt = $mysqli->prepare("INSERT INTO grades (regdno,course,obtained,total,percent)
                             VALUES(?,?,?,?,?)");

    $stmt->bind_param("ssiii", $regdno, $course, $obtained, $total, $percent);

    $stmt->execute();

    $stmt->close();

    $mysqli->close();

    header("Location: grade-view.php");
    exit;
