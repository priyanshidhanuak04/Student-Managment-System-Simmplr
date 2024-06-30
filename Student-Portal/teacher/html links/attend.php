
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Entry</title>
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
        <h1>Enter Student Attendance</h1>
    </div>

    <!-- table -->
        <div class="tbl"> 
        <div class="view">
        <button class="btn" style="width: 224px;height: 47px;"><a href="/teacher/html links/attend-view.php">View Attendance</a></button>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-info table align-middle">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Register Number</th>
                <th scope="col">Course</th>
                <th scope="col">Classes Attended</th>
                <th scope="col">Classes conducted</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php  
                   $con = new mysqli('localhost','root','','logindb');
                   if( $con-> connect_error){
                   die('Connection Failed : '.$conn->connect_error);
                   }
                   else{
                

                  require("../../sign-up/database.php");
                  
                  $count = 0;

                  $query1 = mysqli_query($con,"select * from user");

                  while($row=mysqli_fetch_array($query1)){       
                  
                    $count++;
                    ?>
               <tr>
                  <td> <?php echo $count;  ?></td>
                  <td> <?php echo $row['name']; ?></td>
                  <td> <?php echo $row['regdno']; ?></td>


                  <form action="attend-process.php" method="post">
                      <div>
                        <td>  
                          <label for="course"></label>
                          <input type="text" id="course" name="course">
                        </td>
                      </div>
                      <div>
                        <td>  
                          <label for="attended"></label>
                          <input type="number" id="attended" name="attended">
                        </td>
                      </div>
                      <div>
                        <td>  
                          <label for="conducted"></label>
                          <input type="number" id="conducted" name="conducted">
                        </td>
                        <td>  
                          <button class="btn" style="width: 84px;height: 32px;margin-left: 30px; margin-top: 0px; font-size: 0.7rem">Enter</button>
                        </td>
                        <input type="hidden" name="regdno" value="<?php echo $row['regdno']; ?>">
                      </div>
                      </form>
              </tr>
              
             <?php  }  } ?>
             
                
                
            
            </tbody>
          </table>
        </div>




      </body>
</html>