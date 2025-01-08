<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        input:focus {
            border-color: #66a6ff;
            box-shadow: 0 0 8px rgba(102, 166, 255, 0.5);
            outline: none;
        }
        input[type="submit"] {
            background-color: #66a6ff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #557dcf;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <form action="procesar.php" method="post">
        <h1>Formulario de Registro</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>

        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" id="nacionalidad" name="nacionalidad" required>

        <label for="escuela">Escuela:</label>
        <input type="text" id="escuela" name="escuela" required>

        <label for="estado_origen">Estado de Origen:</label>
        <input type="text" id="estado_origen" name="estado_origen" required>

        <label for="telefono">Número de Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
