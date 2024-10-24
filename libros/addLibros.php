<?php include('../app/config/conex.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
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
                  <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Agregar Libro</a>
                  <a href="public/inicio.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Volver al Inicio</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </nav>

    <!-- Formulario de Agregar Libro -->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Agregar un Nuevo Libro</h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Título del Libro</label>
                    <div class="mt-2">
                        <input id="titulo" name="titulo" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="autor" class="block text-sm font-medium leading-6 text-gray-900">Autor</label>
                    <div class="mt-2">
                        <input id="autor" name="autor" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="año_publicacion" class="block text-sm font-medium leading-6 text-gray-900">Año de Publicación</label>
                    <div class="mt-2">
                        <input id="año_publicacion" name="año_publicacion" type="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="ID_categoria" class="block text-sm font-medium leading-6 text-gray-900">Categoría</label>
                    <div class="mt-2">
                        <input id="ID_categoria" name="ID_categoria" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="imageLink" class="block text-sm font-medium leading-6 text-gray-900">Imagen de Portada</label>
                    <div class="mt-2">
                        <input id="imageLink" name="imgLink" type="text" accept="image/*" required class="block w-full text-sm text-gray-900">
                    </div>
                </div>

                <div>
                    <label for="pdf_link" class="block text-sm font-medium leading-6 text-gray-900">Archivo PDF</label>
                    <div class="mt-2">
                        <input id="pdf_link" name="pdfLink" type="text" accept="application/pdf" required class="block w-full text-sm text-gray-900">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Agregar Libro</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include('../app/config/conex.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ISBN = $_POST['isbn'];
    $año_publicacion = $_POST['año_publicacion'];
    $ID_categoria = $_POST['ID_categoria'];
    // Procesar la imagen de portada
    $imageLink = $_POST['imgLink'];
    // Procesar el archivo PDF
    $pdf_link = $_POST['pdfLink'];

    // Inserción en la base de datos
    $sql = "INSERT INTO libros (titulo, autor, año_publicacion, ID_categoria, imageLink, pdf_link) VALUES ('$titulo', '$autor', '$año_publicacion', '$ID_categoria', '$imageLink', '$pdf_link')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo libro agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>
