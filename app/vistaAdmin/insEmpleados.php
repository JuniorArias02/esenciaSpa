<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" type="text/css" href="../resources/style/inicio.css">
    <link rel="stylesheet" href="../resources/style/reservas.css">
    <link rel="stylesheet" href="../resources/style/tipografia.css">
    <link rel="stylesheet" href="../resources/style/insEmpleado.css">
    <link rel="stylesheet" href="../resources/style/tablasStyle.css">
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
    <div class="contenedor-form">
        <div class="formulario-reserva-admin">
            <h1 class="titulo-reserva roboto-bold">Insertar empleado</h1>
            <form action="../backendAdmin/crudempleado.php?action=crear" method="POST" class="roboto-bold ">

                <label for="codempleado">Código empleado:</label>
                <input type="number" id="codempleado" name="codempleado" required><br><br>

                <label for="nomempleado">Nombre Empleado:</label>
                <input type="text" id="nomempleado" name="nomempleado" required><br><br>

                <label for="apellempleado">Apellidos empleado:</label>
                <input type="text" id="apellempleado" name="apellempleado" required><br><br>

                <label for="telempleado">Teléfono empleado:</label>
                <input type="number" id="telempleado" name="telempleado" required><br><br>

                <label for="dirempleado">Dirección empleado:</label>
                <input type="text" id="dirempleado" name="dirempleado" required><br><br>

                <label for="fechaNacimiento">Fecha Nacimiento:</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br><br>

                <label for="cargo">Cargo:</label>
                <select name="cargo" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>
                </select><br><br>
                <div class="btn-guardar">
                    <input type="submit" value="Guardar">
                </div>

            </form>
        </div>
    </div>

</body>

</html>