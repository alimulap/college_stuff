<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\KategoriStoreRequest;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(KategoriStoreRequest $request)
    {
        //KategoriModel::create([
        //    'kategori_kode' => $request->kodeKategori,
        //    'kategori_nama' => $request->namaKategori,
        //]);
        $validated = $request->validated();

        $validated = $request->safe()->only(['kodeKategori', 'namaKategori']);
        $validated = $request->safe()->except(['kodeKategori', 'namaKategori']);

        return redirect('/kategori');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request)
    {
        KategoriModel::where('kategori_id', $request->kategoriId)->update([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    public function delete($id)
    {
        KategoriModel::where('kategori_id', $id)->delete();
        return redirect('/kategori');
    }
}
