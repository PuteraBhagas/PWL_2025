<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return "Selamat Datang";
    }

    public function about(){
        return "Nama    : Putera Bhagaswara R,
                NIM     : 2341760136";
    }

    public function articles() {
        return "Halaman Artikel dengan Id {id} id diganti sesuai input dari url" ;
    }
}
