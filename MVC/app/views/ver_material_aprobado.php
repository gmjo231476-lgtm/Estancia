<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Material Aprobado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script></head>
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">

<body>
    
    <div class="container mt-4">
        <h2 class="text-center">Material</h2>
        <br>

        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered align-middle">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Materia</th>
                        <th>Cuatrimestre</th>
                        <th>Tipo</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $materiales->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['idMaterial']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['materia']; ?></td>
                            <td><?php echo $row['cuatrimestre']; ?></td>
                            <td><?php echo $row['tipo']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $row['archivo']; ?>" target="_blank">
                                                Ver material
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="index.php?action=calificar_mate&id=<?php echo $row['idMaterial']; ?>">
                                                Calificar
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="index.php?action=filtrar_material">
                                                Filtrar Materiales
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <br>
        <center>
            <a href="index.php?action=pagina_inicio_alum" class="btn active">Regresar</a>
        </center>
    </div>
</body>
</html>
