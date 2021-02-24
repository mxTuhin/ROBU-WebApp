<!DOCTYPE html>
<?php
include('uploadCover.php');
//session_start();
$sessionEmail=$_SESSION['email'];
	$sql    = "SELECT * FROM adminInfo WHERE email='$sessionEmail'";
	$result = mysqli_query($db, $sql);
	$data   = mysqli_fetch_assoc($result);
	$profileImage=$data['image'];
	$authenticator=$_SESSION['loginAuthenticator'];
	$fullName=explode(" ", $data['name']);
	$firstName=$fullName[0]."'s";
	$birthday=explode("-",$data['birthday']);
	$year=idate('Y')-(int)$birthday[0];
	
	
    
    
    
	
	?>
	
	
<?php
	if($authenticator=="adminAuthenticated"){
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ROBU Admin">
  <meta name="author" content="Creative Tim">
  <title>ROBU Admin | Profile</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">
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
      <a class="navbar-brand pt-0" href="../index.php">
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
              <a href="../index.php">
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
            <a class="nav-link" href="../dashboard/"  target="_blank">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../profile/"><?php echo $firstName ?> Profile</a>
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
    
    <style>
    #colorSelector{
        display:none;
    }
        input[type="file"] {
    display: none;
}
    #profile-img-tag{
        display:none;
    }

    </style>
    
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 700px; background-image: url(../assets/images/<?php echo $data['coverPhoto'] ?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $fullName[0] ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <div class="row">
         
        </div>
            
            
                 
                <form id="uploadCoverImage" action="index.php"  method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div style="margin-right:30px" class="col-lg-3 col-md-10">
               <label id="profile_image" for="file-upload" class="btn btn-info ">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                        Select Image
                                </label>

                                
                                <input name="fileToUpload" placeholder="upload file" id="file-upload" type="file" accept="image/*" required>


                  		     </div>
						       <div  class="col-lg-3 col-md-10">
                                <input type="submit" name="uploadCover" value="Upload Cover" class="btn btn-info">
        
                                </div>
                     </div>
            </form>
            
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/images/<?php echo $data['image'] ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $data['name'] ?><span class="font-weight-light">, <?php echo $year ?></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $data['address'] ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $data['clubPosition'] ?> - <?php echo $data['robuDepartment'] ?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $data['bracuDepartment'] ?>
                </div>
                <hr class="my-4" />
                <form method="post" action="index.php">
                    <textarea placeholder="Write a Bio ..." style="text-align:center;margin-bottom:5px" class="form-control" rows="4" cols="50" name="bioText"><?php echo $data['bioText'] ?></textarea>
                    <input  name="submit_bio" type="submit" class="btn btn-info" value="Change Bio">
                </form>
              </div>
            </div>
          </div>
          
          
          <br><br>
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                
              </div>
            </div>
            
            
            
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                
              </div>
              <div class="text-center">
                <h3>
                  Update Password
                </h3>
                <hr class="my-4" />
                <form >
                    <div class="row">
                        
                        
                        <div style="margin-bottom:5px" class="col-12 col-sm-12">
                            <input class="form-control" type="password" id="passOld" placeholder="Enter Old Password">
                        </div>
                        
                        <div style="margin-bottom:5px" class="col-12 col-sm-6">
                            <input class="form-control" type="password" id="passOne" placeholder="Enter New password">
                        </div>
                        <div style="margin-bottom:5px" class="col-12 col-sm-6">
                            <input class="form-control" type="password" id="passTwo" placeholder="Enter New password Again">
                        </div>
                    </div>
                    <button  id="update_password" type="button" class="btn btn-info" >Update Password</button>
                </form>
              </div>
            </div>
          </div>
          
          
        </div>
        
        
        
        
        
        
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div align="left" class="form-group">
            <label >Name</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="name" placeholder="Enter Name" value="<?php echo $data['name'] ?>" >
                </div>
                </div>
                    </div>
                    <div class="col-lg-6">
                      <div align="left" class="form-group">
            <label >Email Address</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                   <input type="text" class="form-control" id="email" aria-describedby="emailHelp" id="email" placeholder="Enter email" value="<?php echo $data['email'] ?>" >
                </div>
                </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div align="left" class="form-group">
            <label >Blood Group</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-tint"></i></span>
                    </div>
                   <input type="text" class="form-control" aria-describedby="emailHelp" id="bloodGroup" placeholder="Choose Blood Group" value="<?php echo $data['bloodGroup'] ?>">
                </div>
                </div>
                    </div>
                    <div class="col-lg-3">
                     <div align="left" class="form-group">
            <label >Birthday</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="birthday" placeholder="Enter Birthday" value="<?php echo $data['birthday'] ?>" >
                </div>
                </div>
                    </div>
                      
                      <div class="col-lg-3">
                     <div align="left" class="form-group">
            <label >Hobby</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="hobby" placeholder="Enter Birthday" value="<?php echo $data['hobby'] ?>" >
                </div>
                </div>
                    </div>
                      
                      <div class="col-lg-3">
                     <div align="left" class="form-group">
            <label >Interest</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="interest" placeholder="Enter Birthday" value="<?php echo $data['interest'] ?>" >
                </div>
                </div>
                    </div>
                    
                    
                    
                  </div>
                    
                    
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div align="left" class="form-group">
            <label for="exampleInputEmail1">Resident</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="address" placeholder="Enter Address" value="<?php echo $data['address'] ?>" >
                      <input type="text" class="form-control"  aria-describedby="emailHelp" id="memberID" placeholder="Enter Address" value="<?php echo $data['memberID'] ?>" hidden>
                </div>
                </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-5">
                      <div align="left" class="form-group">
            <label for="exampleInputEmail1">Facebook ID</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><a class="font-weight-bold ml-1"  href="<?php echo $data['fbID'] ?>" target="_blank"><i class="fab fa-facebook"></i></a></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="fbID" placeholder="Enter Facebook ID" value="<?php echo $data['fbID'] ?>" >
                </div>
                </div>
                    </div>
                    <div class="col-lg-4">
                      <div align="left" class="form-group">
            <label for="exampleInputEmail1">Living Country Present</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-search-location"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="livingCountry" placeholder="Living Country" value="<?php echo $data['livingCountry'] ?>" >
                </div>
                </div>
                    </div>
                    <div class="col-lg-3">
                      <div align="left" class="form-group">
            <label for="exampleInputEmail1">Cell Number</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                   <input type="text" class="form-control"  aria-describedby="emailHelp" id="cellnum" placeholder="Enter Cell Number" value="<?php echo $data['cellnum'] ?>">
                </div>
                </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" id="aboutMe" placeholder="A few words about you ..."><?php echo $data['aboutMe'] ?></textarea>
                  </div>
                </div>
                
                
          </form>
          
          <div class="row">
          <div style="margin-left:20px" class="col-lg-8 col-md-10">
                        
                        <button id="submit_button" type="button" class="btn btn-info">Update profile</button>
        
          </div>
              <div  class="col-lg-3 col-md-10">
                        
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    
                    <div class="row">
                        <div style="margin-right:20px" class="col-lg-7 col-md-10">
                        <label id="profile_imageT" for="file" class="btn btn-info ">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                            Select Image
                                    </label>

                                
                        <input name="file" placeholder="upload file" id="file" type="file" accept="image/*" required>
                    </div>
                    
                    <div class="col-lg-3 col-md-10">
                    <input class="btn btn-info" type="submit" value="Upload DP"  >
                    </div>
                    
                    </div>
                    </form>
                    </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
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
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>




<script>
			$("#submit_button").click(function () {
			
			       var Name= $("#name").val();
                   var Email= $("#email").val();
                   var Cellnum= $("#cellnum").val();
                   var BloodGroup= $("#bloodGroup").val();
                   var Hobby= $("#hobby").val();
                   var Interest= $("#interest").val();
                   var Birthday= $("#birthday").val();
                   var FBID= $("#fbID").val();
                   var Address= $("#address").val();
		           var LivingCountry= $("#livingCountry").val();
		           var AboutMe= $("#aboutMe").val();
                   var MemberID= $("#memberID").val();
                   
			       
			       
			
			       if (Email=="" || Name == "" || Cellnum=="") {
			           Swal.fire({
			               type: 'error',
			               title: 'Oops...',
			               text: 'Email/Name/Cellnum field is empty.',
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
			               url: 'updateData.php',
			               data: {
			                   memberID:MemberID,
                               name:Name,
                               email:Email,
                               cellnum:Cellnum,
                               bloodGroup:BloodGroup,
                               hobby:Hobby,
                               interest:Interest,
                               birthday:Birthday,
                               fbID:FBID,
                               address:Address,
                               aboutMe:AboutMe,
                               livingCountry: LivingCountry
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
                                            window.location.replace("");
                                        }
                                    });

			                   }
			               }
			           });
			       }
			});
		</script>
  
  
  
  
  
  
  
  <script>
			$("#update_password").click(function () {
			
			       var PassOne = $("#passOne").val();
			       var PassTwo = $("#passTwo").val();
			       var PassOld = $("#passOld").val();
			       
			       
			
			       if (PassOne == "" || PassTwo=="" || PassOld=="") {
			           Swal.fire({
			               type: 'error',
			               title: 'Oops...',
			               text: 'Password field is empty.',
			               showConfirmButton: true,
			               confirmButtonColor: '#43A047',
			               confirmButtonText: 'Retry',
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			           })
			       } else if (PassOne !=  PassTwo) {
			           Swal.fire({
			               type: 'error',
			               title: 'Oops...',
			               text: 'Password Mismatch. Type Password Again.',
			               showConfirmButton: true,
			               confirmButtonColor: '#43A047',
			               confirmButtonText: 'Retry',
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			           })
			       } 
			       
			       else {
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
			               url: 'updatePass.php',
			               data: {
			                   passOne: PassOne,
			                   passTwo: PassTwo,
			                   passOld:PassOld
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
                                        html: 'Redirecting in <strong>3</strong> seconds...',
                                        timer: 3000,
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
                                            window.location.replace("../profile/");
                                        }
                                    });

			                   }
			               }
			           });
			       }
			});
		</script>
		
		
		<script>
    
$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
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
url: "../php/ajax_php_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
Swal.fire({
                                        type: 'success',
                                        title: 'The Profile has been uploaded',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        html: 'Redirecting in <strong>3</strong> seconds...',
                                        timer: 3000,
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
                                            window.location.replace("../profile/");
                                        }
                                    });
}
});
}));

// Function to preview image after validation
$(function() {
$("#file").change(function() {

var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{

return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {

};
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