<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'User Product',
            'list' => ['Home', 'Product']
        ];

        $page = (object) [
            'title' => 'Daftar product yang terdaftar dalam sistem',
        ];

        $activeMenu = 'product';

        return view('product.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list()
    {
        $product = ProductModel::select('product_id', 'product_nama', 'product_kode', 'harga_beli', 'harga_jual', 'kategori_id');

        return DataTables::of($product)
            ->addIndexColumn()
            ->addColumn('aksi', function ($product) {
                $btn  = '<a href="' . url('/product/' . $product->product_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/product/' . $product->product_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .=
                      '<form class="d-inline-block" method="POST" action="' . url('/product/' . $product->product_id) . '">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">
                            Hapus
                       </button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'User product',
            'list' => ['Home', 'Product', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah product baru',
        ];

        $activeMenu = 'product';

        return view('product.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'product_kode' => 'required|string|min:3|unique:m_product,product_kode',
            'product_nama' => 'required|string|max:100',
        ]);

        ProductModel::create([
            'product_id' => $request->product_id,
            'product_kode' => $request->product_kode,
            'product_nama' => $request->product_nama,
        ]);

        return redirect('/product')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $product = ProductModel::find($id);

        $breadcrumb = (object) [
            'title' => 'User product',
            'list' => ['Home', 'Product', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail product',
        ];

        $activeMenu = 'product';

        return view('product.show', compact('breadcrumb', 'page', 'product', 'activeMenu'));
    }

    public function edit($id)
    {
        $product = ProductModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Product',
            'list' => ['Home', 'Product', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit product',
        ];

        $activeMenu = 'product';

        return view('product.edit', compact('breadcrumb', 'page', 'product', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'product_kode' => 'required|string|min:3|unique:m_product,product_kode,' . $id . ',product_id',
            'product_nama' => 'required|string|max:100',
        ]);

        $product = productModel::find($id);
        $product->product_id = $request->product_id;
        $product->product_kode = $request->product_kode;
        $product->product_nama = $request->product_nama;
        $product->save();

        return redirect('/product')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = ProductModel::find($id);
        if (!$check) {
            return redirect('/product')->with('error', 'Data product tidak ditemukan');
        }

        try {
            ProductModel::destroy($id);
            return redirect('/product')->with('success', 'Data product berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/product')->with('error', 'Data product gagal dihapus karena data ini masih digunakan di tabel lain');
        }
    }
}
