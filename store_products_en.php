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

$msg='';

$sql="select * from product order by id desc";
//$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);

//active --- edit --- delete btn
if(isset($_GET['type']) && $_GET['type']!=''){
  $type= get_safe_value($con,$_GET['type']);
  
  if($type=='status'){
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if($operation=='active'){
          $status='1';
      }else{
          $status='0';
      }
      $update_status_sql="update product set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
  }

  if($type=='delete'){
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from product where id='$id'";
      mysqli_query($con,$delete_sql);
  }
  
}

?>
<div class="card-body">
  <div class="row" style="width: 100%;">
    <div class="col-lg-12">
      <h3>Product table</h3>
      <a href="manage_product_en.php" class="btn btn-primary float-left"><i class='bx bx-plus'></i>Add new product</a>
      <br><br>
    </div>
  </div>
  <div class="row" style="width: inherit;">
    <table id="example" class="col-lg-12 table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>#.</th>
          <th>Image</th>
          <th>Name</th>
          <th>price</th>
          <th>qty</th>
          <th>short description</th>
          <th>description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i=1;
        while($row=mysqli_fetch_assoc($res)){?>
        <tr>
          <td class="serial"><?php echo $i ?> </td>
          <td><img src="media/product/<?php echo $row['image'] ?>" alt=""></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['price'] ?></td>
          <td><?php echo $row['qty'] ?></td>
          <td><?php echo $row['short_desc'] ?></td>
          <td><?php echo $row['description'] ?></td>

          <td><?php 
              if($row['status']== 1){
                  echo "<span class='active_color'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
              }else{
                  echo "<span class='deactive_color'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
              }

              echo "<span class='btn-edit-datatable'><a href='manage_product_en.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
              
              echo "<span class='btn-edit-datatable'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";
              ?></td>
        </tr>
        <?php ++$i;} ?> 

      </tbody>
      <tfoot>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>short description</th>
            <th>price</th>
            <th>qty</th>
            <th>category</th>
            <th>MRP</th>
            <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

