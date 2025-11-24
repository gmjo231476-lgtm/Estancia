<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Material</title>
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>REGISTRO DE MATERIAL</h1>

            <div class="input-box">
                <input type="text" name="titulo" placeholder="Título del material" required>
            </div>

            <div class="input-box">
                <input name="descripcion" placeholder="Descripción" required>
            </div>

            <div class="input-box">
                <input type="date" name="fechaPublicacion" placeholder="Fecha de publicación" required>
            </div>

            <div class="input-box">
                <input type="text" name="materia" placeholder="Materia" required>
            </div>

            <div class="input-box">
                <input type="number" name="cuatrimestre" placeholder="Cuatrimestre" min="1" max="16" required>
            </div>

            <div class="input-box">
                <input type="text" name="tipo" placeholder="Tipo de material (ej. video, pdf, guía...)" required>
            </div>

            <div class="">
                <input type="file" name="archivo" required>
            </div>

            <div class="input-box">
                <select name="estado" required>
                    <option value="" disabled selected>Seleccione el estado</option>
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>

            <div class="input-box">
                <select name="idCategoria" required>
                    <option value="" disabled selected>Seleccione la categoría</option>

                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?php echo $cat['idCategoria']; ?>">
                            <?php echo $cat['nombreCategoria']; ?>
                        </option>
                    <?php endforeach; ?>
                    
                </select>
            </div>

            <br><br>
            <button type="submit" name="enviar" class="btn">REGISTRAR</button>
        </form>

        <br>
        <a href="javascript:history.back()"> 
            <button class="btn active" data-bs-toggle="button" aria-pressed="true">Regresar</button>
        </a>
    
        
    </div>
    
</body>
</html>
