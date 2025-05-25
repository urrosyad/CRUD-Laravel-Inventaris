<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Menampilkan semua barang
    public function index()
    {
        $barang = Barang::all();
        return view('index', compact('barang'));
    }


    /* Menampilkan Form Tambah Barang.*/
    public function create()
    {
        return view('tambahBarang');
        // Menambahkan data ke dalam database
        return response()->json(['form' => 'ini form create barang']);
    }


    /* Store a newly created resource in storage.*/
    public function store(Request $request)
    {
        // Disesuaikan dengan name inputan pada form
        $request->validate([
            'kode_barang' => 'required|string|unique:tb_barang,kodeBarang',
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|numeric',
            'jumlah_barang' => 'required|integer',
            'deskripsi_barang' => 'nullable|string',
            'foto_barang' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar
        $imagePath = $request->file('foto_barang')->store('fotoBarang', 'public');

        // Disesuaikan dengan penamaan kolom pada tabel tb_barang dan name pada input form
        // Simpan data barang ke dalam database
        Barang::create([
            'namaBarang' => $request->nama_barang,
            'kodeBarang' => $request->kode_barang,
            'satuanBarang' => $request->harga_barang,
            'jumlahBarang' => $request->jumlah_barang,
            'deskBarang' => $request->deskripsi_barang,
            'fotoBarang' => $imagePath, // string path gambar
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }


    /**
     * Menampilkan Data.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    /* Menampilkan Form Edit. */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('editBarang', compact('barang'));
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

    // Validasi
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'kode_barang' => 'required|string|max:100',
        'harga_barang' => 'required|numeric',
        'jumlah_barang' => 'required|numeric',
        'deskripsi_barang' => 'nullable|string',
        'foto_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan data form
    $barang->namaBarang = $request->nama_barang;
    $barang->kodeBarang = $request->kode_barang;
    $barang->satuanBarang = $request->harga_barang;
    $barang->jumlahBarang = $request->jumlah_barang;
    $barang->deskBarang = $request->deskripsi_barang;

    // Upload foto jika ada
    if ($request->hasFile('foto_barang')) {
        // Hapus foto lama
        if ($barang->fotoBarang && Storage::exists('public/' . $barang->fotoBarang)) {
            Storage::delete('public/' . $barang->fotoBarang);
        }

        $fotoPath = $request->file('foto_barang')->store('foto_barang', 'public');
        $barang->fotoBarang = $fotoPath;
    }

    $barang->save();

    return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    /* Berpindah ke halaman hapus barang */
    public function hapus(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('hapusBarang', compact('barang'));
    }
    
    /* Remove the specified resource from storage */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
