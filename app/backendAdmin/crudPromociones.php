<?php
// Conexión a la base de datos
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $codsubservicio1 = $_POST['codsubservicio1'];
    $codsubservicio2 = $_POST['codsubservicio2'];

    // Manejo de la imagen
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        // Verificar si la carpeta de destino existe y tiene permisos correctos
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Subir la imagen
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            $imagen = basename($_FILES["imagen"]["name"]);

            // Insertar la promoción en la base de datos
            $sql = "INSERT INTO promociones (titulo, descripcion, imagen, fecha_inicio, fecha_fin, codsubservicio1, codsubservicio2)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssii", $titulo, $descripcion, $imagen, $fecha_inicio, $fecha_fin, $codsubservicio1, $codsubservicio2);

            if ($stmt->execute()) {
                echo "Nueva promoción agregada exitosamente";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error subiendo la imagen.";
        }
    } else {
        echo "El archivo no es una imagen.";
    }
}

$conn->close();
header("Location: ../vistaAdmin/PromocionesAdmin.php");
