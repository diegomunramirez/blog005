<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-lg shadow-lg text-white p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">¡Bienvenido de vuelta, Administrador!</h1>
                <p class="text-primary-100">Aquí tienes un resumen de tu blog</p>
            </div>
            <div class="text-right">
                <p class="text-primary-100 text-sm">Último acceso:</p>
                <p class="font-semibold"><?= date('d M Y, H:i') ?></p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Posts -->
        <div class="bg-white rounded-lg shadow-sm border border-admin-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-admin-600">Total Posts</p>
                    <p class="text-2xl font-bold text-admin-900"><?= count($posts) ?></p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-600 text-sm font-medium">+2 esta semana</span>
            </div>
        </div>

        <!-- Published Posts -->
        <div class="bg-white rounded-lg shadow-sm border border-admin-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-admin-600">Publicados</p>
                    <p class="text-2xl font-bold text-admin-900"><?= count(array_filter($posts, fn($post) => $post['status'] === 'published')) ?></p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-admin-600 text-sm">90% del total</span>
            </div>
        </div>

        <!-- Draft Posts -->
        <div class="bg-white rounded-lg shadow-sm border border-admin-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.348 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-admin-600">Borradores</p>
                    <p class="text-2xl font-bold text-admin-900"><?= count(array_filter($posts, fn($post) => $post['status'] === 'draft')) ?></p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-admin-600 text-sm">Pendientes</span>
            </div>
        </div>

        <!-- Total Views -->
        <div class="bg-white rounded-lg shadow-sm border border-admin-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-admin-600">Total Vistas</p>
                    <p class="text-2xl font-bold text-admin-900"><?= number_format(array_sum(array_column($posts, 'views'))) ?></p>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-600 text-sm font-medium">+15% este mes</span>
            </div>
        </div>
    </div>

    <!-- Recent Posts and Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Posts -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-admin-200">
            <div class="p-6 border-b border-admin-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-admin-900">Posts Recientes</h3>
                    <a href="<?= base_url('/admin/posts/edit') ?>" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                        Ver todos
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <?php foreach (array_slice($posts, 0, 5) as $post): ?>
                    <div class="flex items-start space-x-4 p-4 hover:bg-admin-50 rounded-lg transition-colors">
                        <img src="<?= $post['image'] ?>" alt="<?= esc($post['title']) ?>" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-medium text-admin-900 truncate"><?= esc($post['title']) ?></h4>
                            <p class="text-sm text-admin-600 mt-1"><?= esc($post['category']) ?></p>
                            <div class="flex items-center mt-2 text-xs text-admin-500">
                                <span><?= date('M j, Y', strtotime($post['created_at'])) ?></span>
                                <span class="mx-2">•</span>
                                <span><?= $post['views'] ?> vistas</span>
                                <span class="mx-2">•</span>
                                <span class="px-2 py-1 rounded-full text-xs <?= $post['status'] === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                                    <?= $post['status'] === 'published' ? 'Publicado' : 'Borrador' ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <button class="text-admin-400 hover:text-admin-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-sm border border-admin-200">
            <div class="p-6 border-b border-admin-200">
                <h3 class="text-lg font-semibold text-admin-900">Acciones Rápidas</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <a href="<?= base_url('/admin/posts/create') ?>" 
                       class="flex items-center p-4 border-2 border-dashed border-admin-300 rounded-lg hover:border-primary-400 hover:bg-primary-50 transition-colors group">
                        <div class="p-2 bg-primary-100 rounded-lg group-hover:bg-primary-200 transition-colors">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-admin-900">Crear Nuevo Post</p>
                            <p class="text-xs text-admin-600">Escribe un nuevo artículo</p>
                        </div>
                    </a>

                    <a href="<?= base_url('/admin/posts/edit') ?>" 
                       class="flex items-center p-4 border border-admin-200 rounded-lg hover:bg-admin-50 transition-colors">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-admin-900">Editar Posts</p>
                            <p class="text-xs text-admin-600">Modifica contenido existente</p>
                        </div>
                    </a>

                    <a href="<?= base_url('/admin/posts/delete') ?>" 
                       class="flex items-center p-4 border border-admin-200 rounded-lg hover:bg-red-50 transition-colors">
                        <div class="p-2 bg-red-100 rounded-lg">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-admin-900">Gestionar Eliminación</p>
                            <p class="text-xs text-admin-600">Eliminar posts antiguos</p>
                        </div>
                    </a>
                </div>

                <!-- Statistics -->
                <div class="mt-6 pt-6 border-t border-admin-200">
                    <h4 class="text-sm font-medium text-admin-900 mb-3">Estadísticas Rápidas</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-admin-600">Posts este mes</span>
                            <span class="font-medium text-admin-900">3</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-admin-600">Comentarios pendientes</span>
                            <span class="font-medium text-admin-900">7</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-admin-600">Promedio de vistas</span>
                            <span class="font-medium text-admin-900">1,234</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-admin-200">
        <div class="p-6 border-b border-admin-200">
            <h3 class="text-lg font-semibold text-admin-900">Rendimiento del Blog</h3>
            <p class="text-sm text-admin-600 mt-1">Vistas de posts en los últimos 7 días</p>
        </div>
        <div class="p-6">
            <!-- Simple Chart Representation -->
            <div class="flex items-end justify-between h-32 space-x-2">
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-16"></div>
                    <span class="text-xs text-admin-600 mt-2">Lun</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-20"></div>
                    <span class="text-xs text-admin-600 mt-2">Mar</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-24"></div>
                    <span class="text-xs text-admin-600 mt-2">Mié</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-28"></div>
                    <span class="text-xs text-admin-600 mt-2">Jue</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-20"></div>
                    <span class="text-xs text-admin-600 mt-2">Vie</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-12"></div>
                    <span class="text-xs text-admin-600 mt-2">Sáb</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-primary-500 rounded-t w-8 h-18"></div>
                    <span class="text-xs text-admin-600 mt-2">Dom</span>
                </div>
            </div>
            <div class="flex justify-between text-xs text-admin-500 mt-4">
                <span>0 vistas</span>
                <span>2,000 vistas</span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>