<?php 
session_start();
session_destroy();
echo 'Cerró sesión';
echo '<script> window.location="Inicio.php"; </script>';
?>

<html>
<head>
<title> Saliendo...</title>
</head>
<body style="background-image: url(./Control_Mantenimiento_Infraestructura_files/Img/Fondo.png);">
<script>location.href="index.php"; </script>';
</body>
</html>