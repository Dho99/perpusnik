@extends('layouts.main')
@section('content')

    {{-- <div class="container"> --}}
    <h2 class="text-center mt-5">{{ $title }}</h2>
    <div class="container-fluid px-1">
        <div class="row d-flex py-4 gap-3 justify-content-center" id="loadedBooksWrapper">
            @forelse ($books as $key => $book)
                <div href="#" class="col-lg-2 col-md-3 col-4">
                    <div class="card">
                        <img src="{{ $book->thumbnail }}" class="card-img-top" alt="...">
                        <a href="#" class="bg-primary-subtle text-decoration-none text-dark">
                            <p class="text-center m-0">{{ $book->category->namaKategori }}</p>
                        </a>


                        <div class="card-body">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                            <p class="card-text">{{ $book->penulis }}</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="/baca-buku/{{ $book->slug }}"
                                        class="btn btn-primary d-flex justify-content-center">Baca</a>
                                </div>
                                <div class="col-lg-6">
                                    @if (!Auth::check())
                                        <a href="/login" class="btn btn-primary d-flex justify-content-center">Koleksi</a>
                                    @else
                                        <div id="{{ $book->slug }}">
                                            @if ($collected->contains('bookId', $book->id))
                                                <a href="javascript:void(0)"
                                                    class="btn btn-secondary d-flex justify-content-center">Dikoleksi</a>
                                            @else
                                                <a href="javascript:void(0)"
                                                    onclick="addToCollections('{{ $book->slug }}')"
                                                    class="btn btn-primary d-flex justify-content-center">Koleksi</a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <a href="#" class="col-lg-3">
                    Belum ada Buku
                </a>
            @endforelse
        </div>
    </div>
    <button class="btn btn-outline-primary d-flex m-auto my-5" id="buttonLoader" onclick="loadMoreBooks()">Muat lebih
        banyak</button>
@endsection
@push('scripts')
    <script>
        const countedAllPosts = parseInt("{{ $counted }}");
        let totalBooksLoaded = parseInt("{{ count($books) }}");
        const bookCollectedByUser = '{{$collected}}';
        const checkAuth = '{{auth()->check()}}';
    </script>
    <script src="{{ asset('assets/js/book.js') }}"></script>
@endpush
