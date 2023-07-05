<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje Wiadomości</title>
    <link rel="stylesheet" href="assets/style2.css">
</head>
<body>
<nav class="navbar">
<a href="home.php" class="active">Strona główna</a>
    <a href="yourgmail.php">Twoje wiadomości</a>
    <a href="sendgmail.php">Napisz wiadomość</a>
    <a href="index.php" >Wyloguj</a>
  </nav>
    <br>
    <br>
    <br>
    <br>
  <p>
    <?php
      $conn=mysqli_connect("localhost","root","","poczta");
      $kwerenda="select idnadawcy,wiadomosc from gmails where idodbiorcy='Jakub'";
      $kwerenda1="select idnadawcy,wiadomosc from gmails where idodbiorcy='Marek'";
      $query=mysqli_query($conn,$kwerenda);
      $query1=mysqli_query($conn,$kwerenda1);


    while($row=mysqli_fetch_row($query))
   {
      echo "<p id='jakub'>Dostales wiadomosc od $row[0] o treści: <br> $row[1]</p> <br> <br>";
   }


   while($row=mysqli_fetch_row($query1))
   {
      echo "<p id='marek'>Dostales wiadomosc od $row[0] o treści: <br> $row[1]</p> <br> <br>";
   }
  ?>
  </p>

  
</body>
</html>