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
        <form action="" method="POST">
            <h1>REGISTRO CATEGORIA</h1>

            <div class="input-box">
                <input type="text" name="nombreCategoria" placeholder="Nombre Categoria" required>
            </div>

            <div class="input-box">
                <input type="text" name="descripcion" placeholder="Descripcion" required>
            </div>
            <button type="submit" name="enviar" envule="Enviar" class="btn">REGISTRAR</button>
            
        </form>
            <br>
            <a href="javascript:history.back()"><button class="btn active">Regresar</button></a>

    </div>
</body>
</html>
