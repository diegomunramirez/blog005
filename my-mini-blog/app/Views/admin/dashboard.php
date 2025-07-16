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
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                    <p class="text-2xl font-bold text-admin-900"><?= count(array_filter($posts, fn($post) => $post->status === 'published')) ?></p>
                </div>
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
                    <p class="text-2xl font-bold text-admin-900"><?= count(array_filter($posts, fn($post) => $post->status === 'draft')) ?></p>
                </div>
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
                    <a href="<?= base_url('/admin/posts/all') ?>" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                        Ver todos
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <?php foreach (array_slice($posts, 0, 5) as $post): ?>
                    <div class="flex items-start space-x-4 p-4 hover:bg-admin-50 rounded-lg transition-colors">
                        <img src="<?= base_url('uploads/images/posts/' . $post->image_path) ?>" alt="<?= esc($post->title) ?>" class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-medium text-admin-900 truncate"><?= esc($post->title) ?></h4>
                            <p class="text-sm text-admin-600 mt-1"><?= esc($post->category_name) ?></p>
                            <div class="flex items-center mt-2 text-xs text-admin-500">
                                <span><?= date('M j, Y', strtotime($post->created_at)) ?></span>
                                <span class="mx-2">•</span>
                                <span class="px-2 py-1 rounded-full text-xs <?= $post->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                                    <?= $post->status === 'published' ? 'Publicado' : 'Borrador' ?>
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
    </div>
</div>
<?= $this->endSection() ?>