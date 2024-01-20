<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userController;

    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }

    public function index($category)
    {
        $userId = $this->userController->userId();
        $books = Buku::whereHas('category', function ($q) use ($category) {
            $q->where('namaKategori', $category);
        })
            ->latest()
            ->get()
            ->take(10);
        $collected = KoleksiPribadi::where('userId', $userId)
            ->with('book')
            ->get();
        $counted = Buku::all()->count();

        return view('pages.categories-of-books', [
            'title' => 'Semua Buku kategori ' . $category,
            'books' => $books,
            'counted' => $counted,
            'collected' => $collected,
            'link' => '/books/category/load-more/' . $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loadMoreBooks($category, $skip, Request $request)
    {
        if ($request->ajax()) {
            $userId = $this->userController->userId();
            $books = Buku::whereHas('category', function ($q) use ($category) {
                $q->where('namaKategori', $category);
            })
                ->with('category')
                ->get()
                ->skip($skip);
            $collected = KoleksiPribadi::where('userId', $userId)
                ->with('user', 'book')
                ->get();
            return response()->json(['books' => $books, 'collected' => $collected]);
        } else {
            return response()->code(500);
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
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
