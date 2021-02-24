<!DOCTYPE html>

<?php
include('../config/dbConfig.php');
?>
<html>
<head>
    <style>
    input:-moz-read-only { /* For Firefox */
  background-color: white !important;
}

input:read-only {
  background-color: white !important;
}
    </style>
</head>
<body>

<?php

$userID= intval($_GET['q2']);

if($userID==""){
    
    ?>
    <b>Please Provide a Student ID</b>
    <?php
}
else{
    
    $sqlMember = "SELECT * FROM memberInfo WHERE studentID='$userID'";
    $resultMember = mysqli_query($db, $sqlMember);
    $dataM = mysqli_fetch_assoc($resultMember);
    if($dataM>0){

    
?>



<form>
    
    <div class="row">
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Name</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                   <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Name" value="<?php echo $dataM['name'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                   <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo $dataM['email'] ?>" >
                </div>
                </div>
      
        </div>
        
        
        <div class="col-12 col-sm-6">
            
             <div align="left" class="form-group">
            <label for="exampleInputEmail1">Student ID</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                    </div>
                   <input type="text" class="form-control" id="studentIDTwo" aria-describedby="emailHelp" placeholder="Student ID" value="<?php echo $userID ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Cell Number</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                   <input type="text" class="form-control" id="cellnum" aria-describedby="emailHelp" placeholder="Cell Number" value="<?php echo $dataM['cellnum'] ?>" >
                </div>
                </div>
      
        </div>
        
        
        <div class="col-6 col-sm-3">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">BRACU Department</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-layer-group"></i></i></span>
                    </div>
                   <input type="text" class="form-control" id="bracuDepartment" aria-describedby="emailHelp" placeholder="BRACU Department" value="<?php echo $dataM['bracuDepartment'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-6 col-sm-3">
      
      
            <div align="left" class="form-group">
            <label for="exampleInputEmail1">Admission Semester</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    </div>
                   <input type="text" class="form-control" id="admissionSemester" aria-describedby="emailHelp" placeholder="Admission Semester" value="<?php echo $dataM['admissionSemester'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-6 col-sm-3">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Blood Group</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-tint"></i></span>
                    </div>
                   <input type="text" class="form-control" id="bloodGroup" aria-describedby="emailHelp" placeholder="Blood Group" value="<?php echo $dataM['bloodGroup'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-6 col-sm-3">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">RS Completed</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-igloo"></i></span>
                    </div>
                   <input type="text" class="form-control" id="rsInfo" aria-describedby="emailHelp" placeholder="RS Information" value="<?php echo $dataM['rsInfo'] ?>" >
                </div>
                </div>
      
        </div>
        
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Hobby</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-palette"></i></span>
                    </div>
                   <input type="text" class="form-control" id="hobby" aria-describedby="emailHelp" placeholder="Hobby" value="<?php echo $dataM['hobby'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Interest</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-skating"></i></span>
                    </div>
                   <input type="text" class="form-control" id="interest" aria-describedby="emailHelp" placeholder="Interest" value="<?php echo $dataM['interest'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-6 col-sm-2">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Gender</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-transgender"></i></span>
                    </div>
                   <input type="text" class="form-control" id="gender" aria-describedby="emailHelp" placeholder="Gender" value="<?php echo $dataM['gender'] ?>">
                </div>
                </div>
      
        </div>
        <div class="col-6 col-sm-4">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Birthday</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                   <input type="text" class="form-control" id="birthday" aria-describedby="emailHelp" placeholder="Birthday" value="<?php echo $dataM['birthday'] ?>" >
                </div>
                </div>
      
        </div>
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Facebook ID</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                    </div>
                   <input type="text" class="form-control" id="fbID" aria-describedby="emailHelp" placeholder="Facebook ID" value="<?php echo $dataM['fbID'] ?>" >
                </div>
                </div>
      
        </div>
        
        
        <div class="col-12 col-sm-12">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Residence</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                    </div>
                   <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Residence" value="<?php echo $dataM['address'] ?>" >
                </div>
                </div>
      
        </div>
        
        
        <div class="w-100"></div>
        <div class="col-12 col-sm-12">
        <label>Below is the Admin Interaction Section</label><br><br>
        </div>
        <div class="w-100"></div>
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Approval Status?</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-thumbs-up"></i></span>
                    </div>
                   <select id="status" name="status" class="form-control" required>
                      
                      <option <?php if($dataM['status'] == ''){ ?> selected="selected"<?php } ?> >Choose Select/Reject/Pending</option>
                      <option <?php if($dataM['status'] == 'selected'){ ?> selected="selected"<?php } ?> value="selected">Selected</option>
                      <option <?php if($dataM['status'] == 'rejected'){ ?> selected="selected"<?php } ?> value="rejected">Rejected</option>
                      <option <?php if($dataM['status'] == 'pending'){ ?> selected="selected"<?php } ?> value="pending" >pending</option>
                      
                      
                      
                  </select>
                </div>
                </div>
      
        </div>
        
        
        
        <div class="col-12 col-sm-6">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">ROBU Department</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-robot"></i></i></span>
                    </div>
                   <select id="robuDepartment" name="robuDepartment" class="form-control" required>
                      
                      <option <?php if($dataM['robuDepartment'] == ''){ ?> selected="selected"<?php } ?> >Choose ROBU Department</option>
                      <option <?php if($dataM['robuDepartment'] == 'Creative'){ ?> selected="selected"<?php } ?> value="Creative">Creative</option>
                      <option <?php if($dataM['robuDepartment'] == 'Event Management'){ ?> selected="selected"<?php } ?> value="Event Management">Event Management</option>
                      <option <?php if($dataM['robuDepartment'] == 'Strategic Plan'){ ?> selected="selected"<?php } ?> value="Strategic Plan" >Strategic Plan</option>
                      <option <?php if($dataM['robuDepartment'] == 'Project Management'){ ?> selected="selected"<?php } ?> value="Project Management" >Project Management</option>
                      <option <?php if($dataM['robuDepartment'] == 'Finance And Marketing'){ ?> selected="selected"<?php } ?> value="Finance And Marketing" >Finance And Marketing</option>
                      <option <?php if($dataM['robuDepartment'] == 'Public Relations'){ ?> selected="selected"<?php } ?> value="Public Relations" >Public Relations</option>
                      <option <?php if($dataM['robuDepartment'] == 'Writing'){ ?> selected="selected"<?php } ?> value="Writing" >Writing</option>
                      
                      
                  </select>
                </div>
                </div>
      
        </div>
        

        <div class="col-12 col-sm-12">
      
      
              <div align="left" class="form-group">
            <label for="exampleInputEmail1">Provide Info about the Interviewee</label>
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                    </div>
                   <input type="text" id="userRemark" class="form-control" value="<?php echo $dataM['remarks'] ?>" placeholder="Remarks" >
                </div>
                </div>
      
        </div>

        
        
</div>

</form>

<style>
   #submit_button, #sms_button{
        display:block !important;
    }
</style>
            
<?php
}
else{
    ?>
    <b>The Student is not Registered with the service</b>
    <?php
}
}
?>

<?php
mysqli_close($db);
?>



</body>
</html>