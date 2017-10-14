<?php

  $error = "";
  $successMessage = "";

  if ( $_POST ) {

    if ( !$_POST["email"]) {

      $error .= "An email address is required.<br>";

    }

    if ( !$_POST["subject"] ) {

      $error .= "A subject is required.<br>";

    }

    if ( !$_POST["question"] ) {

      $error .= "A question is required.<br>";

    }

    if ( filter_var($_POST["email"], FILTER_VALIDATE_EMAIL === false )) {
      $error .= "The email address is invalid.";
    }

    if ( $error != "" ) {
      $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    } else {

      $emailTo = "hey@its.me";
      $subject = $_POST['subject'];
      $content = $_POST['question'];
      $headers = "From: ".$_POST['email'];

      if ( mail($emailTo, $subject, $content, $headers) ) {
        $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
      } else {
        $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent, please try again later.</strong></p></div>';
      }

    }

  }


 ?>

<html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <title>ohai</title>

  </head>

  <body>

    <div class="container">
      <h1>Get in touch!</h1>
      <div id="errorDiv"><? echo $error.$successMessage; ?></div>
      <form method="post" id="myForm">
        <div class="form-group">
          <label for="inputEmail">Email address</label>
          <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter your email address">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="inputSubject">Subject</label>
          <input type="text" class="form-control" id="inputSubject" name="subject">
          </div>
        <div class="form-group">
          <label for="inputQuestion">What would you like to ask us?</label>
          <textarea class="form-control" id="inputQuestion" name="question" rows="3"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script type="text/javascript">

    console.log(document.getElementsByClassName('form'))

      document.getElementById('myForm').addEventListener("submit", function() {

        let error = "";

        if ( document.getElementById('inputEmail').value == "" ) {
          error += "The Email field is required.<br>";
        }

        if ( document.getElementById('inputSubject').value == "" ) {
          error += "The subject field is required.<br>";
        }

        if ( document.getElementById('inputQuestion').value == "" ) {
          error += "The content field is required.";
        }

        if ( error != "" ) {
          document.getElementById('errorDiv').innerHTML =
            '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>';

          return false;

        } else {

          return true;

        }

/*        if ( error != "" ) {
          $('#errorDiv').html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
        }
        console.log(document.getElementById('errorDiv').innerHTML)*/
      });


    </script>
  </body>
</html>
