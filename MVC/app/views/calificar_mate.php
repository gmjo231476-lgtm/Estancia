<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificar Material</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Calificar Material</h2>

    <form method="POST">
        <input type="hidden" name="idMaterial" value="<?php echo $idMaterial; ?>">
        <input type="hidden" name="idAlumno" value="1"> <!-- Aquí usa la sesión del alumno -->

        <div class="mb-1">
            <label class="form-label">Puntuación (1 a 5)</label>
            <select name="puntuacion" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="1">1 ⭐</option>
                <option value="2">2 ⭐⭐</option>
                <option value="3">3 ⭐⭐⭐</option>
                <option value="4">4 ⭐⭐⭐⭐</option>
                <option value="5">5 ⭐⭐⭐⭐⭐</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Comentario</label>
            <textarea name="comentario" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" name="enviar" class="btn btn-primary">Enviar Calificación</button>

        <a href="index.php?action=consult_mate" class="btn btn-secondary">Regresar</a>
    </form>
</div>
</body>
</html>
