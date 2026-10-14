<?php
// Conexión a la base de datos SQL Server usando PDO
$serverName = "JD\SQLEXPRESS"; // Cambia este valor
$database = "foodradar"; // Cambia este valor
$username = "juanito"; // Cambia este valor
$password = "juanitojd"; // Cambia este valor

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa"; // Mensaje para verificar conexión
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Aquí puedes colocar el código que usa la conexión, por ejemplo:
$stmt = $conn->prepare("EXEC NombreDeTuStoredProcedure");
$stmt->execute();

// Cierra la conexión (opcional)
$conn = null;
?>
