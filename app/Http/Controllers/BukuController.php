<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\category;
use App\Models\penerbit;
use Illuminate\Http\Request;
use Illuminate\Http\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        $category = \App\Models\Category::all();
        $penerbit = \App\Models\Penerbit::all();
        return view('buku.index', compact('buku', 'category', 'penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $buku = new Buku;

        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());
        
        Buku::create([
            'kode' => $request->kode,
            'judul' =>  $request->judul,
            'category_id' => $request->category_id,
            'penerbit_id' => $request->penerbit_id,
            'isbn' => $request->isbn,
            'pengarang' => $request->pengarang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'stok' => $request->stok,
            'tahun_terbit' => $request->tahun_terbit,
            'sinopsis' => $request->sinopsis,
            'gambar' => $image->hashName()
        ]);

        return redirect('buku')->with('sukses', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        $category = \App\Models\Category::all();
        $penerbit = \App\Models\Penerbit::all();

        return view('buku.edit', compact('buku', 'category', 'penerbit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $buku = Buku::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image->storeAs('public/buku/',$image->hashName());

            //delete old foto
            // Storage::delate('public/buku/'.$buku->foto);

            //update buku with new foto
            $buku->update([
                'kode' => $request->kode,
                'judul' =>  $request->judul,
                'category_id' => $request->category_id,
                'penerbit_id' => $request->penerbit_id,
                'isbn' => $request->isbn,
                'pengarang' => $request->pengarang,
                'jumlah_halaman' => $request->jumlah_halaman,
                'stok' => $request->stok,
                'tahun_terbit' => $request->tahun_terbit,
                'sinopsis' => $request->sinopsis,
                'gambar' => $image->hashName()
            ]);
        } else {
            $buku->update([
                'kode' => $request->kode,
                'judul' =>  $request->judul,
                'category_id' => $request->category_id,
                'penerbit_id' => $request->penerbit_id,
                'isbn' => $request->isbn,
                'pengarang' => $request->pengarang,
                'jumlah_halaman' => $request->jumlah_halaman,
                'stok' => $request->stok,
                'tahun_terbit' => $request->tahun_terbit,
                'sinopsis' => $request->sinopsis
            ]);
        }

        return redirect('buku')->with('sukses', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses', 'Data berhasil di hapus');
    }

    public function print($id)
    {
        $buku = Buku::find($id);
        $pdf = Pdf::loadView('buku.print', compact('buku'));
        return $pdf->stream();
    }
}