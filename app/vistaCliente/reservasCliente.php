<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" href="../resources/style/reservas.css">
    <link rel="stylesheet" href="../resources/style/tipografia.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    <script src="../resources/js/detectar.js" defer></script>
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

    <div class="contenedor-form">
        <div class="formulario-reserva">
            <h1 class="titulo-reserva roboto-bold">Realizar Reserva</h1>
            <form action="../backendCliente/crearReserva.php?action=crear" method="post" class="roboto-regular">
                <label for="idReserva">Id Reserva:</label>
                <input type="number" id="idReserva" name="idReserva" required><br><br>
                <label for="nombreCliente">Nombre Cliente:</label>
                <input type="text" id="nombreCliente" name="nombreCliente" required><br><br>
                <label for="emailCliente">Email:</label>
                <input type="email" id="emailCliente" name="emailCliente" required><br><br>
                <label for="telefonoCliente">Teléfono:</label>
                <input type="number" id="telefonoCliente" name="telefonoCliente" required><br><br>
                <label for="codservicio">Servicio:</label>
                <select id="codservicio" name="codservicio" required>
                    <option value="" disabled selected>Seleccione un servicio</option>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "base_spa";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    $sql_servicios = "SELECT codservicio, nomservicio FROM servicio";
                    $result_servicios = $conn->query($sql_servicios);

                    if ($result_servicios->num_rows > 0) {
                        while ($row = $result_servicios->fetch_assoc()) {
                            echo '<option value="' . $row['codservicio'] . '">' . $row['nomservicio'] . '</option>';
                        }
                    }

                    $conn->close();
                    ?>
                </select><br><br>
                <label for="fechaReserva">Fecha y hora de reserva:</label>
                <input type="datetime-local" id="fechaReserva" name="fechaReserva" required><br><br>
                <button type="submit">Confirmar Reserva</button>
            </form>
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
    
</body>

</html>