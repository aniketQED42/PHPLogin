<html>
    <head>
        <body>
        <h1>Welcome To The Login Page</h1>   
        <form method="POST" action="./Hello.php">
              <label for="uname"><b>Username : </b></label>
              <input type="text" placeholder="Enter Username" name="uname" required><br><br>
          
              <label for="psw"><b>Password : </b></label>
              <input type="password" placeholder="Enter Password" name="psw" required><br><br>
          
              <button type="submit" formaction="./Hello.php">Login</button>
             <a href="Register.php"> Click Here To Register</a>
            </form>
          </body>
    </head>
</html>