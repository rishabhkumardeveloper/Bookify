<?php
  session_start();
  require('db.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your Cart | Bookify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://ff.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=VpKrAVn5AqRlgNT3OVcUJ5T1fHSU_0zRFM8--hjrhkJr3D8VCMEkV868LifFO_f5yMEQGf7YPDBY5Ehvd1GV9PoslGo0Pjvpod3M22bXfoIFc386RsZWGog4y3GuNetPqY7VUv1aKgpuA7MLTYa6uoQhctw6QpGDU_xe8EUH7w4LqUtJDggHf9Fq1dM4C4_waGOylWcMOTjTK6Aof2yVc0MPFUREDraw_ZNSY6fIJdJpMVnBiwpFBTBj-EwVuRU2pH0lQLatt7PQ1lisCf65Tcya_AB3hz2lbjgowdL4f37zvmRFb_T6UGGdSlPFzzFKczo2Bb7oHLSEbJiMbyJtpG-D9vAGbIthkrgz0zrFt5djUapgfMxYsI_ygt_yT91-A89DLEn5WTbWHbd4F0ynfVsgswfyFAr6X_Mqd-VtYRsbao7bW4mTdE25mL9S-m2_uunnQ-pnWLm37uhZT5bD_Q" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://ff.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9kb2MtMHMtMzQtZG9jcy5nb29nbGV1c2VyY29udGVudC5jb20vZG9jcy9zZWN1cmVzYy9ndGYydGxwM2QxOTRtdmJic3Q1a2lrdGNjZDlybHM4bS9wbGE2aWswbmI5cHVhcGNibWJpbzRnbXM1bTBubm9jcy8xNjAyNzY3Nzc1MDAwLzE1MTI2NTg1MTMxNDg1NTgyMTg4LzA4NzcxODkwMjk5NTMwNjk0MDM1LzFXTzB6bHBMa05KZ2lhTVRpeE5DajBYNWN6eTNIaXludz9lPWRvd25sb2FkJmF1dGh1c2VyPTAmbm9uY2U9YmdxYzg1aWVvOWRicyZ1c2VyPTA4NzcxODkwMjk5NTMwNjk0MDM1Jmhhc2g9dHE5ZmxlbGRsZnQ3MXQzanY5aW5kZDF2MzFsN3ZuOHE"/></head>
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
        <h2>Order Confirmed</h2>
        <span class="aside"><i>...here's your order information.</i></span>
      </div>
      <?php

        $query = "SELECT * FROM broadcast WHERE BroadCastId = " . $_POST['broadcast'];
        $record = mysqli_query($db_conn, $query) or die("Query Error!".mysqli_error($db_conn));
        $broadcastInfo = mysqli_fetch_array($record);
        mysqli_free_result($record);

        $broadcastID = $_POST['broadcast'];
        $username = $_SESSION['username'];
        $query = "SELECT * FROM film WHERE FilmId = " . $broadcastInfo['FilmId'];
        $record = mysqli_query($db_conn, $query) or die("Query Error!".mysqli_error($db_conn));
        $filmInfo = mysqli_fetch_array($record);
        mysqli_free_result($record);
      ?>
      <?php
        $total = 0;
        for ($i = 0; $i < sizeof($_POST['seat']); $i++) {
          list($row,$col) = explode('|', $_POST['seat'][$i]);
          $rowName = chr(65 + $row - 1);
      ?>
      <section>
        <p><b>Cinema</b>: Broadway</p>
        <p><b>House</b>: House <?php print chr(65 + $broadcastInfo['HouseId'] - 1) ?></p>
        <p><b>SeatNo</b>: <?php print $rowName . $col ?></p>
        <p><b>Film</b>: <?php print $filmInfo['FilmName'] ?></p>
        <p><b>Category</b>: <?php print $filmInfo['Category'] ?></p>
        <p><b>Show Time</b>: <?php print $broadcastInfo['Dates'] . " " . $broadcastInfo['Time'] . " (" . $broadcastInfo['day'] . ")" ?></p>
        <p><b>Ticket Fee</b>: <?php
          $total = $total + $_POST['type'][$i];
          if ($_POST['type'][$i] == 50)
            print "Rs. 50(Student/Senior)";
          else
            print "Rs. 75(Adult)";

        ?></p>
        <?php
          $ticketFee = $_POST['type'][$i];
          $ticketType;
          if ($ticketFee == 50)
            $ticketType = "Student/Senior";
          else
            $ticketType = "Adult";
          $query = "INSERT INTO ticket(SeatRow, SeatCol, BroadCastId, Valid, UserId, TicketType, TicketFee) VALUES ('$row', '$col', '$broadcastID', 'YES', '$username', '$ticketType', '$ticketFee')";
          mysqli_query($db_conn, $query) or die("Query Error!".mysqli_error($db_conn));
         ?>
      </section>
      <?php
        }
      ?>
      <section style="padding: 1rem 3rem;">
        <h3>Total Fee: $ <?php print $total ?></h3>
        <p>Please present valid proof of age/status when purchasing Student or Senior tickets before entering the cinema house.</p>
        <a href="buywelcome.php">
          <button type="button" name="okay" class="form-button">Okay!</button>
        </a>
      </section>
      <div id="webchat"/>
      <script src="https://cdn.jsdelivr.net/npm/rasa-webchat/lib/index.min.js"></script>

      
      <script>
        WebChat.default.init({
          selector: "#webchat",
          customData: {"language": "en"}, // arbitrary custom data. Stay minimal as this will be added to the socket
          socketUrl: "http://localhost:5005",
          socketPath: "/socket.io/",
          title: "Movie Bot",
          subtitle: "moviebot!",
        })
      </script>
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
  </body>
</html>
