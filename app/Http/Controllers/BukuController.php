<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all();


        if($data->isEmpty()){
           return response()->json(['status' => false]);
        }

        return response()->json(['status'=> true, 'data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jml_hal' => 'required',
        ],[
            'required' => ':attributte Harus diisi'
        ],[
            'judul'=>'judul',
            'penulis'=>'penulis',
            'jml_hal'=>'Jumlah Halaman',
        ]);


        Buku::create([
            'id'=>Str::uuid(),
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'jml_hal'=>$request->jml_hal,
        ]);

        return response()->json(['message'=>'Berhasil Menambahkan Data']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Buku::where('id', $id)->first();

        if (empty($data)) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status'=> true, 'data'=> $data]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jml_hal' => 'required',
        ],[
            'required' => ':attribute Harus diisi'
        ],[
            'judul'=>'judul',
            'penulis'=>'penulis',
            'jml_hal'=>'Jumlah Halaman',
        ]);

        $data = Buku::where('id',$id)->first();

        $data->update([
            'id'=>Str::uuid(),
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'jml_hal'=>$request->jml_hal,
        ]);

        return response()->json(['message'=>'Berhasil Mengubah Data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Buku::where('id',$id)->delete();

        return response()->json(['message' => 'Berhasil Menghapus Data']);
    }
}
