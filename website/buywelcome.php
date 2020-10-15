<?php
  session_start();
  require('db.php');
  $str = file_get_contents('../Recommendation-system/moviedataset.json');
  $json = json_decode($str, true); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Current Movie Screenings | Bookify</title>
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
        <h2>Movies</h2>
        <span class="aside"><i>...current screenings in town.</i></span>
      </div>
      <?php
      $cnt=0;
      $i=0;
      $len=count($json);
      for($i=0;$i<$len-1;$i++)
      {
      $query = "SELECT * FROM film WHERE FilmName='".$json[$i]['title']."'";
      $record = mysqli_query($db_conn, $query) or die("Query Error!".mysqli_error($db_conn));
        while ($row = mysqli_fetch_array($record)) {
          $cnt=1;
      ?>
      <section class="movie">
        <div class="movie-left">
          <img src="img/<?php print $row['Poster'] ?>">
        </div>
        <div class="movie-right">
          <h1><?php print $row['FilmName'] ?></h1>
          <h3><b>Description</b>: <?php print $row['Description'] ?></h3>
          <h4><b>Director</b>: <?php print $row['Director'] ?></h4>
          <h4><b>Duration</b>: <?php print $row['Duration'] ?></h4>
          <h4><b>Category</b>: <?php print $row['Category'] ?></h4>
          <h4><b>Language</b>: <?php print $row['Language'] ?></h4>
          <form style="padding:0;" method="post" action="seatplantry.php">
            <select name="broadcast">
              <?php
                $query2 = "SELECT * FROM broadcast WHERE FilmId = ".$row['FilmId'];
                $record2 = mysqli_query($db_conn, $query2) or die("Query Error!".mysqli_error($db_conn));
                while ($row2 = mysqli_fetch_array($record2)) {
              ?>
              <!-- Drop down section -->
                <option value="<?php print $row2['BroadCastId'] ?>">
                  <?php print $row2['Dates'] . " " . $row2['Time'] . " (" . $row2['day'] . ") House " . chr(65 + $row2['HouseId'] - 1) ?>
                </option>
              <?php
                }
                mysqli_free_result($record2);
               ?>
             </select>
             <button type="submit" name="submit" id="submit" class="movie-button">Book Show</button>
          </form>
        </div>
      </section>
      <?php
        }
        mysqli_free_result($record);
      }
      ?>
    </main>

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
      mysqli_close($db_conn);
    ?>
    <script>

    </script>
  </body>
</html>
