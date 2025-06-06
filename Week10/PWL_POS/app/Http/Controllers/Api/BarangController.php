<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        return BarangModel::with('kategori')->get();
    }

    public function store(Request $request){
        $barang = BarangModel::create($request->all());
        return response()->json($barang->load('kategori'), 201);
    }

    public function show(BarangModel $barang){
        return $barang->load('kategori');
    }

    public function update(Request $request, BarangModel $barang){
        $barang->update($request->all());
        return response()->json($barang->load('kategori'), 200);
    }
    public function destroy(BarangModel $barang){
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}