 <?php 
 session_start();
 $user = $_SESSION['uname'];
 $admin = $_SESSION['aname'];
 if($user || $admin){
     echo"To go to Login Page plese Logout First!";
     exit();
 }
 ?>

 <html>
    <head>
        <body>
        <h1>Welcome To The Login Page</h1>   
        <form action="" method="POST">
              <label for="uname"><b>Username:</b></label>
              <input type="text" placeholder="Enter Username" name="uname" value="<?php if(isset($_COOKIE["uname"])){echo $_COOKIE["uname"];}?>" required><br><br>
          
              <label for="psw"><b>Password : </b></label>
              <input type="password" placeholder="Enter Password" name="psw" value="<?php if(isset($_COOKIE["psw"])){echo $_COOKIE["psw"];}?>" required><br><br>
          
              <input type="checkbox" name="rememberme">Remember Me<br>
             
              <button type="submit">LOGIN</button>
              
             <a href="Register.php"> Click Here To Register</a>
            </form>
          </body>
    </head>
</html>


<?php 
//Call to login function from User Class
// include 'User.php';

use aniket\PHPLogin\Connection;
use aniket\PHPLogin\User;
require 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
// function __autoload($class){
//     include_once ($class.".php");
//}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $obj = new User();
    $p = md5($_POST['psw']);
    $ob = $obj->checkadmin($_POST['uname'],$p);
    if ($ob){
        
        $_SESSION['aname'] = 'admin';
        header('location:adminpage.php');
    }
    else { 
        $result = $obj->login($_POST['uname'],$_POST['psw']);
        if(!$result){
                     echo "NOT A VALID USER!";
                     exit();
             }
             else {   
                     $_SESSION['uname'] = $_POST['uname'];
                     if ($_POST['rememberme']=='1'||$_POST['rememberme']=='on'){
                         setcookie('uname',$_POST['uname']);
                         setcookie('psw',$_POST['psw']);         
                     } header('location:Hello.php');
                 }
            }
}

?>
