<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Artículos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Artículos</h1>
        <a href="<?= site_url('articulos/nuevo') ?>" class="btn btn-primary mb-3">Añadir Nuevo Artículo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Meta Título</th>
                    <th>Título</th>
                    <th>Fecha de Programación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articulos as $articulo) : ?>
                    <tr>
                        <td><?= esc($articulo['meta_title']) ?></td>
                        <td><?= esc($articulo['title']) ?></td>
                        <td><?= esc($articulo['schedule_date']) ?></td>
                        <td>
                            <a href="<?= site_url('articulos/editar/' . $articulo['id']) ?>" class="btn btn-info">Editar</a>
                            <a href="<?= site_url('articulos/eliminar/' . $articulo['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este artículo?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>