<?php
if(isset($_GET['action'])) {
    
    switch($_GET['action']) {
        case 'crear':

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "base_spa";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $codempleado = $_POST['codempleado'];
            $nomempleado = $_POST['nomempleado'];
            $apellempleado = $_POST['apellempleado'];
            $telempleado = $_POST['telempleado'];
            $dirempleado = $_POST['dirempleado'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $cargo = $_POST['cargo'];

            $sql = "INSERT INTO empleados (codempleado, nomempleado, apellempleado, telempleado, dirempleado, fechaNacimiento, cargo)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssss", $codempleado, $nomempleado, $apellempleado, $telempleado, $dirempleado, $fechaNacimiento, $cargo);

            if ($stmt->execute()) {
                echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Hecho</strong>, el empleado fue registrado satisfactoriamente.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } else {
                echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong>, ocurrió un problema al registrar el empleado. ' . htmlspecialchars($e->getMessage()) . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            $stmt->close();
        break;

        default:
            echo "Opción inválida";
            break;
    }
} else {
    echo "Acción no especificada";
}