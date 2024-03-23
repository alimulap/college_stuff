<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return 'NIM: ANGGAP_SAJA_NIM <br> Nama: Muhammad Alimul';
    }

    public function articles(string $id) {
        return 'Halaman Artikel dengan Id {'.$id.'}';
    }
}
