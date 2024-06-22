<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="formulario-reserva-admin">
        <h1 class="titulo-reserva roboto-bold">Reservas realizadas</h1>
        <!-- lista de reservas realizadas -->
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