<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require   "../sign-up/database.php";

    $sql = sprintf("SELECT * FROM teacher
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
                   
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();  
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header(("Location: ../teacher/teacher-index.php"));
            exit; 
        }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Login</title>
    <link rel="icon" href="/images/SRM Logo.png">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    

    <?php if ($is_invalid): ?>
        <em>Invalid Login</em>
    <?php endif; ?>
    


    

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form method="post" class="sign-in-form">

                    <h2 class="title1">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder="Email" name="email"value="<?= $_POST["email"] ?? "" ?>">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>

                    <input type="submit" value="login" class="btn solid">

                </form>

                <!-- sign up -->

                <form action="process-teacher-signup.php" class="sign-up-form" id="signup" method="post" novalidate>
                    <h2 class="title1">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input  type="text" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email">
                    </div>
                    
                    <div class="input-field">
                        <i class="fa-solid fa-screen-users"></i>
                        <input type="branch" id="branch" name="branch" placeholder="Undertaking Branch">
                    </div>
                    
                    <div class="input-field">
                        <i class="fa-solid fa-screen-users"></i>
                        <input  type="section" id="section" name="section" placeholder="Undertaking Section">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input  type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input  type="password" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                    </div>

                    <input type="submit" value="Sign up" class="btn solid">

                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Don't have an account?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna 
                        aliqua.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="/images/undraw_teaching_re_g7e3.svg" class="image">  
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have an account?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna 
                        aliqua.</p>
                    <button class="btn transparent" id="sign-in-btn">Login in</button>
                </div>
                <img src="/images/undraw_sign_up_n6im.svg" class="image">  
            </div>
        </div>
    </div>

    
    <script type="text/javascript" src="/login/app.js"></script>

    

    
</body>
</html>
