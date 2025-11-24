<!DOCTYPE html>
<html>
<head>
    <title>Filtrar Materiales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/inicio_sesion/MVC/public/css/consult.css?v=<?php echo time();  ?>">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Filtrar Materiales</h2>

    <form method="POST" class="row g-3">

        <div class="col-md-4">
            <label>Materia</label>
            <select name="materia[]" multiple class="form-select">
                <?php while ($m = $materias->fetch_assoc()) { ?>
                <option value="<?php echo $m['materia']; ?>">
                    <?php echo $m['materia']; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-4">
            <label>Cuatrimestre</label>
            <select name="cuatrimestre[]" multiple class="form-select">
                <?php while ($c = $cuatrimestres->fetch_assoc()) { ?>
                <option value="<?php echo $c['cuatrimestre']; ?>">
                    <?php echo $c['cuatrimestre']; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-4">
            <label>Tipo</label>
            <select name="tipo[]" multiple class="form-select">
                <?php while ($t = $tipos->fetch_assoc()) { ?>
                <option value="<?php echo $t['tipo']; ?>">
                    <?php echo $t['tipo']; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-12 text-center">
            <button class="btn btn-primary mt-3" name="filtrar">Filtrar</button>
        </div>

    </form>

    <hr>

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
        <tr>
            <th>Título</th>
            <th>Materia</th>
            <th>Cuatrimestre</th>
            <th>Tipo</th>
            <th>Archivo</th>

        </tr>
        </thead>
        <tbody>
        <?php while ($row = $materiales->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['materia']; ?></td>
            <td><?php echo $row['cuatrimestre']; ?></td>
            <td><?php echo $row['tipo']; ?></td>
            <td>
                <a href="<?php echo $row['archivo']; ?>" target="_blank">
                    <button class="btn active">Ver material</button>
                </a>
            </td>

        </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>
