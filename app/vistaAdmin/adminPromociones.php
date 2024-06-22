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
</head>
<body>
    <header class="header">
        <div class="menu">
            <div class="logo">
                <img src="../resources/img/logo.png" alt="Logo" class="logo-img">
            </div>
            <ul class="menu-items roboto-bold">
                <li><a href="../vistaAdmin/inicioAdmin.php">Inicio</a></li>
                <li><a href="../vistaAdmin/sobreNosotrosAdmin.php" target="_blank">Sobre Nosotros</a></li>
                <li>
                    <a href="../vistaAdmin/nuestrosServiciosAdmin.php" target="_blank">Nuestros Servicios</a>
                    <ul class="submenu">
                        <li><a href="#nuestros_Servicios">Nuestros Servicios</a></li>
                        <li><a href="#tratamiento_faciales">Tratamiento Faciales</a></li>
                        <li><a href="#tratamiento_corporales">Tratamientos Corporales</a></li>
                        <li><a href="#tratamiento_bienestar">Tratamientos Terapeuticos Y De Bienestar</a></li>
                        <li><a href="#tratamiento_postOperatorio">Tratamientos Post-Operatorios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../vistaAdmin/PromocionesAdmin.php" target="_blank">Promociones</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/adminPromociones.php" target="_blank">Administrar promociones</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../vistaAdmin/reservasAdmin.php" target="_blank">Reservas</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/insEmpleados.php" target="_blank">Listar Reservas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Empleados</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/insEmpleados.php" target="_blank">Insertar empleados</a></li>
                        <li><a href="../vistaAdmin/listarEmpleados.php" target="_blank">Listar empleados</a></li>
                        <li><a href="../vistaAdmin/buscarEmpleado.php" target="_blank">Buscar empleado</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <div class="formulario-reserva">
        <h1 class="titulo-reserva roboto-bold">Crear promoción</h1>
        <form action="../backendAdmin/crudPromociones.php" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br><br>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea><br><br>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" required><br><br>
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required><br><br>
            <label for="fecha_fin">Fecha Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" required><br><br>
            <label for="codsubservicio1">Servicio 1:</label>
            <select id="codsubservicio1" name="codsubservicio1" required>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "base_spa";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    $sql_subservicios = "SELECT codsubservicio, nomsubservicio FROM subservicio";
                    $result_subservicios = $conn->query($sql_subservicios);

                    if ($result_subservicios->num_rows > 0) {
                        while ($row = $result_subservicios->fetch_assoc()) {
                            echo '<option value="' . $row['codsubservicio'] . '">' . $row['nomsubservicio'] . '</option>';
                        }
                    }

                    $conn->close();
                ?>
            </select><br><br>

            <label for="codsubservicio2">Subservicio 2:</label>
            <select id="codsubservicio2" name="codsubservicio2" required>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "base_spa";
        
                    $conn = new mysqli($servername, $username, $password, $dbname);
        
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
        
                    $sql_subservicios = "SELECT codsubservicio, nomsubservicio FROM subservicio";
                    $result_subservicios = $conn->query($sql_subservicios);
        
                    if ($result_subservicios->num_rows > 0) {
                        while ($row = $result_subservicios->fetch_assoc()) {
                            echo '<option value="' . $row['codsubservicio'] . '">' . $row['nomsubservicio'] . '</option>';
                        }
                    }
        
                    $conn->close();
                ?>
            </select><br><br>
            <button type="submit">Agregar Promoción</button>
        </form>
    </div>
</body>
</html>
