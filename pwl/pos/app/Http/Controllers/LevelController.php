<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(LevelStoreRequest $request)
    {
        //DB::table('m_level')->insert([
        //    'level_id' => $request->levelID,
        //    'level_kode' => $request->levelKode,
        //    'level_nama' => $request->levelNama,
        //]);
        $validated = $request->validated();
        return redirect('/level');
    }
}
