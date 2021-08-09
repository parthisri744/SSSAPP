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
                       <div class="col-md-10 align-item-center mx-auto">
                    <div class="card shadow">
                    <div class="card-body bg-light">      
                    <div class="text-center">
                    <img src="../vendors/img/student-graduate.jpg " alt="Anna University Logo" >
                        <h3>Student Details</h3>
                     </div>
                     <div class="col-md-5 align-item-center mx-auto ">
                     <table class="table table-sm" >
                    <tbody>
                    <?php if(!empty($userdata)) { ?>
                        <?php  foreach($userdata as $studata){  ?>
                        <tr class="text-center">
                        <td>Student Name</td>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                        <td><?php echo $_SESSION['sname']  ?></td>
                        </tr>
                        <tr class="text-center">
                        <td>Register Number</td>
                        <td>&nbsp&nbsp&nbsp</td>
                        <td><?php echo $_SESSION['registerno']  ?></td>
                        </tr>
                        <tr class="text-center">
                        <td>Course</td>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                        <td><?php echo decrypt(base64_decode( $studata['course']),"UcEnSsS"); ?></td>
                        </tr>
                        <tr class="text-center">
                        <td>Course</td>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                        <td><?php echo $studata['branch'] ?></td>
                        </tr>
                        <tr class="text-center">
                        <td>Date of Birth</td>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                        <td><?php echo $studata['dob']  ?></td>
                        </tr>
                        <tr class="text-center">
                        <td>Email ID</td>
                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                        <td><?php echo $studata['email']  ?></td>
                        </tr>
                        <?php  } } ?>
                    </tbody >
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="Stu_name" id="Stu_name" value="<?php echo  $_SESSION['sname']  ?>">
                    <input type="hidden" name="stu_regno" id="stu_regno" value="<?php echo  $_SESSION['registerno']  ?>">
                    </form>
                    </table>
                    </div>
                    <div class="text-center">
                    <a href="Purchase.php" name="submit" class="btn btn-primary" >Confirm</a> <a href="../stuindex.php?temp=10a6ffc60e5f71be379d70dc20faefc5" class="btn btn-danger" >Cancel</a>
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
<script src="../vendors/js/Main.js"></script>
<link rel='stylesheet' href='../vendors/css/style.css'></link>  
</body>
<br /></br/> 
<div class="footer fixed-bottom bg-primary   ">
<div class="footer-copyright text-center py-3">© 202 Copyright:Parthiban
</div>
</div>
</html>
<!--sticky-buttom page-footer -->   