<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicsModel extends Model
{
    protected $table = 'comics';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'writer', 'publisher', 'cover'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getComics($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
