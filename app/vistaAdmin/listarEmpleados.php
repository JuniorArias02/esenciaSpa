<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" type="text/css" href="../resources/style/inicio.css">
    <link rel="stylesheet" href="../resources/style/reservas.css">
    <link rel="stylesheet" href="../resources/style/tipografia.css">
    <link rel="stylesheet" href="../resources/style/tablasStyle.css">
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
    <h2>Lista de Empleados</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_spa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM empleados";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table >';
        echo '<thead class="roboto-bold">';
        echo '<tr>';
        echo '<th>Código Empleado</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellidos</th>';
        echo '<th>Teléfono</th>';
        echo '<th>Dirección</th>';
        echo '<th>Fecha de Nacimiento</th>';
        echo '<th>Cargo</th>';
        echo '<th>Acciones</th>';
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
            echo '<td>';
            echo '<a href="actualizarEmpleado.php?codempleado=' . urlencode($row['codempleado']) . '">Actualizar</a> | ';
            echo '<a href="eliminarEmpleado.php?codempleado=' . urlencode($row['codempleado']) . '">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No hay empleados disponibles';
    }
    

    $conn->close();
    ?>
    <form action="" method="GET">
        <input type="hidden" name="action" value="listar">
    </form>
</body>
</html>
