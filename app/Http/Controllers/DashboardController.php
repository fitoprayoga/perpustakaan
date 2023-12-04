<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use App\Models\anggota;
use App\Models\buku;
use App\Models\category;
use App\Models\penerbit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $category = Category::all();
        $penerbit = Penerbit::all();
        return view('dashboard.index', compact ('anggota', 'category', 'buku', 'penerbit'));
    }
}