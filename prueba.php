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

// Definir una ruta de imagen dinámica y un título
$imagen_fondo = 'https://media.admagazine.com/photos/651aeed9da5f4d9a3844a94b/4:3/w_2660,h_1995,c_limit/Porten%CC%83o-restaurante-1.jpg';
$titulo = "Encuentra tu sabor, sigue la señal.";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodRadar</title>
    <style>
        /* Estilos básicos para la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #F5E6C8;
        }

        header {
            background-color: #f1c40f;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #333;
        }

        nav a {
            margin: 0 10px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: #E67E22;
        }

        .hero {
            position: relative;
            width: 100%;
            height: 400px;
            background-image: url('<?php echo $imagen_fondo; ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 36px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .section-title {
            font-size: 36px;
            color: #1F3A93;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .services, .plans, .social-media {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin: 20px auto;
            max-width: 1000px;
        }

        .service-item, .plan-item, .social-media-item {
            background-color: #FFF;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .service-item img, .plan-item img, .social-media-item img {
            max-width: 100%;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            background-color: #1F3A93;
            color: #FFF;
            padding: 10px 20px;
            margin-top: 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #163A5F;
        }

        /* Modal estilos */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }

        .modal-content h2 {
            margin-bottom: 15px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <div>FoodRadar</div>
    <nav>
        <a href="#plans">Planes</a>
        <a id="about-btn">Acerca de</a>
        <a href="#social-media">Redes Sociales</a>
    </nav>
</header>

<div class="hero">
    <h1><?php echo $titulo; ?></h1>
</div>

<!-- Sección de servicios -->
<section>
    <h2 class="section-title">Nuestros servicios</h2>
    <div class="services">
        <div class="service-item">
            <img src="https://cdn.shopify.com/s/files/1/0581/7656/9508/files/platillos-tipicos-de-comida-mexicana-gourmet-que-tienes-que-probar-2.jpg?v=1631140281" alt="Servicio 1">
            <h3>Sección Gourmet</h3>
            <p>Descubre una selección exclusiva de platos gourmet para deleitar tu paladar.</p>
        </div>
        <div class="service-item">
            <img src="https://img.freepik.com/fotos-premium/servicio-catering-entrega-alimentos-eventos_1314467-210660.jpg" alt="Servicio 2">
            <h3>Organización de Eventos Premium</h3>
            <p>Disfruta de eventos excepcionales con atención personalizada y servicio de primera.</p>
        </div>
        <div class="service-item">
            <img src="https://st3.depositphotos.com/3591429/13656/i/450/depositphotos_136561608-stock-photo-cheerful-people-in-restaurant.jpg" alt="Servicio 3">
            <h3>Voces que Satisfacen</h3>
            <p>Opiniones auténticas de nuestros clientes sobre la calidad de nuestro servicio.</p>
        </div>
    </div>
</section>

<!-- Sección de planes -->
<section id="plans">
    <h2 class="section-title">Elige tu plan</h2>
    <div class="plans">
        <div class="plan-item">
            <img src="https://w7.pngwing.com/pngs/223/7/png-transparent-yellow-star-illustration-new-super-mario-bros-2-new-super-mario-bros-2-new-super-mario-bros-wii-super-mario-bros-angle-super-mario-bros-nintendo-thumbnail.png" alt="Plan Oro">
            <h3>Plan Oro</h3>
            <p>$100.00</p>
        </div>
        <div class="plan-item">
            <img src="https://w7.pngwing.com/pngs/757/73/png-transparent-super-mario-bros-super-mario-galaxy-star-silver-star-angle-super-mario-bros-nintendo.png" alt="Plan Plata">
            <h3>Plan Plata</h3>
            <p>$75.00</p>
        </div>
        <div class="plan-item">
            <img src="https://e7.pngegg.com/pngimages/403/73/png-clipart-super-mario-3d-world-new-super-mario-bros-super-mario-galaxy-super-mario-bros-super-mario-64-star-angle-super-mario-bros.png" alt="Plan Bronce">
            <h3>Plan Bronce</h3>
            <p>$50.00</p>
        </div>
    </div>
</section>

<!-- Sección de redes sociales -->
<section id = "social-media" >
    <h2 class="section-title">Síguenos en nuestras redes sociales</h2>
    <div class="social-media">
        <div class="social-media-item">
            <!-- Enlace a la red social -->
            <a href="https://www.instagram.com/foodradar000/" target="_blank">
                <img src="https://1000marcas.net/wp-content/uploads/2019/11/Emblem-Instagram.jpg" alt="Instagram">
            </a>
            <p>Instagram</p>
        </div>
        
        <div class="social-media-item">
            <a href="https://www.facebook.com/profile.php?id=61569021681501&rdid=PDxT5zRqgiiC5bRt&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F19aktBEUg6%2F#" target="_blank">
                <img src="https://static.vecteezy.com/system/resources/previews/022/257/063/non_2x/icon-media-social-facebook-free-vector.jpg" alt="Facebook">
            </a>
            <p>Facebook</p>
        </div>
        
        <div class="social-media-item">
            <a href="https://x.com/FoodRadar000?t=0ZyWvHQW_rN4Jyj0x3IR-Q&s=09" target="_blank">
                <img src="https://img.freepik.com/vector-gratis/twitter-nuevo-logotipo-2023-x-vector-fondo-blanco_1017-45422.jpg" alt="Twitter">
            </a>
            <p>Twitter</p>
        </div>
        
        <div class="social-media-item">
            <a href="https://www.youtube.com/channel/UCVKYx3oJJb9CV8q6ULSYygg" target="_blank">
                <img src="https://static.vecteezy.com/system/resources/previews/023/986/480/non_2x/youtube-logo-youtube-logo-transparent-youtube-icon-transparent-free-free-png.png" alt="Yooutube">
            </a>
            <p>Yooutube</p>
        </div>
    </div>
</section>

<!-- Modal para "Acerca de" -->
<div class="modal" id="about-modal">
    <div class="modal-content">
        <button class="close-btn" id="close-modal">&times;</button>
        <h2>Acerca de FoodRadar</h2>
        <p>FoodRadar es una plataforma digital diseñada para ayudarte a descubrir los mejores restaurantes...</p>
    </div>
</div>

<script>
    // JavaScript para manejar el modal
    const aboutBtn = document.getElementById('about-btn');
    const modal = document.getElementById('about-modal');
    const closeModal = document.getElementById('close-modal');

    aboutBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>

</body>
</html>
