<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Marks</title>
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

    <div class="titl">
        <h1>View Student Marks</h1>
    </div>

    <!-- filter form -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <label for="filter">Filter by marks:</label>
        <select id="filter" name="filter">
            <option value="">All</option>
            <option value="above_80">Above 80%</option>
            <option value="between_60_79">Between 60% - 79%</option>
            <option value="between_40_59">Between 40% - 59%</option>
            <option value="below_40">Below 40%</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <!-- table -->
    <div class="tbl"> 
        <div class="view">
            <button class="btn" style="width: 224px;height: 47px;"><a href="/teacher/html links/grade.php">Edit Marks</a></button>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-info table align-middle">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Register Number</th>
                <th scope="col">Course</th>
                <th scope="col">Marks Obtained</th>
                <th scope="col">Total Marks</th>
                <th scope="col">%</th>
              </tr>
            </thead>
            <tbody>
              <?php  
                   $con = new mysqli('localhost','root','','logindb');
                   if( $con-> connect_error){
                   die('Connection Failed : '.$conn->connect_error);
}
                   else{
                  $mysqli = require("../../sign-up/database.php");
                  
            
                  // ...
                  
                  $filter = $_GET['filter'] ?? '';
               
        $sql = "SELECT user.name, user.regdno, user.branch as course, grades.obtained as marks_obtained, grades.total as total_marks
        FROM user
      INNER JOIN grades ON user.regdno = grades.regdno";

switch ($filter) {
     case 'above_80':
         $sql.= " WHERE grades.percent >= 80";
          break;
      case 'between_60_79':
        $sql.= " WHERE grades.percent >= 60 AND grades.percent < 80";
         break;
     case 'between_40_59':
          $sql.= " WHERE grades.percent >= 40 AND grades.percent < 60";
          break;
      case 'below_40':
          $sql.= " WHERE grades.percent < 40";
          break;
      default:
         break;
  }
                    
                    $result = $mysqli->query($sql);
                    
                    if (!$result) {
                        echo "Error: ". $mysqli->error;
                       exit;
                    }
                    
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        $count++;
                        echo "<tr>";
                        echo "<td>". $count. "</td>";
                        echo "<td>". $row['name']. "</td>";
                        echo "<td>". $row['regdno']. "</td>";
                        echo "<td>". $row['course']. "</td>";
                        echo "<td>". $row['marks_obtained']. "</td>";
                        echo "<td>". $row['total_marks']. "</td>";
                        $percentage = ($row['marks_obtained'] / $row['total_marks']) * 100;
                        echo "<td>". number_format($percentage, 2). "%</td>";
                      echo "</tr>";
                  }
                
              }
              ?>
            </tbody>
        </table>
    </div>
</body>
</html>