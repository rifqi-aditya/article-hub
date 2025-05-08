<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class HomeController extends BaseController
{
    public function index(): string
    {
        // Membuat instance dari ArticleModel
        $articleModel = new ArticleModel();

        // Mengambil data artikel
        $articles = $articleModel->getArticles();

        // Mengirimkan data artikel ke view
        return view('pages/home', ['articles' => $articles]);
    }
}
