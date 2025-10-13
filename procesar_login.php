<?php
$servername = "localhost";
$username = "root"; 
$password = "";   
$dbname = "db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Buscar usuario
$sql = "SELECT password FROM usuarios WHERE email = ? OR nombre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $user);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hash);
    $stmt->fetch();
    if (password_verify($pass, $hash)) {
        // Inicio de sesión exitoso
        header("Location: Idea1.html");
        exit();
    } else {
        header("Location: sesion.html?error=1");
        exit();
    }
} else {
    header("Location: sesion.html?error=1");
    exit();
}

$stmt->close();
$conn->close();
?>