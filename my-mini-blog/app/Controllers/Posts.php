<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoryModel;

class Posts extends BaseController
{

    protected $postModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->categoryModel = new CategoryModel();

    }

    public function index()
    {
        $posts = $this->postModel->getPostsWithCategory();    
        $categories =  $this->categoryModel->findAll();
        $data = [
            'title' => 'Todos los Posts - MiniBlog',
            'posts' => $posts,
            'categories' => $categories
        ];

        return view('posts/index', $data);
    }

    //crear el post
    public function store()
    {
        $validationRules = [
            'title'    => 'required|string',
            'category' => 'required|integer',
            'image'    => [
                'uploaded[image]',
                'mime_in[image,image/png,image/jpg,image/jpeg]',
                'max_size[image,2048]'
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getName();
            $file->move(ROOTPATH . 'public/uploads/images/posts', $newName);

            $idPost = $this->postModel->insert([
                'title'      => $this->request->getPost('title'),
                'category_id'   => $this->request->getPost('category'),
                'content' => $this->request->getPost('content'),
                'slug' => url_title(url_title($this->request->getPost('title'), '-', true)),
                'image_path'      => $newName,
                'reading_time' => $this->request->getPost('reading_time'),
                'status' => 'published',
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if ($idPost) {
                return redirect()->to('admin/posts/all')->with('message', 'Post guardada correctamente.');
            } else {
                throw new \Exception('Error al insertar el post en la base de datos');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al subir la imagen.');
        }
    }


    public function edit($id)
    {
        $post = $this->postModel->find($id);
        return view('admin/posts/edit', ['post' => $post]);
    }


    public function update()
    {
        $validationRules = [
            'title'    => 'required|string',
            'category' => 'required|string',
            'image'    => [
                'mime_in[image,image/png,image/jpg,image/jpeg]',
                'max_size[image,2048]'
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id = $this->request->getPost('id');
        $post = $this->postModel->find($id);

        if (!$post) {
            throw new \Exception('El post a actualizar no existe');
        }

        $data = [
            'title'        => $this->request->getPost('title'),
            'category'     => $this->request->getPost('category'),
            'content'      => $this->request->getPost('content'),
            'slug'         => url_title($this->request->getPost('title'), '-', true),
            'reading_time' => $this->request->getPost('reading_time'),
        ];

        $file = $this->request->getFile('image');

        // Solo actualizar la imagen si se subió una válida
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getName().'-'.$file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/images/posts', $newName);
            $data['image_path'] = $newName;
        }

        $updated = $this->postModel->update($id, $data);

        if ($updated) {
            return redirect()->to('admin/posts/edit/' . $id)->with('message', 'Post actualizado correctamente.');
        } else {
            throw new \Exception('Error al actualizar el post en la base de datos');
        }
    }


    public function delete()
    {
        $id = $this->request->getPost('id');
        // Eliminamos el post
        $this->postModel->delete($id);
        return redirect()->to('admin/posts/all')->with('success', 'Post eliminado correctamente');
    }
}
