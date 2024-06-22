<?php
if(isset($_GET['action']) && $_GET['action'] === 'crear') {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_spa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $idReserva = $_POST['idReserva'];
    $nombreCliente = $_POST['nombreCliente'];
    $emailCliente = $_POST['emailCliente'];
    $telefonoCliente = $_POST['telefonoCliente'];
    $fechaReserva = $_POST['fechaReserva'];
    $codservicio = $_POST['codservicio'];
    
    $sql_servicio = "SELECT nomservicio FROM servicio WHERE codservicio = ?";
    $stmt_servicio = $conn->prepare($sql_servicio);
    $stmt_servicio->bind_param("i", $codservicio);
    $stmt_servicio->execute();
    $stmt_servicio->bind_result($nomservicio);
    $stmt_servicio->fetch();
    $stmt_servicio->close();

    $sql = "INSERT INTO reservas (idReserva, nombreCliente, emailCliente, telefonoCliente, fechaReserva, codservicio)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississ", $idReserva, $nombreCliente, $emailCliente, $telefonoCliente, $fechaReserva, $codservicio);

    if ($stmt->execute()) {
        echo "La reserva se guardó con éxito";
    } else {
        echo "Error al guardar la reserva";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Acción no especificada";
}