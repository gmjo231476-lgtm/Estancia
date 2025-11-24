<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">    <title>Coonsulta Administrador</title>
</head>
<body>
    <center><h1>CONSULTA ADMINISTRADOR</h1></center>

    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered align-middle">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>USUARIO</th>
                <th>CORREO</th>
                <th>ACCIONES</th>
                <tbody>
                    <?php
                        while($row = $Administrador -> fetch_assoc()){
                    ?>
                    <tr>
                            <td><?php echo $row['idAdministrador']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['apellidoP']; ?></td>
                            <td><?php echo $row['apellidoM']; ?></td>
                            <td><?php echo $row['usuario']; ?></td>
                            <td><?php echo $row['correo']; ?></td>

                            <td>
                                <a href="index.php?action=update_adm&id=<?php echo $row['idAdministrador']; ?>">
                                    <button type="button" class="btn btn-secondary">Editar</button>
                                </a>
                                <a href="index.php?action=delete_adm&id=<?php echo $row['idAdministrador']; ?>">
                                    <button type="button" onclick="return confirm('¿Desesea eliminar al usuario?')" 
                                    class="btn btn-secondary">Eliminar</button>
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
    <a href="index.php?action=insert_adm">
        <center><button type="button" class="btn btn-secondary">Ir a Registro</button>
    </a></center>
    <br>
    <center><a href="javascript:history.back()"><button class="btn btn-secondary">Regresar</button></a></center>
</body>
</html>