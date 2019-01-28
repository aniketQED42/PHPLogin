<html>
	<body>
    <?php  
    session_start();
    $user = $_SESSION['uname'];
 if(!$user){
     echo"You need to login to see the Welcome Page!";
     
     exit();
 }     
			// $name=$_POST["uname"];
			// $passwd=$_POST["psw"];  
          
	        //     try {
            //     $user = "root";
            //     $pass = "root";
            //     $dbh = new PDO('mysql:host=localhost;dbname=UserLogin', $user, $pass);
            //     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     $result1 = $dbh->prepare("SELECT passwd FROM UserInfo WHERE uname = '$name'");
            //     $result1->execute();
            //     $result1->setFetchMode (PDO::FETCH_ASSOC);
            //     $r=$result1->fetch();
        
            //     if(strcmp($passwd,$r['passwd']))
            //         {
            //             echo "Error. Incorrect Password or Username!";
            //         }
            //     else{
            //             echo "$name, Welcome You are now logged in!";
                        

            //         }
            //     }

            //     catch (PDOException $e) {
            //     print "Error!: " . $e->getMessage() . "<br/>";
            //     die();
            //     }
            //     $dbh = null; 
            echo "Welcome $user, you are now logged in. Enjoy!";
            
            
    ?><br><br>
    <a href="Logout.php"><button>LOGOUT</button></a>
            </body>
            </html>