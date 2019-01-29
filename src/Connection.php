<?php 
namespace aniket\PHPlogin;
use \PDO;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Connection{

    public  $user = "root";
    public  $pass = "root"; 
    public  $dbh;

    public function __construct() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=UserLogin', $this->user, $this->pass);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
}

}
// $obj = new Connection();
// print_r($obj);
?>