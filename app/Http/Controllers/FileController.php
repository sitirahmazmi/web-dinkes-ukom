<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
      $user_id = auth()->user()->id;
      $files = File::create($request->all());
      if ($request->hasFile('sk_pangkat_terakhir')) {
        $request->file('sk_pangkat_terakhir')->move('upload_file_peserta/',$request->file('sk_pangkat_terakhir')->getClientOriginalName());
        $files->sk_pangkat_terakhir = $request->file('sk_pangkat_terakhir')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('sk_fungsional_terakhir')) {
        $request->file('sk_fungsional_terakhir')->move('upload_file_peserta/',$request->file('sk_fungsional_terakhir')->getClientOriginalName());
        $files->sk_fungsional_terakhir = $request->file('sk_fungsional_terakhir')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('sk_pencantuman_gelar')) {
        $request->file('sk_pencantuman_gelar')->move('upload_file_peserta/',$request->file('sk_pencantuman_gelar')->getClientOriginalName());
        $files->sk_pencantuman_gelar = $request->file('sk_pencantuman_gelar')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('ijazah_terakhir')) {
        $request->file('ijazah_terakhir')->move('upload_file_peserta/',$request->file('ijazah_terakhir')->getClientOriginalName());
        $files->ijazah_terakhir = $request->file('ijazah_terakhir')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('str')) {
        $request->file('str')->move('upload_file_peserta/',$request->file('str')->getClientOriginalName());
        $files->str = $request->file('str')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('sip')) {
        $request->file('sip')->move('upload_file_peserta/',$request->file('sip')->getClientOriginalName());
        $files->sip = $request->file('sip')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('surat_rekomendasi')) {
        $request->file('surat_rekomendasi')->move('upload_file_peserta/',$request->file('surat_rekomendasi')->getClientOriginalName());
        $files->surat_rekomendasi = $request->file('surat_rekomendasi')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('portofolio')) {
        $request->file('portofolio')->move('upload_file_peserta/',$request->file('portofolio')->getClientOriginalName());
        $files->portofolio = $request->file('portofolio')->getClientOriginalName();
        $files->save;
      }
      if ($request->hasFile('skp')) {
        $request->file('skp')->move('upload_file_peserta/',$request->file('skp')->getClientOriginalName());
        $files->skp = $request->file('skp')->getClientOriginalName();
        $files->save;
      }
    }

    public function index() {
      return view('upload');
    }
    public function create() {
      return view('uploads.create');
    }
}
