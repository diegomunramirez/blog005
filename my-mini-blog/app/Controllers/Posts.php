<?php

namespace App\Controllers;

class Posts extends BaseController
{

    private function getPosts(){
        // Datos de ejemplo (dinámicos) - en producción vendrían de la base de datos
        $posts = [
            [
                'id' => 1,
                'title' => 'Introducción a CodeIgniter 4: Guía Completa para Principiantes',
                'slug' => 'introduccion-codeigniter-4-guia-completa',
                'excerpt' => 'Aprende los fundamentos de CodeIgniter 4, el framework PHP más popular. Desde la instalación hasta crear tu primera aplicación web.',
                'content' => '',
                'image' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'category' => 'Tecnología',
                'author_name' => 'Luis Torres',
                'author_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                'views' => 743,
                'comments_count' => 12,
                'reading_time' => 7,
                'created_at' => '2024-01-08 16:15:00'
            ],
            [
                'id' => 5,
                'title' => 'Git y GitHub: Control de Versiones para Desarrolladores',
                'slug' => 'git-github-control-versiones-desarrolladores',
                'excerpt' => 'Domina Git y GitHub desde cero. Comandos esenciales, workflow de desarrollo y colaboración en equipo.',
                'content' => '',
                'image' => 'https://images.unsplash.com/photo-1618477388954-7852f32655ec?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'category' => 'Tutoriales',
                'author_name' => 'Sofia Vargas',
                'author_avatar' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                'views' => 2103,
                'comments_count' => 45,
                'reading_time' => 12,
                'created_at' => '2024-01-05 11:30:00'
            ],
            [
                'id' => 6,
                'title' => 'Desarrollo Web Full Stack: Tecnologías Esenciales 2024',
                'slug' => 'desarrollo-web-full-stack-tecnologias-2024',
                'excerpt' => 'Conoce el stack tecnológico más demandado en 2024. Frontend, backend, bases de datos y herramientas de desarrollo.',
                'content' => '',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'category' => 'Tecnología',
                'author_name' => 'Diego Morales',
                'author_avatar' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                'views' => 1876,
                'comments_count' => 28,
                'reading_time' => 15,
                'created_at' => '2024-01-02 13:45:00'
            ],
            [
                'id' => 7,
                'title' => 'API REST con CodeIgniter 4: Tutorial Paso a Paso',
                'slug' => 'api-rest-codeigniter-4-tutorial',
                'excerpt' => 'Construye una API REST completa usando CodeIgniter 4. Autenticación, validaciones, documentación y testing.',
                'content' => '',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'category' => 'Programación',
                'author_name' => 'Roberto Silva',
                'author_avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                'views' => 1324,
                'comments_count' => 31,
                'reading_time' => 18,
                'created_at' => '2023-12-30 15:20:00'
            ],
            [
                'id' => 8,
                'title' => 'CSS Grid y Flexbox: Layouts Modernos para Web',
                'slug' => 'css-grid-flexbox-layouts-modernos',
                'excerpt' => 'Domina CSS Grid y Flexbox para crear layouts complejos y responsivos. Ejemplos prácticos y casos de uso reales.',
                'content' => '',
                'image' => 'https://images.unsplash.com/photo-1523437113738-bbd3cc89fb19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'category' => 'Diseño',
                'author_name' => 'Patricia Jiménez',
                'author_avatar' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                'views' => 967,
                'comments_count' => 19,
                'reading_time' => 9,
                'created_at' => '2023-12-28 10:15:00'
            ],
            [
                'id' => 9,
                'title' => 'Seguridad Web: Protege tu Aplicación PHP',
                'slug' => 'seguridad-web-protege-aplicacion-php',
                'excerpt' => 'Implementa las mejores prácticas de seguridad en PHP. SQL injection, XSS, CSRF y autenticación segura.',
                'content' => '',
                'image' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                'category' => 'Tecnología',
                'author_name' => 'Fernando López',
                'author_avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80',
                'views' => 1567,
                'comments_count' => 22,
                'reading_time' => 11,
                'created_at' => '2023-12-25 12:30:00'
            ]
        ];

        return $posts;
    }

    public function index()
    {
        $data = [
            'title' => 'Todos los Posts - MiniBlog',
            'posts' => $this->getPosts()
        ];

        return view('posts/index', $data);
    }



}