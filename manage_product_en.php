<?php
require('connection.inc.php');
require('functions.inc.php');



$categories_id='';
$name='';
$mrp='OMR';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_description='';
$meta_keyword='';
$product_color='';
$product_size='';

$msg='';
$image_required = 'required';
if(isset($_GET['id']) && $_GET['id']!=''){
  $id = get_safe_value($con, $_GET['id']);
  $res =mysqli_query($con, "select * from product where id='$id'");
  $check = mysqli_num_rows($res);
  if($check > 0){
    $row = mysqli_fetch_assoc($res);

    $name = $row['name'];
    $mrp = $row['mrp'];
    $price = $row['price'];
    $qty = $row['qty'];
    $short_desc = $row['short_desc'];
    $description = $row['description'];
    $meta_title = $row['meta_title'];
    $meta_description = $row['meta_desc'];
    $meta_keyword = $row['meta_key'];

  }else {
    header('location:store_products_en.php');
    die();
  }
}

if(isset($_POST['submit'])){
  
  $name = get_safe_value($con,$_POST['name']);
  $price = get_safe_value($con,$_POST['price']);
  $qty = get_safe_value($con,$_POST['qty']);
  $short_desc = get_safe_value($con,$_POST['short_desc']);
  $description = get_safe_value($con,$_POST['description']);
  $meta_title = get_safe_value($con,$_POST['meta_title']);
  $meta_description = get_safe_value($con,$_POST['meta_description']);
  $meta_keyword = get_safe_value($con,$_POST['meta_keyword']);
  $product_color = get_safe_value($con,$_POST['color-checkbox']);
  $product_size = get_safe_value($con,$_POST['size-checkbox']);

  $res = mysqli_query($con, "select * from product where name='$name'");
  $check=mysqli_num_rows($res);
  if($check>0){
    if(isset($_GET['id']) && $_GET['id']!=''){
      $getData = mysqli_fetch_assoc($res);
      if($id==$getData['id']){

      }else{
        $msg ="Product already exist";
      }
    }else{
      $msg ="Product already exist";
    }
  }

  if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/png' || 
  $_FILES['image']['type']!='image/jpg' || $_FILES['image']['type']!='image/jpeg')){
    $msg = "Please select only png, jpg and jpeg image formate";
  }

  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){

      //update info if already insert
      if($_FILES['image']['name']!=''){
        $image = rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'media/product/'.$image);
        $update_sql ="update product set name='$name', price='$price', qty='$qty', short_desc='$short_desc', description='$description', meta_title='$meta_title', meta_desc='$meta_description', meta_key='$meta_keyword', image='$image' where id='$id'";
      }else{
        $update_sql ="update product set name='$name', price='$price', qty='$qty', short_desc='$short_desc', description='$description', meta_title='$meta_title', meta_desc='$meta_description', meta_key='$meta_keyword' where id='$id'";
      }

      mysqli_query($con,$update_sql);
    }else {

      $image = rand(111111111,999999999).'_'.$_FILES['image']['name'];
      // Now let's move the uploaded image into the folder: image
      move_uploaded_file($_FILES['image']['tmp_name'],'media/product/'.$image);
      //insert product info to product table 
      mysqli_query($con,"insert into product(image, name, mrp, price, qty, short_desc, description, meta_title, meta_desc, meta_key, status) VALUES ('$image', '$name', 'OMR', '$price', '$qty', '$short_desc', '$description', '$meta_title', '$meta_description', '$meta_keyword', '1')");
    }
    
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add product</title>

  <!-- endinject -->
  <!-- add icon link -->
  <link rel="shortcut icon" href="images/icon_logo.png" />

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
  <!-- BOX ICONS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Fontawesome -->
  <script src="https:kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!--Font Awesome Icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

  <!--tinymce-->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

  <link href="clean-switch.css" rel="stylesheet">

  <!--Image Uploading Style sheet-->
  <link rel="stylesheet" href="images.css">


 </head>
 <body>
 </body>
