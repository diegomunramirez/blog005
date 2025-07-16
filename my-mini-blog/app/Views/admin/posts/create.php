<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class=" flex flex-col items-center justify-center">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-lg font-bold text-admin-900 mb-2">Crear Nuevo Post</h2>
        <p class="text-admin-600">Completa la información para crear un nuevo artículo en tu blog.</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md rounded-lg">
        <form action="<?= base_url('admin/posts/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">

            <?= csrf_field() ?>

            <div>
                <label for="title" class="block text-gray-700 font-medium mb-1">Título <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" required
                    class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Título del post">
            </div>

            <div class="mb-4">
                <label for="image" class="inline-block cursor-pointer bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Seleccionar imagen
                    <span class="text-red-500">*</span>
                </label>
                   <p class="text-xs text-admin-500 mt-1">Formatos .jpg, .png y jpg</p>
                <!-- Input oculto -->
                <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" required
                 class="hidden" onchange="previewImage(event)">
                <!-- Previsualización -->
                <div id="container-preview" class="flex items-center justify-center">
                    <img id="preview" src="#" alt="Previsualización" class="hidden max-h-48 rounded-md border border-gray-300 shadow-sm mt-2" />
                </div>
            </div>

            <div class="mb-6">
                <label for="category" class="block text-gray-700 font-medium mb-1">Categoría <span class="text-red-500">*</span></label>
                
                <select name="category" id="category_id">
                        <?php  foreach($categories as $category): ?>
                            <option value="<?= $category->id ?>"> <?= $category->name ?> </option>
                        <?php endforeach ?>
                </select>
                <!-- <input type="text" name="category" id="category" required
                    class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Nombre de la categoría"> -->
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-1">Contenido <span class="text-red-500">*</span></label>
                <input type="text" name="content"
                    id="content"
                    class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="reading_time" class="block text-gray-700 font-medium mb-1">Tiempo de lectura <span class="text-red-500">*</span></label>
                <input type="number" pattern="[0-9]" name="reading_time" id="reading_time" required min='1'
                    class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="7 minutos">
            </div>

            <div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md w-full">
                    Guardar
                </button>
            </div>
        </form>
    </div>
    <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    }
    </script>

</div>
<?= $this->endSection('') ?>