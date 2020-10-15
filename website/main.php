<?php
  session_start();
  require('db.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your Home | Bookify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png">
  </head>
  <body>

    <?php
      if (isset($_SESSION['username'])) {
    ?>
    <nav class="navigation1">
      <div class="logo">
        <img src="img/logo.png"> <h1> Bookify</h1><span><i>Cheap, Reliable, Instant</i></span>
      </div>
      <ul>
        <li class="special"><a href="buywelcome.php">Buy a Ticket</a></li>
        <li><a href="comment.php">Movie Review</a></li>
        <li><a href="history.php">Purchase History</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>

    <main>
      <div class="bar">
        <h2>Welcome, <?php print $_SESSION['username'] ?>!</h2>
        <span class="aside"><i>...welcome home.</i></span>
      </div>
      <p style="color:white">Want to book a movie ticket? You've come to the right place. Find movies, get showtimes and buy your tickets ahead of time to ensure you get the best seats--without having to wait in line.</p>
      <?php
          $cnt=0;
           $query = "SELECT TicketId,BroadCastId FROM ticket WHERE UserId = '" . $_SESSION['username'] ."' ORDER BY TicketId desc";
           $record = mysqli_query($db_conn, $query) or die("Query Error!".mysqli_error($db_conn));
           while ($row = mysqli_fetch_array($record)) {
             $cnt=1;
             $query2 = "SELECT * FROM broadcast WHERE BroadCastId = " . $row['BroadCastId'];
             $record2 = mysqli_query($db_conn, $query2) or die("Query Error!".mysqli_error($db_conn));
             $broadcastRow = mysqli_fetch_array($record2);
             mysqli_free_result($record2);
             $query2 = "SELECT * FROM film WHERE FilmId = " . $broadcastRow['FilmId'];
             $record2 = mysqli_query($db_conn, $query2) or die("Query Error!".mysqli_error($db_conn));
             $filmRow = mysqli_fetch_array($record2);
             mysqli_free_result($record2);
             $title = $filmRow['FilmName'];
            break;
            }
            if($cnt==1)
            {
              $response['title']=$title;
              $fp = fopen('movie.json','w');
              fwrite($fp, json_encode($response));
              fclose($fp);
              mysqli_free_result($record);
        ?>
      <a href="buywelcome.php"><button class="form-button">Book a movie ticket now</button></a>
    </main>
    <?php
            }
            else if($cnt==0)
            {
    ?>
    <a href="buywelcome2.php"><button class="form-button">Book a movie ticket now</button></a>
    </main>
    <?php
            }
    ?>
    <?php
      }
      else {
    ?>
    <nav>
      <div class="logo">
        <img src="img/logo.png"> <h1> Bookify</h1><span><i>Cheap, Reliable, Instant</i></span>
      </div>
    </nav>
    <main>
      <div class="bar">
        <h2>Oops...</h2>
        <span class="aside"><i>you don't seem to be logged in, redirecting you to login page.</i></span>
      </div>
      <i class="fas fa-exclamation-triangle full-icon"></i>
    </main>
    <?php
        header( "refresh:3;url=index.html" );
      }
    ?>

    <footer>

    </footer>
  </body>
</html>
