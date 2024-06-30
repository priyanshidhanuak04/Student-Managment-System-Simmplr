<?php 

session_start();

if (isset($_SESSION["user_id"])) {
    
  $mysqli = require   "sign-up/database.php";
  
  $sql = "SELECT * FROM user
          WHERE id = {$_SESSION["user_id"]}";
          
  $result = $mysqli->query($sql);
  
  $user = $result->fetch_assoc();

  $regdno =  ($user["regdno"]);
}

?>

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


    <div class="titl">
        <h1>View Marks</h1>
    </div>

    <!-- table -->
        <div class="tbl"> 
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
                   die('Connection Failed : '.$con->connect_error);
                   }
                   else{
                

                  $mysqli = require("sign-up/database.php");
                  
                  $count = 0;

                  


                  $query = "SELECT * FROM grades
                            JOIN user ON grades.regdno = user.regdno
                            WHERE user.regdno = '$regdno'";
                  
                  $result = mysqli_query($mysqli, $query);

                  if (!$result) {
                    echo "Error executing query: " . mysqli_error($mysqli);
                    exit;
                 }
                  
                  while($row = mysqli_fetch_assoc($result)){  
                    $count++;     
                ?>
                    

              <tr>
                  <td> <?php echo $count;  ?></td>
                  <td> <?php echo $row['name']; ?></td>
                  <td> <?php echo $row['regdno']; ?></td>
                  <td> <?php echo $row['course']; ?></td>
                  <td> <?php echo $row['obtained']; ?></td>
                  <td> <?php echo $row['total']; ?></td>
                  <td> <?php echo $row['percent']; ?></td>

              </tr>
              <?php  }  } ?>
            
            </tbody>
          </table>
        </div>




      </body>
</html>