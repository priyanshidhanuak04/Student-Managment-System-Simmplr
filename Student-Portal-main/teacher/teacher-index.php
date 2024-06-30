<?php 

session_start();

if (isset($_SESSION["user_id"])) {
    
  $mysqli = require   "../sign-up/database.php";
  
  $sql = "SELECT * FROM teacher
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
    <title>Teacher portal</title>
    <link rel="icon" href="/images/SRM Logo.png">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="/styles.css">
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
                <a class="nav-link active txt" aria-current="page" href="/teacher/teacher-index.php"><strong>Home</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link txt" href="/teacher/html links/grade.php"><strong>Grades</strong></a>
              </li>
              <li class="nav-item">
                <a class="nav-link txt" href="/teacher/html links/attend.php"><strong>Attendance</strong></a>
              </li>
              <li class="nav-item logout">
                <a class="nav-link txt" href="/teacher/teacher-logout.php"><strong>Logout</strong></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- details dashboard -->
      <div class=" dashboard row">
        <div class="col">
            <h3 class="title">Teacher Details</h3>
            <div class="details">
                <div class="pfp">
                    <img class="logo" src="/images/OIP.jpeg" height="100px" width="100px">
                </div>
                <div class="student-details">
                    <!-- php to fetch name -->
                    <p><strong>Name</strong> - <?= htmlspecialchars($user["name"]) ?></p>
                    <p><strong>Email Address</strong> - <?= htmlspecialchars($user["email"]) ?> </p>  
                </div>
                <div class="student-details">
                    <p><strong>Undertaking Branch</strong> - <?= htmlspecialchars($user["branch"]) ?></p>
                    <p><strong>Undertaking Section</strong> - <?= htmlspecialchars($user["section"]) ?></p>
                </div>    
            </div>
        </div>
        <!-- divider -->
        <!-- <div class="vr"></div> -->
    
        <div class="col">
            <!-- <h3 class="title">Total Attendance</h3>
            <div class="details">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="student-details">
                    <p><strong>Total classes</strong> - 100</p>
                    <p><strong>Attended classes</strong> - 75 </p>
                    <p><strong>Attendance percentage</strong> - 75%</p>
                </div>  
            </div> -->
        </div>
      </div>

      <!-- cards -->
      
      <div class="row cards">
        <div class="col-sm-3 mb-3 mb-sm-0 card3">
          <div class="card" style="width: 18rem;">
          <img src="/images/undraw_scrum_board_re_wk7v.svg" class="card-img-top" alt="..." style="margin-top: 10px;height: 240px;margin-bottom: 10px;">
            <div class="card-body">
              <h5 class="card-title">View all students</h5>
              <p class="card-text">Can view the details of all the students of the class.</p>
              <a href="/teacher/html links/students.php" class="btn btn-primary button1" style="padding-top: 12px;margin-left: 50px;margin-top: 30px;">View</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0 card4">
          <div class="card" style="width: 18rem;">
          <img src="/images/undraw_grades_re_j7d6.svg" class="card-img-top" alt="..." style="margin-top: 40px;height: 220px;">
            <div class="card-body">
              <h5 class="card-title">Enter student grades</h5>
              <p class="card-text">Can enter the grades of the students of the class.</p>
              <a href="/teacher/html links/grade.php" class="btn btn-primary button1" style="padding-top: 12px;margin-left: 50px;margin-top: 30px;">Edit</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3  mb-3 mb-sm-0 card5">
          <div class="card" style="width: 18rem;">
          <img src="/images/undraw_new_entries_re_cffr.svg" class="card-img-top" alt="..." style="height: 240px;margin-top: 20px;">
            <div class="card-body">
              <h5 class="card-title">Enter attendance</h5>
              <p class="card-text">Can enter the attendance of the students of the class.</p>
              <a href="/teacher/html links/attend.php" class="btn btn-md btn-primary button1" style="padding-top: 12px;margin-left: 50px;margin-top: 30px;">Edit</a>
            </div>
          </div>
        </div>
      </div>
      <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/index.js"></script>
</body>
</html>