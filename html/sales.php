<?php
/* Displays user information and some useful messages */
echo "SALES REPRESENTATIVE<BR>";
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";

}
else {
    // Makes it easier to read
    echo "successfully logged in!!! :))<br>";

    $user = $_SESSION['user'];
    $fname = $_SESSION['first_name'];
    $lname = $_SESSION['last_name'];
    $phone = $_SESSION['email'];
    $com = $_SESSION['commission'];

    echo "User: ".$user."<br>";
    echo "First: ".$fname."<br>";
    echo "Last: ".$lname."<br>";
    echo "Phone #: ".$phone."<br>";
    echo "Commission %: ".$com."<br>";
}
?>