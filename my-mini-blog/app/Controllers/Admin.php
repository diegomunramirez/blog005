<?php

namespace App\Controllers;
use App\Models\PostModel;
use \App\Controllers\Categories;


class Admin extends BaseController{


    protected $postModel;
    protected $categoryModel;
    protected $userModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function dashboard(){
        $posts = $this->postModel->getPostsWithCategory();

        $data = [
            'posts' => $posts
        ];
        return view('admin/dashboard',$data);
    }

    public function index(){
        $posts = $this->postModel->getPostsWithCategory();

        $data = [
            'title' => 'Administrar Todos los Posts - MiniBlog',
            'posts' => $posts
        ];
        return view('admin/posts/index',$data);
    }

    //crear un post
    public function create(){
        $categoriesController = new Categories();
        $categories = $categoriesController->getCategories();
        return view('admin/posts/create',['categories'=>$categories]);
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

    }
}

