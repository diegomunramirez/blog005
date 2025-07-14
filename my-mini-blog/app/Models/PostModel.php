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
        'category',
        'slug', 
        'image_path',
        'content',
        'reading_time',
        'status',
        'created_at'
    ];

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