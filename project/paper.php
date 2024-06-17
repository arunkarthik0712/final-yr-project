<?php
include("start_session.php");
checkSession();
$user_id = $_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  //insert
  if (isset($_POST['btn'])) {
    $paper=$_POST['paper'];
    $name=$_POST['name'];
    $sponsored=$_POST['sponsored'];
    $organized=$_POST['organized'];
    $place=$_POST['place'];
    $level=$_POST['level'];
    $fdate=$_POST['fdate'];
    $todate=$_POST['todate'];
    
    // Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `research_paper_presented`(`user_id`, `title_of_paper`, `name_of_conf`, `sponsored_by`, `organized_by`, `place`, `conference_level`, `date_from`, `date_to`) VALUES (?,?,?,?,?,?,?,?,?)");


$stmt->bind_param("issssssss", $user_id, $paper, $name, $sponsored, $organized, $place, $level,$fdate,$todate);

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
header("Location: paper.php");
        exit();
$stmt->close();

}

if (isset($_POST['btn1'])) {
        $update_course_id = $_POST['update_course_id'];
        $paper=$_POST['paper'];
        $name=$_POST['name'];
        $sponsored=$_POST['sponsored'];
        $organized=$_POST['organized'];
        $place=$_POST['place'];
        $level=$_POST['level'];
        $fdate=$_POST['fdate'];
        $todate=$_POST['todate'];

        $updateStmt = $conn->prepare("UPDATE `research_paper_presented` SET `title_of_paper`=?,`name_of_conf`=?,`sponsored_by`=?,`organized_by`=?,`place`=?,`conference_level`=?,`date_from`=?,`date_to`=?
            WHERE `user_id`=? AND `paper_id`=?");

        $updateStmt->bind_param("ssssssssii",$paper, $name, $sponsored, $organized, $place, $level,$fdate,$todate,$user_id, $update_course_id);

        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            echo "<script>alert('Updated successfully');</script>";
        } else {
            echo "Error updating record: " . $updateStmt->error;
        }
        header("Location: paper.php");
        exit();
        $updateStmt->close();
    }



