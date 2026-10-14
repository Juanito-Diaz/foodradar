<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(90deg, #f0f0f0 50%, #d3d3d3 50%);
        }

        .signup-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 400px;
            text-align: center;
        }

        .signup-container img {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 14px;
            color: #777;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .signup-button, .google-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .signup-button {
            background-color: #4a4a4a;
            color: #fff;
        }

        .signup-button:hover {
            background-color: #333;
        }

        .google-button {
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .google-button img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <img src="/foodradar/Logo.JPEG" alt="Logo" width="80" height="80">
        <h1>Crear Cuenta</h1>
        <p>Completa los campos para registrarte</p>
        
        <!-- Formulario de registro -->
        <form action="procesar_registro.php" method="POST">
        <input type="text" name="nombre" class="input-field" placeholder="Nombre" required>
        <input type="text" name="apellido" class="input-field" placeholder="Apellido" required>
        <input type="email" name="correo" class="input-field" placeholder="Correo electrónico" required>
        <input type="password" name="contraseña" class="input-field" placeholder="Contraseña" required>
        <button type="submit" class="signup-button">REGISTRARSE</button>
        </form>
    </div>
</body>
</html>