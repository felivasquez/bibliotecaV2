<?php
include('conex.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["correo"];
    $contrasena = $_POST["pass"];

    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM usuarios WHERE correo = ? AND contraseña = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {


        header("Location: inicio.php");
        exit();

    if ($result->num_rows > 0) {
        
        header("Location: inicio.php");
        exit();
    } else {
        echo "error";
    }
    $conexion->close();
    $stmt->close();
}
}
?>