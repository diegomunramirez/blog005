<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    // Campos que se pueden insertar/actualizar
    protected $allowedFields = [
        'title',
        'slug', 
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'tags',
        'status',
        'views',
        'reading_time',
        'author_id',
        'category_id',
        'published_at'
    ];

    // Fechas automáticas
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validaciones
    protected $validationRules = [
        'title' => 'required|min_length[10]|max_length[255]',
        'slug' => 'required|min_length[5]|max_length[255]|is_unique[posts.slug,id,{id}]',
        'excerpt' => 'required|min_length[20]|max_length[500]',
        'content' => 'required|min_length[100]',
        'status' => 'required|in_list[draft,published,archived]',
        'author_id' => 'required|integer',
        'category_id' => 'required|integer'
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'El título es obligatorio',
            'min_length' => 'El título debe tener al menos 10 caracteres',
            'max_length' => 'El título no puede exceder 255 caracteres'
        ],
        'slug' => [
            'required' => 'El slug es obligatorio',
            'is_unique' => 'Este slug ya existe, debe ser único'
        ],
        'excerpt' => [
            'required' => 'El extracto es obligatorio',
            'min_length' => 'El extracto debe tener al menos 20 caracteres'
        ],
        'content' => [
            'required' => 'El contenido es obligatorio',
            'min_length' => 'El contenido debe tener al menos 100 caracteres'
        ]
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Eventos del modelo
    protected $allowCallbacks = true;
    protected $beforeInsert = ['beforeInsert'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    /**
     * Obtener todos los posts con información del autor y categoría
     */
    public function getPostsWithDetails($status = null, $limit = null)
    {
        $builder = $this->db->table('posts p');
        $builder->select('p.*, u.first_name, u.last_name, u.avatar, c.name as category_name, 
                         CONCAT(u.first_name, " ", u.last_name) as author_name,
                         (SELECT COUNT(*) FROM comments WHERE post_id = p.id AND status = "approved") as comments_count');
        $builder->join('users u', 'u.id = p.author_id');
        $builder->join('categories c', 'c.id = p.category_id');
        
        if ($status) {
            $builder->where('p.status', $status);
        }
        
        $builder->orderBy('p.created_at', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->get()->getResultArray();
    }

    /**
     * Obtener un post por slug con detalles
     */
    public function getPostBySlug($slug)
    {
        $builder = $this->db->table('posts p');
        $builder->select('p.*, u.first_name, u.last_name, u.avatar, c.name as category_name,
                         CONCAT(u.first_name, " ", u.last_name) as author_name,
                         (SELECT COUNT(*) FROM comments WHERE post_id = p.id AND status = "approved") as comments_count');
        $builder->join('users u', 'u.id = p.author_id');
        $builder->join('categories c', 'c.id = p.category_id');
        $builder->where('p.slug', $slug);
        $builder->where('p.status', 'published');
        
        return $builder->get()->getRowArray();
    }

    /**
     * Incrementar las vistas de un post
     */
    public function incrementViews($id)
    {
        $builder = $this->db->table('posts');
        $builder->set('views', 'views + 1', false);
        $builder->where('id', $id);
        return $builder->update();
    }

    /**
     * Obtener posts por categoría
     */
    public function getPostsByCategory($categorySlug, $limit = null)
    {
        $builder = $this->db->table('posts p');
        $builder->select('p.*, u.first_name, u.last_name, u.avatar, c.name as category_name,
                         CONCAT(u.first_name, " ", u.last_name) as author_name,
                         (SELECT COUNT(*) FROM comments WHERE post_id = p.id AND status = "approved") as comments_count');
        $builder->join('users u', 'u.id = p.author_id');
        $builder->join('categories c', 'c.id = p.category_id');
        $builder->where('c.slug', $categorySlug);
        $builder->where('p.status', 'published');
        $builder->orderBy('p.published_at', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->get()->getResultArray();
    }

    /**
     * Buscar posts
     */
    public function searchPosts($searchTerm, $limit = null)
    {
        $builder = $this->db->table('posts p');
        $builder->select('p.*, u.first_name, u.last_name, u.avatar, c.name as category_name,
                         CONCAT(u.first_name, " ", u.last_name) as author_name,
                         (SELECT COUNT(*) FROM comments WHERE post_id = p.id AND status = "approved") as comments_count');
        $builder->join('users u', 'u.id = p.author_id');
        $builder->join('categories c', 'c.id = p.category_id');
        $builder->groupStart();
        $builder->like('p.title', $searchTerm);
        $builder->orLike('p.excerpt', $searchTerm);
        $builder->orLike('p.content', $searchTerm);
        $builder->orLike('p.tags', $searchTerm);
        $builder->groupEnd();
        $builder->where('p.status', 'published');
        $builder->orderBy('p.published_at', 'DESC');
        
        if ($limit) {
            $builder->limit($limit);
        }
        
        return $builder->get()->getResultArray();
    }

    /**
     * Obtener estadísticas del blog
     */
    public function getBlogStats()
    {
        $stats = [];
        
        // Total de posts
        $stats['total_posts'] = $this->countAll();
        
        // Posts publicados
        $stats['published_posts'] = $this->where('status', 'published')->countAllResults(false);
        
        // Borradores
        $stats['draft_posts'] = $this->where('status', 'draft')->countAllResults(false);
        
        // Total de vistas
        $builder = $this->db->table('posts');
        $builder->selectSum('views');
        $result = $builder->get()->getRowArray();
        $stats['total_views'] = $result['views'] ?? 0;
        
        // Posts este mes
        $builder = $this->db->table('posts');
        $builder->where('created_at >=', date('Y-m-01 00:00:00'));
        $stats['posts_this_month'] = $builder->countAllResults();
        
        return $stats;
    }

    /**
     * Generar slug único
     */
    public function generateUniqueSlug($title, $id = null)
    {
        $slug = url_title($title, '-', true);
        $originalSlug = $slug;
        $counter = 1;
        
        while (true) {
            $builder = $this->db->table('posts');
            $builder->where('slug', $slug);
            
            if ($id) {
                $builder->where('id !=', $id);
            }
            
            if ($builder->countAllResults() == 0) {
                break;
            }
            
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }

    /**
     * Calcular tiempo de lectura estimado
     */
    public function calculateReadingTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / 200); // 200 palabras por minuto promedio
        return max(1, $readingTime); // Mínimo 1 minuto
    }

    /**
     * Evento antes de insertar
     */
    protected function beforeInsert(array $data)
    {
        // Generar slug si no existe
        if (empty($data['data']['slug']) && !empty($data['data']['title'])) {
            $data['data']['slug'] = $this->generateUniqueSlug($data['data']['title']);
        }
        
        // Calcular tiempo de lectura
        if (!empty($data['data']['content'])) {
            $data['data']['reading_time'] = $this->calculateReadingTime($data['data']['content']);
        }
        
        // Establecer fecha de publicación si el estado es 'published'
        if ($data['data']['status'] === 'published' && empty($data['data']['published_at'])) {
            $data['data']['published_at'] = date('Y-m-d H:i:s');
        }
        
        return $data;
    }

    /**
     * Evento antes de actualizar
     */
    protected function beforeUpdate(array $data)
    {
        // Generar nuevo slug si el título cambió
        if (!empty($data['data']['title']) && !empty($data['id'])) {
            $currentPost = $this->find($data['id']);
            if ($currentPost && $currentPost['title'] !== $data['data']['title']) {
                $data['data']['slug'] = $this->generateUniqueSlug($data['data']['title'], $data['id']);
            }
        }
        
        // Recalcular tiempo de lectura si el contenido cambió
        if (!empty($data['data']['content'])) {
            $data['data']['reading_time'] = $this->calculateReadingTime($data['data']['content']);
        }
        
        // Establecer fecha de publicación si cambia a 'published'
        if ($data['data']['status'] === 'published') {
            $currentPost = $this->find($data['id']);
            if ($currentPost && $currentPost['status'] !== 'published') {
                $data['data']['published_at'] = date('Y-m-d H:i:s');
            }
        }
        
        return $data;
    }
}