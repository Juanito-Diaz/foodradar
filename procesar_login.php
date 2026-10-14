<?php
// Configuración de conexión a la base de datos
$serverName = "JD\\SQLEXPRESS"; // Cambia este valor
$database = "foodradar";       // Nombre de tu base de datos
$username = "juanito";         // Cambia este valor
$password = "juanitojd";       // Cambia este valor

try {
    // Conexión a la base de datos
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recibir datos del formulario
    $correo = $_POST['correo'] ?? null;
    $contraseña = $_POST['contraseña'] ?? null;

    // Validar que los datos no estén vacíos
    if (empty($correo) || empty($contraseña)) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // Consulta para buscar al usuario por correo
    $sql = "SELECT UsuarioID, Contraseña FROM UsuarioRegistros WHERE Correo = :correo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si el correo existe
    if ($stmt->rowCount() === 0) {
        throw new Exception("Correo no registrado.");
    }

    // Obtener los datos del usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $hashedPassword = $usuario['Contraseña'];

    // Verificar la contraseña
    if (!password_verify($contraseña, $hashedPassword)) {
        throw new Exception("Contraseña incorrecta.");
    }

    // Si los datos son correctos, redirigir a otra página
    header("Location: bienvenido.php");
    exit();

} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    echo "Error de conexión: " . $e->getMessage();
} catch (Exception $e) {
    // Manejo de errores generales
    // Redirigir con el error a la página de inicio de sesión
    $error_message = urlencode($e->getMessage());
    header("Location: sesion.php?error=$error_message");
    exit();
}
?>
