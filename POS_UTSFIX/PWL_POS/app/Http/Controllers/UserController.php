<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {      
        //Praktikum 1 - $fillable: 
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager dua',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create ($data);


        //Praktikum 2.1 – Retrieving Single Models 
        // Ambil model dengan kunci utama
        // $user = UserModel::find(1); // Mengambil data pengguna dengan ID 1 dari database. mencari data berdasarkan primary key

        // Ambil model pertama yang cocok dengan kueri
        // $user = UserModel::where('level_id', 1)->first(); // Mencari data berdasarkan kolom terentu

        // Alternatid untuk mengambil model pertama yang cocok dengan batasan kueri
        // $user = UserModel::firstWhere('level_id', 1); // Mencari satu baris pertama dalam DB dimana level id 1 tetapi lebih ringkas

        // Kode digunakan untuk mencari data pengguna berdasarkan id = 1. Jika error maka memunculkan 484
        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(484);
        // });

        // kode error karena tidak menemukan id = 20 didalam tabel DB
        //  $user = UserModel::findOr(20, ['username', 'nama'], function () {
        //     abort(484);
        //  });
        

        //Praktikum 2.2 – Not Found Exceptions 
        // $user = UserModel::findOrFail(1); 
        // Mencari data berdasarkan id, jika data ditemukan maka dikembalikan ke objek $user 
        // Jika error maka menampilkan error 404
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // Mencari data berdasarkan username, namun karena dalam tabel tidak ada manager9 maka menampilkan error 404
        
        //Praktikum 2.3 – Retreiving Aggregrates 
        // $user = UserModel::where('level_id', 2)->count(); // Menghitung jumlah pengguna dengan level_id = 2.
        // dd($user);
        // return view('user', ['data' => $user]); // Mengirim hasilnya ke view user.blade.php.
        
        //Praktikum 2.4 – Retreiving or Creating Models 
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // ); 
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // ); 
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // ); 
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();

        //Praktikum 2.5 – Attribute Changes
        // $user = UserModel::create(
        //     [
        //         'username' => 'manager55',
        //         'nama' => 'Manager55',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]);
        // $user->username = 'manager56';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('false'); //false
        // $user->isDirty(['nama', 'username']); //true

        // $user->isClean(); //false
        // $user->isClean('username'); //false
        // $user->isClean('nama'); //true
        // $user->isClean(['nama', 'username']); //false
        
        // $user->save();

        // $user->isDirty(); //false
        // $user->isClean(); //true
        // dd($user->isDirty());
        // $user = UserModel::create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]);
        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged(); //true
        // $user->wasChanged('username'); //true
        // $user->wasChanged(['username', 'level_id']); //true
        // $user->wasChanged('nama'); //false
        // dd($user->wasChanged(['nama', 'username'])); //true

        //Praktikum 2.6 – Create, Read, Delete (CRUD)
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);
        // }
        // public function tambah()
        // {
        //     return view("user_tambah");
        // }
        
        // public function tambah_simpan(Request $request)
        // {
        //     UserModel::create([
        //         'username' => $request->username,
        //         'nama' => $request->nama,
        //         'password' => Hash::make('$request->password'),
        //         'level_id' => $request->level_id
        //     ]);

        //     return redirect('/user');
        // }
        
        // public function ubah($id)
        // {
        //     $user = UserModel::find($id);
        //     return view('user_ubah', ['data' => $user]);
        // }
        
        
        // public function ubah_simpan($id, Request $request)
        // {
        //     $user = UserModel::find($id);
            
        //     $user->username = $request->username;
        //     $user->nama = $request->nama;
        //     $user->password = Hash::make('$request->password');
        //     $user->level_id = $request->level_id;
            
        //     $user->save();
        //     return redirect('/user');
        // }
        
        // public function hapus($id)
        // {
        //     $user = UserModel::find($id);
        //     $user->delete();

        //     return redirect('/user');
    
        // $user = UserModel::with('level')->get();
        // dd($user);
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    }
} 