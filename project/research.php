<?php
include("start_session.php");
checkSession();
$user_id = $_SESSION['user_id'];

//previous data from db
$query = "SELECT * FROM research_phd WHERE user_id = '$user_id'";
$result1 = $conn->query($query);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row1 = array(
        'obtained_phd' => '',
        'title_of_thesis' => '',
        'area_of_specialization' => '',
        'research_supervisor' => '',
        'research_center' => '',
        'month_year_reward' => ''
    );
}

//previous data from db
$query = "SELECT * FROM research_fellow WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row2 = $result->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row2 = array(
        'obtained_post_doctoral' => '',
        'name_of_fellowship' => '',
        'host_institution' => '',
        'duration_from' => '',
        'duration_to' => ''
    );
}


if ($_SERVER["REQUEST_METHOD"]=="POST") {

  //insert phd
  if (isset($_POST['btn'])) {
    $phd=$_POST['phd'];
    $thesis=$_POST['thesis'];
    $specialization=$_POST['specialization'];
    $Supervisor=$_POST['Supervisor'];
    $center=$_POST['center'];
    $year=$_POST['year'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `research_phd`(
    `user_id`, `obtained_phd`, `title_of_thesis`, `area_of_specialization`, `research_supervisor`,
    `research_center`, `month_year_reward`) VALUES (?,?,?,?,?,?,?)");


$stmt->bind_param("issssss", $user_id, $phd, $thesis, $specialization, $Supervisor, $center, $year);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Submitted successfully');</script>";
    $updateLastProfileUpdateQuery = "UPDATE users SET last_profile_update = NOW() WHERE user_id = ?";
    $updateLastProfileUpdateStmt = $conn->prepare($updateLastProfileUpdateQuery);
    $updateLastProfileUpdateStmt->bind_param("i", $user_id);
    $updateLastProfileUpdateStmt->execute();
    $updateLastProfileUpdateStmt->close();
} else {
    echo "Error: " . $stmt->error;
}
header("Location: research.php");
        exit();

$stmt->close();

}

//insert 
if (isset($_POST['btn3'])) {
    $post=$_POST['post'];
    $fellowship=$_POST['fellowship'];
    $host=$_POST['host'];
    $duration=$_POST['duration'];
    $to=$_POST['to'];


    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `research_fellow`(
    `user_id`, `obtained_post_doctoral`, `name_of_fellowship`, `host_institution`,
    `duration_from`, `duration_to`) VALUES (?, ?, ?, ?, ?, ?)");


$stmt->bind_param("isssss", $user_id, $post, $fellowship, $host, $duration, $to);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Submitted successfully');</script>";
    $updateLastProfileUpdateQuery = "UPDATE users SET last_profile_update = NOW() WHERE user_id = ?";
    $updateLastProfileUpdateStmt = $conn->prepare($updateLastProfileUpdateQuery);
    $updateLastProfileUpdateStmt->bind_param("i", $user_id);
    $updateLastProfileUpdateStmt->execute();
    $updateLastProfileUpdateStmt->close();
} else {
    echo "Error: " . $stmt->error;
}
header("Location: research.php");
        exit();

$stmt->close();

}


//update phd
  if (isset($_POST['btn1'])) {
    $phd=$_POST['phd'];
    $thesis=$_POST['thesis'];
    $specialization=$_POST['specialization'];
    $Supervisor=$_POST['Supervisor'];
    $center=$_POST['center'];
    $year=$_POST['year'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `research_phd` SET 
    `obtained_phd`=?, `title_of_thesis`=?, `area_of_specialization`=?, `research_supervisor`=?,
    `research_center`=?, `month_year_reward`=? WHERE `user_id`=?");


$stmt->bind_param("ssssssi", $phd, $thesis, $specialization, $Supervisor, $center, $year,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: research.php");
        exit();

$stmt->close();

}

//update 
if (isset($_POST['btn4'])) {
    $post=$_POST['post'];
    $fellowship=$_POST['fellowship'];
    $host=$_POST['host'];
    $duration=$_POST['duration'];
    $to=$_POST['to'];


    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `research_fellow` SET 
    `obtained_post_doctoral`=?, `name_of_fellowship`=?, `host_institution`=?, `duration_from`=?,
    `duration_to`=? WHERE `user_id`=?");


$stmt->bind_param("sssssi", $post, $fellowship, $host, $duration, $to,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: research.php");
        exit();

$stmt->close();

}


  //delete
  if (isset($_POST['btn2'])) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `research_phd` WHERE `user_id`=?");
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: research.php");
        exit();

        $stmt->close();
    }

    if (isset($_POST['btn5'])) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `research_fellow` WHERE `user_id`=?");
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: research.php");
        exit();

        $stmt->close();
    }


}


