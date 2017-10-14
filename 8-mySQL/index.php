<?

$link = mysqli_connect ("shareddb1c.hosting.stackcp.net", "myUsers-31361845", "M937%zD78fR&#7k", "myUsers-31361845");

if (mysqli_connect_error()) {
  die ("There was an error connecting to the database.");
}


function valid_email($email) {
  return !!filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_POST) {
  $email = $_POST['inputEmail'];
  $password = $_POST['inputPassword'];
  $error = "";
  $success = "";

  if (!$email) {
    $error .= "Gotta put in an email ";
  } else {
     if ( !valid_email($email) ) {
      $error .= "Invalid Email ";
    }
  }

  if (!$password) {
    $error .= "Invalid Password ";
  }

  $query = "SELECT `id` from `users` where email = '".mysqli_real_escape_string($link, $email)."'";
  $result = mysqli_query($link, $query);

  if ( mysqli_num_rows($result) > 0 ) {
    $error .= "Email already used ";
  }

  if ( $error == "" ){
    $query = "INSERT INTO `users` (`email`, `password`) VALUES('".mysqli_real_escape_string($link, $email)."',  '".mysqli_real_escape_string($link, $password)."')";

    if ( mysqli_query($link, $query) ) {;

      $success = "Successfully signed up.";

    } else {
      $error .= "There was a problem with the database."
    }
  } else {
    $error = "<p>".$error."</p>";
  }


}


?>

<!DOCTYPE html>
<html>

  <head>

    <title>my site</title>

  </head>

  <body>
    <h1>What are your email and password?</h1>
    <form method="post">
      <div>
        <label for="inputName">Email
        <input type="text" id="inputEmail" name="inputEmail"></input>
      </div>
      <div>
        <label for="inputName">Password
        <input type="password" id="inputPassword" name="inputPassword"></input>
      </div>
      <div>
        <button type="submit" id="myButton">Submit</button>
      </div>
    </form>
    <div id="errorOutput"><? echo $error.$success; ?></div>

    <script>

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  document.getElementById("myButton").onclick = function() {
    let errorMessage = "";

    if ( validateEmail(document.getElementById("inputEmail").value) == false ) {
      errorMessage += "Invalid Email ";
    }

    if ( document.getElementById("inputPassword").value == "" ) {
      errorMessage += "Need a password";
    }

    console.log(errorMessage);

    if ( errorMessage == "" ) {
      return true;
    } else {
    document.getElementById('errorOutput').innerHTML = errorMessage;
    return false;
  }

  }


    </script>
  </body>

</html>
