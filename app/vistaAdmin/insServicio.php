<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" type="text/css" href="../resources/style/inicio.css">
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
                <li><a href="../vistaAdmin/sobreNosotrosAdmin.php" >Sobre Nosotros</a></li>
                <li>
                    <a href="../vistaAdmin/nuestrosServiciosAdmin.php" >Nuestros Servicios</a>
                    <ul class="submenu">
                        <li><a href="#nuestros_Servicios">Nuestros Servicios</a></li>
                        <li><a href="#tratamiento_faciales">Tratamiento Faciales</a></li>
                        <li><a href="#tratamiento_corporales">Tratamientos Corporales</a></li>
                        <li><a href="#tratamiento_bienestar">Tratamientos Terapeuticos Y De Bienestar</a></li>
                        <li><a href="#tratamiento_postOperatorio">Tratamientos Post-Operatorios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../vistaAdmin/PromocionesAdmin.php" >Promociones</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/adminPromociones.php" >Administrar promociones</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../vistaAdmin/reservasAdmin.php" >Reservas</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/insEmpleados.php" >Listar Reservas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Empleados</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/insEmpleados.php" >Insertar empleados</a></li>
                        <li><a href="../vistaAdmin/listarEmpleados.php" >Listar empleados</a></li>
                        <li><a href="../vistaAdmin/buscarEmpleado.php" >Buscar empleado</a></li>
                    </ul>
                </li>
                <li><a href="/esenciaSpa">salir</a></li>
            </ul>
        </div>
    </header>
    <div class="formulario-reserva">
        <h1 class="titulo-reserva roboto-bold">Insertar subservicio</h1>
        <form action="../backendAdmin/crudservicios.php?action=crear" method="POST">
            <label for="codservicio">Servicio Principal:</label>
            <select id="codservicio" name="codservicio" required>
                <option value="" disabled selected></option>
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

            <label for="nomsubservicio">Nombre del Subservicio:</label>
            <input type="text" id="nomsubservicio" name="nomsubservicio" required><br><br>

            <label for="codempleado">Empleado:</label>
            <select id="codempleado" name="codempleado" required>
                <option value="" disabled selected></option>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "base_spa";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    $sql_empleados = "SELECT codempleado, nomempleado FROM empleados";
                    $result_empleados = $conn->query($sql_empleados);

                    if ($result_empleados->num_rows > 0) {
                        while ($row = $result_empleados->fetch_assoc()) {
                            echo '<option value="' . $row['codempleado'] . '">' . $row['nomempleado'] . '</option>';
                        }
                    }

                    $conn->close();
                ?>
            </select><br><br>

            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>