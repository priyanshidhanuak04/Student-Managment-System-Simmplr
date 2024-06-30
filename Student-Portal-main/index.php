<?php 

session_start();

if (isset($_SESSION["user_id"])) {
    
  $mysqli = require   "sign-up/database.php";
  
  $sql = "SELECT * FROM user
          WHERE id = {$_SESSION["user_id"]}";
          
  $result = $mysqli->query($sql);
  
  $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student portal</title>
    <link rel="icon" href="/images/SRM Logo.png">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg" style="background-color: #04befe;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/images/SRM Logo.png" alt="logo" width="30" height="30">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active txt" aria-current="page" href="/index.php"><strong>Home</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link txt" href="/view-grade.php"><strong>Grades</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link txt" href="/view-attend.php"><strong>Attendance</strong></a>
              </li>
              <li class="nav-item logout">
                <a class="nav-link txt" href="/login/logout.php"><strong>Logout</strong></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- details dashboard -->
      <div class=" dashboard row">
        <div class="col">
            <h3 class="title">Student details</h3>
            <div class="details">
                <div class="pfp">
                    <img class="logo" src="/images/OIP.jpeg" height="100px" width="100px">
                </div>
                <div class="student-details">
                    <!-- php to fetch name -->
                    <p><strong>Name</strong> - <?= htmlspecialchars($user["name"]) ?></p>
                    <p><strong>Registration number</strong> - <?= htmlspecialchars($user["regdno"]) ?> </p>
                    <p><strong>Date of birth</strong> - <?= htmlspecialchars($user["dob"]) ?> </p>  
                </div>
                <div class="student-details">
                    <p><strong>Year of study</strong> - <?= htmlspecialchars($user["yos"]) ?></p>
                    <p><strong>Branch</strong> - <?= htmlspecialchars($user["branch"]) ?></p>
                    <p><strong>Section</strong> - <?= htmlspecialchars($user["section"]) ?></p>
                </div>    
            </div>
        </div>
        <!-- divider -->
        <!-- <div class="vr"></div> -->
    
        <div class="col">
            <h3 class="title">Total Attendance</h3>
            <div class="details">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="student-details">
                  <p id="total-classes"><strong>Total classes</strong> - </p>
                  <p id="attended-classes"><strong>Attended classes</strong> -  </p>
                  <p id="attendance-percentage"><strong>Attendance percentage</strong> - </p>
                </div>
            </div>
        </div>
      </div>

      <!-- cards -->
      <div class="row cards">
        <div class="col-sm-6 mb-3 mb-sm-0 card1">
          <div class="card" style="width: 22rem;">
          <img src="/images/undraw_detailed_analysis_re_tk6j.svg" class="card-img-top" alt="..." style="width: 350px;height: 286px;margin-top: 20px;border-bottom-width: 20px;margin-bottom: 20px;">
            <div class="card-body">
              <h5 class="card-title">Check your grades</h5>
              <p class="card-text">Can check your internal marks per subject to know whether you're getting an arrear.</p>
              <a href="/view-grade.php" class="btn btn-primary" style="margin-left: 80px;padding-top: 12px;margin-top: 40px;">Check</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6  mb-3 mb-sm-0 card2">
          <div class="card" style="width: 22rem;">
          <img src="/images/undraw_done_checking_re_6vyx.svg" class="card-img-top" alt="..." style="height: 286px;margin-top: 30px;margin-bottom: 10px;">
            <div class="card-body">
              <h5 class="card-title">Check your attendance</h5>
              <p class="card-text">Can check your attendance to know whether you're getting detained this semester or not.</p>
              <a href="/view-attend.php" class="btn btn-md btn-primary" style="margin-left: 80px;padding-top: 12px;margin-top: 40px;margin-bottom: 10px;">Check</a>
            </div>
          </div>
        </div>
      </div>
      <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/chart.js"></script>
</body>
</html>