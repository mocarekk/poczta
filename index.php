<!DOCTYPE html>
<html>
<head>
  <title>Panel logowania</title>
  <link rel="stylesheet" href="assets/style.css">

</head>
<body>
  <div class="container">
    <h2>Logowanie</h2>
    <form action="index.php" method="POST">
      <label for="username"><b>Użytkownik:</b></label>
      <input type="text" placeholder="Wprowadź nazwę użytkownika" name="username" required>
  
      <label for="password"><b>Hasło:</b></label>
      <input type="password" placeholder="Wprowadź hasło" name="password" required>
  
      <button type="submit">Zaloguj</button>
      <?php
        require_once 'config.php';
        if(empty($_POST['username']) && empty($_POST['password']))
        {
            echo "Wszystkie dane muszą być uzupełnione";
        }
        else
        {
           
            $username=$_POST['username'];
            $password=$_POST['password'];
            $query=mysqli_query($connect,"select login,haslo from user where login ='Jakub' and haslo='haslo';");
            $query1=mysqli_query($connect,"select login,haslo from user where login ='Marek' and haslo='haslo';");

            if(strlen($username) < 3 || strlen($password) < 3){
                echo"Dane musza miec przynajmniej 3 znaki <br>";
                
            }

            $row=mysqli_fetch_row($query);
            $row1=mysqli_fetch_row($query1);

            if($username == $row[0] && $password == $row[1])
            {
                header('Location:home.php');
            }
            else
            {
                echo"Podany login lub haslo sa nieprawidlowe <br>";
            }


            if($username == $row1[0] && $password == $row1[1])
            {
                header('Location:home.php');
            }
           


        }
      ?>
    </form>
  </div>
</body>
</html>