//updated data from db
$query = "SELECT * FROM research_phd WHERE user_id = '$user_id'";
$result1 = $conn->query($query);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
} else {
    echo "not found";
}

//updated data from db
$query = "SELECT * FROM research_fellow WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row2 = $result->fetch_assoc();
} else {
    echo "not found";
}

?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Bishop Heber College</title>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="script.js"></script>
<!---ICONS---->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ui_styles.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
      body{
        overflow-x: hidden;
      }
      .user{
        display: inline-flex;
        color: lightgray;
        font-weight: 400;
        font-size: 18px;
        padding: 1px;
        text-align: center;
      }
      .user h5{
        padding: 10px;
      }
     
    </style>
    <title>Department of BCA</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Glass Sidebar -->
        <nav class="col-md-3 d-none d-md-block glass-sidebar ">
            <div class="sidebar-sticky" >
                <br><br>
                <ul class="nav flex-column">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> Details
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="personal.php">PERSONAL DETAILS</a>
                            <a class="dropdown-item" href="academic.php">ACADEMIC DETAILS</a>
                            <a class="dropdown-item" href="research.php">RESEARCH DETAILS</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> EXPERIENCE/CERTIFICATE/<br>CONFERENCE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="work.php">WORK EXPERIENCE</a>
                            <a class="dropdown-item" href="exp.php">EXPERIENCE ALL</a>
                            <a class="dropdown-item" href="research_guide.php">RESEARCH GUIDED</a>
                            <a class="dropdown-item" href="course.php">COURSE/CERFICATES</a>
                            <a class="dropdown-item" href="conference.php">CONFERENCE/<br>WORKSHOP</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> RESEARCH/JOURNAL/<br>BOOK
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="paper.php">RESEARCH PAPER PRESENTED</a>
                            <a class="dropdown-item" href="journal.php">PUBLISHED IN JOURNAL</a>
                            <a class="dropdown-item" href="book.php">PUBLICATION IN BOOK</a>
                            <a class="dropdown-item" href="published.php">BOOK PUBLISHED</a>
                            <a class="dropdown-item" href="conf_wrk_sem_detail.php">CONFERENCE ORGANISED</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> AWARD/PROJECTS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="awards.php">AWARD RECIVED</a>
                            <a class="dropdown-item" href="reproject.php">RESEARCH PROJECTS</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> OTHERS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="resource.php">RESOURCE PERSON</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="additional.php">
                            <i class="fa fa-plus-square" aria-hidden="true"></i> ADDTIONAL INFORMARTION
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="generate report" target="_blank" href="report.php?user_id=<?=$user_id = $_SESSION['user_id']; ?>">
                            REPORT
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Logout Link -->
            <a href="logout.php" class="logout-link">Logout</a>
        </nav>

        <!-- Page Content -->
        <main class="col-md-9 ms-sm-auto col-lg-9 px-4 main-content">
            <!-- Your page content goes here -->
           <nav class="navbar navbar fixed-top">
      <div class="container-fluid">
         <div class="navbar-header">
            <h2><a href="index.html">Department of BCA</a></h2>
         </div>
   </nav>
   <br><br>
   <?php
   $query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "not found";
}

?>
                  <!--Table-->
                  <br><br>
                  <div class="user"><h5>welcome : <?php echo $user['uname']; ?> </h5></div>
