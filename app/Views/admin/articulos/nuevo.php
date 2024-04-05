<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir/Editar Artículo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1>Añadir Nuevo Artículo</h1>

        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('articulos/guardar') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="meta_title">Meta Título</label>
                <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?= old('meta_title') ?>" required>
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Descripción</label>
                <textarea class="form-control" id="meta_description" name="meta_description" rows="2" required><?= old('meta_description') ?></textarea>
            </div>

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" value="<?= old('description') ?>" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage();">
                <img id="imagenPrevisualizacion" src="#" alt="Previsualización de la imagen" style="max-width: 100%; height: auto; display: none;">
            </div>

            <div class="form-group">
                <label for="content">Contenido del Artículo</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="schedule_date">Fecha de Programación</label>
                <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= site_url('articulos') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        function previewImage() {
            const input = document.getElementById('image');
            const imagePreview = document.getElementById('imagenPrevisualizacion');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Muestra la previsualización
                };

                reader.readAsDataURL(input.files[0]); // Lee el archivo seleccionado
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>