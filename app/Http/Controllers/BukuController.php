<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.books', [
            'title' => 'Semua Buku',
            'books' => Buku::with('category')->latest()->get()->take(10),
            'counted' => Buku::all()->count(),
        ]);
    }

    public function loadMoreBooks(Request $request, $skip){
        if($request->ajax()){
            $data = Buku::with('category')->latest()->get()->skip($skip)->take(10);
            return response()->json(['books' => $data]);
        }else{
            return view('error.errorPage', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Server Disconnected'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function searchBooks(Request $request)
    {
        $request->flashOnly('searchValue');
        if(!empty($request->searchValue)){
            $data = Buku::where('judul', 'LIKE','%'.$request->searchValue.'%')->get();
            return view('pages.search-books', [
                'title' => 'Hasil pencarian buku "'.$request->searchValue.'"',
                'books' => $data
            ]) ;
        }else{
            return back()->with('error', 'Tidak boleh kosong saat mencari buku');
        }

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku, $slug)
    {
        $data = Buku::where('slug', $slug)->first();
        return view('pages.show-book', [
            'title' => 'Baca buku "'.$data->judul.'"',
            'buku' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
