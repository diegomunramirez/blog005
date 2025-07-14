<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/categories/create') ?>"
       class="text-white bg-blue-500 hover:bg-blue-600 text-sm font-medium px-4 py-2 rounded-md transition">
        Crear categoría
    </a>
</div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
    <?php if (!empty($categories)): ?>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Categoría</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Descripción</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($categories as $category): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800"><?= esc($category->name) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-800"><?= esc($category->description) ?></td>
                        <td class="px-6 py-4 text-center space-x-2">
                            
                            <!----<?= base_url('admin/categories/edit/' . $category->id) ?>--->
                            <a href="#" 
                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-md transition">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M11 5h2m-1 1v2m-2.828 8.828a4 4 0 005.656 0L20 11.656a4 4 0 000-5.656L17.657 4a4 4 0 00-5.657 0L8 8.343a4 4 0 000 5.657z"></path>
                                </svg>
                                Editar
                            </a>

                            
                            <form action="#" method="post" class="inline"> <!-- <?= base_url('admin/categories/delete/' . $category->id) ?>--->
                                <?= csrf_field() ?>
                                <button type="button"
                                        onclick="return confirm('¿Estás seguro de eliminar esta categoría?')"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-100 rounded-md transition">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <h2 class="text-gray-600 font-semibold text-lg">No hay categorías todavía.</h2>
    <?php endif ?>
</div>

<?= $this->endSection() ?>
