<?php
    //start the session
    session_start();
    $error_msg = '';
    //if submit is clicked
    if(isset($_POST['submit'])){
        //ask for database connection
        require_once('res/db/database.php');
        //create two data members to hold the value given by the user
        //mysqli_real_escape_string is a php method that assures backend of
        //non malicious content
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);
        
        // if one of the fields not completed
        if(empty($username) || empty($password) ){
            //alert a message
            $error_msg = 'Please complete all the fields!';
            echo '<script>alert("'.$error_msg.'");</script>';
        }else{//if the fields are completed
            //run the query
            $sql = "SELECT * FROM users WHERE username='$username'";
            //make a result with it
            $result=mysqli_query($mysqli, $sql);
            //checking if there are any users that match
            if(mysqli_num_rows($result) < 1){
                //output the message
                $error_msg = "The user '" . $username .  "' does not exist yet.";
                echo '<script>alert("'.$error_msg.'");</script>';
            }else{//fetch_assoc the result into a row[]
                if($row = mysqli_fetch_assoc($result)){
                    //check if the pwd is correct
                    //also dehashing the pwd
                    $pwd_dehash = password_verify($password, $row['password']);
                    if($pwd_dehash == false){//if the pwd is incorrect
                        //output this message, letting the user know this
                        $error_msg = "Hey " . $username .  ", incorrect password.";
                        echo '<script>alert("'.$error_msg.'");</script>';
                    }elseif($pwd_dehash == true){//if everything is fine
                        $_SESSION['user_id'] = $row['userID'];//create a session based on the userID
                        $_SESSION['username'] = $row['username'];//make a var to hold the name of the user
                        //redirect to dashboard
                        echo '<script>window.location.href ="dashboard.php";</script>';
                    }
                }
            }
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Travel Expert System">
        <meta name="keywords" content="Travel, System, Tourism, Romania, Destinations">
        <meta name="author" content="Iulian Oana">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="res/js/scroll.js"></script>
        <link rel="stylesheet" href="res/css/style.css" type="text/css">
        <title>Login | NeTravel</title>
    </head>
    
    <body>
        <div class="login-bg">
            <header>

                <nav class="navigation">
                    <h1><a class="logo" href="#">NeTravel</a></h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#find">Find</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </nav>
            </header>
            
            <section class="main-ctn-login">
                <article>
                    <h1>Log in</h1>
                </article>
            </section>
            
            <article class="login-section">
                <div id="login">
                    <form action="login.php" method="POST">
                        <input type="text" name="username" placeholder="username"/> <br />
                        <input type="password" name="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;"/>

                        <br /><br />
                        <div class="btns">
                        <input type="submit" name="submit" value="Login" />

                        </div>
                    </form>
                </div>
            </article>
            
            <footer class="login-footer">
                <nav class="footer_nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>|
                        <li><a href="index.php#find">Find</a></li>|
                        <li><a href="#">Login</a></li>
                    </ul>
                    <p class="credits">Copyright &#169; NeTravel Inc. All rights reserved.</p>
                </nav>
            </footer>
        </div>
    </body>
</html>
        