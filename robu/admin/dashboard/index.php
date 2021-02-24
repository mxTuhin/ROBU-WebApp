<!DOCTYPE html>
<?php
include('uploadMusic.php');
//session_start();
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
  <title>ROBU Admin | Dashboard</title>
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
            <a class="nav-link" href="#">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../interviewPanel/" target="_blank">
              <i style="color:blue" class="fas fa-users-cog"></i> Interview Panel
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../interviewed/" target="_blank">
              <i class="ni ni-planet text-blue"></i> Interviewed
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../registered/" target="_blank">
              <i class="fas fa-users"></i> Registered Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../selected/" target="_blank">
              <i style="color:#0ab55d" class="fas fa-user-check"></i> Selected Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../rejected/" target="_blank">
              <i style="color:#ad2955" class="fas fa-user-times"></i> Rejected Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pending/" target="_blank">
              <i style="color:#EEE10D" class="fas fa-user-clock"></i> Pending Members
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../IUTC/" target="_blank">
              <i style="color:black" class="fas fa-robot"></i> IUTC
            </a>
          </li>
            
            <li class="nav-item">
            <a class="nav-link" href="../gDesign/" target="_blank">
              <i style="color:black" class="fas fa-brush"></i> Graphics Design
            </a>
          </li>
            
            <li class="nav-item">
            <a class="nav-link" href="../achievement/" target="_blank">
              <i class="fas fa-award"></i>Add Achievement
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Dashboard</a>
        
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
    <style>
      @media only screen and (max-width: 400px) {
  .customRow {
    margin-left:0 !important;
  }
}
  
    </style>
   
    
    <div align="center" style="margin-top:10px" class="container">
        <label><b>Play Music !</b></label>
    <div class="row">
        
        <?php
    $sqlInner="SELECT * FROM music WHERE email='$sessionEmail'";
    $resultInner = mysqli_query($db, $sqlInner);
    while($dataIn = mysqli_fetch_assoc($resultInner)){
    ?>
        <div id="<?php echo $dataIn['musicID'] ?>" class="col-12 col-sm-4">
            <button  onclick="delete_row('<?php echo $dataIn['musicID'] ?>')" class="btn btn-link">x</button>
            <iframe width="300" height="150" src="<?php echo $dataIn['link'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
        </div>
        
        <?php
    }
        ?>
    </div>
    
    </div>
    <br>
    <div  class="container">
    <div class="row">
        <div  class="col-12 col-sm-12">

            <form method="post" action="index.php">
                <div style="margin-left:350px" class="row customRow">
                    <div class="col-6 col-sm-4">
                        
                    <input class="form-control" name="link" placeholder="Submit You Tube Link Here" type="text">    
                    </div>
                    
                    <div class="col-6 col-sm-1">
                        
                    <input name="submit_music" class="btn btn-info" type="submit">    
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    
    
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>
  
  
  <script type="text/javascript">
            function delete_row(id) {
                var rowID="#"+id;
                //  if(confirm("Are you sure you want to delete this Record?")){
                             $(""+rowID).remove();
                             $.ajax({
			               type: "POST",
			               url: 'deleteMusic.php',
			               data: {
			                   row_id: id
			                   
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
                                        html: 'Redirecting to Product Page in <strong>2</strong> seconds...',
                                        timer: 2000,
                                        onBeforeOpen: () => {
                                            timerInterval = setInterval(() => {
                                                Swal.getContent().querySelector(
                                                        'strong')
                                                    .textContent = (Swal
                                                    .getTimerLeft() / 1000)
                                                    .toFixed(0)
                                            }, 1000)
                                        }
                                        // onClose: () => {
                                        //     clearInterval(timerInterval)
                                        //     window.location.replace("../viewProduct/");
                                        // }
                                    });

			                   }
			               }
			           });

        // }
            }
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