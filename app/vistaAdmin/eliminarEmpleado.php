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
    <script>
        function confirmarEliminacion() {
            return confirm("Confirma eliminación del empleado ");
        }
    </script>
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
    <h2>Eliminar Empleado</h2>
    <?php
if(isset($_GET['codempleado'])) {
    $codempleado = $_GET['codempleado'];

    if(isset($_GET['confirmar'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "base_spa";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "DELETE FROM empleados WHERE codempleado = $codempleado";

        if ($conn->query($sql) === TRUE) {
            echo "El empleado ha sido eliminado correctamente.";
        } else {
            echo "Error al eliminar el empleado: " . $conn->error;
        }

        $conn->close();
    } else {
        echo '<script>
                    if(confirmarEliminacion()) {
                        window.location.href = "eliminarEmpleado.php?codempleado='.$codempleado.'&confirmar=1";
                    } else {
                        window.history.back();
                    }
              </script>';
    }
} else {
    echo "Error: Código de empleado no proporcionado.";
}
?>

</body>
</html>

