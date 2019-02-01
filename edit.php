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
?>
<html>
<body>
<form action="edit1.php" method="POST">
<?php
// var_dump($ob);exit();
echo "<table border=1>";
       echo "<tr><th>UserID</th><th>Username</th><th>Date of Birth</th><th>Mobile Number</th><th>E-mail</th><th>Password</th><th>Active</th><th>Hash</th><th>Role</th><th>Update Link</th></tr>";
       for ( $row = 0; $row < count($ob); $row++ )
       {
           echo "<tr><td>";
           for ( $column = 0; $column < 9; $column++ )
           {
               
            echo $ob[$row][$column] ;
            echo "<td>";
             
            if ($column == 8)
            {
                echo "<a href=edit1.php?id=".$ob[$row][0]."&uname=".$ob[$row][1]."&dob=".$ob[$row][2]."&mobno=".$ob[$row][3]."&email=".$ob[$row][4]."&activeuser=".$ob[$row][6]."&roles=".$ob[$row][8].">EDIT</a>";
                echo "<td>";
            } 
                
           }
           echo "</tr>";
       }
    }
?></form></body></html>