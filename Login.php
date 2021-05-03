<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head >
  <title>Login</title>
<br><br><br><br><br><br><br>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Courier New;}
form {border: 2.5px background: linear-gradient(#33ccff,#ff99cc); width:50%;}

.container {
  padding: 15px;
  background: linear-gradient(#ff99cc,#33ccff);
}
input[type=text],input[type=password]{
  width: 40%;
  padding: 12px 15px;
  margin: 10px 0;
  display: inline-block;
  border: 1.5px solid #aaa;
  box-sizing: border-box;
}

button {
  background-color: green;
  color: black;
  padding: 10px 20px;
  margin: 8px 0;
  border: thick;
  cursor: pointer;
  width: 53%;

}

button:hover {
  opacity: 1;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0%;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color:linear-gradient(#33ccff,#ff99cc)

}


/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: RED;
  text-decoration: none;
  cursor: pointer;
}

    /* Modal Header */
.modal-header {
  padding: 2px 16px;
   background: linear-gradient(#33ccff,#ff99cc)
  color: black;
}

/* Modal Body */
.modal-body {
  padding: 8%;
  color: linear-gradient(#33ccff,#ff99cc);
}
.modal-body input{
  padding: 5%;
}

/* Modal Footer */
.modal-footer{
  color: linear-gradient(#33ccff,#ff99cc);
  }
.rs{
  
  width: 30%;
  height: 40px;
  cursor: pointer;
  border: none;
  outline: none;
  color: black;
  font-size: 16px;
  background:  #4CAF50;
  border-radius: 5px;
  border:2px solid gray;
  margin: 5% 5% 5%;
}
.csub{

  width: 30%;
  height: 40px;
  cursor: pointer;
  border: none;
  outline: none;
  color: black;
  font-size: 16px;
  background: #4CAF50;
  border-radius: 5px;
  border:2px solid gray;
  margin-left: 23%;
}


.rs:hover, .csub:hover
{
       background: linear-gradient(#33ccff,#ff99cc);
       color: black;
       border:2px solid white;
}

/* Modal Content */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  border: 1px solid gray;
  box-shadow: 100px red;
  width: 30%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.6s;
  margin-top: 20%;
  border-radius: 5px;
  background: linear-gradient(#33ccff,#ff99cc);
}

/* Add Animation */
@keyframes animatetop {
  from {top: -300px; opacity: 0}
  to {top: 0; opacity: 1}
}

.modal-body input { 
  width: 95%; 
  margin-bottom: 10px; 
  background: rgba(130,130,100,0.3);
  border: none;
  outline: none;
  padding: 10px;
  font-size: 13px;
  color: black;
  border: 1px solid rgba(0,0,0,0.3);
  border-radius: 4px;
  box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
  margin-top: 10px;
  margin-left: 2%;

}



</style>
</head>
<body style="background: linear-gradient(#33ccff,#ff99cc);">

<h2>Login Form</h2>

<form action="Login.php" method="post">


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" id="uname" required>
<br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    <input type="checkbox" onclick="Toggle()"> 
    <b>Show Password</b> 
   <script> 
    // Change the type of input to password or text 
        function Toggle() { 
            var temp = document.getElementById("psw"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 
<button type="submit" name="submit1">Login</button>
  
  </div> 
    <label>
     <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
<br>
<div class="container signup">
    <p>Not yet a member? <a href="reg.php">Sign Up</a>.</p>
<!--MODAL-->
    <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Verification</h2>
      </div>

    
        <div class="modal-body">
          <table>
            <tr>
              <td>Authentication Code: </td>
              <td><input type="text" name="code" id="code"> </td>
              <td>
            </tr>
          </table>
          
        </div>
        <div class="modal-footer">
          <button name="Cancel" id="Cancel" class="rs">Cancel </button>
          <button name="submit2" id="submit2"  class="csub">Submit</button>
          
        </div>
     
    
    </div>

</div>




<script type="text/javascript">
 // Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
// When the user clicks on <span> (x), close the modal

var button = document.getElementById("sub1");


span.onclick = function() {
   modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
     modal.style.display = "none";
  }
}

</script>

</div>

<?php
  if(isset($_POST['submit1'])){

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "logs";

        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

        $user = $_POST['uname'];
        $pass = $_POST['psw'];

        $select = "select * from logindb where Username = '$user' ";
        $select1 = "select * from logindb where Password = '$pass'";
        $result = mysqli_query($con, $select);
        $result1 = mysqli_query($con, $select1);
        $num = mysqli_num_rows($result);
        $num1 = mysqli_num_rows($result1);

        date_default_timezone_set('Asia/Taipei');
         $time = date("Y-m-d h:i:s");
         $_SESSION['Username'] = $user;
         $act1 = "LOGIN";
         $queryy = mysqli_query($con,"INSERT INTO eventlog (Activity, user_id, date_time) VALUES ('$act1', '$user', '$time')"); 


          
        if($num == 1){
          if($num1 == 1){
            $randcode=(rand(100000,999999));
            $user = $_POST['uname'];
            $userquery = "SELECT ID from logindb where Username = '$user'";
            $result = mysqli_query($con, $userquery);
            
            $time = date("Y-m-d h:i:s");
          
            $currentDate = strtotime($time);
            $futureDate = $currentDate+(60*5);
            $formatDate = date("Y-m-d H:i:s", $futureDate);

            
            $codeins = "INSERT INTO authentication (userid,code,oras,exptime)  SELECT ID,'$randcode','$time','$formatDate' FROM logindb  where Username = '$user' ";
            $result1 = mysqli_query($con, $codeins);

            echo '<script>alert("Your Authentication Code is: '.$randcode.'" );
            modal.style.display = "block";
          
            </script>';
            
            
            
           
          }
          elseif($num1 != 1){
            echo '<script>alert("Wrong Password!")</script>';
          }
        }

        
        elseif($num1 == 1){
          if($num != 1){
          echo '<script>alert("Wrong Username!")</script>';
          }
        }
        else{
          echo '<script>alert("User does not exist!")</script>';
        }
    
  }



  //AUTHENTICATION

  if(isset($_POST['submit2'])){

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "logs";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

    $code=$_POST['code'];
    $getcode = "SELECT * FROM authentication WHERE code = '$code'";
    $coderes = mysqli_query($con,$getcode);
    $num = mysqli_num_rows($coderes);
    

    $getexp = "SELECT exptime FROM authentication where code = '$code'";
    $expres = mysqli_query($con,$getexp);
    $num2 = mysqli_fetch_assoc($expres);

  

    if($num>0){
        $curtime = date("Y-m-d h:i:s");

        $today = strtotime($curtime);
        $exp = strtotime($num2['exptime']);

        $diff = $exp - $today;
        $minuto = $diff / 60;


       
        if($minuto>=0 ){
           echo'<script>
      window.alert("login Successfully");
      window.location.replace("homepage.php");
      </script>';
        }
        else{
          echo'<script>
      window.alert("Code Expired");
      modal.style.display="block";
      </script>';
        }


    }
    
  }





  if(isset($_POST['Cancel'])){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "logs";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

    $print = "SELECT * FROM authentication ORDER BY id DESC LIMIT 1";
    $searchres = mysqli_query($con,$print);
    $num2 = mysqli_fetch_assoc($searchres);
    $newid = $num2['userid']; 


    $nrandcode=(rand(100000,999999));
            
    $newtime = date("Y-m-d h:i:s");
  
    $ncurrentDate = strtotime($newtime);
    $nfutureDate = $ncurrentDate+(60*5);
    $nformatDate = date("Y-m-d h:i:s", $nfutureDate);

    
    $ncodeins = "INSERT INTO authentication (userid,code,oras,exptime)  SELECT '$newid','$nrandcode','$newtime','$nformatDate' ";
    $nresult1 = mysqli_query($con, $ncodeins);

    
       
    
    echo '<script>alert("Your Authentication Code is: '.$nrandcode.'" );
    modal.style.display = "block"
  
    </script>';

  }

?>

</form>
</body>
</html>