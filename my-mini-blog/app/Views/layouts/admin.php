<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Panel de Administración - MiniBlog' ?></title>
    <link rel="icon" href="<?= base_url('assets/icons/favicon.png') ?>" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        admin: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-admin-50 min-h-screen">
    <div class="flex h-screen">
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-admin-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-admin-800">
                            <a href="<?= base_url('/admin') ?>" class="hover:text-primary-600 transition-colors">
                                Panel de Administración
                            </a>
                        </h1>
                    </div>

                    <div class="flex items-center space-x-4">

                        <!-- View Site -->
                        <a href="<?= base_url('/') ?>"
                            class="px-4 py-2 text-admin-600 hover:text-admin-800 hover:bg-admin-100 rounded-lg transition-colors"
                            target="_blank">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Ver Sitio
                        </a>

                        <!-- User Menu -->
                        <div class="relative">
                            <button class="flex items-center space-x-3 text-admin-700 hover:text-admin-900 transition-colors" id="user-menu-button">
                                <span class="font-medium">Administrador</span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php if (session()->getFlashdata('message')): ?>
                    <script>
                        alert("<?= esc(session()->getFlashdata('message')) ?>");
                    </script>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <script>
                        alert("<?= esc(session()->getFlashdata('error')) ?>");
                    </script>
                <?php endif; ?>
            </header>

            <!-- Main Content -->
            <div class="flex-1 flex overflow-hidden">
                <!-- Content Area -->
                <main class="flex-1 overflow-y-auto p-6">
                    <?= $this->renderSection('content') ?>
                </main>

                <!-- Right Sidebar Menu -->
                <aside class="w-64 bg-white border-l border-admin-200 overflow-y-auto">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-admin-800 mb-6">Gestión de Posts</h2>

                        <nav class="space-y-2">
                            <!-- Dashboard -->
                            <a href="<?= base_url('admin/dashboard') ?>"
                                class="flex items-center px-4 py-3 text-admin-700 rounded-lg hover:bg-admin-100 transition-colors <?= (uri_string() == 'admin' || uri_string() == '') ? 'bg-primary-50 text-primary-700 border-r-2 border-primary-500' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h7v7H3V3zM14 3h7v4h-7V3zM14 10h7v11h-7V10zM3 14h7v7H3v-7z" />
                                </svg>
                                Dashboard
                            </a>

                            <!-- Posts -->
                            <a href="<?= base_url('admin/posts/all') ?>"
                                class="flex items-center px-4 py-3 text-admin-700 rounded-lg hover:bg-admin-100 transition-colors <?= (uri_string() == 'admin' || uri_string() == '') ? 'bg-primary-50 text-primary-700 border-r-2 border-primary-500' : '' ?>">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z" />
                                </svg>
                                Posts
                            </a>

                            <!-- Crear -->
                            <a href="<?= base_url('admin/posts/create') ?>"
                                class="flex items-center px-4 py-3 text-admin-700 rounded-lg hover:bg-admin-100 transition-colors <?= (uri_string() == 'admin/posts/create') ? 'bg-primary-50 text-primary-700 border-r-2 border-primary-500' : '' ?>">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Crear Post
                            </a>
                        </nav>
                        <!-- Additional Sections -->
                        <div class="mt-8">
                            <h3 class="text-sm font-medium text-admin-500 uppercase tracking-wider mb-3">Otros</h3>
                            <nav class="space-y-2">
                                <a href="<?= base_url('/admin/categories/index') ?>" class="flex items-center px-4 py-2 text-sm text-admin-600 rounded-lg hover:bg-admin-100 transition-colors">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    Categorías
                                </a>
                            </nav>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

</body>

</html>