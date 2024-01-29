@extends('layouts.main')
@section('content')
    <div class="container py-5">
        <h2 class="text-center">{{ $title }}</h2>
        <div class="container-fluid">
            <div class="row d-flex my-5 gap-3 justify-content-center" id="loadedBooksWrapper">
                {{-- {{$books}} --}}
                @forelse ($books as $book)
                    <div class="col-lg-3 col-md-3 col-4">
                        <div class="card">
                            <div class="position-absolute p-2" style="right: 0;">
                                <button class="btn btn-sm btn-danger"
                                    onclick="removeCollection('{{ $book->book->slug }}')">Hapus</button>
                            </div>
                            <img src="{{ $book->book->thumbnail }}" class="card-img-top" alt="...">
                            <a href="/book/category/{{ $book->book->category->namaKategori }}"
                                class="bg-primary-subtle text-decoration-none text-dark">
                                <p class="text-center m-0">{{ $book->book->category->namaKategori }}</p>
                            </a>


                            <div class="card-body">
                                <h5 class="card-title">{{ $book->book->judul }}</h5>
                                <p class="card-text">{{ $book->book->penulis }}</p>
                                <div class="row">
                                    <div class="px-3 py-2">
                                        <a href="/books/read/{{ $book->book->slug }}"
                                            class="btn btn-primary d-flex justify-content-center">Baca</a>
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
    @endsection
    @push('scripts')
        <script>
            let slugForDelete;
            let url = '{{ url()->current() }}';

            const removeCollection = (slug) => {
                slugForDelete = slug;
                confirmAlert();
            }

            const deleteItem = () => {
                // alert(slugForDelete);
                $.ajax({
                    url: '/books/collections/remove/' + slugForDelete,
                    method: 'GET',
                    success: function(response) {
                        successAlert('Buku telah dihapus dari koleksi anda');
                        refreshCollectedBooks();
                    },
                    error: function(error, xhr) {
                        errorAlert(`${error.messsage}`);
                        console.log(xhr.responseText);
                    }
                });
            }


            const refreshCollectedBooks = () => {
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        appendBooksAfterDelete(response.books);
                    },
                    error: function(error, xhr) {
                        console.log(error.message);
                        console.log(xhr.responseText);
                    }
                });
            }

            const appendBooksAfterDelete = (books) => {
                // $('#loadedBooksWrapper').empty();
                for (let book in books) {
                    console.log(books[book].book.category.namaKategori);
                    // $('#loadedBooksWrapper').append(
                    // `
                    // <div class="col-lg-3 col-md-3 col-4">
                    //     <div class="card">
                    //         <div class="position-absolute p-2" style="right: 0;">
                    //             <button class="btn btn-sm btn-danger" onclick="removeCollection(${books[book].book.slug})">Hapus</button>
                    //         </div>
                    //         <img src="${books[book].book.thumbnail}" class="card-img-top" alt="...">
                    //         <a href="/book/category/${books[book].book.category.namaKategori}" class="bg-primary-subtle text-decoration-none text-dark">
                    //             <p class="text-center m-0">${books[book].book.category.namaKategori}</p>
                    //         </a>


                    //         <div class="card-body">
                    //             <h5 class="card-title">${books[book].book.judul}</h5>
                    //             <p class="card-text">${books[book].book.penulis}</p>
                    //             <div class="row">
                    //                 <div class="px-3 py-2">
                    //                     <a href="/books/read/${books[book].book.slug}"
                    //                         class="btn btn-primary d-flex justify-content-center">Baca</a>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>
                    // `);
                }
            }
        </script>
    @endpush