</html>
</head>
<body>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2>+ Add new product</h2>
              <!--====== add product form======-->
              <form class="form-sample" method="post" enctype="multipart/form-data">
                <br><hr style="height: 3px; background-color: #1d4d4f;">
                <h3>Basic Information</h3>
                <div class="row">
                  <!-- product Name-->
                  <div class="col-md-12">
                    <div class="form-group">
                    <div class="col-sm-12">
                      <input name="name" type="text" class="form-control form-control-lg" placeholder="Product Name" required value="<?php echo $name?>">
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <!-- Price-->
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="input-group">
                          <input type="text" name="price" class="form-control" placeholder="Price in OMR" aria-label="Amount (to the nearest dollar)" required value="<?php echo $price?>">
                          <div class="input-group-prepend">
                            <span class="input-group-text">OMR</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <!-- Quantity-->
                    <div class="form-group">
                      <label class="col-sm-4 col-form-label" style="float: left; width: 30%;" >Quantity</label>
                        <input name="qty" type="number" class="form-control form-control-lg" style=" float: left; width: 30%;" required value="<?php echo $qty?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- short description-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea name="short_desc" cols="36" rows="2" class="form-control form-control-lg" placeholder="Short Description about Your Product" required><?php echo $short_desc?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- color-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <h5 for="color">Choose Your Prodect Colors From the List</h5> <br>
                        <div style="width: 15%; float: left;" class="col-md-5">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="white" >
                        <label class="form-check-label" for="flexCheckDefault">White</label>
                        </div>
                        <div style="width: 15%; float: left;" class="col-md-4">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="black" >
                        <label class="form-check-label" for="flexCheckDefault">Black</label>
                        </div>
                        <div style="width: 15%; float: left;" class="col-md-4">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="blue" >
                        <label class="form-check-label" for="flexCheckDefault">Blue</label>
                        </div>
                        <div style="width: 15%; float: left;" class="col-md-4">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="red" >
                        <label class="form-check-label" for="flexCheckDefault">Red</label>
                        </div>
                        <div style="width: 15%; float: left;" class="col-md-4">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="green" >
                        <label class="form-check-label" for="flexCheckDefault">Green</label>
                        </div>
                        <div style="width: 15%; float: left;" class="col-md-4">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="yellow" >
                        <label class="form-check-label" for="flexCheckDefault">Yellow</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                                      <!--Colors-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div style="width: 15%; float: left;" class="col-md-4">
                        <input class="form-check-input" name="color-checkbox" type="checkbox" value="other">
                        <label class="form-check-label" for="flexCheckDefault">Other, please spacify</label>
                        </div><br><br>
                        <div>
                        <textarea name="short_desc" name="product_color" cols="36" rows="2" class="form-control form-control-lg" placeholder="Please list the colors of yor product in the format: color1,color2,..." required><?php echo $short_desc?></textarea>
                        </div>
                    </div><br>
                <div class="row">
                    <!--sizes-->
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <h5 for="color">Select One of the Options below</h5>
                        <div style="width: 30%; float: left;" class="col-md-7">
                        <input class="form-check-input" name="size-checkbox" type="checkbox" value="differant-sizes">
                        <label class="form-check-label" for="flexCheckDefault">My Product Come in Defferant Sizes, Pleas spasify</label>
                        </div>
                        <div style="width: 30%; float: left;" class="col-md-7">
                        <input class="form-check-input" name="size-checkbox" type="checkbox" value="one_size" >
                        <label class="form-check-label" for="flexCheckDefault" style="color: red;">My product Does Not Come in Defferant Sizes</label>
                        </div><br><br>
                        <div>
                        <textarea name="short_desc" name="product_color" cols="36" rows="2" class="form-control form-control-lg" placeholder="Please list the Sizes of yor product in the format: size1,size2,..." required><?php echo $short_desc?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                    <br>
                <div class="row" >
                <!-- Images-->
                  <div class="col-md-12">
                    <div class="col-sm-12">
                      <input type="file" id="file-input" style="display: none;" name="image" accept="image/png, image/jpeg" onchange="preview()" multiple required value="<?php echo $image_required ?>">
                      <label for="file-input" class="btn btn-primary" style="display:block; position: relative; background-color:#1d4d4f; width: 200px; padding: 10px 0; margin: auto;">
                          <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                      </label>
                      <p id="num-of-files" style="text-align: center; margin: 20px 0 30px 0;">No Files Chosen</p>
                      <div id="images" style="width: 100%; position: relative; margin: auto; display:flex; justify-content: center; gap: 10px; flex-wrap: wrap;"></div>
                    </div>
                  </div>
                </div>
                
                </div>
                <br><hr style="height: 3px; background-color: #1d4d4f;">
                <h3>Delivery Information</h3>
                <div class="row">
                  <!-- Areas-->
                  <div class="col-md-5">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" placeholder="Areas" class="form-control form-control-lg">
                      </div>
                    </div>
                  </div>
                  <!-- Time-->
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="col-sm-3 col-form-label" style="float: left; width: 20%;">Date</label>
                      <div class="col-sm-12">
                        <input type="date" class="form-control form-control-lg" style="float: left; width: 70%;">
                      </div>
                    </div>
                  </div>
                  <!-- price-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="input-group">
                        <input name="sale-price" type="number" placeholder="Price of Deleviry In OMR" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <div class="input-group-prepend">
                              <span class="input-group-text">OMR</span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br><hr style="height: 3px; background-color: #1d4d4f;">
                <h3>Meta Information<</h3>
                <div class="row">
                  <!-- Meta Title-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea name="meta_title" placeholder="Meta Title" class="form-control form-control-lg" required><?php echo $meta_title?></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- Meta Description-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea name="meta_description" placeholder="Meta Description" class="form-control form-control-lg" required><?php echo $meta_description?></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- Meta keyword-->
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control form-control-lg" required><?php echo $meta_keyword?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <br><hr style="height: 3px; background-color: #1d4d4f;">
                <h3>Discount Information<</h3>
                <div class="row">
                  <div class="col-md-6">
                    <!-- Discount-->
                    <div class="form-group">
                      <div class="col-sm-11">
                        <div class="input-group">
                          <input name="discount" type="number" placeholder="Discount" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <!--Sale price-->
                    <div class="form-group">
                      <div class="col-sm-11">
                        <div class="input-group">
                          <input name="sale-price" type="number" placeholder="Sale Price" class="form-control" aria-label="Amount (to the nearest dollar)">
                          <div class="input-group-prepend">
                            <span class="input-group-text">OMR</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <code><?php echo $msg; ?></code>
                <br>
                <div class="col-md-6">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" name="cancel" class="btn btn-secondary">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
      let fileInput = document.getElementById("file-input");
      let imageContainer = document.getElementById("images");
      let numOfFiles = document.getElementById("num-of-files");

      function preview(){
          imageContainer.innerHTML = "";
          numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

          for(i of fileInput.files){
              let reader = new FileReader();
              let figure = document.createElement("figure");
              let figCap = document.createElement("figcaption");
              figCap.innerText = i.name;
              figure.appendChild(figCap);
              reader.onload=()=>{
                  let img = document.createElement("img");
                  img.setAttribute("src",reader.result);
                  figure.insertBefore(img,figCap);
              }
              imageContainer.appendChild(figure);
              reader.readAsDataURL(i);
          }
      }
  </script>

</body>

</html>

