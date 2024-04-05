<?= $this->extend('welcome_message.php') ?>

<?= $this->section('main') ?>

<div class="flex justify-center items-center min-h-screen w-full">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 m-10 w-3/5">
        <?php foreach ($articulos as $articulo) : ?>
            <div onmouseover="this.style.backgroundColor='#f26522'; this.querySelectorAll('.text-color').forEach(function(el) { el.style.color = 'white'; });" onmouseout="this.style.backgroundColor=''; this.querySelectorAll('.text-color').forEach(function(el) { el.style.color = ''; });" class="flex flex-col bg-white mt-10  rounded-lg  dark:bg-gray-800 dark:border-gray-700 overflow-hidden redirigible" data-url="<?= site_url('tendencia-actual/' . $articulo['id']) ?>">
                <img class="w-full h-48 object-cover" src="<?= base_url('storage/' . esc($articulo['image'])) ?>" alt="">
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2 text-color"><?= esc($articulo['title']) ?></h5>
                    <p class="flex-1 text-gray-700 dark:text-gray-400 mb-3 text-color">
                        <?= esc(substr($articulo['content'], 0, 147)) . (strlen($articulo['content']) > 147 ? "..." : "") ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script>
    document.querySelectorAll('.redirigible').forEach(function(el) {
        el.addEventListener('click', function() {
            window.location.href = this.getAttribute('data-url');
        });
    });
</script>

<?= $this->endSection() ?>