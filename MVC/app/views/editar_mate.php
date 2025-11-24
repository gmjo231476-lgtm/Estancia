<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Material</title>
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">

        <form action="index.php?action=update_mate" method="POST" enctype="multipart/form-data">
            <h1>EDITAR MATERIAL: <?php echo $row['titulo']; ?></h1>
            <input type="hidden" name="idMaterial" value="<?php echo $row['idMaterial']; ?>">

            <div class="input-box">
                <input type="text" name="titulo" placeholder="Título" value="<?php echo $row['titulo']; ?>" required>
            </div>

            <div class="input-box">
                <input type="text" name="descripcion" placeholder="Descripción" value="<?php echo $row['descripcion']; ?>">
            </div>

            <div class="input-box">
                <input type="date" name="fechaPublicacion" value="<?php echo $row['fechaPublicacion']; ?>" required>
            </div>

            <div class="input-box">
                <input type="text" name="materia" placeholder="Materia" value="<?php echo $row['materia']; ?>" required>
            </div>

            <div class="input-box">
                <input type="number" name="cuatrimestre" placeholder="Cuatrimestre" value="<?php echo $row['cuatrimestre']; ?>" required>
            </div>

            <div class="input-box">
                <input type="text" name="tipo" placeholder="Tipo de material (PDF, PPT, etc.)" value="<?php echo $row['tipo']; ?>" required>
            </div>
            
            <div  style="max-width: 350px; width: 350px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;">
                <?php echo basename($row['archivo']); ?><br>
                <input type="file" name="archivo">
            </div>
            <div class="input-box">
                <input type="text" name="estado" placeholder="Estado (Publicado, Borrador, etc.)" value="<?php echo $row['estado']; ?>" required>
            </div>

            <div class="input-box">
                <input type="number" name="idCategoria" placeholder="ID de categoría" value="<?php echo $row['idCategoria']; ?>" required>
            </div>

            <br><br>
            <button type="submit" name="editar" class="btn active" data-bs-toggle="button" aria-pressed="true">Editar</button>
        </form>
<br>
        <a href="index.php?action=consult_mate">
            <button class="btn active">Lista</button>
        </a>
        <br>
        <br>
        <a href="javascript:history.back()"><button class="btn active">Regresar</button></a>
        <br>
    </div>
</body>
</html>
