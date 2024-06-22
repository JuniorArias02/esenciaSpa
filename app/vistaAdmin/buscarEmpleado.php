<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" type="text/css" href="../resources/style/inicio.css">
    <link rel="stylesheet" href="../resources/style/reservas.css">
    <link rel="stylesheet" href="../resources/style/tipografia.css">
    <link rel="stylesheet" href="../resources/style/buscarEmpleado.css">
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
    <div class="contenedor_buscar">
        <div class="buscar_content">
            <h2 class="roboto-bold">Buscar Empleado</h2>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "base_spa";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            if (isset($_GET['codempleado'])) {
                $codempleado = $_GET['codempleado'];
                $sql = "SELECT * FROM empleados WHERE codempleado = $codempleado";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<h2 class="roboto-bold">Empleado encontrado</h2>';
                    echo '<table class="styled-table">';
                    echo '<thead class="roboto-bold">';
                    echo '<tr>';
                    echo '<th>Código</th>';
                    echo '<th>Nombre</th>';
                    echo '<th>Apellidos</th>';
                    echo '<th>Teléfono</th>';
                    echo '<th>Dirección</th>';
                    echo '<th>Fecha de Nacimiento</th>';
                    echo '<th>Cargo</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody class="roboto-light">';
                    
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['codempleado']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['nomempleado']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['apellempleado']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['telempleado']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['dirempleado']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['fechaNacimiento']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['cargo']) . '</td>';
                        echo '</tr>';
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<div class="error-codigo">';
                    echo '<p class="roboto-light txt-center">No se encontró ningún empleado con el código indicado</p>';
                    echo '</div>';
                }
                
            }
            $conn->close();
            ?>
            <form action="" method="get">
                <div class="formulario_buscar">
                <label for="codempleado" class="roboto-bold">Código Empleado:</label>
                <input type="number" id="codempleado" name="codempleado" required><br><br>
                <input type="submit" value="Buscar">
                </div>
                
            </form>
        </div>

    </div>

</body>

</html>