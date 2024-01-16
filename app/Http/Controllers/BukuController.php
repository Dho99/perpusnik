<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userId(){
        if(auth()->check()){
            return auth()->user()->id;
        }

    }

    public function index()
    {
        return view('pages.books', [
            'title' => 'Semua Buku',
            'books' => Buku::with('category', 'collected')->latest()->get()->take(10),
            'counted' => Buku::all()->count(),
            'collected' => KoleksiPribadi::where('userId', $this->userId())->with('user','book')->get()
        ]);
    }

    public function loadMoreBooks(Request $request, $skip){
        if($request->ajax()){
            $data = Buku::with('category')->latest()->get()->skip($skip);
            $collected = KoleksiPribadi::where('userId', $this->userId())->with('user','book')->get();
            return response()->json(['books' => $data, 'collected' => $collected]);
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
        $searchValue = $request->searchValue;

        // return dd($searchValue);
        if(!empty($request->searchValue)){
            $data = Buku::where('judul', 'LIKE','%'.$searchValue.'%')->get();
            return view('pages.search-books', [
                'title' => 'Hasil pencarian buku "'.$searchValue.'"',
                'books' => $data
            ]) ;
        }else{
            return back()->with('error', 'Tidak boleh kosong saat mencari buku');
        }

    }

    public function collections(){
        $userId = $this->userId();
        $collectUserBook = KoleksiPribadi::where('userId', $userId)->with('user')->get();
        dd($collectUserBook);
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
            'title' => 'Baca '.$data->judul,
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
