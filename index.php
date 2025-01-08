<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="procesar.php" method="post">
            <h1>Formulario de Registro</h1>
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="input-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>

            <div class="input-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" required>
            </div>

            <div class="input-group">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" id="nacionalidad" name="nacionalidad" required>
            </div>

            <div class="input-group">
                <label for="escuela">Escuela:</label>
                <input type="text" id="escuela" name="escuela" required>
            </div>

            <div class="input-group">
                <label for="estado_origen">Estado de Origen:</label>
                <input type="text" id="estado_origen" name="estado_origen" required>
            </div>

            <div class="input-group">
                <label for="telefono">Número de Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>

