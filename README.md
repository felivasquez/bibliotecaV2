# biblioteca

Proyecto: 
desarollo de sistemas.
6to 4ta

PROFESOR/ES: 
Torrez, Gonzalo.
Abregu, Lucas.

ALUMNOS: 
Vasquez, Felipe.
Ruiz Diaz, Belen Luz.
Sosa, Julian.

MATERIA:
Laboratorio Web. Dinámicas.

Documentación:

Documentación técnica de la base de datos.

La base de datos tiene 5 tablas:

1.Usuarios: 
campo 1: ID_usuario
campo 2: Nombre
campo 3: Correo
campo 4:Contraseña
campo 5: Fecha_registro

2.Categorias
campo 1 :ID_categoria
campo 2: Nombre_categoria

3.Libros
campo 1: ID_libros
campo 2: titulo
campo 3: autor
campo 4: ISBN
campo 5: año_publicación
campo 6: ID_categoria

4.Prestamos
campo 1: ID_prestamo
campo 2: ID_usuario
campo 3: fecha_prestamo
campo 4: fecha_devolucion

5.Historial
campo 1: ID_historial
campo 2: ID_libro
campo 3: Descripción_cambio
campo 3: Fecha_cambio


sistema de gestión de biblioteca:

1. Tabla Usuarios
- Propósito: Esta tabla almacena la información de los usuarios que pueden interactuar con el sistema, como los usuarios que toman libros prestados.
- Campos:
  - ID_usuario: Identificador único para cada usuario (clave primaria).
  - Nombre: Nombre del usuario.
  - Correo: Dirección de correo electrónico del usuario (única por usuario).
  - Contraseña: Contraseña encriptada del usuario.
  - Fecha_registro: Fecha y hora en que el usuario fue registrado en el sistema.

 2. Tabla Categorías
- Propósito: Define las diferentes categorías en las que se pueden clasificar los libros. Permite organizar los libros según su temática.
- Campos:
  - ID_categoria: Identificador único para cada categoría (clave primaria).
  - nombre_categoria: Nombre de la categoría, como "Ficción", "No Ficción", "Educativo", etc.

3. Tabla Libros
- Propósito: Esta tabla contiene toda la información relevante sobre los libros disponibles en la biblioteca.
- Campos:
  - ID_libro: Identificador único para cada libro (clave primaria).
  - Título: Título del libro.
  - Autor: Nombre del autor del libro.
  - ISBN: Código ISBN del libro, un identificador único internacional para libros.
  - Año_publicación: Año en que fue publicado el libro.
  - ID_categoria: Hace referencia a la categoría del libro (clave foránea que se vincula con la tabla `Categorías`).

4. Tabla Prestamos
- Propósito: Registra los préstamos de libros realizados por los usuarios. Ayuda a controlar qué libros están prestados y su historial de préstamos.
- Campos:
  - ID_prestamo: Identificador único para cada préstamo (clave primaria).
  - ID_usuario: Referencia al usuario que realiza el préstamo (clave foránea que se vincula con la tabla `Usuarios`).
  - ID_libro: Referencia al libro que se presta (clave foránea que se vincula con la tabla `Libros`).
  - Fecha_prestamo: Fecha en la que se prestó el libro.
  - Fecha_devolucion: Fecha límite para la devolución del libro.

5. Tabla Historial
- Propósito: Guarda un registro de todos los cambios o modificaciones que se hagan en los datos de los libros. Esto es útil para tener un seguimiento de las actualizaciones y mantener la integridad del sistema.
- Campos:
  - ID_historial: Identificador único para cada registro de modificación (clave primaria).
  - ID_libro: Referencia al libro cuyo registro fue modificado (clave foránea que se vincula con la tabla `Libros`).
  - descripción_cambio: Descripción detallada del cambio realizado en los datos del libro.
  - Fecha_cambio: Fecha y hora en la que se realizó la modificación en el registro del libro.

Resumen:
- Usuarios: Registra a las personas que usan el sistema.
- Categorías: Define las categorías temáticas para clasificar los libros.
- Libros: Almacena información detallada sobre cada libro.
- Prestamos: Controla qué usuarios han tomado prestados qué libros y cuándo deben devolverlos.
- Historial: Registra los cambios realizados sobre los datos de los libros para tener un seguimiento de las modificaciones.

