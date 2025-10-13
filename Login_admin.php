<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login Administrador</title>
  <style>
    body { font-family: Arial, sans-serif; background: #111; color: #fff; display:flex; justify-content:center; align-items:center; height:100vh; }
    form { background:#222; padding:20px; border-radius:8px; }
    input { display:block; margin:10px auto; padding:10px; width:200px; }
    button { padding:10px; background:green; color:white; border:none; cursor:pointer; }
    button:hover { background:darkgreen; }
  </style>
</head>
<body>
  <form method="POST" action="validar_admin.php">
    <h2>Login Administrador</h2>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
  </form>
</body>
</html>
