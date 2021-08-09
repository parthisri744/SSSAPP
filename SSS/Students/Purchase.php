<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
spl_autoload_register(function($className) {
           require_once "../Model/".$className.".php";
});
$obj=new StuModel();
$userdata =$obj->student_details();
function decrypt($ivHashCiphertext, $password) {
    $method = "AES-256-CBC";
    $iv = substr($ivHashCiphertext, 0, 16);
    $hash = substr($ivHashCiphertext, 16, 32);
    $ciphertext = substr($ivHashCiphertext, 48);
    $key = hash('sha256', $password, true);
    if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;
    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head> 
<title>SSS</title>
<body ng-app="ucensss" ng-controller="sssctrl" >
<div><?php  require_once("../Navigation/stuNavigation.php");  ?></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">       
                    <div class="text-center">
                        <h3>University College Of Engineering Nagercoil</h3>
                        <h4>STUDENT STATIONERY SHOP</h4>
                        </div>
                       <div class="col-md-12 align-item-center mx-auto">
                    <div class="card shadow">
                    <div class="card-body ">      
                    <div class="text-center">
                    <img src="../vendors/img/purchases.gif" width="200px" height="200px" alt="Anna University Logo" >
                        <h3>Purchase Products</h3>
                     </div>
                     <div class="container-fluid">
                    <form method="post" id="insert_form">
                        <div class="table-repsonsive">
                        <span id="error"></span>
                        <table class="table table-bordered" id="item_table">
                        <tr>
                        <th>Enter Product Name</th>
                        <th>Enter Product Quantity</th>
                        <th><button type="button" name="add" class="btn btn-success btn-sm add">Add</button></th>
                        </tr>
                        </table>
                        <div align="center">
                        <input type="submit" name="submit" class="btn btn-info" value="Add Product" />
                        </div>
                    </div>
                    </form>
                    </div>
                   </div>             
               </div>
            </div><br/><br/><br/>
         </div>
        </div>
      </div>
     </div>
   </div>
 </div>
 <script>
$(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select name="product_name[]" class="form-control product_name"><option value="">Select Product</option><?php echo $obj->fill_unit_select_box(); ?></select></td>';
  html += '<td><input type="text" name="product_quantity[]" class="form-control product_quantity[" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove">Remove</button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  var form_data = $(this).serialize();
  //console.log("Form Data :"+form_data);

   $.ajax({
    url:"Model/Ajaxinsert.php?functionname=insertproduct&id",
    method:"POST",
    data:{form_data:form_data},
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
 });
</script>
<script src="../vendors/js/Main.js"></>
<link rel='stylesheet' href='../vendors/css/style.css'></link>  
</body>
<br /></br/> 
<div class="footer fixed-bottom bg-primary   ">
<div class="footer-copyright text-center py-3">© 202 Copyright:Parthiban
</div>
</div>
</html>
<!--sticky-buttom page-footer -->