Con estas tablas, se cubren todos los aspectos necesarios para la gestión de una biblioteca, desde la organización de libros por categorías hasta el seguimiento de préstamos y modificaciones de datos.

Documentación de la interfaz de usuario:

Entramos al Inicio y nos encontramos con las opciones:

Inicio (nos lleva al LOGIN y al SIGN In)

Acerca ( explica detalladamente sobre detalles de la página )

 Servicios (Los servicios que prestamos al usuario)


 Contacto(contacto con los desarrolladores de la biblioteca)

 Libros (opciones de: categorías, préstamos, historial que nos permiten ver nuestros datos ya ingresados sobre esos campos).

Manual de usuario: Sistema de Gestión de Biblioteca.

Este manual te guiará en el uso del Sistema de Gestión de Biblioteca, donde podrás agregar, modificar, eliminar y buscar libros, así como listar todos los libros disponibles en la base de datos. El sistema se gestiona a través de formularios simples en una interfaz web.

1. Requisitos Previos

Antes de utilizar el sistema, asegúrate de que:

- El servidor web esté ejecutando Apache o Mysql con Xampp instalado.
- La base de datos MySQL/PhpmyAdmin esté en funcionamiento.
- Las tablas del sistema estén creadas en la base de datos usando las siguientes consultas:

