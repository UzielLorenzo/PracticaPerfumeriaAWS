<?php
// index.php
// Formulario HTML para capturar los datos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form action="procesar.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" required><br><br>

        <label for="nacionalidad">Nacionalidad:</label><br>
        <input type="text" id="nacionalidad" name="nacionalidad" required><br><br>

        <label for="escuela">Escuela:</label><br>
        <input type="text" id="escuela" name="escuela" required><br><br>

        <label for="estado_origen">Estado de Origen:</label><br>
        <input type="text" id="estado_origen" name="estado_origen" required><br><br>

        <label for="telefono">Número de Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
