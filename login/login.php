<!DOCTYPE html>
<html>
  <head>
    <title>
      Login
    </title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="login.css">
  </head>
<?php
  $error=$emailE=$passE='';
  $error=false;
  if (isset($_POST['login'])) {
    if (empty(trim($_POST['email']))) {
      $error=true; $emailE="no-input";
    }
    if (empty(trim($_POST['userpass']))) {
      $error=true; $passE="no-input";
    }

    if ($error!=true) {
      include('db.php');
      ///////// Your Code goes here!
      /////// Database name: 'redneel' and table name 'users'
       ////////////
    }
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
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div id="input_wrapper">
        <input class="input-field <?php echo $emailE;?>" type="text" name="email" placeholder="Email"><br>
        <input class="input-field <?php echo $passE;?>" type="password" name="userpass" placeholder="Password"><br>
        <br>
        <input type="submit" name="login" value="Login">
        <input type="submit" name="forget" value="Forgot Password?" style="width:190px;margin-left:23px;background:orange">
      </div>
    </form>
  </body>
</html>
