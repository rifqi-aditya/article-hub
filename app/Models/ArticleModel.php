<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    // Nama tabel di database
    protected $table            = 'articles';
    // Primary key dari tabel
    protected $primaryKey       = 'id';
    // Menggunakan auto increment
    protected $useAutoIncrement = true;
    // Tipe data yang akan dikembalikan oleh model
    protected $returnType       = 'array';
    // Soft delete tidak digunakan
    protected $useSoftDeletes   = false;
    // Kolom yang dapat diubah (allowed fields)
    protected $allowedFields    = ['title', 'author', 'content', 'image', 'date'];
    
    // Timestamps untuk mencatat waktu pembuatan dan pembaruan data
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime'; // Format tanggal yang digunakan
    protected $createdField     = 'created_at'; // Nama kolom untuk waktu pembuatan
    protected $updatedField     = 'updated_at'; // Nama kolom untuk waktu pembaruan
    protected $deletedField     = 'deleted_at'; // Nama kolom untuk waktu penghapusan

    // Validation rules untuk validasi data input
    protected $validationRules  = [
        'title'   => 'required|max_length[255]',
        'author'  => 'required|max_length[255]',
        'content' => 'required',
    ];
    protected $validationMessages = [
        'title'   => [
            'required' => 'Title is required.',
            'max_length' => 'Title cannot be longer than 255 characters.',
        ],
        'author'  => [
            'required' => 'Author is required.',
            'max_length' => 'Author name cannot be longer than 255 characters.',
        ],
        'content' => [
            'required' => 'Content is required.',
        ],
    ];
    protected $skipValidation    = false;

    // Untuk menangani berbagai callback, jika diperlukan
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getArticles()
    {
        return $this->findAll();
    }
}