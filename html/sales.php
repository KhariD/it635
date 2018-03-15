<?php
require 'db.php';

/* Displays user information and some useful messages */
echo "SALES REPRESENTATIVE<BR>";
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";

}
else 
{
    // Makes it easier to read
    echo "successfully logged in!!! :))<br>";

    $user = $_SESSION['user'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $phone = $_SESSION['phone'];
    $com = $_SESSION['commission'];

    echo "User: ".$user."<br>";
    echo "First: ".$fname."<br>";
    echo "Last: ".$lname."<br>";
    echo "Phone #: ".$phone."<br>";
    echo "Commission %: ".$com."<br>";
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        var_dump($_POST);
        
        if (isset($_POST['showVeh'])) 
        { //user logging in
            var_dump($_POST);
            //display vehicles

            echo "Showing Vehicles";
            
            /*
            $sql = "select * from vehicle";
            $result = $conn->query($sql);

            echo "<table border='1'>
            <tr>
            <th>Vin</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Miles</th>
            <th>Type</th>
            <th>Color</th>
            <th>Trans</th>
            <th>Price</th>
            </tr>";
            */
            
        
        }
    }

}
?>

<!DOCTYPE html>
<html>
<body>
  <div class="show veh">
    <div id="veh">   
        <h1>Welcome Back!</h1>
        <form action="sales.php" method="post" autocomplete="off">
            <button class="button button-block" name="showVeh" />Show Vehicles</button>
        </form>
    </div><!-- tab-content -->
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>