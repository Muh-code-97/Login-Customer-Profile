<?php
require('connection.inc.php');
require('functions.inc.php');

$msg = '';
//if click login button 
if(isset($_POST['submit'])){
  
  $email= get_safe_value($con, $_POST['email']);
  $password= get_safe_value($con, $_POST['password']);

  //get email and password form users 
  $sql= "SELECT * FROM users where email='$email' and password='$password'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  //check if user is registerd or not
  if($count>0){
    //will open customer profile 
    $_SESSION['CUSTOMER_LOGIN'] ='yes';
    $_SESSION['CUSTOMER_USERNAME'] =$username;
    header('location:profile_customer_en.php');

  }else{
    //if user not registerd
    $msg = "Please enter correct login detalis";
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login To Hexa Store</title>

  <!-- endinject -->
  <!-- add icon link -->
  <link rel="shortcut icon" href="images/icon_logo.png" />

  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="path-to/node_modules/mdi/css/materialdesignicons.min.css"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
  <!-- BOX ICONS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Fontawesome -->
  <script src="https:kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="login-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="brand-logo">
                      <img src="images/hexa-store-logo.png" alt="logo">
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>

                    <!--====== sign in  from======-->
                    <form class="pt-3" method = "post">
                      <!--email-->
                      <div class="form-group">
                        <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
                      </div>
                      <!--password-->
                      <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                      </div>
                      <!--Sign in button-->
                      <div class="field_error"><?php echo $msg?></div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">SIGN IN</button>
                      </div>
                      <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                        </div>
                        <!--Forgot password-->
                        <a href="#" class="auth-link text-black">Forgot password?</a>
                      </div>
                      <div class="mb-2">
                        <p>__________  or Sign in with  __________</p>
                        <button type="button" class="btn btn-social-icon btn-google btn-rounded"><i class="fab fa-google" ></i></button>

                      </div>
                      <div class="text-center mt-4 font-weight-light">
                        <!--Go to Sign up page-->
                        Don't have an account? <a href="register.html" class="text-primary">Create</a>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <div class="login-circle">
                      <img src="images/Login.svg" alt="login">
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
          </div>
        </div>
        
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>

</html>

