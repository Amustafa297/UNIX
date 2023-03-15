<?php


function sanitize($str, $length = 100)
{
  $str = trim($str);
  $str = htmlentities($str);
  return substr($str, 0, $length);
}

include('validations.php');

function set_url($url)
{
  echo "<script>history.replaceState({},'','$url');</script>";
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
//start session
include('../../../dbConn.php');

$url = $_SERVER['REQUEST_URI'];

if ($mysqli) {

  if (sanitize(!empty($_GET['uname'])) && sanitize(!empty($_GET['psw'])) && sanitize(!empty($_GET['pswRepeat']))) {
    //connect to db

    // include('../../../dbConn.php'); Because of how solace is setup its 3 ../
    //prepare // where uname is something (?)
    if (sanitize($_GET['psw']) === sanitize($_GET['pswRepeat'])) {
      $prepSql = 'INSERT into SignUpTable(username,password) VALUES(?,?)';
      $stmt = $mysqli->prepare($prepSql);
      echo $mysqli->error;
      // //bind parameter // one s because there is one ? (uname)
      $stmt->bind_param('ss', sanitize($_GET['uname']), sanitize($_GET['psw'])); // 2 s for 2 values
      // //execute
      $stmt->execute();
      // //bind result
      $stmt->close();

      $newURL = explode('?', $url)[0];
      set_url($newURL);
    } else {
      echo '<script>
        alert("Passwords do not match!");
      </script>';
      $newURL1 = explode('?', $url)[0];
      set_url($newURL1);
    }
  } else if (sanitize(!empty($_GET['unameLog'])) && sanitize(!empty($_GET['pswLog']))) {
    $res = $mysqli->query('SELECT username,password FROM SignUpTable');
    if ($res) {
      while ($row = $res->fetch_assoc()) {
        $records[] = $row;
      }
    }
    $counter = 0;
    if (!empty($records)) {
      foreach ($records as $nextRow) {
        $gottenName = $nextRow['username'];
        $gottenPass = $nextRow['password'];
        if ($gottenName === sanitize($_GET['unameLog']) && $gottenPass === sanitize($_GET['pswLog'])) {
          $newURL2 = explode('?', $url)[0] . '?uname=' . $gottenName;
          set_url($newURL2);
          $counter++;
        } // if empty next row
      } // foreach 
      if ($counter === 0) {
        echo '<script>
        alert("Incorrect password!");
      </script>';
        $newURL1 = explode('?', $url)[0];
        set_url($newURL1);
      } else {
        $counter = 0;
      }
    } // if empty records
  } // else if empty unameLog and pswLog

} // if(mysqli) end

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://kit.fontawesome.com/94284e611b.js" crossorigin="anonymous"></script>
  <title>Home</title>
  <link rel="icon" href="media/groopLogo.png">
</head>

<body id="bodyIndex">
  <!-- HEADER -->
  <!-- MAIN -->
  <main id="mainIndex">
    <div id="divIndex">
      <h1 id="h1Index">UNIX</h1>
      <div class="forQuote">
        <!--<span><i class="fa-solid fa-quote-left" style="color: white;"></i> </span>
                <span><i class="fa-solid fa-quote-right" style="color: white;""></i></span><br />-->
        <p style="width: 100%;">"If you have any trouble sounding condescending, find a Unix user to show you how it's done."</p>
        <p class="charles"> - Scott Adams</p>
      </div>
      <br />
      <div class="forQuote">
        <p>UNIX is here to make your life harder, I AM GROOOP to make life with Unix easier.</p>
      </div>
      <br />
      <div class="forQuote">
                <p>FIND OUT MORE ABOUT</p>
                <p>
                  -- <a href="whyUnix.html" class="indexLinks">why unix</a> --
                  <a href="history.html" class="indexLinks">history</a> --
                  <a href="types.html" class="indexLinks">types</a> --
                  <a href="installation.html" class="indexLinks">installation</a> --
                  <a href="usage.html" class="indexLinks">usage</a> --
                  <a href="quiz.html" class="indexLinks">quiz</a> --
                  <a href="whoWeAre.html" class="indexLinks">who we are</a> --
                </p>
                <br/>
                <p>FOR MORE</p>
                <div style="margin-left: 0px">
                  <button onclick="document.getElementById('login').style.display='block'" style="width:169px; font-size:16px;" class="btn1 foot1">Login</button>
                  <button onclick="document.getElementById('signup').style.display='block'" style="width:179px; font-size:16px;" class="btn1 foot1">Sign Up</button>
                  </div>
                  <br/>
            </div>
      <br />
      <!--<div class="forQuote">
                <p>MADE BY</p>
                <p>Ida Marija Mužić | Tia Lneniček | Arnes Poprženović<br/>Ardijan Mustafa | Lovro Mavrlja | Uejsi Hamja | Luka Bagić</p>
                <br/>
            </div>-->


    <div id="login" class="forForm">

      <form class="formContainer animation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

        <div style="margin: 24px 0 12px 0; position: relative;">
          <span onclick="document.getElementById('login').style.display='none'" class="close">&times;</span>
          <h4 class="h4Log">Login</h4>
        </div>

        <div class="container">
          <label for="uname" class="lblLog"><b>Username</b></label>
          <input type="text" class="inputLog" placeholder="Enter Username" name="unameLog" required>

          <label for="psw" class="lblLog"><b>Password</b></label>
          <input type="password" class="inputLog" placeholder="Enter Password" name="pswLog" required>
          <p class="psw" style="margin-top: -6px;"><a href="#" class="aForgPass">Forgot your password?</a></p>
          <button id="btnLogin" type="submit" class="btnLog btnGrad">Continue</button>
          <p class="or">or connect via social media</p>
          <button class="btnSocMedia btnLog"><a href="#" class="aSocMedia">
              <i class="fa-brands fa-facebook-square" style="font-size: 20px;"></i> Login with Facebook
            </a></button>
          <br /><br />
          <p class="psw" style="margin-bottom: 10px;">Not yet a member? <a href="#" class="aFormLink" onclick="goToSignUp()">Sign up now!</a></p>
        </div>

      </form>
    </div>

    <div id="signup" class="forForm">

      <form class="formContainer animation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <div style="margin: 24px 0 12px 0; position: relative;">
          <span onclick="document.getElementById('signup').style.display='none'" class="close">&times;</span>
          <h4 class="h4Log">Sign up</h4>
        </div>

        <div class="container">
          <label for="uname" class="lblLog"><b>Username</b></label>
          <input type="text" class="inputLog" placeholder="Enter Username" name="uname" required>

          <label for="psw" class="lblLog"><b>Password</b></label>
          <input type="password" class="inputLog" placeholder="Enter Password" name="psw" required>

          <label for="psw" class="lblLog"><b>Repeat Password</b></label>
          <input type="password" class="inputLog" placeholder="Enter Password Again" name="pswRepeat" required>

          <div id="wrongInput" style="color: darkred; display:none;">PASSWORDS DO NOT MATCH!</div>

          <p class="psw" style="margin-top: -6px;"><a href="#" class="aForgPass">Forgot your password?</a></p>

          <button type="submit" class="btnLog btnGrad">Continue</button>
          <p class="or">or connect via social media</p>
          <button class="btnSocMedia btnLog"><a href="#" class="aSocMedia">
              <i class="fa-brands fa-facebook-square" style="font-size: 20px;"></i> Sign Up with Facebook
            </a></button>
          <br /><br />
          <p class="psw" style="margin-bottom: 10px;">I already have an account, <a href="#" class="aFormLink" onclick="goToLogin()">Login!</a>
          </p>
        </div>
      </form>
    </div>

    </div>
  </main>
  <!-- FOOTER -->
  <footer style="background-color: black; color: white;">
    <p style="margin-bottom: 30px;">Project remarks:</p>

    <a href="#" class="btn1 foot1">References</a>
    <a href="#" class="btn1 foot1">Things Done</a>

    <p style="padding-top: 30px;">
      &copy; Copyright 2022<br />
      All rights reserved by I AM GROOOP. Powered by Solace.
    </p>
  </footer>

  <script src="assets/myScript.js"></script>

</body>

</html>