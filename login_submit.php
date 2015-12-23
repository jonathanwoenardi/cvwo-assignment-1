<?php

session_start();

/*** checking ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}

/*** checking user input ***/
if(!isset( $_POST['username'], $_POST['password']))
{
    $message = 'Please enter a valid username and password.';
}
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
{
    $message = 'Username must be 4 to 20 characters long.';
}
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Password must be 4 to 20 characters long.';
}
elseif (ctype_alnum($_POST['username']) != true)
{
    $message = "Username must be alpha numeric";
}
elseif (ctype_alnum($_POST['password']) != true)
{
    $message = "Password must be alpha numeric";
}
else
/*** pass user input checking ***/
{
    $mysqli = mysqli_connect("localhost","root","password","cvwo1");

    if (mysqli_connect_errno())
    {
        $message = "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else
    {
        if(isset($_POST['login']))
        {
            $username = mysqli_real_escape_string($mysqli, $_POST['username']); 
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);

            $select_user = "SELECT * from cvwo1_writers where cvwo1_username = '$username' AND cvwo1_password='$password'";
            $run_user = mysqli_query($mysqli, $select_user);
            $check_user = mysqli_num_rows($run_user);

            if($check_user > 0)
            {
                $_SESSION['username'] = $username;
                $message = "You are now logged in";
            }
            else
            {
                $message = "Login failed";
            }
        }
        else
        {
            $message = "Not found";
        }
    }
}
?>
<html>
<head>
<title>Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>