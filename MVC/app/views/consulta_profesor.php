<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
    <title>Consultar Profesor</title>
</head>
<body>
<center><h1>CONSULTA PROFESORES</h1></center>
<div class="container mt-4">
    <div class="table-responsive">
        
        <table class="table table-striped-columns table-bordered align-middle">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO PARTERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>USUARIO</th>
                <th>NUMEROEMPLEADO</th>
                <th>ESPECIALIDAD</th>
                <th>CORREO</th>
                <th>ACCIONES</th>
            </thead>
            <tbody>
                <?php
                    while($row = $profesores -> fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['idProfesor']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellidoP']; ?></td>
                    <td><?php echo $row['apellidoM']; ?></td>
                    <td><?php echo $row['usuario']; ?></td>
                    <td><?php echo $row['numeroEmpleado']; ?></td>
                    <td><?php echo $row['especialidad']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td>
                        <a href="index.php?action=update_prof&id=<?php echo $row['idProfesor']; ?>">
                            <button class="btn btn-secondary">Editar</button>
                        </a>
                        <a href="index.php?action=delete_prof&id=<?php echo $row['idProfesor']; ?>">
                            <button class="btn btn-secondary" onclick="return confirm('¿Desesea eliminar al usuario?')">Eliminar</button>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?> 
            </table>   
        </tbody>
    </div>
</div>
<center><a href="javascript:history.back()"><button class="btn btn-secondary">Regresar</button></a></center>
</body>
</html>