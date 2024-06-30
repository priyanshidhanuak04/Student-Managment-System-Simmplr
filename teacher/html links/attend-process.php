<?php

    $mysqli = require "../../sign-up/database.php";

    $regdno = $_POST["regdno"];
    $course = $_POST["course"];
    $attended = isset($_POST['attended']) ? intval($_POST['attended']) : 0;
    $conducted = isset($_POST['conducted']) ? intval($_POST['conducted']) : 0;

    if ($conducted != 0) {
        $percent = ($attended/$conducted)*100; 
    } else {
        $percent = 0;
    }

    $stmt = $mysqli->prepare("INSERT INTO attendance (regdno,course,attended,conducted,percent)
                             VALUES(?,?,?,?,?)");

    $stmt->bind_param("ssiii", $regdno, $course, $attended, $conducted, $percent);

    $stmt->execute();

    $stmt->close();

    $mysqli->close();

    header("Location: attend-view.php");
    exit;
