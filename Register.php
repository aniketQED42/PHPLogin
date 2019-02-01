<?php
session_start();
$user = $_SESSION['uname'];
 if($user && $_SESSION['aname']!='admin'){
     echo"Logout to go to the Registration Page!";
     echo '<a href="Logout.php"><button>LOGOUT</button></a>';
     exit();
 }
?>

<html>
    <head> </head>
        <body>
          
          
        <form  action="" method="POST">
                <div class="container">
                <?php if($_SESSION['aname']=='admin'){
                    echo '<h1> Welcome Admin';
                }else{
                  echo '<h1>Welcome To The Registration Page</h1>';}?>
                  <p><h3>Please fill in this form to create an account.</h3></p>
                  
                  <label for="uname"><b>Name</b></label>
                  <input type="text" placeholder="Enter Name" name="uname" required><br><br>

                  <label for="dob"><b>Date of Birth : </b></label>
                  <input type="text" placeholder="Enter DOB" name="dob" required><br><br>

                  <label for="mobno"><b>Mobile Number : </b></label>
                  <input type="text" placeholder="Enter Mobile Number" name="mobno" required><br><br>

                  <label for="email"><b>E-mail : </b></label>
                  <input type="text" placeholder="Enter your email-id" name="email" required><br><br>
              
                  <label for="passwd"><b>Password : </b></label>
                  <input type="password" placeholder="Enter Password" name="passwd" required><br><br>
                    
                   <?php //Additional functionality for admin registeration
                   if($_SESSION['aname']=='admin'){
                    echo '<h1> Welcome Admin';
                }?>
              
                  <button type="submit" class="registerbtn">REGISTER</button>
        </form> 
                               
                </div>
                
              </body>
</html>

<?php 
              //Calling Register Function from User Class
            //   include 'User.php';

            use aniket\PHPLogin\User;
            require 'vendor/autoload.php';

              error_reporting(E_ALL);
              ini_set('display_errors', 1);
              // echo 123;
              if($_SERVER["REQUEST_METHOD"]=="POST"){
              $obj = new User();
              $hashno = rand(10,100);    //Generating random hash no for user
              $result = $obj->register($_POST['uname'],$_POST['dob'],$_POST['mobno'],$_POST['email'],$_POST['passwd'],$hashno);
              $sendemail = $obj->mail($_POST['email'],$hashno);  //Call to Mail Function
              if(!$result){echo "Failed";}
              else { echo "A Email Verification Link has been sent to your registered email id : ".$_POST['email']." , Please Verify The Same!";}
            //   echo 123;
              }
?>