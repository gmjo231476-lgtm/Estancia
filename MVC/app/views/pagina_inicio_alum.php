<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina Alumno</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg bg-purple" style="background-color:#6f42c1;">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold" href="#">UPEMOR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav align-items-center w-100 d-flex">
        <li class="nav-item dropdown me-5">
          <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Material
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert_mate">Registrar Material</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=ver_material_aprobado">Consultar Material</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown me-5">
          <button class="btn btn-light  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Categoria
          </button>
          <ul class="dropdown-menu dropdown-menu-light">
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=insert_cate">Registrar Categoria</a></li>
            <li><a class="dropdown-item" href="/inicio_sesion/MVC/index.php?action=consult_cate">Consultar Categoria</a></li>
          </ul>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="/inicio_sesion/MVC/index.php?action=perfil">
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
