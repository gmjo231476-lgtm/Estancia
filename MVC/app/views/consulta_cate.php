<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
    <title>Lista de Categorías</title>
</head>
<body>
    <center><h1>CONSULTA DE CATEGORÍAS</h1></center>
    
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped-columns table-bordered align-middle">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE CATEGORÍA</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ACCIONES</th>
                </thead>
                <tbody>
                    <?php
                        while($row = $categoria->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['idCategoria']; ?></td>
                        <td><?php echo $row['nombreCategoria']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>

                        <td>
                            <a href="index.php?action=update_cate&id=<?php echo $row['idCategoria']; ?>">
                                <button type="button" class="btn active" data-bs-toggle="button" aria-pressed="true">Editar</button>
                            </a>
                            <a href="index.php?action=delete_cate&id=<?php echo $row['idCategoria']; ?>">
                                <button type="button" onclick="return confirm('¿Desea eliminar la categoría?')" 
                                class="btn active" data-bs-toggle="button" aria-pressed="true">Eliminar</button>
                            </a>
                            <a href="index.php?action=filtrar_material">Filtrar Materiales</a>
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
    <center><a href="index.php?action=insert_cate">
        <button class="btn active" data-bs-toggle="button" aria-pressed="true">Ir a Registro</button>
    </a></center>
    <br>
    <a href="javascript:history.back()"><button class="btn active">Regresar</button></a>
</body>
</html>
