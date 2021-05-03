<?php
$con=mysqli_connect('localhost','root','','logs');
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Reset Password 
    </title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  
  </head>
  <style>
    
body{ 
  margin: 0;
  padding: 0;
  background: url(bg6.jpg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  font-family: Courier New;

 
}
.username 
{
  width: 100px;
  height: 100px;
  border-radius: 10%;
  overflow: hidden;
  position: absolute; 
  top: 25px;
  left: calc(50% - 43px);
}

#login-form {
  padding: 20px;
  background: rgba(0,0,0,.5);
  max-width: 320px;
  margin: 150px auto;
  border-radius: 30px;
  height: 420px;
  margin-top: 80px;
   box-shadow: 10px 10px 10px #343d47;
}
#login-form h1 {
  font-size: 1.5em;
  text-align: center;
  color: #C5B358;
}
#login-form h4 {

  margin-top: 30px;
  font-size: 15px;
  color: #C5B358;
}
#login-form h2 {

  margin-top: 30px;
  font-size: 20px;
  color: #C5B358;
}
#login-form label, #login-form input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  margin-top: 10px;
  height: 40px;
color:black;
 background: transparent;

 
}
#login-form button{ padding: 10px; }
#login-form button[type=submit] {
  cursor: pointer;
  border: none;
  outline: none;
  height: 40px;
  width: 100px;
  background: #fb2525;
  color: #fff;
  font-size: 15px;
  border-radius: 10px;
  margin-left: 20px;
  margin-top: 60px;

}
#login-form button[type=submit]: hover {
  background: #3B3C36;
  color: #000000;
}
#login-form  input{ padding: -10px; }
#login-form  input[type=signup ] {
  cursor: pointer;
  border: none;
  outline: none;
  height: 40px;
  width: 100px;
  background: #fb2525;
  color: #fff;
  font-size: 15px;
  border-radius: 10px;
  margin-left: 218px;
  margin-top: -40px;
  text-align: center;

}
l#login-form  input[type=signup]: hover {
  background: #3B3C36;
  color: #000000;
}
.loginbox input[type="checkbox"]{
  margin-left: 580px;
  margin-top: -810%;
}
.loginbox a{
    font-size: 12px;
  margin-left: 10px;
  color: white;


  }
.check1{
   margin-top: -290px;
   margin-left: 590px;
   color: white;

}
.check2{
   margin-top: -420px;
   margin-left: 590px;
   color: white;

}

.loginsign{
  font-size:10px;
  color: white;
  margin-top: 15px

}
.loginconn{
 margin-left: 250px;
  font-size:10px;

  margin-top: -10px;
}
 h3{
  margin-top:28px;
  margin-left: 10px;
 
  text-align: center;
  font-size: 20px;
   color:#C5B358;
}  

  </style>
  <body>
  <div class="loginbox">
    <form id="login-form"  action="resetp.php" method="POST">
      <center><h3>Input New Password</h3></center>
      <label for="newPassword"><h4><b>Enter New Password</b></h4></label>
      <input type="password"   placeholder="Enter New Password" name="newPassword" id="newPassword" required>
      <label for="confirmPassword"><h4><b>Re-type New Password</b></h4></label>
      <input type="password"  placeholder="Enter Password" name="confirmPassword" id="confirmPassword" required>

     
      <button class="Login"type="submit" name="change" >Confirm</button>
      <input class="signup"  value="Cancel" type="signup"  onclick="document.location='Login.php'"></input>
     <script>
 function myFunction1() {
  var x = document.getElementById("confirmPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 function myFunction2() {
  var x = document.getElementById("newPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>



</div>
 <?php
  if (isset($_POST['change'])){
    
    $newpass = $_POST['confirmPassword'];
    $pass = $_POST['newPassword']; 

    
    if($pass == $newpass){
      $user = $_SESSION['Username'];
      $update = mysqli_query($con, "UPDATE logindb SET Password = '$pass' WHERE Username = '$user'");
     


  date_default_timezone_set('Asia/Taipei');
   $time = date("Y-m-d h:i:s");
   $act3 =  "Reset Password";

   $next1 = "SELECT * FROM eventlog ORDER BY ID DESC LIMIT  1";
   $find1 = mysqli_query($con, $next1);
   $anotherOne1 = mysqli_fetch_assoc($find1);
   $name = $anotherOne1['user_id'];
   $queryy = mysqli_query($con, "INSERT INTO eventlog (Activity, user_id, date_time) VALUES ('$act3', '$name', '$time')"); 
   
   echo "<script>alert('Password have been RESET!!!');
   location.href='homepage.php';
   </script>";
    }
      else{
        echo '<script>alert("Password not match!")</script>';
      }
    
    

  }



?>

<?php 

$con=mysqli_connect('localhost','root','','logs');

?>
<div class="loginsign">


<?php

$id = "";
$username = "";
$password = "";
$email = "";




if($con)
  {
    echo "Connected";

  }
  else{
    echo "not";
  }



?>
       <div class="check1"><input type="checkbox" name="check" onclick="myFunction1()"><a>Show Password</a></div>  
</div>
  <div class="check2"><input type="checkbox" name="check" onclick="myFunction2()"><a>Show Password</a></div>  
</div>


 

  
</div>
</form>

</body>
</html>
