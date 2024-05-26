<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);
        // return "Pemrosesan file upload di sini";
        // if ($request->hasFile('berkas')) {
        //     echo "path(): " . $request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): " . $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): " . $request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): " . $request->berkas->getSize();
        // } else {
        //     echo "Tidak ada berkas yang diupload.";
        // }
        $request->validate(['berkas' => 'required|file|image|max:500']);
        // $path = $request->berkas->store('uploads');
        // $path = $request->berkas->storeAs('uploads', 'berkas');
        // $namaFile = $request->berkas->getClientOriginalName();
        $namaFile = $request->namaBerkas . '.' . $request->berkas->extension();
        // $path = $request->berkas->storeAs('public', $namaFile);
        $path = $request->berkas->move('gambar', $namaFile);
        echo "File berhasil diupload ke <a href='" . asset($path) . "'>$namaFile</a>";
        echo "<img src='" . asset($path) . "' alt=''>";
        // echo $request->berkas->getClientOriginalName() . " lolos validasi";
    }
}
