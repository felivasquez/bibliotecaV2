<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<header class="header">
        <h1>Bienvenido/a a la Biblioteca Digital</h1>
    </header>
    <section class="seccion1">
        <nav>
            <ul>
              <li id="botonOpc"><a href="opcion.html">Inicio</a></li>
              <li id="botonAce"><a href="acerca.html">Acerca</a></li>
              <li id="botonSer"><a href="Servicios.html">Servicios</a></li>
              <li id="botonCon"><a href="contactos.html">Contacto</a></li>
              <li id="botoni2"><a href="libros.php  ">Libros</a></li>
            </ul>
        </nav>
    </section>
    <h1>Bienvenido/a <?php echo $_SESSION['user_name']; ?> </h1>
<body class="body">
<!--
    <a href="" onclick="mostrar()">Menu</a>
    <div class="containerMenu">
        <div class="insideMenu">
            <a "#">Inicio</a>
            <a href="#">categorias</a>
            <a href="#">Contacto</a>
            <a href="#">nosotros</a>
        </div>
-->
</body>
</html>