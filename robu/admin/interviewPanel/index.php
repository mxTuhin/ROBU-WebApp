<!DOCTYPE html>
<?php
include('../config/dbConfig.php');
session_start();
$sessionEmail=$_SESSION['email'];
	$sql    = "SELECT * FROM adminInfo WHERE email='$sessionEmail'";
	$result = mysqli_query($db, $sql);
	$data   = mysqli_fetch_assoc($result);
	$profileImage=$data['image'];
	$authenticator=$_SESSION['loginAuthenticator'];
	
    $joiningSemester="";
	date_default_timezone_set("Asia/Dhaka");
	$month=date('m');
	$year=date('y');
    $prevSem=array();
    $prevSem[0]="Spring-".$year;
    $prevSem[1]="Summer-".$year;
    $prevSem[2]="Fall-".($year-1);
    
	if($month<4){
	    $joiningSemester="Spring-".$year;
        $prvCnt=2;
	}
	else if($month<8){
	    $joiningSemester="Summer-".$year;
        $prvCnt=0;
	}
	else if($month<12){
	    $joiningSemester="Fall-".$year;
        $prvCnt=1;
	}

//echo $prevSem[$prvCnt];

    $resultForRegisteredUser=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE joiningSemester='$joiningSemester'");
    $dataForRegisteredUser=mysqli_fetch_assoc($resultForRegisteredUser);
    
    $resultForSelectedUser=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE status='selected'AND joiningSemester='$joiningSemester' ");
    $dataForSelectedUser=mysqli_fetch_assoc($resultForSelectedUser);
    
    $resultForPendingUser=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE status='pending' AND joiningSemester='$joiningSemester'");
    $dataForPendingUser=mysqli_fetch_assoc($resultForPendingUser);
    
    $resultForInterviewedUser=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE status!=''AND joiningSemester='$joiningSemester'");
    $dataForInterviewedUser=mysqli_fetch_assoc($resultForInterviewedUser);

    $resultForRegisteredUserPRV=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE joiningSemester='$prevSem[$prvCnt]'");
    $dataForRegisteredUserPRV=mysqli_fetch_assoc($resultForRegisteredUserPRV);
    
    $resultForSelectedUserPRV=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE status='selected' AND joiningSemester='$prevSem[$prvCnt]'");
    $dataForSelectedUserPRV=mysqli_fetch_assoc($resultForSelectedUserPRV);
    
    $resultForPendingUserPRV=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE status='pending' AND joiningSemester='$prevSem[$prvCnt]'");
    $dataForPendingUserPRV=mysqli_fetch_assoc($resultForPendingUserPRV);
    
    $resultForInterviewedUserPRV=mysqli_query($db,"SELECT count(*) as total from memberInfo WHERE status!='' AND joiningSemester='$prevSem[$prvCnt]'");
    $dataForInterviewedUserPRV=mysqli_fetch_assoc($resultForInterviewedUserPRV);
    
    
    
    
	
	?>
	
	
