<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 400px;
            text-align: center;
        }

        .login-container img {
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

        .login-button, .google-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-button {
            background-color: #4a4a4a;
            color: #fff;
        }

        .login-button:hover {
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

        .forgot-password {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }

        .forgot-password a {
            color: #4a4a4a;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="/foodradar/Logo.JPEG" alt="Logo" width="80" height="80">
        <h1>Iniciar Sesión</h1>
        <p>Introduce tus datos para continuar</p>
        
        <!-- Formulario de inicio de sesión -->
        <form action="prueba.php" method="POST">
            <input type="email" name="correo" class="input-field" placeholder="Correo electrónico" required>
            <input type="password" name="contraseña" class="input-field" placeholder="Contraseña" required>
            
            <button type="submit" class="login-button">INICIAR SESIÓN</button>
        </form>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        
        <p style="margin: 15px 0; color: #777;">o</p>
        
        <!-- Botón de Google (solo diseño, sin funcionalidad) -->
        <form action="login.php" method="POST">
            <button type="submit" class="google-button">
                Crea una cuenta
            </button>
        </form>
    </div>
</body>
</html>