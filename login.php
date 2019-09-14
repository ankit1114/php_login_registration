<?php
session_start();
include("header.php");
if (isset($_POST['login'])){

  $user_name = $_POST['user_name'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $sql="SELECT * FROM `users` WHERE user_name='$user_name' && password='$password'";
	$query=mysqli_query($conn,$sql);
  $total=mysqli_num_rows($query);
  if ($_POST['password'] == $_POST['confirmpassword']) {

      if($total==1){
        if(isset($_SESSION['user_name'])){
    echo "you logged in as </br>", $_SESSION['user_name'];
    echo "<br/><a href='logout.php'>logout</a>";
  }
       header('location:index.php');
      }
    else{
      echo"login failed";
    }

  }
  $_SESSION['user_name'] = $user_name;
  $_SESSION['success'] = "You are now logged in";

 }


?>
 <div class="container">
    <h1>Login Page</h1>
         <?php
            if(isset($_SESSION["errorMessage"])) {
         ?>
            <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
         <?php
            unset($_SESSION["errorMessage"]);
              }
         ?>
     <form class="" action="#" method="POST">
       <labe>User Name:</label>
       <input type="text" class="form-control" name="user_name"><br>
       <labe>Password:</label>
       <input type="password" class="form-control" name="password" placeholder="*******" required="password" size="15"><br>

       <input type="submit" class="btn btn-success" name="login"  value="Login"><br>

       <p>New User <a href="registration.php">Register Here</a></p>

     </form>
  </div>
<?php include("footer.php");
?>
