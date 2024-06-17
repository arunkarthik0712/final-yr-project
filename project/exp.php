<?php
include("start_session.php");
checkSession();
$user_id = $_SESSION['user_id'];


//previous data from db
$query = "SELECT * FROM teaching_experience WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row = array(
        'teaching_ug' => '',
        'teaching_pg' => '',
        'teaching_mphil' => '',
        'teaching_phd' => ''
    );
}

//previous data from db
$query = "SELECT * FROM research_experience WHERE user_id = '$user_id'";
$result1 = $conn->query($query);

if ($result1->num_rows > 0) {
    $row1 = $result->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row1 = array(
        'research_ug' => '',
        'research_pg' => '',
        'research_mphil' => '',
        'research_phd' => ''
    );
}


//previous data from db
$query = "SELECT * FROM fi_experience WHERE user_id = '$user_id'";
$result2 = $conn->query($query);

if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row2 = array(
        'field_industrial' => '',
        'name_of_organisation' => '',
        'desgination'=>'',
        'duration_From' => '',
        'duration_to' => ''
    );
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (isset($_POST['btn'])) {
    $tug=$_POST['tug'];
    $tpg=$_POST['tpg'];
    $tmphil=$_POST['tmphil'];
    $tphd=$_POST['tphd'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `teaching_experience`(`user_id`, `teaching_ug`, `teaching_pg`, `teaching_mphil`, `teaching_phd`) VALUES (?,?,?,?,?)");


$stmt->bind_param("issss", $user_id, $tug, $tpg, $tmphil, $tphd);

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
header("Location: exp.php");
        exit();

$stmt->close();

}

if (isset($_POST['btn3'])) {
    $rug=$_POST['rug'];
    $rpg=$_POST['rpg'];
    $rmphil=$_POST['rmphil'];
    $rphd=$_POST['rphd'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `research_experience`(`user_id`, `research_ug`, `research_pg`, `research_mphil`, `research_phd`) VALUES (?,?,?,?,?)");


$stmt->bind_param("issss", $user_id, $rug, $rpg, $rmphil, $rphd);

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
header("Location: exp.php");
        exit();

$stmt->close();

}

if (isset($_POST['btn6'])) {
    $type=$_POST['type'];
    $Sector=$_POST['Sector'];
    $desg=$_POST['desg'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `fi_experience`(`user_id`, `field_industrial`, `name_of_organisation`, `desgination`, `duration_From`,`duration_to`) VALUES (?,?,?,?,?,?)");


$stmt->bind_param("isssss", $user_id, $type, $Sector, $desg, $from, $to);

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
header("Location: exp.php");
        exit();

$stmt->close();

}

if (isset($_POST['btn1'])) {
    $tug=$_POST['tug'];
    $tpg=$_POST['tpg'];
    $tmphil=$_POST['tmphil'];
    $tphd=$_POST['tphd'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `teaching_experience` SET 
    `teaching_ug`=?, `teaching_pg`=?, `teaching_mphil`=?, `teaching_phd`=? WHERE `user_id`=?");


$stmt->bind_param("ssssi", $tug, $tpg, $tmphil, $tphd,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: exp.php");
        exit();

$stmt->close();

}

if (isset($_POST['btn4'])) {
    $rug=$_POST['rug'];
    $rpg=$_POST['rpg'];
    $rmphil=$_POST['rmphil'];
    $rphd=$_POST['rphd'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `research_experience` SET 
    `research_ug`=?, `research_pg`=?, `research_mphil`=?, `research_phd`=? WHERE `user_id`=?");


$stmt->bind_param("ssssi", $rug, $rpg, $rmphil, $rphd,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: exp.php");
        exit();

$stmt->close();

}

if (isset($_POST['btn7'])) {
    $type=$_POST['type'];
    $Sector=$_POST['Sector'];
    $desg=$_POST['desg'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `fi_experience` SET 
    `field_industrial`=?, `name_of_organisation`=?, `desgination`=?, `duration_From`=?,`duration_to`=? WHERE `user_id`=?");


$stmt->bind_param("sssssi", $type, $Sector, $desg, $from,$to,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: exp.php");
        exit();

$stmt->close();

}


if (isset($_POST['btn2'])) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `teaching_experience` WHERE `user_id`=?");
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: exp.php");
        exit();

        $stmt->close();
    }

if (isset($_POST['btn5'])) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `research_experience` WHERE `user_id`=?");
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: exp.php");
        exit();

        $stmt->close();
    }

if (isset($_POST['btn8'])) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `fi_experience` WHERE `user_id`=?");
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: exp.php");
        exit();

        $stmt->close();
    }

}




//updated data from db
$query = "SELECT * FROM teaching_experience WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "not found";
}

//updated data from db
$query = "SELECT * FROM research_experience WHERE user_id = '$user_id'";
$result1 = $conn->query($query);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
} else {
    echo "not found";
}

//updated data from db
$query = "SELECT * FROM fi_experience WHERE user_id = '$user_id'";
$result2 = $conn->query($query);

if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
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
                        <a class="nav-link" target="_blank" href="report.php?user_id=<?=$user_id = $_SESSION['user_id']; ?>">
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
              
                  <center><h3>Teaching/Research/Field/Industrial Experience</h3></center><br/>
                  <hr>
                  <br/> 
                     </div>
                      <div class="row">
                  <div class="col-sm-4 col-lg-3 mt-4 mt-lg-0 faculty"> <!-- faculty information -->
                   
                       
                        <form id="form" name="form" method="post" action="">
      <div class="row">
        <h4>Teaching Experience</h4>
                  <hr>
        <div class="col-md-3">
          <div class="form-group">
            <label for="tug">UG</label>
            <input name="tug" type="text" class="form-control" id="tug" value="<?php echo $row['teaching_ug']; ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="tpg">PG</label>
            <input name="tpg" type="text" class="form-control" id="tpg" value="<?php echo $row['teaching_pg']; ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="tmphil">M.Phil.</label>
            <input name="tmphil" type="text" class="form-control" id="tmphil" value="<?php echo $row['teaching_mphil']; ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="tphd">Ph.D.</label>
            <input name="tphd" type="text" class="form-control" id="tphd" value="<?php echo $row['teaching_phd']; ?>" >
            <br><br>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <input name="btn1" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
            <br><br>
          </div>
        </div>
        </div>
		<h4>Research Experience</h4>
                  <hr>
        <div class="col-md-3">
          <div class="form-group">
            <label for="rug">UG</label>
            <input name="rug" type="text" class="form-control" id="rug" value="<?php echo $row1['research_ug']; ?>" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="rpg">PG</label>
            <input name="rpg" type="text" class="form-control" id="rpg" value="<?php echo $row1['research_pg']; ?>" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="rmphil">M.Phil.</label>
            <input name="rmphil" type="text" class="form-control" id="rmphil" value="<?php echo $row1['research_mphil']; ?>" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="rphd">Ph.D.</label>
            <input name="rphd" type="text" class="form-control" id="rphd" value="<?php echo $row1['research_phd']; ?>" >
            <br><br>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn3" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <input name="btn4" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal1">Delete</button>
            <br><br>
          </div>
        </div>
        </div>
		<h4>Field/Industrial Experience</h4>
                  <hr>
        <div class="col-md-2">
          <div class="form-group">
            <label for="status">Select Type</label>
            <div>
              <input type="radio" id="field" name="type" value="field" <?php if ($row2['field_industrial'] == 'field') echo 'checked'; ?>>
              <label for="field">Field</label>
            </div>
            <div>
              <input type="radio" id="industrial" name="type" value="industrial" <?php if ($row2['field_industrial'] == 'industrial') echo 'checked'; ?>>
              <label for="industrial">Industrial</label>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="Sector">Name Of The Sector/Organization</label>
            <input name="Sector" type="text" class="form-control" id="Sector" value="<?php echo $row2['name_of_organisation']; ?>" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="desg">Desgination</label>
            <input name="desg" type="text" class="form-control" id="desg" value="<?php echo $row2['desgination']; ?>" >
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="from">Duration From</label>
            <input name="from" type="text" class="form-control" id="from" value="<?php echo $row2['duration_From']; ?>" >
            <br><br>
          </div>
        </div>
		<div class="col-md-2">
          <div class="form-group">
            <label for="to">To</label>
            <input name="to" type="text" class="form-control" id="to" value="<?php echo $row2['duration_to']; ?>" >
            <br><br>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn6" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <input name="btn7" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal2">Delete</button>
			       <a href="research_guide.php" class="btn btn-dark" role="button">Next</a>
            <br>
          </div>
        </div>
        </div>
    </div>
    </form>
    <br>

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
        <input name="btn2" type="submit" id="btn2" value="Delete" class="btn btn-outline-danger">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


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
        <input name="btn5" type="submit" id="btn5" value="Delete" class="btn btn-outline-danger">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

 <!-- Modal -->
<div class="modal" id="deleteModal2">
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
        <input name="btn8" type="submit" id="btn5" value="Delete" class="btn btn-outline-danger">
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
</body>
</html>
