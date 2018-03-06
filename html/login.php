<?php
echo "hello!".PHP_EOL;
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$user = $mysqli->escape_string($_POST['user']);
$sql = "select * from users where user = '$user';";
$result = $mysqli->query($sql);

var_dump($result);

if ( $result->num_rows == 0 )
{ // User doesn't exist
    echo "user doesn't exist".PHP_EOL;
    
}
else { // User exists
    $user = $result->fetch_assoc();

    if ($_POST['password'] == $user['password']) 
    {   
        $_SESSION['user'] = $user['user'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['commision'] = $user['com'];
        
        vardump($user);
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: sales.php");
    }
    else {
        echo "You have entered wrong password, try again!".PHP_EOL;
    }
}
?>