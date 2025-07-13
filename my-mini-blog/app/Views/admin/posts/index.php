<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Posts Grid -->
    <section class="mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                    <!-- Post Image -->
                    <div class="relative">
                        <img src="<?= $post['image'] ?>" 
                             alt="<?= esc($post['title']) ?>" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                <?= esc($post['category']) ?>
                            </span>
                        </div>
                        <div class="actions absolute flex items-center gap-3 top-4 right-4 ">
                            <div class="hover:cursor-pointer hover:bg-green-800 bg-gray-400 rounded-full flex justify-center items-center">
                            <a href="<?= base_url('admin/posts/all') ?>">
                                <svg class="w-8 h-8  text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.536-6.536a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3.414a2 2 0 01.586-1.414z"/>
                                </svg>
                            </a>

                            </div>
                            <div class="hover:cursor-pointer hover:bg-green-600 bg-gray-400 rounded-full flex justify-center items-center">
                                <a href="<?= base_url('admin/posts/all') ?>">

                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 011 1v0a1 1 0 01-1 1H7a1 1 0 01-1-1v0a1 1 0 011-1h10z"/>
                                </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary-600 transition-colors">
                            <a href="<?= base_url('/posts/' . $post['slug']) ?>">
                                <?= esc($post['title']) ?>
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?= esc($post['excerpt']) ?>
                        </p>

                        <!-- Post Meta -->
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <img src="<?= $post['author_avatar'] ?>" 
                                     alt="<?= esc($post['author_name']) ?>" 
                                     class="w-8 h-8 rounded-full mr-2">
                                <span><?= esc($post['author_name']) ?></span>
                            </div>
                            <time datetime="<?= $post['created_at'] ?>">
                                <?= date('M j, Y', strtotime($post['created_at'])) ?>
                            </time>
                        </div>

                        <!-- Post Stats -->
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <?= $post['views'] ?>
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                    </svg>
                                    <?= $post['comments_count'] ?>
                                </span>
                            </div>
                            <span class="text-primary-600 font-medium"><?= $post['reading_time'] ?> min</span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Load More Button -->
    <section class="text-center">
        <button class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-primary-600 border border-transparent rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200 transform hover:scale-105">
            <svg class="w-5 h-5 mr-2 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Cargar más artículos
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-primary-700 group-hover:translate-x-0 group-hover:translate-y-0 -z-10 rounded-lg"></span>
        </button>
    </section>
</div>

<!-- Custom Styles for Line Clamp -->
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<?= $this->endSection() ?>