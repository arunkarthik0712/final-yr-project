<?php
session_start();

include('db.php'); // Replace with the actual path to your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['psword'];

    $query = "SELECT * FROM users WHERE email = ? AND psword = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Authentication successful, set session variable
        $_SESSION['user_id'] = $result->fetch_assoc()['user_id'];
        header("Location: personal.php"); // Redirect to the dashboard or another secured page
        exit();
    } else {
        $error_message = "Invalid email or password";
        echo "<script>alert('$error_message');</script>";
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
<script src="script.js"></script>
<!---ICONS---->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ui_styles.css">
    <style type="text/css">       
    body{
        font-family: "Poppins", sans-serif;
        color: white;

    }
    .login-container{
        width: 400px;
        margin: auto;
        padding: 30px;
        backdrop-filter: blur(17px) saturate(200%);
        -webkit-backdrop-filter: blur(17px) saturate(200%);
        background-color: rgba(190, 190, 190, 0.44);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.125);
        border-radius: 10px;
    }
    .title{
      text-align: center;
        color: #f0eaea;
        font-weight: 400;
    }
    .form{
      padding: 15px;
    }
    .form-group {
    position: relative;
    padding: 20px 0;
    margin: auto;
    max-width: 100%;
    }

    .form-group input {
        border: none;
        border-radius: 5px;
    font-size: 18px;
    padding: 10px ;
    display: block;
    width: 100%;
    }

    .form-group label {
    color: grey;
    font-size: 16px;
    font-weight: 100;
    position: absolute;
    pointer-events: none;
    top: 0;
    transform: translateY(30px);
    transition: all 0.2s ease-in-out;
    left: 10px;
    }

    .form-group input:valid,
    .form-group input:focus {
    border-bottom-color: #dddddd;
    outline: none;
    }

    .form-group input:valid + label,
    .form-group input:focus + label {
    color: rgb(247, 247, 247);
    font-size: 16px;
    transform: translateY(-2px);
    }
    .submit{
      background: #27ae60;
        padding: 7px 0;
        outline: none;
        font-size: 18px;
        width: 100%;
        margin: 17px 0;
        cursor: pointer;
        color: rgb(226, 224, 224);
        border-radius: 5px;
        transition: 0.1s;
        border: 1px solid #27ae60;
    }
    .submit:hover{
      background: none;
      color: #27ae60;
    }
    a{ /*globally*/
      text-decoration: none;
    }

    a:hover{ /*For all links*/
      color: white;
    }
</style>
    <title>Department of BCA</title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Glass Sidebar -->
         <nav class="col-md-2 d-none d-md-block glass-sidebar">
            <div class="sidebar-sticky">
                <br><br><br><br>
                <ul class="nav flex-column">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            Staff Details
                        </a>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            Login
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="col-md-10 ms-sm-auto col-lg-10 px-4 main-content">
            <!-- Your page content goes here -->
            <nav class="navbar navbar fixed-top">
      <div class="container-fluid">
         <div class="navbar-header">
            <h2><a href="index.html">Department of BCA</a></h2>
         </div>
   </nav>
   <br><br>
                  <!--Table-->
                  <br><br><br>
                   <div class="section-title">
                  <br/> 
                     </div>
                      <div class="row">
                  <div class="col-sm-4 col-lg-12 mt-4 mt-lg-0 faculty"> <!-- faculty information -->
                    <div class="login-container">
                        <div class="form">
                          <h3 class="title">Login</h3>
                          <hr>
                          <form method="post" action="" name="form">
                            <div class="form-group">
                              <input type="email" name="email" required/><label>Email</label>
                            </div>
                            <div class="form-group">
                              <input type="password" name="psword" required/><label>Password</label>
                            </div>
                            <input type="submit" value="Sign In" name="submit" class="submit"> 
                          </form>
                        </div>
                    </div>
                 </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>