@extends('layouts.main')
@section('content')
    {{-- <div class="container"> --}}
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
                            <a href="#" class="btn btn-primary d-flex justify-content-center">Baca Sekarang</a>
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
    <button class="btn btn-outline-primary d-flex m-auto my-5" id="buttonLoader" onclick="loadMoreBooks()">Muat lebih banyak</button>
@endsection
@push('scripts')
    <script>
        const countedAllPosts = parseInt('{{$counted}}');
        let totalBooksLoaded = parseInt('{{ count($books) }}');

        const checkLoadedPost = () => {
            if(countedAllPosts >= totalBooksLoaded){
                $('#buttonLoader').addClass('d-none');
            }
        }

        const loadMoreBooks = () => {
            event.preventDefault();
            $.ajax({
                url: '/load-more/books/' + totalBooksLoaded,
                method: 'GET',
                success: function(response) {
                    appendBooks(response.books);
                    totalBooksLoaded+=10;
                    checkLoadedPost();
                },
                error: function(error, xhr) {
                    console.log(xhr.responsetext);
                    alert(error.message);
                }
            });
        }

        const appendBooks = (books) => {
            for (let key in books) {
                $('#loadedBooksWrapper').append(`
                <div href="#" class="col-lg-2 col-md-6">
                    <div class="card">
                        <img src="${books[key].thumbnail}" class="card-img-top" alt="...">
                        <a href="#" class="bg-primary-subtle text-decoration-none text-dark">
                           <p class="text-center m-0">${books[key].category.namaKategori}</p>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">${books[key].judul}</h5>
                            <p class="card-text">${books[key].penulis}</p>
                            <a href="#" class="btn btn-primary d-flex justify-content-center">Baca Sekarang</a>
                        </div>
                    </div>
                </div>
                `);
            }
        }
    </script>
@endpush
