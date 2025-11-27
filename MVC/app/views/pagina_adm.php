<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-purple" style="background-color:#6f42c1;">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold">UPEMOR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav align-items-center w-100 d-flex">

        <li class="nav-item dropdown me-5">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Alumnos
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert">Registrar Alumno</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=consult">Consultar Alumnos</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown me-5">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Profesores
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert_prof">Registrar Profesor</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=consult_prof">Consultar Profesor</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown me-5">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Administrador
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert_adm">Registrar Administrador</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=consult_adm">Consultar Administrador</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown me-5">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Material
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert_mate">Registrar Material</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=consult_mate">Consultar Materiales</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown me-5">
          <button class="btn btn-light  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Categoría
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert_cate">Registrar Categoría</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=consult_cate">Consultar Categoría</a></li>
          </ul>
        </li>

        <li class="nav-item me-5">
          <a class="nav-link" href="/inicio_sesion/MVC/app/views/Generar_reportes.php">
            <button type="button" class="btn btn-light">Reportes</button>
          </a>
        </li>

        <li class="nav-item me-5">
          <a class="nav-link" href="/inicio_sesion/MVC/index.php?action=perfil_adm">
            <button type="button" class="btn btn-light">Consultar perfil</button>
          </a>
        </li>

        <li class="nav-item ms-auto">
          <a class="nav-link" href="/inicio_sesion/MVC/index.php?action=cerrar_sesion">
            <button type="button" class="btn btn-danger me-md-2">Cerrar sesión</button>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<center><img src="/inicio_sesion/MVC/media/Upemor_2.webp" alt="Logo" ></center>
</body>
</html>
