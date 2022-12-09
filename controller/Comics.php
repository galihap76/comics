<?php

namespace App\Controllers;

use App\Models\ComicsModel;

class Comics extends BaseController
{
    protected $comicsModel;

    public function __construct()
    {
        $this->comicsModel = new ComicsModel();
    }

    public function index()
    {
        // $comics = $this->comicsModel->findAll();

        $data = [
            'title' => 'List Comics',
            'comics' => $this->comicsModel->getComics()
        ];


        return view('comics/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Comics',
            'comics' => $this->comicsModel->getComics($slug)
        ];

        // if comics not found in table
        if (empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title comics ' . $slug . ' not found.');
        }

        return view('comics/detail', $data);
    }

    public function create()
    {

        // session();
        $data = [
            'title' => 'Form Insert Data Comics',
            'validation' => \Config\Services::validation()
        ];

        return view('comics/create', $data);
    }

    public function save()
    {

        // validation input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => "{field} comics don't be blank.",
                    'is_unique' => "{field} comics already exists."
                ]
            ],
            [
                'cover' => 'uploaded[cover]'
            ]
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/comics/create')->withInput();
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Data has been insert.');
        return redirect()->to('/comics');
    }

    public function delete($id)
    {
        $this->comicsModel->delete($id);
        session()->setFlashdata('message', 'Data has been delete.');
        return redirect()->to('/comics');
    }

    public function edit($slug)
    {
        // session();
        $data = [
            'title' => 'Form Edit Data Comics',
            'validation' => \Config\Services::validation(),
            'comics' => $this->comicsModel->getComics($slug)
        ];

        return view('comics/edit', $data);
    }

    public function update($id)
    {
        // check title
        $oldComics = $this->comicsModel->getComics($this->request->getVar('slug'));

        if ($oldComics['title'] == $this->request->getVar('title')) {
            $title_rule = 'required';
        } else {
            $title_rule = 'required|is_unique[comics.title]';
        }

        // validation input
        if (!$this->validate([
            'title' => [
                'rules' => $title_rule,
                'errors' => [
                    'required' => "{field} comics don't be blank.",
                    'is_unique' => "{field} comics already exists."
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            return redirect()->to('/comics/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicsModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Data has been change.');
        return redirect()->to('/comics');
    }
}
