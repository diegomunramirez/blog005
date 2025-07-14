<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <section class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Bienvenido a Mi Blog
        </h1>
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
            Descubre artículos interesantes sobre tecnología, programación, desarrollo web y sobre la vida cotidiana.
        </p>
    </section>

    <!-- Search and Filter Section -->
    <section class="mb-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Search Bar -->
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Buscar artículos..." 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="lg:w-48">
                        <select class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <option selected disabled> Todas las categorías</option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?= $category->id ?>"> <?= $category->name ?> </option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <!-- Sort Filter -->
                    <div class="lg:w-48">
                        <select class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                            <option value="newest">Más recientes</option>
                            <option value="oldest">Más antiguos</option>
                            <option value="popular">Más populares</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts Grid -->
    <section class="mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                    <!-- Post Image -->
                    <div class="relative">
                        <img src="<?= base_url('uploads/images/posts/' . $post->image_path) ?>" 
                             alt="<?= esc('uploads/images/posts/'.$post->image_path) ?>" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                <?= esc($post->category) ?>
                            </span>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary-600 transition-colors">
                            <a href="#"> <!----<?= base_url('/posts/' . $post->slug) ?>--->
                                <?= esc($post->title) ?>
                            </a>
                        </h3>
                    
                        <!-- Post Meta -->
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <time datetime="<?= $post->created_at ?>">
                                <?= date('M j, Y', strtotime($post->created_at)) ?>
                            </time>
                        </div>

                        <!-- Post Stats -->
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span class="text-primary-600 font-medium"><?= $post->reading_time ?> min</span>
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
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<?= $this->endSection() ?>