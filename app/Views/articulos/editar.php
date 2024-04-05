<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Editar Artículo</h1>
        <form action="<?= site_url('articulos/actualizar') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $articulo['id'] ?>">
            <div class="form-group">
                <label for="meta_title">Meta Título</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= esc($articulo['meta_title']) ?>" required>
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Descripción</label>
                <textarea class="form-control" id="meta_description" name="meta_description" rows="2" required><?= esc($articulo['meta_description']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= esc($articulo['title']) ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($articulo['description']) ?></textarea>
            </div>

            <!-- Mostrar la imagen actual si existe -->
            <?php if (!empty($articulo['image'])) : ?>
                <div class="form-group">
                    <label>Imagen Actual</label>
                    <div>
                        <img src="<?= base_url('storage/' . esc($articulo['image'])) ?>" alt="Imagen actual" style="width: 100%; max-width: 250px;">
                        <input type="text" class="form-control" id="imagenActual" name="imagenActual" value="<?= esc($articulo['image']) ?>" readonly>
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="image">Nueva Imagen</label>
                <input type="file" class="form-control-file" id="image" name="image" onchange="previsualizarImagen(event);">
                <div class="mt-3">
                    <img id="previsualizacion" src="#" alt="Previsualización de imagen" style="width: 100%; max-width: 250px; display: none;">
                </div>
            </div>

            <div class="form-group">
                <label for="content">Contenido del Artículo</label>
                <textarea class="form-control" id="content" name="content" rows="5" required><?= esc($articulo['content']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="schedule_date">Fecha de Programación</label>
                <input type="date" class="form-control" id="schedule_date" name="schedule_date" value="<?= esc($articulo['schedule_date']) ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="<?= site_url('articulos') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        function previsualizarImagen(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previsualizacion');
                output.src = reader.result;
                output.style.display = 'block'; // Mostrar la previsualización
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>