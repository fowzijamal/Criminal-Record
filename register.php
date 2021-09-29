<?php 
 include_once("header.php");
?>
      <?php 
      if($_SESSION['userRoll'] == "admin"){
      ?>
<body class="bg-gradient-danger2">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user"  method="post" action="register.php">
                <?php include('errors.php'); ?>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="fName" value="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="LName" value="">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="User Name"name="username" id="username" value="">
                  <span id="availability"></span>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" value="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Role Type</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="role" >
                    <option value="sub-admin">Sub-admin</option>
                    <option value="police">Police User</option>
                    <option value="court">Court User</option>

                  </select>
              </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password_1">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_2">
                  </div>
                </div>
                <button type="submit" class="btn btn-danger btn-user btn-block" name="reg_user">
                  Register Account
                </button>
              </form>
              <hr>
             
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
      <?php
        }else{
			header('location: home.php');
		}
      ?>
 <?php 
 include("footer.php");
 ?>

<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){
     var username = $(this).val();
     $.ajax({
      url:'check/user-check.php',
      method:"POST",
      data:{user_name:username},
      dataType:"text",
      success:function(html)
      {
        $('#availability').html(html);
      }
     })

  });
 });  
</script>