<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::latest()->where('status', 'public');
        if(request('search')) {
            $files->where('judul_file', 'like', '%' . request('search') . '%');
        }
        $data['files'] = $files->get();
        $data['title'] = 'File Publik';
        return view('user.file.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Buat File';
        return view('user.file.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        $errors = [
            'judul_file.required' => 'Judul harus diisi',
            'judul_file.unique' => 'Judul sudah digunakan',
            'files.required' => 'Files harus diisi',
            'files.file' => 'Files format harus file',
            'status.required' => 'Status harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ];
        $rules = [
            'files' => 'required|file',
            'status' => 'required'
        ];
        if (File::where('judul_file', $request->input('judul_file'))->where('id_user', auth()->id())->count() == 0) {
            $rules['judul_file'] = 'required';
            $validatedData = $request->validate($rules, $errors);
        } else {
            $rules['judul_file'] = 'required|unique:files';
            $validatedData = $request->validate($rules, $errors);
        }

        // Ambil file
        $file = $request->file('files');
        // Nama file asli
        $originalNameFile = $file->getClientOriginalName();
        // Ekstensi file
        $ekstensi = $file->getClientOriginalExtension();
        // Size file
        if ($file->getSize() < 1024 * 1024) {
            $size = round($file->getSize() / 1024, 1) . ' kb';
        } else {
            $size = round($file->getSize() / (1024 * 1024), 2) . ' mb';
        }
        // Mime type file
        $mime = $file->getMimeType();
        // Generate nama sampul baru
        // Pindahkan file ke folder asli
        $path = 'users/' . Auth::user()->id_user . '/files';
        $namaFileRandom = $file->store($path);

        $validatedData = [
            'id_user' => Auth::user()->id_user,
            'judul_file' => $request->input('judul_file'),
            'original_filename' => $originalNameFile,
            'generate_filename' => $namaFileRandom,
            'status' => $request->input('status'),
            'ekstensi_file' => $ekstensi,
            'mime_type' => $mime,
            'file_size' => $size,
            'deskripsi' => $request->input('deskripsi')
        ];

        File::create($validatedData);

        session()->flash('success', 'mengupload file');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        $data['title'] = 'Detail File';
        if ($file->id_user != Auth::id()) abort(404);
        $data['file'] = $file;
        return view('user.file.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        $data = [
            'title' => 'Edit File',
            'file' => $file,
        ];

        if (is_null($file)) {
            session()->flash('errors', 'File tidak ada');
            return redirect('/');
        }

        if ($file->id_user != Auth::id()) abort(404);
        return view('user.file.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        $errors = [
            'judul_file.required' => 'Judul harus diisi',
            'judul_file.unique' => 'Judul sudah digunakan',
            'files.required' => 'Files harus diisi',
            'files.file' => 'Files format harus file',
            'status.required' => 'Status harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi'
        ];
        $rules = [
            'files' => 'file',
            'status' => 'required',
        ];
        if ($file->judul_file == $request->input('judul_file')) {
            $rules['judul_file'] = 'required';
            $validatedData = $request->validate($rules, $errors);
        } else {
            $rules['judul_file'] = 'required|unique:files';
            $validatedData = $request->validate($rules, $errors);
        }

        if ($request->file('files')) {
            // Ambil file
            $fileInput = $request->file('files');
            // Nama file asli
            $originalNameFile = $fileInput->getClientOriginalName();
            // Ekstensi file
            $ekstensi = $fileInput->getClientOriginalExtension();
            // Size file
            if ($fileInput->getSize() < 1024 * 1024) {
                $size = round($fileInput->getSize() / 1024, 1) . ' kb';
            } else {
                $size = round($fileInput->getSize() / (1024 * 1024), 2) . ' mb';
            }
            // Mime type file
            $mime = $fileInput->getMimeType();
            // Generate nama sampul baru
            // Pindahkan file ke folder asli
            $path = 'users/' . Auth::user()->id_user . '/files';
            $namaFileRandom = $fileInput->store($path);
            Storage::delete($file->generate_filename);
        } else {
            $originalNameFile = $file->original_filename;
            $ekstensi = $file->ekstensi_file;
            $mime = $file->mime_type;
            $size = $file->file_size;
            $namaFileRandom = $file->generate_filename;
        }

        $validatedData = [
            'id_user' => Auth::user()->id_user,
            'judul_file' => $request->input('judul_file'),
            'original_filename' => $originalNameFile,
            'generate_filename' => $namaFileRandom,
            'status' => $request->input('status'),
            'ekstensi_file' => $ekstensi,
            'mime_type' => $mime,
            'file_size' => $size,
            'deskripsi' => $request->input('deskripsi')
        ];

        $file->update($validatedData);

        session()->flash('success', 'mengedit file');
        return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        Storage::delete($file->generate_filename);
        $file->destroy($file->id_file);

        session()->flash('success', 'hapus file!');
        return redirect('/');
    }

    public function download($id_file)
    {
        $file = File::where('id_file', $id_file)->first();
        if ($file == null) {
            session()->flash('errors', 'file tidak ditemukan');
            return redirect()->back();
        }
        $path = public_path('storage/' . $file->generate_filename);
        $headers = [
            'Content-Type' => 'application/octet-stream'
        ];

        session()->flash('success', 'download file');
        return response()->download($path, $file->original_filename, $headers);
    }

    public function linkDownload($id_file, $filename)
    {
        $namaFile = explode('/', $filename);
        $filePathDB = 'users/' . $id_file . '/files/' . end($namaFile);
        $fileDB = File::where('generate_filename', $filePathDB)->first();

        if ($fileDB == null) {
            session()->flash('errors', 'file tidak ditemukan');
            return redirect()->back();
        }

        $headers = [
            'Content-Type' => 'application/octet-stream'
        ];

        $path = public_path('storage/users/' . $id_file . '/files/' .  $filename);

        // session()->flash('success', 'download file');
        return response()->download($path, $fileDB->original_filename, $headers);
    }

    public function detailPublik(File $file, $id_file)
    {
        $data['file'] = $file->find($id_file);
        $data['title'] = 'Detail File';
        return view('user.file.detalPublik', $data);
    }
}
