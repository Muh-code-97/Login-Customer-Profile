<nav class="navbar navbar-light navbar-expand-md fixed-top bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="images/hexa-store-logo.png" style="width: 30%;" alt="logo"></a>
      <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav text-center text-dark ml-auto">
              <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contact</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" href="#">About us</a></li>
          </ul>
          <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class='bx-fw bx bx-search-alt bx-sm' ></i></a></li>
                <li class="nav-item" role="presentation">
                    <div class="dropdown">
                        <?php 
                            if(isset($_SESSION['USER_LOGIN'])){
                                echo "<a class='dropbtn' href='profile_customer_en.php'><i class='bx bx-user-circle bx-md'></i></a>";
                                echo "
                                <div class='dropdown-content'>
                                    <a class='dropdown-item' href='profile_customer_en.php'>
                                        <i class='ti-settings text-primary'></i>
                                        Profile
                                    </a>
                                    <a class='dropdown-item' href='logout.php'>
                                        <i class='ti-power-off text-primary'></i>
                                        Logout
                                    </a>
                                </div>
                                ";
                            }else{
                                echo "<a class='btn rounded-pill btn-main py-2 px-4' href='login_cutomer_en.php'>Sign up</a>";
                            }
                        ?>
                    </div>
                </li>
          </ul>
      </div>
    </div>
</nav>
