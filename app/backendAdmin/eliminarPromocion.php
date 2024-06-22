<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['codpromo'])) {
    $codpromo = $_POST['codpromo'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_spa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "DELETE FROM promociones WHERE codpromo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $codpromo);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Promoción eliminada exitosamente.";
    } else {
        echo "Error al eliminar la promoción.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No se recibió el codigo de la promoción a eliminar.";
}
