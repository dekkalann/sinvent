<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;


class CategoryController extends Controller
{
    public function index() {
        // echo("ppp");
        
        //akses record tabel kategori
        $rsetCategory = Kategori::all();
        // return $rsetKategori;
        // return $rsetKategori[0]->deskripsi;
        return view ('v_kategori.demo',compact('rsetCategory'));
        // return view ('layouts.master',compact('rsetCategory'));
    }
}
