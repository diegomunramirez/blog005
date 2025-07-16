<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    

    // Campos que se pueden insertar/actualizar
    protected $allowedFields = [
        'title',
        'category_id',
        'slug', 
        'image_path',
        'content',
        'reading_time',
        'status',
        'created_at'
    ];

    public function get_posts_by_category($category_id) {
        $this->db->where('category_id', $category_id);
        return $this->db->get('posts')->result();
    }

    public function get_category_name($category_id) {
        if (!$category_id) {
            return 'Sin categoría';
        }
        
        $this->db->select('name');
        $this->db->where('id', $category_id);
        $category = $this->db->get('categories')->row();
        
        return $category ? $category->name : 'Sin categoría';
    }

    public function getPostsWithCategory()
    {
        return $this->db->table('posts')
            ->select('posts.*, categories.name as category_name')
            ->join('categories', 'categories.id = posts.category_id', 'left')
            ->get()
            ->getResult();
    }

    public function get_all_posts() {
        // Agregar categoría a cada post
        $posts = $this->findAll();

        foreach ($posts as $post) {
            $post->category = $this->get_category($post->category_id);
        }
        return $posts;
    }

    private function get_category($category_id) {
        if (!$category_id) {
            return (object) array('name' => 'Sin categoría');
        }
        
        $category = $this->db->get_where('categories', array('id' => $category_id))->row();
        return $category ? $category : (object) array('name' => 'Sin categoría');
    }

    public function category(){
        return $this->hasOne('category','App\Models\CategoryModel');
    }

    /*
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
*/
 
}