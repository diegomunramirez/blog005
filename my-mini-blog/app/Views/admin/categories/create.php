<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-center">
       <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Nueva Categoría</h2>

        <form method="POST" action="<?= base_url('admin/categories/store') ?>">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">
                    Nombre de la categoría <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" placeholder="Ingresa el nombre de la categoría"
                       class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <p class="text-xs text-admin-500 mt-1">Máximo 64 caracteres recomendado</p>

            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-medium mb-1">
                    Descripción <span class="text-red-500">*</span>
                </label>
                <input type="text" id="description" name="description" placeholder="Descripcion"
                       class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <p class="text-xs text-admin-500 mt-1">Máximo 255a caracteres recomendado</p>

            </div>

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md w-full">
                Guardar
            </button>
        </form>
    </div>
</div>

<?= $this->endSection('') ?>