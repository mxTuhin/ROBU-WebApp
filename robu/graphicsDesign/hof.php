<?php
include('phpHof.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ROBU Admin.">
  <meta name="author" content="Creative Department">
  <title>ROBU | Graphics Design | HOF</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <!--<link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">
  
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.php">
                  <img src="../assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../">
                <i class="fas fa-home"></i>
                <span class="nav-link-inner--text">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://photos.app.goo.gl/uGchJzmllNGFjTOB3">
                <i class="fas fa-clock"></i>
                <span class="nav-link-inner--text">ROBU Timemachine</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Here's The *Hall Of Fame*<br> Graphics Design Workshop Fall 19 </p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    
    
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
.custom-file-upload {
    border: 1px solid #FFFFFF;
    display: inline-block;
    padding: 4px 12px;
    cursor: pointer;
    border-radius: 20% ;
}
        .hofButton{
            margin-top:-150px;
            padding-bottom: 40px;
        }
        .hofImage{
            height:300px;
            width:300px
        }
        .hofLabel{
            color:white;
            margin-top:10px;
            border: 1px solid white;
            border-radius: 20px;
            width:100px;
        }
media only screen and (max-width: 600px) {
    
input[type="date"]:before {
  color: darkgrey;
  content: attr(placeholder) !important;
  margin-right: 0.5em;
  margin-top: 10px !important;
  
}
}
    </style>
      
      <div  align="center" class="container hofButton">
          <div  class="col-12 col-sm-12">
                        
                <form id="uploadCoverImage" action="phpHof.php"  method="post" enctype="multipart/form-data">
                    <div  class="row">
                        <div class="col-4 col-sm-4">
               
                                <input class="form-control" name="name" placeholder="Type Your Name" id="name" type="text"  required>
                  		</div>
                        
                        <div class="col-4 col-sm-4">
                            <div class="row">
                            <div class="col-8 col-sm-8">
                                <label id="profile_image" for="file-upload" class="btn btn-info ">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                        Select Image
                            </label>

                                
                            <input name="fileToUpload" placeholder="upload file" id="file-upload" type="file" accept="image/*" required>
                            </div>
                            <div class="col-4 col-sm-4">
<!--                            <span id="alertSpan" style="color:white; font-size:12px">** You must upload a profile picture to proceed through the registration</span>-->
                        <span id="notifierSpan" style="color:White; font-size:12px; display:none; boder"><span style="color:#07e9f5; font-size:20px">✔</span> <br>Image Selected. Upload Now</span>
                            </div>
                            
                            </div>
                            
                            


                  		</div>
                        
                        <div  class="col-4 col-sm-4">
                                <input type="submit" style="border-radius:50px" name="uploadDesign" value="Upload" class="btn btn-info">
        
                        </div>
                     </div>
                </form>
            </div>
      </div>
      
      <div class="container hofContainer">
          <div class="row">
              <?php
              $result=mysqli_query($db,"SELECT * from hof");
              while($data = mysqli_fetch_assoc($result)){
    
              
              ?>
          <div class="col-4 col-sm-4">
              <img class="hofImage" src="../assets/hof/<?php echo $data['imageName'] ?>">
              <center> <label class="hofLabel"><?php echo $data['name'] ?></label></center>
          </div>
              <?php
              }
                  ?>
              
              </div>
      </div>
    

   
  
    </div>
  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="copyright text-center text-xl-left text-muted">
             <script type="text/javascript">
  document.write(new Date().getFullYear());
</script> | Made with ❤ for ROBU by <a href="https://www.facebook.com/tuhin.mridha.5" class="font-weight-bold ml-1" target="_blank"> Tuhin Mridha</a> 
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
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
    $("#file-upload").change(function(){
        document.getElementById('notifierSpan').style.display = 'block';
        document.getElementById('alertSpan').style.display = 'none';
    });
</script>
    
    </body>
</html>