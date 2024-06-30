<?php

if (empty($_POST["name"])){
    die("Name is required");
}
if (empty($_POST["regdno"])){
    die("Name is required");
}

if (strlen($_POST["password"]<8)){
    die("Password must atleast 8 characters");
}

if (! preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain atleast one letter");
}

if (! preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain atleast one number");
}

if ($_POST["password"] != $_POST["password_confirmation"]){
    die("Passwords must match");
}

if (empty($_POST["yos"])) {
    die("Error: Year of Study is required.");
}

$password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name,regdno,dob,yos,branch,section,password_hash)
        VALUES(?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                  $_POST["name"],
                  $_POST["regdno"],
                  $_POST["dob"],
                  $_POST["yos"],
                  $_POST["branch"],
                  $_POST["section"],
                  $password_hash);

if ($stmt->execute()){
    header("Location: ../login/login.php");
    exit;

} else{
 
    if ($mysqli->errno === 1062) {
        die("Account with Registration Number already exists");
    }
    else{
        die($mysqli->error . " " . $mysqli->errno);
    }
}

