<div class="container">

<?php
session_start();
include'header.php';
if (isset($_POST['submit'])) {

  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $user_name = trim($_POST['user_name']);
  $password = trim($_POST['password']);
  $confirmpassword = trim($_POST['confirm_password']);
  $first_name = trim($_POST['fname']);
  $last_name = trim($_POST['lname']);
  $email_id = trim($_POST['email_id']);
  $contact_no = trim($_POST['contact_no']);
  $dob = trim($_POST['dob']);
  $gender = trim($_POST['gender']);
  $address = trim($_POST['address']);

  $errorMsg = '';
  $successMsg = '';
  $sql_u = "SELECT * FROM user_info WHERE user_name='$user_name'";
  $sql_e = "SELECT * FROM user_info WHERE email_id='$email_id'";
  $res_u = mysqli_query($conn, $sql_u);
  $res_e = mysqli_query($conn, $sql_e);

  if (mysqli_num_rows($res_u) > 0) {
    $errorMsg .= "Sorry... username already taken";
  }
  else if(mysqli_num_rows($res_e) > 0){
    $errorMsg .= "Sorry... email already taken";
  }
  elseif($user_name == "")
  {
    $errorMsg .=  "error : You did not enter a username.";
    $code= "1" ;
  }
  elseif($password == "")
  {
    $errorMsg .=  "error : Please enter password.";
    $code= "2";
  }
  elseif ($password != $confirmpassword)
  {
    $errorMsg .=  "Error... Passwords do not match";
    $code= "2";
  }
  elseif ($first_name == "")
  {
    $errorMsg .=  "error : You did not enter a first name.";
    $code= "3" ;
  }
  elseif ($last_name == "")
  {
    $errorMsg .=  "error : You did not enter a last name.";
    $code= "4" ;
  }
  elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email_id))
  {
    $errorMsg .=  "error : You did not enter a email id.";
    $code= "5" ;
  }
  elseif ($contact_no == "")
  {
    $errorMsg .=  "error : You did not enter a contact no.";
    $code= "6";
  }
  elseif(!preg_match('/^\d{10}$/', $contact_no))
  {
    $error = 'Invalid Number!';
    $errorMsg .=  "error : Invalid Number!";
    $code= "6";
  }
  elseif ($dob == "")
  {
    $errorMsg .=  "error : You did not enter a dob.";
    $code= "8" ;
  }
  elseif ($gender == "")
  {
    $errorMsg .=  "error : You did not enter a gender.";
    $code= "7" ;
  }
  elseif ($address == "")
  {
    $errorMsg .=  "error : You did not enter a address.";
    $code= "9" ;
  }
  else
  {
    $sql = "INSERT INTO `user_info`(`id`, `image`, `user_name`, `password`, `first_name`, `last_name`, `email_id`, `contact_no`, `d_o_b`, `gender`, `address`) VALUES (NULL,'".$image."','".$user_name."','".$password."', '".$first_name."', '".$last_name."', '".$email_id."', '".$contact_no."', '".$dob."', '".$gender."', '".$address."')";
    $data = mysqli_query($conn,$sql);

    $folder = "files\uploads\user/".$image;
    move_uploaded_file($image_tmp, $folder);
    $successMsg .= "Sucessfully submitted";
  }
}
?>


<div class="container">
  <div class="jumbotron">
  <div class="container text-center">
    <h1>Registration Page</h1>
  </div>
</div>

    <?php
      if (isset($errorMsg)) {
        echo "<p class='message error'>" .$errorMsg. "</p>" ;
      }

      if (isset($successMsg)) {
        echo "<p class='message success'>" .$successMsg. "</p>" ;
      }

    ?>

    <form class="registration" id="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">

      <input type="file" class="img-thumbnail" alt="Cinque Terre" name="image" id="profile-img" required/><br>
      <img src="" id="profile-img-tag" width="100" />
      <script type="text/javascript">
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#profile-img-tag').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
              }
          }
          $("#profile-img").change(function(){
              readURL(this);
          });
      </script><br>



    <div class="form-group">
      <label for="usr">User Name:</label>
      <input type="text" name="user_name" class="form-control" value="<?php if(isset($user_name)){echo $user_name;} ?>"
<?php if(isset($code) && $code == 1){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="password" placeholder="Aman#123" class="form-control" value="<?php if(isset($password)){echo $password;} ?>"
<?php if(isset($code) && $code == 2){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" name="confirm_password" placeholder="Aman#123" class="form-control" value="<?php if(isset($password)){echo $password;} ?>"
<?php if(isset($code) && $code == 2){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="fn">First Name:</label>
      <input type="text" name="fname" placeholder="Aman" class="form-control" value="<?php if(isset($first_name)){echo $first_name;} ?>"
<?php if(isset($code) && $code == 3){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="ln">Last Name:</label>
      <input type="text" name="lname" placeholder="Singh" class="form-control" value="<?php if(isset($last_name)){echo $last_name;} ?>"
<?php if(isset($code) && $code == 4){echo "class=errorMsg" ;} ?>>
      </div>


      <div class="form-group">
      <label for="eid">Email id:</label>
      <input type="text" name="email_id" placeholder="Aman@gmail.com" class="form-control" value="<?php if(isset($email_id)){echo $email_id;} ?>"
<?php if(isset($code) && $code == 5){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="dob">D.O.B:</label>
      <input type="text" name="dob" placeholder="DD/MM/YYYY" class="form-control" value="<?php if(isset($dob)){echo $dob;} ?>"
<?php if(isset($code) && $code == 8){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="cno">Contact No.:</label>
      <input type="text" name="contact_no" placeholder="9030303030" class="form-control" value="<?php if(isset($contact_no)){echo $contact_no;} ?>"
<?php if(isset($code) && $code == 6){echo "class=errorMsg" ;} ?>>
    </div>


    <div class="form-group">
      <label for="usr">Gender:</label>

      <select name="gender">
         <option value="select">Select</option>
         <option value="Male">Male</option>
         <option value="female">Female</option>
         <option value="other">Other</option>
      </select><br>
      </div>
      <div class="form-group">
      <label for="add">Address:</label>
      <input type="text" name="address"  placeholder="ex. bangalore" class="form-control" value="<?php if(isset($address)){echo $address;} ?>"
<?php if(isset($code) && $code == 9){echo "class=errorMsg" ;} ?>>
      </div>

      <input type="submit" class="btn btn-success" name="submit"  value="Submit">

      <p>
      Already a member? <a href="login.php">Login</a>
    </p>
  </form>
</div>
</div>
<?php include("footer.php");
 ?>