<br>
                   <div class="section-title">
              
                  <center><h3>Research Details</h3></center><br/>
                  <hr>
                  <br/> 
                     </div>
                      <div class="row">
                  <div class="col-sm-4 col-lg-3 mt-4 mt-lg-0 faculty"> <!-- faculty information -->
                   
                       
                        <form id="form" name="form" method="post" action="">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="phd">Wheather Obtained Ph.D.</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="yes" name="phd" value="yes" <?php if ($row1['obtained_phd'] == 'yes') echo 'checked'; ?>>
              <label class="form-check-label" for="yes">YES</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="no" name="phd" value="no" <?php if ($row1['obtained_phd'] == 'no') echo 'checked'; ?>>
              <label class="form-check-label" for="no">NO</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="pursuing" name="phd" value="pursuing" <?php if ($row1['obtained_phd'] == 'pursuing') echo 'checked'; ?>>
              <label class="form-check-label" for="pursuing">Pursuing</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="thesis">*Title of Thesis</label>
            <input name="thesis" type="text" class="form-control" id="thesis" value="<?php echo $row1['title_of_thesis']; ?>" requied>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="specialization">Area of Specialization</label>
            <input name="specialization" type="text" class="form-control" id="specialization" value="<?php echo $row1['area_of_specialization']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="Supervisor">Research Supervisor</label>
            <input name="Supervisor" type="text" class="form-control" id="Supervisor" value="<?php echo $row1['research_supervisor']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="center">Research Center</label>
            <input name="center" type="text" class="form-control" id="center" value="<?php echo $row1['research_center']; ?>" >
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="year">Month of Year and Award</label>
            <input name="year" type="text" class="form-control" id="year" value="<?php echo $row1['month_year_reward']; ?>">
            <br>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn" type="submit" id="btn" value="Add Ph.D." class="btn btn-outline-success">
            <input name="btn1" type="submit" id="btn1" value="Update Ph.D." class="btn btn-outline-primary">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal1">Delete 
            ph.D.</button>
            <br><br>
          </div>
        </div>
        </div>
        <div class="row">
         <div class="col-md-5">
          <div class="form-group">
            <label for="whether">Wheather Obtained Post Doctoral Fellowship?</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="yes" name="post" value="Yes" <?php if ($row2['obtained_post_doctoral'] == 'Yes') echo 'checked'; ?>>
              <label class="form-check-label" for="yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="no" name="post" value="No" <?php if ($row2['obtained_post_doctoral'] == 'No') echo 'checked'; ?>>
              <label class="form-check-label" for="no">No</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="not" name="post" value="NOT" <?php if ($row2['obtained_post_doctoral'] == 'NOT') echo 'checked'; ?>>
              <label class="form-check-label" for="not">Not Applicable</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="fellowship">Name Of The Fellowship</label>
            <input name="fellowship" type="text" class="form-control" id="fellowship" value="<?php echo $row2['name_of_fellowship']; ?>">
          </div>
        </div>
       <div class="col-md-3">
          <div class="form-group">
            <label for="host">Host Institution</label>
            <input name="host" type="text" class="form-control" id="host" value="<?php echo $row2['host_institution']; ?>">
            <br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="duration">Duration : From</label>
            <input name="duration" type="date" class="form-control" id="duration" value="<?php echo $row2['duration_from']; ?>">
            <br><br>
          </div>
        </div> 
		<div class="col-md-6">
          <div class="form-group">
            <label for="to">To</label>
            <input name="to" type="date" class="form-control" id="to" value="<?php echo $row2['duration_to']; ?>">
            <br><br>
          </div>
        </div> 
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn3" type="submit" id="btn3" value="Add" class="btn btn-outline-success">
            <input name="btn4" type="submit" id="btn4" value="Update" class="btn btn-outline-primary">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
            <a href="work.php" class="btn btn-dark" role="button">Next</a>
          </div>
        </div>
        </div>
    </div>
    </form>
    <br>
    <!-- Modal -->
<div class="modal" id="deleteModal1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
        <p>Are you sure want to delete?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input name="btn2" type="submit" id="btn2" value="Delete" class="btn btn-outline-danger">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


 <!-- Modal -->
<div class="modal" id="deleteModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="btn-close" data-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
        <p>Are you sure want to delete?</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input name="btn5" type="submit" id="btn5" value="Delete" class="btn btn-outline-danger">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
                                 </div></div></div> </div>
        </main>
    </div>
</div>
<script type="text/javascript">
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
</script>
</body>
</html>
