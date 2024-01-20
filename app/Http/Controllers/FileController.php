<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            // your validation rules here
            'sk_pangkat_terakhir' => 'required',
            'sk_fungsional_terakhir' => 'required',
            'sk_pencantuman_gelar' => 'required',
            'ijazah_terakhir' => 'required',
            'str' => 'required',
            'sip' => 'required',
            'surat_rekomendasi' => 'required',
            'portofolio' => 'required',
            'skp' => 'required',
        ]);

        $user_id = auth()->user()->id;

        // Create a folder for the user if it doesn't exist
        $userFolderPath = public_path('upload_file_peserta/' . $user_id);
        if (!file_exists($userFolderPath)) {
            mkdir($userFolderPath, 0777, true);
        }

        $files = File::create([
            'user_id' => $user_id,
            'sk_pangkat_terakhir'   => '',
            'sk_fungsional_terakhir' => '',
            'sk_pencantuman_gelar' => '',
            'ijazah_terakhir' => '',
            'str' => '',
            'sip' => '',
            'surat_rekomendasi' => '',
            'portofolio' => '',
            'skp' => '',
        ]);

        $this->moveAndSaveFile($request, 'sk_pangkat_terakhir', $files, $user_id);
        $this->moveAndSaveFile($request, 'sk_fungsional_terakhir', $files, $user_id);
        $this->moveAndSaveFile($request, 'sk_pencantuman_gelar', $files, $user_id);
        $this->moveAndSaveFile($request, 'ijazah_terakhir', $files, $user_id);
        $this->moveAndSaveFile($request, 'str', $files, $user_id);
        $this->moveAndSaveFile($request, 'sip', $files, $user_id);
        $this->moveAndSaveFile($request, 'surat_rekomendasi', $files, $user_id);
        $this->moveAndSaveFile($request, 'portofolio', $files, $user_id);
        $this->moveAndSaveFile($request, 'skp', $files, $user_id);
        // Repeat for other file fields

        $files->save();
    }

    private function moveAndSaveFile(Request $request, $fieldName, $files, $user_id)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileName = $file->getClientOriginalName();

            // Move the file to the user's folder
            $file->move("upload_file_peserta/$user_id", $fileName);

            // Save the file name to the corresponding field in the database
            $files->$fieldName = $fileName;
        }
    }

    public function index()
    {
        return view('upload');
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function updateFile(Request $form, File $files) 
    {
        $result = $form->validate([
            'sk_pangkat_terakhir' => 'required',
            'sk_fungsional_terakhir' => 'required',
            'sk_pencantuman_gelar' => 'required',
            'ijazah_terakhir' => 'required',
            'str' => 'required',
            'sip' => 'required',
            'portofolio' => 'required',
            'skp' => 'required',
        ]);
        $files->update($result);
        return redirect()->route('lihat.data');
    }

    public function editFile($files) {
        $result = File::where('id',$files)->first();
        //  // Retrieve the currently authenticated user
        //  $user = Auth::user();

        //  // Retrieve the biodata for the authenticated user only
        //  $result = Biodata::where('user_id', $user->id)->get();
        return view('edit_upload')->with('file', $result);
    }
}