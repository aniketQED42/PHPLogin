<?php  //User Welcome Page
    use aniket\PHPLogin\Connection;
    use aniket\PHPLogin\User;
    require 'vendor/autoload.php';

    session_start();
    $user = $_SESSION['uname'];
 if(!$user){
     echo"You need to login to see the Welcome Page!";  
     exit();
    }   echo'<h3>Welcome User<br></h3>';
        echo "Welcome".$user.", you are now logged in. Enjoy!";
        echo '<br><br>';
        echo '<a href="Logout.php"><button>LOGOUT</button></a>';
         
?>        
            