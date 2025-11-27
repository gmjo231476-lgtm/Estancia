<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
    <title>Listas</title>
</head>
<body>
    <center><h1>CONSULTA</h1></center>
    
    <div class="container mt-4"> <!-- Contiene el diseño de Bustrap -->
        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered align-middle">
                <thead> <!-- Encabezado de la tabla -->
                    <th>ID</th> 
                    <th>NOMBRE</th>
                    <th>APELLIDO PARTERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>USUARIO</th>
                    <th>CORREO</th>
                    <th>GENERO</th>
                    <th>ACCIONES</th>
                </thead>
                <tbody>     
                    <?php // Mientras existan registro en la consulta usuarios
                        while($row = $usuarios -> fetch_assoc()){ 
                    ?> 
                    <tr> <!-- Se muestran los datos del alumno fils por fila -->
                        <td><?php echo $row['idAlumno']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellidoP']; ?></td>
                        <td><?php echo $row['apellidoM']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['correo']; ?></td>
                        <td><?php echo $row['genero']; ?></td>

                        <td>
                            <a href="index.php?action=update&id=<?php echo $row['idAlumno']; ?>">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">Editar</button>
                            </a>
                            <a href="index.php?action=delete&id=<?php echo $row['idAlumno']; ?>">
                                <button type="button" onclick="return confirm('¿Desesea eliminar al usuario?')" 
                                class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">Eliminar</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <center>
        <a href="index.php?action=insert" class="btn btn-secondary">Ir a Registro</a>
    </center><br>
    <center><a href="javascript:history.back()"><button class="btn btn-secondary">Regresar</button></a></center>
</body>
</html>