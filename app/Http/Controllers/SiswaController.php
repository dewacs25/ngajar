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
            return redirect('/')->with(session()->flash('success','Data Berhasil DI Tambahkan'));
        }
    }

    public function deleteSiswa($id)
    {
        $cek = Siswa::where('id_siswa',$id)->get()->first();
        $cek->delete();
        return redirect('/'); 
    }

    public function FormEdit($id)
    {
        $edit = Siswa::where('id_siswa',$id)->get()->first();
        return view('edit',[
            'dataSiswa'=>$edit
        ]);
    }

    public function editSiswa(Request $req, $id)
    {
        $cek = Siswa::where('id_siswa',$id)->update([
            'nis'=>$req->nis,
            'nama'=>$req->nama,
        ]);

        if ($cek) {
            return redirect('/')->with(session()->flash('success','Data Berhasil Di Edit'));
        }else{
            return redirect('/')->with(session()->flash('danger','Data Gagal'));
        }
        
    }
}
