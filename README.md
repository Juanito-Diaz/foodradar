# 🍽️ FoodRadar

**FoodRadar** es una plataforma web desarrollada en PHP para la gestión de usuarios, registro, inicio de sesión y exploración gastronómica. Cuenta con integración a bases de datos relacionales (SQL Server mediante extensiones PDO) y diseño de interfaz adaptable.

---

## 🚀 Características

- 🔐 **Autenticación Segura:** Registro e inicio de sesión con hashing seguro de contraseñas (`BCRYPT`).
- 📝 **Validación de Formularios:** Sanitización y validación tanto en cliente como en servidor para correos y campos obligatorios.
- 🗄️ **Persistencia en SQL Server:** Implementación con PDO (`sqlsrv`) para consultas preparadas contra inyecciones SQL.
- 🎨 **Interfaz de Usuario:** Páginas limpias y responsivas con estilos modernos y soporte para accesos sociales.

---

## 📁 Estructura del Proyecto

```text
foodradar/
├── Logo.jpeg                  # Logotipo principal de la aplicación
├── login.php                  # Vista para registro / creación de cuentas
├── sesion.php                 # Vista para inicio de sesión de usuarios existentes
├── procesar_registro.php      # Lógica de inserción y hashing de nuevos usuarios
├── procesar_login.php         # Lógica de autenticación y verificación de credenciales
├── storedprocedure.php        # Manejo y ejecución de procedimientos almacenados
├── verificar.php              # Scripts de validación y control de sesiones
├── prueba.php                 # Archivo de pruebas y utilidades de desarrollo
└── README.md                  # Documentación del proyecto
```

---

## 🛠️ Tecnologías y Requisitos

- **Servidor Web:** Apache (XAMPP recomendado).
- **Lenguaje:** PHP 8.x.
- **Base de Datos:** Microsoft SQL Server (SQL Express u otra edición compatible).
- **Extensiones de PHP requeridas:**
  - `pdo_sqlsrv`
  - `sqlsrv`
  - `openssl`

---

## ⚙️ Instalación y Configuración

### 1. Clonar el repositorio
Ubica el repositorio en la carpeta pública de tu servidor web (por ejemplo en `htdocs` si usas XAMPP):

```bash
cd C:\xampp\htdocs
git clone https://github.com/Juanito-Diaz/foodradar.git
```

### 2. Configurar la Base de Datos
Crea la base de datos en SQL Server y la tabla base de usuarios:

```sql
CREATE DATABASE FoodRadar;
GO

USE FoodRadar;
GO

CREATE TABLE UsuarioRegistros (
    UsuarioID INT IDENTITY(1,1) PRIMARY KEY,
    Nombre NVARCHAR(100) NOT NULL,
    Apellido NVARCHAR(100) NOT NULL,
    Correo NVARCHAR(150) NOT NULL UNIQUE,
    Contraseña NVARCHAR(255) NOT NULL,
    FechaRegistro DATETIME DEFAULT GETDATE()
);
GO
```

### 3. Configurar Parámetros de Conexión
Ajusta tus credenciales de base de datos en los archivos de procesamiento (`procesar_registro.php`, `procesar_login.php` y `storedprocedure.php`):

```php
$serverName = "TU_SERVIDOR\\SQLEXPRESS";
$database   = "FoodRadar";
$username   = "tu_usuario";
$password   = "tu_contraseña";
```

### 4. Iniciar el Servidor
1. Inicia **Apache** desde el Panel de Control de XAMPP.
2. Inicia el servicio de **SQL Server**.
3. Abre tu navegador e ingresa a:
   - Registro: `http://localhost/foodradar/login.php`
   - Iniciar sesión: `http://localhost/foodradar/sesion.php`

---

## 🔒 Buenas Prácticas de Seguridad Implementadas

- **Consultas Preparadas (Prepared Statements):** Previenen vulnerabilidades de inyección SQL (SQLi).
- **Password Hashing:** Uso de la función nativa `password_hash()` con algoritmo `PASSWORD_BCRYPT` y verificación mediante `password_verify()`.

---

## 👨‍💻 Autor

- **Juanito Díaz** - [GitHub](https://github.com/Juanito-Diaz)
