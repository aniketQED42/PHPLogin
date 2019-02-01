<?php
//  $userid = $_GET['id'];
// print_r($userid);?>
<html>
<head><body>
<form  action="" method="POST">
                <div class="container">
                
                    
                
                  <h1>Welcome To The Update Page</h1>
                  <p><h3>Please fill in this form to Update an account.</h3></p>

                  <label for="id"><b>ID :</b></label>
                  <?php echo $_GET['id']?><br><br>

                  <label for="uname"><b>Name</b></label>
                  <input type="text" value="<?php echo $_GET['uname']?>" name="uname" required><br><br>

                  <label for="dob"><b>Date of Birth : </b></label>
                  <input type="text" value="<?php echo $_GET['dob']?>" name="dob" required><br><br>

                  <label for="mobno"><b>Mobile Number : </b></label>
                  <input type="text" value="<?php echo $_GET['mobno']?>" name="mobno" required><br><br>

                  <label for="email"><b>E-mail : </b></label>
                  <input type="text" value="<?php echo $_GET['email']?>" name="email" required><br><br>
              
                  <label for="activeuser"><b>Active User : </b></label>
                  <input type="text" value="<?php echo $_GET['activeuser']?>" name="activeuser" required><br><br>

                  <label for="roless"><b>Role : </b></label>
                  <input type="text" value="<?php echo $_GET['roles']?>" name="roles" required><br><br>
                </select> </div>
                <button type="submit" class="registerbtn">UPDATE</button>
        </form> </body></head></html>
<?php
use aniket\PHPLogin\User;
require 'vendor/autoload.php';
error_reporting(E_ALL);
              ini_set('display_errors', 1);
              if($_SERVER["REQUEST_METHOD"]=="POST"){
                $obj = new User();
                $result = $obj->updateuser($_POST['id'],$_POST['uname'],$_POST['dob'],$_POST['mobno'],$_POST['email'],$_POST['activeuser'],$_POST['roles']);
                if($result)
                {
                    echo "User Updated Successfully!";
                }else{
                    echo "Failed!";
                }
            }
?>