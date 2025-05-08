<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use CodeIgniter\HTTP\ResponseInterface;

class ArticleController extends BaseController
{   

    // Menampilkan detail artikel
    public function show($id)
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->find($id);

        if (!$article) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Article with ID {$id} not found.");
        }

        return view('articles/detail_article', ['article' => $article]);
    }
    
    // Menampilkan halaman untuk membuat artikel baru
    public function create()
    {
        return view('articles/create_article');
    }

    // Fungsi Untuk Menambahkan Artikel Baru
    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'title'  => 'required|min_length[3]',
            'author' => 'required|min_length[3]',
            'content'=> 'required|min_length[10]',
            'date'   => 'required|valid_date',
            'image'  => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
        ])) {
            // Jika validasi gagal, redirect kembali dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $title   = $this->request->getPost('title');
        $author  = $this->request->getPost('author');
        $content = $this->request->getPost('content');
        $date    = $this->request->getPost('date');
        $image   = $this->request->getFile('image');

        // Pindahkan gambar ke folder public/uploads dan ambil nama file-nya
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName(); // Menghasilkan nama file acak untuk menghindari duplikasi
            $image->move(ROOTPATH . 'public/uploads', $imageName); // Pindahkan gambar ke folder public/uploads
        } else {
            // Jika gambar tidak valid atau sudah dipindahkan, tampilkan error
            return redirect()->back()->withInput()->with('errors', ['image' => 'Gambar gagal di-upload']);
        }

        // Simpan data artikel ke dalam database
        $articleModel = new ArticleModel();
        $articleModel->save([
            'title'   => $title,
            'author'  => $author,
            'content' => $content,
            'image'   => $imageName,
            'date'    => $date,
        ]);
        
        session()->setFlashdata('success', 'Artikel berhasil ditambahkan!');

        // Redirect ke halaman artikel atau halaman sukses
        return redirect()->to('/');
    }


    // Menampilkan halaman untuk mengedit artikel
    public function edit($id)
    {
        // Ambil data artikel berdasarkan ID
        $articleModel = new ArticleModel();
        $article = $articleModel->find($id);

        // Cek apakah artikel ditemukan
        if (!$article) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        // Kirimkan data ke view untuk ditampilkan dalam form
        $data = [
            'article' => $article, // Mengirim data artikel ke view
        ];

        // Tampilkan halaman edit artikel
        return view('articles/edit_article', $data);
    }


    // Memperbarui artikel setelah form edit disubmit
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'title'   => 'required|min_length[3]',
            'content' => 'required|min_length[10]',
        ])) {
            // Jika validasi gagal, redirect kembali ke form edit dengan error message
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $title   = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $image   = $this->request->getFile('image');

        // Cek apakah ada gambar baru di-upload
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Jika gambar baru di-upload, simpan gambar baru
            $imageName = $image->getRandomName(); // Nama gambar acak untuk menghindari duplikasi
            $image->move(ROOTPATH . 'public/uploads', $imageName); // Pindahkan gambar ke folder public/uploads

            // Hapus gambar lama jika ada
            $articleModel = new ArticleModel();
            $article = $articleModel->find($id);
            if ($article && file_exists(ROOTPATH . 'public/uploads/' . $article['image'])) {
                unlink(ROOTPATH . 'public/uploads/' . $article['image']); // Menghapus gambar lama
            }
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $imageName = $this->request->getPost('old_image'); // Ambil nama gambar lama dari input tersembunyi
        }

        // Simpan perubahan artikel ke dalam database
        $articleModel = new ArticleModel();
        $articleModel->update($id, [
            'title'   => $title,
            'content' => $content,
            'image'   => $imageName, // Gambar baru atau gambar lama
        ]);

        // Redirect ke halaman detail artikel setelah berhasil update
        return redirect()->to(base_url('articles/' . $id));
    }

    public function delete($id)
    {
        // Memuat model artikel
        $articleModel = new ArticleModel();

        // Cari artikel berdasarkan ID
        $article = $articleModel->find($id);

        // Pastikan artikel ditemukan
        if (!$article) {
            // Jika artikel tidak ditemukan, tampilkan pesan error
            session()->setFlashdata('error', 'Artikel tidak ditemukan.');
            return redirect()->to(base_url('/')); // Redirect ke halaman utama atau daftar artikel
        }

        // Menghapus gambar yang terkait, jika ada
        if (file_exists(ROOTPATH . 'public/uploads/' . $article['image'])) {
            unlink(ROOTPATH . 'public/uploads/' . $article['image']); // Hapus gambar dari folder
        }

        // Hapus artikel dari database
        $articleModel->delete($id);

        // Set pesan sukses
        session()->setFlashdata('success', 'Artikel berhasil dihapus.');

        // Redirect ke halaman utama atau daftar artikel setelah berhasil menghapus
        return redirect()->to(base_url('/'));
    }

}