Tabla de Usuarios
CREATE TABLE Usuarios (
    ID_usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Correo VARCHAR(100) UNIQUE,
    Contraseña VARCHAR(255),
    Fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Tabla de Categorías
CREATE TABLE Categorías (
    ID_categoria INT AUTO_INCREMENT PRIMARY KEY,
    Nombre_categoria VARCHAR(100)
);

 tabla de Libros
CREATE TABLE Libros (
    ID_libro INT AUTO_INCREMENT PRIMARY KEY,
    Título VARCHAR(200),
    Autor VARCHAR(100),
    ISBN VARCHAR(20),
    Año_publicación INT,
    ID_categoria INT,
    FOREIGN KEY (ID_categoria) REFERENCES Categorías(ID_categoria)
);

Tabla de Préstamos
CREATE TABLE Prestamos (
    ID_prestamo INT AUTO_INCREMENT PRIMARY KEY,
    ID_usuario INT,
    ID_libro INT,
    Fecha_prestamo DATE,
    Fecha_devolucion DATE,
    FOREIGN KEY (ID_usuario) REFERENCES Usuarios(ID_usuario),
    FOREIGN KEY (ID_libro) REFERENCES Libros(ID_libro)
);

Tabla de Historial de cambios en Libros
CREATE TABLE Historial (
    ID_historial INT AUTO_INCREMENT PRIMARY KEY,
    ID_libro INT,
    Descripción_cambio TEXT,
    Fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_libro) REFERENCES Libros(ID_libro)
);
```

2. Funcionalidades del Sistema

a. Agregar un Nuevo Libro
Puedes agregar un nuevo libro a la base de datos completando un formulario en la interfaz web.

1. Pasos:
   - Ingresa a la página de gestión de libros.
   - Completa los campos del formulario: Título, Autor, ISBN, año de Publicación y categoría.
   - Haz clic en "Agregar Libro” para almacenar la información.

2. Formulario:
   - Título: Nombre del libro.
   - Autor: Nombre del autor del libro.
   - ISBN: Número ISBN del libro (Código único de identificación).
   - Año de Publicación: Año en que se publicó el libro.
   - Categoría: Selección del tipo de categoría.

3. Resultado:
   - El libro será agregado a la base de datos y recibirás un mensaje de confirmación.


b. Buscar un Libro por Título
Puedes buscar un libro por su título usando un formulario de búsqueda.

1. Pasos:
   - Ingresa a la página de Buscar Libros.
   - Escribe el título (o parte del título) del libro que deseas buscar.
   - Haz clic en "Buscar".

2. Formulario:
   - título: Escribe el nombre o parte del nombre del libro.

3. Resultado:
   - Se mostrará una lista de libros que coincidan con el título ingresado.
   - Si no se encuentran coincidencias, recibirás un mensaje de que no se encontraron resultados.

c. Listar Todos los Libros
Puedes ver todos los libros almacenados en la base de datos en una tabla.

1. Pasos:
   - Ingresa a la página principal o de gestión.
   - En la sección de Listado de Libros*
, verás una tabla con los libros.

2. Resultado:
   - Verás una lista completa de libros con la siguiente información:
     - ID del libro
     - Título
     - Autor
     - ISBN
     - Año de Publicación
     - Categoría
     - Acciones: Podrás editar o eliminar el libro.

d. Modificar un Libro Existente
Puedes actualizar los detalles de un libro ya existente.

1. ]pasos:
   - En la tabla de libros, busca el libro que deseas modificar.
   - Haz clic en el botón "Modificar" al lado del libro correspondiente.
   - Se abrirá un formulario con la información del libro, la cual puedes modificar.
   - Haz clic en "Guardar Cambios".

2. Resultado:
   - El sistema actualizará la información del libro y recibirás un mensaje de confirmación de los cambios.

e. Eliminar un Libro
Puedes eliminar un libro de la base de datos.

1. Pasos:
   - En la tabla de libros, busca el libro que deseas eliminar.
   - Haz clic en el botón "Eliminar" al lado del libro correspondiente.
   - Confirma que deseas eliminar el libro.

2. Resultado:
   - El libro será eliminado de la base de datos y no aparecerá en el listado de libros.



3. Descripción de la Interfaz

a. Formulario de Agregar Libro

El formulario incluye los siguientes campos:
- Título: Escribe el título completo del libro.
- Autor: Nombre del autor del libro.
- ISBN: Número ISBN del libro.
- Año de Publicación: Año en el que el libro fue publicado.
- Categoría: Selecciona la categoría a la que pertenece el libro (por ejemplo, Ficción, No Ficción, Educativo, etc.).

b. Listado de Libros

La tabla muestra todos los libros almacenados, con las siguientes columnas:
- iD: Identificador único del libro.
- Título: Título del libro.
- Autor: Autor del libro.
- ISBN: Código único del libro.
- Año: Año de publicación.
- Categoría: Categoría del libro.
- Acciones:
   - Modificar: Te permite editar los datos del libro.
   - Eliminar: Te permite eliminar el libro de la base de datos.

---
 4. Administración del Sistema

- Búsqueda: Utiliza el formulario de búsqueda para encontrar rápidamente un libro por su título o parte de su título.
- Validación de Datos: El sistema valida que los campos como el Título, Autor, ISBN, y Año de Publicación sean correctos y estén en el formato adecuado.
- Historial: Se puede implementar una tabla de Historial Para llevar un registro de los cambios realizados en los libros (modificaciones, eliminaciones).

 5. Mensajes y Confirmaciones

- Libro Agregado: El sistema muestra un mensaje de éxito cuando se agrega un libro correctamente.
- Modificación Exitosa: Un mensaje confirma cuando la información de un libro ha sido modificada.
- Eliminación Exitosa: Si eliminas un libro, el sistema confirmará que la operación fue exitosa.

---

6. Solución de Problemas Comunes

- Error de Conexión a la Base de Datos: Asegúrate de que la base de datos MySQL esté correctamente configurada, y que las credenciales de acceso sean correctas en el archivo de configuración PHP.
- No se Encuentra el Libro: Si la búsqueda no arroja resultados, asegúrate de escribir correctamente el título o parte del título que deseas buscar.
- no se Puede Agregar un Libro: Verifica que todos los campos del formulario estén llenos y que los datos cumplan con los formatos correctos (por ejemplo, que el ISBN sea único y que el año sea válido).

---

 Conclusión

Este sistema te permite gestionar eficientemente el catálogo de libros de la biblioteca, brindándote herramientas para agregar, modificar, eliminar y buscar libros de manera sencilla y rápida. Además, es escalable para poder agregar más funcionalidades como el manejo de préstamos y registros de usuarios.
