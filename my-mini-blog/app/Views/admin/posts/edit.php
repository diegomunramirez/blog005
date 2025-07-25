<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class=" flex flex-col items-center justify-center">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-lg font-bold text-admin-900 mb-2">Editar Post</h2>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md rounded-lg">
    <form action="<?= base_url('admin/posts/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">


            <?= csrf_field() ?>

            <div>
                <input type="hidden" name="id" value="<?= $post->id ?>">
                <label for="title" class="block text-gray-700 font-medium mb-1">Título <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" required
                       class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       placeholder="Título del post"
                        value="<?= $post->title ?>"
                       >
            </div>

            <div class="mb-4">
                <label for="image" class="inline-block cursor-pointer bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Seleccionar imagen
                </label>
                   <p class="text-xs text-admin-500 mt-1">Formatos .jpg, .png y jpg</p>
                <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png"
                 class="hidden" onchange="previewImage(event)">
                <!-- Previsualización -->
                <div id="container-preview" class="flex items-center justify-center">
                    <img id="preview" src="<?= base_url('uploads/images/posts/' . $post->image_path) ?>" alt="Previsualización" class="max-h-48 rounded-md border border-gray-300 shadow-sm mt-2" />
                </div>
            </div>

            <div class="mb-6">
                <label for="category" class="block text-gray-700 font-medium mb-1">Categoría <span class="text-red-500">*</span></label>
                <input type="text" name="category" id="category" required
                       class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       placeholder="Nombre de la categoría"
                       value="<?= $post->category ?>">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-1">Contenido <span class="text-red-500">*</span></label>
                <input type="text" name="content" id="content"
                value="<?= $post->content ?>"
                class="w-full border-2 rounded-lg no-resize">
            </div>

            <div class="mb-4">
                <label for="reading_time" class="block text-gray-700 font-medium mb-1">Tiempo de lectura <span class="text-red-500">*</span></label>
                <input type="number" pattern="[0-9]" name="reading_time" id="reading_time" required min='1'
                       class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       placeholder="7 minutos"
                       value="<?= $post->reading_time ?>">
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
                       