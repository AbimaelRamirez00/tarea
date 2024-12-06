<?php session_start();
if(!isset($_SESSION["ususario"])){
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php login</title>
</head>
<body>
    <div>
        <center><h1>
            Welcome <?php echo $_SESSION["usuario"];?><br>
            Login exitoso... <br><br>
            <a href="logout.php">Salir</a>
        </h1></center>
    </div>
</body>
</html>