<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) 
    { //user logging in
        
        require 'login.php';
    
    }
}
?>

<!DOCTYPE html>
<html>
<body>
  <div class="form">
    <div id="login">   
        <h1>Welcome Back!</h1>
        <form action="main.php" method="post" autocomplete="off">
            <label>
                Username<span class="req">*</span>
            </label>
            <input type="user" required autocomplete="off" name="user"/>
            
            <label>
                Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          
            <button class="button button-block" name="login" />Log In</button>
        </form>
    </div><!-- tab-content -->
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>