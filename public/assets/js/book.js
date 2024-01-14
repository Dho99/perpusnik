// const countedAllPosts = parseInt("{{ $counted }}");
// let totalBooksLoaded = parseInt("{{ count($books) }}");
// const bookCollectedByUser = '{{$collected}}';

const checkLoadedPost = () => {
    if (countedAllPosts >= totalBooksLoaded) {
        $("#buttonLoader").addClass("d-none");
    }
};

const loadMoreBooks = () => {
    $.ajax({
        url: "/load-more/books/" + totalBooksLoaded,
        method: "GET",
        success: function (response) {
            appendBooks(response.books);
            totalBooksLoaded += 10;
            checkLoadedPost();
        },
        error: function (error, xhr) {
            console.log(xhr.responsetext);
            alert(error.message);
        },
    });
};

const appendBooks = (books) => {
    for (let key in books) {
        $("#loadedBooksWrapper").append(`
        <div href="#" class="col-lg-2 col-md-3 col-4">
            <div class="card">
                <img src="${
                    books[key].thumbnail
                }" class="card-img-top" alt="...">
                <a href="#" class="bg-primary-subtle text-decoration-none text-dark">
                    <p class="text-center m-0">${
                        books[key].category.namaKategori
                    }</p>
                </a>
                <div class="card-body">
                    <h5 class="card-title">${books[key].judul}</h5>
                    <p class="card-text">${books[key].penulis}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="/baca-buku/${books[key].slug}"
                                class="btn btn-primary d-flex justify-content-center">Baca</a>
                        </div>
                        <div class="col-lg-6">
                            ${
                                checkAuth != true ?
                                `<a href="/login" class="btn btn-primary d-flex justify-content-center">Koleksi</a>`

                                :

                                `<div id="${books[key].slug}">
                                    ${
                                        bookCollectedByUser.includes((item) =>item.bookId ===books[key].id)
                                        ?
                                        `<a href="javascript:void(0)"
                                        class="btn btn-secondary d-flex justify-content-center">Dikoleksi</a>`
                                        :
                                        ` <a href="javascript:void(0)"
                                        onclick="addToCollections('${books[key].slug}')"
                                        class="btn btn-primary d-flex justify-content-center">Koleksi</a>`

                                    }
                                </div>`
                            }
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `);
    }
};

const addToCollections = (slug) => {
    // console.log(slug);
    $.ajax({
        url: "/books/collections/add/" + slug,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            infoAlert(response.message);
            collected(slug);
        },
        error: function (error, xhr) {
            errorAlert(`${error.message}`);
            console.log(xhr.responseText);
        },
    });
};

const collected = (slug) => {
    $(`#${slug}`).empty().append(`
                <a href="javascript:void(0)" class="btn btn-secondary d-flex justify-content-center">Dikoleksi</a>
            `);
};
