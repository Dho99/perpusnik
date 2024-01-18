<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use App\Http\Controllers\UserController;

class KoleksiPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userController;

    public function __construct(UserController $userController){
        $this->userController = $userController;
    }


    public function index()
    {
        //
    }

    public function collections(){
        $userId = $this->userController->userId();
        $collectedBooksByUser = KoleksiPribadi::where('userId', $userId)->with('book')->get();

        return view('pages.books-collection', [
            'title' => 'Koleksi Buku',
            'books' => $collectedBooksByUser
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function collect($slug){
        $bookData = Buku::where('slug', $slug)->first();
        KoleksiPribadi::create([
            'userId' => $this->userController->userId(),
            'bookId' => $bookData->id
        ]);
        return response()->json(['message' => 'Buku berhasil ditambahkan ke Koleksi']);
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
    public function show(KoleksiPribadi $koleksiPribadi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KoleksiPribadi $koleksiPribadi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
