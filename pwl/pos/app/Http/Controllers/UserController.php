<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user.create');
    }

    public function tambah_simpan(UserStoreRequest $request)
    {
        //UserModel::create([
        //    'username' => $request->username,
        //    'nama' => $request->nama,
        //    'password' => Hash::make($request->password),
        //    'level_id' => $request->level_id
        //]);
        $validated = $request->validated();

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}
