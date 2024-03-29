<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {
    $eid=$_SESSION['uid'];
      $emp1name=$_POST['emp1name'];
    $emp1des=$_POST['emp1des'];
    $employer1Specification=$_POST['employer1Specification'];
    $employer1WorkDuration=$_POST['employer1WorkDuration'];
    
    
     $query=mysqli_query($con, "insert into empexpireince ( EmpID,Employer1Name, Employer1Designation, employer1Specification,  employer1WorkDuration) value('$eid','$emp1name', '$emp1des', '$employer1Specification', '$employer1WorkDuration' )");
    if ($query) {
    $msg="Your Expirence data has been submitted succeesfully.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Experience</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">My Experience</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php 
$empid=$_SESSION['uid'];
$query=mysqli_query($con,"select * from empexpireince where EmpID=$empid");
$row=mysqli_fetch_array($query);
if($row>0)
{

?>
<p style="font-size:16px; color:red" align="center">Your Experience details already added. Now you can only edit the record. </p>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th> Employer  Name</th>
  <td><?php echo $row['Employer1Name'];?></td>
</tr>
<tr>
  <th> Employer Designation</th>
  <td><?php echo $row['Employer1Designation'];?></td>
</tr>
<tr>
  <th> Employer Specification</th>
  <td><?php echo $row['employer1Specification'];?></td>
</tr>
<tr>
  <th> Employer Work Duration</th>
  <td><?php echo $row['employer1WorkDuration'];?></td>
</tr>

</table>




<?php } else {?>

<form class="user" method="post" action="">
 
               <div class="row">
                <div class="col-4 mb-3">Employer Name</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="emp1name" name="emp1name" aria-describedby="emailHelp" value=""></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Employer Designation </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="emp1des" name="emp1des" aria-describedby="emailHelp" value=""></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Employer Specification </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="employer1Specification" name="employer1Specification" aria-describedby="emailHelp" value=""></div>
                    </div>

                     <div class="row">
                      <div class="col-4 mb-3">Employer experience</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control form-control-user" id="employer1WorkDuration" name="employer1WorkDuration" aria-describedby="emailHelp" value="">
                    </div></div>
                    

                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="submit" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
                  
                  </form>

<?php } ?> 





        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016"); 
  </script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
