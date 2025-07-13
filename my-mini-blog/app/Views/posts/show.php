<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2 text-sm text-gray-500">
            <li><a href="<?= base_url('/') ?>" class="hover:text-primary-600">Inicio</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="<?= base_url('/posts') ?>" class="hover:text-primary-600">Posts</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-900">Post Individual</li>
        </ol>
    </nav>

    <div class="max-w-4xl mx-auto">
        <!-- Post Header -->
        <header class="mb-8">
            <div class="mb-4">
                <span class="bg-primary-100 text-primary-800 text-sm font-medium px-3 py-1 rounded-full">
                    Programación
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                Introducción a CodeIgniter 4: Guía Completa para Principiantes
            </h1>
            
            <!-- Post Meta -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-gray-600 mb-6">
                <div class="flex items-center mb-4 sm:mb-0">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b5bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80" 
                         alt="María García" 
                         class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-medium text-gray-900">María García</p>
                        <p class="text-sm">15 de Enero, 2024</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6 text-sm">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        1,205 vistas
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                        </svg>
                        23 comentarios
                    </span>
                    <span class="text-primary-600 font-medium">8 min de lectura</span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="mb-8">
            <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80" 
                 alt="Introducción a CodeIgniter 4" 
                 class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
        </div>

        <!-- Post Content -->
        <article class="prose prose-lg max-w-none">
            <div class="bg-white rounded-lg p-8 shadow-sm">
                <p class="lead text-xl text-gray-600 mb-6">
                    CodeIgniter 4 es un framework PHP potente y elegante que ha revolucionado el desarrollo web. 
                    En esta guía completa, aprenderás todo lo que necesitas saber para comenzar tu viaje con este increíble framework.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">¿Qué es CodeIgniter 4?</h2>
                <p class="text-gray-700 mb-6">
                    CodeIgniter 4 es un framework de desarrollo web para PHP que se caracteriza por su simplicidad, 
                    flexibilidad y curva de aprendizaje suave. A diferencia de otros frameworks más complejos, 
                    CodeIgniter te permite crear aplicaciones web robustas sin la necesidad de configuraciones complicadas.
                </p>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Características Principales</h2>
                <ul class="list-disc pl-6 text-gray-700 mb-6 space-y-2">
                    <li>Arquitectura MVC (Modelo-Vista-Controlador) clara y organizada</li>
                    <li>Excelente documentación y comunidad activa</li>
                    <li>Herramientas de línea de comandos (Spark CLI)</li>
                    <li>Sistema de rutas flexible y potente</li>
                    <li>Validación de datos integrada</li>
                    <li>Manejo de sesiones y cookies</li>
                    <li>Soporte para múltiples bases de datos</li>
                </ul>

                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 my-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                <strong>Tip:</strong> CodeIgniter 4 requiere PHP 7.4 o superior. Asegúrate de tener la versión correcta antes de comenzar.
                            </p>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Instalación</h2>
                <p class="text-gray-700 mb-4">
                    La instalación de CodeIgniter 4 es sencilla. Puedes usar Composer para crear un nuevo proyecto:
                </p>

                <div class="bg-gray-900 rounded-lg p-4 mb-6">
                    <code class="text-green-400 font-mono text-sm">
                        composer create-project codeigniter4/appstarter mi-proyecto
                    </code>
                </div>

                <p class="text-gray-700 mb-6">
                    Una vez instalado, puedes iniciar el servidor de desarrollo con el comando Spark:
                </p>

                <div class="bg-gray-900 rounded-lg p-4 mb-6">
                    <code class="text-green-400 font-mono text-sm">
                        php spark serve
                    </code>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Próximos Pasos</h2>
                <p class="text-gray-700 mb-6">
                    En los siguientes artículos de esta serie, exploraremos:
                </p>
                <ul class="list-disc pl-6 text-gray-700 mb-6 space-y-2">
                    <li>Configuración del entorno de desarrollo</li>
                    <li>Creación de controladores y modelos</li>
                    <li>Trabajo con bases de datos</li>
                    <li>Sistema de rutas avanzado</li>
                    <li>Validación y seguridad</li>
                </ul>
            </div>
        </article>

        <!-- Share Section -->
        <div class="mt-8 p-6 bg-gray-50 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">¿Te gustó este artículo? ¡Compártelo!</h3>
            <div class="flex space-x-4">
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Twitter
                </a>
                <a href="#" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors">
                    Facebook
                </a>
                <a href="#" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                    LinkedIn
                </a>
            </div>
        </div>

        <!-- Back to Posts -->
        <div class="mt-8 text-center">
            <a href="<?= base_url('/posts') ?>" class="inline-flex items-center px-6 py-3 text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver a todos los posts
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>