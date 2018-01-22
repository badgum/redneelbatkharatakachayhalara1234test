<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="login.css">
  </head>
<?php
  if (isset($_POSt['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'redneel');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     $uid = $_POST['uid'];
     $userpass = $_POST['userpass'];
  }

?>
  <body style="background:white;">
    <div id="gh" class="bwh ghh w100"><!--grand header color white-->
      <div id="ph" class="ghh w100"><!-- parent header -->

        <div id="lasb" class="fl"><!-- logo and search bar -->
          <div id="logo" class="fl">
            <a href="index.php"><!-- homepage anchored logo -->
              <img src="img/final2.png" alt="Redneel">
            </a>
          </div>
        </div><!-- lasb -->
      </div><!-- ph -->
    </div><!-- gh -->
    <div id="form-barrier"></div>
    <form method="post" action="<?php echo $_SERVER[PHP_SELF]; ?>">
      <div id="input_wrapper">
        <input class="input-field" type="text" name="uid" placeholder="Username or Email"><br>
        <input class="input-field" type="password" name="userpass" placeholder="Password"><br>
        <input type="submit" name="login" value="Login">
      </div>
    </form>
  </body>
</html>
