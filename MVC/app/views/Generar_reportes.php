<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
    <title>Reporte de Género</title>
</head>
<body>

<center><h1>REPORTES </h1></center>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped-columns table-bordered align-middle">
            <thead>
                <th>REPORTE</th>
                <th>ACCIONES</th>
            </thead>

            <tbody>
                <tr>
                    <td>Top 3 materiales</td>

                    <td>
                        <a href="/inicio_sesion/MVC/index.php?action=pdf_top3">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">GENERAR PDF</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Generar reporte de porcentaje de Hombres y Mujeres</td>

                    <td>
                        <a href="/inicio_sesion/MVC/index.php?controller=report&action=pdf_report">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">GENERAR PDF</button>
                        </a>

                        <a href="/inicio_sesion/MVC/index.php?controller=report&action=pdf_pie">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">Gráfica Pastel</button>
                        </a>
                    </td>
                <tr>
                    <td>Total de números de categorias</td>

                    <td>
                        <a href="/inicio_sesion/MVC/index.php?action=pdf_categorias">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">GENERAR PDF</button>
                        </a>
                    </td>
            </tbody>

        </table>
        <a href="javascript:history.back()"> 
                <button class="btn btn-secondary" data-bs-toggle="button" aria-pressed="true">Regresar</button>
        </a>    
    </div>
</div>

</body>
</html>
 