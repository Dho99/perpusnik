@extends('layouts.main')
@section('content')
<div style="min-height: 50vh;">
    <h2 class="text-center mt-5">{{ $title }}</h2>
    <div class="container-fluid px-1">
        <div class="row d-flex py-4 gap-3 justify-content-center" id="loadedBooksWrapper">
            @forelse ($books as $book)
                <div href="#" class="col-lg-2 col-md-3 col-4">
                    <div class="card">
                        <img src="{{ $book->thumbnail }}" class="card-img-top" alt="...">
                        <a href="#" class="bg-primary-subtle text-decoration-none text-dark">
                            <p class="text-center m-0">{{ $book->category->namaKategori }}</p>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                            <p class="card-text">{{ $book->penulis }}</p>
                            <a href="/baca-buku/{{ $book->judul }}"
                                class="btn btn-primary d-flex justify-content-center">Baca Sekarang</a>
                        </div>
                    </div>
                </div>
            @empty
                <a href="/baca-buku" class="col-lg-3 d-flex justify-content-center">
                    Tidak ada data buku
                </a>
            @endforelse
        </div>
    </div>
</div>
@endsection
