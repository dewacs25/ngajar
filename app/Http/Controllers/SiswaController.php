<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();

        return view('home',[
            'siswas'=>$siswas
        ]);
    }

    public function tambahSiswa(Request $req)
    {
        $req->validate([
            'nis'=>'required',
            'nama'=>'required',
        ],[
            'nis.required'=>'bang nis isi dong'
        ]);

        $tambah =  Siswa::create([
            'nis'=>$req->nis,
            'nama'=>$req->nama,
        ]);

        if ($tambah) {
            return redirect('/');
        }
    }

    public function deleteSiswa($id)
    {
        $cek = Siswa::where('id_siswa',$id)->get()->first();
        $cek->delete();
        return redirect('/'); 
    }
}
