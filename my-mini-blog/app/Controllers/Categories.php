<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class Categories extends BaseController{

    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index(){
        $categories = $this->categoryModel->findAll();
        return view('admin/categories/index',['categories'=> $categories]);
    }

    public function create(){
        $title = 'My bini blog - Genotipo';
        return view('admin/categories/create',['title' => $title]);
    }

    public function store(){

        $nameCategory = $this->request->getPost('name'); 
        $description = $this->request->getPost('description');

        $dataCategory = [
            'name'=> $nameCategory,
            'description' => $description,
        ];

        $idCategory = $this->categoryModel->insert($dataCategory);
        
        if ($idCategory) {
            return redirect()->to('/admin/categories/index')->with('success', 'Categoria creada exitosamente');
        } else {
            throw new \Exception('Error al insertar el la categoria en la base de datos');
        }
    }

    public function getCategories(){
        $categories = $this->categoryModel->findAll();
    }

}