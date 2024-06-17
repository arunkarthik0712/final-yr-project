<?php
include("start_session.php");
checkSession();
$user_id = $_SESSION['user_id'];
//previous data from db
$query = "SELECT * FROM personal_details WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}  else {
    // If no data is found, initialize an empty array
    $row = array(
        'mobile_number' => '',
        'date_of_birth' => '',
        'area_of_specialization' => '',
        'father_or_husband_name' => '',
        'email' => '',
        'address_for_communication' => '',
        'permanent_address' => '',
        'nationality' => '',
        'religion' => '',
        'community' => '',
        'languages_known' => '',
        'marital_status' => '',
        'additional_responsibilities' => '',
        'physically_challenged' => '',
        'hobbies' => ''
    );
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  //insert
  if (isset($_POST['btn'])) {
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $area=$_POST['area'];
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $paddress=$_POST['paddress'];
    $national=$_POST['national'];
    $religion=$_POST['religion'];
    $community=$_POST['community'];
    $language=$_POST['language'];
    $status=$_POST['status'];
    $response=$_POST['response'];
    $challenged=$_POST['challenged'];
    $hobbies=$_POST['hobbies'];


    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `personal_details`(
    `user_id`, `mobile_number`, `date_of_birth`, `area_of_specialization`, `father_or_husband_name`,
    `email`, `address_for_communication`, `permanent_address`, `nationality`, `religion`,
    `community`, `languages_known`, `marital_status`, `additional_responsibilities`,
    `physically_challenged`, `hobbies`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


$stmt->bind_param("isssssssssssssss", $user_id, $mobile, $dob, $area, $fname, $email, $address,
    $paddress, $national, $religion, $community, $language, $status, $response, $challenged, $hobbies);

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

$stmt->close();

  }

  //update
  if (isset($_POST['btn1'])) {
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $area=$_POST['area'];
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $paddress=$_POST['paddress'];
    $national=$_POST['national'];
    $religion=$_POST['religion'];
    $community=$_POST['community'];
    $language=$_POST['language'];
    $status=$_POST['status'];
    $response=$_POST['response'];
    $challenged=$_POST['challenged'];
    $hobbies=$_POST['hobbies'];


    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `personal_details` SET 
    `mobile_number`=?, `date_of_birth`=?, `area_of_specialization`=?, `father_or_husband_name`=?,
    `email`=?, `address_for_communication`=?, `permanent_address`=?, `nationality`=?, `religion`=?,
    `community`=?, `languages_known`=?, `marital_status`=?, `additional_responsibilities`=?,
    `physically_challenged`=?, `hobbies`=? WHERE `user_id`=?");


$stmt->bind_param(
    "sssssssssssssssi",
    $mobile, $dob, $area, $fname, $email, $address,
    $paddress, $national, $religion, $community, $language, $status,
    $response, $challenged, $hobbies, $user_id
);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('updated successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();

  }

  //delete
  if (isset($_POST['btn2'])) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM `personal_details` WHERE `user_id`=?");
        $stmt->bind_param("i", $user_id);

        // Execute the statement
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: personal.php");
        exit();

        $stmt->close();
    }
}


