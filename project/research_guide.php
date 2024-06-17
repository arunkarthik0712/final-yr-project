<?php
include("start_session.php");
checkSession();
$user_id = $_SESSION['user_id'];

//previous data from db
$query = "SELECT * FROM research_phd_guide WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row = array(
        'phd_guide_name' => '',
        'phd_part_full_time' => '',
        'phd_scholar_name' => '',
        'phd_board_area_of_research' => '',
        'phd_title_of_dissertation' => '',
        'phd_status' => ''
    );
}


//previous data from db
$query = "SELECT * FROM research_mphil_guide WHERE user_id = '$user_id'";
$result1 = $conn->query($query);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row1 = array(
        'mphil_guide_name' => '',
        'mphil_part_full_time' => '',
        'mphil_scholar_name' => '',
        'mphil_board_area_of_research' => '',
        'mphil_title_of_dissertation' => '',
        'mphil_status' => ''
    );
}



if ($_SERVER["REQUEST_METHOD"]=="POST") {
  
  if (isset($_POST['btn'])) {
    $mphilgname=$_POST['mphilgname'];
    $mphiltime=$_POST['mphiltime'];
    $mphilname=$_POST['$mphilname'];
    $mphilarea=$_POST['mphilarea'];
    $mphiltitle=$_POST['mphiltitle'];
    $mphilstatus=$_POST['mphilstatus'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `research_mphil_guide`(
        `user_id`, `mphil_guide_name`, `mphil_part_full_time`, `mphil_scholar_name`, `mphil_board_area_of_research`,
        `mphil_title_of_dissertation`, `mphil_status`) VALUES (?,?,?,?,?,?,?)");


    $stmt->bind_param("issssss", $user_id, $mphilgname, $mphiltime, $mphilname , $mphilarea, $mphiltitle, $mphilstatus);

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
    header("Location: research_guide.php");
            exit();

    $stmt->close();

  }


  //insert phd
  if (isset($_POST['btn2'])) {
    $phdgname=$_POST['phdgname'];
    $phdtime=$_POST['phdtime'];
    $phdname=$_POST['phdname'];
    $phdarea=$_POST['phdarea'];
    $phdtitle=$_POST['phdtitle'];
    $phdstatus=$_POST['phdstatus'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `research_phd_guide`(
        `user_id`, `phd_guide_name`, `phd_part_full_time`, `phd_scholar_name`, `phd_board_area_of_research`,
        `phd_title_of_dissertation`, `phd_status`) VALUES (?,?,?,?,?,?,?)");


    $stmt->bind_param("issssss", $user_id, $phdgname, $phdtime , $phdname, $phdarea, $phdtitle, $phdstatus);

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
    header("Location: research_guide.php");
            exit();

    $stmt->close();

  }

  if (isset($_POST['btn1'])) {
    $mphilgname=$_POST['mphilgname'];
    $mphiltime=$_POST['mphiltime'];
    $mphilname=$_POST['$mphilname'];
    $mphilarea=$_POST['mphilarea'];
    $mphiltitle=$_POST['mphiltitle'];
    $mphilstatus=$_POST['mphilstatus'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `research_mphil_guide` SET 
    `mphil_guide_name`=?, `mphil_part_full_time`=?, `mphil_scholar_name`=?, `mphil_board_area_of_research`=?,
    `mphil_title_of_dissertation`=?, `mphil_status`=? WHERE `user_id`=?");


$stmt->bind_param("ssssssi", $mphilgname, $mphiltime, $mphilname, $mphilarea, $mphiltitle, $mphilstatus,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: research_guide.php");
        exit();

$stmt->close();

}


if (isset($_POST['btn3'])) {
    $phdgname=$_POST['phdgname'];
    $phdtime=$_POST['phdtime'];
    $phdname=$_POST['phdname'];
    $phdarea=$_POST['phdarea'];
    $phdtitle=$_POST['phdtitle'];
    $phdstatus=$_POST['phdstatus'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `research_phd_guide` SET 
    `phd_guide_name`=?, `phd_part_full_time`=?, `phd_scholar_name`=?, `phd_board_area_of_research`=?,
    `phd_title_of_dissertation`=?, `phd_status`=? WHERE `user_id`=?");


$stmt->bind_param("ssssssi", $phdgname, $phdtime, $phdname, $phdarea, $phdtitle, $phdstatus,$user_id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: research_guide.php");
        exit();

$stmt->close();

}

}


//updated data from db
$query = "SELECT * FROM research_phd_guide WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "not found";
}

//updated data from db
$query = "SELECT * FROM research_mphil_guide WHERE user_id = '$user_id'";
$result1 = $conn->query($query);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
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
              
                  <center><h3>Research Guided</h3></center><br/>
                  <hr>
                  <br/> 
                     </div>
                      <div class="row">
                  <div class="col-sm-4 col-lg-3 mt-4 mt-lg-0 faculty"> <!-- faculty information -->
                   
                       
                        <form id="form" name="form" method="post" action="">
      <div class="row">
	  <h5>M.Phil. Guidance</h5>
				<hr>
        <div class="col-md-4">
          <div class="form-group">
            <label for="mphilgname">Guide name:</label>
            <input name="mphilgname" type="text" class="form-control" id="mphilgname" value="<?php echo $user['uname']; ?>">
          </div>
        </div>
		<div class="col-md-4">
          <div class="form-group">
            <label for="mphiltime">Part Time/Full Time</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="mphiltime" name="mphiltime" value="pt" <?php if ($row1['mphil_part_full_time'] == 'pt') echo 'checked'; ?>>
              <label class="form-check-label" for="pt">PT</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="mphiltime" name="mphiltime" value="ft" <?php if ($row1['mphil_part_full_time'] == 'ft') echo 'checked'; ?>>
              <label class="form-check-label" for="mphiltime">FT</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="mphilname">*Name Of Scholar:</label>
            <input name="mphilname" type="text" class="form-control" id="mphilname" value="<?php echo $row1['mphil_scholar_name']; ?>" >
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="mphilarea">*Board Area of Research:</label>
            <textarea class="form-control" name="mphilarea" id="mphilarea" ><?php echo $row1['mphil_board_area_of_research']; ?></textarea>
          </div>
        </div>
		<div class="col-md-4">
          <div class="form-group">
            <label for="mphiltitle">Title of Dissertation:</label>
            <textarea class="form-control" name="mphiltitle" id="mphiltitle" ><?php echo $row1['mphil_title_of_dissertation']; ?></textarea>
          </div>
        </div>
		<div class="col-md-4">
          <div class="form-group">
            <label for="mphilstatus">Status:</label>
            <select class="form-control" id="mphilstatus" name="mphilstatus" >
                <option value="">Select</option>
                <option value="registered" <?php if ($row1['mphil_status'] == 'registered') echo 'selected'; ?>>REGISTERED</option>
              <option value="ongoing" <?php if ($row1['mphil_status'] == 'ongoing') echo 'selected'; ?>>ONGOING</option>
              <option value="completed" <?php if ($row1['mphil_status'] == 'completed') echo 'selected'; ?>>COMPLETED</option>
            </select>
			<br><br>
          </div>
        </div>
		<div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <input name="btn1" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
			<br><br>
          </div>
        </div>
        </div>
		<h5>Ph.D. Guidance</h5>
				<hr>
        <div class="col-md-4">
          <div class="form-group">
            <label for="phdgname">Guide name:</label>
            <input name="phdgname" type="text" class="form-control" id="phdgname" value="<?php echo $user['uname']; ?>">
          </div>
        </div>
		<div class="col-md-4">
          <div class="form-group">
            <label for="phdtime">Part Time/Full Time</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="phdtime" name="phdtime" value="pt" <?php if ($row['phd_part_full_time'] == 'pt') echo 'checked'; ?>>
              <label class="form-check-label" for="phdtime">PT</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="phdtime" name="phdtime" value="ft" <?php if ($row['phd_part_full_time'] == 'ft') echo 'checked'; ?>>
              <label class="form-check-label" for="phdtime">FT</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="phdname">*Name Of Scholar:</label>
            <input name="phdname" type="text" class="form-control" id="phdname" value="<?php echo $row['phd_scholar_name']; ?>" >
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="phdarea">*Board Area of Research:</label>
            <textarea class="form-control" name="phdarea" id="phdarea" ><?php echo $row['phd_board_area_of_research']; ?></textarea>
          </div>
        </div>
		<div class="col-md-4">
          <div class="form-group">
            <label for="phdtitle">Title of Dissertation:</label>
            <textarea class="form-control" name="phdtitle" id="phdtitle" ><?php echo $row['phd_title_of_dissertation']; ?></textarea>
          </div>
        </div>
		<div class="col-md-4">
          <div class="form-group">
            <label for="phdstatus">Status:</label>
            <select class="form-control" id="phdstatus" name="phdstatus" >
                <option value="">Select</option>
                <option value="registered" <?php if ($row['phd_status'] == 'registered') echo 'selected'; ?>>REGISTERED</option>
              <option value="ongoing" <?php if ($row['phd_status'] == 'ongoing') echo 'selected'; ?>>ONGOING</option>
              <option value="completed" <?php if ($row['phd_status'] == 'completed') echo 'selected'; ?>>COMPLETED</option>
            </select>
			<br><br>
          </div>
        </div>
		<div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn2" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <input name="btn3" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
			<br><br>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <a href="course.php" class="btn btn-dark" role="button">Next</a>
          </div>
        </div>
        </div>
    </div>
    </form>
    <br>
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
