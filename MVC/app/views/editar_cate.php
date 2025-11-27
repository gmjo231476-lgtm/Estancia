  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Categoria</title>
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/style_registro.css?v=<?php echo time();  ?>">
</head>
<body>
    <div class="wrapper">
    
    <form action="index.php?action=update_cate" method="POST">
        <h1>EDITAR CATEGORIA <?php echo $row['nombreCategoria']; ?></h1> 
        <input type="hidden" name="id" value="<?php echo $row['idCategoria']; ?>">

            <div class="input-box">
                <input type="text" name="nombreCategoria" value="<?php echo $row['nombreCategoria']; ?>">
            </div>

            <div class="input-box">
                <input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>">
            </div>
            <br><br>
            <button type="submit" name="editar"  class="btn active" data-bs-toggle="button" aria-pressed="true">Editar</button>
            
        </form>
    </div>
</body>
</html>
