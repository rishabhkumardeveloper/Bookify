<?php
  session_start();
  session_unset();
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bookify - The only place to book your movie tickets!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
  </head>
  <body>
    <nav class="navigation1">
      <div class="logo">
        <img src="img/logo.png"> <h1> Bookify</h1><span><i>Cheap, Reliable, Instant</i></span>
      </div>
    </nav>
    <main>
      <div class="bar">
        <h2>Thanks for visiting, logging you out</h2>
        <span class="aside"><i>you're being logged out, and redirected back to the home page.</i></span>
      </div>
      <i class="fas fa-check-square full-icon"></i>
    </main>
  </body>
</html>
<?php
  header( "refresh:3;url=index.html" );
?>
