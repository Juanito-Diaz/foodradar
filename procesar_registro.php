<?php
// Configuración de conexión a la base de datos
$serverName = "JD\\SQLEXPRESS"; // Cambia este valor
$database = "FoodRadar";       // Nombre de tu base de datos
$username = "juanito";         // Cambia este valor
$password = "juanitojd";       // Cambia este valor

try {
    // Verificar que $_POST contiene los datos necesarios
    if (!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['correo']) || !isset($_POST['contraseña'])) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Validar que los datos no estén vacíos
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña)) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    // Validar formato del correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("El correo electrónico no es válido.");
    }

    // Conexión a la base de datos usando PDO
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Encriptar la contraseña
    $hashedPassword = password_hash($contraseña, PASSWORD_BCRYPT);

    // Consulta para insertar un nuevo usuario
    $sql = "INSERT INTO UsuarioRegistros (Nombre, Apellido, Correo, Contraseña)
            VALUES (:nombre, :apellido, :correo, :hashedPassword)";

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);

    $stmt->execute();

    // Confirmar registro exitoso
    echo "Registro exitoso. Ahora puedes iniciar sesión.";

} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    if ($e->getCode() === "23000") { // Código de error para clave duplicada
        echo "El correo ya está registrado. Por favor, utiliza otro.";
    } else {
        echo "Error en el registro: " . $e->getMessage();
    }
} catch (Exception $e) {
    // Manejo de errores generales
    echo "Error: " . $e->getMessage();
}
?>
