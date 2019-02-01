<html>
<body>
<form method="POST" action="">
Select Filter : 
<select name="abc">
<option  value="all">All<br></option>
<option  value="admin">Only Admins<br></option>
<option  value="user">Only Users<br></option>


</select>
<input type="submit">
</form>

</body>
</html>


<?php //Displaying Records from DB
use aniket\PHPLogin\Connection;
use aniket\PHPLogin\User;
require 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
if($_SERVER["REQUEST_METHOD"]=="POST"){
$obj = new User();
$ob = $obj->display($_POST['abc']);


// var_dump($ob);exit();
echo "<table border=1>";
       echo "<tr><th>UserID</th><th>Username</th><th>Date of Birth</th><th>Mobile Number</th><th>E-mail</th><th>Password</th><th>Active</th><th>Hash</th><th>Role</th></tr>";
       for ( $row = 0; $row < count($ob); $row++ )
       {
           echo "<tr>";
           for ( $column = 0; $column < 9; $column++ )
           {
            echo "<td>";   
            echo $ob[$row][$column] ;
            echo "</td>";   
                
           }
           echo "</tr>";
       }
    }
?>