//updated data from db
$query = "SELECT * FROM personal_details WHERE user_id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
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
    <title>Department of BCA</title>
    <style type="text/css">
      .user{
        display: inline-flex;
        color: lightgray;
        font-weight: 400;
        font-size: 18px;
        padding: 1px;
        text-align: center;
      }
      .user h6{
        padding: 10px;
      }
    </style>
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
                  <!--Table-->
                  <br><br>
                  <?php
                  //fetch session data 
                  $query = "SELECT * FROM users WHERE user_id = '$user_id'";
                  $result = $conn->query($query);

                  if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                  } else {
                    echo "not found";
                  }
                  ?>
            <div class="user"><h6>Name : <?php echo $user['uname']; ?> </h6><h6>Desgination : <?php echo $user['designation'];?></h6> <h6>Department : <?php echo $user['department'];?></h6></div>

                   <div class="section-title">
              
                  <center><h3>Personal Details</h3></center><br/>
                  <hr>
                  <br/> 
                     </div>
                      <div class="row">
                  <div class="col-sm-4 col-lg-3 mt-4 mt-lg-0 faculty"> <!-- faculty information -->
                   
                       
                        <form id="form" name="form" method="post" action="">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="mobile">*Mobile Number</label>
            <input name="mobile" type="text" class="form-control" id="mobile" maxlength="10"value="<?php echo $row['mobile_number']; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="dob">*Date of Birth</label>
            <input name="dob" type="date" class="form-control" id="dob" value="<?php echo $row['date_of_birth']; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="area">*Area of Specialization</label>
            <input name="area" type="text" class="form-control" id="area" value="<?php echo $row['area_of_specialization']; ?>" required>
            <br>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="fname">*Name of Father/Husband</label>
            <input name="fname" type="text" class="form-control" id="fname" value="<?php echo $row['father_or_husband_name']; ?>" required>
			<br>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="email">*Email</label>
            <input name="email" type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="address">*Address for Communication</label>
            <textarea class="form-control" name="address" id="address" required><?php echo $row['address_for_communication']; ?></textarea>
            <br>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="form-check">
                <input class="form-check-input small" type="checkbox" id="sameAddressCheckbox">
                <label class="form-check-label small" for="sameAddressCheckbox">Same as Communication Add</label>
            </div>
            <label for="paddress">*Permanent Address</label>
            <textarea class="form-control" name="paddress" id="paddress" required><?php echo $row['permanent_address']; ?></textarea>
            <br>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="national">Nationality</label>
            <input name="national" type="text" class="form-control" id="national" value="<?php echo $row['nationality']; ?>" required>
			<br><br>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="religion">Religion</label>
            <select class="form-control" id="religion" name="religion" required>
                <option value="">Select</option>
              <option value="Hindu" <?php if ($row['religion'] == 'Hindu') echo 'selected'; ?> >Hindu</option>
              <option value="Christian" <?php if ($row['religion'] == 'Christian') echo 'selected'; ?> >Christian</option>
              <option value="Muslim" <?php if ($row['religion'] == 'Muslim') echo 'selected'; ?> >Muslim</option>
              <option value="Others" <?php if ($row['religion'] == 'Others') echo 'selected'; ?> >Others</option>
            </select>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="challenged">*Community</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="sc" name="community" value="SC" <?php if ($row['community'] == 'SC') echo 'checked'; ?> required>
              <label class="form-check-label" for="sc">SC</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="st" name="community" value="ST" <?php if ($row['community'] == 'ST') echo 'checked'; ?> required>
              <label class="form-check-label" for="st">ST</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="mbc" name="community" value="MBC/DNC" <?php if ($row['community'] == 'MBC/DNC') echo 'checked'; ?> required>
              <label class="form-check-label" for="mbc">MBC/DNC</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="bc" name="community" value="BC" <?php if ($row['community'] == 'BC') echo 'checked'; ?> required>
              <label class="form-check-label" for="bc">BC</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="others" name="community" value="OTHERS" <?php if ($row['community'] == 'OTHERS') echo 'checked'; ?> required>
              <label class="form-check-label" for="others">OTHERS</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="language">*Languages Known</label>
            <input name="language" type="text" class="form-control" id="language" value="<?php echo $row['languages_known']; ?>" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="status">Marital Status</label>
            <div>
              <input type="radio" id="married" name="status" value="married" <?php if ($row['marital_status'] == 'married') echo 'checked'; ?>>
              <label for="married">married</label>
            </div>
            <div>
              <input type="radio" id="single" name="status" value="single" <?php if ($row['marital_status'] == 'single') echo 'checked'; ?>>
              <label for="single">single</label>
            </div>
            <div>
              <input type="radio" id="divorced" name="status" value="Divorced" <?php if ($row['marital_status'] == 'Divorced') echo 'checked'; ?>>
              <label for="divorced">Divorced</label>
            </div>
          </div>
        </div>
      <div class="col-md-4">
          <div class="form-group">
            <label for="response">*Additional Responsibilities</label>
            <textarea name="response" class="form-control" id="response" required><?php echo $row['additional_responsibilities']; ?></textarea>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="challenged">Physically Challenged</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="yes" name="challenged" value="Yes" <?php if ($row['physically_challenged'] == "Yes") echo 'checked'; ?>>
              <label class="form-check-label" for="yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="no" name="challenged" value="No" <?php if ($row['physically_challenged'] == "No") echo 'checked'; ?>>
              <label class="form-check-label" for="no">No</label>
            </div>
          </div>
        </div>
       <div class="col-md-4">
          <div class="form-group">
            <label for="hobbies">Hobbies</label>
            <input name="hobbies" type="text" class="form-control" id="hobbies" value="<?php echo $row['hobbies']; ?>">
            <br><br><br>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <input name="btn1" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
            <a href="academic.php" class="btn btn-dark" role="button">Next</a>
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
                                 </div></div></div> </div>
        </main>
    </div>
</div>
<script type="text/javascript">
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

document.getElementById('sameAddressCheckbox').addEventListener('change', function () {
        var communicationAddress = document.getElementById('address').value;
        var permanentAddressField = document.getElementById('paddress');

        if (this.checked) {
            permanentAddressField.value = communicationAddress;
        } else {
            permanentAddressField.value = '';
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
