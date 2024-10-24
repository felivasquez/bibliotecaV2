<?php include('../app/config/conex.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar prestamos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
          <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                  <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Agregar prestamo</a>
                  <a href="../public/inicio.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Volver al Inicio</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </nav>

    <!-- Formulario de Agregar Libro -->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Agregar un Nuevo prestamo</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Ingrese su ID de usuario</label>
                    <div class="mt-2">
                        <input name="idUser" type="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="idLibro" class="block text-sm font-medium leading-6 text-gray-900">Ingrese ID de libro</label>
                    <div class="mt-2">
                        <input id="idLibro" name="idLibro" type="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Agregar prestamo</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_usuario = $_POST['idUser'];
    $ID_libro = $_POST['idLibro'];
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $fechaPrest = $_POST['fechaPrest'] = date("Y-m-d H:i:s");
    $fechaDevu = $_POST['fechaDevu'] = date('Y-m-d', strtotime($fechaPrest . ' +1 week'));

    // Inserción en la base de datos
    $sql = "INSERT INTO prestamos (ID_usuario, ID_libro, fecha_prestamo	,fecha_devolucion) VALUES ('$ID_usuario', '$ID_libro', '$fechaPrest','$fechaDevu')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo prestamo agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>