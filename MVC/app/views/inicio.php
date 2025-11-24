<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/menu.css">
    <title>Document</title>
</head>
<body>
  <h1>CSS Dropdown Menu</h1>      
<nav>

  <label for="touch"><span>Opciones</span></label>               
  <input type="checkbox" id="touch"> 

  <ul class="slide">
    <li><a href="/inicio_sesion/MVC/index.php?action=insert">Registro Alumno</a></li> 
    <li><a href="/inicio_sesion/MVC/index.php?action=insert_prof">Registro Profesor</a></li>
    <li><a href="/inicio_sesion/MVC/index.php?action=insert_adm">Registro Administrador</a></li>
    <li><a href="/inicio_sesion/MVC/app/views/inicio_sesion.php">Inicio sesion</a></li>
  </ul>

</nav> 
</body>
</html>