<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    
</head>
<body>

<style>
    body{
    margin: 0;background-color: rgb(255, 247, 237);
}
::-webkit-scrollbar{
    width: 0;
}
header{
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color:antiquewhite;

}
h3{
    text-align: center;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color:  rgb(112, 191, 255);
}

.submit-btn{
    background-color: rgb(112, 191, 255);
    height: 6vmin;width:30vmin;
    border: none;border-radius: 2vmin;
    color:white;font-size:medium;
    transition: all 0.2s ease;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.submit-btn:hover{
    height: 7vmin; font-size:large;
}

</style>

    <header>
<h3>click on the button bellow to create a database</h3>
<form action="MySQLCreateDB.php" method="post">
     <input type="text" name="DBname"><br><br>
      <input type="submit" value="create DataBase" name="submit" style="cursor:pointer" class="submit-btn">
</form>

<?php
if(isset($_POST['submit']) && isset($_POST['DBname'])){
$servername = "localhost";
$username = "root";
$password = "";
$DBname = $_POST['DBname'] ;

try {
  $conn = new PDO("mysql:host=$servername",$username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE $DBname";
  $conn->exec($sql);
  echo "<h3>Database created successfully</h3><br>";
} catch(PDOException $e) {
  echo "<h3>{$e->getMessage()}</h3>";
}

$conn = null;
}
?>

</header>






</body>
</html>


