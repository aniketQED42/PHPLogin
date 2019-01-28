<?php 

// include ('Connection.php');
include ('User.php');

//$obj = new Connection();
// $ob = $obj->dbh;

$obj = new User();
$ob = $obj->activateuser($_GET['email'],$_GET['hash']);
?>
<html>
</head>
<h1> Your account is active please try to <a href="Logout.php">LOG IN</a> </h1>

</head>
</html>