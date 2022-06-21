<!DOCTYPE html>
<html lang="en">
  
<head>
  <!-- Required meta tags -->
  <meta charset="u.tf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>My Profile</title>

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
  <link rel="stylesheet" type="text/css" href="css/vertical-layout-light/style.css">  

  <!-- BOX ICONS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Fontawesome -->
  <script src="https:kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--Dynamic Tabs-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

  <!--  Datatables  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
  

</head>
<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card d-none d-md-flex">
          <div class="col-3 grid-margin">
            <div class="card">
              <div class="card-body">
                <div class="text-center pb-4">
                  <img src="images/face-image/shop.png" alt="profile" class="img-lg mb-3">
                  <h3 class="title-name">Store Name</h3>
                </div>
                <div class="mb-3">
                    
                    <!--Customer Infromation-->
                    <label class="col-form-label"><i class='bx bx-target-lock bx-sm bx-border'></i> my Mylocation</label><br>
                    <label><i class='bx bxs-envelope bx-sm bx-border'></i> my email</label><br>
                    <label><i class='bx bxs-phone bx-sm bx-border' ></i> my phone</label><br>
                  </div>
                <div class="py-4">
                  <p>Ads</p>
                  <img src="images/ads/no-image-available-grid - Copy.jpg" alt="ads" style="width: 100%; height: 300px; background-color: cadetblue;">                                                              
                </div>
              </div>
            </div>
          </div>
          <div class="col-9 grid-margin">
            <div >
              <div>
                <div class="col-lg-12">
                  <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#info">Infomation</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#product">Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#orders">Orders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#">Link</a>
                    </li>
                  </ul>
                  <div class="tab-content" style="background-color: white;">
                    <div id="info" class="tab-pane active">
                      <?php include('store_information_en.php');?>
                    </div>
                    <div id="product" class="tab-pane">
                      <?php include('store_products_en.php');?>
                    </div>
                    <div id="dashboard" class="tab-pane">
                      <?php include('store_dashboard_en.php');?>
                    </div>
                    <div id="orders" class="tab-pane">
                      <h3>Menu 2</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane">
                      <h3>Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

  <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
  </script>
</body>

</html>

