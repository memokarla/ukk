<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pkl;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // READ
    {
        $pkl = Pkl::get();
        // Ambil semua data dari tabel pkls (tabel yang digunakan oleh model Pkl) dan simpan ke variabel $pkl

        return response()->json($pkl, 200);
        // response() -> Fungsi bawaan Laravel untuk membuat respon HTTP (balasan dari server)
        // json() -> Memberi tahu Laravel supaya isi respon dikirim dalam format JSON
        // $pkl -> Data yang akan dikirim ke client (biasanya data model atau array)
        // 200 -> Kode status HTTP yang artinya OK atau permintaan berhasil

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // CREATE
    {
        $pkl = new Pkl(); // membuat objek baru dari model Pkl
        $pkl->siswa_id = $request->siswa_id;
        $pkl->guru_id = $request->guru_id;
        $pkl->industri_id = $request->industri_id;
        $pkl->mulai = $request->mulai;
        $pkl->selesai = $request->selesai;
        $pkl->save(); // menyimpan ke database
        return response()->json($pkl, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // READ
    {
        $pkl = Pkl::find($id); // mencari data PKL berdasarkan ID tertentu
        return response()->json($pkl, 200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // UPDATE
    {
        $pkl = Pkl::find($id);
        // jika data tidak ditemukan, kirim respon JSON dengan status 404 Not Found
        if (!$pkl) {
            return response()->json(['message' => 'PKL tidak ditemukan'], 404);
        }

        $request->validate([
            // dengan menggunaan sometimes|required, hanya field yang dikirim yang akan divalidasi dan diproses
            // jika hanya menggunakan required, semua form wajib diisi, namun function ini kan semacam edit, jadi tak mesti semua form yang hendak diedit
            // datanglah sometimes, hanya form yang di edit yang akan kekirim
            'siswa_id' => 'sometimes|required|exists:siswas,id',
            'guru_id' => 'sometimes|required|exists:gurus,id',
            'industri_id' => 'sometimes|required|exists:industris,id',
            'mulai' => 'sometimes|required|date',
            'selesai' => 'sometimes|required|date|after_or_equal:mulai', 
        ]);

        // jika ada data baru dikirim ($request->...), gunakan nilai baru itu
        // jika tidak ada (null), tetap gunakan data lama ($pkl->...)
        $pkl->siswa_id = $request->siswa_id ?? $pkl->siswa_id;
        $pkl->guru_id = $request->guru_id ?? $pkl->guru_id;
        $pkl->industri_id = $request->industri_id ?? $pkl->industri_id;
        $pkl->mulai = $request->mulai ?? $pkl->mulai;
        $pkl->selesai = $request->selesai ?? $pkl->selesai;
        $pkl->save();

        return response()->json($pkl, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) // DELETE
    {
        Pkl::destroy($id); // menghapus baris dengan ID yang dimaksud
        return response()->json(["message"=>"Deleted"], 200);
    }
}
