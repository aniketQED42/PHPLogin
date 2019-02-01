<?php //Welcome Admin Page
session_start();
$user = $_SESSION['aname'];
print_r($user);
// print_r($_SESSION['uname']);exit();
 if(!$user){
     echo"To go to Login Page plese Logout First!";
     exit();
 }

?>
<html>
<head>
</head>
<body>
<h3>Welcome ADMIN.</h3>

<br><a href="Register.php"><button>Register a New User</button></a>
<a href="records.php"><button>View Database Records</button></a>
<a href="edit.php"><button>Edit User Data</button></a><br>
<form action="" method="POST"><br>
              <label for="userid"><b>UserID:</b></label>
              <input type="text" placeholder="Enter ID to be Deleted" name="userid" required>
<a href=""><button>Delete an User</button></a>
</form>

<?php
// print_r($user);exit();
use aniket\PHPLogin\Connection;
use aniket\PHPLogin\User;
require 'vendor/autoload.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$obj = new User();
$ob = $obj->deleteuser($_POST['userid']);   //Call to Delete Function
if($ob){
    echo 'Selected User deleted<br>';
}else{
    echo 'Delete Operation N.A.<br><br>';
}
}
?>

<a href="Logout.php"><button>LOGOUT</button></a>
</body>
</head>
</html> 