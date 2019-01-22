<html>
	<body>
    <?php 

$name=$_POST["uname"];
$dob=$_POST["dob"];
$email=$_POST["email"];
$mobno=$_POST["mobno"];
$passwd=$_POST["passwd"];		         
	            try {
                        $user = "root";
                        $pass = "root";
                        $dbh = new PDO('mysql:host=localhost;dbname=UserLogin', $user, $pass);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //$queryobject =  new InsertQuery();                        
                        $que="INSERT INTO UserInfo (uname, dob, mobno, email, passwd) VALUES ('$name', '$dob', '$mobno', '$email', '$passwd')";
                        $stmt=$dbh->prepare($que);
                        $stmt->execute();

                  } catch (PDOException $e) {
                  print "Error!: " . $e->getMessage() . "<br/>";
                  die();
                }
                $dbh = null; 
            

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