<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == 'crear') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_spa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Comenzamos una transacción para asegurar que todas las inserciones se realicen correctamente
    $conn->begin_transaction();

    try {
        // Insertar el subservicio
        $codservicio = $_POST['codservicio'];
        $nomsubservicio = $_POST['nomsubservicio'];
        $codempleado = $_POST['codempleado'];
        $sql_subservicio = "INSERT INTO subservicio (nomsubservicio, codempleado, codservicio) VALUES ('$nomsubservicio', '$codempleado', '$codservicio')";

        if ($conn->query($sql_subservicio) === TRUE) {
            // Confirmar la transacción
            $conn->commit();
            echo "Subservicio insertado correctamente";
        } else {
            throw new Exception("Error al insertar subservicio: " . $conn->error);
        }
    } catch (Exception $e) {
        // Si ocurre un error, revertimos la transacción
        $conn->rollback();
        echo $e->getMessage();
    }

    $conn->close();
}