<?php
	if($authenticator=="adminAuthenticated"){
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ROBU Admin">
  <meta name="author" content="Creative Department">
  <title>ROBU Admin | Interview Panel</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
    <style>
        html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}
    </style>
    
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.php">
        <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/images/<?php echo $profileImage ?>">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="../profile/" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="../profile/" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="../profile/" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="../profile/" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="../php/logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
            
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../dashboard/">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../interviewPanel/">
              <i style="color:blue" class="fas fa-users-cog"></i> Interview Panel
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../interviewed/">
              <i class="ni ni-planet text-blue"></i> Interviewed
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../registered/">
              <i class="fas fa-users"></i> Registered Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../selected/">
              <i style="color:#0ab55d" class="fas fa-user-check"></i> Selected Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../rejected/">
              <i style="color:#ad2955" class="fas fa-user-times"></i> Rejected Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pending/">
              <i style="color:#EEE10D" class="fas fa-user-clock"></i></i> Pending Members
            </a>
          </li>
          
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Interview Panel</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/images/<?php echo $profileImage ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $data['name'] ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../profile/" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../profile/" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../profile/" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../profile/" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../php/logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Registered</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $dataForRegisteredUser['total']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                    <?php 
                    if($dataForRegisteredUser['total']>$dataForRegisteredUserPRV['total'])
                    {
                    ?>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>(plus) <?php echo $dataForRegisteredUserPRV['total']-$dataForRegisteredUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    <?php
                    }
                    
                    else{                       
                ?>
                    <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> (minus) <?php echo $dataForRegisteredUserPRV['total']-$dataForRegisteredUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Interviewed</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $dataForInterviewedUser['total']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <?php 
                    if($dataForInterviewedUser['total']>$dataForInterviewedUserPRV['total'])
                    {
                    ?>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>(plus) <?php echo $dataForInterviewedUserPRV['total']-$dataForInterviewedUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    <?php
                    }
                    
                    else{                       
                ?>
                    <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> (minus) <?php echo $dataForInterviewedUserPRV['total']-$dataForInterviewedUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Accepted</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $dataForSelectedUser['total']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <?php 
                    if($dataForSelectedUser['total']>$dataForSelectedUserPRV['total'])
                    {
                    ?>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>(plus) <?php echo $dataForSelectedUserPRV['total']-$dataForSelectedUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    <?php
                    }
                    
                    else{                       
                ?>
                    <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> (minus) <?php echo $dataForSelectedUserPRV['total']-$dataForSelectedUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $dataForPendingUser['total']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <?php 
                    if($dataForPendingUser['total']>$dataForPendingUserPRV['total'])
                    {
                    ?>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>(plus) <?php echo $dataForPendingUserPRV['total']-$dataForPendingUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    <?php
                    }
                    
                    else{                       
                ?>
                    <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> (minus) <?php echo $dataForPendingUserPRV['total']-$dataForPendingUser['total'] ?></span>
                    <span class="text-nowrap">Since last semester</span>
                  </p>
                    
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
        .customButton {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;        
    

}

    #submit_button, #sms_button{
        display:none;
    }
    </style>
    
    <hr style="border:1px solid transparent">
    
    <div align="center" class="container">
        <div class="input-group input-group-rounded input-group-merge w-25">
            <input id="userID" type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Enter Student ID" aria-label="Search">
            <button class="customButton" id="searchMember" type="submit" >
            
             <div class="input-group-prepend">
              <div class="input-group-text">
                  
                <span class="fa fa-search"></span>
                
              </div>
              
            </div>
            </button>
            
            <button style="margin-right:-115px" class="customButton" id="sms_button" type="submit" >
            
             <div  class="input-group-prepend">
              <div style="background-color:#04d9e0" class="input-group-text">
                  
                <span style="color:white">Send SMS</span>
                
              </div>
              
            </div>
            </button>
            
<!--            <button id="sms_button" type="button" value="submit" class="btn btn-info my-4 w-25 customButton">Send SMS</button>-->
          </div>
        
    </div>
    
    <hr style="border:1px solid transparent">
    
    <div align="center" class="container">
    <div id="txtHint"><b>Please provide Student ID to get Info !</b></div><br>
    </div>
    
    <div  align="center"  class="col-12 col-sm-12">
      
      
    <button id="submit_button" type="button" value="submit" class="btn btn-primary my-4 w-25">Submit</button>
      
    </div>

    
    <hr style="border:1px solid transparent">
    
     <style>
        #dashboardFooter{
            margin-left:20px;
            margin-right:20px;
        
        }
        @media only screen and (max-width: 600px) {
        #dashboardFooter{
            margin-left:20px;
            margin-right:20px;
        
        }
        }
    </style>
    <!-- Page content -->
    <footer class="footer" id="dashboardFooter">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
             <script type="text/javascript">
  document.write(new Date().getFullYear());
</script> | Made with ❤ for ROBU by <a href="https://www.facebook.com/tuhin.mridha.5" class="font-weight-bold ml-1" target="_blank"> Tuhin Mridha</a> 
        </div>
          </div>
          <div class="col-xl-6">
             <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="../" class="nav-link" target="_blank">ROBU Team</a>
            </li>
            <li class="nav-item">
              <a href="../about/" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="../blog/" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/mxTuhin/ROBU_MIT/blob/master/LICENSE" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
          </div>
        </div>
      </footer>
    
    </div>
    
    
    
    
    
   

    
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
  
  <script>
var input = document.getElementById("userID");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("searchMember").click();
  }
});
</script>
  
  <script>
