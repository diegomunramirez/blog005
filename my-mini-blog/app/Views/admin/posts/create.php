<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-lg font-bold text-admin-900 mb-2">Crear Nuevo Post</h2>
        <p class="text-admin-600">Completa la información para crear un nuevo artículo en tu blog.</p>
    </div>

    <!-- Form -->
    <form action="<?= base_url('/admin/posts/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
        <!-- Basic Information -->
        <div class="bg-white rounded-lg shadow-sm border border-admin-200 p-6">
            <h2 class="text-lg font-semibold text-admin-900 mb-6">Información Básica</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-admin-700 mb-2">
                        Título del Post <span class="text-red-700">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           required 
                           class="w-full px-4 py-3 border border-admin-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                           placeholder="Ingresa el título del post">
                </div>
            </div>
                 <!-- Slug -->
            <div class="md:col-span-2">
                    <label for="slug" class="block text-sm font-medium text-admin-700 mb-2">
                        URL Slug <span class="text-red-700">*</span>
                    </label>
                    <input type="text" 
                           id="slug" 
                           name="slug" 
                           required 
                           class="w-full px-4 py-3 border border-admin-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                           placeholder="url-del-post">
                    <p class="text-xs text-admin-500 mt-1">Máximo 60 caracteres recomendado</p>
             </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Excerpt -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-admin-700 mb-2">
                        Extracto del post <span class="text-red-700">*</span>
                    </label>
                    <input type="text" 
                           id="excerpt" 
                           name="excerpt" 
                           maxlength="128"
                           required 
                           class="w-full px-4 py-3 border border-admin-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                           placeholder="Ingresa un extracto del post">
                    <p class="text-xs text-admin-500 mt-1">Máximo 128 caracteres</p>
                </div>
            </div>

            <hr>

            <div class="p-4">
                <div>
                    <label>Contenido <span class="text-red-700">*</span></label>
                </div>

                <textarea name="content" rows="15" cols="15">

                </textarea>
            </div>

            <div>
                <div>
                    <label>Imagen <span class="text-red-700">*</span></label>
                </div>
                    <input type="text" 
                           id="image_path" 
                           name="image_path" 
                           required 
                           class="w-full px-4 py-3 border border-admin-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                           placeholder="https://direccion-imagen-en-linea">
            </div>

        </div>

        <div id="form-actions" class="">
            <button type="submit" class="bg-blue-400 hover:bg-blue-300 p-3 text-lg rounded-lg">Guardar</button>
        </div>
    </form>
</div>
<?= $this->endSection('') ?>
                       
