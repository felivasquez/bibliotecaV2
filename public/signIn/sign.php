<?php
include('conex.php');

// Recibir y validar los parámetros
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$email = $_REQUEST['correo'];
$contraseña = $_REQUEST['contraseña'];
$fecha_registro = $_REQUEST['fecha_registro'];

$sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, fecha_registro) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssss', $nombre, $apellido, $email, $contraseña, $fecha_registro);
        if (mysqli_stmt_execute($stmt)) {
        echo "El usuario pudo inscribirse";
        header("Location: inicio.php");

        session_start(); // Start the session
        $_SESSION['user_name'] = $nombre; // Store the user's name in a session variable
        $_SESSION['status'];

        exit();
                
    } else {
        echo "Error al inscribir al usuario: " . mysqli_stmt_error($stmt);
    }
        mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la consulta: " . mysqli_error($conexion);
}
mysqli_close($conexion);
?>
