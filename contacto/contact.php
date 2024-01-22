<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abfinal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$texto = $_POST['mensaje'];

$stmt = $conn->prepare("INSERT INTO formulario (nombre, apellido, telefono, email, texto) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $apellido, $telefono, $email, $texto);

$stmt->execute();

header('Location: ./?t=Formulario enviado correctamente');

$stmt->close();
$conn->close();


?>
