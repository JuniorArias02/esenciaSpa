<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" href="../resources/style/promociones.css">
    <link rel="stylesheet" href="../resources/style/tipografia.css">
    <link rel="stylesheet" href="../resources/style/promoAdmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de tener este archivo en tu proyecto -->
</head>
<body>
    <header class="header">
        <div class="menu">
            <div class="logo">
                <img src="../resources/img/logo.png" alt="Logo" class="logo-img">
            </div>
            <ul class="menu-items roboto-bold">
                <li><a href="../vistaCliente/inicioCliente.php" target="_blank">Inicio</a></li>
                <li><a href="../vistaCliente/sobreNosotrosCliente.php" target="_blank">Sobre Nosotros</a></li>
                <li>
                    <a href="../vistaCliente/nuestrosServiciosCliente.php" target="_blank">Nuestros Servicios</a>
                    <ul class="submenu">
                        <li><a href="#nuestros_Servicios">Nuestros Servicios</a></li>
                        <li><a href="#tratamiento_faciales">Tratamiento Faciales</a></li>
                        <li><a href="#tratamiento_corporales">Tratamientos Corporales</a></li>
                        <li><a href="#tratamiento_bienestar">Tratamientos Terapeuticos Y De Bienestar</a></li>
                        <li><a href="#tratamiento_postOperatorio">Tratamientos Post-Operatorios</a></li>
                    </ul>
                </li>
                <li><a href="../vistaCliente/PromocionesCliente.php" target="_blank">Promociones</a></li>
                <li><a href="../vistaCliente/reservasCliente.php" target="_blank">Reservas</a></li>
            </ul>
        </div>
    </header>

    <div class="contenido">
        <div class="contenido-inicio">
            <img src="../resources/img/4.png" alt="" srcset="" class="imagen-contenido">
        </div>
 

        <div class="contenido-bienvenida">
            <div class="contenido-bienvenida-texto">
                <h1 class="roboto-bold texto-grande">PROMOCIONES DEL MES</h1>
            </div>
        </div>

        <div class="contenido-cuerpo">
            <div class="contenido-titulo" id="nuestros_Servicios">
                <p class="texto-Normal roboto-light ">
                    ¡Descubre nuestras ofertas especiales de navidad!<br>
                    Aprovecha los últimos descuentos del año...
                </p>
            </div>
        </div>
<!-- 
        <div class="container">
            <h1 class="roboto-bold">PROMOCIONES DEL MES DE JULIO</h1>
            <div class="grid">
                <div class="service">
                    <img src="../resources/img/2.png" alt="Limpieza Facial Profunda">
                    <h2 class="roboto-regular">LIMPIEZA FACIAL PROFUNDA</h2>
                </div>
                <div class="service">
                    <img src="../resources/img/6.png" alt="Limpieza Facial Petox">
                    <h2 class="roboto-regular">LIMPIEZA FACIAL DETOX</h2>
                </div>
                <div class="service">
                    <img src="../resources/img/6.png" alt="Facial Piel Porcelana">
                    <h2 class="roboto-regular">FACIAL PIEL PORCELANA</h2>
                </div>
                <div class="service">
                    <img src="../resources/img/6.png" alt="Tratamiento Antiacne">
                    <h2 class="roboto-regular">TRATAMIENTO ANTIACNE</h2>
                </div>
                <div class="service">
                    <img src="../resources/img/6.png" alt="Tratamiento Post-Acne">
                    <h2 class="roboto-regular">TRATAMIENTO POST-ACNE</h2>
                </div>
                <div class="service">
                    <img src="../resources/img/6.png" alt="Peeling Profesional">
                    <h2 class="roboto-regular">PEELING PROFESIONAL</h2>
                </div>
            </div>
        </div> -->

        <div class="container promociones_admin">
            <h1 class="roboto-bold">PROMOCIONES DEL MES DE JULIO</h1>
            <div class="contenido-info-promocion">
                <?php
                // Conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "base_spa";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT p.*, ss1.nomsubservicio AS nomsubservicio1, ss2.nomsubservicio AS nomsubservicio2 
                FROM promociones p 
                JOIN subservicio ss1 ON p.codsubservicio1 = ss1.codsubservicio 
                JOIN subservicio ss2 ON p.codsubservicio2 = ss2.codsubservicio";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $imagePath = "../uploads/" . $row['imagen'];

                        echo "<div class='service'>";

                        // Verificar si la imagen existe antes de mostrarla
                        if (file_exists($imagePath)) {
                            echo "<img src='" . $imagePath . "' alt='" . $row['titulo'] . "'>";
                        } else {
                            echo "<p class='error robot-light'>Imagen no encontrada</p>";
                        }

                        echo "<h2 class='roboto-bold'>" . $row['titulo'] . " (" . $row['nomsubservicio1'] . " y " . $row['nomsubservicio2'] . ")</h2>";
                        echo "<p class='roboto-light'>" . $row['descripcion'] . "</p>";
                        echo "<p class='roboto-light'>Válido desde " . $row['fecha_inicio'] . " hasta " . $row['fecha_fin'] . "</p>";

                        echo "</div>";
                    }
                } else {
                    echo "<p class='roboto-light'>No hay promociones disponibles.</p>";
                }
                ?>

            </div>
        </div>


        
        <div class="contenido-final">
            <div class="horarios">
                <h2 class="roboto-black">HORARIOS</h2>
                <p class="roboto-regular texto-pie">De lunes a sábado de 8:00 am - 12 pm y de 2:00 pm - 6:00 pm</p>
            </div>
            <div class="fother">
                <p class="derechos-reservados roboto-light">© 2024 EsenciaSpa. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
