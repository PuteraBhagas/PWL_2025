<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object)[
            'title' => 'Daftar Supplier yang terdaftar dalam sistem'
        ];

        $activeMenu = 'supplier'; // set menu yang sedang aktif

        return view('supplier.index', ['breadcrumb' => $breadcrumb, 'page' => $page,'activeMenu' => $activeMenu]);
    }

    public function list(Request $request){
        $suppliers = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_nama');
    
        return DataTables::of($suppliers)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($supplier) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/supplier/' . $supplier->supplier_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/supplier/' . $supplier->supplier_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/supplier/' . $supplier->supplier_id).'">';
                $btn .= csrf_field() . method_field("DELETE");
                $btn .= '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah supplier baru'
        ];

        $activeMenu = 'Supplier';

        return view('supplier.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'supplier_kode' => 'required|string|unique:m_supplier,supplier_kode',
            'supplier_nama' => 'required|min:5',
        ]);

        SupplierModel::create([
            'supplier_kode' => $request->supplier_kode,
             'supplier_nama' => $request->supplier_nama,
        ]);

        return redirect('/supplier')->with('Success', 'Data berhasil disimpan');
    }
    public function show(string $id){
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show',['supplier' => $supplier, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id){
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit'],
        ];

        $page = (object)[
            'title' => 'Edit Supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'supplier' => $supplier, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, string $id){
        $request->validate([
            'supplier_kode' => 'required|string|unique:m_supplier,supplier_kode',
            'supplier_nama' => 'required|min:5',
        ]);

        SupplierModel::find($id)->update([
            'supplier_kode' => $request->supplier_kode,
             'supplier_nama' => $request->supplier_nama,
        ]);

        return redirect('/supplier')->with('Success', 'Data berhasil disimpan');
    }
    public function destroy(string $id){
        $check = SupplierModel::find($id);

        if (!$check) { // cek data ada atau tidak
            return redirect('/supplier')->with('error','data tidak ditemukan');
        }

        try{
            SupplierModel::destroy($id);// hapus data levelS
            return redirect('/supplier')->with('success','Data supplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena terdapat tabel lain yang masih terkait dengan data ini');
        }
    }
}