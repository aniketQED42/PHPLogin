<html>
	<body>
    <?php error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "Connection.php";

$name=$_POST["uname"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$mobno=$_POST["mobno"];
$passwd=$_POST["passwd"];	         
	            try {
                        // $user = "root";
                        // $pass = "root";
                        // $dbh = new PDO('mysql:host=localhost;dbname=UserLogin', $user, $pass);
                        // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        // print_r($dbh);
                         $obj = new Connection();
                                            
                        $que="INSERT INTO UserInfo (uname, dob, mobno, email, passwd) VALUES ('$name', '$dob', '$mobno', '$email', '$passwd')";
                        print_r($obj); 
                        $stmt=$obj->prepare($que);
                        $stmt->execute();

                  } catch (PDOException $e) {
                  print "Error!: " . $e->getMessage() . "<br/>";
                  die();
                }
                $obj = null; 
            

        ?>
        <?php echo $name. "You have successfully registered! Please try to Log In"; ?>
        <form method="POST" action="./Hello.php">                          
              <label for="uname"><b>Username : </b></label>
              <input type="text" placeholder="Enter Username" name="uname" required><br><br>
          
              <label for="psw"><b>Password : </b></label>
              <input type="password" placeholder="Enter Password" name="psw" required><br><br>
          
              <button type="submit" formaction="./Hello.php">Login</button>
            </form>

	</body>
</html>