<?php  include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
      <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Snapimal - Gotta snap 'em all</title>
        <meta name="description" content="Morphing Buttons Concept: Inspiration for revealing content by morphing the action element" />
        <meta name="keywords" content="expanding button, morph, modal, fullscreen, transition, ui" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
        <style>
          body {
            font-family: 'Raleway', sans-serif;
          }
        </style>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
        <script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
      </head>
  <body>
    <div class="container">
      <div class="icons-menu">
        <img src="img/search.svg" alt="Search" />
        <img src="img/plus.svg" alt="Submit" />
      </div>
      <div class="intro">
        <h3>Interact with other animal entuisiests and protect animals from hunting. Together. Snapimal works simply with three steps</h3>
          <dt>
            <span class="step-title">Submit your animal</span>
            <p>
              Add a photo, name, type and description to your find and submit it to the community! Your followers will automatically see this, and others will see it on the map!
            </p>
          </dt>

          <dt>
            <span class="step-title">Interect</span>
            <p>
              The comment section is there for a reason! Discuss the find with your friends!
            </p>
          </dt>
      </div>
      <div class="sign-up">
        <a href="#sign"><h1 href="#sign">Sign up</h1></a>
        <form id="sign" action="" method="post">
          <div class="form">
            <input class="sign-forms" type="text" name="name" value="" placeholder="Username...">
            <input class="sign-forms" type="password" name="name" value="" placeholder="Password...">
          </div>
          <input class="sign-submit" type="submit" name="Sign Up" value="Sign Up">
        </form>
      </div>
    </div>

  </body>
</html>
