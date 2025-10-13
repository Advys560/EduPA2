<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Verificar en la BD
    $sql = "SELECT * FROM administrador WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Si usaste MD5:
        if ($row['password'] === md5($password)) {
            $_SESSION['admin'] = true;
            header("Location: admin.php");
            exit();
        }
        // Si usaste password_hash:
        // if (password_verify($password, $row['password'])) { ... }
    }
    
    echo "Usuario o contraseña incorrectos.";
}
?>
