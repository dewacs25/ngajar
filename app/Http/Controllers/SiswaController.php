<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function tambahSiswa(Request $req)
    {
        $req->validate([
            'nis'=>'required',
            'nama'=>'required',
        ],[
            'nis.required'=>'bang nis isi dong'
        ]);

        dd($req->all());
    }
}