$(document).ready(function(){
  $("#userID").keyup(function(){
        var x = document.getElementById("userID").value;
        console.log(x);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getData.php?q2="+x,true);
        xmlhttp.send();
  });
});
</script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>
  
  
  
  
  
  
  
  <script>
			$("#submit_button").click(function () {
			
			       var rDepartment = $("#robuDepartment").val();
			       var UserRemark= $("#userRemark").val();
			       var UserID= $("#userID").val();
			       var Status= $("#status").val();
                
                   var Name= $("#name").val();
                   var Email= $("#email").val();
                   var Cellnum= $("#cellnum").val();
                   var BracuDepartment= $("#bracuDepartment").val();
                   var AdmissionSemester= $("#admissionSemester").val();
                   var BloodGroup= $("#bloodGroup").val();
                   var RSInfo= $("#rsInfo").val();
                   var Hobby= $("#hobby").val();
                   var Interest= $("#interest").val();
                   var Gender= $("#gender").val();
                   var Birthday= $("#birthday").val();
                   var FBID= $("#fbID").val();
                   var Address= $("#address").val();
                   var StudentID= $("#studentIDTwo").val();
                   
			       
			       
			
			       if (Status=="" || UserRemark == "") {
			           Swal.fire({
			               type: 'error',
			               title: 'Oops...',
			               text: 'Remarks field is empty.',
			               showConfirmButton: true,
			               confirmButtonColor: '#43A047',
			               confirmButtonText: 'Retry',
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			           })
			       } else {
			           Swal.fire({
			               title: 'Processing Request...',
			               showConfirmButton: false,
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			               onBeforeOpen: () => {
			                   Swal.showLoading()
			               }
			           });
			
			           $.ajax({
			               type: "POST",
			               url: 'submit.php',
			               data: {
			                   robuDepartment: rDepartment,
			                   remarks: UserRemark,
			                   studentID:UserID,
			                   status:Status,
                               name:Name,
                               email:Email,
                               cellnum:Cellnum,
                               bracuDepartment:BracuDepartment,
                               admissionSemester:AdmissionSemester,
                               bloodGroup:BloodGroup,
                               rsInfo:RSInfo,
                               hobby:Hobby,
                               interest:Interest,
                               gender:Gender,
                               birthday:Birthday,
                               fbID:FBID,
                               address:Address,
                               studentID:StudentID
			               },
			               dataType: "JSON",
			               success: function (data) {
			                   if (data.error) {
			                       Swal.fire({
			                           type: 'error',
			                           title: 'Oops...',
			                           text: data.msg,
			                           showConfirmButton: true,
			                           confirmButtonColor: '#43A047',
			                           confirmButtonText: 'Retry',
			                           allowOutsideClick: false,
			                           allowEscapeKey: false,
			                       })
			                   } else {
			                       Swal.fire({
                                        type: 'success',
                                        title: data.msg,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        html: 'Redirecting in <strong>2</strong> seconds...',
                                        timer: 2000,
                                        onBeforeOpen: () => {
                                            timerInterval = setInterval(() => {
                                                Swal.getContent().querySelector(
                                                        'strong')
                                                    .textContent = (Swal
                                                    .getTimerLeft() / 1000)
                                                    .toFixed(0)
                                            }, 1000)
                                        },
                                        onClose: () => {

                                            clearInterval(timerInterval)
                                            window.location.replace("../interviewPanel/");
                                        }
                                    });

			                   }
			               }
			           });
			       }
			});
		</script>



<script>
			$("#sms_button").click(function () {   
			       var UserID= $("#userID").val();
			       
			
			       if (UserID=="") {
			           Swal.fire({
			               type: 'error',
			               title: 'Oops...',
			               text: 'Students ID field is empty.',
			               showConfirmButton: true,
			               confirmButtonColor: '#43A047',
			               confirmButtonText: 'Retry',
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			           })
			       } else {
			           Swal.fire({
			               title: 'Processing Request...',
			               showConfirmButton: false,
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			               onBeforeOpen: () => {
			                   Swal.showLoading()
			               }
			           });
			
			           $.ajax({
			               type: "POST",
			               url: 'sendSMS.php',
			               data: {
			                   studentID:UserID

			               },
			               dataType: "JSON",
			               success: function (data) {
			                   if (data.error) {
			                       Swal.fire({
			                           type: 'error',
			                           title: 'Oops...',
			                           text: data.msg,
			                           showConfirmButton: true,
			                           confirmButtonColor: '#43A047',
			                           confirmButtonText: 'Retry',
			                           allowOutsideClick: false,
			                           allowEscapeKey: false,
			                       })
			                   } else {
			                       Swal.fire({
                                        type: 'success',
                                        title: data.msg,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        html: 'Redirecting in <strong>2</strong> seconds...',
                                        timer: 2000,
                                        onBeforeOpen: () => {
                                            timerInterval = setInterval(() => {
                                                Swal.getContent().querySelector(
                                                        'strong')
                                                    .textContent = (Swal
                                                    .getTimerLeft() / 1000)
                                                    .toFixed(0)
                                            }, 1000)
                                        },
                                        onClose: () => {

                                            clearInterval(timerInterval)
                                            window.location.replace("../interviewPanel/");
                                        }
                                    });

			                   }
			               }
			           });
			       }
			});
		</script>
    
  
  
</body>

</html>
<?php
}

else{
   
   ?>
   
   <html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Go Back !</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css" />

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>403</h1>
				<h2>You are not Authorized</h2>
			</div>
			<a style="margin-top:30px" href="../index.php">Go To Login</a>
		</div>
	</div>

</body>

</html>

   
<?php
}
?>