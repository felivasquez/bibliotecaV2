<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login- inicio </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<header>
</header>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrarse</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6"  method="POST">
            <!-- pide nombre -->
            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
              <div class="mt-2">
                <input id="email" name="nombre" type="text" autocomplete="Nombre" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <!-- pide apellido -->
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
              </div>
              <div class="mt-2">
                <input id="password" name="apellido" type="text" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <!-- pide correo -->
            <div>
              <div class="flex items-center justify-between">
                <label for="correo" class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
              </div>
              <div class="mt-2">
                <input id="correo" name="correo" type="text" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <!-- pide pass -->
            <div>
              <div class="flex items-center justify-between">
                <label for="pass" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              </div>
              <div class="mt-2">
                <input id="pass" name="contraseña" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>            

            <!-- Enviar form -->
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrarse</button>
            </div>
          </form>   
        </div>
    </div>
</body>
</html>     

<?php
include('../../app/config/conex.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir y validar los parámetros
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $email = $_REQUEST['correo'];
    $contraseña = $_REQUEST['contraseña'];
    
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fecha_registro = $_REQUEST['fechaReg']= date("Y-m-d H:i:s");

    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, fecha_registro) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssss', $nombre, $apellido, $email, $contraseña, $fecha_registro);

        if (mysqli_stmt_execute($stmt)) {
            echo "El usuario pudo inscribirse";
            header("Location: ../inicio.php");

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
}
?>
