<?php
//include 'Connection.php';
function __autoload($class){
    include_once ($class.".php");
}
class User{
    public $name;
    public $dob;
    public $mobno;
    public $email;
    public $passwd;
    

    public function login($name,$passwd){
        $db = new Connection();
        //  print_r($db->dbh);
        //  exit();
        $p = md5($passwd);
        $result1 = $db->dbh->query("SELECT * FROM UserInfo WHERE uname = '$name' AND passwd = '$p'");
        $aa=$result1->fetchAll();
        
         return $aa;
        print_r($aa);
        
    }

    public function register($name,$dob,$mobno,$email,$passwd){
        $db = new Connection();
        $p = md5($passwd);
        $que="INSERT INTO UserInfo (uname, dob, mobno, email, passwd) VALUES ('$name', '$dob', '$mobno', '$email', '$p')";
        $stmt=$db->dbh->prepare($que);
        $aa = $stmt->execute();
        return $aa;
        print_r($aa);
    }
}

 //$obj = new User();
//$bb=$obj->login('Messi','messi');
// if($bb)
// echo"found";
// else
// echo"not";