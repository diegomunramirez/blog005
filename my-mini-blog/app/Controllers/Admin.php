<?php

namespace App\Controllers;
use App\Models\PostModel;


class Admin extends BaseController{


    protected $postModel;
    protected $categoryModel;
    protected $userModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        //$this->categoryModel = new CategoryModel();
        //$this->userModel = new UserModel();
    }

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
                'status' => 'published',
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
                'status' => 'published',

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
                'status' => 'published',

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
                'status' => 'published',

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
                'status' => 'published',

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
                'status' => 'published',

                'created_at' => '2023-12-25 12:30:00'
            ]
        ];

        return $posts;
    }

    public function dashboard(){
        $lastPosts = $this->postModel->orderBy('created_at', 'DESC')
                               ->paginate(15);
        $data = [
            'posts' => $lastPosts
        ];
        return view('admin/dashboard',$data);
    }

    public function index(){
        $posts = $this->postModel->orderBy('created_at', 'DESC')
                               ->paginate(15);
        $data = [
            'title' => 'Administrar Todos los Posts - MiniBlog',
            'posts' => $posts
        ];
        return view('admin/posts/index',$data);
    }

    //crear un post
    public function create(){
        return view('admin/posts/create');
    }

    //crear el post
    public function store()
    {
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/images/posts', $newName);

            $idPost = $this->postModel->insert([
                'title'      => $this->request->getPost('title'),
                'category'   => $this->request->getPost('category'),
                'image_path'      => $newName,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if ($idPost) {
                return redirect()->to('admin/posts')->with('message', 'Entrada guardada correctamente.');
            } else {
                throw new \Exception('Error al insertar el post en la base de datos');
            }

        } else {
            return redirect()->back()->withInput()->with('error', 'Error al subir la imagen.');
        }

        /*
        try {
            // Validar datos del formulario
            $validationRules = [
                'title' => 'required|min_length[10]|max_length[255]',
                'excerpt' => 'required|min_length[20]|max_length[500]',
                'content' => 'required|min_length[100]',
                'category_id' => 'required|integer',
                'status' => 'required|in_list[draft,published]'
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Preparar datos para insertar
            $postData = [
                'title' => $this->request->getPost('title'),
                'excerpt' => $this->request->getPost('excerpt'),
                'content' => $this->request->getPost('content'),
                'category_id' => $this->request->getPost('category_id'),
                'status' => $this->request->getPost('status'),
                'author_id' => 1, // Por ahora usuario admin fijo
                'meta_title' => $this->request->getPost('meta_title'),
                'meta_description' => $this->request->getPost('meta_description'),
                'tags' => $this->request->getPost('tags')
            ];

            // Manejar imagen destacada
            $imageUrl = $this->request->getPost('image_url');
            $uploadedFile = $this->request->getFile('featured_image');
            
            if ($uploadedFile && $uploadedFile->isValid()) {
                // Subir archivo
                $newName = $uploadedFile->getRandomName();
                $uploadedFile->move(WRITEPATH . 'uploads', $newName);
                $postData['featured_image'] = base_url('uploads/' . $newName);
            } elseif (!empty($imageUrl)) {
                $postData['featured_image'] = $imageUrl;
            }

            // Generar slug si no se proporcionó
            if (empty($this->request->getPost('slug'))) {
                $postData['slug'] = $this->postModel->generateUniqueSlug($postData['title']);
            } else {
                $postData['slug'] = $this->postModel->generateUniqueSlug($this->request->getPost('slug'));
            }

            // Insertar en la base de datos
            $postId = $this->postModel->insert($postData);

            if ($postId) {
                return redirect()->to('/admin/posts/edit')->with('success', 'Post creado exitosamente');
            } else {
                throw new \Exception('Error al insertar el post en la base de datos');
            }

        } catch (\Exception $e) {
            log_message('error', 'Error al crear post: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Error al crear el post: ' . $e->getMessage());
        }*/
    }

    /**
     * Listar posts para editar
     */
    public function edit()
    {
        try {
            // Obtener todos los posts con detalles
            $posts = $this->postModel->getPostsWithDetails();
            
            $data = [
                'title' => 'Editar Posts - Panel de Administración',
                'posts' => $posts
            ];

            return view('admin/posts/edit', $data);
            
        } catch (\Exception $e) {
            log_message('error', 'Error al cargar posts para editar: ' . $e->getMessage());
            return $this->showExampleEditView();
        }
    }

    /**
     * Mostrar formulario de edición de un post específico
     */
    public function editPost($id = null)
    {
        if (!$id) {
            return redirect()->to('/admin/posts/edit');
        }

        try {
            // Obtener el post
            $post = $this->postModel->find($id);
            
            if (!$post) {
                return redirect()->to('/admin/posts/edit')->with('error', 'Post no encontrado');
            }

            // Obtener categorías
            $categories = $this->categoryModel->findAll();

            $data = [
                'title' => 'Editar Post - Panel de Administración',
                'post' => $post,
                'categories' => $categories
            ];

            return view('admin/posts/edit_form', $data);
            
        } catch (\Exception $e) {
            log_message('error', 'Error al cargar post para editar: ' . $e->getMessage());
            return redirect()->to('/admin/posts/edit')->with('error', 'Error al cargar el post');
        }
    }

    /**
     * Actualizar post
     */
    public function updatePost($id)
    {
        try {
            // Verificar que el post existe
            $post = $this->postModel->find($id);
            if (!$post) {
                return redirect()->to('/admin/posts/edit')->with('error', 'Post no encontrado');
            }

            // Validar datos
            $validationRules = [
                'title' => 'required|min_length[10]|max_length[255]',
                'excerpt' => 'required|min_length[20]|max_length[500]',
                'content' => 'required|min_length[100]',
                'category_id' => 'required|integer',
                'status' => 'required|in_list[draft,published,archived]'
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Preparar datos para actualizar
            $updateData = [
                'title' => $this->request->getPost('title'),
                'excerpt' => $this->request->getPost('excerpt'),
                'content' => $this->request->getPost('content'),
                'category_id' => $this->request->getPost('category_id'),
                'status' => $this->request->getPost('status'),
                'meta_title' => $this->request->getPost('meta_title'),
                'meta_description' => $this->request->getPost('meta_description'),
                'tags' => $this->request->getPost('tags')
            ];

            // Manejar imagen destacada
            $imageUrl = $this->request->getPost('image_url');
            $uploadedFile = $this->request->getFile('featured_image');
            
            if ($uploadedFile && $uploadedFile->isValid()) {
                // Subir nuevo archivo
                $newName = $uploadedFile->getRandomName();
                $uploadedFile->move(WRITEPATH . 'uploads', $newName);
                $updateData['featured_image'] = base_url('uploads/' . $newName);
            } elseif (!empty($imageUrl)) {
                $updateData['featured_image'] = $imageUrl;
            }

            // Actualizar slug si el título cambió
            if ($post['title'] !== $updateData['title']) {
                $updateData['slug'] = $this->postModel->generateUniqueSlug($updateData['title'], $id);
            }

            // Actualizar en la base de datos
            $result = $this->postModel->update($id, $updateData);

            if ($result) {
                return redirect()->to('/admin/posts/edit')->with('success', 'Post actualizado exitosamente');
            } else {
                throw new \Exception('Error al actualizar el post');
            }

        } catch (\Exception $e) {
            log_message('error', 'Error al actualizar post: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el post: ' . $e->getMessage());
        }
    }

    /**
     * Listar posts para eliminar
     */
    public function delete()
    {
        try {
            // Obtener todos los posts
            $posts = $this->postModel->getPostsWithDetails();
            
            $data = [
                'title' => 'Eliminar Posts - Panel de Administración',
                'posts' => $posts
            ];

            return view('admin/posts/delete', $data);
            
        } catch (\Exception $e) {
            log_message('error', 'Error al cargar posts para eliminar: ' . $e->getMessage());
            return $this->showExampleDeleteView();
        }
    }

    /**
     * Eliminar un post
     */
    public function deletePost($id)
    {
        try {
            // Verificar que el post existe
            $post = $this->postModel->find($id);
            if (!$post) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Post no encontrado'
                ]);
            }

            // Eliminar el post
            $result = $this->postModel->delete($id);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Post eliminado exitosamente'
                ]);
            } else {
                throw new \Exception('Error al eliminar el post');
            }

        } catch (\Exception $e) {
            log_message('error', 'Error al eliminar post: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al eliminar el post: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Eliminar múltiples posts
     */
    public function bulkDelete()
    {
        try {
            $postIds = $this->request->getPost('post_ids');
            
            if (empty($postIds) || !is_array($postIds)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No se seleccionaron posts para eliminar'
                ]);
            }

            $deletedCount = 0;
            foreach ($postIds as $id) {
                if ($this->postModel->delete($id)) {
                    $deletedCount++;
                }
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => "Se eliminaron {$deletedCount} posts exitosamente"
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Error al eliminar posts en lote: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al eliminar los posts'
            ]);
        }
    }

    /**
     * Métodos de fallback para mostrar datos de ejemplo
     */
    private function showExampleDashboard()
    {
        $examplePosts = $this->getExamplePosts();
        $data = [
            'title' => 'Dashboard - Panel de Administración (Modo Ejemplo)',
            'posts' => array_slice($examplePosts, 0, 5),
            'stats' => [
                'total_posts' => count($examplePosts),
                'published_posts' => 7,
                'draft_posts' => 3,
                'total_views' => 12456,
                'posts_this_month' => 3
            ]
        ];
        return view('admin/dashboard', $data);
    }

    private function showExampleEditView()
    {
        $data = [
            'title' => 'Editar Posts - Panel de Administración (Modo Ejemplo)',
            'posts' => $this->getExamplePosts()
        ];
        return view('admin/posts/edit', $data);
    }

    private function showExampleDeleteView()
    {
        $data = [
            'title' => 'Eliminar Posts - Panel de Administración (Modo Ejemplo)',
            'posts' => $this->getExamplePosts()
        ];
        return view('admin/posts/delete', $data);
    }

    private function getExamplePosts()
    {
        return [
            [
                'id' => 1,
                'title' => 'Introducción a CodeIgniter 4: Guía Completa para Principiantes',
                'slug' => 'introduccion-codeigniter-4-guia-completa',
                'excerpt' => 'Aprende los fundamentos de CodeIgniter 4...',
                'featured_image' => 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
                'category_name' => 'Programación',
                'author_name' => 'María García',
                'views' => 1205,
                'comments_count' => 23,
                'status' => 'published',
                'created_at' => '2024-01-15 10:30:00'
            ],
            // ... más posts de ejemplo
        ];
    }

}

