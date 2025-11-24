<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Materiales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
</head>
<body>
    <center><h1>CONSULTA DE MATERIALES</h1></center>
    
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TÍTULO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>FECHA PUBLICACIÓN</th>
                        <th>MATERIA</th>
                        <th>CUATRIMESTRE</th>
                        <th>TIPO</th>
                        <th>ESTADO</th>
                        <th>CATEGORÍA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = $materiales->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['idMaterial']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['fechaPublicacion']; ?></td>
                        <td><?php echo $row['materia']; ?></td>
                        <td><?php echo $row['cuatrimestre']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['idCategoria']; ?></td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </button>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a class="dropdown-item" href="index.php?action=update_mate&id=<?php echo $row['idMaterial']; ?>">
                                            Editar
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="index.php?action=delete_mate&id=<?php echo $row['idMaterial']; ?>"
                                        onclick="return confirm('¿Desea eliminar este material?')">
                                            Eliminar
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?php echo $row['archivo']; ?>" target="_blank">
                                            Ver material
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="index.php?action=aprobar_mate&id=<?php echo $row['idMaterial']; ?>">
                                            Aprobar
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="index.php?action=rechazar_mate&id=<?php echo $row['idMaterial']; ?>">
                                            Rechazar
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="index.php?action=calificar_mate&id=<?php echo $row['idMaterial']; ?>">
                                            Calificar
                                        </a>
                                    </li>

                                </ul>
                </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <center>
        <a href="index.php?action=insert_mate">
            <button class="btn btn-secondary">Registrar nuevo material</button>
        </a>
        <a href="javascript:history.back()"> 
            <button class="btn btn-secondary">Regresar</button>
        </a>

    </center>
</body>
</html>
