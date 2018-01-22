<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="registration1.css">
  <link rel="stylesheet" href="index.css">
</head>
<?php
////////////////////////////////////////////////////////////////////////////////

  //Checking empty input show errors
  //Defing variable to show error for empty field
    $fnameE=$lnameE=$emailE=$invalidemail=$pass1E=$pass2E=$genderE=$passdidntmatch="";
  //Defining variable to store user input so user dont have to write again
  //It is now not in use but for ajax
    $fnameA=$lnameA=$emailA=$pass1A=$pass2A=$genderA="";
  //Defining Error variable to store boolean error database
    $error=false;
    if (isset($_POST['submit'])) {
      //Checking everything is alright
      //chackeing empty then trimmming empty space for firstname
      if (empty(trim($_POST['firstname']))) {
        $error=true; $fnameE="no-input";
      }
      if (empty(trim($_POST['lastname']))) {
        $error=true; $lnameE="no-input";
      }
      if (empty(trim($_POST['email']))) {
        $error=true; $emailE="no-input";
      }
      if (empty(trim($_POST['password']))) {
        $error=true;$pass1E="no-input";
      }
      if (empty(trim($_POST['password2']))) {
        $error=true;$pass2E="no-input";
      }
      //chackeing password match
      if ($_POST['password']!=$_POST['password2']) {
        $passdidntmatch="<h4 style=\"background:red;color:white;width:321px;margin-bottom:5px;\">&nbsp&nbspPassword didn't match</h4>";
        //Setting error to prevent record a new data
        $error = true;
        //Giving the pass2 field a red border line using a class called "no-input"
        $pass2E = "no-input";
      }
      if (empty($_POST['gender'])) {
        $error=true;$genderE="<div id=\"radio-button-error\" style=\"margin:10px;color:red;display:inline;\">
        &nbsp&nbsp*Gender is required!
      </div>";
    }


////////////////////////////////////////////////////////////////////////////////

    //Connecting mysql if no error
    if ($error!=true) {
      // Create connection
      $conn = mysqli_connect('localhost', 'root', '', 'redneel');
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      //including the user agent file to the get browser and os data
      include('useragent.php');
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $email = $_POST['email'];
      $pass = $_POST['password'];
      //setting default of gender Male
      //what if someone change the radio buttons value??
      $gender = "Male";
      if ($_POST['gender']!=$gender) {
        $gender="Female";
      }

    $sql = "INSERT INTO users (first_name, last_name, email,password,gender,os,browser,http_user_agent)
    VALUES ('$fname', '$lname', '$email','$pass','$gender','$user_os','$user_browser','$user_agent')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    }

  }

?>


<!-- ------------------ HtML main code start -------------------- -->
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
  <div id="reg-wrapper" class="fr"><!-- reg-wrapper-height -->
    <div id="form-box">
        <form id='form' action=' <?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
          <div id="input-wrapper">
            <h2>Sign Up</h2>
            <?php echo $passdidntmatch;?>
            <?php echo $invalidemail;?>
            <div>
              <input class="input-field <?php echo $fnameE; ?>" type="text" name="firstname" placeholder="First Name">
            </div>
            <div>
              <input class="input-field <?php echo $lnameE; ?>" type="text" name="lastname" placeholder="Last Name">
            </div>
            <div>
              <input class="input-field <?php echo $emailE; ?>" type="text" name="email" placeholder="Email">
            </div>
            <div>
              <input class="input-field <?php echo $pass1E; ?>" type="text" name="password" placeholder="Password" >
            </div>
            <div>
              <input class="input-field <?php echo $pass2E; ?>" type="text" name="password2" placeholder="Re-type Password">
            </div>
            <div id="radio-button" class="fl">
              Male
              <input type="radio" value="Male" name="gender" autocomplete="off">
              Female
              <input type="radio" value="Female" name="gender" autocomplete="off">
              <?php echo $genderE; ?>
            </div>
            <div id="submit-button">
              <input type="submit" name="submit" value="Submit">
            </div>
        </div>
  	    </form>
      </div>
  </div>
  <div id="t-barrier"></div>

</body>
</html>
