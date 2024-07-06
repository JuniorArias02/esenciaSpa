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
                <li><a href="../vistaAdmin/sobreNosotrosAdmin.php">Sobre Nosotros</a></li>
                <li>
                    <a href="../vistaAdmin/nuestrosServiciosAdmin.php">Nuestros Servicios</a>
                    <ul class="submenu">
                        <li><a href="#nuestros_Servicios">Nuestros Servicios</a></li>
                        <li><a href="#tratamiento_faciales">Tratamiento Faciales</a></li>
                        <li><a href="#tratamiento_corporales">Tratamientos Corporales</a></li>
                        <li><a href="#tratamiento_bienestar">Tratamientos Terapeuticos Y De Bienestar</a></li>
                        <li><a href="#tratamiento_postOperatorio">Tratamientos Post-Operatorios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../vistaAdmin/PromocionesAdmin.php">Promociones</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/adminPromociones.php">Administrar promociones</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../vistaAdmin/reservasAdmin.php">Reservas</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/insEmpleados.php">Listar Reservas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Empleados</a>
                    <ul class="submenu">
                        <li><a href="../vistaAdmin/insEmpleados.php">Insertar empleados</a></li>
                        <li><a href="../vistaAdmin/listarEmpleados.php">Listar empleados</a></li>
                        <li><a href="../vistaAdmin/buscarEmpleado.php">Buscar empleado</a></li>
                    </ul>
                </li>
                <li><a href="/esenciaSpa">salir</a></li>
            </ul>
        </div>
    </header>

    <div class="formulario-reserva-admin">
        <h1 class="titulo-reserva roboto-bold">Reservas realizadas</h1>
        <div class="search-container">
        <form id="searchForm">
            <input type="text" placeholder="Buscar por ID, Nombre, Email o Teléfono" id="searchInput" name="search">
        </form>
    </div>

    <table border="1" class="roboto-light" id="reservasTable">
        <thead>
            <tr>
                <th>ID Reserva</th>
                <th>Nombre Cliente</th>
                <th>Email Cliente</th>
                <th>Teléfono Cliente</th>
                <th>Fecha Reserva</th>
                <th>Código Servicio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "base_spa";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener las reservas
            $sql = "SELECT idReserva, nombreCliente, emailCliente, telefonoCliente, fechaReserva, codservicio FROM reservas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr id='row-" . $row['idReserva'] . "'>";
                    echo "<td>" . $row["idReserva"] . "</td>";
                    echo "<td>" . $row["nombreCliente"] . "</td>";
                    echo "<td>" . $row["emailCliente"] . "</td>";
                    echo "<td>" . $row["telefonoCliente"] . "</td>";
                    echo "<td>" . $row["fechaReserva"] . "</td>";
                    echo "<td>" . $row["codservicio"] . "</td>";
                    echo "<td class='accion_form'>";
                    echo "<button onclick=\"confirmarReserva('" . $row['telefonoCliente'] . "', '" . $row['nombreCliente'] . "')\">Confirmar</button>";
                    echo "<button class='cancel' onclick=\"cancelarReserva(" . $row['idReserva'] . ")\">Cancelar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay reservas disponibles</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        const searchInput = document.getElementById('searchInput');
        const reservasTable = document.getElementById('reservasTable').getElementsByTagName('tbody')[0];

        searchInput.addEventListener('input', function() {
            const searchText = this.value.toLowerCase();

            Array.from(reservasTable.rows).forEach(function(row) {
                const idReserva = row.cells[0].textContent.toLowerCase();
                const nombreCliente = row.cells[1].textContent.toLowerCase();
                const emailCliente = row.cells[2].textContent.toLowerCase();
                const telefonoCliente = row.cells[3].textContent.toLowerCase();

                if (idReserva.includes(searchText) || nombreCliente.includes(searchText) || emailCliente.includes(searchText) || telefonoCliente.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function confirmarReserva(telefono, nombre) {
            const mensaje = `Hola ${nombre}, su reserva ha sido confirmada.`;
            const url = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;
            window.location.href = url;
        }

        function cancelarReserva(id) {
            if (confirm("¿Estás seguro de que deseas cancelar esta reserva?")) {
                const formData = new FormData();
                formData.append('id', id);

                fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data.includes("exitosamente")) {
                        document.getElementById('row-' + id).remove();
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>
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