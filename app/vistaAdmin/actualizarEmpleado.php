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
    <script src="../resources/js/detectar.js" defer></script>
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
    <div class="formulario-actualizar-admin">
        <h1 class="titulo-reserva roboto-bold">Actualizar empleado</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['codempleado'])) {
                $codempleado = $_POST['codempleado'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "base_spa";
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $nomempleado = $_POST['nomempleado'];
                $apellempleado = $_POST['apellempleado'];
                $telempleado = $_POST['telempleado'];
                $dirempleado = $_POST['dirempleado'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $cargo = $_POST['cargo'];

                $sql = "UPDATE empleados SET nomempleado='$nomempleado', apellempleado='$apellempleado', telempleado='$telempleado', dirempleado='$dirempleado', fechaNacimiento='$fechaNacimiento', cargo='$cargo' WHERE codempleado=$codempleado";

                if ($conn->query($sql) === TRUE) {
                    echo "Empleado actualizado correctamente.";
                } else {
                    echo "Error al actualizar el empleado: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Error: Código de empleado no proporcionado.";
            }
        } else {
            if (isset($_GET['codempleado'])) {
                $codempleado = $_GET['codempleado'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "base_spa";
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM empleados WHERE codempleado = $codempleado";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nomempleado = $row['nomempleado'];
                    $apellempleado = $row['apellempleado'];
                    $telempleado = $row['telempleado'];
                    $dirempleado = $row['dirempleado'];
                    $fechaNacimiento = $row['fechaNacimiento'];
                    $cargo = $row['cargo'];
                } else {
                    echo "No se encontró ningún empleado con el código indicado";
                }

                $conn->close();
            } else {
                echo "Error: Código de empleado no proporcionado.";
            }
        }
        ?>
        <form action="" method="post">
            <input type="hidden" name="codempleado" value="<?php echo $_GET['codempleado']; ?>">
            <label for="nomempleado">Nombre:</label>
            <input type="text" id="nomempleado" name="nomempleado" value="<?php echo $nomempleado ?? ''; ?>" required><br><br>
            <label for="apellempleado">Apellidos:</label>
            <input type="text" id="apellempleado" name="apellempleado" value="<?php echo $apellempleado ?? ''; ?>" required><br><br>
            <label for="telempleado">Teléfono:</label>
            <input type="text" id="telempleado" name="telempleado" value="<?php echo $telempleado ?? ''; ?>"><br><br>
            <label for="dirempleado">Dirección:</label>
            <input type="text" id="dirempleado" name="dirempleado" value="<?php echo $dirempleado ?? ''; ?>"><br><br>
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $fechaNacimiento ?? ''; ?>"><br><br>
            <label for="cargo">Cargo:</label>
            <select id="cargo" name="cargo" required>
                <option value="Administrador" <?php if (isset($cargo) && $cargo == "Administrador") echo "selected"; ?>>Administrador</option>
                <option value="Empleado" <?php if (isset($cargo) && $cargo == "Empleado") echo "selected"; ?>>Empleado</option>
            </select><br><br>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>

</html>