<?php

if (empty($_POST["name"])){
    die("Name is required");
}
if (empty($_POST["email"])){
    die("Email is required");
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


$password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require  "../sign-up/database.php";

$sql = "INSERT INTO teacher (name,email,branch,section,password_hash)
        VALUES(?,?,?,?,?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssss",
                  $_POST["name"],
                  $_POST["email"],
                  $_POST["branch"],
                  $_POST["section"],
                  $password_hash);

if ($stmt->execute()){
    header("Location: teacher-login.php");
    exit;

} else{
 
    if ($mysqli->errno === 1062) {
        die("Account with email already exists");
    }
    else{
        die($mysqli->error . " " . $mysqli->errno);
    }
}

