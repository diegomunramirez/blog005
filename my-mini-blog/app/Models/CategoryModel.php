<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;


    // Campos que se pueden insertar/actualizar
    protected $allowedFields = [
        'name',
        'description'
    ];


    // Validaciones
    protected $validationRules = [
        'name' => 'required|min_length[4]|max_length[64]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'El nombre',
            'min_length' => 'El nombre debe tener al menos 4 caracteres',
            'max_length' => 'El nombre no puede exceder 64 caracteres'
        ]
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

}