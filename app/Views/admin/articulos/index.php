<?= $this->extend('admin/admin_main.php') ?>
<?= $this->section('main') ?>

<div class=" m-5">
    <a href="<?= site_url('articulos/nuevo') ?>" class="mb-8">
        <button type="button" class=" focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-8 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Añadir Nuevo Artículo
        </button>
    </a>

    <div class="flex flex-wrap -m-2">
        <?php foreach ($articulos as $articulo) : ?>
            <div class="p-2 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                <div class="max-w-sm  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg w-full h-48" src="<?= base_url('storage/' . esc($articulo['image'])) ?>" alt="" />

                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= esc($articulo['title']) ?></h5>
                        </a>
                        <div class="flex flex-col justify-between h-48">
                            <div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    <?= esc(substr($articulo['content'], 0, 147)) . (strlen($articulo['content']) > 147 ? "..." : "") ?>
                                </p>
                            </div>

                            <div class="flex justify-between items-end space-x-2"> <!-- Ajusta aquí según sea necesario -->
                                <a href="<?= site_url('articulos/editar/' . $articulo['id']) ?>">
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Editar
                                    </button>
                                </a>

                                <a href="<?= site_url('articulos/eliminar/' . $articulo['id']) ?>" onclick="return confirm('¿Está seguro de que desea eliminar este artículo?')">
                                    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Eliminar
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>


<?= $this->endSection() ?>