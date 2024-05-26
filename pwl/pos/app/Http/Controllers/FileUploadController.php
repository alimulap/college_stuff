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
        $namaFile = "web-" . time() . "." . $request->berkas->getClientOriginalExtension();
        // $path = $request->berkas->storeAs('public', $namaFile);
        $path = $request->berkas->move('gambar', $namaFile);
        echo "File berhasil diupload ke " . $path;
        echo "<br>";
        $pathNew = asset('gambar/' . $namaFile);
        echo "File bisa diakses di <a href='" . $pathNew . "'>" . $pathNew . "</a>";
        // echo $request->berkas->getClientOriginalName() . " lolos validasi";
    }
}
