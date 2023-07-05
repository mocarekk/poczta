<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Napisz wiadomość</title>
        <link rel="stylesheet" href="assets/style2.css">
    </head>
    <body>
   
    <nav class="navbar">
        <a href="home.php" class="active">Strona główna</a>
        <a href="yourgmail.php">Twoje wiadomości</a>
        <a href="sendgmail.php">Napisz wiadomość</a>
        <a href="index.php" >Wyloguj</a>
    </nav>
    
     
    <main>

        <h2>Napisz swoja wiadomość</h2>


  <form action="" method="post">
  <div class="form-group">
                <label for="dokogo">Do kogo chcesz wysłać wiadomość:</label>
                <select id="recipient" class="form-control" name="dokogo">
                    <?php
                    $conn=mysqli_connect("localhost","root","","poczta");
                    $query=mysqli_query($conn,"Select login from user;");
            
                         while($r=mysqli_fetch_row($query))
                         {
                            
                             echo "<option>$r[0]</option>";

                         }
                    ?>
                </select>
    </div>

    <div class="form-group">
        <label for="login">Tutaj zaznacz swoj login:</label>
        <select id="login" class="form-control" name="odkogo">
            <?php
                $conn=mysqli_connect("localhost","root","","poczta");
                $query=mysqli_query($conn,"Select login from user;");
            
                 while($row=mysqli_fetch_row($query))
                {
                         
                    echo "<option>$row[0]</option>";


                }

            ?>
        </select>
    </div>

    <div class="form-group">
                <label for="message">Wiadomość:</label>
                <textarea id="message" class="form-control" rows="5" name="wiadomosc">

                </textarea>
    </div>
            <div class="form-group">
                <button type="submit" class="form-button">Wyślij</button>
                <button type="reset" class="form-button">Wyczyść</button>
            </div>
            <?php
                if( empty($_POST['dokogo'])  || empty($_POST['odkogo']) ||  empty($_POST['wiadomosc']))
                {
                    echo "Wszystkie dane muszą być uzupełnione";
                }
                else{
                    $conn=mysqli_connect("localhost","root","","poczta");
                    $dokogo = $_POST['dokogo'];
                    $odkogo = $_POST['odkogo'];
                    $wiadomosc = $_POST['wiadomosc'];
                    $query=mysqli_query($conn,"insert into gmails set idodbiorcy='$dokogo', idnadawcy='$odkogo',  wiadomosc='$wiadomosc';");

                }
            ?>
        </form>
 
    </main>
    <div class="prawo">
        <h2>Twoja lista znajomych</h2>
        <br>
        <ul>
    <?php
        $conn=mysqli_connect("localhost","root","","poczta");
        $query=mysqli_query($conn,"Select login from user;");
    
        while($r=mysqli_fetch_row($query))
        {
       
            echo "<li>$r[0]</li>";
        }

    ?>
        </ul>
        </div>
<footer>

</footer>
</body>
</html>