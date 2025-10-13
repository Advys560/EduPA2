<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login_admin.php");
    exit();
}

include "conexion.php";
$result = $conn->query("SELECT * FROM usuarios"); // tu tabla de usuarios
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administrador</title>
</head>
<body>
  <h1>Panel de Administrador</h1>
  <a href="logout_admin.php">Cerrar sesión</a>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>ID</th><th>Usuario</th><th>Correo</th><th>Acción</th></tr>
    <?php while ($fila = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $fila['id'] ?></td>
        <td><?= $fila['nombre'] ?></td>
        <td><?= $fila['email'] ?></td>
        <td><a href="eliminar_usuario.php?id=<?= $fila['id'] ?>">Eliminar</a></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
