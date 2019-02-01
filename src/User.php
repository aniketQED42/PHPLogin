<?php
namespace aniket\PHPlogin;
use aniket\PHPLogin\Connection;
//use \PDO;
require 'vendor/autoload.php';

// include 'Connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(E_ALL);
ini_set('display_errors', 1);
// }
class User extends Connection{
    public $name;
    public $id;
    public $dob;
    public $mobno;
    public $email;
    public $passwd;
    public $hashno;
    public $role;
    public $userid;
    public $activate;
    
    //Login Function
    public function login($name,$passwd){
        $db = new Connection(); //Connection to DB
        
        $p = md5($passwd); //Encrypting Password
        $result1 = $db->dbh->query("SELECT * FROM UserInfo WHERE uname = '$name' AND passwd = '$p' AND activeuser = 1");
        $aa=$result1->fetchAll();
        
         return $aa;
        print_r($aa);
        
    }
    //Registration Function
    public function register($name,$dob,$mobno,$email,$passwd,$activate,$hashno,$role){
        $db = new Connection();
        $p = md5($passwd);
        $que="INSERT INTO UserInfo (uname, dob, mobno, email,passwd,activeuser,hashno,roles) VALUES ('$name', '$dob', '$mobno', '$email', '$p','$activate','$hashno','$role')";
        $stmt=$db->dbh->prepare($que);
        $aa = $stmt->execute();
        return $aa;
        print_r($aa);
    }

    //Update Function
    public function updateuser($id,$name,$dob,$mobno,$email,$activate,$role){
        $db = new Connection();        
        $que="UPDATE UserInfo SET uname='$name', dob='$dob', mobno='$mobno', email='$email',activeuser='$activate',roles='$role' WHERE userid='$id'";
        $stmt=$db->dbh->prepare($que);
        $aa = $stmt->execute();
        return $aa;
        print_r($aa);
    }

    //Activating User After Email Verification 
    public function activateuser($email,$hashno){
        $db = new Connection();
        $stmt=$db->dbh->prepare("UPDATE UserInfo SET activeuser=1 WHERE email='$email' AND hashno='$hashno'"); 
        $stmt->execute();
        $result = $stmt->execute();
        if ($result){
            return true;
        } 
        else {
            return false;
        }
        
    } 

    //Checking for admin
    public function checkadmin($name,$passs)
               {
                   $dbh = new Connection();
                   $stmt=$dbh->dbh->prepare("SELECT userid FROM UserInfo WHERE uname='$name' and passwd='$passs' and roles='admin'");
                   $stmt->execute();
                   //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                   $r=$stmt->fetch();
                   if($r)
                   {
                       return true;
                   }
                   else
                   {
                       return false;
                   }
               }

    //Function to Delete User
    public function deleteuser($userid){
        $dbh = new Connection();
        if ($userid == 1){ return false;}
        else {$stmt=$dbh->dbh->prepare("DELETE FROM UserInfo WHERE userid='$userid'");
        $stmt->execute();
        $result = $stmt->execute();
        if ($result){
            return true;
        } 
        else {
            return false;
        }
        }
    }

    //Display Function
    public function display($role){
        $dbh = new Connection();
        if($role=="all"){
       $stmt=$dbh->dbh->prepare("SELECT * from UserInfo");}
       else{
           $stmt=$dbh->dbh->prepare("SELECT * from UserInfo where roles='$role'");
        }
        $stmt->execute();
        $result = $stmt->execute();
        $result1 = $stmt->fetchAll();
        if ($result1){
            return $result1;
        } 
        else {
            return false;
        }
        }

        
    
    

    //Email Function
    public function mail($email,$hashno){
        $db = new Connection(); 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
    $mail->Password = 'Vrushali@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('trupti.diwani@qed42.com', 'Mailer');
    $mail->addAddress($_POST['email'], 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'User Verification Mail';
    $mail->Body    = "Dear User, 
    Please click on the below link : http://localhost:8888/PHPLogin/verify.php?email=".$_POST['email']."&hash=".$hashno;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent <br>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

    }
}

?>