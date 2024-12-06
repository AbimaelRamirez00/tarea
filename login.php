<?php
include "connect.php";
if (isset($_POST["login"])){
    if ($_POST["usuario"] == "" or $_POST["email"] == "" or $_POST["pass"] == "") {
        echo "<center><h1>Usuario, Email y Contraseña no puede estar vacío!<h1></center>";
    } else {
        $email = trim($_POST["email"]);
        $usuario = strip_tags(trim($_POST["usuario"]));
        $pass = strip_tags(trim($_POST["pass"]));
        $query = $db->prepare("SELECT * FROM login WHERE email=? AND pass=?");
        $query->execute(array($email, $pass));
        $control = $query->fetch(PDO::FETCH_OBJ);
        if ($control > 0) {
            $_SESSION["usuario"] = $usuario;
            header("Location:index.php");
        }
        echo "<center><h1>Contraseña incorrecta o email!<h1></center>";
    }
}    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .wrapper {
            position: absolute;
            top: 20%;
            Left: 35%;
            padding: 10px;
            border: 15px solid red;
            width: 300px;
            height: 250px;
            line-height: 40px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form method="POST">
            <p>
                <label for="">Usuario</label>
                <input name="usuario" type="text">
            </p>
            <p>
                <label for="">Email</label>
                <input name="email" type="text">
            </p>
            <p>
                <label for="">Contraseña</label>
                <input name="pass" type="text">
            </p>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>