//delete
 if (isset($_POST['btn2'])) {
        $delete_course_id = $_POST['delete_course_id'];
        $stmt = $conn->prepare("DELETE FROM `research_paper_presented` WHERE `user_id`=? AND `paper_id`=?");
        $stmt->bind_param("ii", $user_id, $delete_course_id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Deleted successfully');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        header("Location: paper.php");
        exit();
        $stmt->close();
    }

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
<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
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
      .table {
    border-collapse: collapse;
    
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
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
   $user_id = $_SESSION['user_id'];
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
              
                  <center><h3>Research Paper Presented With Details</h3></center><br/>
                  <hr>
                  <br/> 
                     </div>
                      <div class="row">
                  <div class="col-sm-4 col-lg-3 mt-4 mt-lg-0 faculty"> <!-- faculty information -->
                   
                       
                        <form id="form" name="form" method="post" action="">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="paper">Title Of The Paper</label>
            <input name="paper" type="text" class="form-control" id="paper" required >
          </div>
        </div>
		<div class="col-md-6">
          <div class="form-group">
            <label for="name">Name Of The CONF</label>
            <input name="name" type="text" class="form-control" id="name" required >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="sponsored">Sponsored By</label>
            <input name="sponsored" type="text" class="form-control" id="sponsored" >
          </div>
        </div>
		<div class="col-md-3">
          <div class="form-group">
            <label for="organized">Organized By</label>
            <input name="organized" type="text" class="form-control" id="organized" required>
			<br><br>
          </div>
        </div>
		<div class="col-md-3">
          <div class="form-group">
            <label for="place">Place</label>
            <input name="place" type="text" class="form-control" id="place" required>
			<br><br>
          </div>
        </div>
		<div class="col-md-3">
          <div class="form-group">
            <label for="level">Conference Level</label>
            <select class="form-control" id="level" name="level" required>
              <option value="">Select</option>
			  <option value="College">College</option>
              <option value="University">University</option>
              <option value="Regional">Regional</option>
              <option value="State">State</option>
              <option value="National">National</option>
              <option value="International">International</option>
            </select>
			<br><br>
          </div>
        </div>
		<div class="col-md-5">
          <div class="form-group">
            <label for="fdate">Date From</label>
            <input name="fdate" type="date" class="form-control" id="fdate" >
			<br><br>
          </div>
        </div>
		<div class="col-md-5">
          <div class="form-group">
            <label for="todate">To</label>
            <input name="todate" type="date" class="form-control" id="todate">
			<br><br>
          </div>
        </div>
		<div class="col-md-2">
          <div class="form-group">
		  <br>
            <div>
              <input type="checkbox" id="one" name="one" value="oneday">
              <label for="one">One Day</label>
            </div>
          </div>
        </div>
		<div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input name="btn" type="submit" id="btn" value="Add" class="btn btn-outline-success">
            <button type="button" class="btn btn-outline-primary update-btn" data-toggle="modal" data-target="#viewModal">Update/View</button>
			<a href="journal.php" class="btn btn-dark" role="button">Next</a>
			<br>
          </div>
        </div>
        </div>
    </div>
    </form>
    <br>

<div class="container">
<div id="viewModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Details</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm" id="conferenceTable">
         <thead class="table-primary">
                  <tr>
                    <th> </th>
                    <th>Title</th>
                    <th>Name_of_conf</th>
                    <th>Sponsored_by</th>
                    <th>Organized_by</th>
                    <th>Place</th>
                    <th>Level</th>
                    <th>Date_from</th>
                    <th>Date_to</th>
                    <th>Action</th>
                  </tr>
                </thead>
          <tbody>
              <?php
              $query = "SELECT * FROM research_paper_presented WHERE user_id = '$user_id' ORDER BY date_from DESC, date_to DESC";
              $result = $conn->query($query);
              $i=1;
              if (mysqli_num_rows($result)>0) {
                foreach ($result as $row) {
                  ?>
                  <tr>
                    <td><?=$i; ?></td>
                    <td><?=$row['title_of_paper'];?></td>
                    <td><?=$row['name_of_conf'];?></td>
                    <td><?=$row['sponsored_by'];?></td>
                    <td><?=$row['organized_by'];?></td>
                    <td><?=$row['place'];?></td>
                    <td><?=$row['conference_level'];?></td>
                    <td><?=$row['date_from'];?></td>
                    <td><?=$row['date_to'];?></td>
                    <td>
                      <input type="hidden" name="selected_id" value="<?=$row['paper_id'];?>">
                      <button type="button" class="btn btn-outline-primary update-btn btn-sm" data-toggle="modal" data-target="#myModal" >Update</button>
                      <button type="button" class="btn btn-outline-danger delete-btn btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    </td>
                  </tr>

                  <?php
                  $i++;
                }
              }
              ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>
  </div>
</div>
</div>


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
          <input type="hidden" name="delete_course_id" id="delete_course_id">
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

<div class="container">

<!-- update Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Details</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <input type="hidden" name="update_course_id" id="update_course_id">
        <div class="row">
          
          <div class="col-md-6">
          <div class="form-group">
            <p>Title Of The Paper</p>
            <input name="paper" type="text" class="form-control" id="paper" required >
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <p>Name Of The CONF</p>
            <input name="name" type="text" class="form-control" id="name" required >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <p>Sponsored By</p>
            <input name="sponsored" type="text" class="form-control" id="sponsored" >
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <p>Organized By</p>
            <input name="organized" type="text" class="form-control" id="organized" required>
            <br><br>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <p>Place</p>
            <input name="place" type="text" class="form-control" id="place" required>
            <br><br>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <p>Conference Level</p>
            <select class="form-control" id="level" name="level" required>
              <option value="">Select</option>
              <option value="College">College</option>
              <option value="University">University</option>
              <option value="Regional">Regional</option>
              <option value="State">State</option>
              <option value="National">National</option>
              <option value="International">International</option>
            </select>
            <br><br>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <p>Date From</p>
            <input name="fdate" type="date" class="form-control" id="fdate" >
            <br><br>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <p>To</p>
            <input name="todate" type="date" class="form-control" id="todate">
            <br><br>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
          <br>
            <div>
              <input type="checkbox" id="one" name="one" value="oneday">
              <p>One Day</p>
            </div>
          </div>
        </div>
      
      <div class="modal-footer">
        <input name="btn1" type="submit" id="btn1" value="Update" class="btn btn-outline-primary">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
  </div>
  
</div>

<script type="text/javascript">
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}


$('.update-btn').on('click', function () {
    var course_id = $(this).closest('tr').find('input[name="selected_id"]').val();
    $('#update_course_id').val(course_id);
});


$('.delete-btn').on('click', function () {
        var course_id = $(this).closest('tr').find('input[name="selected_id"]').val();
        $('#delete_course_id').val(course_id);
    });

$(document).ready(function () {
      $('#conferenceTable').DataTable();
    });

$('#one').change(function () {
        if (this.checked) {
            $('#todate').val($('#fdate').val());
        } else {
            $('#todate').val('');
        }
    });

    $('#fdate').change(function () {
        if (!$('#one').prop('checked')) {
            $('#todate').val('');
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
